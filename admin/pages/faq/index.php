<?php
include_once "../../../inc/lib/base.class.php";

$pageName = "FAQ";
$depthnum = 7;

// 페이지네이션 필수 변수
$Page = $Page ?? 1;
$listCurPage = $listCurPage ?? 1;
$pageBlock = $pageBlock ?? 2;

$db = DB::getInstance();

// 지점 데이터
$branchesStmt = $db->prepare("SELECT id, name_kr FROM nb_branches ORDER BY id ASC");
$branchesStmt->execute();
$branches = $branchesStmt->fetchAll(PDO::FETCH_ASSOC); 


// WHERE ========================================================

$branch_id = $_GET['branch_id'] ?? '';
$is_active = $_GET['is_active'] ?? '';
$categories = $_GET['categories'] ?? '';
$searchColumn = $_GET['searchColumn'] ?? '';
$searchKeyword = $_GET['searchKeyword'] ?? '';


$where = "WHERE 1=1";
$params = [];

if (!empty($branch_id)) {
    $where .= " AND f.branch_id = :branch_id";
    $params[':branch_id'] = $branch_id;
}

if ($is_active !== '') {
    $where .= " AND f.is_active = :is_active";
    $params[':is_active'] = $is_active;
}

if (!empty($categories)) {
    $where .= " AND f.categories = :categories";
    $params[':categories'] = (int)$categories;
}

if (!empty($searchColumn) && !empty($searchKeyword)) {
    $allowedColumns = ['question', 'answer'];
    if (in_array($searchColumn, $allowedColumns)) {
        $where .= " AND f.{$searchColumn} LIKE :searchKeyword";
        $params[':searchKeyword'] = "%{$searchKeyword}%";
    }
}


// WHERE ========================================================

// FAQ 데이터 조회
$sql = "
    SELECT f.id, f.branch_id, f.categories, f.question, f.sort_no, f.is_active, f.updated_at,
           b.name_kr AS branch_label
    FROM nb_faqs f
    LEFT JOIN nb_branches b ON f.branch_id = b.id
    {$where}
    ORDER BY f.id DESC
";
$stmt = $db->prepare($sql);
$stmt->execute($params); 
$faqRows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!--=====================HEAD========================= -->
<?php include_once "../../inc/admin.head.php"; ?>

<body data-page="faq">
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

                                <!-- 지점 선택 -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">지점</h3>
                                    <div class="no-admin-content">
                                        <select name="branch_id" id="branch_id">
                                            <option value="">전체</option>
                                            <?php foreach ($branches as $b): ?>
                                            <option value="<?= $b['id'] ?>"
                                                <?= ($branch_id ?? '') == $b['id'] ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($b['name_kr']) ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- 카테고리 선택 -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">카테고리</h3>
                                    <div class="no-admin-content">
                                        <select name="categories" id="categories">
                                            <option value="">전체</option>
                                            <?php foreach ($faq_categories as $code => $label): ?>
                                            <option value="<?= $code ?>"
                                                <?= ($categories ?? '') == $code ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($label) ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- 노출 여부 -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">노출 여부</h3>
                                    <div class="no-admin-content">
                                        <select name="is_active" id="is_active">
                                            <option value="">전체</option>
                                            <option value="Y" <?= ($is_active ?? '') === 'Y' ? 'selected' : '' ?>>노출
                                            </option>
                                            <option value="N" <?= ($is_active ?? '') === 'N' ? 'selected' : '' ?>>숨김
                                            </option>
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
                                                <th>지점</th>
                                                <th>카테고리</th>
                                                <th>질문</th>
                                                <th>노출</th>
                                                <th>정렬</th>
                                                <th>수정일</th>
                                                <th>관리</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (count($faqRows) > 0): ?>
                                            <?php foreach ($faqRows as $row): ?>
                                            <tr>
                                                <td><?= $row['id'] ?></td>
                                                <td><?= $row['id'] ?></td>
                                                <td><?= htmlspecialchars($row['branch_label']) ?></td>
                                                <td><?= $faq_categories[$row['categories']] ?? '기타' ?></td>
                                                <td><?= htmlspecialchars($row['question']) ?></td>
                                                <td><?= $row['is_active'] === 'Y' ? '노출' : '숨김' ?></td>
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
                                                                data-id="<?= $row['id'] ?>">
                                                                삭제
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <?php else: ?>
                                            <tr>
                                                <td colspan="8" style="text-align: center; color: #888;">FAQ가 등록되지
                                                    않았습니다.</td>
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