<?php if (is_null($ticket["assigned_technician"])): ?>
    <div class="card mb-4">
        <div class="card-header fw-semibold">S'assigner le ticket</div>
        <div class="card-body">
            <form method="POST" action="/myticket/traitements/traitement_assign_ticket.php">
                <input type="hidden" name="ticket_id" value="<?php echo $ticket['id']; ?>">
                <button type="submit" class="btn btn-success btn-sm">S'assigner</button>
            </form>
        </div>
    </div>
<?php endif; ?>