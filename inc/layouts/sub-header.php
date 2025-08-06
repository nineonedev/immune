</head>

<body>

    <header>
        <div class="no-header">
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
            $filename = pathinfo($segments[3] ?? '', PATHINFO_FILENAME);

            $defaultMenuPath = $_SERVER['DOCUMENT_ROOT'] . '/json/menu.json';
            $areaMenuPath = $_SERVER['DOCUMENT_ROOT'] . '/json/menu.' . $area . '.json';

            $menuPath = file_exists($areaMenuPath) ? $areaMenuPath : $defaultMenuPath;

            $depth1_title = '';
            $depth2_title = '';

            if (file_exists($menuPath)) {
                $json = file_get_contents($menuPath);
                $menuData = json_decode($json, true)['pages'] ?? [];

                foreach ($menuData as $depth1) {
                    if ($depth1['dirname'] === $dirname) {
                        foreach ($depth1['pages'] as $depth2) {
                            if ($depth2['filename'] === $filename) {
                                $depth1_title = $depth1['title'];
                                $depth2_title = $depth2['title'];
                                break 2;
                            }
                            foreach ($depth2['pages'] ?? [] as $depth3) {
                                if ($depth3['filename'] === $filename) {
                                    $depth1_title = $depth1['title'];
                                    $depth2_title = $depth2['title'];
                                    break 3;
                                }
                            }
                        }
                    }
                }
            }

            $gnb_dirnames = array_map(function ($item) {
                return $item['dirname'];
            }, $MENU_ITEMS);

            $activeIndex = array_search($dirname, $gnb_dirnames);
            if ($activeIndex === false) $activeIndex = 0;
            ?>

            <div class="left-grup">
                <h1 class="no-header__sub-title">
                    <a href="/<?= htmlspecialchars($area) ?>/pages/<?= htmlspecialchars($dirname) ?>/home.php">
                        <?= $depth1_title ?>
                        <?php if ($depth2_title): ?>
                        <span><?= $depth2_title ?></span>
                        <?php endif; ?>
                    </a>
                </h1>
            </div>

            <!--HeaderBtn-->
            <div class="right-group">
                <i class="i-30 no-header__search">
                    <i class="fa-regular fa-magnifying-glass"></i>
                </i>

                <i class="i-30 no-header__btn">
                    <i class="fa-regular fa-bars"></i>
                </i>
            </div>
        </div>
    </header>

    <aside class="no-header__m">
        <div class="close-wrap no-pd-16">
            <img src="/resource/images/icon/h-close.svg" class="h-close">
        </div>

        <div class="logo-wrap">
            <a href="/<?= htmlspecialchars($area) ?>">
                <img src="/resource/images/color-logo.svg" alt="면력한방병원" class="color">
                <span class="no-body-md"><?= $area_label ?></span>
            </a>
        </div>

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

        $defaultMenuPath = __DIR__ . '/../../json/menu.json';
        $areaMenuPath = __DIR__ . '/../../json/menu.' . $area . '.json';
        $menuPath = file_exists($areaMenuPath) ? $areaMenuPath : $defaultMenuPath;

        $MENU_ITEMS = [];
        if (file_exists($menuPath)) {
            $jsonData = file_get_contents($menuPath);
            $MENU_ITEMS = json_decode($jsonData, true)['pages'] ?? [];
        }

        $gnbItems = array_slice($MENU_ITEMS, 0, 3);
        $gnbDirnames = array_column($gnbItems, 'dirname');
        $activeIndex = array_search($dirname, $gnbDirnames);

        if ($activeIndex === false || !isset($gnbItems[$activeIndex])) {
            $activeIndex = 0;
        }
        ?>

        <nav class="no-header__m-menu">
            <ul class="no-header__m-gnb">
                <?php foreach ($gnbItems as $di => $depth) : ?>
                <?php $depth_active = $di === $activeIndex ? 'active' : ''; ?>
                <li>
                    <a class="no-header__m--gnb no-body-lg fw600 <?= $depth_active ?>" href="#none">
                        <?= $depth['title'] ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>

            <ul class="no-header__m-lnb">
                <?php foreach ($gnbItems as $di => $depth) : ?>
                <?php if (isset($depth['pages']) && is_array($depth['pages']) && count($depth['pages']) > 0) : ?>
                <li class="<?= $di === $activeIndex ? 'active' : '' ?>">
                    <ul class="no-header__m-lnb-list disable">
                        <?php foreach ($depth['pages'] as $page) : ?>
                        <?php
                                    if (isset($page['pages']) && count($page['pages']) > 0) {
                                        $target = $page['pages'][0];
                                        $page_path = '/' . $area . '/pages/' . $depth['dirname'] . '/' . $target['filename'] . '.php';
                                    } else {
                                        $page_path = '/' . $area . '/pages/' . $depth['dirname'] . '/' . $page['filename'] . '.php';
                                    }
                                    ?>
                        <li>
                            <a href="<?= $page_path ?>" class="no-body-lg fw300"><?= $page['title'] ?></a>
                        </li>
                        <?php endforeach; ?>

                        <li>
                            <?php
                                    $home_path = '/' . $area . '/pages/' . $depth['dirname'] . '/home.php';
                                    ?>
                            <a class="no-body-lg fw300" href="<?= $home_path ?>">
                                <?= $depth['title'] ?> 홈으로
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </nav>

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

		$HOSPITAL_MENU_ITEMS = [];
		$AUTH_MENU_ITEMS = [];
		$areaMenuPath = __DIR__ . '/../../json/menu.' . $area . '.json';

		if (file_exists($areaMenuPath)) {
			$jsonData = file_get_contents($areaMenuPath);
			$parsedData = json_decode($jsonData, true);
			$pages = $parsedData['pages'] ?? [];

			foreach ($pages as $section) {
				if ($section['dirname'] === 'hospital') {
					$HOSPITAL_MENU_ITEMS = $section['pages'] ?? [];
				}

				if ($section['dirname'] === 'member') {
					$AUTH_MENU_ITEMS = $section['pages'] ?? [];
				}
			}
		}

		$COMMON_MENU_ITEMS = [];
		$commonMenuPath = __DIR__ . '/../../json/menu.json';

		if (file_exists($commonMenuPath)) {
			$jsonData = file_get_contents($commonMenuPath);
			$parsedData = json_decode($jsonData, true);
			$COMMON_MENU_ITEMS = $parsedData['pages'] ?? [];
		}
		?>

        <div class="no-header__m-common">
            <ul class="no-header__m-lnb-list">
                <?php foreach ($HOSPITAL_MENU_ITEMS as $PAGE) : ?>
                <li>
                    <?php if (isset($PAGE['filename'])) : ?>
                    <a href="/<?= $area ?>/pages/hospital/<?= $PAGE['filename'] ?>.php" class="no-body-lg fw300">
                        <?= $PAGE['title'] ?>
                    </a>
                    <?php elseif (isset($PAGE['board_no'])) : ?>
                    <a href="/pages/board/board.list.php?board_no=<?= $PAGE['board_no'] ?>" class="no-body-lg fw300">
                        <?= $PAGE['title'] ?>
                    </a>
                    <?php endif; ?>
                </li>
                <?php endforeach; ?>

                <?php if (!empty($AUTH_MENU_ITEMS)) :
					$loginPage = $AUTH_MENU_ITEMS[0];
				?>
                <li>
                    <a href="/<?= $area ?>/pages/member/<?= $loginPage['filename'] ?>.php" class="no-body-lg fw300">
                        <?= $loginPage['title'] ?>
                    </a>
                </li>
                <?php endif; ?>

                <?php foreach ($COMMON_MENU_ITEMS as $PAGE) :
					$firstFile = $PAGE['pages'][0]['filename'] ?? 'home';
				?>
                <li>
                    <a href="/pages/<?= $PAGE['dirname'] ?>/<?= $firstFile ?>.php" class="no-body-lg fw300"
                        target="_blank">
                        <?= $PAGE['title'] ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </aside>


    <aside class="no-header__search-wrap">
        <div class="close-wrap no-pd-16--y">
            <img src="/resource/images/icon/h-close.svg" class="h-close">
        </div>

        <h3 class="no-body-xl fw600 --tac no-mg-20--x">궁금하신 내용을 검색해 주세요.</h3>

        <!-- <div class="header-search-box no-mg-32--y">
            <input type="search" name="searchKeyword" placeholder="검색어를 입력해주세요" class="no-body-md">
            <button type="button">
                <i class="fa-regular fa-magnifying-glass"></i>
            </button>
        </div> -->

        <div class="header-search-box no-mg-32--y">
            <form action="/<?= htmlspecialchars($area) ?>/search.php" method="GET">
                <input type="search" name="keyword" placeholder="검색어를 입력해주세요" class="no-body-md">
                <button type="submit">
                    <i class="fa-regular fa-magnifying-glass"></i>
                </button>
            </form>
        </div>


        <div class="search-history no-mg-16--t">
            <div class="top">
                <h3 class="no-body-lg fw600">최근 검색어</h3>

                <a href="#" onclick="return false" class="no-body-xs fw300">전체삭제</a>
            </div>

            <ul class="search-list no-mg-16--t">
                <li>
                    <a href="#" class="no-body-lg fw300">난소</a>
                    <i class="fa-solid fa-xmark"></i>
                </li>

                <li>
                    <a href="#" class="no-body-lg fw300">상담</a>
                    <i class="fa-solid fa-xmark"></i>
                </li>
            </ul>
        </div>
    </aside>

    <div class="no-header__popup-bg"></div>
    <div class="modal-popup-bg"></div>

    <div class="custom_cursor">
        <div class="custom_cursor_inner">
            <div class="custom_cursor_circle">
                <p class="font-en fw700">View</p>
            </div>
        </div>
    </div>