<?php
$BASE_URL = '/admin/pages/';

$gnbActive = array_fill(1, 9, "");
$pageActive = [];
$pagenum = $pagenum ?? 0;

$menus = [
    1 => [ 
        'key' => 'dashboard',
        'title' => '대시보드',
        'icon' => 'fa-grid-2',
        'url'  => '/admin/main.php',
        'subs' => []
    ],
    2 => [
        'key' => 'board',
        'title' => '게시판',
        'icon' => 'fa-list',
        'subs' => [
            ['title' => '게시판 관리', 'url' => 'board/board.manage.list.php'],
            ['title' => '게시글 관리', 'url' => 'board/board.list.php'],
        ]
    ],
    3 => [
        'key' => 'design',
        'title' => '디자인',
        'icon' => 'fa-paint-roller',
        'subs' => [
            ['title' => '배너 관리', 'url' => 'design/banner.list.php'],
            ['title' => '팝업 관리', 'url' => 'design/popup.list.php'],
        ]
    ],
    4 => [
        'key' => 'facility',
        'title' => '시설 관리',
        'icon' => 'fa-hospital',
        'url'  => '/admin/main.php',
        'subs' => []
    ],
    5 => [
        'key' => 'doctor',
        'title' => '의료진 관리',
        'icon' => 'fa-user-doctor',
        'url'  => '/admin/main.php',
        'subs' => []
    ],
    6 => [
        'key' => 'noninsured',
        'title' => '비급여 항목 관리',
        'icon' => 'fa-receipt',
        'url'  => '/admin/main.php',
    ],
    7 => [
        'key' => 'faq',
        'title' => 'FAQ 관리',
        'icon' => 'fa-clipboard-question',
        'url'  => '/admin/faq/index.php',
    ],
    8 => [
        'key' => 'account',
        'title' => '계정 관리',
        'icon' => 'fa-user-gear',
        'url'  => '/admin/pages/account',
    ],
    9 => [
        'key' => 'user',
        'title' => '회원 관리',
        'icon' => 'fa-users',
        'url'  => '/admin/pages/member',
    ],
    10 => [
        'key' => 'setting',
        'title' => '사이트 정보관리',
        'icon' => 'fa-globe',
        'subs' => [
            ['title' => '사이트 정보 관리', 'url' => 'setting/index.php'],
            ['title' => '사이트 외부 스크립트 관리', 'url' => 'setting/external.tag.php'],
        ]
    ],
];

function setActive(&$gnbActive, &$pageActive, $depth, $page, $gnbIndex, $key, $subCount = 0) {
    $gnbActive[$gnbIndex] = "active";

    if ($subCount > 0) {
        $pageActive[$key] = array_fill(0, $subCount, "");
        if ($page > 0 && $page <= $subCount) {
            $pageActive[$key][$page - 1] = "active";
        }
    }
}

if (isset($menus[$depthnum])) {
    $menu = $menus[$depthnum];
    $subCount = isset($menu['subs']) && is_array($menu['subs']) ? count($menu['subs']) : 0;
    setActive($gnbActive, $pageActive, $depthnum, $pagenum, $depthnum, $menu['key'], $subCount);
}
?>

<aside class="no-sidebar">
    <h1 class="no-sidebar-logo">
        <a href="<?=$NO_IS_SUBDIR?>/admin/pages/board/board.list.php">
            <img src="<?=$NO_IS_SUBDIR?>/resource/images/admin/logo.png" class="no-logo--default" />
            <img src="<?=$NO_IS_SUBDIR?>/resource/images/admin/logo-sm.png" class="no-logo--sm" />
        </a>
        <div class="no-sidebar-toggle"><span><i class="bx bx-chevrons-left"></i></span></div>
    </h1>

    <div class="no-sidebar-menu">
        <nav class="no-sidebar-menu__inner">
            <ul class="no-menu-list">
                <?php foreach ($menus as $index => $menu): ?>
                <?php $hasSub = !empty($menu['subs']); ?>
                <li class="no-menu-item <?=$gnbActive[$index] ?? ''?>">
                    <?php if ($hasSub): ?>
                    <span class="no-menu-link">
                        <span class="no-menu-icon"><i class="fa-solid <?=$menu['icon']?>"></i></span>
                        <span class="no-menu-title"><?=$menu['title']?></span>
                        <span class="no-menu-arrow"><i class="bx bx-chevron-down"></i></span>
                    </span>
                    <ul class="no-menu-sub">
                        <?php foreach ($menu['subs'] as $i => $sub): ?>
                        <li class="no-menu-item">
                            <a href="<?=$NO_IS_SUBDIR . $BASE_URL . $sub['url']?>"
                                class="no-menu-link <?=$pageActive[$menu['key']][$i] ?? ''?>">
                                <span class="no-menu-bullet"><span class="no-menu-bullet-dot"></span></span>
                                <span class="no-menu-title"><?=$sub['title']?></span>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php else: ?>
                    <a href="<?=$menu['url']?>" class="no-menu-link">
                        <span class="no-menu-icon"><i class="fa-solid <?=$menu['icon']?>"></i></span>
                        <span class="no-menu-title"><?=$menu['title']?></span>
                    </a>
                    <?php endif; ?>
                </li>
                <?php endforeach; ?>

            </ul>
        </nav>
    </div>
</aside>

<script defer>
const activatedMenu = document.querySelector('.no-menu-item.active .no-menu-arrow');
if (activatedMenu) activatedMenu.classList.add('open');
</script>