<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/myticket/assets/css/connexion.css">
    <title>Connexion</title>
</head>

<body class="bg-light d-flex flex-column min-vh-100">


<div class="container d-flex justify-content-center align-items-center flex-grow-1 py-5">

    <div class="card shadow-sm border-0 rounded-4 p-4" style="width: 100%; max-width: 420px;">

        <div class="card-body">

            <h2 class="text-center fw-semibold mb-4 text-dark">Connexion</h2>

            <form method="POST" action="../traitements/traitement_connexion.php">

                <div class="mb-3">
                    <label for="mail" class="form-label text-secondary fw-medium">Adresse mail</label>
                    <input type="email" class="form-control form-control-lg rounded-3" name="mail" id="mail" placeholder="exemple@mail.com" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label text-secondary fw-medium">Mot de passe</label>
                    <input type="password" class="form-control form-control-lg rounded-3" name="password" id="password" placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn btn-primary w-100 rounded-3 py-2 fw-medium">
                    Se connecter
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>