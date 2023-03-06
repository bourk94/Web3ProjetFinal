@extends('layouts.app')

@section('title', "DepInfoFlix - $film->titre")
@section('contenu')

@auth
    <section class="main-container">

        <div class="container" id="movies">
            <h1 id="movies">{{ $film->titre }}</h1>
            <div class="row">
                <div class="col-6">
                    <img src="{{ asset("img/films/$film->image") }}" height="700" alt="">
                </div>
                <div class="col-6">
                    <div class="col-12">
                        <iframe width="560" height="315" src="{{ $film->trailer }}"
                            title="YouTube video player" frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                    </div>
                    <div class="col-12">
                        <p>{{ $film->description }}</p>
                        <p>Genre: {{ $film->genre }}</p>
                        <p>Année de sortie: {{ $film->annee_sortie }}</p>
                        <p>{{ $film->synopsis }}</p>
                        <p>Acteurs: 
                            @foreach ($film->acteurs as $acteur)
                                <a href="{{ route('acteurs.show', [$acteur->id]) }}">{{ $acteur->prenom }} {{ $acteur->nom }}</a> @if (!$loop->last), @endif
                            @endforeach
                        </p>
                    </div>
                    <div class="d-flex gap-3">
                        <div>
                            <a href="{{ route('films.edit', [$film->id]) }}" class="btn btn-primary">Modifier</a>
                        </div>
                        <div>
                            <form method="POST" action="{{ route('films.destroy', [$film->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Êtes-vous certain de vouloir supprimer ce film ?')" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>  
                    </div>                  
                </div>         
            </div>
        </div>        
    </section>

@endauth
@endsection