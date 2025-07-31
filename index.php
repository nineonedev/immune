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

                <div class="mobile-visual-wrap oy-hidden">
                    <div class="no-container-mobile">

                        <section class="no-center-home">

                            <h1 class="logo">
                                <a href="/">
                                    <img src="/resource/images/color-logo.svg"></img>
                                </a>
                            </h1>

                            <div class="center-area no-mg-16--t">
                                <div class="center-wrap">
                                    <div class="left">
                                        <h2 class="no-body-xxl fw600">강서</h2>
                                        <img src="/resource/images/area1.svg">
                                    </div>

                                    <ul class="center-list">

                                        <li>
                                            <a href="/gangseo/">
                                                <h3 class="no-body-lg fw600">메인페이지</h3>

                                                <i class="fa-regular fa-angle-up fa-rotate-90 i-30"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="/gangseo/pages/cancer/home.php">
                                                <h3 class="no-body-lg fw600">암면역센터</h3>

                                                <i class="fa-regular fa-angle-up fa-rotate-90 i-30"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="/gangseo/pages/neuro/home.php">
                                                <h3 class="no-body-lg fw600">신경면역센터</h3>

                                                <i class="fa-regular fa-angle-up fa-rotate-90 i-30"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="/gangseo/pages/rehab/home.php">
                                                <h3 class="no-body-lg fw600">재활센터</h3>

                                                <i class="fa-regular fa-angle-up fa-rotate-90 i-30"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="center-wrap">
                                    <div class="left">
                                        <h2 class="no-body-xxl fw600">광명</h2>
                                        <img src="/resource/images/area2.svg">
                                    </div>

                                    <ul class="center-list">
                                        <li>
                                            <a href="/gwangmyeon">
                                                <h3 class="no-body-lg fw600">메인페이지</h3>

                                                <i class="fa-regular fa-angle-up fa-rotate-90 i-30"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <h3 class="no-body-lg fw600">암면역센터</h3>

                                                <i class="fa-regular fa-angle-up fa-rotate-90 i-30"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <h3 class="no-body-lg fw600">신경면역센터</h3>

                                                <i class="fa-regular fa-angle-up fa-rotate-90 i-30"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <h3 class="no-body-lg fw600">재활센터</h3>

                                                <i class="fa-regular fa-angle-up fa-rotate-90 i-30"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="center-wrap">
                                    <div class="left">
                                        <h2 class="no-body-xxl fw600">신촌</h2>
                                        <img src="/resource/images/area3.svg">
                                    </div>

                                    <ul class="center-list">
                                        <li>
                                            <a href="#">
                                                <h3 class="no-body-lg fw600">메인페이지</h3>

                                                <i class="fa-regular fa-angle-up fa-rotate-90 i-30"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <h3 class="no-body-lg fw600">암면역센터</h3>

                                                <i class="fa-regular fa-angle-up fa-rotate-90 i-30"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <h3 class="no-body-lg fw600">재활센터</h3>

                                                <i class="fa-regular fa-angle-up fa-rotate-90 i-30"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </section>
                    </div>

                    <?php include_once $STATIC_ROOT . '/inc/layouts/floating-bottom.php'; ?>
                </div>
            </div>
        </div>
    </section>
</main>