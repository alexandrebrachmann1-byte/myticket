<div class="card mb-4">
        <div class="card-header fw-semibold">Modifier la priorité</div>
        <div class="card-body">
            <form method="POST" action="/myticket/traitements/traitement_update_priority.php">
                <input type="hidden" name="ticket_id" value="<?php echo $ticket['id']; ?>">
                <div class="mb-3">
                    <label for="priority" class="form-label">Priorité</label>
                    <select name="priority" id="priority" class="form-select">
                        <option value="Faible"   <?php echo $ticket['priority'] === 'Faible'   ? 'selected' : ''; ?>>Faible</option>
                        <option value="Moyenne"  <?php echo $ticket['priority'] === 'Moyenne'  ? 'selected' : ''; ?>>Moyenne</option>
                        <option value="Haute"    <?php echo $ticket['priority'] === 'Haute'    ? 'selected' : ''; ?>>Haute</option>
                        <option value="Critique" <?php echo $ticket['priority'] === 'Critique' ? 'selected' : ''; ?>>Critique</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Mettre à jour</button>
            </form>
        </div>
    </div>