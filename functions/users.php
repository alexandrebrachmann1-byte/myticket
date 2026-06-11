<?php 
require_once "database.php";   

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

function create_user($name, $mail, $password, $role) {
    $pdo = getPDO();
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $pdo->prepare("INSERT INTO users (name, mail, password, role) VALUES (:name, :mail, :password, :role)");
    return $stmt->execute([
        ':name'     => $name,
        ':mail'     => $mail,
        ':password' => $hash,
        ':role'     => $role
    ]);
}

function get_all_users() {
    $pdo = getPDO();
    $stmt = $pdo->query("SELECT * FROM users ORDER BY created_at DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function update_user($id, $name, $mail, $role) {
    $pdo = getPDO();
    $stmt = $pdo->prepare("UPDATE users SET name = :name, mail = :mail, role = :role WHERE id = :id");
    return $stmt->execute([
        ':name' => $name,
        ':mail' => $mail,
        ':role' => $role,
        ':id'   => $id
    ]);
}

function get_user_by_id($id) {
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function reset_password($id, $new_password) {
    $pdo = getPDO();
    $hash = password_hash($new_password, PASSWORD_BCRYPT);
    $stmt = $pdo->prepare("UPDATE users SET password = :password WHERE id = :id");
    return $stmt->execute([
        ':password' => $hash,
        ':id'       => $id
    ]);
}

function delete_user($id) {
    $pdo = getPDO();
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
    return $stmt->execute([':id' => $id]);
}