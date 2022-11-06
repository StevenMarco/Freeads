<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.app')
    <title>Profile</title>
</head>
<style>
    body {
        background-image: url('https://img.freepik.com/premium-vector/background-white-elegant-texture_23-2148438404.jpg?w=360');
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
            <a class="nav-link" href="/annonce/">Annonce</a>
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
<!-- <div class="card">
    <h3>Profiles</h3>
    <p>Name : {{ auth()->user()->name }}</p>
    <p>Email : {{ auth()->user()->email }}</p>
</div> -->
<br><br><br>

<div class="card">
  <h5 class="card-header">Profiles</h5>
  <div class="card-body">
    <h5 class="card-title">Name : {{ auth()->user()->name }}</h5>
    <p class="card-text">Email : {{ auth()->user()->email }}</p>
  </div>
</div>

<br><br><br>

<div class="card">
    <h5 class="card-header">Edit</h5>
    <div class="card-body">
        <form method="POST" action="/profile/" >
            {{ csrf_field() }}

            <div class="form-group mb-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Entrer your new name" name="name">
            </div>

            <div class="form-group mb-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Entrer your new email" name="email">
            </div>

            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="submit" class="btn btn-secondary" name="update">Update</button>
                <button type="submit" class="btn btn-secondary" name="delete">Delete</button>
            </div>
        </form>
    </div>
</div>



    <!-- <h4>EDIT :</h4>
    <form method="POST" action="/profile/" >
        {{ csrf_field() }}

        <div class="form-group mb-3">

            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Entrer your new name" name="name">

        </div>

        <div class="form-group mb-3">

            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Entrer your new email" name="email">

        </div>

        <button type="submit" class="btn btn-primary" name="update">Update</button>
        <h4>DELETE :</h4>
        <button type="submit" class="btn btn-primary" name="delete">Delete</button>
    </form> -->

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