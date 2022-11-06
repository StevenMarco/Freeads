<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.app')
    <title>Login</title>
</head>
<body>
<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><img width="50" height="40" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTu0kxu38nXwgUBoWK384W9SnkxsXqAUD7TAw&usqp=CAU" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        @if( auth()->check() )
            <a class="nav-link" href="/logout/">Log Out</a>
            <a class="nav-link" href="/login/">Log In</a>
        @else
            <a class="nav-link" href="/login/">Log In</a>
            <a class="nav-link" href="/register/">Register</a>
        @endif  
        </div>
    </div>
  </div>
</nav> -->

<section class="vh-100 bg-image"
  style="background-image: url('https://blog.mercatik.net/wp-content/uploads/2020/03/55abeeb174127381817650nj0e1gqe.jpg');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Login</h2>

              <form method="POST" action="/login/">
                {{ csrf_field() }}

                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email" placeholder="Enter your email"/>
                  <label class="form-label" for="form3Example3cg">Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password" placeholder="Enter your password"/>
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Login</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="/register/"
                    class="fw-bold text-body"><u>Register here</u></a></p>

              </form>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
    <!-- <form method="POST" action="/login">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Login</button>
        </div>
    </form> -->
</body>
</html>