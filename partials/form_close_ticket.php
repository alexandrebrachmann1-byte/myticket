<?php if ($ticket['status'] !== 'Fermé'): ?>
<div class="card mb-4">
        <div class="card-header fw-semibold">Fermer le ticket</div>
        <div class="card-body">
            <form method="POST" action="/myticket/traitements/traitement_close_ticket.php">
                <input type="hidden" name="ticket_id" value="<?php echo $ticket['id']; ?>">
                <button type="submit" class="btn btn-danger btn-sm">Fermer le ticket</button>
            </form>
        </div>
    </div>
<?php endif; ?>