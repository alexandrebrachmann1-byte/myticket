<?php
session_start();
require_once "../functions/ticket.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ticket_id = $_POST['ticket_id'];
    $status    = $_POST['status'];

    $allowed_status = ['Nouveau', 'Ouvert', 'En cours', 'En attente utilisateur', 'Résolu', 'Fermé'];

    if (in_array($status, $allowed_status)) {
        update_status_ticket($ticket_id, $status);
    }

    header("Location: /myticket/pages/single_ticket.php?id=" . $ticket_id);
    exit();
}
?>