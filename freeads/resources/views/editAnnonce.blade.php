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
    .card {
        background-color: #f5f5f5;
        border-radius: 10px;
        box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
        padding: 20px;
        margin-top: 20px;
        text-align: center;
        margin-left: 35%;
        margin-right: 25%;
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

<h1>Editer votre annonce :</h1>

<div class="card" style="width: 25rem;">
    <img src="{{ asset('images/' . $result->image) }}" class="card-img-top" alt="..." width="auto" height="auto">
        <h5 class="card-title">{{ $result->title }}</h5>
        <p class="card-text">Description :
            {{ $result->description }}</p>
        <p class="card-text">Price : {{ $result->price }}€</p>
        <p class="card-text">Category : {{ $result->category }}</p>                
</div>

@if( auth()->check() && auth()->user()->id == $result->users_id )
<form action="" method="post">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $result->title }}">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{ $result->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ $result->price }}">
    </div>
    <button type="submit" class="btn btn-primary" name="update">Update</button>
    <button type="submit" class="btn btn-primary" name="delete">Delete</button>
</form>
@else
    <p>Vous n'avez pas les droits pour modifier cette annonce</p>
@endif


</body>
</html>