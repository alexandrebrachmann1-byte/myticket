<?php 
if($_SESSION["role"] === "user"): 
require_once "../functions/database.php"; 
require_once "../functions/ticket.php";

$result = get_tickets_about_user($_SESSION["user_id"]);
?>

<p>Bienvenue <?php echo $_SESSION["name"]; ?> !</p>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <?php require_once(__DIR__ . "/form_create_ticket.php"); ?>
        </div>
    </div>
</div>

<?php endif; ?>