<?php

require_once "../../inc/lib/base.class.php";
require_once "../Model/AccountModel.php";
require_once "../core/Validator.php";

header('Content-Type: application/json');

try {
    $input = $_POST;

    $validator = new Validator();
    $validator->require('uid', $input['uid'] ?? '', '아이디');
    $validator->require('upwd', $input['upwd'] ?? '', '비밀번호');
    $validator->require('uname', $input['uname'] ?? '', '이름');
    $validator->email('email', $input['email'] ?? '', '이메일');
    $validator->phone('phone', $input['phone'] ?? '', '휴대폰');

    if ($validator->fails()) {
        echo json_encode([
            'success' => false,
            'message' => implode("\n", $validator->getErrors())
        ]);
        exit;
    }

    $input['created_at'] = date('Y-m-d H:i:s');
    $input['upwd'] = password_hash($input['upwd'], PASSWORD_DEFAULT);

    $id = AccountModel::insert($input);

    echo json_encode([
        'success' => true,
        'message' => '계정이 등록되었습니다.',
        'id' => $id
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => '등록 중 오류 발생: ' . $e->getMessage()
    ]);
}