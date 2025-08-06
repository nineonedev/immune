<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php';

    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        die('잘못된 접근입니다.');
    }

    $doctorId = (int) $_GET['id'];

    try {
        $db = DB::getInstance();

        $sql = "
            SELECT 
                d.*, 
                br.name AS branch_code, 
                br.name_kr AS branch_name
            FROM nb_doctors AS d
            LEFT JOIN nb_branches AS br ON d.branch_id = br.id
            WHERE d.is_active = 1 AND d.id = :id
            LIMIT 1
        ";

        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $doctorId]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            die('존재하지 않는 의사입니다.');
        }
    } catch (PDOException $e) {
        die('데이터베이스 오류: ' . $e->getMessage());
    }

    $imgSrc = !empty($data['detail_image'])
        ? "/uploads/doctors/" . $data['detail_image']
        : "";

    $keywords = array_filter(array_map('trim', explode(',', str_replace('#', '', $data['keywords']))));

?>


<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>

<!-- css, js  -->

<!-- contents -->

<main>


    <section class="no-cetner-visual">
        <div class="no-container-pc">
            <div class="visual-wrap">
                <?php include_once $STATIC_ROOT . '/inc/shared/pc-info.php'; ?>

                <div class="mobile-visual-wrap">
                    <?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>
                    <?php include_once $STATIC_ROOT . '/inc/shared/sub.nav-board.php'; ?>

                    <div class="no-cancer no-neuro no-rehab no-doctor">

                        <!-- 상단 비주얼 -->
                        <section class="no-doctor-view-visual">
                            <hgroup class="fade-up">
                                <h2 class="no-heading-sl blue">
                                    <h2 class="no-heading-sl blue">
                                        <?=$data['title']?>
                                    </h2>
                                </h2>
                                <p class="no-body-xl fw600"><?= htmlspecialchars($data['branch_name']) ?>
                                    <?= htmlspecialchars($data['position']) ?></p>
                                <span class="no-body-xs fw300">통합면역 대표원장</span>
                            </hgroup>

                            <figure>
                                <img src="<?= $imgSrc ?>" alt="<?= htmlspecialchars($data['title']) ?>">
                            </figure>
                        </section>

                        <!-- 키워드 -->
                        <?php if (!empty($keywords)): ?>
                        <section class="no-doctor-view-keyword no-pd-48--y">
                            <div class="no-container-sm">
                                <h2 class="no-heading-sm fade-up fw600">
                                    내가 보는 <?= htmlspecialchars($data['title']) ?> 원장님은<br>
                                    <b class="blue">어떤 분일까?</b>
                                </h2>

                                <ul class="keyword-list no-mg-24--t list-js">
                                    <?php foreach ($keywords as $tag): ?>
                                    <li class="no-body-md"><?= htmlspecialchars($tag) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </section>
                        <?php endif; ?>

                        <!-- 프로필 정보 -->
                        <!-- 프로필 정보 -->
                        <section class="no-doctor-view-profile no-pd-48--y">
                            <div class="no-container-sm">
                                <ul class="profile-list">

                                    <?php if (!empty($data['career'])): ?>
                                    <li class="fade-up">
                                        <h3 class="no-heading-sm fw600">경력</h3>
                                        <div class="dept2 no-mg-16--t">
                                            <?= $data['career'] ?>
                                        </div>
                                    </li>
                                    <?php endif; ?>

                                    <?php if (!empty($data['activity'])): ?>
                                    <li class="fade-up">
                                        <h3 class="no-heading-sm fw600">활동</h3>
                                        <div class="dept2 no-mg-16--t">
                                            <?= $data['activity'] ?>
                                        </div>
                                    </li>
                                    <?php endif; ?>

                                    <?php if (!empty($data['education'])): ?>
                                    <li class="fade-up">
                                        <h3 class="no-heading-sm fw600">학력</h3>
                                        <div class="dept2 no-mg-16--t">
                                            <?= $data['education'] ?>
                                        </div>
                                    </li>
                                    <?php endif; ?>

                                    <?php if ($data['publication_visible'] === "1" && !empty($data['publications'])): ?>
                                    <li class="fade-up">
                                        <h3 class="no-heading-sm fw600">저서 및 논문</h3>
                                        <div class="dept2 no-mg-16--t">
                                            <?= $data['publications'] ?>
                                        </div>
                                    </li>
                                    <?php endif; ?>

                                </ul>
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