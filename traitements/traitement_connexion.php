<?php
session_start(); 
require_once "../functions/database.php";
require_once "../functions/users.php";
if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(
        isset($_POST['mail']) && $_POST['mail'] !== '' &&
        isset($_POST['password']) && $_POST['password'] !== ''  )
    {

    

    $u = ["mail"=>$_POST["mail"],
            "password"=>$_POST['password']
            ];

        connexion($u);    
    }
    else{
       header("Location: /myticket/"); 
    }


    }
else{
    header("Location: /myticket/");
}