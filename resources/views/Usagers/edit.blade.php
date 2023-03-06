@extends('layouts.app')

@section('title', "DepInfoFlix - Modifier un usager")
@section('contenu')

@auth
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Modifier un usager</h1>
                <form action="{{ route('usagers.update', $usager->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group mb-3">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ $usager->prenom }}">
                        @error('prenom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ $usager->nom }}">
                        @error('nom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="date_naissance">Date de naissance</label>
                        <input type="date" class="form-control @error('date_naissance') is-invalid @enderror" id="date_naissance" name="date_naissance" value="{{ $usager->date_naissance }}">
                        @error('date_naissance')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">adresse courriel</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $usager->email }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="oldPassword">Ancien mot de passe</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" id="oldPassword" name="oldPassword">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">Nouveau mot de passe</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="password_confirmation">Confirmer le nouveau mot de passe</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
                        @error('password')
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

    {!! JsValidator::formRequest('App\Http\Requests\UsagerRequest')!!}


@endauth
@endsection