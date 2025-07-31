<?php
include_once "../../inc/lib/base.class.php";

$inquiry_type		= $_POST['inquiry_type'];
$name				= $_POST['name'];
$phone				= $_POST['phone'];
$email				= $_POST['email'];
$title					= $_POST['title'];
$contents			= $_POST['contents'];

$r_captcha		= $_POST['r_captcha'];

session_start();

if ($_SESSION['captcha_secure'] != $r_captcha) {
    echo json_encode([
        "result" => "fail",
        "msg" => "보안코드가 일치하지 않습니다. 정확히 입력해주세요"
    ]);
    exit;
}

try {
    // Obtain the PDO instance
    $db = DB::getInstance();

    // Prepare the SQL query
    $query = "INSERT INTO nb_request (
                sitekey,
				inquiry_type,
				name,
                phone,
                email,
				title,
                contents,
                regdate
              ) VALUES (
                '$NO_SITE_UNIQUE_KEY',
				:inquiry_type,
                :name,
                :phone,
                :email,
				:title,
                :contents,
                NOW()
              )";

    // Prepare the statement
    $stmt = $db->prepare($query);

    // Bind parameters
	$stmt->bindParam(':inquiry_type', $inquiry_type);
	$stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':email', $email);
	$stmt->bindParam(':title', $title);
    $stmt->bindParam(':contents', $contents);

    // Execute the statement
    $result = $stmt->execute();

    if ($result) {
        echo json_encode([
            'result' => 'success',
            'msg' => '정상적으로 등록 되었습니다. 담당자가 확인하는대로 연락드리겠습니다.'
        ]);
    } else {
        echo json_encode([
            'result' => 'fail',
            'msg' => '처리중 문제가 발생하였습니다. 관리자에게 문의해주세요 [CODE001]',
            //'q' => $query,
            //'r' => $result
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        'result' => 'fail',
        'msg' => '처리중 문제가 발생하였습니다. 관리자에게 문의해주세요 [CODE002]',
        'error' => $e->getMessage()
    ]);
}
?>
