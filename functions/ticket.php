<?php 
require_once 'database.php';

function get_tickets_about_user($session_id){
  $pdo = getPDO();  
  $results = [];
  $sql = "SELECT t.id, t.title, t.description, t.author, t.created_at, t.updated_at, t.priority, t.status, t.assigned_technician FROM tickets as t INNER JOIN users as u ON u.id = t.id WHERE u.id = :id" ;
  $stmt = $pdo->prepare($sql);
  $ok = $stmt->execute([":id"=>$session_id]);
  if($ok){
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }


  return $results;

}

function add_tickets_with_users($title, $description, $priority, $session_id) {
  $pdo = getPDO();
  $sql = "INSERT INTO tickets (title, description, priority, author, status, user_id, created_at, updated_at) 
          VALUES (:title, :description, :priority, :author, 'send', :user_id, NOW(), NOW())";
  $stmt = $pdo->prepare($sql);
  $ok = $stmt->execute([
    ':title'       => $title,
    ':description' => $description,
    ':priority'    => $priority,
    ':author'      => $_SESSION['name'], 
    ':user_id'     => $session_id           
  ]);
  return $ok;
}