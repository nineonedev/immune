<?php
$uri = $_SERVER['REQUEST_URI'];
$segments = explode('/', trim($uri, '/'));
$area = isset($segments[0]) && $segments[0] !== '' ? $segments[0] : '';

$defaultMenuPath = __DIR__ . '/../../json/menu.json';
$areaMenuPath = __DIR__ . '/../../json/menu.' . $area . '.json';

$menuPath = file_exists($areaMenuPath) ? $areaMenuPath : $defaultMenuPath;

$CUR_PAGE_LIST = [];

if (file_exists($menuPath)) {
    $jsonData = file_get_contents($menuPath);
    $CUR_PAGE_LIST = json_decode($jsonData, true)['pages'] ?? [];
}
?>

<section class="no-sub-nav">
    <div class="no-container-xl">
        <div class="swiper no-sub-nav__swiper sub-nav-slider">
            <ul class="swiper-wrapper">
                <?php foreach ($CUR_PAGE_LIST as $menu) :
                    if ($menu['title'] === '병원소개' || $menu['title'] === '로그인') continue;
                    $isActive = strpos($_SERVER['REQUEST_URI'], $menu['dirname']) !== false;
                    $activeClass = $isActive ? 'active' : '';
                    $link = '/' . $area . '/pages/' . $menu['dirname'] . '/home.php';
                ?>
                    <li class="swiper-slide <?= $activeClass ?>">
                        <a href="<?= $link ?>" class="no-body-xl">
                            <?= $menu['title'] ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>