<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\{Category,Service, config, Marque};

class HomeComposer
{
 
    public function compose(View $view)
    {
        $view->with([
            'categories' => Category::has('produits')->take(6)->get(),
            'marques' =>Marque::has('produits')->take(6)->get(), /// Pour le home page
            'brands' =>Marque::has('produits')->get(), // Pour le  sop page
          // 'categorie'=>Category::all(),
            'configs' => config::all(),
            'services'=>Service::all(),
        ]);
    }
}