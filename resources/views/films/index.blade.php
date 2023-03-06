@extends('layouts.app')

@section('title', 'DepInfoFlix - Films')
@section('contenu')

    @auth
        <section class="main-container">

            <div class="location" id="movies">
                <h1 id="movies">Films</h1>
                @if (count($films))
                <div class="carousel-1">
                    @foreach ($films as $film)
                        <div>
                            <a href="{{ route('films.show', [$film]) }}">
                                <img class="img_box" src="@if (strpos($film->image, 'http') === 0) {{ $film->image }} @else {{ asset("img/films/$film->image") }} @endif"alt="{{ $film->titre }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <p>Aucun film trouvé</p>
            @endif

            <div class="location" id="movies">
                <h1 id="movies">Films Fantastique</h1>
                @if (count($films->where('genre', 'Fantastique')))
                <div class="carousel-2">
                    @foreach ($films->where('genre', 'Fantastique') as $film)
                        <div>
                            <a href="{{ route('films.show', [$film]) }}">
                                <img class="img_box" src="@if (strpos($film->image, 'http') === 0) {{ $film->image }} @else {{ asset("img/films/$film->image") }} @endif"alt="{{ $film->titre }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <p>Aucun film trouvé</p>
            @endif

            <div class="location" id="movies">
                <h1 id="movies">Films mettant en vedette Viggo Mortensen</h1>
                @if (count($films))
                <div class="carousel-3">
                    @foreach ($films as $film)
                        @foreach ($film->acteurs->where('nom', 'Mortensen') as $acteur)
                            <div>
                                <a href="{{ route('films.show', [$film]) }}">
                                    <img class="img_box" src="@if (strpos($film->image, 'http') === 0) {{ $film->image }} @else {{ asset("img/films/$film->image") }} @endif"alt="{{ $film->titre }}">
                                </a>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        @else
            <p>Aucun film trouvé</p>
            @endif

    @endauth
@endsection
