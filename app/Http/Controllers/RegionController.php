<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use Barryvdh\DomPDF\Facade\Pdf;

class RegionController extends Controller
{
    public function index()
    {
        $regions= Region::paginate(10);
        return view('region.index', compact('regions'));
    }

    public function ajouter_region()
    {
        return view('region.ajouter');
    }

    public function ajouter_region_traitement(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'nomRegion' => 'required', // Utilisez 'nomRegion' au lieu de 'nom'
        ]);
        
        // Création d'une nouvelle instance de modèle Region
        $regions = new Region();

        // Assignation de la valeur du champ nomRegion à l'instance du modèle
        $regions->nomRegion = $request->nomRegion;

        // Sauvegarde de l'instance du modèle dans la base de données
        $regions->save();

        // Redirection avec un message de succès
        return redirect('/regions')->with('status', 'La région a bien été ajoutée avec succès.');
    }
    public function update_region($id){
        $region= Region::find($id);
        return view("region.update",compact("region"));
    }
    public function update_region_traitement(Request $request){
        $request->validate([
            'nomRegion' => 'required', // Utilisez 'nomRegion' au lieu de 'nom'
        ]);
        
        // Création d'une nouvelle instance de modèle Region
        $regions = Region::find($request->id);

        // Assignation de la valeur du champ nomRegion à l'instance du modèle
        $regions->nomRegion = $request->nomRegion;

        // Sauvegarde de l'instance du modèle dans la base de données
        $regions->update();

        // Redirection avec un message de succès
        return redirect('/regions')->with('status', 'La région a bien été Modifier avec succès.');
    }
    public function delete_region($id)
{
    try {
        $region = Region::find($id);
        $region->delete();

        return redirect('/regions')->with('status', 'La région a bien été supprimée avec succès.');
    } catch (\Exception $e) {
        return redirect('/regions')->with('status', 'Une erreur s\'est produite lors de la suppression de la région.');
    }
}
public function pdfregion()
{
    $regions = Region::get(); // Renommez la variable en $regions pour correspondre au nom standard
    $data = [
        'title' => 'Region en PDF',
        'date' => date('m/d/y'),
        'region' => $regions, // Renommez la variable en $region pour correspondre au nom utilisé dans le modèle
    ];

    $pdf = Pdf::loadView('region.pdfregion', $data);
    return $pdf->download('Region.pdf');
}



}
