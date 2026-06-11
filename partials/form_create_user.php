<div class="container py-4" style="max-width: 520px;">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4">

            <h2 class="fw-semibold mb-4 text-dark">Créer un utilisateur</h2>

            <form method="POST" action="/myticket/traitements/traitement_create_user.php">

                <div class="mb-3">
                    <label class="form-label text-muted">Nom</label>
                    <input type="text" name="name" class="form-control rounded-3" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted">Adresse mail</label>
                    <input type="email" name="mail" class="form-control rounded-3" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted">Mot de passe</label>
                    <input type="password" name="password" class="form-control rounded-3" required>
                </div>

                <div class="mb-4">
                    <label class="form-label text-muted">Rôle</label>
                    <select name="role" class="form-select rounded-3">
                        <option value="utilisateur">Utilisateur</option>
                        <option value="technicien">Technicien</option>
                        <option value="administrateur">Administrateur</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100 rounded-3">Créer</button>

            </form>

        </div>
    </div>
</div>