<?php
include_once "../inc/lib/base.class.php";

$user_id = trim($_POST['user_id'] ?? '');

if (!$user_id) {
    echo json_encode([
        "success" => false,
        "message" => "user_id가 없습니다."
    ]);
    exit;
}

try {
    $db = DB::getInstance();

    $stmt = $db->prepare("DELETE FROM nb_user_search_history WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();

    echo json_encode([
        "success" => true,
        "message" => "검색 기록이 모두 삭제되었습니다."
    ]);
} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "message" => "삭제 중 오류 발생",
        "error" => $e->getMessage()
    ]);
}