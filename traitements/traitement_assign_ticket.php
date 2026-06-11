<?php
session_start();
require_once "../functions/ticket.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ticket_id = $_POST['ticket_id'];
    $name = $_SESSION['name']; 

    $success = assign_ticket_to_technician($ticket_id, $name);

    if ($success) {
        header("Location: /myticket/pages/single_ticket.php?id=" . $ticket_id);
    } else {
        header("Location: /myticket/pages/single_ticket.php?id=" . $ticket_id);
    }
    exit();
}
?>