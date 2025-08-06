<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>



<!-- dev -->

<?php
    $doctors = getDoctors('ganseo'); 

    // 대표 원장 추출
    $ceoDoctors = array_filter($doctors, fn($doc) => $doc['is_ceo'] == 1);

    // 일반 원장 추출
    $generalDoctors = array_filter($doctors, fn($doc) => $doc['is_ceo'] != 1);
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

                        <?php if (!empty($ceoDoctors)): 
                            $ceo = reset($ceoDoctors); 
                            $ceoName = htmlspecialchars($ceo['title']);
                            $ceoPosition = htmlspecialchars($ceo['position']);
                            $ceoImg = !empty($ceo['thumb_image']) ? "/uploads/doctors/" . $ceo['thumb_image'] : '/resource/images/ceo-doctor.png';
                            $ceoLink = "doctor.view.php?id=" . urlencode($ceo['id']); 
                        ?>
                        <section class="no-doctor-ceo no-pd-48--y">
                            <h2 class="no-heading-sm --tac fade-up">
                                환자분들의 <br>
                                편안한 치료를 위해<br>
                                <b class="fw700 blue">면력은 노력합니다.</b>
                            </h2>

                            <figure class="no-mg-16--t">
                                <img src="<?= $ceoImg ?>" alt="<?= $ceoName ?>" class="fade-up">
                            </figure>

                            <div class="no-container-sm">
                                <a href="<?= $ceoLink ?>" class="f-wrap no-mg-16--t">
                                    <div class="txt">
                                        <h3 class="no-heading-sm"><?= $ceoName ?></h3>
                                        <p class="no-body-lg fw600"><?= $ceo['branch_name'] ?><b class="blue">대표원장</b>
                                        </p>
                                    </div>
                                    <i class=" fa-regular fa-arrow-right i-30"></i>
                                </a>
                            </div>
                        </section>
                        <?php endif; ?>



                        <section class="no-doctor-members no-pd-48--y">
                            <div class="no-container-sm">
                                <ul class="doctor-list">
                                    <?php foreach ($generalDoctors as $doctor):
                                        $name = htmlspecialchars($doctor['title']);
                                        $position = htmlspecialchars($doctor['position']);
                                        $department = htmlspecialchars($doctor['department'] ?? '');
                                        $imgSrc = !empty($doctor['thumb_image']) ? "/uploads/doctors/" . $doctor['thumb_image'] : '';
                                        $link = "doctor.view.php?id=" . urlencode($doctor['id']);
                                    ?>
                                    <li class="fade-up">
                                        <a href="<?= $link ?>">
                                            <figure>
                                                <?php if ($imgSrc): ?>
                                                <img src="<?= $imgSrc ?>" alt="<?= $name ?>">
                                                <?php endif; ?>
                                            </figure>
                                            <div class="f-wrap no-mg-16--t">
                                                <div class="txt">
                                                    <h3 class="no-heading-sm no-mg-8--b"><?= $name ?></h3>
                                                    <p class="no-body-lg fw600"><?= $position ?> <span
                                                            class="no-body-md fw300"><?= $department ?></span></p>
                                                </div>
                                                <i class="fa-regular fa-arrow-right i-30"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
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