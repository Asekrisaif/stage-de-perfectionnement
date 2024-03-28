<?php
// app/Http/Controllers/UtilisateurController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Hash;
use Session;
use Barryvdh\DomPDF\Facade\Pdf;


class UtilisateurController extends Controller
{
    public function index()
    {
        // Vous devrez obtenir la liste des utilisateurs depuis la base de données
        // Pour l'instant, je vais simplement retourner la vue
        $utilisateurs= Utilisateur::paginate(10);
        return view('utilisateur.index', compact('utilisateurs'));
    }

    public function ajouter_utilisateur()
    {
        return view('utilisateur.ajouter');
    }
    public function ajouter_utilisateur_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required', 
            'password' => 'required|min:8', // Ajout de la virgule ici
            'role' => 'required',
        ]);
        $utilisateurs=new Utilisateur ();
        $utilisateurs->nom=$request->nom;
        $utilisateurs->prenom=$request->prenom;
        $utilisateurs->email=$request->email;
        $utilisateurs->password=$request->password;
        $utilisateurs->role=$request->role;
        $utilisateurs->save();
        return redirect('/utilisateurs')->with('status','utilisateurs a bien été ajouté avec succes.');
    }
    public function update_utilisateur($id){
        $utilisateurs=Utilisateur::find($id);
        return view('utilisateur.update',compact('utilisateurs'));
    }
    public function update_utilisateur_traitement(Request $request){
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required', 
            'password' => 'required|min:8', // Ajout de la virgule ici
            'role' => 'required',
        ]);
        $utilisateurs= Utilisateur::find ($request->id);
        $utilisateurs->nom=$request->nom;
        $utilisateurs->prenom=$request->prenom;
        $utilisateurs->email=$request->email;
        $utilisateurs->password=$request->password;
        $utilisateurs->role=$request->role;
        $utilisateurs->update();
        return redirect('/utilisateurs')->with('status','utilisateurs a bien été modifier avec succes.');

    }
    public function delete_utilisateur($id){
        try{
        $utilisateurs = Utilisateur ::where ('id',$id) ->delete();
        
        
        return redirect('/utilisateurs')->with('status','utilisateurs a bien été supprimer avec succes.');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    public function login(){
        return view('utilisateur.login');
    }
    public function login_utilisateur(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $utilisateur = Utilisateur::where('email', $request->email)->first();

    if ($utilisateur) {
        if ($request->password == $utilisateur->password) { // Comparaison directe
            session()->put('loginId', $utilisateur->id);
            return redirect('welcome')->with('success', 'Vous êtes connecté.'); // Redirection vers la page de bienvenue
        } else {
            return back()->with('fail', 'Le mot de passe ne correspond pas.');
        }
    } else {
        return back()->with('fail', 'Aucun utilisateur trouvé avec cet e-mail.');
    }
}

public function welcome(){
    return view('welcome');
}
    
    
    public function dashboard(){
        return view('dashboard');
    }

    public function pdfutilisateur()
    {
       $utilisateurs=Utilisateur::get();
       $data=[
        'title'=>'Utilisateur en pdf',
        'date'=>date('m/d/y'),
        'utilisateurs'=>$utilisateurs
       ];

        $pdf = Pdf::loadView('utilisateur.pdfutilisateur', $data);
        return $pdf->download('Utilisateur.pdf');
    }

}
