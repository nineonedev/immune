<?php
include_once "../../../inc/lib/base.class.php";

$pageName = "페이지별 SEO ";
$depthnum = 10;


try {
    $db = DB::getInstance(); 
    $branches = [];
    $stmt = $db->query("SELECT * FROM nb_branches ORDER BY id ASC");
    $branches = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "데이터베이스 연결 오류: " . $e->getMessage();
    exit;
}


include_once "../../inc/admin.title.php";
include_once "../../inc/admin.css.php";
include_once "../../inc/admin.js.php";
?>

</head>

<body data-page="seo">
    <div class="no-wrap">
        <?php include_once "../../inc/admin.header.php"; ?>

        <main class="no-app no-container">
            <?php include_once "../../inc/admin.drawer.php"; ?>

            <form id="frm" method="post" enctype="multipart/form-data">
                <input type="hidden" name="mode" value="insert">

                <section class="no-content">
                    <div class="no-toolbar">
                        <div class="no-toolbar-container no-flex-stack">
                            <div class="no-page-indicator">
                                <h1 class="no-page-title"><?= $pageName ?> 등록</h1>
                                <div class="no-breadcrumb-container">
                                    <ul class="no-breadcrumb-list">
                                        <li class="no-breadcrumb-item"><span><?= $pageName ?></span></li>
                                        <li class="no-breadcrumb-item"><span><?= $pageName ?> 등록</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="no-toolbar-container">
                        <div class="no-card">
                            <div class="no-card-header no-card-header--detail">
                                <h2 class="no-card-title"><?=$pageName?> 등록</h2>
                            </div>

                            <div class="no-card-body no-admin-column no-admin-column--detail">

                                <!-- 지점 선택 -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title"><label for="branch_id">지점</label></h3>
                                    <div class="no-admin-content">
                                        <select name="branch_id" id="branch_id" required>
                                            <option value="">지점 선택</option>
                                            <?php foreach ($branches as $branch): ?>
                                            <option value="<?= $branch['id'] ?>"
                                                data-json="/json/<?= htmlspecialchars($branch['json_path']) ?>"
                                                <?= isset($branch_id) && $branch_id == $branch['id'] ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($branch['name_kr']) ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span class="no-admin-info">
                                            <i class="bx bxs-info-circle"></i> SEO를 등록할 지점을 선택하세요
                                        </span>
                                    </div>
                                </div>

                                <!-- 경로 입력 -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title"><label for="path">경로</label></h3>
                                    <div class="no-admin-content">
                                        <select name="path" id="path" required>
                                            <option value="">페이지 경로 선택</option>
                                            <!-- JS로 동적으로 option 추가 -->
                                        </select>
                                        <div class="no-admin-desc" style="margin-top: 5px; color: #888;">
                                            실제 페이지 경로를 입력하세요 (지점 폴더 하위 기준).
                                        </div>
                                    </div>
                                </div>

                                <!-- 페이지 제목 -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title"><label for="page_title">페이지 제목</label></h3>
                                    <div class="no-admin-content">
                                        <input type="text" id="page_title" name="page_title" placeholder="예: 여성암 검사 페이지"
                                            required>
                                    </div>
                                </div>

                                <!-- 중간 카테고리 제목 (section_title) -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="section_title">중간 카테고리 제목</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input type="text" id="section_title" name="section_title"
                                            placeholder="예: 유방/자궁/난소암">
                                    </div>
                                </div>

                                <!-- 세부 주제 제목 (topic_title) -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="topic_title">세부 주제 제목</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input type="text" id="topic_title" name="topic_title" placeholder="예: 수술전후">
                                    </div>
                                </div>


                                <!-- Meta Title -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title"><label for="meta_title">Meta Title</label></h3>
                                    <div class="no-admin-content">
                                        <input type="text" id="meta_title" name="meta_title" placeholder="검색결과 제목">
                                    </div>
                                </div>

                                <!-- Meta Description -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title"><label for="meta_description">Meta Description</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <textarea name="meta_description" id="meta_description"
                                            class="no-textarea--detail" rows="4" placeholder="검색결과 요약 설명 입력"></textarea>
                                    </div>
                                </div>

                                <!-- Meta Keywords -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title"><label for="meta_keywords">Meta Keywords</label></h3>
                                    <div class="no-admin-content">
                                        <input type="text" id="meta_keywords" name="meta_keywords"
                                            placeholder="예: 여성암, 자궁경부암, 건강검진">
                                        <div class="no-admin-desc" style="margin-top: 5px; color: #888;">
                                            쉼표(,)로 구분하여 입력하세요.
                                        </div>
                                    </div>
                                </div>

                                <!-- 버튼 -->
                                <div class="no-items-center center">
                                    <a href="./seo.php" class="no-btn no-btn--big no-btn--normal">목록</a>
                                    <button type="submit" class="no-btn no-btn--big no-btn--main"
                                        id="submitBtn">저장</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </form>

        </main>
        <?php include_once "../../inc/admin.footer.php"; ?>
    </div>


</body>

</html>