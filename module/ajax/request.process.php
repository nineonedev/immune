<?php
include_once "../../inc/lib/base.class.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 변수 수신
$mode               = $_POST['mode'] ?? '';
$branch_id          = $_POST['branch_id'] ?? null;
$name               = $_POST['name'] ?? null;
$phone              = $_POST['phone'] ?? null;
$consult_time       = $_POST['consult_time'] ?? null;
$hope_treatment     = $_POST['hope_treatment'] ?? null;
$contents           = $_POST['contents'] ?? null;
$private_check      = isset($_POST['private_check']) ? 1 : 0;
$marketing_check    = isset($_POST['marketing_check']) ? 1 : 0;
$r_captcha          = $_POST['r_captcha'] ?? '';

if ($mode !== 'inquiry_simple') {
    echo json_encode([
        "result" => "fail",
        "msg" => "잘못된 요청입니다. [mode 오류]"
    ]);
    exit;
}

// 필수 입력 체크
if (empty($branch_id) || empty($name) || empty($phone) || !$private_check) {
    echo json_encode([
        "result" => "fail",
        "msg" => "필수 입력 항목이 누락되었습니다."
    ]);
    exit;
}

try {
    $db = DB::getInstance();

        $query = "
        INSERT INTO nb_simple_inquiries (
            branch_id,
            name,
            phone,
            consult_time,
            hope_treatment,
            contents,
            private_check,
            marketing_check,
            created_at
        ) VALUES (
            :branch_id,
            :name,
            :phone,
            :consult_time,
            :hope_treatment,
            :contents,
            :private_check,
            :marketing_check,
            NOW()
        )
    ";


    $stmt = $db->prepare($query);
    $stmt->bindParam(':branch_id', $branch_id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':consult_time', $consult_time);
    $stmt->bindParam(':hope_treatment', $hope_treatment);
    $stmt->bindParam(':contents', $contents);
    $stmt->bindParam(':private_check', $private_check, PDO::PARAM_INT);
    $stmt->bindParam(':marketing_check', $marketing_check, PDO::PARAM_INT);

    $result = $stmt->execute();

    if ($result) {
        echo json_encode([
            "result" => "success",
            "msg" => "정상적으로 문의가 접수되었습니다. 빠른 시일 내 연락드리겠습니다."
        ]);
    } else {
        echo json_encode([
            "result" => "fail",
            "msg" => "처리 중 문제가 발생했습니다. [CODE001]"
        ]);
    }

} catch (PDOException $e) {
    echo json_encode([
        "result" => "fail",
        "msg" => "DB 오류가 발생했습니다. [CODE002]",
        "error" => $e->getMessage()
    ]);
}
?>