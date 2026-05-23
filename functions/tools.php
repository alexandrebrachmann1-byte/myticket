<?php

function deconnexion(){

session_destroy();
header("Location: /myticket/pages/connexion.php");
}

function check_connected_user(){
    if(!empty($_SESSION['user_id']) && isset($_SESSION["user_id"])  ){
        return true;
    }
    return false;
}