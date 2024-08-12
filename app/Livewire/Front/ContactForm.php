<?php

namespace App\Livewire\Front;

use App\Models\Contact;
use Livewire\Component;

class ContactForm extends Component
{

    public $nom = '';
    public $telephone = '';
    public $email = '';
   public $sujet ='';
    public $message = '';




    public function save()
    {
        $this->validate([
            'email' => 'required|email',
            'nom' => 'required|max:200|string',
            'sujet' => 'required|max:200|string',
            'message' => 'required|max:5000|string',
            'telephone' => 'required|numeric',
          
        ], [
            'email.required' => 'Veuillez entrer votre email',
            'nom.required' => 'Veuillez entrer votre nom',
            'sujet.required' => 'Veuillez entrer votre sujet',
            'message.required' => 'Veuillez entrer votre message',
         
          
        ]);

        $contact = new Contact();
        $contact->email = $this->email;
        $contact->nom = $this->nom;
        $contact->sujet = $this->sujet;
        $contact->message = $this->message;
        $contact->telephone = $this->telephone;
   

        if ($contact->save()) {
          
           
          
            $this->reset(
                [
                    'email',
                    'nom',
                    'sujet',
                    'message',
                    'telephone',
                
                ]
            );
            session()->flash('success', 'Votre message a été envoyé avec succès');
            return redirect()->back();
        } else {
            session()->flash('error', 'Une erreur est survenue lors de l\'envoi de votre message');
            return;
        }
    }

    
    public function render()
    {
        return view('livewire.front.contact-form');
    }
}
