<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">


    <title>Connexion</title>
</head>

<body class="bg-dark d-flex flex-column min-vh-100">
<?php require_once "../partials/header.php"; ?>

<div class="container d-flex justify-content-center align-items-center flex-grow-1">

    <div class="card login-card p-4 shadow-lg">

        <h2 class="text-center text-gold mb-4">Connexion</h2>

        <form method="POST" action="../traitements/traitement_connexion.php">

            <div class="mb-3">
                <label for="mail" class="form-label text-gold">Adresse mail</label>
                <input type="email" class="form-control input-dark" name="mail" id="mail" required>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label text-gold">Mot de passe</label>
                <input type="password" class="form-control input-dark" name="password" id="password" required>
            </div>

            <button type="submit" class="btn btn-gold w-100">
                Se connecter
            </button>

        </form>

    </div>

</div>

</body>
</html>