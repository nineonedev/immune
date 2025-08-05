<?php
include_once "../../inc/lib/base.class.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$mode = $_POST['mode'] ?? '';
if ($mode !== 'custom_inquiry') {
    echo json_encode([
        "result" => "fail",
        "msg" => "잘못된 요청입니다. [mode 오류]"
    ]);
    exit;
}

// 필수 항목 수신
$name         = $_POST['name'] ?? null;
$birth        = $_POST['birth'] ?? null;
$gender       = $_POST['gender'] ?? null;
$height       = $_POST['height'] ?? null;
$weight       = $_POST['weight'] ?? null;
$phone        = $_POST['phone'] ?? null;
$job          = $_POST['job'] ?? null;
$consult_time = $_POST['consult_time'] ?? null;
$first_visit  = $_POST['first_visit'] ?? null;
$branch_id    = $_POST['branch_id'] ?? null;

// 필수 유효성 검사
$required = [$name, $birth, $gender, $height, $weight, $phone, $job, $consult_time, $first_visit];
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

// 배열로 받은 필드 (체크박스 등)
function implodePost($key) {
    return isset($_POST[$key]) ? implode(',', (array)$_POST[$key]) : null;
}

// 일반 필드 수신
$treatment           = $_POST['treatment'] ?? null;
$symptoms            = $_POST['symptoms'] ?? null;
$drink               = $_POST['drink'] ?? null;
$headache            = $_POST['headache'] ?? null;
$dizzy               = $_POST['dizzy'] ?? null;
$pain_etc            = $_POST['pain_etc'] ?? null;
$feces_time          = $_POST['feces_time'] ?? null;
$urine_time          = $_POST['urine_time'] ?? null;
$birth_exp           = $_POST['birth_exp'] ?? null;
$birth_count         = $_POST['birth_count'] ?? null;
$miscarriage_exp     = $_POST['miscarriage_exp'] ?? null;
$miscarriage_count   = $_POST['miscarriage_count'] ?? null;
$menstrual_status    = $_POST['menstrual_status'] ?? null;
$menstrual_cycle     = $_POST['menstrual_cycle'] ?? null;
$menopause_age       = $_POST['menopause_age'] ?? null;
$hand_temp           = $_POST['hand_temp'] ?? null;
$foot_temp           = $_POST['foot_temp'] ?? null;
$swelling_area       = $_POST['swelling_area'] ?? null;
$swelling_time       = $_POST['swelling_time'] ?? null;

// checkbox (배열 형태)
$appetite         = implodePost('appetite');
$digestion        = implodePost('digestion');
$water            = implodePost('water');
$feces            = implodePost('feces');
$urine            = implodePost('urine');
$sweat            = implodePost('sweat');
$sweat_part       = implodePost('sweat_part');
$temperature      = implodePost('temperature');
$ent              = implodePost('ent');
$resp             = implodePost('resp');
$chest            = implodePost('chest');
$sleep            = implodePost('sleep');
$body_skin        = implodePost('body_skin');
$pain_area        = implodePost('pain_area');
$pain_condition   = implodePost('pain_condition');
$pain_special     = implodePost('pain_special');
$men_health       = implodePost('men_health');
$pain_menstrual   = implodePost('pain_menstrual');

try {
    $db = DB::getInstance();

    $query = "
        INSERT INTO nb_custom_inquires (
            name, birth, gender, height, weight, phone, job,
            consult_time, first_visit, branch_id,
            treatment, symptoms, drink, headache, dizzy, pain_etc,
            appetite, digestion, water, feces, urine, sweat, sweat_part,
            temperature, ent, resp, chest, sleep, body_skin, pain_area,
            pain_condition, pain_special, men_health, pain_menstrual,
            feces_time, urine_time,
            birth_exp, birth_count, miscarriage_exp, miscarriage_count,
            menstrual_status, menstrual_cycle, menopause_age,
            hand_temp, foot_temp, swelling_area, swelling_time,
            created_at
        ) VALUES (
            :name, :birth, :gender, :height, :weight, :phone, :job,
            :consult_time, :first_visit, :branch_id,
            :treatment, :symptoms, :drink, :headache, :dizzy, :pain_etc,
            :appetite, :digestion, :water, :feces, :urine, :sweat, :sweat_part,
            :temperature, :ent, :resp, :chest, :sleep, :body_skin, :pain_area,
            :pain_condition, :pain_special, :men_health, :pain_menstrual,
            :feces_time, :urine_time,
            :birth_exp, :birth_count, :miscarriage_exp, :miscarriage_count,
            :menstrual_status, :menstrual_cycle, :menopause_age,
            :hand_temp, :foot_temp, :swelling_area, :swelling_time,
            NOW()
        )
    ";

    $stmt = $db->prepare($query);

    // 바인딩
    $bindParams = compact(
        'name','birth','gender','height','weight','phone','job',
        'consult_time','first_visit','branch_id',
        'treatment','symptoms','drink','headache','dizzy','pain_etc',
        'appetite','digestion','water','feces','urine','sweat','sweat_part',
        'temperature','ent','resp','chest','sleep','body_skin','pain_area',
        'pain_condition','pain_special','men_health','pain_menstrual',
        'feces_time','urine_time',
        'birth_exp','birth_count','miscarriage_exp','miscarriage_count',
        'menstrual_status','menstrual_cycle','menopause_age',
        'hand_temp','foot_temp','swelling_area','swelling_time'
    );

    foreach ($bindParams as $key => $val) {
        $stmt->bindValue(":$key", $val);
    }

    $result = $stmt->execute();

    if ($result) {
        echo json_encode([
            "result" => "success",
            "msg" => "문의가 정상적으로 접수되었습니다."
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