<?php
$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https://' : 'http://';

// 사이트 메타 정보 설정
$NO_STATIC_TITLE = $SITEINFO_TITLE ?? '';
$NO_META_KEYWORDS = $SITEINFO_META_KEYWORDS ?? '';
$NO_META_DESCRIPTION = $SITEINFO_META_DESCRIPTION ?? '';

// 현재 URL 생성
$NO_META_URL = $protocol . ($_SERVER['HTTP_HOST'] ?? '') . ($_SERVER['REQUEST_URI'] ?? '');

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
$NO_META_OG_COUNTRY_NAME = "";

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

<title><?=$PAGE_TITLE?></title>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="autocomplete" content="off" />
<meta name="keywords" content="<?=$NO_META_KEYWORDS?>">
<meta name="description" content="<?=$NO_META_DESCRIPTION?>">
<meta name="image" content="<?=$NO_META_OG_IMAGE?>">
<meta name="robots" content="index, follow" />
<meta property="og:locale" content="ko_KR" />
<meta property="og:url" content="<?=$NO_META_OG_URL?>">
<meta property="og:image" content="<?=$NO_META_OG_IMAGE?>">
<meta property="og:type" content="website">
<meta property="og:site_name" content="<?=$NO_META_OG_SITE_NAME?>">
<meta property="og:title" content="<?=$NO_META_OG_TITLE?><?=$NO_STATIC_SUBTITLE?>">
<meta property="og:description" content="<?=$NO_META_OG_DESCRIPTION?>">
<link rel="shortcut icon" href="<?=$NO_META_SHORTCUT_ICON?>">
<meta name="naver-site-verification" content="fac25e6b2f9b700c30a5236fee3cefb59ed9f6a6" />
<meta name="google-site-verification" content="7D38nEvSN8uMQgHqx7DHTYCYOkpP7cJnlgCyZzXJOQs" />