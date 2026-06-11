<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/myticket/assets/css/create_user.css">
    <title>Création d'un utilisateur</title>
</head>
<body>

<?php require_once "../partials/header.php"; ?>

<?php require_once "../partials/form_create_user.php"; ?>

</body>
</html>