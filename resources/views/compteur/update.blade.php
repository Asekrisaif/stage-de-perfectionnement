<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier Compteur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
  <div class="container ">
    <div class="row">
      <div class="col s12">
        <h1>Modifier un Compteur</h1>
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
    <form action="/update/compteur" method="POST" class="form-group">
        @csrf
        <input type="hidden" name="id" value="{{ $compteur->id }}">
  <div class="form-group">
  <label for="moyConsommation">Moyenne de consommation</label>
<input type="number" class="form-control" id="moyConsommation" name="moyConsommation" required value="{{$compteur->moyConsommation}}">

    

    <label for="number" >numSerie</label>
    <input type="number" class="form-control" id="Nom" name="numSerie" value="{{ $compteur->numSerie }}">
   

    <label for="text" >modele</label>
    <input type="text" class="form-control" id="Nom" name="modele" value="{{ $compteur->modele}}">
   

    <label for="date" >dateInstallation</label>
    <input type="date" class="form-control" id="Nom" name="dateInstallation" value="{{ $compteur->dateInstallation}}">
    

    <label for="Nom" >marque</label>
    <input type="text" class="form-control" id="Nom" name="marque" value="{{ $compteur->marque}}">

    <label for="local_id">Local</label>
    <select name="local_id" class="form-control">
    <option value="">Sélectionner un Local</option>
    <!-- Boucle sur la liste des locaux pour les afficher en tant qu'options -->
    @foreach($local as $local)
        <option value="{{ $local->id }}">{{ $local->nomLocal}}</option>
    @endforeach
</select>


<label for="typecompteur_id">TypeCompteur</label>
<select name="typecompteur_id" class="form-control">
    <option value="">Sélectionner un typecompteur</option>
    <!-- Boucle sur la liste des types de compteurs pour les afficher en tant qu'options -->
    @foreach($typecompteur as $typecompteur)
        <option value="{{ $typecompteur->id }}">{{ $typecompteur->nomTypeC }}</option>
    @endforeach
</select>

    

   
    
    </div>
    
    
  <br>
  <button type="submit" class="btn btn-primary">Ajouter un Compteur</button>
  <br><br>
  
</form>
      
 
</div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>