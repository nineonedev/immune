<?php
$uri = $_SERVER['REQUEST_URI'];
$segments = explode('/', trim($uri, '/'));
$area = $segments[0] ?? '';
$dirname = $segments[2] ?? '';
$filename = pathinfo($segments[3] ?? '', PATHINFO_FILENAME);

$defaultMenuPath = __DIR__ . '/../../json/menu.json';
$areaMenuPath = __DIR__ . '/../../json/menu.' . $area . '.json';

$menuPath = file_exists($areaMenuPath) ? $areaMenuPath : $defaultMenuPath;
$CUR_PAGE_LIST = [];

if (file_exists($menuPath)) {
    $jsonData = file_get_contents($menuPath);
    $menuData = json_decode($jsonData, true)['pages'] ?? [];

    foreach ($menuData as $depth1) {
        foreach ($depth1['pages'] ?? [] as $depth2) {
            if ($depth2['filename'] === $filename) {
                $CUR_PAGE_LIST = $depth1['pages'];
                break 2;
            }

            foreach ($depth2['pages'] ?? [] as $depth3) {
                if ($depth3['filename'] === $filename) {
                    $CUR_PAGE_LIST = $depth2['pages'];
                    break 3;
                }
            }
        }
    }
}
?>

<section class="no-sub-nav dir-<?= htmlspecialchars($dirname) ?>">
    <div class="no-container-xl">
        <div class="swiper no-sub-nav__swiper sub-nav-slider">
            <ul class="swiper-wrapper">
                <?php foreach ($CUR_PAGE_LIST as $menu) :
                    $isActive = strpos($_SERVER['REQUEST_URI'], $menu['filename']) !== false;
                    $activeClass = $isActive ? 'active' : '';
                    $link = '/' . $area . '/pages/' . $dirname . '/' . $menu['filename'] . '.php';
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