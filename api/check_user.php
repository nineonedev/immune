<?php
include_once "../inc/lib/base.class.php";


$user_id = trim($_POST['user_id'] ?? '');

if (!$user_id) {
    echo json_encode([
        "success" => false,
        "message" => "아이디를 입력해주세요."
    ]);
    exit;
}

try {
    $db = DB::getInstance();

    $stmt = $db->prepare("SELECT COUNT(*) FROM nb_users WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        echo json_encode([
            "success" => false,
            "message" => "이미 사용 중인 아이디입니다."
        ]);
    } else {
        echo json_encode([
            "success" => true,
            "message" => "사용 가능한 아이디입니다."
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "message" => "아이디 확인 중 오류가 발생했습니다.",
        "error" => $e->getMessage()
    ]);
}