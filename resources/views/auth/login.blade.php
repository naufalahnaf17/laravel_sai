<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ url('/css/login.css') }}">

    <title>Login Form</title>
  </head>
  <body>

    <?php if (session('gagal')): ?>
      <script type="text/javascript">
        alert('Username Atau Password Salah');
      </script>
    <?php endif; ?>

    <!-- awal container -->
    <div class="container">
      <div class="wrapper">

        <!-- Awal Form Login -->
        <form action="{{url('/login/store')}}" method="post">
          {{ csrf_field() }}
          <img  class="image" src="{{url('/gambar/group.png')}}">
          <p class="judul">Login Form</p>
          <div id="username" class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Username" name="username">
          </div>
          <div id="password" class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Password" name="password">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="remember">
            <label class="form-check-label" for="exampleCheck1">Remember Me</label>
          </div>
          <button type="submit" name="login" class="btn btn-primary">Login</button>
          <p class="registrasi"> <a href="/registrasi"> Registrasi </a> </p>
        </form>
        <!-- Akhir Form Login -->

      </div>
    </div>
    <!-- akhir container -->
