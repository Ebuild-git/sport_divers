<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Models\Contact;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Cookie\CookieJar;


class Inscription extends Component
{

    
    public $nom = '';
    public $telephone = '';
    public $email = '';
   public $sujet ='';
    public $message = '';
  //  public $age = '';
   // public $errors = [];
    public $gender = 'MALE';
    public $cin = '';
    public $birthdate = '';
    public $group = '';
    public $designation = '';


    
    public function save()
    {
        $this->validate([
            'email' => 'required|email',
            'nom' => 'required|max:200|string',
          //  'sujet' => 'required|max:200|string',
          //  'message' => 'required|max:5000|string',
            'telephone' => 'required|numeric',
           
            'gender' => 'nullable',
            'gender' => ['required', 'in:MALE,FEMALE'],
      
           'birthdate' => ['required', 'date', 'before:'. date('Y-m-d')],
           
        ], [
            'email.required' => 'Veuillez entrer votre email',
            'nom.required' => 'Veuillez entrer votre nom',
            'sujet.required' => 'Veuillez entrer votre sujet',
            'message.required' => 'Veuillez entrer votre message',
            'telephone.required' => 'Veuillez entrer votre téléphone',
        
            'gender.nullable' => 'Veuillez selectionner votre genre',
            //'cin.nullable' => 'Veuillez entrer votre CIN',
          
         
          
        ]);

        $contact = new Contact();
        $contact->email = $this->email;
        $contact->nom = $this->nom;

      //  $contact->sujet = $this->sujet;
       // $contact->message = $this->message;
        $contact->telephone = $this->telephone;
       
        $contact->gender = $this->gender;
        $contact->cin = $this->cin;
        $contact->birthdate = $this->birthdate;
        $contact->group = $this->group;
        $contact->designation = $this->designation;
   

        if ($contact->save()) {
          
           
          
            if ($contact->save()) {
                // Préparation des données pour l'API externe
                $data = [
                    'email' => $this->email,
                    'firstName' => $this->nom, 
                    'lastName' => $this->sujet, 
                    'phone' => $this->telephone, 
                    'observation' => $this->message, 
                    'gender' =>  $this->gender,
                    'cin' => $this->cin,
                    'birthdate' => $this->birthdate,
                    'group' => $this->group,
                  //  'designation' => $this->designation
                    
                ];
        
                try {
                    
                    $client = new Client();
                    $response = $client->post('https://api.sportdivers.tn/api/pre-registrations', [ 
                        'json' => $data,
                        'headers' => [
                            'Accept' => 'application/json',
                            'Authorization' => 'Bearer VOTRE_JETON_API', 
                        ],
                    ]);
        
                   
                    if ($response->getStatusCode() == 201) {
                        $this->reset([
                            'email',
                            'nom',
                            'sujet',
                           'message',
                            'telephone',
                            
                           'gender',
                           'cin',
                            'birthdate',
                           // 'group',
                            'designation',
                          

                        ]);
                        session()->flash('success', 'Votre inscription a été envoyée avec succès ');
                    } else {
                        session()->flash('error', 'Votre inscription a été sauvegardée, mais une erreur est survenue lors de l\'envoi à l\'API');
                    }
                } catch (\Exception $e) {
                    session()->flash('error', 'Une erreur est survenue lors de l\'envoi des données à l\'API : ' . $e->getMessage());
                }
        
                return redirect()->back();
            } else {
                session()->flash('error', 'Une erreur est survenue lors de l\'envoi de votre inscription');
                return;
            }
        }
    }
    

    public function render()
    {
         $response = http ::get('https://api.sportdivers.tn/api/groups/public/');
         if ($response->successful()) {
            // Récupérez les données de l'API
            $groups = $response->json();
         } else {
            // Affichez un message d'erreur si l'API n'est pas accessible
            $data = ['error' => 'Erreur lors de la récupération des groupes'];
         }
        
       //  $groups = $response->json()['data'];
        return view('livewire.front.inscription', compact('groups')); 
    }
}
