<?php
session_start();
require_once "../functions/users.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    delete_user($_POST['user_id']);
    header("Location: /myticket/pages/manage_users.php");
    exit();
}
?>