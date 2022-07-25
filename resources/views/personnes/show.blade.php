@extends('personnes.layout')
@section('content')
 
 


<div class="container-fluid">
  <div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col my-5">
      <div class="card text-center" id="test"  style="background-color: white; height: 720px; width: 576px; ">

        <div class="card-body">

          <h2 class="text-center my-2">DIALOGUE NATIONAL INCLUSIF</h2>
          <div class="row py-4">
              <div class="col">
                <img class="img-thumbnail" src="{{ url('img.jpg') }}"  />
              </div>
              <div class="col">
                {!! QrCode::size(250)->generate( "Email : $Personnes->nom"); !!}
              </div>
          </div><hr>
          <div class="row">
              <h2 class="card-title">{{ $Personnes->nom }} {{ $Personnes->prenom }}</h2>
              <h2 class="text-danger"> {{$Personnes->matricule}} </h2>
          </div>
        
        </div>
        @if($Personnes->categorie == 'PRESSE')
        <div class="card-footer pb-5 bg-warning border-warning">
                <h1> {{$Personnes->categorie}} </h1><br>
        </div>
        @elseif(($Personnes->categorie == 'SECURITE'))
        <div class="card-footer pb-5 bg-danger border-danger">
                <h1> {{$Personnes->categorie}} </h1><br>
        </div>
        @elseif(($Personnes->categorie == 'CELLULE'))
        <div class="card-footer pb-5 bg-primary border-primary">
                <h1> {{$Personnes->categorie}} </h1><br>
        </div>
        @elseif(($Personnes->categorie == 'SANTE'))
        <div class="card-footer pb-5 bg-success border-success">
                <h1> {{$Personnes->categorie}} </h1><br>
        </div>
        @endif
      
              
        </div>
      </div>
    </div>
    <div class="col my-5">
      <button class="btn btn-primary" id="dl">Download</button>
    </div>        
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script language="JavaScript">
  const btn = document.getElementById('dl');
console.log(btn);
  document.getElementById("dl").onclick = function() {
        const screenshotTarget = document.getElementById('test');

        html2canvas(screenshotTarget).then((canvas) => {
            const base64image = canvas.toDataURL("image/png");
            var anchor = document.createElement('a');
            anchor.setAttribute("href", base64image);
            anchor.setAttribute("download", "my-image.png");
            anchor.click();
            anchor.remove();
        });
    };

</script>