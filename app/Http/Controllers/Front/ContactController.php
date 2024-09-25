<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ContactRequest;
use App\Models\{config, Contact};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    public function contact()
    {
        $configs= config::firstOrFail();
        return view('front.contact.contact', compact('configs'));
    }

    public function inscription(){
        return view('front.contact.inscription');
    }

    public function store(ContactRequest $request)
    {
        if($request->user()) {
            $request->merge([
                'user_id' => $request->user()->id,
                'name'    => $request->user()->name,
                'email'   => $request->user()->email,
            ]);
        }
        Contact::create ($request->all());
       // return back();

       return back()->with ('message', __('Votre message a été envoyé avec succès'));
      
    }

    public function fetchGroup()
    {
        // Effectuer une requête GET vers l'API externe
        $response = Http::get('https://api.sportdivers.tn/api/public/');

        // Vérifiez si la requête a réussi
        if ($response->successful()) {
            // Récupérez les données de l'API
            $groups = $response->json();
            
            // Traiter les données comme vous le souhaitez (par ex. enregistrer dans la base de données)
            return view('group-form', compact('groups'));
        } else {
            // Gérez les erreurs
            return back()->with('error', 'Impossible de récupérer les données du groupe');
        }
    }


    public function about(){
        return view('front.contact.about');
    }
}