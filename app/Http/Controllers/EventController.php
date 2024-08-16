<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function events()
{
    $events = Event::all();
    return view('admin.evenements.list', compact('events') );
}

public function evenements(){
    $events = Event::all();
    $lastevents = Event::latest()->take(8)->get();
    return view('front.evenements.evenement', compact('events', 'lastevents') );
}

public function calendar(){
    $events = Event::all();
    return view('admin.evenements.calendar', compact('events') );
}
   
    public function destroy($id)
    {
     $event=   Event::find($id);

     if ($event) {
        // Supprimer l'image si elle existe
        if($event->image ?? ' '){
            Storage::disk('public')->delete($event->image ?? ' '); 
        }

        // Supprimer le event
        $event->delete();

     
    return redirect()->back()
    ->with('success', 'Event supprimé avec succès, ainsi que son image.');
    } else {
        return redirect()->back()('error', 'event non trouvé.');
    }
    }

    
    public function event_update($id){

        $event = Event::find($id);
       if (!$event) {
            $message = "Evènement non disponible !";
            abort(404, $message);
        } 
        
     //  dd($event);
        return view('admin.evenements.update', compact('event'));
    }

    public function update(UpdateEventRequest $request, $id)
    {
          // Validation des données
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
        ], [
            'image.mimes' => 'Le format de l\'image doit être jpeg, png, jpg ou gif.',
            'image.max' => 'La taille de l\'image ne doit pas dépasser 2MB.',
            'titre.required' => 'Le titre est requis.',
            'titre.max' => 'Le titre ne doit pas dépasser 255 caractères.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Mettre à jour l'évènement
        

        $event = Event::find($id);
        $event->title = $request->title;
        $event->description= $request->description;
        $event ->image= $request->image;
     
        if ($request->hasFile('image')) {
            // Supprimer l'image si elle existe déjà
            if($event->image){
                Storage::disk('public')->delete($event->image); 
            }

            // Upload de l'image
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);

            // Mettre à jour le nom de l'image dans la base de données
            $event->image = $imageName;
        }

        $event->save();

       // return redirect()->route('event.index');
        return redirect()->back()->with('success', 'Evènement mis à jour avec succès !');

    }


}
