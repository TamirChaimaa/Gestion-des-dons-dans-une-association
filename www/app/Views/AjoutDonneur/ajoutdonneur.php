<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
            background-color: #333;
            overflow: hidden;
        }
        .menu li {
            display: inline-block;
        }
        .menu li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .menu li a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-primary  bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Dons</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Page des Dons</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/index.php/ajoutdonneur.php">Ajout Donneur</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/index.php/ajoutdon.php">Ajout Don</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
<form method="post" action="/index.php/adddonneur.php">
    <div class="mb-3">
        <label for="donorName" class="form-label">Nom du donneur</label>
        <input type="text" class="form-control" id="donorName" name="donorName" required>
    </div>
    <div class="mb-3">
        <label for="phoneNumber" class="form-label">Numéro de téléphone</label>
        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" required>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

   