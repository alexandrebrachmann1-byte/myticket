<?php
session_start();
require_once("../functions/message.php");
require_once("../functions/ticket.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($_POST["message"]) || empty($_POST["ticket_id"])) {
        die('Champs manquants');
    }

    $message   = trim($_POST['message']);
    $ticket_id = (int) $_POST['ticket_id'];

    $ok = add_messages_with_users($message, $ticket_id, $_SESSION["user_id"]);

    if ($ok) {
        update_ticket_updated_at($ticket_id);
    }

    header("Location: /myticket/pages/single_ticket.php?id=" . $ticket_id);
    exit();
}