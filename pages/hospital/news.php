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

                    <div class="no-cancer no-neuro no-rehab">
                        <section class="no-review-top no-pd-48--t no-pd-16--b">
                            <div class="no-container-sm">
                                <hgroup class="--tac no-mg-48--b">
                                    <h2 class="no-heading-sm">함께 나누는 따뜻한 소식,<br>
                                        지금 전해드립니다.</h2>
                                </hgroup>

                                <ul class="cartegory-wrap v2">
                                    <li>
                                        <a href="#" class="active no-body-lg fw300">
                                            진료일정
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="no-body-lg fw300">
                                            힐링프로그램
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </section>

                        <section class="no-review-wrap no-pd-48--b">
                            <div class="no-container-sm">
                                <ul class="review-list">
                                    <li class="fade-up">
                                        <a href="/pages/hospital/default.view.php">
                                            <figure>
                                                <img src="/resource/images/news1.jpg">
                                            </figure>

                                            <div class="f-wrap no-gap-8 no-pd-8--x no-mg-16--t">
                                                <h3 class="no-body-xxl fw600">1월(설) 진료 일정 안내</h3>
                                                <i class=" fa-regular fa-arrow-right i-30"></i>
                                            </div>
                                            <p class="no-body-lg fw300 gray no-pd-8--x no-mg-8--t">25.01.24</p>
                                        </a>
                                    </li>

                                    <li class="fade-up">
                                        <a href="/pages/hospital/default.view.php">
                                            <figure>
                                                <img src="/resource/images/news1.jpg">
                                            </figure>

                                            <div class="f-wrap no-gap-8 no-pd-8--x no-mg-16--t">
                                                <h3 class="no-body-xxl fw600">1월(설) 진료 일정 안내</h3>
                                                <i class=" fa-regular fa-arrow-right i-30"></i>
                                            </div>
                                            <p class="no-body-lg fw300 gray no-pd-8--x no-mg-8--t">25.01.24</p>
                                        </a>
                                    </li>

                                    <li class="fade-up">
                                        <a href="/pages/hospital/default.view.php">
                                            <figure>
                                                <img src="/resource/images/news1.jpg">
                                            </figure>

                                            <div class="f-wrap no-gap-8 no-pd-8--x no-mg-16--t">
                                                <h3 class="no-body-xxl fw600">1월(설) 진료 일정 안내</h3>
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