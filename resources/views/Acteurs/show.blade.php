@extends('layouts.app')

@section('title', "DepInfoFlix - $acteur->prenom $acteur->nom")
@section('contenu')

@auth
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>{{ $acteur->prenom }} {{ $acteur->nom }}</h1>
                <p>{{ $acteur->date_naissance }}</p>
                <p>{{ $acteur->nationalite }}</p>
                <p>{{ $acteur->sexe }}</p>
                <img src="@if(strpos($acteur->photo, 'http') === 0) {{ $acteur->photo }} @else {{ asset("img/acteurs/$acteur->photo") }}@endif" height="500px" alt="">
            </div>
            <div class="col-6">
                <h1>Films</h1>
                @if (count($acteur->films))
                    <div class="box">
                        @foreach ($acteur->films as $film)
                        <div>
                            <a href="{{ route('films.show', [$film]) }}">
                                <img src="@if(strpos($film->image, 'http') === 0) {{ $film->image }} @else {{ asset("img/films/$film->image") }}@endif" height="150" alt="">
                            </a>
                            <form method="POST" action="{{ route('acteurs.destroyActeurFilm', [$acteur->id, $film->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Êtes-vous certain de vouloir supprimer cette relation ?')" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>                           
                        @endforeach
                    </div>
                    @else
                        <p>Aucun film trouvé</p>
                @endif
            </div>
            <div class="d-flex mt-3 gap-3">
                <div>
                    <a href="{{ route('acteurs.edit', [$acteur->id]) }}" class="btn btn-primary">Modifier</a>
                </div>
                <div>
                    <form method="POST" action="{{ route('acteurs.destroy', [$acteur->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Êtes-vous certain de vouloir supprimer cet acteur ?')" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endauth
@endsection