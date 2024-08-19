<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Validator;
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

    public function update1(UpdateEventRequest $request, $id)
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
        $event->titre = $request->titre;
        $event->description= $request->description;
       // $event ->image= $request->image;
     
        if ($request->hasFile('image')) {
            // Supprimer l'image si elle existe déjà
            if($event->image){
                Storage::disk('public')->delete($event->image); 
            }

            // Upload de l'image
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);

            $event->image = $imageName;
        }

        $event->save();

      
        return redirect()->back()->with('success', 'Evènement mis à jour avec succès !');

    }

     
    public function update(Request $request, $id)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
           // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
           'image' => 'nullable|image|max:4048',
            'titre' => 'required|string|max:255',
            'start' => 'nullable',
            'end' => 'nullable',

            
        ], [
           'image.mimes' => 'Le format de l\'image doit être jpeg, png, jpg ou gif.',
           'image.max' => 'La taille de l\'image ne doit pas dépasser 2MB.',
           'titre.required' => 'Le titre est requis.',
           'titre.max' => 'Le titre ne doit pas dépasser 255 caractères.',
        
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Trouver le sponsor
        $sponsor = Event::findOrFail($id);

        // Traitement de l'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si nécessaire
            if ($sponsor->image) {
                Storage::delete($sponsor->image);
            }

            // Stocker la nouvelle image
            $path = $request->file('image')->store('sponsors', 'public');
            $sponsor->image = $path;
        }

        // Mettre à jour les autres champs
        $sponsor->titre = $request->input('titre');
        $sponsor->description = $request->input('description');
        $sponsor->start = $request->input('start');
        $sponsor->end = $request->input('end');

      
        // Sauvegarder les modifications
        $sponsor->save();

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Sponsor mis à jour avec succès !');
     // return redirect()->route('sponsors')->with('success', 'Sponsor mis à jour avec succès!');
    }


}
