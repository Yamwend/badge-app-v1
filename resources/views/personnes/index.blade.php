@extends('personnes.layout')
@section('content')
    <div class="container">
        <div class="row">
 
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Laravel 9 Crud</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/personne/create') }}" class="btn btn-success btn-sm" title="Add New personne">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Prénom(s)</th>
                                        <th>Matricule</th>
                                        <th>Catégorie</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($Personnes as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nom }}</td>
                                        <td>{{ $item->prenom }}</td>
                                        <td>{{ $item->matricule }}</td>
                                        <td>{{ $item->categorie }}</td>
 
                                        <td>
                                            <a href="{{ url('/personne/' . $item->id) }}" title="View personne" desabled><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/personne/' . $item->id . '/edit') }}" title="Edit personne"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                            <form method="POST" action="{{ url('/personne' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete personne" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="container-fluid py-5">
<div class="row row-cols-1 row-cols-md-2 g-4">
@foreach($Personnes as $item)
  <div class="col">
    <div class="card text-center">
      
      <div class="card-body">
        <h2 class="text-center my-2">DIALOGUE NATIONAL INCLUSIF</h2>
        <div class="row py-4">
            <div class="col">
            <img class="img-thumbnail" src="{{ url('img.jpg') }}"  />
            </div>
            <div class="col">
            {!! QrCode::size(250)->generate( "Email : $item->nom"); !!}
            </div>
        </div><hr>
        <div class="row">
            <h3 class="card-title">{{ $item->nom }} {{ $item->prenom }}</h3>
            <h4 class="text-danger"> {{$item->matricule}} </h4>
        </div>
       
      </div>
        @if($item->categorie == 'PRESSE')
        <div class="card-footer bg-warning border-warning">
                <h1> {{$item->categorie}} </h1>
        </div>
        @elseif(($item->categorie == 'SECURITE'))
        <div class="card-footer bg-danger border-danger">
                <h1> {{$item->categorie}} </h1>
        </div>
        @elseif(($item->categorie == 'CELLULE'))
        <div class="card-footer bg-primary border-primary">
                <h1> {{$item->categorie}} </h1>
        </div>
        @elseif(($item->categorie == 'SANTE'))
        <div class="card-footer bg-success border-success">
                <h1> {{$item->categorie}} </h1>
        </div>
        @endif
        </div>
    </div>
  @endforeach
</div>
</div>
@endsection