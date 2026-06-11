<?php
if ($_SESSION["role"] === "administrateur"):
    require_once "../functions/database.php";
    require_once "../functions/ticket.php";

    $total     = total_number_of_tickets();
    $ouverts   = total_number_of_tickets_by_status('Ouvert');
    $en_cours  = total_number_of_tickets_by_status('En cours');
    $resolus   = total_number_of_tickets_by_status('Résolu');
    $fermes    = total_number_of_tickets_by_status('Fermé');
    $critiques = get_tickets_by_priority('Critique');
    $recents   = get_recently_updated_tickets();

    $search   = $_GET['search']   ?? '';
    $status   = $_GET['status']   ?? '';
    $priority = $_GET['priority'] ?? '';
    $author   = $_GET['author']   ?? '';
    $sort     = $_GET['sort']     ?? 'created_at';

    $tickets_filtres = search_and_filter_tickets($search, $status, $priority, $author, $sort);
?>

<p class="welcome-text">Bienvenue <?php echo htmlspecialchars($_SESSION["name"]); ?> !</p>

<div class="container py-4">

    <div class="row g-3 mb-4 justify-content-center">

        <div class="col-6 col-md-4 col-lg-2">
            <div class="card text-center" style="aspect-ratio: 1 / 1; overflow: hidden;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center p-1">
                    <h6 class="card-title text-muted small mb-1">Nombre de tickets total</h6>
                    <h2 class="stat-number mb-0"><?php echo $total; ?></h2>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
            <div class="card text-center" style="aspect-ratio: 1 / 1; overflow: hidden;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center p-1">
                    <h6 class="card-title text-muted small mb-1">Nombre de tickets ouverts</h6>
                    <h2 class="stat-number mb-0"><?php echo $ouverts; ?></h2>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
            <div class="card text-center" style="aspect-ratio: 1 / 1; overflow: hidden;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center p-1">
                    <h6 class="card-title text-muted small mb-1">Nombre de tickets en cours</h6>
                    <h2 class="stat-number mb-0"><?php echo $en_cours; ?></h2>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
            <div class="card text-center" style="aspect-ratio: 1 / 1; overflow: hidden;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center p-1">
                    <h6 class="card-title text-muted small mb-1">Nombre de tickets résolus</h6>
                    <h2 class="stat-number mb-0"><?php echo $resolus; ?></h2>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
            <div class="card text-center" style="aspect-ratio: 1 / 1; overflow: hidden;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center p-1">
                    <h6 class="card-title text-muted small mb-1">Nombre de tickets fermés</h6>
                    <h2 class="stat-number mb-0"><?php echo $fermes; ?></h2>
                </div>
            </div>
        </div>

    </div>

    <!-- Tickets critiques -->
    <div class="card mb-4">
        <div class="card-header fw-semibold">Tickets critiques</div>
        <div class="card-body">
            <?php if (empty($critiques)): ?>
                <p class="text-muted mb-0">Aucun ticket critique.</p>
            <?php else: ?>
                <?php foreach ($critiques as $ticket): ?>
                    <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                        <span><?php echo htmlspecialchars($ticket['title']); ?></span>
                        <small class="text-muted"><?php echo htmlspecialchars($ticket['updated_at']); ?></small>
                        <a href="/myticket/pages/single_ticket.php?id=<?php echo $ticket['id']; ?>" class="btn btn-primary btn-sm">Voir</a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Tickets récemment mis à jour -->
    <div class="card mb-4">
        <div class="card-header fw-semibold">Récemment mis à jour</div>
        <div class="card-body">
            <?php if (empty($recents)): ?>
                <p class="text-muted mb-0">Aucun ticket récent.</p>
            <?php else: ?>
                <?php foreach ($recents as $ticket): ?>
                    <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                        <span><?php echo htmlspecialchars($ticket['title']); ?></span>
                        <small class="text-muted"><?php echo htmlspecialchars($ticket['updated_at']); ?></small>
                        <a href="/myticket/pages/single_ticket.php?id=<?php echo $ticket['id']; ?>" class="btn btn-primary btn-sm">Voir</a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <a href="/myticket/pages/create_user.php" class="btn btn-primary btn-sm">Créer un utilisateur</a>

    <a href="/myticket/pages/manage_users.php" class="btn btn-primary btn-sm">Liste des utilisateurs</a>

    <!-- Recherche et filtres -->
    <?php require_once "../partials/form_filter.php"; ?>

    <!-- Liste des tickets filtrés -->
    <div class="mt-4">
        <h4 class="mb-3">Tickets</h4>

        <?php if (empty($tickets_filtres)): ?>
            <p class="text-muted">Aucun ticket trouvé.</p>
        <?php else: ?>
            <div class="row">
                <?php foreach ($tickets_filtres as $ticket): ?>
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

                            <div class="card-body d-flex gap-2 flex-wrap">
                                <a href="/myticket/pages/single_ticket.php?id=<?php echo $ticket["id"]; ?>" class="btn btn-primary btn-sm">Consulter</a>

                                <?php if (is_null($ticket["assigned_technician"])): ?>
                                    <form method="POST" action="/myticket/traitements/traitement_assign_ticket.php">
                                        <input type="hidden" name="ticket_id" value="<?php echo $ticket['id']; ?>">
                                        <button type="submit" class="btn btn-success btn-sm">S'assigner</button>
                                    </form>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

</div>

<?php endif; ?>