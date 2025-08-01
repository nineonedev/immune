<?php
include_once "../../inc/lib/base.class.php";

if (session_status() === PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['id'])) {
    echo json_encode(["success" => false, "message" => "로그인이 필요합니다."]);
    exit;
}

$uid = $_SESSION['id'];
$pwd_old = trim($_POST['pwd_old'] ?? '');
$pwd_new = trim($_POST['pwd_new'] ?? '');
$pwd_new_confirm = trim($_POST['pwd_new_confirm'] ?? '');

// 유효성 검사
if (!$pwd_old || !$pwd_new || !$pwd_new_confirm) {
    echo json_encode(["success" => false, "message" => "모든 항목을 입력해주세요."]);
    exit;
}

if ($pwd_new !== $pwd_new_confirm) {
    echo json_encode(["success" => false, "message" => "신규 비밀번호가 일치하지 않습니다."]);
    exit;
}

try {
    $db = DB::getInstance();

    // 기존 비밀번호 조회
    $stmt = $db->prepare("SELECT password FROM nb_users WHERE id = :id");
    $stmt->execute([':id' => $uid]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user || !password_verify($pwd_old, $user['password'])) {
        echo json_encode(["success" => false, "message" => "현재 비밀번호가 일치하지 않습니다."]);
        exit;
    }

    // 새 비밀번호 해싱
    $new_hashed = password_hash($pwd_new, PASSWORD_DEFAULT);

    // 업데이트
    $stmt = $db->prepare("UPDATE nb_users SET password = :password WHERE id = :id");
    $stmt->execute([
        ':password' => $new_hashed,
        ':id' => $uid
    ]);

    echo json_encode(["success" => true, "message" => "비밀번호가 성공적으로 변경되었습니다."]);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "비밀번호 변경 중 오류 발생", "error" => $e->getMessage()]);
}