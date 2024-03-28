<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>liste local</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
  <div class="container ">
    <div class="row">
      <div class="col s12">
        <h1>Ajouter un local</h1>
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
    <form action="/ajouter/locals" method="POST" class="form-group">
        @csrf
  <div class="form-group">
    <label for="Nom" >nomLocal</label>
    <input type="text" class="form-control" id="Nom" name="nomLocal">
    <label for="Nom" >adresseLocal</label>
    <input type="text" class="form-control" id="Nom" name="adresseLocal">
    <label for="number" >ContactLocal</label>
    <input type="number" class="form-control" id="ContactLocal" name="contactLocal">
    <label for="Region">Region</label>
<select class="form-control" id="Region" name="region_id">
    <option value="">Sélectionner une région</option>
    @foreach ($regions as $region)
        <option value="{{ $region->id }}">{{ $region->name }}</option>
    @endforeach
</select>

<label for="utilisateur_id">Utilisateur</label>
<select name="utilisateur_id" class="form-control">
    <option value="">Sélectionner un utilisateur</option>
    @foreach($utilisateurs as $utilisateur)
        <option value="{{ $utilisateur->id }}">{{ $utilisateur->nom }}</option>
    @endforeach
</select>

<label for="famille_id">Famille</label>
<select name="famille_id" class="form-control">
    <option value="">Sélectionner une famille</option>
    @foreach($familles as $famille)
        <option value="{{ $famille->id }}">{{ $famille->nomFamille }}</option>
    @endforeach
</select>



    </div>

   
    
   
   

  <br>
  <button type="submit" class="btn btn-primary">Ajouter un local</button>
  <br><br>
  <a href="/" class="btn btn-danger">Révenir à la page d'accueil</a>
  
</form>
      

</div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>