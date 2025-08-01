<?php
include_once "../../inc/lib/base.class.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 입력값 받기
$user_id  = trim($_POST['user_id'] ?? '');
$user_pwd = trim($_POST['password'] ?? '');

// 필수값 검증
if (!$user_id || !$user_pwd) {
    echo json_encode([
        "success" => false,
        "message" => "아이디와 비밀번호를 입력해주세요."
    ]);
    exit;
}

try {
    // 데이터베이스 연결
    $db = DB::getInstance();

    // 사용자 정보 조회 (birth, active_status 포함)
    $query = "SELECT id, user_id, password, name, email, phone, birth, active_status FROM nb_users WHERE user_id = :user_id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // 사용자 존재 여부 확인
    if (!$user) {
        echo json_encode([
            "success" => false,
            "message" => "아이디 또는 비밀번호가 일치하지 않습니다."
        ]);
        exit;
    }

    // 활성 상태 확인
    if ($user['active_status'] !== 'Y') {
        echo json_encode([
            "success" => false,
            "message" => "계정 권한이 없는 계정입니다. 관리자에 문의하세요."
        ]);
        exit;
    }

    // 비밀번호 검증
    if (!password_verify($user_pwd, $user['password'])) {
        echo json_encode([
            "success" => false,
            "message" => "아이디 또는 비밀번호가 일치하지 않습니다."
        ]);
        exit;
    }
    
    $_SESSION['id']    = $user['id'];
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['name']  = $user['name'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['phone'] = $user['phone'];
    $_SESSION['birth'] = $user['birth']; 

    echo json_encode([
        "success" => true,
        "message" => "로그인 성공!",
        "data" => [
            "user_id" => $user['user_id'],
            "name" => $user['name'],
            "email" => $user['email'],
            "phone" => $user['phone'],
            "birth"   => $user['birth'] 
        ]
    ]);
} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "message" => "로그인 처리 중 문제가 발생했습니다.",
        "error" => $e->getMessage()
    ]);
}
?>