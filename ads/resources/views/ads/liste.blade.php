<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Liste Ads</title>
  </head>
  <body>


  <nav class="navbar navbar-light bg-light">
  <form action="{{ route('search') }}" class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="mot">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>

  <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

  <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-dropdown-link :href="route('logout')"
            onclick="event.preventDefault();
                    this.closest('form').submit();">
                    {{ __('Log Out') }}
        </x-dropdown-link>
</form>
  <!-- <a href="{{ route('logout') }}">log out</a> -->
</nav>
<hr>



        <div class="les_boutons">
       <a href="{{ route('ajoutAds') }}"><button>
             Ajouter des annonces
        </button></a> 
        <a href="{{ route('liste_annonces_utilisateur') }}"><button>
             Mes annonces
        </button></a>
        </div>


        <h1 class="liste_annonces">Listes des annonces</h1>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
                <div class="grille">
                        @foreach($ad as $ads)
                            <div class="grid-item">
                                <div class="card-image">
                                    <img src="{{ asset('uploads/ads/'.$ads->image) }}" width="100px">
                                </div>
                                <a href="#">
                                <div class="produit">
                                    <p>{{ $ads->title }}</p>
                                    <p class="ctg">{{ $ads->category }}</p>
                                </div>
                                
                                <div class="description"> 
                                    <div class="descript">{{ $ads->description }}

                                    </div>
                                    <div class="author"> 
                                        <p class="price">{{ $ads->price }} fCFA</p>
                                        <p class="condition">{{ $ads->condition }}</p>
                                        <p class="username">By <span>{{ $ads->users_name }}</span></p>
                                    </div>
                                </div></a>
                            </div>

                        @endforeach
                </div>
                {{ $ad->links() }}



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
</html>