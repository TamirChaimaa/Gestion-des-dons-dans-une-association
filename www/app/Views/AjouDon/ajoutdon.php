<?php
// Récupérer les donneurs depuis la requête GET
$donneurs = $_GET['donneurs'];
?>

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
<form method="post" action="/index.php/adddon.php">
    <div class="mb-3">
        <label for="donName" class="form-label">Nom du don</label>
        <input type="text" class="form-control" id="donName" name="donName" required>
    </div>
    <div class="mb-3">
        <label for="donType" class="form-label">Type de don</label>
        <select class="form-select" id="donType" name="donType" required>
            <option value="">Sélectionnez un type</option>
            <option value="money">Somme d'argent</option>
            <option value="clothes">Vêtements</option>
            <option value="food">Produits alimentaires</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="donorId" class="form-label">Donneur</label>
        <select class="form-select" id="donorId" name="donorId" required>
            <option value="">Sélectionnez un donneur</option>
            <?php foreach ($donneurs as $donneur) : ?>
              <option name="donorId" value="<?= $donneur->getIdDonneur() ?>"><?= $donneur->getIdDonneur() ?><?= $donneur->getNomDonneur() ?></option>

            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
</body>
</html>
