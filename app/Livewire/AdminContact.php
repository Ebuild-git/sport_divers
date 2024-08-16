<?php

namespace App\Livewire;

use App\Models\config;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Validator;

class AdminContact extends Component
{
    use WithFileUploads;
    public $logo,$icon,$logo2,$icon2, $logoHeader, $telephone,$addresse, $email,$description,$fax,$logocontact,$logocontact2,$photos,$photos2,$titre_apropos,$des_apropos,
      $facebook, $twitter, $instagram, $youtube, $linkedin, $tiktok, $coach, $seance, $adherent, $tounoir; 

    public function mount(){
       $config = config::first()  ?? new Config;;
       // $this->config = Config::first() ?? new Config;
        $this->logo2 = $config->logo;
        $this->photos2 = $config->photos;
        $this->icon2 = $config->icon;
        $this->titre_apropos = $config->titre_apropos;
        $this->des_apropos = $config->des_apropos;
       
        //$this->logocontact= $config->logocontact;
        $this->logocontact2= $config->logocontact;
        $this->logoHeader= $config->logoHeader;
        $this->email=$config->email;
        $this->telephone=$config->telephone;
        $this->fax=$config->fax;
        $this->addresse=$config->addresse;
        $this->description=$config->description;
        $this->facebook=$config->facebook;
        $this->twitter=$config->twitter;
        $this->instagram=$config->instagram;
        $this->youtube=$config->youtube;
        $this->linkedin=$config->linkedin;
        $this->tiktok=$config->tiktok;
        $this->coach=$config->coach;
        $this->seance=$config->seance;
        $this->adherent=$config->adherent;
        $this->tounoir=$config->tounoir;
        // $this->logoHeader = $config->logoHeader;  // not in the migration table so we commented it here



    }

    public function render()
    {
        return view('livewire.admin-contact');
    }

    public function update_form(){
        // valid all form fields as nulable
        $this->validate([
            'logo' =>  'image|nullable',   // 1MB Max
            'photos.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
          //  'logoHeader' =>  'image|nullable|max:2024',   // 1MB Max
        'logocontact'=> 'nullable', // 1MB Max
            'icon' =>  'image|nullable',//
           
            'telephone' => 'nullable|numeric',
            'email' => 'nullable',
            'addresse' => 'nullable|string',
            'description' => 'nullable|string',
            'logoHeader' => 'nullable|image',
            'fax' => 'nullable|numeric',
            'facebook' => 'nullable|string',
            'twitter' => 'nullable|string',
            'instagram' => 'nullable|string',
            'youtube' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'tiktok' => 'nullable|string',
            'coach' => 'nullable|numeric',
            'seance' => 'nullable|numeric',
            'adherent' => 'nullable|numeric',
            'tounoir' => 'nullable|numeric',


        ]);

        // update the user
        $config = config::first();
        if($this->logo){
            //delete old logo
            if ($this->logo2) {
                Storage::disk('public')->delete($this->logo2);
            }
            $config->logo= $this->logo->store('logo', 'public');
        }
        if($this->logoHeader){
            //delete old logo
            if ($this->logoHeader2) {
                Storage::disk('public')->delete($this->logoHeader2);
            }
            $config->logoHeader= $this->logoHeader->store('logoHeader', 'public');
        }

        if($this->icon){
            //delete old icon
            if ($this->icon2) {
                Storage::disk('public')->delete($this->icon2);
            }
            $config->icon= $this->icon->store('icon', 'public');
        }

        if($this->logocontact){
            //delete old logo
            if ($this->logocontact2) {
                Storage::disk('public')->delete($this->logocontact2);
            }
            $config->logocontact= $this->logocontact->store('logocontact', 'public');
        }
/* 
        if ($this->photos) {
            $photosPaths = [];
            foreach ($this->photos as $photo) {
                $photosPaths[] = $photo->store('produits', 'public');
            }
          

            $this->config->photos = json_encode($photosPaths);
        }  */

   if ($this->photos) {
            $photosPaths = [];
            foreach ($this->photos as $photo) {
                $photosPaths[] = $photo->store('apropos', 'public');
            }
            $config->photos = json_encode($photosPaths);
        }
    
        $config->telephone = $this->telephone;
        $config->fax = $this->fax;
        $config->email = $this->email;
        $config->addresse = $this->addresse;
        $config->description = $this->description;
        $config->facebook = $this->facebook;
        //$config->twitter = $this->twitter;
        $config->instagram = $this->instagram;
        $config->youtube = $this->youtube;
        $config->linkedin = $this->linkedin;
        $config->tiktok = $this->tiktok;
        $config->coach = $this->coach;
        $config->seance = $this->seance;
        $config->adherent = $this->adherent;
        $config->tounoir = $this->tounoir;
        $config->titre_apropos= $this->titre_apropos;
        $config->des_apropos = $this->des_apropos;



        if($config->save()){
            //flash message
            session()->flash('info', 'Vos modifications ont été enregistrées.');
        }else{
            //flash message
            session()->flash('danger', 'Vos modifications n\'ont pas été enregistrées.');
        }
    }


}
