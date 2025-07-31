<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; 

    if (!isset($_GET['code'])) {
        exit('카카로 로그인 실패!');
    }

    $CODE = $_GET['code'];

    $token_url = "https://kauth.kakao.com/oauth/token";

    $data = [
        'grant_type' => 'authorization_code',
        'client_id' => $REST_API_KEY,
        'redirect_uri' => $AUTH_REDIRECT_URL,
        'code' => $CODE
    ];

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

    // 3) 카카오 사용자 정보
    $kakao_id    = $user_info['id'];
    $nickname    = $user_info['properties']['nickname'] ?? '';
    $profile_img = $user_info['properties']['profile_image'] ?? '';

    // 4) DB 연결
    $db = DB::getInstance();

    // 4-1) 기존 회원인지 확인
    $stmt = $db->prepare("SELECT * FROM users WHERE kakao_id = :kakao_id");
    $stmt->execute([':kakao_id' => $kakao_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);


    if (!$user) {
    // 4-2) 신규 회원 가입
        $insert = $db->prepare("
            INSERT INTO users (kakao_id, nickname, profile_image) 
            VALUES (:kakao_id, :nickname, :profile_image)
        ");
        $insert->execute([
            ':kakao_id'    => $kakao_id,
            ':nickname'    => $nickname,
            ':profile_image' => $profile_img
        ]);

        // 가입 후 다시 조회
        $stmt->execute([':kakao_id' => $kakao_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 5) 세션 로그인 처리
    $_SESSION['user_id']      = $user['id'];
    $_SESSION['kakao_id']     = $user['kakao_id'];
    $_SESSION['nickname']     = $user['nickname'];
    $_SESSION['profile_img']  = $user['profile_image'];

    // 6) 로그인 후 메인 페이지로 이동
    header("Location: /");
    exit;
?>