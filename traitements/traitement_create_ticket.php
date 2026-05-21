<?php
session_start();

require_once("../functions/ticket.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // 1) Validation champs texte
  if (!isset($_POST["title"])          || $_POST["title"] === ''        ||
      !isset($_POST["description"])    || $_POST["description"] === ''  ||
      !isset($_POST["priority"])       || $_POST["priority"] === '' ) {
    die('Champs manquants');
  }

  $title        = trim($_POST['title']);
  $description = trim($_POST['description']);
  $priority    = trim($_POST['priority']);



  // 5) Insertion BDD ✅ toutes les variables existent ici
  $ok = add_tickets_with_users(
    $title, $description, $priority, $_SESSION["user_id"]
  );


  header("Location: /myticket/pages/dashboard.php");
  exit();
}