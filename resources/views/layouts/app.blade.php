<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
  <script src="main.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/carousel.css') }}" />
</head>
<body>
  {{-- <div class="wrapper"> --}}

    <!-- HEADER -->
    @auth
    <header>
      <div class="netflixLogo">
        <a id="logo" href="{{ route('films.index') }}"><img src="https://github.com/carlosavilae/Netflix-Clone/blob/master/img/logo.PNG?raw=true" alt="Logo Image"></a>
      </div>      
      <nav class="main-nav">                
        <a href="{{ route('films.index') }}">Accueil</a>
        <a href="{{ route('films.index') }}">Films</a>
        <a href="{{ route('acteurs.create') }}">Ajout d'acteurs</a>
        <a href="{{ route('films.create') }}">Ajout de films</a>     
        <a href="{{ route('acteurs.createActeurFilm') }}"> Ajout d'un acteur film</a>
        <a href="{{ route('usagers.index') }}">Liste des usagers</a>
      </nav>
      <nav class="sub-nav">   
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          @method('POST')
          <a href="#"><i class="fas fa-search sub-nav-logo"></i></a>
          <a href="#"><i class="fas fa-bell sub-nav-logo"></i></a>
          <button type="submit" class="btn-deconnexion">Déconnexion</button>
        </form>      
      </nav>      
    </header>
    @endauth
    <!-- END OF HEADER -->

    @yield('contenu')
   
    @if(isset($errors) && $errors->any())
      <div class="container alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    
    
    @if(Session::has('success'))
      <div class="container alert alert-success">
        <ul class="mb-0">
          <li>{{ Session::get('success') }}</li>
        </ul>
      </div>
    @endif

    <!-- LINKS -->
    @auth
    <section class="link">
      <div class="logos">
        <a href="#"><i class="fab fa-facebook-square fa-2x logo"></i></a>
        <a href="#"><i class="fab fa-instagram fa-2x logo"></i></a>
        <a href="#"><i class="fab fa-twitter fa-2x logo"></i></a>
        <a href="#"><i class="fab fa-youtube fa-2x logo"></i></a>
      </div>
      <div class="sub-links">
        <ul>
          <li><a href="#">Audio and Subtitles</a></li>
          <li><a href="#">Audio Description</a></li>
          <li><a href="#">Help Center</a></li>
          <li><a href="#">Gift Cards</a></li>
          <li><a href="#">Media Center</a></li>
          <li><a href="#">Investor Relations</a></li>
          <li><a href="#">Jobs</a></li>
          <li><a href="#">Terms of Use</a></li>
          <li><a href="#">Privacy</a></li>
          <li><a href="#">Legal Notices</a></li>
          <li><a href="#">Corporate Information</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
      </div>
    </section>
    <!-- END OF LINKS -->

    <!-- FOOTER -->
    <footer>
      <p>&copy 1997-2022 DepInfoFlix, Inc.</p>
      <p>Alexandre Bourque - utilisation dans un but éducatif &copy 2022</p>
    </footer>
  @endauth
  {{-- </div> --}}
  <!-- JavaScript Bundle with Popper -->
<script src="{{ asset('js/index.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>