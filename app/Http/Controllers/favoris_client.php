<?php

namespace App\Http\Controllers;

use App\Models\favoris;
use App\Models\produits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class favoris_client extends Controller
{
    public function add(Request $request)
    {
        $id_produit = $request->input('id_produit');
        $produit = produits::find($id_produit);
        if (!$produit) {
            return response()->json(
                [
                    "statut" => false,
                    "message" => "Produit introuvable en stock !"
                ]
            );
        }

        $count = favoris::where('id_user', Auth::user()->id)->where("id_produit", $id_produit)->count();
        if ($count != 0) {
            return response()->json(
                [
                    "statut" => true,
                    "message" => "Produit déja ajouté aux favoris !"
                ]
            );
        }

        $favoris = new favoris();
        $favoris->id_user = Auth::user()->id;
        $favoris->id_produit = $id_produit;
        $favoris->save();
        return response()->json([
            "statut" => true,
            "message" => "Produit ajouté",
            "total" => $count
        ]);
    }
}
