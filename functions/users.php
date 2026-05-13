<?php 


function connexion($user){

    $pdo = getPDO();
    $sql ="SELECT * FROM users WHERE mail = ?";
    $pstmt = $pdo->prepare($sql);
    $u = [$user["mail"]];

    if ($pstmt->execute($u)) {
        $user_base = $pstmt->fetch(PDO::FETCH_ASSOC);
        $isSame = password_verify($user["password"],$user_base["password"]);
        if($isSame === true){
            $_SESSION["name"] = $user_base["name"];
            $_SESSION["mail"] = $user_base["mail"];
            $_SESSION["role"] = $user_base["role"];
            $_SESSION["user_id"] = $user_base["id"];
            header("Location: /myticket/pages/dashboard.php");
        } else {
            header("Location: /myticket/pages/connexion.php");
        }
        exit();
    } else {
        print_r($pstmt->errorInfo());
    }

}