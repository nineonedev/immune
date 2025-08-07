<?php
include_once "../inc/lib/base.class.php";

$user_id = trim($_POST['user_id'] ?? '');
$keyword = trim($_POST['keyword'] ?? '');

if (!$user_id || !$keyword) {
    echo json_encode([
        "success" => false,
        "message" => "아이디와 검색어를 모두 입력해주세요."
    ]);
    exit;
}

try {
    $db = DB::getInstance();

    $stmt = $db->prepare("DELETE FROM nb_user_search_history WHERE user_id = :user_id AND search_keyword = :keyword");
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':keyword', $keyword);
    $stmt->execute();

    echo json_encode([
        "success" => true,
        "message" => "검색어가 삭제되었습니다."
    ]);
} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "message" => "검색어 삭제 중 오류가 발생했습니다.",
        "error" => $e->getMessage()
    ]);
}