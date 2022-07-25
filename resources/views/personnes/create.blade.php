@extends('personnes.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Personne Page</div>
  <div class="card-body">
      
      <form action="{{ url('personne') }}" method="post">
        {!! csrf_field() !!}
        <label>Nom</label></br>
        <input type="text" name="nom" id="nom" class="form-control"></br>
        <label>Prénom(s)</label></br>
        <input type="text" name="prenom" id="prenom" class="form-control"></br>
        <label>Matricule</label></br>
        <input type="text" name="matricule" id="matricule" class="form-control"></br>
        <label>Catégorie</label></br>
        <select name='categorie' class="form-select" aria-label="Default select example">
          <option value="CELLULE">CELLULE</option>
          <option value="PRESSE">PRESSE</option>
          <option value="PARTICIPANT">PARTICIPANT</option>
          <option value="SANTE">SANTE</option>
          <option value="SECURITE">SECURITE</option>
        </select><br>

        <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type=button value="Prendre une photo" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div class="col-md-6">
                <div id="results">Votre Photo apparaitra ici...</div>
            </div>
            
        </div>

        <input type="submit" value="Enregistrer" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 350,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    
    Webcam.attach( '#my_camera' );
    
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }

</script>
@stop