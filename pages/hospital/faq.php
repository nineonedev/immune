<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/SearchFilter.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/Paginator.php';

// ---------------------------
// 필터 파라미터 수집
// ---------------------------
$filters = [
    'branch'   => 'gangseo',
    'category' => $_GET['category'] ?? null,
    'keyword'  => $_GET['q'] ?? null
];

if ($filters['category'] === 'all' || $filters['category'] === '') {
    $filters['category'] = null;
}

// ---------------------------
// 페이징
// ---------------------------
$page    = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$perPage = 5;

// ---------------------------
// 필터 조립 및 WHERE 조건 생성
// ---------------------------
$filter   = new FaqFilter($filters);
$builder  = new SearchQueryBuilder($filter);

$where  = "f.is_active = 1" . $builder->getWhere();
$params = $builder->getParams();

// ---------------------------
// 전체 개수 조회
// ---------------------------
$totalItems = getTotalCount(
    'nb_faqs AS f INNER JOIN nb_branches AS br ON f.branch_id = br.id',
    $where,
    $params
);

// ---------------------------
// 페이징 객체 생성
// ---------------------------
$paginator = new Paginator($totalItems, $page, $perPage);

// ---------------------------
// 데이터 조회
// ---------------------------
$faqs = getFaqs(
    $filters['branch'],
    $filters['category'],
    $filters['keyword'],
    $paginator->getLimit(),
    'array',
    $paginator->getOffset()
);

?>

<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>

<script src="<?= $ROOT ?>/resource/js/sub.js" <?= date('YmdHis') ?> defer></script>

<!-- css, js  -->


<main>
    <section class="no-cetner-visual">
        <div class="no-container-pc">
            <div class="visual-wrap">

                <?php include_once $STATIC_ROOT . '/inc/shared/pc-info.php'; ?>

                <div class="mobile-visual-wrap">
                    <?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>
                    <?php include_once $STATIC_ROOT . '/inc/shared/sub.nav-board.php'; ?>

                    <div class="no-cancer no-neuro no-rehab no-faq">
                        <section class="no-review-top no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac no-mg-24--b">
                                    <h2 class="no-heading-sm">
                                        나와 비슷한 이야기,<br>
                                        회복의 여정을 확인하세요.
                                    </h2>
                                </hgroup>

                                <!-- 검색 -->
                                <form method="get" class="header-search-box no-mg-16--y">
                                    <input type="hidden" name="category"
                                        value="<?= htmlspecialchars($filters['category']) ?>">
                                    <input type="search" name="q" placeholder="검색어를 입력해주세요"
                                        value="<?= htmlspecialchars($filters['keyword']) ?>" class="no-body-md">
                                    <button type="submit">
                                        <i class="fa-regular fa-magnifying-glass" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </section>

                        <section class="no-faq-wrap no-neuro-sub-faq no-pd-48--y">
                            <div class="no-container-sm">

                                <ul class="cartegory-wrap">
                                    <li>
                                        <a href="?category=all&q=<?= urlencode($filters['keyword']) ?>"
                                            class="no-body-lg fw300 <?= ($filters['category'] === 'all' || is_null($filters['category'])) ? 'active' : '' ?>">
                                            전체
                                        </a>
                                    </li>

                                    <?php foreach ($faq_categories as $key => $label): ?>
                                    <li>
                                        <a href="?category=<?= $key ?>&q=<?= urlencode($filters['keyword']) ?>"
                                            class="no-body-lg fw300 <?= ($filters['category'] == $key) ? 'active' : '' ?>">
                                            <?= $label ?>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>

                                <!-- FAQ 리스트 -->
                                <ul class="faq-list no-mg-64--t">
                                    <?php if (count($faqs) > 0): ?>
                                    <?php foreach ($faqs as $faq): ?>
                                    <?php
                                        $categoryName = $faq_categories[$faq['categories']] ?? '카테고리 없음';
                                        $question = htmlspecialchars($faq['question']);
                                        $answer = nl2br(htmlspecialchars($faq['answer']));
                                    ?>
                                    <li>
                                        <div class="top">
                                            <div class="group">
                                                <p class="no-body-lg fw300 no-mg-4--b"><?= $categoryName ?></p>
                                                <h3 class="no-body-xl fw600"><?= $question ?></h3>
                                            </div>
                                            <div class="plus-icon">
                                                <i class="horizon"></i>
                                                <i class="vertical"></i>
                                            </div>
                                        </div>
                                        <div class="answer">
                                            <span class="blue no-body-lg fw600">답변</span>
                                            <p class="no-body-lg fw300 no-mg-4--t"><?= $answer ?></p>
                                        </div>
                                    </li>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                    <li>
                                        <p class="no-body-xl fw300 --tac">검색 결과가 없습니다.</p>
                                    </li>
                                    <?php endif; ?>
                                </ul>

                                <?php include $STATIC_ROOT . '/inc/layouts/pagination.php'; ?>
                            </div>
                        </section>

                        <?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>
                        <?php include_once $STATIC_ROOT . '/inc/layouts/floating-bottom.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>