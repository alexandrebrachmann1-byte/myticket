<div class="card mb-4">
        <div class="card-header fw-semibold">Modifier le statut</div>
        <div class="card-body">
            <form method="POST" action="/myticket/traitements/traitement_update_status.php">
                <input type="hidden" name="ticket_id" value="<?php echo $ticket['id']; ?>">
                <div class="mb-3">
                    <label for="status" class="form-label">Statut</label>
                    <select name="status" id="status" class="form-select">
                        <option value="Nouveau"      <?php echo $ticket['status'] === 'Nouveau'      ? 'selected' : ''; ?>>Nouveau</option>
                        <option value="Ouvert"    <?php echo $ticket['status'] === 'Ouvert'    ? 'selected' : ''; ?>>Ouvert</option>
                        <option value="En cours"      <?php echo $ticket['status'] === 'En cours'      ? 'selected' : ''; ?>>En cours</option>
                        <option value="En attente utilisateur"       <?php echo $ticket['status'] === 'En attente utilisateur'       ? 'selected' : ''; ?>>En attente utilisateur</option>
                        <option value="Résolu"       <?php echo $ticket['status'] === 'Résolu'       ? 'selected' : ''; ?>>Résolu</option>
                        <option value="Fermé"       <?php echo $ticket['status'] === 'Fermé'       ? 'selected' : ''; ?>>Fermé</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Mettre à jour</button>
            </form>
        </div>
    </div>