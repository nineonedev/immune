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

                <?php include_once $STATIC_ROOT . '/inc/shared/pc-info.php'; ?>



                <div class="mobile-visual-wrap">

                    <?php include_once $STATIC_ROOT . '/inc/layouts/herb-header.php'; ?>



                    <div class="no-rehab-sub no-herb">


                        <!-- 경옥고 상담신청 -->

                        <?php include_once $STATIC_ROOT . '/inc/shared/product-inquiry.php'; ?>




                        <!-- 개인맞춤한약 예진표 -->

                        <?php include_once $STATIC_ROOT . '/inc/shared/customized-inquiry.php'; ?>



                        <section class="no-cancer-visual hospital first herb">

                            <nav class="herb-nav">

                                <ul class="nav-list">

                                    <li>
                                        <a href="/pages/herb/gongjin.php?inquiry_type=1"
                                            class="no-body-md fw300 wgray">공진단</a>
                                    </li>
                                    <li>
                                        <a href="/pages/herb/gyeongok.php?inquiry_type=2"
                                            class="no-body-md fw300 wgray active">경옥고</a>
                                    </li>
                                    <li>
                                        <a href="/pages/herb/joint.php?inquiry_type=3"
                                            class="no-body-md fw300 wgray">관절고</a>
                                    </li>

                                </ul>



                                <p class="simple-inquiry-btn no-body-xs fw300">개인맞춤한약</p>

                            </nav>



                            <h2 class="no-heading-sl --tac fade-up">홍삼과 지황의 진한 기운,<br>

                                한 스틱에 담다



                                <p class="no-mg-24--t no-body-lg fw300">천년의 영양, 간편한 섭취</p>

                            </h2>



                            <figure>

                                <img src="/resource/images/gyeongok-visual.jpg">

                            </figure>

                        </section>



                        <section class="no-herb-product no-pd-48--y">

                            <div class="no-container-sm">

                                <hgroup class="fade-up">

                                    <h2 class="no-heading-sm no-mg-16--b">천년의 지혜를<br>

                                        현대적 편의성으로</h2>

                                    <p class="no-body-md fw300">약리 활성이 뛰어난 인삼의 진액을<br>

                                        전통 방식으로 정성스레 담아 자연 그대로의<br>

                                        깊은 맛을 전합니다.</p>

                                </hgroup>



                                <div class="product-wrap fade-up no-mg-32--t">

                                    <img src="/resource/images/gyeongok-product1.jpg">



                                    <div class="info">

                                        <div class="group">

                                            <h3 class="no-body-lg fw600">면력경옥고</h3>

                                        </div>



                                        <ul>

                                            <li class="no-body-xs fw600">기억력 증가</li>

                                            <li class="no-body-xs fw600">항피로효능</li>

                                            <li class="no-body-xs fw600">갱년기 증후근 개선</li>

                                            <li class="no-body-xs fw600">호르몬 성장 촉진</li>

                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </section>



                        <section class="no-herb-img-wrap">

                            <div class="no-container-sm">

                                <h2 class="no-heading-sm fade-up no-pd-64--y">당신의 모든 순간이<br>

                                    더욱 선명해지는 시작</h2>

                            </div>



                            <img src="/resource/images/gyeongok-img1.jpg">

                            <img src="/resource/images/gyeongok-img2.jpg">

                            <img src="/resource/images/gyeongok-img3.jpg">

                            <img src="/resource/images/gyeongok-img4.jpg">

                            <img src="/resource/images/gyeongok-img5.jpg">

                            <img src="/resource/images/gyeongok-img6.jpg">

                            <img src="/resource/images/gyeongok-img6.jpg">

                        </section>

                    </div>



                    <?php include_once $STATIC_ROOT . '/inc/layouts/footer-herb.php'; ?>



                    <?php include_once $STATIC_ROOT . '/inc/layouts/floating-inquiry.php'; ?>

                </div>

            </div>

        </div>

    </section>

</main>