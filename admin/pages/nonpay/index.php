<?php
include_once "../../../inc/lib/base.class.php";

$pageName = "비급여 항목";
$depthnum = 6;

// 페이지네이션 필수 변수
$Page = $Page ?? 1;
$listCurPage = $listCurPage ?? 1;
$pageBlock = $pageBlock ?? 2;

$db = DB::getInstance();

$category_primary = $_GET['category_primary'] ?? '';
$category_secondary = $_GET['category_secondary'] ?? '';
$searchKeyword = $_GET['searchKeyword'] ?? '';

$where = "WHERE 1=1";
$params = [];

if (!empty($category_primary)) {
    $where .= " AND f.category_primary = :category_primary";
    $params[':category_primary'] = $category_primary;
}

if (!empty($category_secondary)) {
    $where .= " AND f.category_secondary = :category_secondary";
    $params[':category_secondary'] = $category_secondary;
}

if (!empty($searchKeyword)) {
    $where .= " AND f.title LIKE :searchKeyword";
    $params[':searchKeyword'] = "%{$searchKeyword}%";
}

$sql = "
    SELECT f.*
    FROM nb_nonpay_items f
    {$where}
    ORDER BY f.id DESC
";
$stmt = $db->prepare($sql);
$stmt->execute($params);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!--=====================HEAD========================= -->
<?php include_once "../../inc/admin.head.php"; ?>

<body data-page="nonpay">
    <div class="no-wrap">

        <!--=====================HEADER========================= -->
        <?php include_once "../../inc/admin.header.php"; ?>

        <main class="no-app no-container">

            <!--=====================DRAWER========================= -->
            <?php include_once "../../inc/admin.drawer.php"; ?>

            <form method="GET" name="frm" id="frm" autocomplete="off">
                <input type="hidden" name="mode" id="mode" value="list">

                <section class="no-content">
                    <div class="no-toolbar">
                        <div class="no-toolbar-container no-flex-stack">
                            <div class="no-page-indicator">
                                <h1 class="no-page-title"><?=$pageName?> 관리</h1>
                                <div class="no-breadcrumb-container">
                                    <ul class="no-breadcrumb-list">
                                        <li class="no-breadcrumb-item"><span>환경설정</span></li>
                                        <li class="no-breadcrumb-item"><span><?=$pageName?> 관리</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="no-items-center">
                                <a href="./new.php" class="no-btn no-btn--main no-btn--big"> <?=$pageName?> 생성 </a>
                            </div>
                        </div>
                    </div>

                    <!-- 검색 조건 -->
                    <div class="no-search no-toolbar-container">
                        <div class="no-card">
                            <div class="no-card-header">
                                <h2 class="no-card-title"><?= $pageName ?> 검색</h2>
                            </div>
                            <div class="no-card-body no-admin-column">

                                <!-- 카테고리 선택 -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">대카테고리</h3>
                                    <div class="no-admin-content">
                                        <!-- 1차 카테고리 -->
                                        <select name="category_primary" id="category_primary">
                                            <option value="">전체</option>
                                            <?php foreach ($nonpay_primary_categories as $key => $label): ?>
                                            <option value="<?= $key ?>"
                                                <?= $category_primary == $key ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($label) ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- 카테고리 선택 -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">중카테고리</h3>
                                    <div class="no-admin-content">
                                        <select name="category_secondary" id="category_secondary">
                                            <option value="">전체</option>
                                            <?php 
                                                $secondaries = $nonpay_secondary_categories[$category_primary] ?? [];
                                                foreach ($secondaries as $subKey => $subLabel): ?>
                                            <option value="<?= $subKey ?>"
                                                <?= $category_secondary == $subKey ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($subLabel) ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- 검색어 -->
                                <div class="no-admin-block wide">
                                    <h3 class="no-admin-title">검색어</h3>
                                    <div class="no-search-select">
                                        <select name="searchColumn" id="searchColumn">
                                            <option value="">선택</option>
                                            <option value="question"
                                                <?= ($searchColumn ?? '') === 'question' ? 'selected' : '' ?>>질문
                                            </option>
                                            <option value="answer"
                                                <?= ($searchColumn ?? '') === 'answer' ? 'selected' : '' ?>>답변</option>
                                        </select>
                                        <div class="no-search-wrap no-ml">
                                            <div class="no-search-input">
                                                <i class="bx bx-search-alt-2"></i>
                                                <input type="text" name="searchKeyword" id="searchKeyword"
                                                    placeholder="검색어 입력"
                                                    value="<?= htmlspecialchars($searchKeyword ?? '') ?>">
                                            </div>
                                            <div class="no-search-btn">
                                                <button type="submit" class="no-btn no-btn--main no-btn--search">
                                                    검색
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="no-content-container">
                        <div class="no-card">
                            <div class="no-card-header">
                                <h2 class="no-card-title"><?=$pageName?> 리스트</h2>
                            </div>

                            <div class="no-card-body">
                                <div class="no-table-option">
                                    <ul class="no-table-check-control">
                                        <li><a href="javascript:void(0);" class="no-btn no-btn--sm no-btn--check active"
                                                onClick="doCheckUnCheck('no-chk', 'check');">전체선택</a></li>
                                        <li><a href="javascript:void(0);" class="no-btn no-btn--sm no-btn--check"
                                                onClick="doCheckUnCheck('no-chk', 'uncheck');">선택해제</a></li>
                                        <li><a href="javascript:void(0);" class="no-btn no-btn--sm no-btn--check"
                                                onClick="doDeleteArray();">선택삭제</a></li>
                                    </ul>
                                </div>

                                <div class="no-table-responsive">
                                    <table class="no-table">
                                        <thead>
                                            <tr>
                                                <th class="no-width-25 no-check">
                                                    <div class="no-checkbox-form">
                                                        <label>
                                                            <input type="checkbox"
                                                                onClick="doCheckUnCheck('no-chk', this.checked ? 'check' : 'uncheck')" />
                                                            <span><i class="bx bxs-check-square"></i></span>
                                                        </label>
                                                    </div>
                                                </th>
                                                <th>번호</th>
                                                <th>1차 카테고리</th>
                                                <th>2차 카테고리</th>
                                                <th>항목명</th>
                                                <th>비용</th>
                                                <th>노출</th>
                                                <th>정렬</th>
                                                <th>수정일</th>
                                                <th>관리</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (count($rows) > 0): ?>
                                            <?php foreach ($rows as $row): ?>
                                            <tr>
                                                <td>
                                                    <div class="no-checkbox-form">
                                                        <label>
                                                            <input type="checkbox" class="no-chk"
                                                                value="<?= $row['id'] ?>">
                                                            <span><i class="bx bxs-check-square"></i></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><?= $row['id'] ?></td>
                                                <td><?= $nonpay_primary_categories[$row['category_primary']] ?? '-' ?>
                                                </td>
                                                <td><?= $nonpay_secondary_categories[$row['category_primary']][$row['category_secondary']] ?? '-' ?>
                                                </td>
                                                <td><?= htmlspecialchars($row['title']) ?></td>
                                                <td><?= number_format($row['cost']) ?> 원</td>
                                                <td><?= $row['is_active'] ? '노출' : '숨김' ?></td>
                                                <td><?= $row['sort_no'] ?></td>
                                                <td><?= substr($row['updated_at'], 0, 10) ?></td>
                                                <td>
                                                    <div class="no-table-role">
                                                        <span class="no-role-btn"><i
                                                                class="bx bx-dots-vertical-rounded"></i></span>
                                                        <div class="no-table-action">
                                                            <a href="edit.php?id=<?= $row['id'] ?>"
                                                                class="no-btn no-btn--sm no-btn--normal">수정</a>
                                                            <button type="button"
                                                                class="no-btn no-btn--sm no-btn--delete-outline delete-btn"
                                                                data-id="<?= $row['id'] ?>">삭제</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <?php else: ?>
                                            <tr>
                                                <td colspan="10" style="text-align: center; color: #888;">
                                                    비급여 항목이 등록되지 않았습니다.
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                    <?php include_once "../../lib/admin.pagination.php"; ?>
                </section>
            </form>
        </main>
    </div>

    <?php include_once "../../inc/admin.footer.php"; ?>