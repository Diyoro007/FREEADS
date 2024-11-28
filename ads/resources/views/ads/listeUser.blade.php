<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Liste Ads user</title>
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

    <div class="container text-center">
        <div class="row">
            <div class="col s12">
            <h1>Liste des ads de l'utilisateur</h1>
            <hr>
                <a href="{{ route('ajoutAds') }}" class="btn btn-primary">Ajouter ads</a>
            <hr>
            <a href="{{ route('annonces') }}" class="btn btn-primary">Liste des annonces</a>
            <hr>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>title</th>
                            <th>category</th>
                            <th>desription</th>
                            <th>image</th>
                            <th>price</th>
                            <th>location</th>
                            <th>condition</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ads as $adss)
                            <tr>
                                <td>{{ $adss->id }}</td>
                                <td>{{ $adss->users_name }}</td>
                                <td>{{ $adss->title }}</td>
                                <td><p class="text-uppercase">{{ $adss->category }}</p></td>
                                <td>{{ $adss->description }}</td>
                                <td><img src="{{ asset('uploads/ads/'.$adss->image) }}" width="100px" </td>
                                <td>{{ $adss->price }}</td>
                                <td>{{ $adss->location }}</td>
                                <td>{{ $adss->condition }}</td>
                                <td>
                                    <a href="/update/{{ $adss->id }}" class="btn btn-info">Update</a>
                                    <a href="/delete/{{ $adss->id }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>

        </div>
    </div>












    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
</html>