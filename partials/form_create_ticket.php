<div class="card shadow-sm p-4 mt-4">
    <h4 class="card-title mb-4">Créer un ticket</h4>
    
    <form action="/myticket/traitements/traitement_create_ticket.php" method="POST">
        
        <div class="mb-3">
            <label for="title" class="form-label fw-semibold">Titre</label>
            <input 
                type="text" 
                class="form-control" 
                id="title" 
                name="title" 
                placeholder="Titre du ticket"
                required
            >
        </div>

        <div class="mb-3">
            <label for="description" class="form-label fw-semibold">Description du problème</label>
            <textarea 
                class="form-control" 
                id="description" 
                name="description" 
                rows="5" 
                placeholder="Décrivez votre problème en détail..."
                required
            ></textarea>
        </div>

        <div class="mb-4">
            <label for="priority" class="form-label fw-semibold">Niveau de priorité</label>
            <select class="form-select" id="priority" name="priority" required>
                <option value="" disabled selected>Choisir une priorité</option>
                <option value="faible">Faible</option>
                <option value="moyenne">Moyenne</option>
                <option value="haute">Haute</option>
                <option value="critique">Critique</option>
            </select>
        </div>

        <div class="d-grid">
            <button type="submit" name="create_ticket" class="btn btn-primary">
                Créer le ticket
            </button>
        </div>

    </form>
</div>