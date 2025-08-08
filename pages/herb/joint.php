<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>

<?php
$inquiry_type_key = $_GET['inquiry_type'] ?? 1;
?>

<!-- dev -->



<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>

<script type="module" src="<?= $ROOT ?>/resource/js/herb.js?v=<?= date('YmdHis') ?>" defer></script>

<!-- css, js  -->



<!-- contents -->



<main>

    <section class="no-cetner-visual">

        <div class="no-container-pc">

            <div class="visual-wrap">

                <!-- 공진단 상담신청 -->

                <?php include_once $STATIC_ROOT . '/inc/shared/product-inquiry.php'; ?>



                <!-- 개인맞춤한약 예진표 -->

                <?php include_once $STATIC_ROOT . '/inc/shared/customized-inquiry.php'; ?>

                <div class="mobile-visual-wrap herb vh">

                    <?php include_once $STATIC_ROOT . '/inc/layouts/herb-header.php'; ?>



                    <div class="no-rehab-sub no-herb">
                        <section class="no-cancer-visual hospital first herb">


                            <nav class="herb-nav">

                                <ul class="nav-list">


                                    <li>
                                        <a href="/pages/herb/gongjin.php?inquiry_type=1"
                                            class="no-body-md fw300 wgray">공진단</a>
                                    </li>
                                    <li>
                                        <a href="/pages/herb/gyeongok.php?inquiry_type=2"
                                            class="no-body-md fw300 wgray ">경옥고</a>
                                    </li>
                                    <li>
                                        <a href="/pages/herb/joint.php?inquiry_type=3"
                                            class="no-body-md fw300 wgray active">관절고</a>
                                    </li>
                                </ul>



                                <p class="simple-inquiry-btn no-body-xs fw300">개인맞춤한약</p>

                            </nav>



                            <h2 class="no-heading-sl --tac fade-up">지친 일상에 활력을,<br>

                                황금관절고



                                <p class="no-mg-24--t no-body-lg fw300">관절 건강의 새로운 패러다임</p>

                            </h2>



                            <figure>

                                <img src="/resource/images/joint-visual.jpg">

                            </figure>

                        </section>



                        <section class="no-herb-product no-pd-48--y">

                            <div class="no-container-sm">

                                <hgroup class="fade-up">

                                    <h2 class="no-heading-sm no-mg-16--b">과학으로 증명된<br>

                                        3중 관절 케어 시스템</h2>

                                    <p class="no-body-md fw300">관절 통증 개선, 연골 재생의 혁신<br> 엄선된 9가지 프리미엄 약재의 과학적 조화<br> 지금
                                        경험하세요.</p>

                                </hgroup>



                                <div class="product-wrap fade-up no-mg-32--t">

                                    <img src="/resource/images/joint-product1.jpg">



                                    <div class="info">

                                        <div class="group">

                                            <h3 class="no-body-lg fw600">황금관절고</h3>

                                        </div>



                                        <ul>

                                            <li class="no-body-xs fw600">관절 통증 완화</li>

                                            <li class="no-body-xs fw600">연골 보호 및 재생</li>

                                            <li class="no-body-xs fw600">관절 유연성 강화</li>

                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </section>



                        <section class="no-herb-img-wrap">

                            <div class="no-container-sm">

                                <h2 class="no-heading-sm fade-up no-pd-64--y">현대인의 관절 건강,<br> 프리미엄 관절고로 되찾다</h2>

                            </div>



                            <img src="/resource/images/joint-img1.jpg">

                            <img src="/resource/images/joint-img2.jpg">

                            <img src="/resource/images/joint-img3.jpg">

                            <img src="/resource/images/joint-img4.jpg">

                            <img src="/resource/images/joint-img5.jpg">

                            <img src="/resource/images/joint-img6.jpg">

                        </section>

                    </div>



                    <?php include_once $STATIC_ROOT . '/inc/layouts/footer-herb.php'; ?>

                </div>

                <?php include_once $STATIC_ROOT . '/inc/layouts/floating-inquiry.php'; ?>

            </div>

        </div>

    </section>

</main>