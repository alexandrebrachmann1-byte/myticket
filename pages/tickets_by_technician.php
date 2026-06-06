<?php 
session_start();
require_once "../functions/ticket.php";
$result = get_tickets_by_technician($_SESSION['name']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vos tickets en cours</title>
    <?php require_once "../partials/header.php"; ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
<?php if (check_connected_user()): ?>

    <?php if (empty($result)): ?>

        <p>Vous ne gerez aucun ticket !</p>

    <?php else: ?>

        <div class="container">
            <div class="row mt-4 mb-4">
                <h1 class="text-center">Vos tickets en cours :</h1>
            </div>

            <div class="row">
                <?php foreach ($result as $ticket): ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">

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

                            <div class="card-body d-flex gap-2">
                                <a href="/myticket/pages/single_ticket.php?id=<?php echo $ticket["id"]; ?>"
                                   class="btn btn-primary btn-sm">
                                    Consulter le ticket
                                </a>
                            </div>
                            </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    <?php endif; ?>

<?php else:
    header("Location: /myticket/pages/connexion.php");
endif; ?>


</body>
</html>