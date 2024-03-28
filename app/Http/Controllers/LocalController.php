<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Local;
use App\Models\Region;
use App\Models\Famille;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class LocalController extends Controller
{
    public function index()
{
    $regions= Region::paginate(10);
    $familles= Famille::paginate(10);
    $utilisateurs= Utilisateur::paginate(10);

    $locals = Local::paginate(10); // Fetch the local data from your database
    return view('local.index', compact('locals','regions','familles','utilisateurs'));
}


    public function ajouter_local()
    {
        $regions = Region::all();
        $utilisateurs = Utilisateur::all();
        $familles = Famille::all();
        

        // Passer les régions à la vue
        return view('local.ajouter', compact('regions', 'utilisateurs', 'familles'));
    }

    public function ajouter_local_traitement(Request $request)
    {
        $request->validate([
            'nomLocal' => 'required',
            'adresseLocal' => 'required',
            'contactLocal' => 'required',
            'region_id' => 'required', // Assurez-vous que ces champs sont requis
            'utilisateur_id' => 'required',
            'famille_id' => 'required',
        ]);

        $local = new Local();
        $local->nomLocal = $request->nomLocal;
        $local->adresseLocal = $request->adresseLocal;
        $local->contactLocal = $request->contactLocal;
        $local->region_id = $request->region_id; // Assignez les valeurs des champs région, utilisateur et famille
        $local->utilisateur_id = $request->utilisateur_id;
        $local->famille_id = $request->famille_id;

        $local->save();

        return redirect('/locals')->with('status', 'Le local a bien été ajouté avec succès.');
    }

    public function update_local($id)
    {
        $local = Local::find($id);
        $regions = Region::all();
       $utilisateurs= Utilisateur::all();
       $familles =Famille::all();
    
        // Passer les données à la vue
        return view("local.update", compact("local","regions","utilisateurs","familles"));
    }

    public function update_local_traitement(Request $request)
    {
        $request->validate([
            'nomLocal' => 'required',
            'adresseLocal' => 'required',
            'contactLocal' => 'required',
            'region_id' => 'required', // Assurez-vous que ces champs sont requis
            'utilisateur_id' => 'required',
            'famille_id' => 'required',
        ]);

        $local= Local::find($request->id);
        $local->nomLocal = $request->nomLocal;
        $local->adresseLocal = $request->adresseLocal;
        $local->contactLocal = $request->contactLocal;
        $local->region_id = $request->region_id; // Assignez les valeurs des champs région, utilisateur et famille
        $local->utilisateur_id = $request->utilisateur_id;
        $local->famille_id = $request->famille_id;

        $local->update();

        return redirect('/locals')->with('status', 'Le local a bien été modifiée avec succès.');
    }
    public function delete_local($id)
    {
        try {
            $locals = Local::find($id);
            $locals->delete();

            return redirect('/locals')->with('status', 'La local a bien été supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect('/tlocals')->with('status', 'Une erreur s\'est produite lors de la suppression de la local.');
        }
    }
    public function pdflocal()
    {
        $local = Local::get(); // Assurez-vous que votre modèle est correctement utilisé (Local::get() au lieu de Region::get())
        $data = [
            'title' => 'Local en PDF',
            'date' => date('m/d/y'),
            'local' => $local // Assurez-vous que le nom de la variable correspond à celle utilisée dans le modèle (local au lieu de Local)
        ];
    
        $pdf = Pdf::loadView('local.pdflocal', $data);
        return $pdf->download('Local.pdf');
    }
    

}
