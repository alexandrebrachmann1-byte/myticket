<?php 


function getPDO() { 
    try {
        $db = new PDO('mysql:host=localhost;dbname=webimmo', "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ✅ ajoute ça
        return $db;
    }
    catch(PDOException $err) {
        var_dump($err);
        throw $err;
    }
}