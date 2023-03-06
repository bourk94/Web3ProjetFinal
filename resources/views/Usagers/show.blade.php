@extends('layouts.app')

@section('title', "DepInfoFlix - $usager->prenom $usager->nom")
@section('contenu')

@auth
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>{{ $usager->prenom }} {{ $usager->nom }}</h1>
                <p>{{ $usager->email }}</p>
                <p>{{ $usager->date_naissance }}</p>
            </div>
            <div class="d-flex mt-3 gap-3">                 
                <div>
                    <a href="{{ route('usagers.edit', [$usager->id]) }}" class="btn btn-primary">Modifier</a>
                </div>              
                <div>    
                    <form method="POST" action="{{ route('usagers.destroy', [$usager->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Êtes-vous certain de vouloir supprimer cet usager ?')" class="btn btn-danger">Supprimer</button>
                    </form>      
                </div>
            </div>
        </div>
    </div>

@endauth
@endsection