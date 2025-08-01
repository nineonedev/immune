<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; 


if (!isset($_GET['code'])) {
    exit('카카오 로그인 실패!');
}

$CODE = $_GET['code'];

$token_url = "https://kauth.kakao.com/oauth/token";

$data = [
    'grant_type' => 'authorization_code',
    'client_id' => $REST_API_KEY,
    'redirect_uri' => $AUTH_REDIRECT_URL,
    'code' => $CODE
];

// 1) 토큰 요청
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $token_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
$response = curl_exec($ch);
curl_close($ch);

$token_info = json_decode($response, true);
$access_token = $token_info['access_token'] ?? null;

if (!$access_token) {
    var_dump($token_info);
    exit("토큰 발급 실패");
}

// 2) 사용자 정보 가져오기
$user_url = "https://kapi.kakao.com/v2/user/me";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $user_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer {$access_token}"
]);
$user_response = curl_exec($ch);
curl_close($ch);

$user_info = json_decode($user_response, true);

$kakao_id    = $user_info['id'];
$nickname    = $user_info['properties']['nickname'] ?? '';
$profile_img = $user_info['properties']['profile_image'] ?? '';

// 3) DB 연결
$db = DB::getInstance();

// 3-1) 기존 회원인지 확인
$stmt = $db->prepare("SELECT * FROM nb_users WHERE kakao_id = :kakao_id");
$stmt->execute([':kakao_id' => $kakao_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// 3-2) 회원 없으면 등록
if (!$user) {
    $insert = $db->prepare("
        INSERT INTO nb_users (
            sitekey, user_id, password, name, email, phone,
            birth,
            kakao_id, kakao_nickname, kakao_profile_img,
            agree_receive_notice,
            agree_privacy_policy,
            agree_terms_of_service,
            regdate
        ) VALUES (
            :sitekey, :user_id, '', :name, '', '',
            '',
            :kakao_id, :kakao_nickname, :kakao_profile_img,
            0, 0, 0,
            NOW()
        )
    ");
    $insert->execute([
        ':sitekey'           => $NO_SITE_UNIQUE_KEY,
        ':user_id'           => 'kakao_' . $kakao_id,
        ':name'              => $nickname,
        ':kakao_id'          => $kakao_id,
        ':kakao_nickname'    => $nickname,
        ':kakao_profile_img' => $profile_img
    ]);

    // 가입 후 다시 조회
    $stmt->execute([':kakao_id' => $kakao_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}

// 4) 세션 로그인 처리
$_SESSION['id']           = $user['id']; 
$_SESSION['user_id']      = $user['user_id'] ?? null; 
$_SESSION['kakao_id']     = $user['kakao_id'];
$_SESSION['nickname']     = $user['kakao_nickname']; 
$_SESSION['profile_img']  = $user['kakao_profile_img'];

// 지점 확인 GET
$redirectPath = $_GET['state'] ?? '/';

header("Location: $redirectPath");
exit;