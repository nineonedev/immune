<?php
include_once "../../inc/lib/base.class.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 입력값 받기
$name = trim($_POST['name'] ?? '');
$user_id = trim($_POST['user_id'] ?? '');

// 필수값 검증
if (!$name) {
    echo json_encode(["success" => false, "message" => "이름을 입력해주세요."]);
    exit;
}
if (!$user_id) {
    echo json_encode(["success" => false, "message" => "아이디를 입력해주세요."]);
    exit;
}

try {
    // 데이터베이스 연결
    $db = DB::getInstance();

    // 사용자 정보 조회
    $query = "SELECT * FROM nb_users WHERE name = :name AND user_id = :user_id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo json_encode(["success" => false, "message" => "입력하신 정보와 일치하는 계정이 없습니다."]);
        exit;
    }

    // 새 비밀번호 생성 (랜덤 8자리 문자열)
    $new_password = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 8);
    $hashed_pwd = password_hash($new_password, PASSWORD_DEFAULT);

    // 비밀번호 업데이트
    $updateQuery = "UPDATE nb_users SET password = :password WHERE user_id = :user_id";
    $stmt = $db->prepare($updateQuery);
    $stmt->bindParam(':password', $hashed_pwd);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    echo json_encode([
        "success" => true,
        "message" => "비밀번호가 성공적으로 재설정되었습니다. 새 비밀번호를 확인해주세요.",
        "new_password" => $new_password
    ]);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "비밀번호 찾기 중 오류가 발생했습니다.", "error" => $e->getMessage()]);
}
?>