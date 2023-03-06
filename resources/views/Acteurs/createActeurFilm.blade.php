@extends('layouts.app')

@section('title', 'Ajout d\'un acteur à un film')
@section('contenu')

@auth
    <section>
        <div class="container">
            <h1>Ajout d'un acteur à un film</h1>
            <form action="{{ route('acteurs.storeActeurFilm') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="film_id">Film</label>
                    <select class="form-control" name="film_id" id="film_id">
                        @foreach ($films as $film)
                            <option value="{{ $film->id }}">{{ $film->titre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="acteur_id">Acteur</label>
                    <select class="form-control" name="acteur_id" id="acteur_id">
                        @foreach ($acteurs as $acteur)
                            <option value="{{ $acteur->id }}">{{ $acteur->prenom }} {{ $acteur->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>   
    </section>
@endauth
@endsection