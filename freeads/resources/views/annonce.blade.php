<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @include('layouts.app')
    <title>Freeads</title>
</head>
<style>
    body {
        background-image: url('https://img.freepik.com/premium-vector/background-white-elegant-texture_23-2148438404.jpg?w=360');
    }
    .card {
        margin-right: 10%;
        margin-left: 1%;
    }

    a {
        text-decoration: none;
        color: black;
        text-transform: none;
    }

    .card-title, .card-text {
        text-align: center;
    }

    #cardCreate {
        margin-left: 8%;
        margin-right: 9%;
    }
</style>
<body>  

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><img width="50" height="40" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTu0kxu38nXwgUBoWK384W9SnkxsXqAUD7TAw&usqp=CAU" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        @if( auth()->check() )
            <a class="nav-link" href="/profile/">Profil of {{ auth()->user()->name }}</a>
            <a class="nav-link" href="/messages/">Messages</a>
            <a class="nav-link" href="/logout/">Log Out</a>
        @else
            <a class="nav-link" href="/login/">Log In</a>
            <a class="nav-link" href="/register/">Register</a>
        @endif  
        </div>
    </div>
  </div>
</nav>

<br><br>

<div class="card" id="cardCreate">
    <div class="card-header">
        <h3>Add an annonce</h3>
    </div>
    <div class="card-body">
        <!-- <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a> -->
        <form action="/annonce/" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter your title">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter your description..."></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Choose your price">
            </div>
            <div class="form-group">
                <label for="category"></label>
                <select name="category" id="category" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option selected>Category :</option>
                        <option value="informatique">Informatique</option>
                        <option value="decor">Décoration</option>
                        <option value="jouet">Jouet</option>
                        <option value="vetement">Vêtement</option>
                        <option value="sport">Sport</option>
                        <option value="autre">Autre</option>
                    </select>
            </div>
            <button type="submit" class="btn btn-secondary" name="create">Submit</button>
        </form>

    </div>
</div>

<!-- <form action="/annonce/" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price">
    </div>
    <div class="form-group">
        <label for="category"></label>
        <select name="category" id="category" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>Category :</option>
                <option value="informatique">Informatique</option>
                <option value="decor">Décoration</option>
                <option value="jouet">Jouet</option>
                <option value="vetement">Vêtement</option>
                <option value="sport">Sport</option>
                <option value="autre">Autre</option>
            </select>
    </div>
    <button type="submit" class="btn btn-primary" name="create">Submit</button>
</form> -->

<br><br>
<div class="container-fuild">
<div class="row">
    <div class="col-6 col-md-2"> <!-- petite colonne -->

        <form action="/annonce/search/" method="POST">
            @csrf
            <div class="form-row">
                <div class="col">
                    <label for="shearchTitle">Search :</label>
                    <input type="text" class="form-control" placeholder="search..." name="searchTitle">
                </div>
                <div class="col">
                    <select name="searchPrice" id="searchPrice" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option selected>Trier par :</option>
                        <option value="priceUp">Prix croissant</option>
                        <option value="priceDown">Prix décroissant</option>
                    </select>
                </div>
                <div class="col">
                    <select name="searchCategory" id="searchCategory" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option selected>Category :</option>
                        <option value="informatique">Informatique</option>
                        <option value="decor">Décoration</option>
                        <option value="jouet">Jouet</option>
                        <option value="vetement">Vêtement</option>
                        <option value="sport">Sport</option>
                        <option value="autre">Autre</option>
                    </select>
                </div>
                <div class="col">
                    <select name="searchRecent" id="searchRecent" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option selected>Recent :</option>
                        <option value="recentUp">most recent</option>
                        <option value="recentDown">less recent</option>
                    </select>
                </div>

            </div>
            <button type="submit" class="btn btn-secondary" name="search">Search</button>
            <button type="submit" class="btn btn-secondary" name="reset">Reset</button>
        </form>

    </div>
    <div class="col-6 col-md-2">
        <!--vide-->
    </div>  
    <div class="col-6 col-md-8">

        <div class="card-group">
            @foreach ($annonces as $annonce)
            <div class="card">
                <img src="{{ asset('images/' . $annonce->image) }}" class="card-img-top" alt="..." width="auto" height="auto">
                    <h5 class="card-title">{{ $annonce->title }}</h5>
                    <p class="card-text">Description :
                        {{ $annonce->description }}</p>
                    <p class="card-text">Price : {{ $annonce->price }}€</p>
                    <p class="card-text">Category : {{ $annonce->category }}</p>                
                    <button class="btn btn-outline-secondary" name="update"><a href="/annonce/edit/{{ $annonce->id }}/">info +</a></button>
            </div>
            @endforeach
        </div>

    </div>
    <div class="col-12 col-md-4"> 
        <!-- pub -->
    </div>

        <!-- @foreach($annonces as $annonce)
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('images/' . $annonce->image) }}" class="card-img-top" alt="..." width="100" height="100">
                <div class="card-body">
                    <h5 class="card-title">{{ $annonce->title }}</h5>
                    <p class="card-text">{{ $annonce->description }}</p>
                    <p class="card-text">{{ $annonce->price }}€</p>
                    <p class="card-text">{{ $annonce->category }}</p>
                <button class="btn btn-primary" name="update"><a href="/annonce/edit/{{ $annonce->id }}/">info +</a></button>
                </div>
            </div>
        @endforeach -->

</div>
</div>

<!-- <form action="/annonce/search/" method="POST">
    @csrf
    <div class="form-row">
        <div class="col">
            <label for="shearchTitle">Search :</label>
            <input type="text" class="form-control" placeholder="search..." name="searchTitle">
        </div>
        <div class="col">
            <select name="searchPrice" id="searchPrice" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>Trier par :</option>
                <option value="priceUp">Prix croissant</option>
                <option value="priceDown">Prix décroissant</option>
            </select>
        </div>
        <div class="col">
            <select name="searchCategory" id="searchCategory" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>Category :</option>
                <option value="informatique">Informatique</option>
                <option value="decor">Décoration</option>
                <option value="jouet">Jouet</option>
                <option value="vetement">Vêtement</option>
                <option value="sport">Sport</option>
                <option value="autre">Autre</option>
            </select>
        </div>
        <div class="col">
            <select name="searchRecent" id="searchRecent" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>Recent :</option>
                <option value="recentUp">most recent</option>
                <option value="recentDown">less recent</option>
            </select>
        </div>

    </div>
    <button type="submit" class="btn btn-primary" name="search">Search</button>
    <button type="submit" class="btn btn-primary" name="reset">Reset</button>
</form> -->

<!-- @foreach($annonces as $annonce)
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('images/' . $annonce->image) }}" class="card-img-top" alt="..." width="100" height="100">
        <div class="card-body">
            <h5 class="card-title">{{ $annonce->title }}</h5>
            <p class="card-text">{{ $annonce->description }}</p>
            <p class="card-text">{{ $annonce->price }}€</p>
            <p class="card-text">{{ $annonce->category }}</p>
        <button class="btn btn-primary" name="update"><a href="/annonce/edit/{{ $annonce->id }}/">info +</a></button>
        </div>
    </div>
@endforeach -->


<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Company name
          </h6>
          <p>
          Thank you for seeing our site, if need be do not hesitate to send us an email.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset">HTML</a>
          </p>
          <p>
            <a href="#!" class="text-reset">CSS</a>
          </p>
          <p>
            <a href="#!" class="text-reset">PHP</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Laravel</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i> Nice, 131 boulevard de fefefe, French</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            OnVousEcouteSurmement@maisOui.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Steven and Go</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
</body>
</html>