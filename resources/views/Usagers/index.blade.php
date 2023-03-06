@extends('layouts.app')

@section('title', "DepInfoFlix - Connexion")
@section('contenu')

<section class="main-container">
    <div class="container log-padding">
        <div class="row">
          <div class="col-12">
            <ul>
                @foreach ($usagers as $usager)
                    <a href="{{ route('usagers.show', [$usager->id]) }}"><li>{{ $usager->email }}</li></a>
                @endforeach
            </ul> 
          </div>            
        </div>
    </div>
    </section>

@endsection