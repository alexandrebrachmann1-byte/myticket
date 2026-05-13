<?php

function deconnexion(){

session_destroy();
header("Location: /myticket/pages/connexion.php");
}