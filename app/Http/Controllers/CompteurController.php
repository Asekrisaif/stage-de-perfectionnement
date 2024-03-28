<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compteur;
use App\Models\TypeCompteur;
use App\Models\Local;

class CompteurController extends Controller
{
    public function moyconsommation()
    {
        // Récupérer les données de Compteurs
        $compteurs = Compteur::selectRaw('YEAR(dateInstallation) as year, SUM(moyConsommation) as total')
        ->groupBy('year')
        ->orderBy('year')
        ->get();
    
        // Définir les labels des années
        $labels = [];
        $data = [];
    
        // Remplir les données pour chaque année
        foreach ($compteurs as $compteur) {
            $labels[] = $compteur->year;
            $data[] = $compteur->total;
        }
    
        // Créer le tableau de datasets pour Chart.js
        $datasets = [
            [
                'label' => 'Total de moyenne de consommation par année',
                'backgroundColor' => '#FF6384', // Nouvelle couleur de fond pour le graphique (rouge)
                'data' => $data
            ]
        ];
    
        return view('compteur.moyconsommation', compact('labels', 'datasets'));
    }
    


    public function graphe()
    {
        // Récupérer les données de Compteurs
        $Compteurs = Compteur::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Définir $labels et $datasets
        $labels = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
        $data = [];
        $colors = ['#FF6384', '#36A2EB', '#FFCE56', '#8BC34A', '#FF5722', '#009688', '#795548', '#9C27B0', '#2196F3', '#FF9800', '#CDDC39', '#607D8B'];

        // Calculer les données pour chaque mois
        for ($i = 1; $i <= 12; $i++) {
            $count = 0;
            foreach ($Compteurs as $Compteur) {
                if ($Compteur->month == $i) {
                    $count = $Compteur->count;
                    break;
                }
            }
            array_push($data, $count);
        }

        $datasets = [
            [
                'label' => 'compteur',
                'backgroundColor' => $colors,
                'data' => $data
            ]
        ];

        return view('compteur.graphe', compact('labels', 'datasets'));
    }




    public function index()
    {
        
        $compteurs = Compteur::paginate(10);
        $locals = Local::all();
        $typecompteurs = TypeCompteur::all();
    
        return view('compteur.index', compact('compteurs', 'locals', 'typecompteurs'));
    }
    
    public function ajouter_compteur()
    {
        $local= Local::all();
        $typecompteurs= TypeCompteur::all();
        return view('compteur.ajouter', compact('local','typecompteurs'));
    }
    public function ajouter_compteur_traitement(Request $request)
    {
        $request->validate([
            'moyConsommation' => 'required',
            'numSerie' => 'required',
            'modele' => 'required', 
            'dateInstallation' => 'required', 
            'marque' => 'required',
            'typecompteur_id'=>'required',
            'local_id'=>'required',
        ]);
        $compteurs=new Compteur ();
        $compteurs->moyConsommation=$request->moyConsommation;
        $compteurs->numSerie=$request->numSerie;
        $compteurs->modele=$request->modele;
        $compteurs->dateInstallation=$request->dateInstallation;
        $compteurs->marque=$request->marque;
        $compteurs->typecompteur_id=$request->typecompteur_id;
        $compteurs->local_id=$request->local_id;
        $compteurs->save();
        return redirect('/compteurs')->with('status','compteurs a bien été ajouté avec succes.');
    }
    public function update_compteur($id){
        $compteur= Compteur::find($id);
        $local= Local::all();
        $typecompteur = TypeCompteur::all();
        return view("compteur.update",compact('compteur','local','typecompteur'));
    }
    public function update_compteur_traitement(Request $request)
    {
        $request->validate([
            'moyConsommation' => 'required',
            'numSerie' => 'required',
            'modele' => 'required', 
            'dateInstallation' => 'required', 
            'marque' => 'required',
            'typecompteur_id'=>'required',
            'local_id'=>'required',
        ]);
        $compteurs= Compteur ::find($request->id);
        $compteurs->moyConsommation=$request->moyConsommation;
        $compteurs->numSerie=$request->numSerie;
        $compteurs->modele=$request->modele;
        $compteurs->dateInstallation=$request->dateInstallation;
        $compteurs->marque=$request->marque;
        $compteurs->typecompteur_id=$request->typecompteur_id;
        $compteurs->local_id=$request->local_id;
        $compteurs->update();
        return redirect('/compteurs')->with('status','compteurs a bien été modifier avec succes.');
    }
    public function delete_compteur($id)
{
    try {
        $compteur = Compteur::findOrFail($id);
        
        // Vérifier s'il existe des factures liées à ce compteur
        if ($compteur->factures->isNotEmpty()) {
            return redirect('/compteurs')->with('status', 'Impossible de supprimer ce compteur car il existe des factures associées.');
        }

        $compteur->delete();

        return redirect('/compteurs')->with('status', 'Le compteur a été supprimé avec succès.');
    } catch (\Exception $e) {
        return redirect('/compteurs')->with('status', 'Une erreur s\'est produite lors de la suppression du compteur.');
    }
}

    

}

