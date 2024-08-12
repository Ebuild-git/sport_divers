<?php

namespace App\Livewire\Images;

use Livewire\Component;
use App\Models\Image;
use Livewire\Livewire;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class AddImage extends Component
{


    use WithFileUploads;
  

    public $titre, $description, $email,  $image , $image2, $img;
    public $updateMode = false;

    public function mount($img){
        if($img){
            $this->img = $img = $img;
            $this->titre = $img->titre;
           
           
            $this->image2 = $img->image;
           
          
        }
    }

    
private function resetInputFields(){
    $this->titre= '';
  

    $this->image = '';
    $this->image2 = '';
   
}

   

    
public function save()
{
    $data =  $this->validate([
        'titre' => 'required|string',
       
       
       
         'image' => 'required|image|mimes:jpg,jpeg,png,webp',
       
    ]);
    ;[
        'titre.required' => 'Le titre',


        
        //  'image.required' => 'Veuillez choisir une image',
        //  'photos.*.required' => 'Veuillez choisir une image',
        //  'photos.*.mimes' => 'Veuillez choisir une image de type jpg,jpeg,png,webp',
        
       // 'image.mimes' => 'Veuillez choisir une image de type jpg,jpeg,png,webp',
        
  
      ];
      $img = new Image();
     
      $img->titre = $this->titre;
     // $img->description = $this->description;
     
      //  if($this->image){
          $img->image = $this->image->store('img$imgs', 'public');
      //  }

      
      $img->save();
      $this->resetInputFields();

    session()->flash('success', 'img$img ajouté avec succès');
}

    public function render()
    {
        return view('livewire.images.add-image');
    }
}
