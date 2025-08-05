<?php
include_once "../../../inc/lib/base.class.php";

$pageName = "공진단 · 한약 상담";
$depthnum = 11;
$pagenum = 2;

try {
    $db = DB::getInstance(); 
} catch (Exception $e) {
    echo "DB 연결 오류: " . $e->getMessage();
    exit;
}

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
    exit;
}

// 데이터 조회
$stmt = $db->prepare("SELECT * FROM nb_herb_inquiries WHERE id = :id");
$stmt->execute([':id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    echo "<script>alert('해당 문의를 찾을 수 없습니다.'); history.back();</script>";
    exit;
}


// 지점 목록
$stmt = $db->query("SELECT id, name_kr FROM nb_branches ORDER BY id ASC");
$branches = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include_once "../../inc/admin.head.php"; ?>

<body data-page="inquiry">
    <div class="no-wrap">
        <?php include_once "../../inc/admin.header.php"; ?>
        <main class="no-app no-container">
            <?php include_once "../../inc/admin.drawer.php"; ?>
            <section class="no-content">
                <div class="no-toolbar">
                    <div class="no-toolbar-container no-flex-stack">
                        <div class="no-page-indicator">
                            <h1 class="no-page-title"><?= $pageName ?></h1>
                        </div>
                    </div>
                </div>

                <div class="no-toolbar-container">
                    <div class="no-card">
                        <div class="no-card-header no-card-header--detail">
                            <h2 class="no-card-title"><?= $pageName ?></h2>
                        </div>

                        <div class="no-card-body no-admin-column no-admin-column--detail">


                            <!-- 상담 종류 -->
                            <div class="no-admin-block">
                                <h3 class="no-admin-title">상담 종류</h3>
                                <div class="no-admin-content">
                                    <input type="text" value="<?= $inquiry_types[$data['inquiry_type']] ?? '미선택' ?>"
                                        readonly>
                                </div>
                            </div>
                            <!-- 성명 -->
                            <div class="no-admin-block">
                                <h3 class="no-admin-title">성명</h3>
                                <div class="no-admin-content">
                                    <input type="text" value="<?= htmlspecialchars($data['name']) ?>" readonly>
                                </div>
                            </div>

                            <!-- 생년월일 -->
                            <div class="no-admin-block">
                                <h3 class="no-admin-title">생년월일</h3>
                                <div class="no-admin-content">
                                    <input type="text" value="<?= htmlspecialchars($data['birth']) ?>" readonly>
                                </div>
                            </div>
                            <!-- 성별 -->
                            <div class="no-admin-block">
                                <h3 class="no-admin-title">성별</h3>
                                <div class="no-admin-content">
                                    <div class="no-radio-form no-list">
                                        <?php foreach ($gender_options as $val => $label): ?>
                                        <label>
                                            <div class="no-radio-box">
                                                <input type="radio" name="gender" value="<?= $val ?>" disabled
                                                    <?= ($data['gender'] == $val) ? 'checked' : '' ?>>
                                                <span><i class="bx bx-radio-circle-marked"></i></span>
                                            </div>
                                            <span class="no-radio-text"><?= $label ?></span>
                                        </label>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- 키 / 몸무게 -->
                            <div class="no-admin-block">
                                <h3 class="no-admin-title">키 / 몸무게</h3>
                                <div class="no-admin-content">
                                    <input type="text" value="<?= $data['height'] ?>cm / <?= $data['weight'] ?>kg"
                                        readonly>
                                </div>
                            </div>

                            <!-- 연락처 -->
                            <div class="no-admin-block">
                                <h3 class="no-admin-title">연락처</h3>
                                <div class="no-admin-content">
                                    <input type="text" value="<?= htmlspecialchars($data['phone']) ?>" readonly>
                                </div>
                            </div>

                            <!-- 상담 시간 -->
                            <div class="no-admin-block">
                                <h3 class="no-admin-title">상담 가능 시간</h3>
                                <div class="no-admin-content">
                                    <input type="text"
                                        value="<?= $product_consult_time_options[$data['consult_time']] ?? '미선택' ?>"
                                        readonly>
                                </div>
                            </div>

                            <!-- 첫 방문 여부 -->
                            <div class="no-admin-block">
                                <h3 class="no-admin-title">첫 방문 여부</h3>
                                <div class="no-admin-content">
                                    <div class="no-radio-form no-list">
                                        <?php foreach ($first_visit_options as $val => $label): ?>
                                        <label>
                                            <div class="no-radio-box">
                                                <input type="radio" name="first_visit" value="<?= $val ?>" disabled
                                                    <?= ($data['first_visit'] == $val) ? 'checked' : '' ?>>
                                                <span><i class="bx bx-radio-circle-marked"></i></span>
                                            </div>
                                            <span class="no-radio-text"><?= $label ?></span>
                                        </label>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- 지점 -->
                            <div class="no-admin-block">
                                <h3 class="no-admin-title">지점</h3>
                                <div class="no-admin-content">
                                    <select id="branch_id" disabled>
                                        <option value="">첫방문은 지점이 없습니다</option>
                                        <?php foreach ($branches as $branch): ?>
                                        <option <?= ($data['branch_id'] == $branch['id']) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($branch['name_kr']) ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>


                            <!-- 치료 이력 / 복용 약물 -->
                            <div class="no-admin-block">
                                <h3 class="no-admin-title">치료 이력 / 복용 약물</h3>
                                <div class="no-admin-content">
                                    <textarea readonly rows="3"><?= htmlspecialchars($data['treatment']) ?></textarea>
                                </div>
                            </div>

                            <!-- 현재 증상 -->
                            <div class="no-admin-block">
                                <h3 class="no-admin-title">현재 증상</h3>
                                <div class="no-admin-content">
                                    <textarea readonly rows="3"><?= htmlspecialchars($data['symptoms']) ?></textarea>
                                </div>
                            </div>

                            <!-- 음주 습관 -->
                            <div class="no-admin-block">
                                <h3 class="no-admin-title">음주 습관</h3>
                                <div class="no-admin-content">
                                    <textarea readonly><?= htmlspecialchars($data['drink']) ?></textarea>
                                </div>
                            </div>

                            <!-- 대변/소변 주기 -->
                            <div class="no-admin-block">
                                <h3 class="no-admin-title">배변/배뇨 주기</h3>
                                <div class="no-admin-content">
                                    <input type="text"
                                        value="대변: <?= htmlspecialchars($data['feces_time']) ?> / 소변: <?= htmlspecialchars($data['urine_time']) ?>"
                                        readonly>
                                </div>
                            </div>


                            <!-- 체크박스 항목들 (태그 형식) -->
                            <?php
                            $checkboxFields = [
                                'appetite' => '식욕',
                                'digestion' => '소화',
                                'feces' => '대변',
                                'urine' => '소변',
                                'sleep' => '수면',
                            ];
                            foreach ($checkboxFields as $field => $label): ?>
                            <div class="no-admin-block">
                                <h3 class="no-admin-title"><?= $label ?></h3>
                                <div class="no-admin-content">
                                    <div class="no-tag-list">
                                        <?php
                                            $items = array_filter(array_map('trim', explode(',', $data[$field])));
                                            foreach ($items as $item): ?>
                                        <span class="no-tag"><?= htmlspecialchars($item) ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>

                            <!-- 단일 선택 항목 -->
                            <div class="no-admin-block">
                                <h3 class="no-admin-title">소화불량 주기</h3>
                                <div class="no-admin-content">
                                    <input type="text" value="<?= $indigest_options[$data['indigest']] ?? '미선택' ?>"
                                        readonly>
                                </div>
                            </div>

                            <div class="no-admin-block">
                                <h3 class="no-admin-title">복통 시기</h3>
                                <div class="no-admin-content">
                                    <input type="text" value="<?= $belly_pain_options[$data['belly_pain']] ?? '미선택' ?>"
                                        readonly>
                                </div>
                            </div>

                            <div class="no-admin-block">
                                <h3 class="no-admin-title">속쓰림 이유</h3>
                                <div class="no-admin-content">
                                    <input type="text" value="<?= $reason_options[$data['reason']] ?? '미선택' ?>"
                                        readonly>
                                </div>
                            </div>

                            <!-- 등록일 -->
                            <div class="no-admin-block">
                                <h3 class="no-admin-title">등록일</h3>
                                <div class="no-admin-content">
                                    <input type="text" value="<?= $data['created_at'] ?>" readonly>
                                </div>
                            </div>

                            <!-- 버튼 -->
                            <div class="no-items-center center">
                                <a href="./herb.php" class="no-btn no-btn--big no-btn--normal">목록</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php include_once "../../inc/admin.footer.php"; ?>
    </div>
</body>

</html>