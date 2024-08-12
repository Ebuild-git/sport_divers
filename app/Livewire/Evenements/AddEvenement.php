<?php

namespace App\Livewire\Evenements;

use App\Models\Event;
use Livewire\Livewire;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;


use Livewire\Component;

class AddEvenement extends Component
{

    use WithFileUploads;
  

    public $titre, $description, $email,  $image , $image2;
    public $updateMode = false;

    public function mount($event){
        if($event){
            $this->event = $event;
            $this->titre = $event->titre;
            $this->description = $event->description;
           
            $this->image2 = $event->image;
           
          
        }
    }

    
private function resetInputFields(){
    $this->titre= '';
    $this->description = '';

    $this->image = '';
    $this->image2 = '';
   
}

   

    
public function create()
{
    $data =  $this->validate([
        'titre' => 'required|string',
        'description' => 'required|string|max:260',
       
       
         'image' => 'required|image|mimes:jpg,jpeg,png,webp',
       
    ]);
    ;[
        'titre.required' => 'Le titre',
        'description.required' => 'Veuillez entrer votre description',

        
        //  'image.required' => 'Veuillez choisir une image',
        //  'photos.*.required' => 'Veuillez choisir une image',
        //  'photos.*.mimes' => 'Veuillez choisir une image de type jpg,jpeg,png,webp',
        
       // 'image.mimes' => 'Veuillez choisir une image de type jpg,jpeg,png,webp',
        
  
      ];
      $event = new event();
     
      $event->titre = $this->titre;
      $event->description = $this->description;
     
      //  if($this->image){
          $event->image = $this->image->store('events', 'public');
      //  }

      
      $event->save();
      $this->resetInputFields();

    session()->flash('success', 'event ajouté avec succès');
}



    public function render()
    {
        return view('livewire.evenements.add-evenement');
    }
}
