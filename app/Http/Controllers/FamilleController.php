<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Famille;
use Barryvdh\DomPDF\Facade\Pdf;
class FamilleController extends Controller
{
    public function index()
    {
        $familles= Famille::paginate(10);
        return view('famille.index', compact('familles'));
    }
    public function ajouter_famille()
    {
        return view('famille.ajouter');
    }
    public function ajouter_famille_traitement(Request $request)
    {
        $request->validate([
            'nomFamille' => 'required',
        ]);
        
            
        
        $famille = new Famille();
        $famille->nomFamille = $request->nomFamille;
        $famille->save();

        return redirect('/familles')->with('status','L\familles a bien été ajouté avec succes.');
    }
    public function update_famille($id){
        $famille= Famille::find($id);
        return view("famille.update",compact("famille"));
    }

    public function update_famille_traitement(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'nomFamille' => 'required', // Utilisez 'nomRegion' au lieu de 'nom'
        ]);
        $famille =  Famille::find($request->id);
        $famille->nomFamille = $request->nomFamille;
        $famille->update();

        return redirect('/familles')->with('status','L\familles a bien été modifier avec succes.');
        
    
    
}
public function delete_famille($id)
    {
        try {
            $famille = Famille::find($id);
            $famille->delete();

            return redirect('/familles')->with('status', 'La famille a bien été supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect('/familles')->with('status', 'Une erreur s\'est produite lors de la suppression de la famille.');
        }
    }
    public function famillepdf()
{
    $famille = Famille::get();
    $data = [
        'title' => 'Famille en PDF',
        'date' => date('m/d/y'),
        'famille' => $famille
    ];

    $pdf = Pdf::loadView('famille.famillepdf', $data);
    return $pdf->download('famille.pdf');
}

}