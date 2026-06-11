
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="">
            <div class="row g-3">

                <div class="col-md-4">
                    <label class="form-label text-muted small">Mot-clé</label>
                    <input type="text" name="search" class="form-control" placeholder="Rechercher un ticket..."
                        value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                </div>

                <div class="col-md-2">
                    <label class="form-label text-muted small">Statut</label>
                    <select name="status" class="form-select">
                        <option value="">Tous</option>
                        <option value="Ouvert"   <?php echo (isset($_GET['status']) && $_GET['status'] === 'Ouvert')   ? 'selected' : ''; ?>>Ouvert</option>
                        <option value="En cours" <?php echo (isset($_GET['status']) && $_GET['status'] === 'En cours') ? 'selected' : ''; ?>>En cours</option>
                        <option value="Résolu"   <?php echo (isset($_GET['status']) && $_GET['status'] === 'Résolu')   ? 'selected' : ''; ?>>Résolu</option>
                        <option value="Fermé"    <?php echo (isset($_GET['status']) && $_GET['status'] === 'Fermé')    ? 'selected' : ''; ?>>Fermé</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label text-muted small">Priorité</label>
                    <select name="priority" class="form-select">
                        <option value="">Toutes</option>
                        <option value="Faible"   <?php echo (isset($_GET['priority']) && $_GET['priority'] === 'Faible')   ? 'selected' : ''; ?>>Faible</option>
                        <option value="Moyenne"  <?php echo (isset($_GET['priority']) && $_GET['priority'] === 'Moyenne')  ? 'selected' : ''; ?>>Moyenne</option>
                        <option value="Haute"    <?php echo (isset($_GET['priority']) && $_GET['priority'] === 'Haute')    ? 'selected' : ''; ?>>Haute</option>
                        <option value="Critique" <?php echo (isset($_GET['priority']) && $_GET['priority'] === 'Critique') ? 'selected' : ''; ?>>Critique</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label text-muted small">Utilisateur</label>
                    <input type="text" name="author" class="form-control" placeholder="Nom utilisateur"
                        value="<?php echo isset($_GET['author']) ? htmlspecialchars($_GET['author']) : ''; ?>">
                </div>

                <div class="col-md-2">
                    <label class="form-label text-muted small">Trier par</label>
                    <select name="sort" class="form-select">
                        <option value="created_at" <?php echo (isset($_GET['sort']) && $_GET['sort'] === 'created_at') ? 'selected' : ''; ?>>Date de création</option>
                        <option value="updated_at" <?php echo (isset($_GET['sort']) && $_GET['sort'] === 'updated_at') ? 'selected' : ''; ?>>Dernière mise à jour</option>
                    </select>
                </div>

            </div>

            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-primary btn-sm">Rechercher</button>
                <a href="?" class="btn btn-outline-secondary btn-sm">Réinitialiser</a>
            </div>

        </form>
    </div>
</div>