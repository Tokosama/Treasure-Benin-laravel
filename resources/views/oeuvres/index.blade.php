@extends('layouts.app')

@section('content')
<div class="text-center mb-5">
        <div class="container mt-3">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
             @endif
            <h1>Oeuvre Du BENIN</h1>
            <p class="lead"> Welcome to our webste</p>
            <a href="/oeuvre/create" class="btn btn-primary">Ajouter une oeuvre</a>

        </div>

        
</div>
<div class="container">
    <table class="table table-responsive table-hover text-center table-bordered">
        <thead class="table-active table-secondary">
            <tr>
                <th>OEUVRE</th>
                <th>Auteur</th>
                <th>Annee</th>
                <th>Categorie</th>
                <th>Actions</th>   
            </tr>
        </thead>
        <tbody>
            @foreach ( $oeuvres as $oeuvre )
            <tr>
                <td>{{$oeuvre->nom}}</td>
                <td>{{ $oeuvre->artiste->prenom }} {{ $oeuvre->artiste->nom }}</td>
                <td>{{$oeuvre->annnee}}</td>
                <td>{{$oeuvre->categorie->nomCategorie}}</td>
                <td class="d-flex justify-content-between">
                    <div>
                        <a href={{route('oeuvre.edit',['oeuvre'=>$oeuvre->idOeuvre])}} class="btn btn-success"> Modifier </a>
                    </div>
                    <form action={{route('oeuvre.destroy',['oeuvre'=>$oeuvre])}} method="post"  onsubmit="return confirmDelete()">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="delete">
                    </form>
                </td>
       


            </tr>
            @endforeach
    
        </tbody>
        <script>
            function confirmDelete() {
                return confirm("Êtes-vous sûr de vouloir supprimer ce produit ?");
            }
        </script>
    </table>
</div>


@endsection