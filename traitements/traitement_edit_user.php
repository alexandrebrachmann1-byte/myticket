<?php
session_start();
require_once "../functions/users.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user_id = $_POST['user_id'];
    $name    = $_POST['name'];
    $mail    = $_POST['mail'];
    $role    = $_POST['role'];

    $roles_autorises = ['utilisateur', 'technicien', 'administrateur'];

    if (in_array($role, $roles_autorises)) {
        update_user($user_id, $name, $mail, $role);
    }

    if (!empty($_POST['password'])) {
    reset_password($user_id, $_POST['password']);
    }

    header("Location: /myticket/pages/manage_users.php");
    exit();
}
?>