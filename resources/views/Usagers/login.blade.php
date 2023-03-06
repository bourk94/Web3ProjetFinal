@extends('layouts.app')

@section('title', "DepInfoFlix - Connexion")
@section('contenu')


<section class="main-container">
  <div class="container log-padding">
      <div class="row">
        <div class="col-12">
          <form class="d-flex align-items-center flex-column" method="POST" action="{{ route('login') }}">
              @csrf
              <div class="mb-3">
                  <label for="email" class="form-label">Adresse courriel</label>
                  <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Mot de passe</label>
                  <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <a class="mb-2" href="{{ route('usagers.create') }}">Créer un compte</a>
              <button class="btn btn-primary" type="submit">Connexion</button>
          </form> 
        </div>            
      </div>
  </div>
</section>
@endsection