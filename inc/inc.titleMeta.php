<?php

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https://' : 'http://';
$NO_META_URL = $protocol . ($_SERVER['HTTP_HOST'] ?? '') . ($_SERVER['REQUEST_URI'] ?? '');
$current_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$relative_path = preg_replace('#^(.*?/)?pages/#', '', $current_path);

$db = DB::getInstance();

try {
    $stmt = $db->prepare("SELECT * FROM nb_branch_seos WHERE path = :path LIMIT 1");
    $stmt->execute(['path' => $relative_path]);
    $seoData = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $seoData = [];
    error_log("SEO meta fetch error: " . $e->getMessage());
}

$NO_PAGE_TITLE = $seoData['page_title'] ?? '';
$NO_STATIC_TITLE = $seoData['meta_title'] ?? '';
$NO_META_DESCRIPTION = $seoData['meta_description'] ?? $SITEINFO_META_DESCRIPTION;
$NO_META_KEYWORDS = $seoData['meta_keywords'] ?? $SITEINFO_META_KEYWORDS;

$FULL_TITLE = '';
if (!empty($PAGE_TITLE) && !empty($NO_PAGE_TITLE)) {
    $FULL_TITLE = ($PAGE_TITLE === $NO_PAGE_TITLE)
        ? $PAGE_TITLE
        : $PAGE_TITLE . ' | ' . $NO_PAGE_TITLE;
} elseif (!empty($PAGE_TITLE)) {
    $FULL_TITLE = $PAGE_TITLE;
} elseif (!empty($NO_PAGE_TITLE)) {
    $FULL_TITLE = $NO_PAGE_TITLE;
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

<?php
    try {
        if (!isset($NO_SITE_UNIQUE_KEY) || empty($NO_SITE_UNIQUE_KEY)) {
            throw new Exception('NO_SITE_UNIQUE_KEY 값이 비어있습니다.');
        }

        $stmt = $db->prepare("SELECT tag_content FROM nb_site_tags WHERE is_active = 1 AND sitekey = :sitekey");
        $stmt->execute([':sitekey' => $NO_SITE_UNIQUE_KEY]);
        $tags = $stmt->fetchAll(PDO::FETCH_COLUMN);

        foreach ($tags as $tag) {
            echo $tag . PHP_EOL;
        }
    } catch (PDOException $e) {
        echo "💥 DB 오류: " . $e->getMessage();
    } catch (Exception $e) {
        echo "⚠️ 예외 발생: " . $e->getMessage();
}
?>