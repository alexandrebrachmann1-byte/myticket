
<div>
    <form action="/myticket/traitements/traitement_send_message.php" method="POST">
        <input type="hidden" name="ticket_id" value="<?= htmlspecialchars($ticket_id);?>">
        <div class="mb-3">
            <label for="message" class="form-label">Envoyer un message :</label>
            <textarea placeholder ="Votre message..." class="form-control" id="message" name="message" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
        

    </form>
</div>