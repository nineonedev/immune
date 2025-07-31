<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>

<!-- dev -->

<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>
<script src="<?= $ROOT ?>/resource/js/sub.js" <?= date('YmdHis') ?> defer></script>
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

                    <div class="no-cancer no-neuro no-rehab no-media">
                        <section class="no-cancer-visual">
                            <h2 class="no-heading-sm fw300 --tac fade-up">필요한 치료만,<br>
                                <b class="fw700">진심을 담아</b>
                            </h2>

                            <figure>
                                <img src="/resource/images/media-visual.jpg">
                            </figure>
                        </section>

                        <section class="no-review-wrap no-pd-48--y">
                            <div class="no-container-sm">

                                <ul class="array-option no-mg-16--b f-wrap no-gap-8">
                                    <li>
                                        <a href="#" class="no-body-lg fw300 gray" onclick="return false">조회순</a>
                                    </li>

                                    <li>
                                        <a href="#" class="no-body-lg fw300 gray active" onclick="return false">최신순</a>
                                    </li>
                                </ul>

                                <ul class="review-list">
                                    <li class="fade-up">
                                        <a href="/pages/hospital/default.view.php">
                                            <figure>
                                                <img src="/resource/images/review1.jpg">
                                            </figure>

                                            <div class="f-wrap no-gap-8 no-pd-8--x no-mg-16--t">
                                                <h3 class="no-body-xxl fw600">암환우를 위한 겨울 보양식 '누룽지 백숙 & 매콤 오징어볶음'</h3>
                                                <i class=" fa-regular fa-arrow-right i-30"></i>
                                            </div>
                                            <p class="no-body-lg fw300 gray no-pd-8--x no-mg-8--t">25.01.24</p>
                                        </a>
                                    </li>

                                    <li class="fade-up">
                                        <a href="/pages/hospital/default.view.php">
                                            <figure>
                                                <img src="/resource/images/review1.jpg">
                                            </figure>

                                            <div class="f-wrap no-gap-8 no-pd-8--x no-mg-16--t">
                                                <h3 class="no-body-xxl fw600">암환우를 위한 겨울 보양식 '누룽지 백숙 & 매콤 오징어볶음'</h3>
                                                <i class=" fa-regular fa-arrow-right i-30"></i>
                                            </div>
                                            <p class="no-body-lg fw300 gray no-pd-8--x no-mg-8--t">25.01.24</p>
                                        </a>
                                    </li>

                                    <li class="fade-up">
                                        <a href="/pages/hospital/default.view.php">
                                            <figure>
                                                <img src="/resource/images/review1.jpg">
                                            </figure>

                                            <div class="f-wrap no-gap-8 no-pd-8--x no-mg-16--t">
                                                <h3 class="no-body-xxl fw600">암환우를 위한 겨울 보양식 '누룽지 백숙 & 매콤 오징어볶음'</h3>
                                                <i class=" fa-regular fa-arrow-right i-30"></i>
                                            </div>
                                            <p class="no-body-lg fw300 gray no-pd-8--x no-mg-8--t">25.01.24</p>
                                        </a>
                                    </li>
                                </ul>

                                <?php include_once $STATIC_ROOT . '/inc/layouts/pagination.php'; ?>
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