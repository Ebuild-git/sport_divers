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
    public $lastName = '';
    public $firstName = '';
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
    public $terms = '';

    public $group_interne = false;
public $group_externe = false;


    
    public function save()
    {
        $this->validate([
            'email' => 'required|email|unique:contacts,email',
            'telephone' => 'required|numeric|unique:contacts,telephone',
            'cin' => 'required|numeric|unique:contacts,cin',
            'gender' => ['required', 'in:MALE,FEMALE'],
            'birthdate' => ['required', 'date', 'before:' . date('Y-m-d')],
            'terms' => 'accepted',  // Validation pour la case à cocher
          //  'group' => ['required', 'in:interne,externe'],
        ], [
            'email.required' => 'Veuillez entrer votre email',
            'email.unique' => 'Cet email est déjà utilisé. Vous avez déjà  fait une inscription',
          //  'telephone.numeric' => 'Veuillez entrer un numéro de téléphone valide',
            'telephone.unique' => 'Ce numéro de téléphone est déjà utilisé',
           // 'cin.numeric' => 'Veuillez entrer un numéro de CIN valide',
            'cin.unique' => 'Ce numéro de CIN est déjà utilisé.',
          
            'terms.accepted' => 'Veuillez accepter les conditions géné'
        ]);

        $contact = new Contact();
        $contact->email = $this->email;
       // $contact->nom = $this->nom;
        $contact ->firstName = $this->firstName;
        $contact->lastName = $this->lastName;

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
                   /// 'firstName' => $this->nom, 
                   // 'lastName' => $this->sujet, 
                    'phone' => $this->telephone, 
                    'observation' => $this->message, 
                    'gender' =>  $this->gender,
                    'cin' => $this->cin,
                    'birthdate' => $this->birthdate,
                    'group' => $this->group,
                    'lastName'=>$this->lastName,
                    'firstName'=>$this->firstName,
                   // 'birthdate'=>$this->birthdate,
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
                     //       'nom',
                            'sujet',
                           'message',
                            'telephone',
                            'lastName',
                            'firstName',
                          
                            
                           'gender',
                           'cin',
                            'birthdate',
                           // 'group',
                            'group',
                          

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
    
    public function setGroup($type)
    {
        if ($type === 'interne') {
            $this->group_externe = false;
        } elseif ($type === 'externe') {
            $this->group_interne = false;
        }
    }
    
    public function render()
    {
         $response = http ::get('https://api.sportdivers.tn/api/groups/public/');
         $extern_group = http ::get('https://api.sportdivers.tn/api/external-groups/public');
         if ($extern_group->successful()){
           $extern_groups =$extern_group->json();
         }
         else{
            $data = ['error' => 'Erreur lors de la récupération des groupes externes'];
         }

         if ($response->successful()) {
           
            $groups = $response->json();
         } else {
           
            $data = ['error' => 'Erreur lors de la récupération des groupes'];
         }
        
       //  $groups = $response->json()['data'];
        return view('livewire.front.inscription', compact('groups', 'extern_groups')); 
    }
}
