@extends('layouts.app')

@section('title', 'Ajout d\'un acteur')
@section('contenu')

@auth
    <section>
        <div class="container">
            <h1>Ajout d'un acteur</h1>
            <form action="{{ route('acteurs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label for="prenom">Prénom</label>
                    <input class="form-control @error('prenom') is-invalid @enderror" type="text" name="prenom" id="prenom" value="{{ old('prenom') }}">
                    @error('prenom')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nom">Nom</label>
                    <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" id="nom" value="{{ old('nom') }}">
                    @error('nom')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="date_naissance">Date de naissance</label>
                    <input class="form-control @error('date_naissance') is-invalid @enderror" type="date" name="date_naissance" id="date_naissance"  value="{{ old('date_naissance') }}">
                    @error('date_naissance')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nationalite">Nationalité</label>
                    <input class="form-control @error('nationalite') is-invalid @enderror" type="text" name="nationalite" id="nationalite"  value="{{ old('nationalite') }}">
                    @error('nationalite')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="photo">Photo</label>
                    <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" id="photo"  value="{{ old('photo') }}">
                    @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">Ajouter</button>
            </form>
        </div>     
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="{{asset('js/jsvalidation.js')}}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\ActeurRequest')!!}

@endauth

@endsection