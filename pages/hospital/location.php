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
                    <?php include_once $STATIC_ROOT . '/inc/shared/sub.nav-board.php'; ?>

                    <div class="no-cancer no-neuro no-rehab no-location">
                        <section class="no-main-location v2 no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac no-mg-24--b">
                                    <p class="no-body-lg fw300">오시는 길</p>
                                    <h2 class="no-heading-sm no-mg-8--t">건강으로 향하는<br>
                                        첫 걸음</h2>
                                </hgroup>
                            </div>

                            <div id="daumRoughmapContainer1752029358628" class="root_daum_roughmap root_daum_roughmap_landing"></div>

                            <script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>

                            <script charset="UTF-8">
                                new daum.roughmap.Lander({
                                    "timestamp": "1752029358628",
                                    "key": "4x538kgm8z4",
                                    "mapWidth": "100%",
                                    "mapHeight": "200"
                                }).render();
                            </script>

                            <div class="no-container-sm">

                                <div class="copy-success">
                                    URL이 복사되었습니다.
                                </div>

                                <div class="address no-mg-24--t fade-up">
                                    <h3 class="--tac no-body-lg fw600">서울시 강서구 마곡중앙6로 93<br>
                                        열린프라자 6, 7, 10층</h3>
                                    <a href="#" onclick="return false" class="basic-btn no-body-sm fw300 no-mg-16--t link-copy">
                                        주소 복사하기
                                    </a>

                                    <script>
                                        $(document).ready(function() {
                                            $('.link-copy').on('click', function() {
                                                const url = '서울시 강서구 마곡중앙6로 93 열린프라자 6, 7, 10층';
                                                const $temp = $('<input>');
                                                $('body').append($temp);
                                                $temp.val(url).select();
                                                document.execCommand('copy');
                                                $temp.remove();

                                                const $success = $('.copy-success');
                                                $success.css({
                                                    bottom: '8rem',
                                                    opacity: '1',
                                                    transition: 'bottom 0.3s ease, opacity 0.3s ease'
                                                });

                                                setTimeout(function() {
                                                    $success.css({
                                                        transition: 'none',
                                                        bottom: '4rem',
                                                        opacity: '0'
                                                    });
                                                }, 2000);
                                            });
                                        });
                                    </script>
                                </div>

                                <ul class="location-app-links no-mg-40--t list-js">
                                    <li>
                                        <a href="https://naver.me/xVGKT1Ve" target="_blank">
                                            <div class="group">
                                                <img src="/resource/images/icon/map_naver.jpg">
                                                <h3 class="no-body-lg fw600">네이버지도에서 확인</h3>
                                            </div>

                                            <i class="fa-regular fa-arrow-right i-30"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="https://kko.kakao.com/jA-97029fA" target="_blank">
                                            <div class="group">
                                                <img src="/resource/images/icon/map_kakao.jpg">
                                                <h3 class="no-body-lg fw600">카카오맵에서 확인</h3>
                                            </div>

                                            <i class="fa-regular fa-arrow-right i-30"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="https://www.tmap.co.kr/my_tmap/my_map_tip/map_tip.do#" target="_blank">
                                            <div class="group">
                                                <img src="/resource/images/icon/map_tmap.jpg">
                                                <h3 class="no-body-lg fw600">티맵에서 확인</h3>
                                            </div>

                                            <i class="fa-regular fa-arrow-right i-30"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </section>

                        <section class="no-location-guide no-pd-48--y bg">
                            <div class="no-container-sm">
                                <div class="pd-group no-pd-24--x">
                                    <h2 class="no-body-xxl fw600">주차안내</h2>

                                    <ul class="list no-mg-8--y">
                                        <li class="bullet no-body-xl fw300">입원당일: <b class="fw700">3시간 무료</b></li>
                                        <li class="bullet no-body-xl fw300">퇴원당일: <b class="fw700">3시간 무료</b></li>
                                        <li class="bullet no-body-xl fw300">외래진료: <b class="fw700">3시간 무료</b></li>
                                    </ul>

                                    <span class="no-body-md fw300 wgray">3시간 초과 시 주차료가 발생하며, 보호자 ・면회객은 주차권이 발급되지 않습니다.</span>

                                    <h2 class="no-body-xxl fw600 no-mg-32--t">본원 거리 안내</h2>

                                    <ul class="list no-mg-8--y">
                                        <li class="bullet no-body-xl fw300">이대서울병원: <b class="fw700">약 10분</b></li>
                                        <li class="bullet no-body-xl fw300">목동이대병원: <b class="fw700">약 15분</b></li>
                                        <li class="bullet no-body-xl fw300">일산국립암센터: <b class="fw700">약 25분</b></li>
                                        <li class="bullet no-body-xl fw300">일산차병원: <b class="fw700">약 25분</b></li>
                                        <li class="bullet no-body-xl fw300">신촌세브란스병원: <b class="fw700">약 25분</b></li>
                                        <li class="bullet no-body-xl fw300">중앙대학교병원: <b class="fw700">약 25분</b></li>
                                        <li class="bullet no-body-xl fw300">서울대학교병원: <b class="fw700">약 35분</b></li>
                                        <li class="bullet no-body-xl fw300">서울아산병원: <b class="fw700">약 45분</b></li>
                                    </ul>
                                </div>
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