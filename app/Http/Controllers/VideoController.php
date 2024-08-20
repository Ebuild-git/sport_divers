<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\VideoView;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
  
    public function videos()
    {
        $videos = Video::all();
        return view('admin.videos.list', compact('videos') );
    }

    public function video_update($id){

        $video = Video::find($id);
       if (!$video) {
            $message = "video non disponible !";
            abort(404, $message);
        } 
        
//   dd($video);
        return view('admin.videos.update', compact('video'));
    }

    public function show($id)
    {
        $video = Video::findOrFail($id);

        // Enregistrer la vue
        VideoView::create([
            'video_id' => $video->id,
            'ip_address' => request()->ip(),
        ]);
        $video->increment('views');

        return view('videos.show', compact('video'));
    }

    public function play($id)
{
    $video = Video::find($id);

    VideoView::create([
        'video_id' => $video->id,
        'ip_address' => request()->ip(),
    ]);
    $video->increment('views');

    return view('video.play', compact('video'));
}


public function incrementViewCount($id)
{
    $video = Video::findOrFail($id);
    $video->views += 1;
    $video->save();

    return response()->json(['views' => $video->views]);
}




    public function uploadVideo(Request $request)
    {
          $this->validate($request, [
             'titre' => 'required|string|max:255',
             'description' => 'nullable|string|max:255',
             'video' => 'nullable|file|mimetypes:video/*',
             'path' => 'nullable|url',
             'image' => 'required|image|max:4048',
     
         ]);
        $user= Auth::id();
        $videoUrl = $request->input('path');
        $embedUrl = preg_replace('/^.*v=([^&]*).*$/', 'https://www.youtube.com/embed/$1', $videoUrl);
        $validatedData['path'] = $embedUrl;
        
  
             $video = new Video();
             $video->titre = $request->titre;
           //  $video->description = $request->description;
            $video->image = $request->image->store('images', 'public');
            // $video->video = $filePath;
           $video->path =$embedUrl;

             
            $video->save();
             $video->user_id = $user;
             
            $video->save();
  
             return back()
             ->with('success','Video has been successfully uploaded.');
         
/* 
         $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'path' => 'nullable|url', 
            'auteur' => 'nullable|string|max:255',
            'categorie_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
$videoUrl = $request->input('path');
$embedUrl = preg_replace('/^.*v=([^&]*).*$/', 'https://www.youtube.com/embed/$1', $videoUrl);
$validatedData['path'] = $embedUrl;

    
        
        $video = Video::create($validatedData);
    
        return back()
        ->with('success','Video has been successfully uploaded.' *///);
     }

  

 
    public function update1(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'video' => 'nullable|mimes:mp4,avi,mov|max:20480', // max 20MB
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $video = Video::findOrFail($id);

        if ($request->hasFile('video')) {
            if ($video->video) {
                Storage::delete($video->video);
            }

            $path = $request->file('video')->store('videos', 'public');
            $video->video = $path;
        }

        if ($request->hasFile('image')) {
            if ($video->image) {
                Storage::delete($video->image);
            }

            $path = $request->file('image')->store('images', 'public');
            $video->image = $path;
        }

        $video->titre = $request->input('titre');
        $video->description = $request->input('description');
      //  $video->user_id = Auth::id();
      //  $video->path = $path;


        $video->save();

        return redirect()->back()->with('success', 'Vidéo mise à jour avec succès !');
    }
    public function update(Request $request, Video $video)
{
    $validatedData = $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'nullable|string',
        'path' => 'nullable|url', // Validation pour les URL
        'auteur' => 'nullable|string|max:255',
       // 'categorie_id' => 'nullable|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Mise à jour des informations de la vidéo
    $video->update($validatedData);

    return redirect()->back()->with('success', 'Vidéo mise à jour avec succès !');
}


    
    public function destroy($id)
    {
      $sponsor=  Video::find($id);
        if ($sponsor) {
            // Supprimer l'image si elle existe
            if($sponsor->video ?? ''){
                Storage::disk('public')->delete($sponsor->video ?? ' '); 
            }
            if($sponsor->image ?? ''){
                Storage::disk('public')->delete($sponsor->image ?? ' '); 
            }


            // Supprimer le sponsor
            $sponsor->delete();

         
        return redirect()->back()
        ->with('success', 'Vidéo supprimée avec succès.');
        } else {
            return redirect()->back()('error', 'Sponsor non trouvé.');
        }
    }
}
