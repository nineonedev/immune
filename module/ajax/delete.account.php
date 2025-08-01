<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php';

$db = DB::getInstance();

// 세션에 따라 사용자 식별
$user_id = $_SESSION['id'] ?? null; 

if (!$user_id) {
    echo json_encode(['success' => false, 'message' => '로그인이 필요합니다.']);
    exit;
}

try {
    $stmt = $db->prepare("DELETE FROM nb_users WHERE id = :id");
    $stmt->execute([':id' => $user_id]);

    // 세션 삭제
    session_unset();
    session_destroy();

    echo json_encode(['success' => true, 'message' => '회원탈퇴가 완료되었습니다.']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => '탈퇴 처리 중 오류 발생.']);
}