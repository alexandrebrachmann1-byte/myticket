<?php
session_start();
require_once "../functions/ticket.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ticket_id = $_POST['ticket_id'];
    $priority  = $_POST['priority'];

    $allowed_priorities = ['Faible', 'Moyenne', 'Haute', 'Critique'];

    if (in_array($priority, $allowed_priorities)) {
        update_priority_ticket($ticket_id, $priority);
    }

    header("Location: /myticket/pages/single_ticket.php?id=" . $ticket_id);
    exit();
}
?>