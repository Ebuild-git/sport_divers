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
             'description' => 'required|string|max:255',
             'video' => 'required|file|mimetypes:video/*',
            //'video' => 'required|file|mimetypes:*', // Accepte tous les formats
          //  'video' => 'required|file|max:1002400', // 100MB in kilobytes
           //'video' => 'required|file|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime,video/x-ms-wmv,video/x-msvideo,video/x-flv,video/3gpp,video/3gpp2,video/webm,video/x-matroska|max:500000',
         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
     
         ]);
        $user= Auth::id();
         $fileName = $request->video->getClientOriginalName();
         $filePath = 'videos/' . $fileName;
  
         $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->video));
         $url = Storage::disk('public')->url($filePath);
  
         if ($isFileUploaded) {
             $video = new Video();
             $video->titre = $request->titre;
             $video->description = $request->description;
            $video->image = $request->image->store('images', 'public');
             $video->video = $filePath;
             $video->user_id = $user;
             
            $video->save();
  //dd($video);
             return back()
             ->with('success','Video has been successfully uploaded.');
         }
  
         return back()
             ->with('error','Unexpected error occured');
     }

  

 
    public function update(Request $request, $id)
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
