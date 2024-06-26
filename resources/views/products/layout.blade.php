
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/grooming/create.css') }}"> 
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark"  >
  <a class="navbar-brand" href="#">PetCare</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Grooming</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">PetHotel</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Report Grooming</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pesanan</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
