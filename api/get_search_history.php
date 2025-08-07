<?php
include_once "../inc/lib/base.class.php";

$user_id = (int)($_GET['user_id'] ?? 0);
if (!$user_id) {
    echo json_encode([]);
    exit;
}

try {
    $db = DB::getInstance();
    $stmt = $db->prepare("SELECT search_keyword FROM nb_user_search_history WHERE user_id = :user_id ORDER BY searched_at DESC LIMIT 10");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $keywords = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo json_encode($keywords);
} catch (PDOException $e) {
    echo json_encode([]);
}