<?php
$uri = $_SERVER['REQUEST_URI'];
$segments = explode('/', trim($uri, '/'));
$area = isset($segments[0]) && $segments[0] !== '' ? $segments[0] : '';

$boardNo = $_GET['board_no'] ?? null;
if ($boardNo !== null) {
    $boardNo = (int)$boardNo;

    if ($boardNo >= 9 && $boardNo <= 20) {
        $area = 'gangseo';
    } elseif ($boardNo >= 21 && $boardNo <= 30) {
        $area = 'gwangmyeon';
    } elseif ($boardNo >= 31 && $boardNo <= 40) {
        $area = 'sinchon';
    }
}

$area_names = [
    'gangseo'     => '강서',
    'gwangmyeon'  => '광명',
    'sinchon'     => '신촌',
    ''            => ''
];

$area_label = isset($area_names[$area]) ? $area_names[$area] : $area;

$dirname = $segments[2] ?? '';

$gnb_dirnames = array_map(function ($item) {
    return $item['dirname'];
}, $MENU_ITEMS);

$activeIndex = array_search($dirname, $gnb_dirnames);
if ($activeIndex === false) $activeIndex = 0;
?>

<div class="branding-fixed">

    <a href="/<?= htmlspecialchars($area) ?>" class="fixed-logo">
        <img src="/resource/images/pc-fixed-logo.svg">
    </a>

    <h2 class="no-heading-lg no-mg-24--y">
        필요한 치료만,<br>
        <b>진심을 담아</b>
    </h2>

    <ul class="simple-link-list no-mg-16--y">
        <li>
            <a href="/pages/board/board.list.php?board_no=13&category_no=17">
                <p class="no-body-xl">진료일정</p>
                <img src="/resource/images/icon/home-schedule.svg">
            </a>
        </li>

        <li>
            <a href="/<?= htmlspecialchars($area) ?>/pages/hospital/doctor.php">
                <p class="no-body-xl">의료진소개</p>
                <img src="/resource/images/icon/home-doctor.svg">
            </a>
        </li>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if (document.querySelector('.no-center-home')) {
                    const doctorLink = document.querySelector('a[href$="/pages/hospital/doctor.php"]')?.closest('li');
                    if (doctorLink) doctorLink.style.display = 'none';
                }
            });
        </script>

        <li>
            <a href="/pages/board/board.list.php?board_no=11">
                <p class="no-body-xl">환자후기</p>
                <img src="/resource/images/icon/home-review.svg">
            </a>
        </li>
    </ul>

    <div class="home-contact no-mg-24--t">
        <div class="txt">
            <h3 class="no-body-xl fw700">궁금하신 점이 있으신가요?</h3>
            <p class="no-body-xl">QR을 촬영하여 전화주세요.</p>

            <a href="tel:<?= $SITEINFO_FOOTER_PHONE ?>" class="no-body-xl fw700 no-mg-10--t">
                <?= $SITEINFO_FOOTER_PHONE ?>
            </a>
        </div>

        <img src="/resource/images/home-qrcode.svg">
    </div>
</div>