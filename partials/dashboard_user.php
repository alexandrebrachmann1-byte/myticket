<?php 
if($_SESSION["role"] === "user"): 
require_once "../functions/database.php"; 
require_once "../functions/ticket.php";

$result = get_tickets_about_user($_SESSION["user_id"]);
?>

<p>Bienvenue <?php echo $_SESSION["name"]; ?> !</p>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <?php require_once(__DIR__ . "/form_create_ticket.php"); ?>
        </div>
    </div>
</div>

<?php if(empty($result)): ?>
    <p>Vous n'avez envoyé aucun ticket !</p>
<?php else: ?>

<div class="container mt-4">
    <h4 class="mb-3">Mes tickets</h4>
    <div class="row">
        <?php foreach($result as $ticket): ?>
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
                        <a href="/myticket/pages/single_ticket.php?id=<?php echo $ticket["id"]; ?>" class="btn btn-primary btn-sm">Voir</a>
                        <a href="/myticket/pages/edit_ticket.php?id=<?php echo $ticket["id"]; ?>" class="btn btn-warning btn-sm">Modifier</a>
                        <form method="POST" action="../traitements/traitement_delete_ticket.php">
                            <input type="hidden" name="id" value="<?php echo $ticket['id']; ?>">
                            <button class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php endif; ?>
<?php endif; ?>