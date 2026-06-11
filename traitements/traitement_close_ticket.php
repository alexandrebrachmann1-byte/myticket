<?php
session_start();
require_once "../functions/ticket.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ticket_id = $_POST['ticket_id'];

    close_ticket($ticket_id);

    header("Location: /myticket/pages/single_ticket.php?id=" . $ticket_id);
    exit();
}
?>