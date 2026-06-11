<?php session_start(); 
if (!isset($_SESSION['role'])) {
    header('Location: /myticket/pages/connexion.php');
    exit();
}
if ($_SESSION['role'] === 'administrateur') {
    header('Location: /myticket/pages/dashboard.php');
    exit();
} elseif ($_SESSION['role'] === 'technicien') {
    header('Location: /myticket/pages/tickets_by_technician.php');
    exit();
} elseif ($_SESSION['role'] === 'utilisateur') {
    header('Location: /myticket/pages/tickets.php');
    exit();
}

?>
<DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>index</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <?php require_once(__DIR__ . "/partials/header.php"); ?>
        <h1 class="text-center mt-5">Page d'acceuil</h1>
    </body>
    </html>