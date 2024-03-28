<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facture;
use App\Models\Compteur;
use Barryvdh\DomPDF\Facade\Pdf;
class FactureController extends Controller
{
    public function index()
    {
        $factures= Facture ::paginate(10);
        $compteurs=Compteur::paginate(10);
        return view('facture.index', compact('factures','compteurs'));

    }
    public function ajouter_facture()
    {
        $factures= Facture::all();
        return view('facture.ajouter', compact('factures'));
    }
    public function ajouter_facture_traitement(Request $request)
    {
        $request->validate([
            'montantFacture' => 'required',
            'periode' => 'required',
            'adresse' => 'required', 
            'NomClient' => 'required',
            'adresseClient' => 'required',
            'dateFacture' => 'required',
            'dateDebutConsommation' => 'required',
            'dateFinConsommation' => 'required',
            'prixUnitaire' => 'required',
            'montantHorsTaxes' => 'required',
            'totaleTaxes' => 'required',
            'montantTotale' => 'required',
            'dateLimitePaiement' => 'required',
            'compteur_id' => 'required', // Ajoutez cette règle de validation pour le champ compteur_id
        ]);
        
        
        $facture = new Facture();
        $facture->montantFacture = $request->montantFacture;
        $facture->periode = $request->periode;
        $facture->adresse = $request->adresse;
        $facture->nomClient = $request->NomClient; // Utilisez $request->NomClient
        $facture->adresseClient = $request->adresseClient;
        
        $facture->dateFacture = $request->dateFacture;
        $facture->dateDebutConsommation = $request->dateDebutConsommation;
        $facture->dateFinConsommation = $request->dateFinConsommation;
        $facture->prixUnitaire = $request->prixUnitaire;
        $facture->montantHorsTaxes = $request->montantHorsTaxes;
        $facture->totaleTaxes = $request->totaleTaxes;
        $facture->montantTotale = $request->montantTotale;
        $facture->dateLimitePaiement = $request->dateLimitePaiement;
        $facture->compteur_id = $request->compteur_id;
        $facture->save();
    
        return redirect('/factures')->with('status','La facture a bien été ajoutée avec succès.');
    }
    public function update_facture($id)
    {
        $facture = Facture::find($id);
        $compteurs = Compteur::all();
        return view('facture.update', compact('facture', 'compteurs'));
    }  
    public function update_facture_traitement(Request $request)
    {
        $request->validate([
            'montantFacture' => 'required',
            'periode' => 'required',
            'adresse' => 'required', 
            'NomClient' => 'required',
            'adresseClient' => 'required',
            'dateFacture' => 'required',
            'dateDebutConsommation' => 'required',
            'dateFinConsommation' => 'required',
            'prixUnitaire' => 'required',
            'montantHorsTaxes' => 'required',
            'totaleTaxes' => 'required',
            'montantTotale' => 'required',
            'dateLimitePaiement' => 'required',
            'compteur_id' => 'required', // Ajoutez cette règle de validation pour le champ compteur_id
        ]);
        
        
        $facture =  Facture::find($request->id);
        $facture->montantFacture = $request->montantFacture;
        $facture->periode = $request->periode;
        $facture->adresse = $request->adresse;
        $facture->nomClient = $request->NomClient; // Utilisez $request->NomClient
        $facture->adresseClient = $request->adresseClient;
        
        $facture->dateFacture = $request->dateFacture;
        $facture->dateDebutConsommation = $request->dateDebutConsommation;
        $facture->dateFinConsommation = $request->dateFinConsommation;
        $facture->prixUnitaire = $request->prixUnitaire;
        $facture->montantHorsTaxes = $request->montantHorsTaxes;
        $facture->totaleTaxes = $request->totaleTaxes;
        $facture->montantTotale = $request->montantTotale;
        $facture->dateLimitePaiement = $request->dateLimitePaiement;
        $facture->compteur_id = $request->compteur_id;
        $facture->update();

        return redirect('/factures')->with('status','La facture a bien été modifier avec succès.');
    }
    public function delete_facture($id)
    {
        try {
            $factures = Facture::find($id);
            $factures->delete();

            return redirect('/factures')->with('status', 'La facture a bien été supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect('/factures')->with('status', 'Une erreur s\'est produite lors de la suppression de la facture.');
        }
    }
    public function facturepdf()
    {
        $facture = Facture::get();
        $data = [
            'title' => 'Facture en PDF',
            'date' => date('m/d/y'),
            'facture' => $facture
        ];
    
        $pdf = Pdf::loadView('facture.facturepdf', $data);
        return $pdf->download('facture.pdf');
    }

}