<?php 
require_once 'database.php';
function add_messages_with_users($message, $ticket_id, $user_id) {
  $pdo = getPDO();
  $sql = "INSERT INTO messages (ticket_id, user_id, message, send_at) 
          VALUES (:ticket_id, :user_id, :message, NOW())";
  $stmt = $pdo->prepare($sql);
  $ok = $stmt->execute([

    ':ticket_id'   => $ticket_id,
    ':user_id' => $user_id,
    ':message'     => $message
  ]);
  return $ok;
}

function get_messages_by_ticket($ticket_id) {
  $pdo = getPDO();
  $sql = "SELECT m.message, m.send_at, u.name, u.role
          FROM messages AS m 
          INNER JOIN tickets AS t ON m.ticket_id = t.id
          INNER JOIN users AS u ON m.user_id = u.id
          WHERE m.ticket_id = :ticket_id
          ORDER BY m.send_at ASC";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([':ticket_id' => $ticket_id]);
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

