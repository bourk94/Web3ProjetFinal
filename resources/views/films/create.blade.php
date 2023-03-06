@extends('layouts.app')

@section('title', 'Ajout d\'un film')
@section('contenu')

@auth
    <section>
        <div class="container">
            <h1>Ajout d'un film</h1>
            <form action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="titre">Titre</label>
                    <input type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" id="titre" value="{{ old('titre') }}">
                    @error('titre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="realisateur">Réalisateur</label>
                    <input type="text" class="form-control @error('realisateur') is-invalid @enderror" name="realisateur" id="realisateur" value="{{ old('realisateur') }}">
                    @error('realisateur')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="genre">Genre</label>
                    <input type="text" class="form-control @error('genre') is-invalid @enderror" name="genre" id="genre" value="{{ old('genre') }}">
                    @error('genre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="duree">Durée</label>
                    <input type="number" class="form-control @error('duree') is-invalid @enderror" name="duree" id="duree" min="1" max="1000" step="1" value="{{ old('duree') }}">
                    @error('duree')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="annee_sortie">Année de sortie</label>
                    <input type="number" class="form-control @error('annee_sortie') is-invalid @enderror" name="annee_sortie" id="annee_sortie" min='1900' max="2100" step="1" value="{{ old('annee_sortie') }}">
                    @error('annee_sortie')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="synopsis">synopsis</label>
                    <textarea class="form-control @error('synopsis') is-invalid @enderror" name="synopsis" id="synopsis" rows="3">{{ old('synopsis') }}</textarea>
                    @error('synopsis')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="trailer">Bande annonce</label>
                    <input type="text" class="form-control @error('trailer') is-invalid @enderror" name="trailer" id="trailer" value="{{ old('trailer') }}">
                    @error('trailer')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary" >Ajouter</button>
            </form>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="{{asset('js/jsvalidation.js')}}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\FilmRequest')!!}


@endauth
@endsection