<?php

include_once "../../inc/lib/base.class.php";

if (!isset($_SESSION['id'])) {
    echo json_encode([
        "success" => false,
        "message" => "로그인이 필요합니다."
    ]);
    exit;
}

$uid   = $_SESSION['id'];
$name  = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$birth = trim($_POST['birth'] ?? '');
$is_kakao = isset($_SESSION['kakao_id']) && !empty($_SESSION['kakao_id']);

// 필수값 검증
if (!$name) {
    echo json_encode(["success" => false, "message" => "이름을 입력해주세요."]);
    exit;
}

// 일반 로그인 사용자만 이메일/전화 필수 검사
if (!$is_kakao) {
    if (!$email) {
        echo json_encode(["success" => false, "message" => "이메일을 입력해주세요."]);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["success" => false, "message" => "올바른 이메일 형식을 입력해주세요."]);
        exit;
    }

    if (!$phone) {
        echo json_encode(["success" => false, "message" => "연락처를 입력해주세요."]);
        exit;
    }
    if (!$birth) {
        echo json_encode(["success" => false, "message" => "생년월일을 입력해주세요."]);
        exit;
    }
}

try {
    $db = DB::getInstance();

    $stmt = $db->prepare("SELECT name, email, phone, birth FROM nb_users WHERE id = :id");
    $stmt->execute([':id' => $uid]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo json_encode(["success" => false, "message" => "사용자 정보를 찾을 수 없습니다."]);
        exit;
    }
    
    if ($is_kakao) {
        if ($user['name'] === $name) {
            echo json_encode(["success" => false, "message" => "변경된 내용이 없습니다."]);
            exit;
        }
    } else {
        if (
            $user['name'] === $name &&
            $user['email'] === $email &&
            $user['phone'] === $phone &&
            $user['birth'] === $birth
        ) {
            echo json_encode(["success" => false, "message" => "변경된 내용이 없습니다."]);
            exit;
        }
    }

    // Update Query 분기
    if ($is_kakao) {
        $updateQuery = "UPDATE nb_users SET name = :name WHERE id = :id";
        $stmt = $db->prepare($updateQuery);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $uid);
    } else {
        $updateQuery = "UPDATE nb_users SET name = :name, email = :email, phone = :phone, birth = :birth WHERE id = :id";
        $stmt = $db->prepare($updateQuery);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':birth', $birth);
        $stmt->bindParam(':id', $uid);
    }

    $result = $stmt->execute();

    if ($result) {
        $_SESSION['name'] = $name;
        if (!$is_kakao) {
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phone;
            $_SESSION['birth'] = $birth;
        }

        echo json_encode([
            "success" => true,
            "message" => "프로필 정보가 성공적으로 업데이트되었습니다."
        ]);
    } else {
        echo json_encode(["success" => false, "message" => "프로필 업데이트 중 오류가 발생했습니다."]);
    }
} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "message" => "프로필 정보 수정 중 문제가 발생했습니다.",
        "error" => $e->getMessage()
    ]);
}

?>