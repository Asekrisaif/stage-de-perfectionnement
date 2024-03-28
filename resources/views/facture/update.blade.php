<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier facture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
  <div class="container ">
    <div class="row">
      <div class="col s12">
        <h1>Modifier un facture</h1>
        <hr>
        @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
        @endif
        <ul>
            @foreach($errors->all() as $error)
            <li class="alert alert-danger"> {{$error}}</li>
            @endforeach
        </ul>
    <form action="/update/facture" method="POST" class="form-group">
        @csrf
        <input type="hidden" name="id" value="{{ $facture->id }}">
  <div class="form-group">
        <label for="montantFacture">Montant Facture</label>
        <input type="number" class="form-control" id="montantFacture" name="montantFacture" value="{{ $facture->montantFacture }}">
    

    <label for="number" >periode</label>
    <input type="number" class="form-control" id="Nom" name="periode" value="{{ $facture->periode}}">
   

    <label for="text" >adresse</label>
    <input type="text" class="form-control" id="Nom" name="adresse"value="{{ $facture->adresse }}">
   

    <label for="NomClient">Nom Client</label>
        <input type="text" class="form-control" id="NomClient" name="NomClient" value="{{ $facture->NomClient}}">
    

    <label for="Nom" >adresseClient</label>
    <input type="text" class="form-control" id="Nom" name="adresseClient"value="{{ $facture->adresseClient}}">
    

    <label for="Date" >dateFacture</label>
    <input type="date" class="form-control" id="Nom" name="dateFacture" value="{{ $facture->dateFacture }}">
  

    <label for="Date" >dateDebutConsommation</label>
    <input type="date" class="form-control" id="Nom" name="dateDebutConsommation" value="{{ $facture->dateDebutConsommation }}">
    

    <label for="Nom" >NomFamille</label>
    <input type="text" class="form-control" id="Nom" name="nom" value="{{ $facture->nom}}">
    

    <label for="Date" >dateFinConsommation</label>
    <input type="date" class="form-control" id="Nom" name="dateFinConsommation" value="{{ $facture->dateFinConsommation}}">
    

    <label for="number" >prixUnitaire</label>
    <input type="number" class="form-control" id="Nom" name="prixUnitaire" value="{{ $facture->prixUnitaire }}">
    

    <label for="number" >montantHorsTaxes</label>
    <input type="number" class="form-control" id="Nom" name="montantHorsTaxes" value="{{ $facture->montantHorsTaxes }}">


    <label for="totaleTaxes">Totale Taxes</label>
        <input type="number" class="form-control" id="totaleTaxes" name="totaleTaxes" value="{{ $facture->totaleTaxes }}">
    

    <label for="number" >montantTotale</label>
    <input type="number" class="form-control" id="Nom" name="montantTotale" value="{{ $facture->montantTotale }}">

    <label for="dateLimitePaiement">Date Limite Paiement</label>
        <input type="date" class="form-control" id="dateLimitePaiement" name="dateLimitePaiement" value="{{ $facture->dateLimitePaiement }}">

        
   <label for="compteur_id">Compteur</label>
<select name="compteur_id" class="form-control" value="{{ $facture->id }}">
    <option value="">Sélectionner un compteur</option>
    <!-- Boucle sur la liste des compteurs pour les afficher en tant qu'options -->
    @foreach($compteurs as $compteur)
        <option value="{{ $compteur->id }}">{{ $compteur->modele }}</option>
    @endforeach
</select>


    
    </div>
    
    
  <br>
  <button type="submit" class="btn btn-primary">Modifier un Facture</button>
  <br><br>
  <a href="/" class="btn btn-danger">Révenir à la page d'accueil</a>
  
</form>
      
 
</div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>