<?php 
require_once 'database.php';

function get_tickets_about_user($session_id){
  $pdo = getPDO();  
  $results = [];
  $sql = "SELECT t.id, t.title, t.description, t.author, t.created_at, t.updated_at, t.priority, t.status, t.assigned_technician FROM tickets as t INNER JOIN users as u ON u.id = t.user_id WHERE u.id = :id" ;
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
          VALUES (:title, :description, :priority, :author, 'Nouveau', :user_id, NOW(), NOW())";
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

function get_one_ticket_by_id($id){
  $pdo =  getPDO();
  $sql = "SELECT * FROM tickets WHERE  id = :id";
  $stmt = $pdo->prepare($sql);
  $ok = $stmt->execute([":id"=>$id]);
  if($ok){
    $ticket = $stmt->fetch(PDO::FETCH_ASSOC);
  }
  return $ticket;
}

function update_ticket_updated_at($ticket_id) {
    $pdo = getPDO();
    $sql = "UPDATE tickets SET updated_at = NOW() WHERE id = :ticket_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':ticket_id' => $ticket_id]);
}

function get_all_tickets_unassigned() {
    $pdo = getPDO();
    $sql = "SELECT * FROM tickets WHERE assigned_technician IS NULL";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function assign_ticket_to_technician($ticket_id, $name) {
    $pdo = getPDO();
    $sql = "UPDATE tickets SET assigned_technician = :name, status = 'En cours', updated_at = NOW() WHERE id = :ticket_id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':name' => $name,
        ':ticket_id' => $ticket_id
    ]);
}

function get_tickets_by_technician($name) {
    $pdo = getPDO();
    $sql = "SELECT * FROM tickets WHERE assigned_technician = :name";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':name' => $name]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function update_status_ticket($ticket_id, $status) {
    $pdo = getPDO();
    $sql = "UPDATE tickets SET status = :status, updated_at = NOW() WHERE id = :ticket_id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':status' => $status,
        ':ticket_id' => $ticket_id
    ]);
}

function update_priority_ticket($ticket_id, $priority) {
    $pdo = getPDO();
    $sql = "UPDATE tickets SET priority = :priority, updated_at = NOW() WHERE id = :ticket_id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':priority' => $priority,
        ':ticket_id' => $ticket_id
    ]);
}

function close_ticket($ticket_id) {
    $pdo = getPDO();
    $sql = "UPDATE tickets SET status = 'Fermé', updated_at = NOW() WHERE id = :ticket_id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':ticket_id' => $ticket_id
    ]);
}

function total_number_of_tickets() {
    $pdo = getPDO();
    $sql = "SELECT COUNT(*) FROM tickets";
    return $pdo->query($sql)->fetchColumn();
}

function total_number_of_tickets_by_status($status) {
    $pdo = getPDO();
    $sql = "SELECT COUNT(*) FROM tickets WHERE status = :status";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':status' => $status]);
    return $stmt->fetchColumn();
}

function get_tickets_by_priority($priority) {
    $pdo = getPDO();
    $sql = "SELECT * FROM tickets WHERE priority = :priority";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':priority' => $priority]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_recently_updated_tickets() {
    $pdo = getPDO();
    $sql = "SELECT * FROM tickets ORDER BY updated_at DESC LIMIT 5";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function search_and_filter_tickets($search = '', $status = '', $priority = '', $author = '', $sort = 'created_at') {
    $pdo = getPDO();

    $allowed_sorts = ['created_at', 'updated_at'];
    $sort = in_array($sort, $allowed_sorts) ? $sort : 'created_at';

    $sql = "SELECT * FROM tickets WHERE 1=1";
    $params = [];

    if (!empty($search)) {
        $sql .= " AND (title LIKE :search OR description LIKE :search)";
        $params[':search'] = '%' . $search . '%';
    }

    if (!empty($status)) {
        $sql .= " AND status = :status";
        $params[':status'] = $status;
    }

    if (!empty($priority)) {
        $sql .= " AND priority = :priority";
        $params[':priority'] = $priority;
    }

    if (!empty($author)) {
        $sql .= " AND author LIKE :author";
        $params[':author'] = '%' . $author . '%';
    }

    $sql .= " ORDER BY $sort DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}