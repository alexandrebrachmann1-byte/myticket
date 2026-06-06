<?php 
if($_SESSION["role"] === "technicien"): 
require_once "../functions/database.php"; 
require_once "../functions/ticket.php";

$result = get_all_tickets_unassigned();
?>

<p>Bienvenue <?php echo $_SESSION["name"]; ?> !</p>


<?php if(empty($result)): ?>
    <p>Aucun ticket pour le moment !</p>
<?php else: ?>

<div class="container mt-4">
    <h4 class="mb-3">Tickets non assignés </h4>
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
                        <a href="/myticket/pages/single_ticket.php?id=<?php echo $ticket["id"]; ?>" class="btn btn-primary btn-sm">Consulter le ticket</a>
                    </div>
              
                    <form method="POST" action="/myticket/traitements/traitement_assign_ticket.php">
                        <input type="hidden" name="ticket_id" value="<?php echo $ticket['id']; ?>">
                        <button type="submit" class="btn btn-success btn-sm">S'assigner le ticket</button>
                    </form>

    

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php endif; ?>
<?php endif; ?>