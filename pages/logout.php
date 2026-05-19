<?php
session_start();
session_destroy();
header("Location: /myticket/pages/connexion.php");
exit();
?>