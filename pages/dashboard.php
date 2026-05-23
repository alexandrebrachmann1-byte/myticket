<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require_once "../partials/header.php";

    if( isset($_SESSION["user_id"]) && $_SESSION["user_id"] !== ""){
        require_once "../partials/dashboard_user.php";
        require_once "../partials/dashboard_admin.php";
        require_once "../partials/dashboard_technician.php";
    }
    else {
        header("Location: /myticket/pages/connexion.php");
    }


    ?>
</body>
</html>