<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ImageController extends Controller
{


    
    public function videos()
    {
        $images = Image::all();
        return view('admin.images.list', compact('images') );
    }

    public function image_update($id){

        $image = Image::find($id);
       if (!$image) {
            $message = "Image non disponible !";
            abort(404, $message);
        } 
        
//   dd($video);
        return view('admin.images.update', compact('image'));
    }

    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
        
            'titre' => 'required|string|max:255',
          
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $image = Image::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($image->image) {
                Storage::delete($image->image);
            }

            $path = $request->file('image')->store('images', 'public');
            $image->image = $path;
        }

        $image->titre = $request->input('titre');
      
      //  $video->user_id = Auth::id();
      //  $video->path = $path;


        $image->save();

        return redirect()->back()->with('success', 'Image mise à jour avec succès !');
    }


    public function destroy($id)
    {
      $sponsor=  Image::find($id);
        if ($sponsor) {
            // Supprimer l'image si elle existe
            
            if($sponsor->image ?? ''){
                Storage::disk('public')->delete($sponsor->image ?? ' '); 
            }


            // Supprimer le sponsor
            $sponsor->delete();

         
        return redirect()->back()
        ->with('success', 'Image supprimée avec succès.');
        } else {
            return redirect()->back()('error', 'Image non trouvée.');
        }
    }
}
