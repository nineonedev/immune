<?php

$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https://' : 'http://';
$NO_META_URL = $protocol . ($_SERVER['HTTP_HOST'] ?? '') . ($_SERVER['REQUEST_URI'] ?? '');

// 현재 경로에서 상대 경로만 추출 (ex: cancer/female-1.php)
$current_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$relative_path = preg_replace('#^(.*?/)?pages/#', '', $current_path);

$db = DB::getInstance();

$sql = "SELECT * 
        FROM nb_branch_seos 
        WHERE path = :path 
        LIMIT 1";
$stmt = $db->prepare($sql);
$stmt->execute(['path' => $relative_path]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

// 현재 페이지 타이틀
$NO_PAGE_TITLE = $data['page_title'] ?? "";

// 메타 타이틀
$NO_STATIC_TITLE = $data['meta_title'] ?? "";
$NO_META_DESCRIPTION = $data['meta_description'] ?? $SITEINFO_META_DESCRIPTION;
$NO_META_KEYWORDS = $data['meta_keywords'] ?? $SITEINFO_META_KEYWORDS;

// 중복 방지 및 조합
if ($PAGE_TITLE && $NO_PAGE_TITLE) {
    if ($PAGE_TITLE === $NO_PAGE_TITLE) {
        $FULL_TITLE = $PAGE_TITLE;
    } else {
        $FULL_TITLE = $PAGE_TITLE . ' | ' . $NO_PAGE_TITLE;
    }
} elseif ($PAGE_TITLE) {
    $FULL_TITLE = $PAGE_TITLE;
} elseif ($NO_PAGE_TITLE) {
    $FULL_TITLE = $NO_PAGE_TITLE;
} else {
    $FULL_TITLE = '';
}


// Twitter 메타 설정
$NO_META_TWITTER_CARD = "Summary";
$NO_META_TWITTER_URL = $NO_META_URL;
$NO_META_TWITTER_TITLE = $NO_STATIC_TITLE;
$NO_META_TWITTER_DESCRIPTION = $NO_META_DESCRIPTION;
$NO_META_TWITTER_IMAGE = ($NO_IS_SUBDIR ?? '') . "/uploads/meta/" . ($SITEINFO_META_THUMB ?? '');

// Open Graph 메타 설정
$NO_META_OG_URL = $protocol . ($_SERVER['HTTP_HOST'] ?? '');
$NO_META_OG_TYPE = "website";
$NO_META_OG_IMAGE = $NO_META_OG_URL . "/uploads/meta/" . ($SITEINFO_META_THUMB ?? '');
$NO_META_OG_SITE_NAME = $NO_STATIC_TITLE;
$NO_META_OG_LOCALE = "ko";
$NO_META_OG_TITLE = $NO_STATIC_TITLE;
$NO_META_OG_DESCRIPTION = $NO_META_DESCRIPTION;

// Itemprop 메타 설정
$NO_META_ITEMPROP_NAME = $NO_STATIC_TITLE;
$NO_META_ITEMPROP_IMAGE = "";
$NO_META_ITEMPROP_URL = $NO_META_URL;
$NO_META_ITEMPROP_DESCRIPTION = $NO_META_DESCRIPTION;
$NO_META_ITEMPROP_KEYWORD = $NO_META_KEYWORDS;

// Favicon 설정
$NO_META_SHORTCUT_ICON = ($NO_IS_SUBDIR ?? '') . "/uploads/meta/" . ($SITEINFO_META_FAVICON_ICO ?? '');
$NO_META_APPLE_THOUCH_ICON = "";

?>


<title><?= htmlspecialchars($FULL_TITLE) ?></title>

<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="autocomplete" content="off" />
<meta name="keywords" content="<?= htmlspecialchars($NO_META_KEYWORDS) ?>">
<meta name="description" content="<?= htmlspecialchars($NO_META_DESCRIPTION) ?>">
<meta name="image" content="<?= htmlspecialchars($NO_META_OG_IMAGE) ?>">
<meta name="robots" content="index, follow" />

<meta property="og:locale" content="ko_KR" />
<meta property="og:url" content="<?= htmlspecialchars($NO_META_OG_URL) ?>">
<meta property="og:image" content="<?= htmlspecialchars($NO_META_OG_IMAGE) ?>">
<meta property="og:type" content="website">
<meta property="og:site_name" content="<?= htmlspecialchars($NO_META_OG_SITE_NAME) ?>">
<meta property="og:title" content="<?= htmlspecialchars($NO_META_OG_TITLE) ?><?= $NO_STATIC_SUBTITLE ?? '' ?>">
<meta property="og:description" content="<?= htmlspecialchars($NO_META_OG_DESCRIPTION) ?>">

<link rel="shortcut icon" href="<?= htmlspecialchars($NO_META_SHORTCUT_ICON) ?>">

<!-- ✅ 외부 TAG BEGIN -->
<?php
$stmt = $db->prepare("SELECT tag_content FROM nb_site_tags WHERE is_active = 1 AND sitekey = :sitekey");
$stmt->execute([':sitekey' => $NO_SITE_UNIQUE_KEY]);
$tags = $stmt->fetchAll(PDO::FETCH_COLUMN);

foreach ($tags as $tag) {
    echo $tag . PHP_EOL;
}
?>
<!-- ✅ 외부 TAG END -->