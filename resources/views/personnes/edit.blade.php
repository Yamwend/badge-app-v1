@extends('personnes.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
      
      <form action="{{ url('personne/' .$Personnes->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$Personnes->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$Personnes->nom}}" class="form-control"></br>
        

        <label>Prénom(s)</label></br>
        <input type="text" name="prenom" id="prenom" value="{{$Personnes->prenom}}" class="form-control"></br>
        <label>Matricule</label></br>
        <input type="text" name="matricule" id="matricule" value="{{$Personnes->matricule}}" class="form-control"></br>
        <label>Catégorie</label></br>
        <select name='categorie' class="form-select" aria-label="Default select example">
          <option value="CELLULE">CELLULE</option>
          <option value="PRESSE">PRESSE</option>
          <option value="PARTICIPANT">PARTICIPANT</option>
          <option value="SANTE">SANTE</option>
          <option value="SECURITE">SECURITE</option>
        </select><br>
        <input type="submit" value="Modifier" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop