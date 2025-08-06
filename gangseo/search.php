<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php';

$conn = DB::getInstance();

$searchKeyword = $_GET['keyword'] ?? '';
$results = [];

// 1. 지점 정보 매핑 (id => name)
$branchMap = [];

$stmt = $conn->prepare("SELECT id, name FROM nb_branches");
$stmt->execute();
$branches = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($branches as $branch) {
    $branchMap[$branch['id']] = $branch['name'];
}

// 2. 검색 실행
if (!empty($searchKeyword)) {
    $sql = "
        SELECT * FROM nb_branch_seos 
        WHERE 
            page_title LIKE :keyword OR 
            section_title LIKE :keyword OR 
            topic_title LIKE :keyword OR 
            meta_title LIKE :keyword OR 
            meta_description LIKE :keyword OR 
            meta_keywords LIKE :keyword
    ";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':keyword' => '%' . $searchKeyword . '%']);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
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

                    <div class="no-cancer no-neuro no-rehab no-search">
                        <section class="no-review-top no-mg-48--t no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac no-mg-24--b">
                                    <h2 class="no-heading-sm">통합검색</h2>
                                </hgroup>

                                <div class="search-section">
                                    <?php if (!empty($searchKeyword)): ?>
                                    <?php if (!empty($results)): ?>
                                    <div class="search-success">
                                        <p class="no-body-xl fw700 --tac">
                                            <b class="blue">‘<?= htmlspecialchars($searchKeyword) ?>’</b>에 대한 검색 결과입니다.
                                        </p>
                                    </div>

                                    <div class="search-wrap no-mg-32--t">
                                        <ul class="search-list">
                                            <?php foreach ($results as $row): ?>
                                            <?php
                                                if (empty($row['topic_title'])) continue;

                                                $branchId = $row['branch_id'];
                                                $branchCode = $branchMap[$branchId] ?? 'unknown';
                                                $url = '/' . $branchCode . '/pages/' . $row['path'];
                                            ?>
                                            <li>
                                                <h3 class="no-body-xl fw700"><?= htmlspecialchars($row['page_title']) ?>
                                                </h3>
                                                <ul class="dept2">
                                                    <li>
                                                        <a href="<?= htmlspecialchars($url) ?>">
                                                            <h4 class="no-body-xl fw400">
                                                                <?= htmlspecialchars($row['section_title']) ?></h4>
                                                        </a>
                                                        <p class="no-body-lg fw300">
                                                            <?= htmlspecialchars($row['topic_title']) ?></p>
                                                    </li>
                                                </ul>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>

                                    <?php else: ?>
                                    <div class="no-search-result">
                                        <p class="no-body-xl fw300 --tac">‘<?= htmlspecialchars($searchKeyword) ?>’에 대한
                                            검색 결과가 없습니다.</p>
                                        <div class="search-guide bg no-mg-32--t">
                                            <p class="bullet no-body-lg fw300">단어의 철자가 정확한지 확인해 주세요.</p>
                                            <p class="bullet no-body-lg fw300">검색어의 수를 줄여서 검색해 보세요.</p>
                                            <p class="bullet no-body-lg fw300">일반적인 검색어로 다시 검색해 보세요.</p>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </div>

                                <form method="GET" action="">
                                    <div class="header-search-box no-mg-32--t">
                                        <input type="search" name="keyword" placeholder="검색어를 입력해주세요" class="no-body-md"
                                            value="<?= htmlspecialchars($searchKeyword) ?>" required>
                                        <button type="submit">
                                            <i class="fa-regular fa-magnifying-glass" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </form>

                                <?php if (empty($searchKeyword)): ?>
                                <!-- 검색어 없을 때 더미 데이터 표시 -->
                                <div class="search-wrap no-mg-32--t">
                                    <ul class="search-list">
                                        <li>
                                            <h3 class="no-body-xl fw700">암면역센터 (3건)</h3>
                                            <ul class="dept2">
                                                <li>
                                                    <a href="#">
                                                        <h4 class="no-body-xl fw400">유방/자궁/난소암</h4>
                                                    </a>
                                                    <p class="no-body-lg fw300">수술전후</p>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <h4 class="no-body-xl fw400">폐암</h4>
                                                    </a>
                                                    <p class="no-body-lg fw300">항암방사선</p>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <h4 class="no-body-xl fw400">기타암</h4>
                                                    </a>
                                                    <p class="no-body-lg fw300">항암식이</p>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <h3 class="no-body-xl fw700">신경면역센터 (1건)</h3>
                                            <ul class="dept2">
                                                <li>
                                                    <a href="#">
                                                        <h4 class="no-body-xl fw400">대상포진</h4>
                                                    </a>
                                                    <p class="no-body-lg fw300">면역관리</p>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <?php endif; ?>
                            </div>
                        </section>

                        <?php include_once $STATIC_ROOT . '/inc/layouts/integrate-link.php'; ?>
                    </div>

                    <?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>
                    <?php include_once $STATIC_ROOT . '/inc/layouts/floating-bottom.php'; ?>
                </div>
            </div>
        </div>
    </section>
</main>