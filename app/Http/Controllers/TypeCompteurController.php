<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeCompteur;
use Barryvdh\DomPDF\Facade\Pdf;

class TypeCompteurController extends Controller
{
    public function index()
    {
        $typecompteurs = TypeCompteur::paginate(10); // 10 éléments par page

        return view('typecompteur.index', compact('typecompteurs'));
    }

    public function ajouter_typecompteur()
    {
        return view('typecompteur.ajouter');
    }

    public function ajouter_typecompteur_traitement(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'nomTypeC' => 'required',
            'unite' => 'required',
        ]);

        // Création d'une nouvelle instance de modèle TypeCompteur
        $typecompteur = new TypeCompteur();

        // Assignation des valeurs des champs du formulaire à l'instance du modèle
        $typecompteur->nomTypeC = $request->input('nomTypeC');
        $typecompteur->unite = $request->input('unite');

        // Sauvegarde de l'instance du modèle dans la base de données
        $typecompteur->save();

        // Redirection avec un message de succès
        return redirect('/type_compteurs')->with('status', 'Le type de compteur a bien été ajouté avec succès.');
    }
    public function update_typecompteur($id){
        $typecompteur=TypeCompteur::find($id);
        return view('typecompteur.update',compact('typecompteur'));

    }
    public function update_typecompteur_traitement(Request $request){
        $request->validate([
            'nomTypeC' => 'required',
            'unite' => 'required',
        ]);

        // Création d'une nouvelle instance de modèle TypeCompteur
        $typecompteur = TypeCompteur::find($request->id);

        // Assignation des valeurs des champs du formulaire à l'instance du modèle
        $typecompteur->nomTypeC = $request->input('nomTypeC');
        $typecompteur->unite = $request->input('unite');
        $typecompteur->update();
        return redirect('/type_compteurs')->with('status','typecompteur a bien été modifier avec succes.');
        
}
public function delete_typecompteur($id)
    {
        try {
            $typecompteur = TypeCompteur::find($id);
            $typecompteur->delete();

            return redirect('/type_compteurs')->with('status', 'La typecompteur a bien été supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect('/type_compteurs')->with('status', 'Une erreur s\'est produite lors de la suppression de la typecompteur.');
        }
    }
    public function pdftypecompteur()
    {
       $typecompteur=TypeCompteur::get();
       $data=[
        'title'=>'Type Compteur en pdf',
        'date'=>date('m/d/y'),
        'typecompteur'=>$typecompteur
       ];

        $pdf = Pdf::loadView('typecompteur.pdftypecompteur', $data);
        return $pdf->download('TypeCompteur.pdf');
    }
    

}