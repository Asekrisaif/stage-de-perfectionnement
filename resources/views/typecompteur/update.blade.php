<!-- ajouter.blade.php -->

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier TypeCompteur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
  <div class="container ">
    <div class="row">
      <div class="col s12">
        <h1>Modifier un Type Compteur</h1>
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
    <form action="/update/typecompteur" method="POST" class="form-group">
        @csrf
        <input type="hidden" name="id" value="{{ $typecompteur->id }}">
  <div class="form-group">
    <label for="Nom" >nomTypeC</label>
    <input type="text" class="form-control" id="Nom" name="nomTypeC" value="{{$typecompteur->nomTypeC}}">
    <label for="Prenom" >unite</label>
    <input type="text" class="form-control" id="Prenom" name="unite" value="{{$typecompteur->unite}}">
    
   
    </div>
    

  <br>
  <button type="submit" class="btn btn-primary">Modifier un TypeCompteur</button>
  <br><br>
  <a href="/" class="btn btn-danger">Révenir à la page d'accueil</a>
  
</form>
      
</div>
</div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
