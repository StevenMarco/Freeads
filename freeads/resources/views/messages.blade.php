<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.app')
    <title>messages</title>
</head>
<style>

    h2 {
        text-align: center;
    }

    .card {
        width: 50%;
        margin: auto;
        margin-top: 5%;
        background-color: #f5f5f5;
        border-radius: 10px;
    }
    
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
        <a class="nav-link" href="/profile/">Profil</a>
            <a class="nav-link" href="/annonce/">Annonce</a>
            <a class="nav-link" href="/logout/">Log Out</a>
        @else
            <a class="nav-link" href="/login/">Log In</a>
            <a class="nav-link" href="/register/">Register</a>
        @endif  
        </div>
    </div>
  </div>
</nav>

    <h2>Your messagerie</h2>

    <div class="card">
        <h5 class="card-header">Send a message</h5>
        <div class="card-body">
        <form action="/messages/" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" placeholder="Entrer your title" name="title">
            </div>
            <div class="form-group mb-3">
                <label for="content">Content:</label>
                <textarea class="form-control" id="content" placeholder="Entrer your content" name="content"></textarea>
            </div>
            <input type="text" name="sender_email" value="{{ auth()->user()->email }}" hidden>
            <div class="form-group mb-3">
                <label for="content">Receiver:</label>
                <input type="email" name="receiver_email" placeholder="enter email receiver">
            </div>
            <button type="submit" class="btn btn-primary" name="sendMessage">Send</button>
        </form>
        </div>
    </div>

<!-- <form action="/messages/" method="post">
    @csrf
    <div class="form-group mb-3">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" placeholder="Entrer your title" name="title">
    </div>
    <input type="text" name="sender_email" value="{{ auth()->user()->email }}" hidden>
    <div class="form-group mb-3">
        <label for="content">Receiver:</label>
        <input type="email" name="receiver_email" placeholder="enter email receiver">
    </div>
    <div class="form-group mb-3">
        <label for="content">Content:</label>
        <textarea class="form-control" id="content" placeholder="Entrer your content" name="content"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="sendMessage">Send</button>
</form> -->

<div class="card">
    <h5 class="card-header">Your messages</h5>
    <div class="card-body">
        @if(count($messages) > 0)
            @foreach ($messages as $message)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $message->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">From: {{ $message->sender_email }}</h6>
                        <p class="card-text">{{ $message->content }}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">{{ $message->created_at }}</small>
                    </div>
                </div>
            @endforeach
        @else
            <p>You have no messages</p>
        @endif
    </div>
</div>

<!-- @foreach($messages as $message)
<div class="card">
    <div class="card-body">
      <h5 class="card-title">{{ $message->title }}</h5>
      <p class="card-text">{{ $message->content }}</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">{{ $message->created_at }}</small>
      <small class="text-muted">{{ $message->sender_email }}</small>
    </div>
</div>
@endforeach -->

<!-- @foreach($messages as $message)
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $message->title }}</h5>
            <p class="card-text">{{ $message->content }}</p>
            <p class="card-text">{{ $message->sender_email }}</p>
            <p class="card-text">{{ $message->created_at }}</p>
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