<?php

namespace App\Livewire\Front;

use App\Models\Contact;
use Livewire\Component;
use GuzzleHttp\Client;

class ContactForm extends Component
{

    public $nom = '';
    public $telephone = '';
    public $email = '';
   public $sujet ='';
    public $message = '';
    public $age = '';
   // public $errors = [];
    public $gender = 'MALE';




    public function save()
    {
        $this->validate([
            'email' => 'required|email',
            'nom' => 'required|max:200|string',
            'sujet' => 'required|max:200|string',
            'message' => 'required|max:5000|string',
            'telephone' => 'required|numeric',
            'age' => 'required|max:200',
            'gender' => 'nullable',
          
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
        $contact->age = $this->age;
        $contact->gender = $this->gender;
   

        if ($contact->save()) {
          
           
          
            if ($contact->save()) {
                // Préparation des données pour l'API externe
                $data = [
                    'email' => $this->email,
                    'firstName' => $this->nom, 
                    'lastName' => $this->sujet, 
                    'phone' => $this->telephone, 
                    'observation' => $this->message, 
                    'gender' =>  'MALE',
                ];
        
                try {
                    
                    $client = new Client();
                    $response = $client->post('https://api.sportdivers.tn/api/pre-registrations', [ 
                        'json' => $data,
                        'headers' => [
                            'Accept' => 'application/json',
                          //  'Authorization' => 'Bearer VOTRE_JETON_API', 
                        ],
                    ]);
        
                   
                    if ($response->getStatusCode() == 201) {
                        $this->reset([
                            'email',
                            'nom',
                            'sujet',
                            'message',
                            'telephone',
                            'age',
                         //   'gender',

                        ]);
                        session()->flash('success', 'Votre message a été envoyé avec succès à l\'API externe');
                    } else {
                        session()->flash('error', 'Le message a été sauvegardé, mais une erreur est survenue lors de l\'envoi à l\'API');
                    }
                } catch (\Exception $e) {
                    session()->flash('error', 'Une erreur est survenue lors de l\'envoi des données à l\'API : ' . $e->getMessage());
                }
        
                return redirect()->back();
            } else {
                session()->flash('error', 'Une erreur est survenue lors de l\'envoi de votre message');
                return;
            }
        }
    }
    
    public function render()
    {
        return view('livewire.front.contact-form');
    }
}
