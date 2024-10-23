<?php

namespace App\Livewire\Coachs;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Coach;
use Livewire\Livewire;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use GuzzleHttp\Client;

use Illuminate\Support\Facades\Http;
use GuzzleHttp\Cookie\CookieJar;

class AddCoach extends Component
{

    use WithFileUploads;

    public $nom, $prenom, $email, $phone, $photo , $photo2,$adresse, $coach;
    public $updateMode = false;
    public $group; // To bind the selected group value
  // public $groups = []; 

  public $groupId;  // This will store the group's ID
    public $groupDesignation; // This will store the group's designation

    public $group_interne = false;
    public $group_externe = false;
    public $selected_group;
    
    protected $listeners = ['coachAdded' => 'render'];

    public function mount($coach){
        if($coach){
            $this->coach = $coach;
          
            $this->nom = $coach->nom;
            $this->prenom = $coach->prenom;
            $this ->group = $coach->group;
            
            $this->email = $coach->email;
            $this->phone = $coach->phone;
            $this->photo = $coach->photo;
            $this->photo2 = $coach->photo;
            $this->adresse = $coach->adresse;
          
          
        }
    }

    
private function resetInputFields(){
    $this->nom = '';
    $this->prenom = '';
    $this->email = '';
    $this->phone = '';
    $this->photo = '';
    $this->photo2 = '';
    $this->adresse = '';
    $this->group = '';


}

public function updatedGroupId($value)
{
    // Find the selected group's designation based on the ID
    $selectedGroup = collect($this->group)->firstWhere('id', $value);
    $this->groupDesignation = $selectedGroup['designation'] ?? '';
}

    
public function create()
{
    $this->validate([
        'nom' =>'nullable|string',
        'prenom' =>'nullable|string',
        'email' =>'nullable|email|unique:coaches,email',
        'phone' =>'nullable|numeric',
        'adresse' =>'nullable|string',
        'photo' =>'nullable|image|max:4048',
       // 'image' => 'required|image|max:4048',
        //'photo2' =>'required|image|mimes:jpeg,png,jpg|max:2048',
     //   'group' => 'required|exists:groups,id',
       
     
    ]);
    ;[
        
      ];
      $coach = new coach();
      $coach->nom = $this->nom;
      $coach->prenom = $this->prenom;
      $coach->group = $this->group;
    //  $coach ->groupId = $this->groupId;
      $coach->email = $this->email;
      $coach->phone = $this->phone;
      $coach->adresse = $this->adresse;
      $coach->photo = $this->photo->store('coachs', 'public');

      
      
     
      
     /// ($coach);
      $coach->save();
    /*   $this->resetInputFields(); */

    session()->flash('success', 'coach ajouté avec succès');
    // reset input
   // $this->reset();
  

     //dispach event
     $this->dispatch('coachAdded');

     return redirect()->route('coachs');

   //  $this->emit('coachAdded');
  
}


public function edit($id)
    {
        $coach = coach::findOrFail($id);

        $this->coachId = $coach->id;
        $this->titre = $coach->titre;
        $this->description = $coach->description;
        $this->email = $coach->email;
        $this->telephone = $coach->telephone;
        $this->adresse = $coach->adresse;
        $this->image = $coach->image;
        $this->group = $coach->group;
    }

    public function update()
    {
        $data = $this->validate([
            'titre' => 'nullable|string',
            'description' => 'nullable|string|max:260',
            'email' => 'nullable|email|unique:coachs,email,' . $this->coachId,
            'telephone' => 'nullable|numeric',
            'adresse' => 'nullable|string|max:260',
            'newImage' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $coach = coach::findOrFail($this->coachId);
        $coach->titre = $data['titre'];
        $coach->description = $data['description'];
        $coach->email = $data['email'];
        $coach->phone = $data['phone'];
        $coach->adresse = $data['adresse'];
        $coach->group = $data['group'];
        $coach->image = $this->image->store('coachs', 'public');

        if (isset($data['newImage'])) {
            $coach->image = $data['newImage']->store('coachs', 'public');
        }

        $coach->save();

        session()->flash('success', 'coach mis à jour avec succès');
        $this->reset();

        $this->emit('coachUpdated');
       // return view('livewire.coachs.list'); 
         
   // return view('admin.coachs.list');
    }

public function delete($id)
    {
        $coach = coach::find($id);

        if ($coach) {
            $coach->delete();
            session()->flash('message', 'coach supprimé avec succès.');
        } else {
            session()->flash('error', 'coach non trouvé.');
        }
    }



    public function render()
    {
       

        $response = http ::get('https://api.sportdivers.tn/api/groups/public/');

        if ($response->successful()) {
           
            $groups = $response->json();
         } else {
           
            $data = ['error' => 'Erreur lors de la récupération des groupes'];
         }

        return view('livewire.coachs.add-coach', compact('groups'));
    }
}
