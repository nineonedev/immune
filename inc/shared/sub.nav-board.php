<?php
$uri = $_SERVER['REQUEST_URI'];
$segments = explode('/', trim($uri, '/'));
$area = $segments[0] ?? '';
$dirname = $segments[2] ?? '';
$filename = pathinfo($segments[3] ?? '', PATHINFO_FILENAME);

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

$menuPath = __DIR__ . '/../../json/menu.' . $area . '.json';
if (!file_exists($menuPath)) {
    $menuPath = __DIR__ . '/../../json/menu.json';
}

$hospitalMenu = [];
$boardActiveNo = null;

if (file_exists($menuPath)) {
    $json = json_decode(file_get_contents($menuPath), true);
    foreach ($json['pages'] ?? [] as $section) {
		if (($section['dirname'] ?? '') === 'hospital') {
			$hospitalMenu = $section['pages'] ?? [];
			foreach ($section['pages'] as $item) {
				if (
					isset($item['board_no']) &&
					isset($boardNo) &&
					(int)$item['board_no'] === (int)$boardNo
				) {
					$boardActiveNo = (string)$item['board_no'];
					break;
				}
			}
			break;
		}
	}
}
?>

<section class="no-sub-nav dir-hospital">
    <div class="no-container-xl">
        <div class="swiper no-sub-nav__swiper sub-nav-slider">
            <ul class="swiper-wrapper">
                <?php foreach ($hospitalMenu as $item): ?>
                    <?php
                        $isActive = false;
                        $link = '#';

                        if (isset($item['filename']) && $item['filename']) {
                            $isActive = $item['filename'] === $filename;
                            $link = "/$area/pages/hospital/{$item['filename']}.php";
                        } elseif (isset($item['board_no']) && $item['board_no']) {
                            $link = "/pages/board/board.list.php?board_no={$item['board_no']}";
                            $isActive = (
                                ($boardNo !== null && $boardNo == $item['board_no']) || 
                                ($boardActiveNo !== null && $boardActiveNo == $item['board_no']) 
                            );
                        }
                    ?>
                    <li class="swiper-slide<?= $isActive ? ' active' : '' ?>">
                        <a href="<?= $link ?>" class="no-body-xl">
                            <?= htmlspecialchars($item['title']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>