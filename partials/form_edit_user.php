<div class="container py-4" style="max-width: 520px;">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4">

            <h2 class="fw-semibold mb-4 text-dark">Modifier un utilisateur</h2>

            <form method="POST" action="/myticket/traitements/traitement_edit_user.php">
                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">

                <div class="mb-3">
                    <label class="form-label text-muted">Nom</label>
                    <input type="text" name="name" class="form-control rounded-3"
                           value="<?php echo htmlspecialchars($user['name']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted">Adresse mail</label>
                    <input type="email" name="mail" class="form-control rounded-3"
                           value="<?php echo htmlspecialchars($user['mail']); ?>" required>
                </div>

                <div class="mb-4">
                    <label class="form-label text-muted">Nouveau mot de passe</label>
                    <input type="password" name="password" class="form-control rounded-3" placeholder="Laisser vide pour ne pas modifier">
                </div>

                <div class="mb-4">
                    <label class="form-label text-muted">Rôle</label>
                    <select name="role" class="form-select rounded-3">
                        <option value="utilisateur" <?php echo $user['role'] === 'utilisateur' ? 'selected' : ''; ?>>Utilisateur</option>
                        <option value="technicien"  <?php echo $user['role'] === 'technicien'  ? 'selected' : ''; ?>>Technicien</option>
                        <option value="administrateur" <?php echo $user['role'] === 'administrateur' ? 'selected' : ''; ?>>Administrateur</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100 rounded-3">Enregistrer les modifications</button>

            </form>

        </div>
    </div>
</div>
