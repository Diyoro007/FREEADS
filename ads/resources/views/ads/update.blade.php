<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>update Ads</title>
  </head>
  <body>

    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1>update ads</h1>
                <hr>

                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                <ul>
                    @foreach($errors->all() as $error)
                        <li class="alert alert-danger"> {{ $error }} </li>
                    @endforeach
                </ul>
                
                <form action="/update/traitementAds" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="text" name="id" style="display: none;" value="{{ $ads->id }}">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $ads->title }}">
                    </div>
                    <div class="form-group">
                        <label for="category">category</label>
                        <input type="text" class="form-control" id="category" name="category" value="{{ $ads->category }}">
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ $ads->description }}">
                    </div>
                    <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" class="form-control" multiple id="image" name="image" value="{{  $ads->image }}">
                    </div>
                    <div class="form-group">
                        <label for="price">price</label>
                        <input type="number" min="1" class="form-control" id="price" name="price" value="{{ $ads->price }}">
                    </div>
                    <div class="form-group">
                        <label for="location">location</label>
                        <input type="text" class="form-control" id="location" name="location" value="{{ $ads->location }}">
                    </div>
                    <!-- <div class="form-group">
                        <label for="condition">condition</label>
                        <input type="text" class="form-control" id="condition" name="condition" value="{{ $ads->condition }}">
                    </div> -->
                    <div class="form-group">
                    <select class="form-select" aria-label="Default select example" id="condition" name="condition">
                    <label for="condition">condition</label>
                        <option value="New">New</option>
                        <option value="Good">Good</option>
                        <option value="Used">Used</option>
                    </select>

                    <button type="submit" class="btn btn-primary">update</button>

                    <a href="{{ route('annonces') }}" class="btn btn-danger">Liste ads</a>
                 </form>

            </div>

        </div>
    </div>












    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
</html>