<?php
include_once "../../inc/lib/base.class.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 입력값 받기
$user_id  = trim($_POST['user_id'] ?? '');
$user_pwd = trim($_POST['password'] ?? '');
$name     = trim($_POST['name'] ?? '');
$email    = trim($_POST['email'] ?? '');
$phone    = trim($_POST['phone'] ?? '');
$birth = trim($_POST['birth'] ?? '');



// 필수값 검증
if (!$user_id || !$user_pwd || !$name || !$email || !$phone ) {
    echo json_encode([
        "success" => false,
        "message" => "모든 필수 정보를 입력해주세요."
    ]);
    exit;
}

foreach ($agree_options as $key => $item) {
    if ($item['required'] && !isset($_POST[$key])) {
        echo json_encode([
            "success" => false,
            "message" => "{$item['label']} 항목에 동의하셔야 가입이 가능합니다."
        ]);
        exit;
    }
}


try {
    // DB 연결
    $db = DB::getInstance();

    // 아이디 중복 검사
    $checkQuery = "SELECT COUNT(*) FROM nb_users WHERE user_id = :user_id";
    $stmt = $db->prepare($checkQuery);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $userExists = $stmt->fetchColumn();

    if ($userExists > 0) {
        echo json_encode([
            "success" => false,
            "message" => "이미 사용 중인 아이디입니다."
        ]);
        exit;
    }

    // 이메일 중복 검사
    $emailCheckQuery = "SELECT COUNT(*) FROM nb_users WHERE email = :email";
    $stmt = $db->prepare($emailCheckQuery);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $emailExists = $stmt->fetchColumn();

    if ($emailExists > 0) {
        echo json_encode([
            "success" => false,
            "message" => "이미 사용 중인 이메일입니다. 다른 이메일을 입력해주세요."
        ]);
        exit;
    }

    // 비밀번호 해싱
    $hashed_pwd = password_hash($user_pwd, PASSWORD_DEFAULT);

    // 동의 항목 값 준비
    $agree_data = [];
    foreach ($agree_options as $field => $label) {
        $agree_data[$field] = isset($_POST[$field]) ? 1 : 0;
    }

    // INSERT 실행
    $query = "INSERT INTO nb_users (
                sitekey,
                user_id,
                password,
                name,
                email,
                phone,
                birth,
                agree_receive_notice,
                agree_privacy_policy,
                agree_terms_of_service,
                regdate
              ) VALUES (
                :sitekey,
                :user_id,
                :password,
                :name,
                :email,
                :phone,
                :birth,
                :agree_receive_notice,
                :agree_privacy_policy,
                :agree_terms_of_service,
                NOW()
              )";

    $stmt = $db->prepare($query);
    $stmt->bindValue(':sitekey', $NO_SITE_UNIQUE_KEY);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->bindValue(':password', $hashed_pwd);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':phone', $phone);
    $stmt->bindValue(':birth', $birth);
    $stmt->bindValue(':agree_receive_notice', $agree_data['agree_receive_notice'], PDO::PARAM_INT);
    $stmt->bindValue(':agree_privacy_policy', $agree_data['agree_privacy_policy'], PDO::PARAM_INT);
    $stmt->bindValue(':agree_terms_of_service', $agree_data['agree_terms_of_service'], PDO::PARAM_INT);

    $result = $stmt->execute();

    if ($result) {
        echo json_encode([
            "success" => true,
            "message" => "회원가입이 완료되었습니다!"
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "회원가입 중 오류가 발생했습니다."
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "message" => "회원가입 처리 중 문제가 발생했습니다.",
        "error" => $e->getMessage()
    ]);
}
?>