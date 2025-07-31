<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>

<!-- dev -->

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
                    <?php include_once $STATIC_ROOT . '/inc/shared/sub.nav-depth.php'; ?>

                    <div class="no-cancer no-neuro no-rehab no-doctor">
                        <section class="no-doctor-ceo no-pd-48--y">

                            <h2 class="no-heading-sm --tac fade-up">환자분들의 <br>
                                편안한 치료를 위해<br>
                                <b class="fw700 blue">면력은 노력합니다.</b>
                            </h2>

                            <figure class="no-mg-16--t">
                                <img src="/resource/images/ceo-doctor.png" class="fade-up">
                            </figure>

                            <div class="no-container-sm">
                                <a href="/pages/hospital/doctor.view.php" class="f-wrap no-mg-16--t">
                                    <div class="txt">
                                        <h3 class="no-heading-sm">황이준</h3>
                                        <p class="no-body-lg fw600">강서<b class="blue">대표원장</b></p>
                                    </div>

                                    <i class=" fa-regular fa-arrow-right i-30"></i>
                                </a>
                            </div>
                        </section>

                        <section class="no-doctor-members no-pd-48--y">
                            <div class="no-container-sm">
                                <ul class="doctor-list">
                                    <li class="fade-up">
                                        <a href="#">
                                            <figure>
                                                <img src="/resource/images/doctor2.png">
                                            </figure>

                                            <div class="f-wrap no-mg-16--t">
                                                <div class="txt">
                                                    <h3 class="no-heading-sm no-mg-8--b">이우석</h3>
                                                    <p class="no-body-lg fw600">강서 양방대표원장 <span class="no-body-md fw300">통합면역 부인과</span></p>
                                                </div>

                                                <i class="fa-regular fa-arrow-right i-30"></i>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="fade-up">
                                        <a href="#">
                                            <figure>
                                                <img src="/resource/images/doctor1.jpg">
                                            </figure>

                                            <div class="f-wrap no-mg-16--t">
                                                <div class="txt">
                                                    <h3 class="no-heading-sm no-mg-8--b">이우석</h3>
                                                    <p class="no-body-lg fw600">강서 양방대표원장 <span class="no-body-md fw300">통합면역 부인과</span></p>
                                                </div>

                                                <i class="fa-regular fa-arrow-right i-30"></i>
                                            </div>
                                        </a>
                                    </li>
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