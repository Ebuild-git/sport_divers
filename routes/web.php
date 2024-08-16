<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DevelopperController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackController;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\favoris_client;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ImageController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\{

    ContactController ,
};
use App\Http\Controllers\panier_client;
use App\Http\Controllers\CustomerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Dans routes/web.php
Route::get('/video/{id}', [VideoController::class, 'play'])->name('video.play');
Route::post('/video/view/{id}', [VideoController::class, 'incrementViewCount'])->name('video.incrementViewCount');



Route::get('contact', [ContactController::class, 'contact'])->name("contact");


Route::get('evenements', [EventController::class, 'evenements'])->name("evenements");


Route::resource('contacts', ContactController::class, ['only' => ['create', 'store']]);
Route::get('forgot-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forgot-password');
Route::get('/confirmation', [HomeController::class, 'confirmation'])->name('confirmation');
Route::get('/logout', [HomeController::class, 'logout']);
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/print/commande/{id}', [HomeController::class, 'print_commande'])->name('print_commande');

//Route::get('/marque/{id}', [HomeController::class, 'produits'])->where('id', '[0-9]+');
//Route::get('/details-produits/{id}', [HomeController::class, 'details'])->name('details-produits');
Route::get('/details-produits/{id}/{slug}', [HomeController::class, 'details'])->name('details-produits');
Route::get('/details-services/{id}/{slug}', [HomeController::class, 'detailsServices'])->name('details-services');


 ///gestion boutique
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('ordres-croissant', [HomeController::class, 'croissant'])->name('ordres.croissant');
Route::post('/shop', [HomeController::class, 'shop']);
Route::get('/category/{id}', [HomeController::class, 'produits'])->where('id', '[0-9]+');
Route::get('/decroissant', [HomeController::class, 'decroissant'])
->name('decroissant');
Route::get('/croissant', [HomeController::class, 'croissant'])
->name('croissant');

//Route::get('/search-product',[HomeController::class,'search_products'])->name('search.products');
Route::get('/sort-by',[HomeController::class,'sort_by'])->name('sort.by');



//gestion du panier
Route::get('cart', [panier_client::class, 'cart'])->name('cart');
Route::post('/client/ajouter_au_panier', [panier_client::class, 'add']);
Route::get('/client/count_panier', [panier_client::class, 'count_panier']);
Route::get('/client/mon_panier', [panier_client::class, 'contenu_mon_panier']);
Route::get('/client/delete_produit_au_panier', [panier_client::class, 'delete_produit']);

use App\Http\Controllers\ProductController;

Route::get('addcart/{id}', [ProductController::class, 'addToCart'])->name('addcart');



Route::get('/commander', [CommandeController::class, 'commander'])->name('commander');
Route::post('/order', [CommandeController::class, 'confirmOrder'])->name('order.confirm');
Route::get('/thank-you', [CommandeController::class, 'index'])->name('thank-you');
//Route::get('cart', [CommandeController::class, 'cart'])->name('cart');
Route::delete('/cart/clear', [CommandeController::class, 'clear'])->name('cart.clear');


// Utilisateur authentifié
Route::middleware('auth')->group(function () {

    /////////////////Commandes////////////////////////////////////////
  //  Route::post('/order', [CommandeController::class, 'confirmOrder'])->name('order.confirm');
//Route::get('/thank-you', [CommandeController::class, 'index'])->name('thank-you');
    //Route::get('/commander', [CommandeController::class, 'commander'])->name('commander');

    //gestion des favoris
    Route::post('/client/ajouter_favoris', [favoris_client::class, 'add']);
    Route::get('/favories', [MyAccountController::class, 'favories'])->name('favories');

    ///Mon compte
    Route::get('/comptes', [MyAccountController::class, 'comptes'])->name('comptes'); 
    Route::put('/avatar/{id}', [MyAccountController::class, 'avatar']);


    ///Mon profil
    Route::get('/profile', [MyAccountController::class, 'profile'])->name('profile');




});


Route::post('/videos/{video}/increment-views', [VideoController::class, 'incrementViews']);
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])
        ->name('dashboard');
    Route::post('/dashboard/filtre', [AdminController::class, 'dashboard'])
        ->name('filtre-dashboard');

    ////////////Les categories/////////////////////////////////////////////////////
    Route::get('/admin/categories', [AdminController::class, 'categories'])
        ->name('categories')
        ->middleware('permission:category_view');
    Route::get('/admin/category/add', [AdminController::class, 'category_add'])
        ->name('category.add')
        ->middleware('permission:category_add');
    Route::get('/admin/category/{id}/update', [AdminController::class, 'categories_update'])
        ->name('categories.update')
        ->middleware('permission:category_edit');


    ///////////////Les services/////////////////////////////////

    Route::get('/admin/services', [AdminController::class, 'services'])
        ->name('services')
        ->middleware('permission:category_view');
    Route::get('/admin/service/add', [AdminController::class, 'service_add'])
        ->name('service.add')
        ->middleware('permission:category_add');
    Route::get('/admin/service/{id}/update', [AdminController::class, 'service_update'])
        ->name('service.update')
        ->middleware('permission:service_edit');


    /////////////////////////Les marques//////////////////////////////////////
    Route::get('/admin/marques', [AdminController::class, 'marques'])

        ->name('marques');
        
    /////////////////////////Les sponsors//////////////////////////////////////  
    Route::get('/admin/sponsors', [SponsorController::class,'sponsors'])
        ->name('sponsors');
        
    route::resource('sponsors', SponsorController::class);
   /*  Route::get('/admin/sponsor/{id}', [SponsorController::class, 'index_update'])
    ->name('sponsor.update'); */
        
    Route::get('/admin/sponsor/add', [AdminController::class,'sponsor_add'])
        ->name('sponsor.add')
        ->middleware('permission:sponsor_add');
     Route::get('/admin/sponsor_update/{id}', [SponsorController::class,'sponsor_update'])
        ->name('sponsor_update');
       
       // Route::put('sponsors/{id}', [SponsorController::class, 'update'])->name('sponsors.update');

        /////////////////// events ////////////////////////////////////////
        Route::get('/admin/events', [EventController::class, 'events'])
            ->name('events')
            ->middleware('permission:event_view');
            route::resource('events', EventController::class);
            Route::get('calendar', [ EventController::class, 'calendar' ])->name('calendar');
   
        Route::get('/admin/event_update/{id}', [ EventController::class, 'event_update'])
            ->name('event_update');
          
         ////////////////////////Coachs/////////////////////
         Route::get('/admin/coachs', [CoachController::class, 'coachs'])
            ->name('coachs');
            Route::get('/admin/coach_update/{id}', [ CoachController::class, 'coach_update'])
            ->name('coach_update');
           
            
            route::resource('coachs', CoachController::class);
            Route::get('/admin/coach_update/{id}', [CoachController::class, 'coach_update'])
            ->name('coach_update');

        ///////////////////les  clients////////////////////////////////////////////////   

        ///////////////////////////videos //////////////////
        Route::get('/admin/videos', [AdminController::class, 'videos'])
            ->name('videos')   
            ->middleware('permission:video_view');
            route::resource('videos', VideoController::class);
            Route::post('video-upload', [ VideoController::class, 'uploadVideo' ])->name('store.video');

        Route::get('/admin/video_update/{id}', [VideoController::class, 'video_update'])
            ->name('video_update');
           

        ///////////////////////////////Images////////////////
        Route::get('/admin/images', [AdminController::class, 'images'])
            ->name('images')
            ->middleware('permission:image_view');
            Route::get('/admin/image_update/{id}', [ ImageController::class, 'image_update'])
            ->name('image_update');
          

            route::resource('images', ImageController::class);
        Route::get('/admin/image/add', [AdminController::class, 'image_add'])
            ->name('image.add')
            ->middleware('permission:image_add');
        Route::get('/admin/image/{id}', [AdminController::class, 'image_update'])
            ->name('image.update')
            ->middleware('permission:image_edit');

      

//////////////import client/////////////////////////////

Route::post('import', [CustomerController::class, 'importExcelData']);



    ///////////////////les  produits////////////////////////////////////////////////
    Route::prefix('admin')->group(function () {

 




        Route::get('/produits', [AdminController::class, 'produits'])
            ->name('produits')
            ->middleware('permission:product_view');

        Route::get('/corbeille', [AdminController::class, 'corbeille'])->name('corbeille');
        Route::get('/produit/{id}/update', [AdminController::class, 'produits_update'])
            ->name('produits.update')
            ->middleware('permission:product_edit');

        Route::get('/produit/{id}/historique', [AdminController::class, 'historique'])
            ->name('produits.historique')
            ->middleware('role:admin');

        Route::get('/produit/add', [AdminController::class, 'produit_add'])
            ->name('produit.add')
            ->middleware('permission:product_add');

        Route::get('/commandes', [AdminController::class, 'commandes'])
            ->name('commandes')
            ->middleware('permission:order_view');
        Route::get('/parametres', [AdminController::class, 'parametres'])
            ->name('parametres');

        Route::get('/personnels', [AdminController::class, 'personnels'])
            ->name('personnels')
            ->middleware('role:admin');
        Route::get('/promotions', [AdminController::class, 'promotions'])
            ->name('promotions');
        Route::get('/promotions/{id}', [AdminController::class, 'promotions'])
            ->name('promotions_produit');
        Route::get('/commande/{id}', [AdminController::class, 'details_commande'])
            ->name('details_commande');
    });



    
    

    Route::get('clients', [AdminController::class, 'clients'])
        ->name('clients')
        ->middleware('permission:clients_view');
    Route::get('/admin/export/clients', [AdminController::class, 'export_clients'])
        ->name('export_clients')
        ->middleware('permission:clients_view');

    Route::get('contact-admin', [AdminController::class, 'contact_admin'])
        ->name('contact-admin')
        ->middleware('permission:setting_view');
    Route::get('/admin/get_live_notifications', [AdminController::class, 'live_notifications'])
        ->name('live_notifications');

    Route::post('/update-config', [AdminController::class, 'update_config'])
        ->name('update-config');

    Route::get('admin/new_commande', [AdminController::class, 'new_commande'])
        ->name('new_commande')
        ->middleware('permission:order_add');

    Route::post('admin/add_note', [AdminController::class, 'add_note'])
        ->name('add_note')
        ->middleware('permission:order_edit');


    Route::get('/admin/commande/{id}/edit_commande', [AdminController::class, 'edit_commande'])
        ->name('edit_commande')
        ->middleware('permission:order_edit');






    Route::group(['middleware' => 'role:admin'], function () {

        Route::get('/admin/personnel/delete/{id}', [AdminController::class, 'delete_personnel'])
            ->name('delete_personnel');

        Route::post('/admin/update-personnel-permissions', [AdminController::class, 'update_permission'])
            ->name('update-personnel-permissions');

        Route::get('/admin/packs', [PackController::class, 'index'])
            ->name('packs');

        Route::get('/admin/add_packs', [PackController::class, 'create'])
            ->name('add_packs');


        //gestion des routes pour le forumlaire de contact
        Route::get('/admin/admin_contact_form', [AdminController::class, 'admin_contact_form'])
            ->name('admin_contact_form');

        Route::get('/admin/supprimer_messages/{id}', [AdminController::class, 'supprimer_messages'])
            ->name('supprimer_messages');




        //getion des banniers
        Route::get('/admin/banner/index', [BannersController::class, 'index'])
            ->name('banner.index');
        Route::get('/admin/banner/{id}', [BannersController::class, 'index_update'])
            ->name('banner.update');
    });




    //reserver au developper
    Route::group(['middleware' => 'developper'], function () {
        Route::get('/admin/developper', [DevelopperController::class, 'developper'])
            ->name('developper');
        Route::get('/admin/add-template', [DevelopperController::class, 'add_template'])
            ->name('add-template');
        Route::get('/admin/edit-template/{id}', [DevelopperController::class, 'edit_template'])
            ->name('edit-template');
        Route::post('/admin/post-template', [DevelopperController::class, 'post_template'])
            ->name('post-template');
        Route::get('/admin/importation-excel', [DevelopperController::class, 'importation_excel'])
            ->name('importation_excel');
    });



});





require __DIR__ . '/auth.php';
