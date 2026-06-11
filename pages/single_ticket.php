<?php
session_start();
require_once "../functions/ticket.php";
require_once "../functions/message.php";

if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] !== "") :
    if (isset($_GET["id"]) && $_GET["id"] !== "") :
        $ticket_id = $_GET["id"];
        $ticket = get_one_ticket_by_id($ticket_id);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/myticket/assets/css/single_ticket.css">
    <title><?php echo $ticket["title"]; ?></title>
</head>
<body class="bg-light">

<?php require_once "../partials/header.php"; ?>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <!-- Carte ticket -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($ticket["title"]); ?></h5>
                    <p class="card-text"><?php echo htmlspecialchars($ticket["description"]); ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Statut : <?php echo htmlspecialchars($ticket["status"]); ?></li>
                    <li class="list-group-item">Écrit par : <?php echo htmlspecialchars($ticket["author"]); ?></li>
                    <li class="list-group-item">Priorité : <?php echo htmlspecialchars($ticket["priority"]); ?></li>
                    <li class="list-group-item">Envoyé le : <?php echo htmlspecialchars($ticket["created_at"]); ?></li>
                    <li class="list-group-item">Mis à jour le : <?php echo htmlspecialchars($ticket["updated_at"]); ?></li>
                    <li class="list-group-item">Technicien :
                        <?php echo $ticket["assigned_technician"]
                            ? htmlspecialchars($ticket["assigned_technician"])
                            : "Non assigné"; ?>
                    </li>
                </ul>
            </div>

        <!-- Modifier le statut/la priorité/fermer le ticket (technicien uniquement) -->
<?php if ($_SESSION['role'] === 'technicien' || $_SESSION['role'] === 'administrateur') : 
    require_once "../partials/form_update_status.php";
    require_once "../partials/form_update_priority.php";
    require_once "../partials/form_assign_ticket.php";
    require_once "../partials/form_close_ticket.php";
    
endif; ?>

            <!-- Bloc messages -->
            <div class="card mb-4">
                <div class="card-header fw-semibold">Messages</div>
                <div class="card-body d-flex flex-column gap-3">
                    <?php
                    $messages = get_messages_by_ticket($ticket_id);
                    if (!empty($messages)) :
                        foreach ($messages as $message) : ?>
                            <div class="border rounded p-3 bg-light">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="fw-semibold"><?= htmlspecialchars($message['name']) ?></span>
                                    <span class="badge bg-secondary"><?= htmlspecialchars($message['role']) ?></span>
                                </div>
                                <p class="mb-1"><?= htmlspecialchars($message['message']) ?></p>
                                <small class="text-muted"><?= htmlspecialchars($message['send_at']) ?></small>
                            </div>
                        <?php endforeach;
                    else : ?>
                        <p class="text-muted mb-0">Aucun message pour ce ticket.</p>
                    <?php endif; ?>
                </div>
            </div>
                <?php require_once "../partials/form_send_message.php"; ?>
        </div>
    </div>
</div>

</body>
</html>

<?php
    else:
        header("Location: /myticket/pages/dashboard.php");
    endif;
else:
    header("Location: /myticket/pages/connexion.php");
endif;
?>