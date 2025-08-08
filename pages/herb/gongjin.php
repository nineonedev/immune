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
                                            class="no-body-md fw300 wgray active">공진단</a>
                                    </li>

                                    <li>
                                        <a href="/pages/herb/gyeongok.php?inquiry_type=2"
                                            class="no-body-md fw300 wgray">경옥고</a>
                                    </li>

                                    <li>
                                        <a href="/pages/herb/joint.php?inquiry_type=3"
                                            class="no-body-md fw300 wgray">관절고</a>
                                    </li>
                                </ul>



                                <p class="simple-inquiry-btn no-body-xs fw300">개인맞춤한약</p>

                            </nav>



                            <h2 class="no-heading-sl --tac fade-up">지쳐있는 당신에게,<br>

                                면력 공진단



                                <p class="no-mg-24--t no-body-lg fw300">면역, 활력, 생기. 면력 한방솔루션</p>

                            </h2>



                            <figure>

                                <img src="/resource/images/gongjin-visual.jpg">

                            </figure>

                        </section>



                        <section class="no-herb-product no-pd-48--y">

                            <div class="no-container-sm">

                                <hgroup class="fade-up">

                                    <h2 class="no-heading-sm no-mg-16--b">알타이산 천연 사향의<br>

                                        진한 기운을 담아</h2>

                                    <p class="no-body-md fw300">면역력 증강, 만성피로 개선.<br>

                                        엄선된 약재와 천연 사향으로 빚어낸 명품 공진단.<br>

                                        지금 경험하세요.</p>

                                </hgroup>



                                <div class="product-wrap fade-up no-mg-32--t">

                                    <img src="/resource/images/gongjin-product1.jpg">



                                    <div class="info">

                                        <div class="group">

                                            <h3 class="no-body-lg fw600 no-mg-8--b">원방공진단</h3>

                                            <p class="no-body-xs fw600">사향 20,000mg 함유</p>

                                        </div>



                                        <ul>

                                            <li class="no-body-xs fw600">암 예방</li>

                                            <li class="no-body-xs fw600">신경 안정</li>

                                            <li class="no-body-xs fw600">간 기능 강화</li>

                                        </ul>

                                    </div>

                                </div>



                                <hgroup class="fade-up no-mg-64--t">

                                    <h2 class="no-heading-sm no-mg-16--b">자연이 빚어낸<br>

                                        깊은 목향의 진심</h2>

                                    <p class="no-body-md fw300">원기 회복, 심장 기능 강화.<br>

                                        천연 원료의 순수한 힘,<br>

                                        녹용과 목향의 진정성을 담았습니다.</p>

                                </hgroup>



                                <div class="product-wrap fade-up no-mg-32--t">

                                    <img src="/resource/images/gongjin-product2.jpg">



                                    <div class="info">

                                        <div class="group">

                                            <h3 class="no-body-lg fw600 no-mg-8--b">녹용공진단</h3>

                                            <p class="no-body-xs fw600">목향 280g 함유</p>

                                        </div>



                                        <ul>

                                            <li class="no-body-xs fw600">원기 회복</li>

                                            <li class="no-body-xs fw600">성인병 예방</li>

                                            <li class="no-body-xs fw600">심장 기능 강화</li>

                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </section>



                        <section class="no-herb-img-wrap">

                            <div class="no-container-sm">

                                <h2 class="no-heading-sm fade-up no-pd-64--y">현대인의 면역력,<br>

                                    명품 공진단으로 깨우다</h2>

                            </div>



                            <img src="/resource/images/gongjin-img1.jpg">

                            <img src="/resource/images/gongjin-img2.jpg">

                            <img src="/resource/images/gongjin-img3.jpg">

                            <img src="/resource/images/gongjin-img4.jpg">

                            <img src="/resource/images/gongjin-img5.jpg">

                            <img src="/resource/images/gongjin-img6.jpg">

                        </section>

                    </div>



                    <?php include_once $STATIC_ROOT . '/inc/layouts/footer-herb.php'; ?>
                </div>

                <?php include_once $STATIC_ROOT . '/inc/layouts/floating-inquiry.php'; ?>

            </div>

        </div>

    </section>

</main>