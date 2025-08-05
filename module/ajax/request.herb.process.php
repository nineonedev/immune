<?php
include_once "../../inc/lib/base.class.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 변수 수신
$mode           = $_POST['mode'] ?? '';
$inquiry_type   = $_POST['inquiry_type'] ?? null;

$name           = $_POST['name'] ?? null;
$birth          = $_POST['birth'] ?? null;
$gender         = $_POST['gender'] ?? null;
$height         = $_POST['height'] ?? null;
$weight         = $_POST['weight'] ?? null;
$phone          = $_POST['phone'] ?? null;

$consult_time   = $_POST['consult_time'] ?? null;
$first_visit    = $_POST['first_visit'] ?? null;
$branch_id      = $_POST['branch_id'] ?? null;

$treatment      = $_POST['treatment'] ?? null;
$symptoms       = $_POST['symptoms'] ?? null;
$drink          = $_POST['drink'] ?? null;
$feces_time     = $_POST['feces_time'] ?? null;
$urine_time     = $_POST['urine_time'] ?? null;

$appetite       = isset($_POST['appetite']) ? implode(',', $_POST['appetite']) : null;
$digestion      = isset($_POST['digestion']) ? implode(',', $_POST['digestion']) : null;
$feces          = isset($_POST['feces']) ? implode(',', $_POST['feces']) : null;
$urine          = isset($_POST['urine']) ? implode(',', $_POST['urine']) : null;
$sleep          = isset($_POST['sleep']) ? implode(',', $_POST['sleep']) : null;

$indigest       = $_POST['indigest'] ?? null;
$belly_pain     = $_POST['belly_pain'] ?? null;
$reason         = $_POST['reason'] ?? null;

// mode 체크
if ($mode !== 'inquiry_herb') {
    echo json_encode([
        "result" => "fail",
        "msg" => "잘못된 요청입니다. [mode 오류]"
    ]);
    exit;
}

// 필수 입력값 검증
$required = [$name, $birth, $gender, $height, $weight, $phone, $consult_time, $first_visit, $inquiry_type];
foreach ($required as $field) {
    if (is_null($field) || $field === '') {
        echo json_encode([
            "result" => "fail",
            "msg" => "필수 입력 항목이 누락되었습니다."
        ]);
        exit;
    }
}

// 재방문 시 지점 필수
if ($first_visit == 0 && empty($branch_id)) {
    echo json_encode([
        "result" => "fail",
        "msg" => "상담받은 지점을 선택해주세요."
    ]);
    exit;
}

try {
    $db = DB::getInstance();

    $query = "
        INSERT INTO nb_herb_inquiries (
            name, birth, gender, height, weight, phone,
            consult_time, first_visit, branch_id,
            treatment, symptoms, drink, feces_time, urine_time,
            appetite, digestion, feces, urine, sleep,
            indigest, belly_pain, reason,
            inquiry_type, created_at
        ) VALUES (
            :name, :birth, :gender, :height, :weight, :phone,
            :consult_time, :first_visit, :branch_id,
            :treatment, :symptoms, :drink, :feces_time, :urine_time,
            :appetite, :digestion, :feces, :urine, :sleep,
            :indigest, :belly_pain, :reason,
            :inquiry_type, NOW()
        )
    ";

    $stmt = $db->prepare($query);

    // Bind parameters
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':birth', $birth);
    $stmt->bindParam(':gender', $gender, PDO::PARAM_INT);
    $stmt->bindParam(':height', $height, PDO::PARAM_INT);
    $stmt->bindParam(':weight', $weight, PDO::PARAM_INT);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':consult_time', $consult_time, PDO::PARAM_INT);
    $stmt->bindParam(':first_visit', $first_visit, PDO::PARAM_INT);
    $stmt->bindParam(':branch_id', $branch_id);

    $stmt->bindParam(':treatment', $treatment);
    $stmt->bindParam(':symptoms', $symptoms);
    $stmt->bindParam(':drink', $drink);
    $stmt->bindParam(':feces_time', $feces_time);
    $stmt->bindParam(':urine_time', $urine_time);

    $stmt->bindParam(':appetite', $appetite);
    $stmt->bindParam(':digestion', $digestion);
    $stmt->bindParam(':feces', $feces);
    $stmt->bindParam(':urine', $urine);
    $stmt->bindParam(':sleep', $sleep);

    $stmt->bindParam(':indigest', $indigest);
    $stmt->bindParam(':belly_pain', $belly_pain);
    $stmt->bindParam(':reason', $reason);
    $stmt->bindParam(':inquiry_type', $inquiry_type, PDO::PARAM_INT);

    $result = $stmt->execute();

    if ($result) {
        echo json_encode([
            "result" => "success",
            "msg" => "상담 신청이 접수되었습니다. 빠른 시일 내 연락드리겠습니다."
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