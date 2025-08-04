<?php
include_once "../../../inc/lib/base.class.php";

$pageName = "의료진";
$depthnum = 5;

$Page = $Page ?? 1;
$listCurPage = $listCurPage ?? 1;
$pageBlock = $pageBlock ?? 2;

$db = DB::getInstance();

$branchesStmt = $db->prepare("SELECT id, name_kr FROM nb_branches ORDER BY id ASC");
$branchesStmt->execute();
$branches = $branchesStmt->fetchAll(PDO::FETCH_ASSOC); 

// GET 파라미터
$branch_id = $_GET['branch_id'] ?? '';
$department = $_GET['department'] ?? '';
$active_filter = $_GET['is_active'] ?? '';  
$searchColumn = $_GET['searchColumn'] ?? '';
$searchKeyword = $_GET['searchKeyword'] ?? '';

// WHERE 조건 구성
$where = "WHERE 1=1";
$params = [];

if (!empty($branch_id)) {
    $where .= " AND d.branch_id = :branch_id";
    $params[':branch_id'] = $branch_id;
}

if (!empty($department)) {
    $where .= " AND d.department = :department";
    $params[':department'] = $department;
}

if ($active_filter !== '') {
    $where .= " AND d.is_active = :is_active";
    $params[':is_active'] = (int)$active_filter;
}

if (!empty($searchColumn) && !empty($searchKeyword)) {
    $allowedColumns = ['title', 'position'];
    if (in_array($searchColumn, $allowedColumns)) {
        $where .= " AND d.{$searchColumn} LIKE :searchKeyword";
        $params[':searchKeyword'] = "%{$searchKeyword}%";
    }
}

// SQL 실행
$sql = "
    SELECT d.*, b.name_kr AS branch_name
    FROM nb_doctors d
    LEFT JOIN nb_branches b ON d.branch_id = b.id
    $where
    ORDER BY d.id DESC
";

$stmt = $db->prepare($sql);
$stmt->execute($params);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<?php include_once "../../inc/admin.head.php"; ?>

<body data-page="doctor">
    <div class="no-wrap">
        <?php include_once "../../inc/admin.header.php"; ?>
        <main class="no-app no-container">
            <?php include_once "../../inc/admin.drawer.php"; ?>

            <form method="GET" name="frm" id="frm" autocomplete="off">
                <input type="hidden" name="mode" id="mode" value="list">

                <section class="no-content">
                    <div class="no-toolbar">
                        <div class="no-toolbar-container no-flex-stack">
                            <div class="no-page-indicator">
                                <h1 class="no-page-title"><?= $pageName ?> 관리</h1>
                                <div class="no-breadcrumb-container">
                                    <ul class="no-breadcrumb-list">
                                        <li class="no-breadcrumb-item"><span>환경설정</span></li>
                                        <li class="no-breadcrumb-item"><span><?= $pageName ?> 관리</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="no-items-center">
                                <a href="./new.php" class="no-btn no-btn--main no-btn--big"> <?= $pageName ?> 생성 </a>
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

                                <!-- 부서명 선택 -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">부서명</h3>
                                    <div class="no-admin-content">
                                        <select name="department" id="department">
                                            <option value="">전체</option>
                                            <?php foreach ($departments as $code => $label): ?>
                                            <option value="<?= $code ?>"
                                                <?= ($department ?? '') == $code ? 'selected' : '' ?>>
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
                                            <?php foreach ($is_active as $key => $label): ?>
                                            <option value="<?= $key ?>"
                                                <?= ($active_filter == $key) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($label) ?>
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
                                            <option value="title"
                                                <?= ($searchColumn ?? '') === 'title' ? 'selected' : '' ?>>이름</option>
                                            <option value="position"
                                                <?= ($searchColumn ?? '') === 'position' ? 'selected' : '' ?>>직책
                                            </option>
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


                    <!-- 리스트 -->
                    <div class="no-content-container">
                        <div class="no-card">
                            <div class="no-card-header">
                                <h2 class="no-card-title"><?= $pageName ?> 리스트</h2>
                            </div>

                            <div class="no-card-body">
                                <div class="no-table-option">
                                    <ul class="no-table-check-control">
                                        <ul class="no-table-check-control">
                                            <li><a href="#" class="no-btn no-btn--sm" data-action="selectAll">전체선택</a>
                                            </li>
                                            <li><a href="#" class="no-btn no-btn--sm" data-action="deselectAll">선택해제</a>
                                            </li>
                                            <li><a href="#" class="no-btn no-btn--sm"
                                                    data-action="deleteSelected">선택삭제</a></li>
                                        </ul>
                                    </ul>
                                </div>

                                <div class="no-table-responsive">

                                    <table class="no-table">
                                        <thead>
                                            <tr>
                                                <th class="no-width-25 no-check">
                                                    <div class="no-checkbox-form">
                                                        <label>
                                                            <input type="checkbox" id="selectAllCheckbox" />
                                                            <span><i class="bx bxs-check-square"></i></span>
                                                        </label>
                                                    </div>
                                                </th>
                                                <th>번호</th>
                                                <th>지점</th>
                                                <th>이름</th>
                                                <th>썸네일</th>
                                                <th>내부 이미지</th>
                                                <th>직급</th>
                                                <th>부서</th>
                                                <th>노출</th>
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
                                                <td><?= htmlspecialchars($row['branch_name'] ?? '-') ?></td>
                                                <td><?= htmlspecialchars($row['title']) ?></td>
                                                <!-- 썸네일 이미지 -->
                                                <td>
                                                    <?php if (!empty($row['thumb_image'])): ?>
                                                    <img src="/uploads/doctors/<?= $row['thumb_image'] ?>" alt="썸네일"
                                                        style="max-width: 60px;">
                                                    <?php else: ?>
                                                    <span style="color: #aaa;">-</span>
                                                    <?php endif; ?>
                                                </td>

                                                <!-- 내부 이미지 -->
                                                <td>
                                                    <?php if (!empty($row['detail_image'])): ?>
                                                    <img src="/uploads/doctors/<?= $row['detail_image'] ?>" alt="내부 이미지"
                                                        style="max-width: 60px;">
                                                    <?php else: ?>
                                                    <span style="color: #aaa;">-</span>
                                                    <?php endif; ?>
                                                </td>

                                                <td><?= htmlspecialchars($row['position']) ?></td>
                                                <td><?= htmlspecialchars($departments[$row['department']] ?? '-') ?>
                                                </td>



                                                <!-- 노출 여부 -->
                                                <td><?= htmlspecialchars($is_active[$row['is_active']] ?? '미정') ?></td>

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
                                                <td colspan="10" style="text-align: center; color: #888;">등록된 의료진이 없습니다.
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