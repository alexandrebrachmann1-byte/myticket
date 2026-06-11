<?php
session_start();
require_once "../functions/users.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name     = $_POST['name'];
    $mail     = $_POST['mail'];
    $password = $_POST['password'];
    $role     = $_POST['role'];

    $allowed_roles = ['utilisateur', 'technicien', 'administrateur'];

    if (in_array($role, $allowed_roles)) {
        create_user($name, $mail, $password, $role);
    }

    header("Location: /myticket/pages/create_user.php");
    exit();
}
?>