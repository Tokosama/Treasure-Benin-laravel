

@extends("layouts.app")

@section('content')
<div class="mt-5">
    <div class="container-lg ">
        <div class="text-center ">
            <h2>Modifiez l'Oeuvre</h2>
            <p class="lead"> Remplissez les champs de L'Oeuvre</p>
        </div>
       <div class="row justify-content-center my-5">
        <div class="col-8">
            <form action={{route('oeuvre.update',compact('oeuvre'))}} method="post">
                @csrf
                @method('put')
    
                <div class="mb-4">
                    <label for="" class="form-label">Nom de l'oeuvre</label>
                    <input type="text" value={{$oeuvre->nom}}  name="nom" id="nome " class="form-control">
                </div>
                <div class="mb-4">
                    <label for="" class="form-label">Description</label>
                    <input type="text" name="description" value={{$oeuvre->description}} id="nome " class="form-control">
                </div>
                <div class="mb-4 ">
                    <label for="" class="form-label">Auteur</label>
    
                    <select class="form-select" name="idArtiste" id="subject">
                        @foreach ($artistes as $artiste)
                            <option value="{{ $artiste->idArtiste }}" 
                                {{ $oeuvre->idArtiste == $artiste->idArtiste ? 'selected' : '' }}>
                                {{ $artiste->nom }} {{ $artiste->prenom }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4 ">
                    <label for="" class="form-label">Categorie</label>
    
                    <select class="form-select" name="idCategorie" id="subject">
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->idCategorie }}" 
                                {{ $oeuvre->idCategorie == $categorie->idCategorie ? 'selected' : '' }}>
                                {{ $categorie->nomCategorie }}
                            </option>
                        @endforeach
                    </select>
                    
                </div>
                <div class="mb-4">
                    <label for="" class="form-label" >Annee</label>
                    <input type="number" name="annnee" id="nome " value={{$oeuvre->annnee}} class="form-control">
                </div>   
                <div class="text-center">
                    <input type="submit" class="btn btn-primary w-100" value="Modifiez l'oeuvre">

                </div>
            </form>
            <div class="mt-5">
                <a href="/oeuvre/" class="btn btn-secondary">Retour</a>

            </div>
        </div>
       </div>

    </div>
</div>
@endsection