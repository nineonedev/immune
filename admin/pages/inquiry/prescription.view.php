<?php
include_once "../../../inc/lib/base.class.php";

$pageName = "개인맞춤한약 예진표";
$depthnum = 11;
$pagenum = 3; 

$page = (int)($_GET['page'] ?? $_POST['page'] ?? 1);

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
$stmt = $db->prepare("SELECT * FROM nb_custom_inquires WHERE id = :id");
$stmt->execute([':id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);



if (!$data) {
    echo "<script>alert('해당 문의를 찾을 수 없습니다.'); history.back();</script>";
    exit;
}


?>

<?php include_once "../../inc/admin.head.php"; ?>

<body data-page="inquiry">
    <div class="no-wrap">
        <?php include_once "../../inc/admin.header.php"; ?>
        <main class="no-app no-container">
            <?php include_once "../../inc/admin.drawer.php"; ?>
            <form id="frm" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= (int)($seo['id'] ?? 0) ?>">
                <input type="hidden" name="page" value="<?= $_GET['page'] ?? 1 ?>">
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

                                <!-- text fields -->
                                <?php if (!empty($data['name'])): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">성명</h3>
                                    <div class="no-admin-content">
                                        <input type="text" value="<?= htmlspecialchars($data['name']) ?>" readonly>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($data['birth'])): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">생년월일</h3>
                                    <div class="no-admin-content">
                                        <input type="text" value="<?= htmlspecialchars($data['birth']) ?>" readonly>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($data['job'])): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">직업</h3>
                                    <div class="no-admin-content">
                                        <input type="text" value="<?= htmlspecialchars($data['job']) ?>" readonly>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($data['phone'])): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">연락처</h3>
                                    <div class="no-admin-content">
                                        <input type="text" value="<?= htmlspecialchars($data['phone']) ?>" readonly>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($data['height'])): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">키</h3>
                                    <div class="no-admin-content">
                                        <input type="text" value="<?= htmlspecialchars($data['height']) ?>" readonly>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($data['weight'])): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">몸무게</h3>
                                    <div class="no-admin-content">
                                        <input type="text" value="<?= htmlspecialchars($data['weight']) ?>" readonly>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($data['feces_time'])): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">대변 주기</h3>
                                    <div class="no-admin-content">
                                        <input type="text" value="<?= htmlspecialchars($data['feces_time']) ?>"
                                            readonly>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($data['urine_time'])): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">소변 주기</h3>
                                    <div class="no-admin-content">
                                        <input type="text" value="<?= htmlspecialchars($data['urine_time']) ?>"
                                            readonly>
                                    </div>
                                </div>
                                <?php endif; ?>


                                <!-- textarea fields -->
                                <?php if (!empty($data['treatment'])): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">치료 이력 / 복용 약물</h3>
                                    <div class="no-admin-content">
                                        <textarea readonly
                                            rows="3"><?= htmlspecialchars($data['treatment']) ?></textarea>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($data['symptoms'])): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">현재 증상</h3>
                                    <div class="no-admin-content">
                                        <textarea readonly
                                            rows="3"><?= htmlspecialchars($data['symptoms']) ?></textarea>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($data['drink'])): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">음주 습관</h3>
                                    <div class="no-admin-content">
                                        <textarea readonly rows="3"><?= htmlspecialchars($data['drink']) ?></textarea>
                                    </div>
                                </div>
                                <?php endif; ?>


                                <!-- option fields -->
                                <?php if (!empty($data['gender'])): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">성별</h3>
                                    <div class="no-admin-content">
                                        <input type="text" value="<?= $gender_options[$data['gender']] ?? '미선택' ?>"
                                            readonly>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($data['consult_time'])): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">상담 가능 시간</h3>
                                    <div class="no-admin-content">
                                        <input type="text"
                                            value="<?= $product_consult_time_options[$data['consult_time']] ?? '미선택' ?>"
                                            readonly>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($data['first_visit']) || $data['first_visit'] === 0): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">첫 방문 여부</h3>
                                    <div class="no-admin-content">
                                        <input type="text"
                                            value="<?= $first_visit_options[$data['first_visit']] ?? '미선택' ?>" readonly>
                                    </div>
                                </div>
                                <?php endif; ?>


                                <?php if (!empty($data['indigest'])): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">소화불량 주기</h3>
                                    <div class="no-admin-content">
                                        <div class="no-radio-form no-list">
                                            <?php foreach ($indigest_options as $key => $label): ?>
                                            <label>
                                                <div class="no-radio-box">
                                                    <input type="radio" name="indigest" value="<?= $key ?>" disabled
                                                        <?= $data['indigest'] == $key ? 'checked' : '' ?>>
                                                    <span><i class="bx bx-radio-circle-marked"></i></span>
                                                </div>
                                                <span class="no-radio-text"><?= htmlspecialchars($label) ?></span>
                                            </label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($data['belly_pain'])): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">복통 시기</h3>
                                    <div class="no-admin-content">
                                        <div class="no-radio-form no-list">
                                            <?php foreach ($belly_pain_options as $key => $label): ?>
                                            <label>
                                                <div class="no-radio-box">
                                                    <input type="radio" name="belly_pain" value="<?= $key ?>" disabled
                                                        <?= $data['belly_pain'] == $key ? 'checked' : '' ?>>
                                                    <span><i class="bx bx-radio-circle-marked"></i></span>
                                                </div>
                                                <span class="no-radio-text"><?= htmlspecialchars($label) ?></span>
                                            </label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($data['reason'])): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">속쓰림 이유</h3>
                                    <div class="no-admin-content">
                                        <div class="no-radio-form no-list">
                                            <?php foreach ($reason_options as $key => $label): ?>
                                            <label>
                                                <div class="no-radio-box">
                                                    <input type="radio" name="reason" value="<?= $key ?>" disabled
                                                        <?= $data['reason'] == $key ? 'checked' : '' ?>>
                                                    <span><i class="bx bx-radio-circle-marked"></i></span>
                                                </div>
                                                <span class="no-radio-text"><?= htmlspecialchars($label) ?></span>
                                            </label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($data['drink_amount'])): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">1일 음수량</h3>
                                    <div class="no-admin-content">
                                        <div class="no-radio-form no-list">
                                            <?php foreach ($drink_amount_options as $key => $label): ?>
                                            <label>
                                                <div class="no-radio-box">
                                                    <input type="radio" name="drink_amount" value="<?= $key ?>" disabled
                                                        <?= $data['drink_amount'] == $key ? 'checked' : '' ?>>
                                                    <span><i class="bx bx-radio-circle-marked"></i></span>
                                                </div>
                                                <span class="no-radio-text"><?= htmlspecialchars($label) ?></span>
                                            </label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>


                                <?php if (!empty($data['hand_temp'])): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">손의 온도</h3>
                                    <div class="no-admin-content">
                                        <div class="no-radio-form no-list">
                                            <?php foreach ($hand_temp_options as $key => $label): ?>
                                            <label>
                                                <div class="no-radio-box">
                                                    <input type="radio" name="hand_temp" value="<?= $key ?>" disabled
                                                        <?= $data['hand_temp'] == $key ? 'checked' : '' ?>>
                                                    <span><i class="bx bx-radio-circle-marked"></i></span>
                                                </div>
                                                <span class="no-radio-text"><?= htmlspecialchars($label) ?></span>
                                            </label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($data['foot_temp'])): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">발의 온도</h3>
                                    <div class="no-admin-content">
                                        <div class="no-radio-form no-list">
                                            <?php foreach ($foot_temp_options as $key => $label): ?>
                                            <label>
                                                <div class="no-radio-box">
                                                    <input type="radio" name="foot_temp" value="<?= $key ?>" disabled
                                                        <?= $data['foot_temp'] == $key ? 'checked' : '' ?>>
                                                    <span><i class="bx bx-radio-circle-marked"></i></span>
                                                </div>
                                                <span class="no-radio-text"><?= htmlspecialchars($label) ?></span>
                                            </label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($data['swelling_area'])): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">잘 붓는 부위</h3>
                                    <div class="no-admin-content">
                                        <div class="no-radio-form no-list">
                                            <?php foreach ($swelling_area_options as $key => $label): ?>
                                            <label>
                                                <div class="no-radio-box">
                                                    <input type="radio" name="swelling_area" value="<?= $key ?>"
                                                        disabled <?= $data['swelling_area'] == $key ? 'checked' : '' ?>>
                                                    <span><i class="bx bx-radio-circle-marked"></i></span>
                                                </div>
                                                <span class="no-radio-text"><?= htmlspecialchars($label) ?></span>
                                            </label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($data['swelling_time'])): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">붓기 심한 시간</h3>
                                    <div class="no-admin-content">
                                        <div class="no-radio-form no-list">
                                            <?php foreach ($swelling_time_options as $key => $label): ?>
                                            <label>
                                                <div class="no-radio-box">
                                                    <input type="radio" name="swelling_time" value="<?= $key ?>"
                                                        disabled <?= $data['swelling_time'] == $key ? 'checked' : '' ?>>
                                                    <span><i class="bx bx-radio-circle-marked"></i></span>
                                                </div>
                                                <span class="no-radio-text"><?= htmlspecialchars($label) ?></span>
                                            </label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($data['birth_exp'])): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">출산 경험</h3>
                                    <div class="no-admin-content">
                                        <div class="no-radio-form no-list">
                                            <?php foreach ($birth_exp_options as $key => $label): ?>
                                            <label>
                                                <div class="no-radio-box">
                                                    <input type="radio" name="birth_exp" value="<?= $key ?>" disabled
                                                        <?= $data['birth_exp'] == $key ? 'checked' : '' ?>>
                                                    <span><i class="bx bx-radio-circle-marked"></i></span>
                                                </div>
                                                <span class="no-radio-text"><?= htmlspecialchars($label) ?></span>
                                            </label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($data['miscarriage_exp'])): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">유산 경험</h3>
                                    <div class="no-admin-content">
                                        <div class="no-radio-form no-list">
                                            <?php foreach ($miscarriage_exp_options as $key => $label): ?>
                                            <label>
                                                <div class="no-radio-box">
                                                    <input type="radio" name="miscarriage_exp" value="<?= $key ?>"
                                                        disabled
                                                        <?= $data['miscarriage_exp'] == $key ? 'checked' : '' ?>>
                                                    <span><i class="bx bx-radio-circle-marked"></i></span>
                                                </div>
                                                <span class="no-radio-text"><?= htmlspecialchars($label) ?></span>
                                            </label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($data['menstrual_status'])): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">생리 주기 상태</h3>
                                    <div class="no-admin-content">
                                        <div class="no-radio-form no-list">
                                            <?php foreach ($menstrual_status_options as $key => $label): ?>
                                            <label>
                                                <div class="no-radio-box">
                                                    <input type="radio" name="menstrual_status" value="<?= $key ?>"
                                                        disabled
                                                        <?= $data['menstrual_status'] == $key ? 'checked' : '' ?>>
                                                    <span><i class="bx bx-radio-circle-marked"></i></span>
                                                </div>
                                                <span class="no-radio-text"><?= htmlspecialchars($label) ?></span>
                                            </label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>


                                <?php if (!empty(trim($data['appetite'] ?? ''))): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">식욕</h3>
                                    <div class="no-admin-content">
                                        <div class="no-tag-list">
                                            <?php foreach (array_filter(array_map('trim', explode(',', $data['appetite']))) as $item): ?>
                                            <span class="no-tag"><?= htmlspecialchars($item) ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty(trim($data['digestion'] ?? ''))): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">소화</h3>
                                    <div class="no-admin-content">
                                        <div class="no-tag-list">
                                            <?php foreach (array_filter(array_map('trim', explode(',', $data['digestion']))) as $item): ?>
                                            <span class="no-tag"><?= htmlspecialchars($item) ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty(trim($data['feces'] ?? ''))): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">대변</h3>
                                    <div class="no-admin-content">
                                        <div class="no-tag-list">
                                            <?php foreach (array_filter(array_map('trim', explode(',', $data['feces']))) as $item): ?>
                                            <span class="no-tag"><?= htmlspecialchars($item) ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty(trim($data['urine'] ?? ''))): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">소변</h3>
                                    <div class="no-admin-content">
                                        <div class="no-tag-list">
                                            <?php foreach (array_filter(array_map('trim', explode(',', $data['urine']))) as $item): ?>
                                            <span class="no-tag"><?= htmlspecialchars($item) ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty(trim($data['sleep'] ?? ''))): ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">수면</h3>
                                    <div class="no-admin-content">
                                        <div class="no-tag-list">
                                            <?php foreach (array_filter(array_map('trim', explode(',', $data['sleep']))) as $item): ?>
                                            <span class="no-tag"><?= htmlspecialchars($item) ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>



                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">등록일시</h3>
                                    <div class="no-admin-content">
                                        <input type="text" value="<?= htmlspecialchars($data['created_at']) ?>"
                                            readonly>
                                    </div>
                                </div>


                                <!-- 버튼 -->
                                <div class="no-items-center center">
                                    <a href="./prescription.php?page=<?= $page ?>"
                                        class="no-btn no-btn--big no-btn--normal">목록</a>
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