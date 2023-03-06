@extends('layouts.app')

@section('title', 'Modification d\'un film')
@section('contenu')

@auth
    <h1 class="text-center">Page de modification du film {{ $film->nom }}</h1>
    @if (isset($film))
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{ route('films.update', [$film->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    
                    <div class="mb-3">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" id="titre" value="{{ $film->titre }}">
                        @error('titre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="realisateur">Réalisateur</label>
                        <input type="text" class="form-control @error('realisateur') is-invalid @enderror" name="realisateur" id="realisateur" value="{{ $film->realisateur }}">
                        @error('realisateur')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="genre">Genre</label>
                        <input type="text" class="form-control @error('genre') is-invalid @enderror" name="genre" id="genre" value="{{ $film->genre }}">
                        @error('genre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="duree">Durée</label>
                        <input type="number" class="form-control @error('duree') is-invalid @enderror" name="duree" id="duree" min="1" max="1000" step="1" value="{{ $film->duree }}">
                        @error('duree')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="annee_sortie">Année de sortie</label>
                        <input type="number" class="form-control @error('annee_sortie') is-invalid @enderror" name="annee_sortie" id="annee_sortie" min='1900' max="2100" step="1" value="{{ $film->annee_sortie }}">
                        @error('annee_sortie')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="synopsis">Synopsis</label>
                        <textarea class="form-control @error('synopsis') is-invalid @enderror" name="synopsis" id="synopsis" rows="3">{{ $film->synopsis }}</textarea>
                        @error('synopsis')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" value="{{ $film->image }}">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="trailer">Bande annonce</label>
                        <input type="text" class="form-control @error('trailer') is-invalid @enderror" name="trailer" id="trailer" value="{{ $film->trailer }}">
                        @error('trailer')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary" >Modifier</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="{{asset('js/jsvalidation.js')}}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\FilmRequest')!!}

@endif

@endauth
@endsection