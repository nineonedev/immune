<?php
include_once "../../inc/lib/base.class.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 입력값 받기
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');

// 필수값 검증
if (!$name) {
    echo json_encode(["success" => false, "message" => "이름을 입력해주세요."]);
    exit;
}
if (!$email) {
    echo json_encode(["success" => false, "message" => "이메일을 입력해주세요."]);
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["success" => false, "message" => "올바른 이메일 형식을 입력해주세요."]);
    exit;
}

try {
    // 데이터베이스 연결
    $db = DB::getInstance();

    // 사용자 정보 조회
    $query = "SELECT user_id FROM nb_users WHERE name = :name AND email = :email";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo json_encode(["success" => false, "message" => "입력하신 정보와 일치하는 아이디가 없습니다."]);
        exit;
    }

    echo json_encode(["success" => true, "message" => "아이디 찾기 성공!", "user_id" => $user['user_id']]);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "아이디 찾기 중 오류가 발생했습니다.", "error" => $e->getMessage()]);
}
?>