<?php

namespace App\Http\Controllers;

use App\Models\commandes;
use App\Models\config;
use App\Models\historiques_connexion;
use App\Models\{produits, Category,Marque, Contact, favoris, Service};
use App\Models\User;
use App\Models\views;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportUser;
use App\Http\Traits\ListGouvernorats;
use App\Models\clients;
use App\Models\contenu_commande;
use App\Models\domaines;
use App\Models\Sponsor;
use App\Models\Event;
use App\Models\Image;
use App\Models\Video;
use App\Models\notifications;
use App\Models\templates;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\{OrderChangeStatut, ChangeStatut};
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    use ListGouvernorats;

    public function comptes(){
        $commmandes= commandes::where('user_id', auth()->id() )->get();
        return view('front.comptes.commandes' , compact('commandes'));
     }

     public function favories(){
        $favorie= favoris::where('user_id', auth()->id() )->get();
        return view('front.comptes.favoris' , compact('favoris'));
     }

     public function admin_contact_form(){
        $contacts = Contact::paginate(100);
        return view('admin.contacts.list', compact('contacts'));
     }

     public function supprimer_messages(Request $request , $id){
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->back()->with('success', 'Message supprimé avec succès');;

     }

    public function dashboard(Request $request)
    {

        //veification des permissions
          if (auth()->user()->can('dashboard')) {
        }
         elseif (auth()->user()->can('product_view')) 
         {
            return redirect()->route('produits');}

            elseif (auth()->user()->can('sponsor_view')) 
         { return redirect()->route('sponsors');}
         elseif (auth()->user()->can('event_view')) 
         { return redirect()->route('events');}
         elseif (auth()->user()->can('video_view')) 
         { return redirect()->route('videos');}
         
            elseif (auth()->user()->can('order_view')) {
            return redirect()->route('commandes');
        } elseif (auth()->user()->can('clients_view')) {
            return redirect()->route('clients');
        } else {
           // return "Veuillez demande a l'administrateur de vous attribuer des permissions.";
           return redirect('/');
        } 
 

        $currentYear = date('Y');

        $currentYear2 = Carbon::now()->year;


        // Format ISO 8601 (YYYY-MM-DD)
        $firstDayOfYearISO = Carbon::createFromDate($currentYear2, 1, 1)->startOfDay()->format('Y-m-d');
        $lastDayOfYearISO = Carbon::createFromDate($currentYear2, 12, 31)->endOfDay()->format('Y-m-d');



        $date_debut = $request->input('date_debut') ??  $firstDayOfYearISO;
        $date_fin = $request->input('date_fin') ?? $lastDayOfYearISO;


        //get statistiques
        $visitsPerMonth = [];
        $videosPerMonth = [];

       
        $inscriptionMonth = [];
       
        for ($i = 1; $i <= 12; $i++) {
            $visitsPerMonth[] = Views::whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $i)
                ->count();
            $videosPerMonth[] = Video::whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $i)->count();

            $inscriptionMonth[] = User::whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $i)
                ->count();
          
        }

        $topUsers = User::withCount('videos')
        ->orderBy('videos_count', 'desc')
        ->take(5) // Limiter aux 10 meilleurs utilisateurs
        ->get();


        $total_visites = views::whereBetween('created_at', [$date_debut, $date_fin])->count();
       
        
        $totalUser = User::whereBetween('created_at', [$date_debut, $date_fin])->count();
        $totalVideos = Video::count();
        $latestVideos = Video::orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            $lastevents = Event::latest()->take(5)->get();
            $lastevent = Event::latest()->take(1)->get();
            $latestVideo = Video::orderBy('created_at', 'desc')->first();
         


            $videosVues = Video::whereHas('views')
            ->withCount('views')
            ->orderBy('views_count', 'desc')
            ->get();
        $totalEvents = Event::count();
        $totalSponsors = Sponsor::count();
       /*  return view('admin.index')
            ->with("totalUser", $totalUser)
            ->with("topUsers " , $topUsers )
            ->with('totalVideos', $totalVideos)
            ->with('totalEvents', $totalEvents)
            ->with('totalSponsors', $totalSponsors)
            ->with('visitsPerMonth', $visitsPerMonth)
            ->with('videosPerMonth', $videosPerMonth)      
            ->with('total_visites', $total_visites)  
            ->with('inscriptionMonth', $inscriptionMonth);        */
           // return('admin.index' , compact('total_visites', 'inscriptionMonth','totalUser','videosPerMonth','totalUsers','totalVideos','totalEvents','totalSponsors'));
           return view('admin.index' , compact('lastevents','lastevent','latestVideo','videosVues','latestVideos','total_visites', 'inscriptionMonth','totalUser','videosPerMonth','topUsers','totalVideos','totalEvents','totalSponsors'));
    }



    public function update_config(Request $request)
    {
        $send_mail_update_commande = $request->input('send_mail_update_commande') ? 1 : 0;
        $config = config::first();
        $config->send_mail_update_commande = $send_mail_update_commande;
        $config->save();

        return redirect()
            ->route('commandes')
            ->with('success', 'Configuration mise à jour avec succès');
    }




    public function export_clients()
    {
        $users = clients::select('nom', 'phone', 'adresse', 'pays', 'gouvernorat')
            ->get();
        return Excel::download(new ExportUser($users), 'users.xlsx');
    }



    public function live_notifications()
    {
        $total = notifications::where("statut", "unread")->count();
        return response()->json(
            [
                'total' => $total
            ]
        );
    }





/////////////////sponsor//////////////

public function sponsors()
{

    $sponsors = Sponsor::all();
    return view('admin.sponsors.list' , compact('sponsors') );
}
//////////////////////events//////////////

public function events()
{
    $events = Event::all();
    return view('admin.evenements.list', compact('events') );
}

///////////////////////Images////////////

public function images()
{
    $images = Image::all();
    return view('admin.images.list', compact('images') );
}

////////////////////////videos////////////

public function videos()
{
    $videos = Video::all();
    return view('admin.videos.list', compact('videos') );
}

public function sponsor_add()
{
    return view('admin.sponsors.add');
}

public function sponsor_update($id){

    $sponsor = Sponsor::find($id);
    if (!$sponsor) {
        $message = "Sponsor non disponible !";
        abort(404, $message);
    } 
    
    return view('admin.sponsors.update', compact('sponsor'));
}








    public function parametres()
    {
        $connexions = historiques_connexion::Orderby("id", "Desc")
            ->where('user_id', Auth::id())
            ->get();

        $ipAddress = request()->ip();
        return view('admin.parametres.index', compact('connexions'));
    }


    public function personnels()
    {
        $personnels = User::where('role', 'personnel')->get();
        return view('admin.personnels.list', compact('personnels'));
    }


 




    public function clients()
    {
        $clients = User::where('role', 'client')->get();
        return view('admin.clients.list', compact('clients'));
    }



    public function contact_admin()
    {
        return view('admin.parametres.contact');
    }

    public function delete_personnel($id)
    {
        $user = User::where("id", '=', $id)->first();
        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'Personnel supprimé avec succès!');
        }
    }


    public function update_permission(Request $request)
    {

        $selectedPermissions = $request->input('permissions', []);
        $user = User::findOrFail($request->input('id'));
        $user->syncPermissions($selectedPermissions);
        return redirect()
            ->back()
            ->with('success', 'Permissions mises à jour avec succès.');
    }
}
