<?php

function getBannersByBranch($branchName, $bannerType = null, $limit = 0, $return_type = 'array') {
    $db = DB::getInstance();
    
    $params = [
        ':branchName' => $branchName
    ];

    $query = "
        SELECT 
            b.*, 
            br.name AS branch_code, 
            br.name_kr AS branch_name,
            b.is_target  -- ✅ 새창 여부 필드 포함
        FROM nb_banners AS b
        INNER JOIN nb_branches AS br ON b.branch_id = br.id
        WHERE 
            b.is_active = 1
            AND (
                b.is_unlimited = 1
                OR (
                    b.is_unlimited = 2
                    AND b.start_at <= CURDATE()
                    AND b.end_at >= CURDATE()
                )
            )
            AND br.name = :branchName
    ";

    if (!is_null($bannerType)) {
        $query .= " AND b.banner_type = :bannerType";
        $params[':bannerType'] = $bannerType;
    }

    $query .= " ORDER BY b.sort_no ASC";

    if ($limit > 0) {
        $query .= " LIMIT :limit";
    }

    $stmt = $db->prepare($query);

    foreach ($params as $key => $value) {
        $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
        $stmt->bindValue($key, $value, $type);
    }

    if ($limit > 0) {
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    }

    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($return_type === 'json') {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'success' => true,
            'data' => $results
        ]);
        return;
    }

    return $results;
}




function getDoctors($branchName = null, $department = null, $limit = 0, $return_type = 'array') {
    $db = DB::getInstance();

    $params = [];

    $query = "
        SELECT 
            d.*, 
            br.name AS branch_code, 
            br.name_kr AS branch_name
        FROM nb_doctors AS d
        LEFT JOIN nb_branches AS br ON d.branch_id = br.id
        WHERE d.is_active = 1
    ";

    // 지점 필터
    if (!is_null($branchName)) {
        $query .= " AND br.name = :branchName";
        $params[':branchName'] = $branchName;
    }

    // 부서 필터
    if (!is_null($department)) {
        $query .= " AND d.department = :department";
        $params[':department'] = $department;
    }

    $query .= " ORDER BY d.sort_no ASC";

    if ($limit > 0) {
        $query .= " LIMIT :limit";
    }

    $stmt = $db->prepare($query);

    // 파라미터 바인딩
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
    }

    if ($limit > 0) {
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    }

    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($return_type === 'json') {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['success' => true, 'data' => $results]);
        return;
    }

    return $results;
}


function getFacilities($branchName, $category = null, $limit = 0, $return_type = 'array') {
    $db = DB::getInstance();
    $params = [':branchName' => $branchName];

    $query = "
        SELECT 
            f.*, 
            br.name AS branch_code, 
            br.name_kr AS branch_name
        FROM nb_facilities AS f
        INNER JOIN nb_branches AS br ON f.branch_id = br.id
        WHERE f.is_active = 1
          AND br.name = :branchName
    ";

    if (!is_null($category)) {
        $query .= " AND f.categories = :category";
        $params[':category'] = $category;
    }

    $query .= " ORDER BY f.sort_no ASC";

    if ($limit > 0) {
        $query .= " LIMIT :limit";
    }

    $stmt = $db->prepare($query);

    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
    }

    if ($limit > 0) {
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    }

    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($return_type === 'json') {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'success' => true,
            'data' => $results
        ]);
        return;
    }

    return $results;
}


function getNonpayItemsByPrimaryCategory(int $primaryCategory, int $limit = 0, string $return_type = 'array')
{
    global $nonpay_primary_categories, $nonpay_secondary_categories;

    if (!isset($nonpay_primary_categories[$primaryCategory])) {
        return $return_type === 'json'
            ? json_encode(['success' => false, 'error' => 'Invalid primary category'])
            : [];
    }

    $db = DB::getInstance();

    // 해당 primary의 모든 secondary key 추출
    $secondaryKeys = array_keys($nonpay_secondary_categories[$primaryCategory] ?? []);

    if (empty($secondaryKeys)) {
        return $return_type === 'json'
            ? json_encode(['success' => false, 'error' => 'No secondary categories found'])
            : [];
    }

    // IN 절 구성
    $inClause = implode(',', array_fill(0, count($secondaryKeys), '?'));

    $query = "
        SELECT category_secondary, title, cost
        FROM nb_nonpay_items
        WHERE is_active = 1
          AND category_primary = ?
          AND category_secondary IN ($inClause)
        ORDER BY category_secondary ASC, sort_no ASC
    ";

    $stmt = $db->prepare($query);

    // Bind primary + secondary
    $bindParams = array_merge([$primaryCategory], $secondaryKeys);

    foreach ($bindParams as $i => $value) {
        $stmt->bindValue($i + 1, $value, PDO::PARAM_INT);
    }

    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 그룹핑 결과
    $grouped = [];

    foreach ($results as $row) {
        $sec = (int)$row['category_secondary'];
        $secTitle = $nonpay_secondary_categories[$primaryCategory][$sec] ?? '기타';

        $grouped[$secTitle][] = [
            'title' => $row['title'],
            'cost' => $row['cost'],
        ];
    }

    // JSON 응답 처리
    if ($return_type === 'json') {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'success' => true,
            'data' => $grouped
        ]);
        return;
    }

    return $grouped;
}



function getFaqs(string $branchName, $category = null, $keyword = null, $limit = 0, $return_type = 'array', $offset = 0) {
    $db = DB::getInstance();
    $params = [':branchName' => $branchName];

    $query = "
        SELECT 
            f.*, 
            br.name AS branch_code, 
            br.name_kr AS branch_name
        FROM nb_faqs AS f
        INNER JOIN nb_branches AS br ON f.branch_id = br.id
        WHERE f.is_active = 1
          AND br.name = :branchName
    ";

    if (!is_null($category)) {
        $query .= " AND f.categories = :category";
        $params[':category'] = $category;
    }

    if (!is_null($keyword)) {
        $query .= " AND f.question LIKE :keyword";
        $params[':keyword'] = '%' . $keyword . '%';
    }

    $query .= " ORDER BY f.sort_no ASC";

    // ✅ LIMIT 직접 삽입 (권장)
    if ($limit > 0) {
        $offset = (int)$offset;
        $limit = (int)$limit;
        $query .= " LIMIT $offset, $limit";
    }

    $stmt = $db->prepare($query);

    foreach ($params as $key => $value) {
        $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
        $stmt->bindValue($key, $value, $type);
    }

    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($return_type === 'json') {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['success' => true, 'data' => $results]);
        return;
    }

    return $results;
}





function getTotalCount(string $from, string $where = '', array $params = []): int {
    $db = DB::getInstance();

    $query = "SELECT COUNT(*) AS total FROM {$from}";
    if (!empty($where)) {
        $query .= " WHERE {$where}";
    }

    $stmt = $db->prepare($query);
    foreach ($params as $key => $val) {
        $type = is_int($val) ? PDO::PARAM_INT : PDO::PARAM_STR;
        $stmt->bindValue($key, $val, $type);
    }

    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return (int)($row['total'] ?? 0);
}






// 페이지 이동
function location($go_url) {
    echo "<script>document.location='$go_url';</script>";
    exit;
}

// 에러 출력
function error($msg, $go_url = "") {
    if (empty($go_url)) {
        echo "<script>alert('$msg');history.go(-1);</script>";
    } else {
        echo "<script>alert('$msg');document.location='$go_url';</script>";
    }
    exit;
}

// 에러 출력 후 닫기
function error_close($msg) {
    echo "<script>alert('$msg');self.close();</script>";
    exit;
}

// 경고창 출력
function alert($msg, $go_url = "") {
    if (empty($go_url)) {
        echo "<script>alert('$msg');history.go(-1);</script>";
    } else {
        echo "<script>alert('$msg');document.location='$go_url';</script>";
    }
}

function getBanner($loc, $limit = 1, $return_type = 'html') {
    global $NO_SITE_UNIQUE_KEY;
    
    // Initialize an empty array to store the results
    $r = array();

    // Define the query with placeholders for parameterized statements
    $query = "
        SELECT * 
        FROM nb_banner 
        WHERE sitekey = :sitekey 
          AND b_loc = :loc 
          AND b_view = 'Y' 
          AND ((b_sdate <= CURDATE() AND b_edate >= CURDATE()) OR b_none_limit = 'Y') 
        ORDER BY b_idx ASC, no ASC 
        LIMIT :limit
    ";

    // Get the PDO instance
    $db = DB::getInstance();

    // Prepare the statement
    $stmt = $db->prepare($query);

    // Bind parameters with appropriate data types
    $stmt->bindParam(':sitekey', $NO_SITE_UNIQUE_KEY, PDO::PARAM_STR);
    $stmt->bindParam(':loc', $loc, PDO::PARAM_STR);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);

    // Execute the statement
    $stmt->execute();

    // Fetch all results into an associative array
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the results array
    return $r;
}

// 경고창만 출력
function alertonly($msg) {
    echo "<script>alert('$msg');</script>";
}

// 완료 메시지 출력
function complete($com_msg, $go_url = "") {
    if (empty($go_url)) {
        echo "<script>window.setTimeout('history.go(-1)', 600);</script>";
    } else {
        echo "<script>window.setTimeout('document.location=\"$go_url\";', 600);</script>";
    }

    echo "<body><table width=100% height=100%><tr><td align=center><font size=2>$com_msg</font></td></tr></table></body>";
}

// 체크박스 체크확인 리턴
function chkPrint($val, $target) {
    return $val == $target ? "checked" : "";
}

function selectedPrint($val, $target) {
    return $val == $target ? "selected" : "";
}

// 문자열 끊기 (길이가 초과되면 '...'로 표시)
function cut_str($msg, $cut_size) {
    return mb_strimwidth($msg, 0, $cut_size, '...');
}

// 인젝션 방지 치환
function safeStr($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

// 난수 생성
function getRndCode($len) {
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ023456789";
    $pass = '';
    while ($len--) {
        $pass .= $chars[random_int(0, strlen($chars) - 1)];
    }
    return $pass;
}

// xss_clean (XSS 방지 필터링)
function xss_clean($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

// D-DAY 계산
function getDday($target) {
    $end_date = strtotime($target);
    return floor(($end_date - strtotime(date('Y-m-d'))) / 86400);
}

// 시간 경과 계산
function time_ago($date) {
    if (empty($date)) return "No date provided";
    $periods = ["초", "분", "시간", "일", "주", "개월", "년", "10년"];
    $lengths = [60, 60, 24, 7, 4.35, 12, 10];
    $now = time();
    $unix_date = strtotime($date);
    if (!$unix_date) return "Bad date";
    
    $tense = $now > $unix_date ? "전" : "후";
    $difference = abs($now - $unix_date);

    for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
        $difference /= $lengths[$j];
    }
    $difference = round($difference);

    return "$difference{$periods[$j]} $tense";
}

// 파일 확장자 체크
function file_check($filename, $file_str = "php|htm|html|inc|shtm|ztx|dot|cgi|pl|exe") {
    $fext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $file_str = strtolower($file_str);
    if (preg_match("/\b$fext\b/", $file_str)) {
        error("해당 파일은 업로드할 수 없는 형식입니다.");
    }
}

// 특수문자 제거
function doRemoveSpecial($str) {
    return preg_replace("/[ #&+\-%@=\/\\\:;,'\"\^`~_|!\?\*$#<>()\[\]\{\}]/i", "", $str);
}

// URL에서 링크 추출
function makeLinks($str, $target) {
    return preg_replace_callback('/(http|https):\/\/[^\s]+/i', function($matches) use ($target) {
        $url = $matches[0];
        return "<a href=\"$url\" $target>$url</a>";
    }, $str);
}

// 이미지 업로드
function imageUpload($path, $upfile, $origin_file = '', $return_origin = false) {
    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif', 'ico', 'svg'];
    $max_file_size = 10485760; // 10MB



    // 빈값이거나 업로드 파일이 없을 경우 공백 반환
    if (empty($upfile) || !isset($upfile['name']) || $upfile['error'] === UPLOAD_ERR_NO_FILE) {
        return ['origin' => '', 'saved' => ''];
    }

    try {
        // 파일 크기 제한 확인
        if ($upfile['size'] > $max_file_size) {
            throw new Exception("이미지 사이즈가 10MB 이하로 등록해주세요.");
        }

        // 확장자 검증
        $ext = strtolower(pathinfo($upfile['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, $allowed_ext)) {
            throw new Exception("허용되지 않는 파일입니다.");
        }

        // 파일 이름 생성
        $file_saved = uniqid('', true) . ".$ext";
        $file_origin = $upfile['name'];

        // 디렉터리 생성
        if (!is_dir($path) && !mkdir($path, 0755, true) && !is_dir($path)) {
            throw new Exception("파일 업로드 경로를 생성하지 못했습니다.");
        }

		// echo json_encode(['files' => $_FILES, 'tmp' => $upfile['tmp_name'], 'path' => "$path/$file_saved"]); exit; 
        // 파일 이동
        if (!move_uploaded_file($upfile['tmp_name'], "$path/$file_saved")) {
            throw new Exception("파일 업로드에 실패했습니다.");
        }

        // 기존 파일 삭제
        if ($origin_file && file_exists("$path/$origin_file")) {
            unlink("$path/$origin_file");
        }

        // 결과 반환
        return $return_origin ? ['origin' => $file_origin, 'saved' => $file_saved] : ['origin' => '', 'saved' => $file_saved];
    
    } catch (Exception $e) {
        echo json_encode(["result" => "fail", "msg" => $e->getMessage()]);
        exit;
    }
}


function imageDelete(string $path): bool
{
    // Check if path is provided, exists, and is a file (not a directory)
    if ($path && file_exists($path) && is_file($path)) {
        return unlink($path);
    }

    return false;
}


// 페이지 리스트 출력
function print_pagelist($page, $list_amount, $page_count, $param, $page_type = "") {
    global $code, $catcode, $orderby, $skin_dir, $ptype;
    $skin_dir = $skin_dir ?: "/admin/manage";
    $param = $param ? "&$param" : "";

    $spage = floor(($page - 1) / $list_amount) * $list_amount + 1;
    $epage = min($spage + $list_amount - 1, $page_count);
    $ppage = max($spage - $list_amount, 1);
    $npage = min($epage + 1, $page_count);
    $page_name = $page_type === "C" ? "cpage" : "page";

    if ($epage > 0) {
        echo "<div class='pagination'>";
        echo "<a href='?ptype=$ptype&$page_name=1$param'>◀◀</a>";
        echo "<a href='?ptype=$ptype&$page_name=$ppage$param'>◀</a>";
        for ($i = $spage; $i <= $epage; $i++) {
            echo $i === $page ? "<strong>$i</strong>" : "<a href='?ptype=$ptype&$page_name=$i$param'>$i</a>";
        }
        echo "<a href='?ptype=$ptype&$page_name=$npage$param'>▶</a>";
        echo "<a href='?ptype=$ptype&$page_name=$page_count$param'>▶▶</a>";
        echo "</div>";
    }
}

// 메일 발송 함수
function sendMailer($_email, $_from, $_sitename, $_title, $_content, $cc = []) {
    $headers = "Content-Type: text/html; charset=utf-8\r\n";
    if (!preg_match("/@daum.net|@hamail.net/i", $_email)) {
        $headers .= "From: =?UTF-8?B?" . base64_encode($_sitename) . "?= <$_from>\r\n";
    }
    $headers .= "Return-Path: $_from\r\n";
    if ($cc) $headers .= "Cc: " . implode(", ", $cc) . "\r\n";

    $_title = '=?UTF-8?B?' . base64_encode($_title) . '?=';
    return mail($_email, $_title, $_content, $headers, "-f $_from");
}