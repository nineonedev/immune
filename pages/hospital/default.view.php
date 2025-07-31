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

                    <div class="no-cancer no-neuro no-rehab no-review">
                        <section class="no-view-default no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac no-pd-48--b">
                                    <h2 class="no-heading-sm">치료후기</h2>
                                </hgroup>

                                <div class="view-wrap no-mg-24--t fade-up">
                                    <div class="view-top">
                                        <a href="#" class="no-body-lg fw600 blue category">신경면역 <i class="fa-solid fa-angle-up fa-rotate-90"></i></a>

                                        <!-- 링크X 카테고리 -->
                                        <p class="no-body-lg fw300" style="display: none;">[셰프특식]</p>

                                        <a href="#" class="no-body-md fw300 back">뒤로가기</a>
                                    </div>

                                    <div class="view-title no-mg-12--t">
                                        <h3 class="no-body-xxl fw600 no-mg-8--b">60대 대상포진 신경통, 이걸로 완치했어요!</h3>
                                        <p class="no-body-lg fw300 wgray">25.01.15</p>
                                    </div>

                                    <figure class="view-thumnail no-mg-24--y">
                                        <img src="/resource/images/review1.jpg" class="no-radius-sm">
                                    </figure>

                                    <div class="view-content">
                                        <p>
                                            여러분 안녕하세요! 면력한방병원입니다<br>
                                            오늘은 급작스러운 대상포진으로 큰 고통을 겪으셨던<br>
                                            60대 이진옥님의 치유 이야기를 나눕니다.<br><br>

                                            ▶ 환자분의 고민<br><br>

                                            참기 힘든 날카로운 통증<br>
                                            대형병원에서도 초기 진단 놓쳐<br>
                                            독한 약으로도 차도가 없던 상황<br>
                                            진통제를 먹어도 몇 시간을 못 버티는 통증<br>
                                            "6개월은 걸린다"는 절망적인 이야기<br><br>

                                            하지만!<br>
                                            면력한방병원의 맞춤형 집중치료로<br>
                                            단 4일 만에 통증에서 해방되신<br>
                                            이진옥님의 감동적인 치유 과정을<br>
                                            생생한 후기로 만나보세요
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                    <?php include_once $STATIC_ROOT . '/inc/layouts/prevnext.php'; ?>

                    <?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>

                    <?php include_once $STATIC_ROOT . '/inc/layouts/floating-bottom.php'; ?>
                </div>
            </div>
        </div>
    </section>
</main>