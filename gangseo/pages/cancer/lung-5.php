<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>

<!-- dev -->

<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>

<!-- css, js  -->
<script src="<?= $ROOT ?>/resource/js/sub.js" <?= date('YmdHis') ?> defer></script>

<!-- contents -->

<main>
    <section class="no-cetner-visual">
        <div class="no-container-pc">
            <div class="visual-wrap">
                <?php include_once $STATIC_ROOT . '/inc/shared/pc-info.php'; ?>

                <div class="mobile-visual-wrap">
                    <?php include_once $STATIC_ROOT . '/inc/layouts/sub-header.php'; ?>

                    <?php include_once $STATIC_ROOT . '/inc/shared/sub.nav-depth.php'; ?>

                    <div class="no-cancer-sub">
                        <section class="no-cancer-visual">
                            <h2 class="no-heading-sm --tac fade-up">일상을 돌아보는 쉼표,<br> 다양한 힐링을 경험하세요.</h2>

                            <figure>
                                <img src="/resource/images/cancer-visual3.jpg">
                            </figure>
                        </section>

                        <section class="no-cancer-sub-healing no-cancer-sub-essential no-pd-48--y">
                            <div class="no-container-sm">

                                <ul class="healing-point">
                                    <li>
                                        <p class="no-body-lg fw600">자연을 거닐며<span class="fw300">(산책/소풍)</span></p>
                                        <i class="fa-solid fa-check i-24 brown"></i>
                                    </li>

                                    <li>
                                        <p class="no-body-lg fw600">이야기를 나누고<span class="fw300">(푸드테라피)</span></p>
                                        <i class="fa-solid fa-check i-24 brown"></i>
                                    </li>

                                    <li>
                                        <p class="no-body-lg fw600">소소한 행복을 즐기세요<span class="fw300">(공예)</span></p>
                                        <i class="fa-solid fa-check i-24 brown"></i>
                                    </li>
                                </ul>

                                <div class="focus fade-up no-pd-56--y">
                                    <img src="/resource/images/icon/quotes-open.svg">
                                    <strong class="font-kr blur-js no-body-xxl fw300 --tac">
                                        당신의 오늘을,<br> 면력한방병원이 <b>함께</b>합니다.
                                    </strong>
                                    <img src="/resource/images/icon/quotes-close.svg">
                                </div>

                                <ul class="healing-list">
                                    <li class="fade-up">
                                        <figure>
                                            <img src="/resource/images/cancer-healing1.jpg">
                                        </figure>

                                        <div class="txt">
                                            <h3 class="no-body-xxl fw600">산책 프로그램</h3>
                                            <p class="no-body-md fw300 no-mg-4--t">매일 평일 오전, 병원 인근 산책 코스로 향하는 야외 산책 버스를 운행합니다.
                                                자연 속에서 컨디션과 마음을 회복해보세요.</p>
                                        </div>
                                    </li>

                                    <li class="fade-up">
                                        <figure>
                                            <img src="/resource/images/cancer-healing2.jpg">
                                        </figure>

                                        <div class="txt">
                                            <h3 class="no-body-xxl fw600">소풍 프로그램</h3>
                                            <p class="no-body-md fw300 no-mg-4--t">매주 1회, 병원 밖으로 떠나는<br> 힐링 소풍 프로그램을 진행합니다.<br> 자연과 함께 몸과 마음에 여유를 더해보세요.</p>
                                        </div>
                                    </li>

                                    <li class="fade-up">
                                        <figure>
                                            <img src="/resource/images/cancer-healing3.jpg">
                                        </figure>

                                        <div class="txt">
                                            <h3 class="no-body-xxl fw600">운동치료</h3>
                                            <p class="no-body-md fw300 no-mg-4--t">매주 1회, 전문 치료사와 함께하는<br> 운동치료 프로그램을 진행합니다.<br> 움직임을 통해 체력과 회복력을 높여보세요.</p>
                                        </div>
                                    </li>

                                    <li class="fade-up">
                                        <figure>
                                            <img src="/resource/images/cancer-healing4.jpg">
                                        </figure>

                                        <div class="txt">
                                            <h3 class="no-body-xxl fw600">원데이클래스</h3>
                                            <p class="no-body-md fw300 no-mg-4--t">매주 1회, 주제별로 달라지는 원데이 클래스 프로그램을 운영합니다. 작은 즐거움이 쌓여, 마음 회복의 힘이 됩니다.</p>
                                        </div>
                                    </li>

                                    <li class="fade-up">
                                        <figure>
                                            <img src="/resource/images/cancer-healing5.jpg">
                                        </figure>

                                        <div class="txt">
                                            <h3 class="no-body-xxl fw600">푸드테라피</h3>
                                            <p class="no-body-md fw300 no-mg-4--t">2주에 한 번, 전문 셰프와 함께하는 푸드테라피 클래스가 진행됩니다. 맛있고 건강한 식사를 통해 힐링과 영양을 동시에 채워보세요.</p>
                                        </div>
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