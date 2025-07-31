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

                    <?php include_once $STATIC_ROOT . '/inc/shared/sub.nav.php'; ?>


                    <div class="no-cancer no-neuro no-rehab">
                        <section class="no-cancer-visual">

                            <h2 class="no-heading-sm --tac fade-up">움직임의 회복<br>
                                일상의 회복입니다.</h2>

                            <figure>
                                <img src="/resource/images/rehab-visual.jpg">
                            </figure>

                        </section>

                        <section class="no-cancer-field no-pd-48--y">
                            <div class="no-container-sm">
                                <ul class="field-list rehab fade-up">
                                    <li class="--tac">
                                        <a href="/gangseo/pages/rehab/gyn.php">
                                            <h3 class="no-body-xl fw600">부인과<br>
                                                수술 후<br>
                                                회복</h3>
                                            <img src="/resource/images/rehab-field1.png" alt="field">
                                        </a>
                                    </li>

                                    <li class="--tac">
                                        <a href="/gangseo/pages/rehab/accident.php">
                                            <h3 class="no-body-xl fw600">교통사고<br> 후유증</h3>
                                            <img src="/resource/images/rehab-field2.png" alt="field">
                                        </a>
                                    </li>

                                    <li class="--tac">
                                        <a href="/gangseo/pages/rehab/postop.php">
                                            <h3 class="no-body-xl fw600">수술 후<br> 재활</h3>
                                            <img src="/resource/images/rehab-field3.png" alt="field">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </section>

                        <section class="no-cancer-intro neuro no-pd-24--t no-pd-48--b">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-32--b">
                                    <h2 class="no-heading-sm">이런 경우 놓치지 마세요.</h2>
                                </hgroup>
                            </div>

                            <div class="basic-slider v2 v3" <?= $aos_left_slow ?>>
                                <ul class="swiper-wrapper">
                                    <li class="swiper-slide">
                                        <figure>
                                            <p class="no-body-lg fw300 no-mg-24--b --tac">수술 후 당일 퇴원,<br>
                                                <b class="fw600">빠른복귀, 정말 괜찮을까요?</b>
                                            </p>

                                            <img src="/resource/images/rehab-symptom1.png">
                                        </figure>

                                        <h3 class="no-mg-16--t no-body-xxl fw600 --tac">부인과 수술 후 회복</h3>
                                    </li>

                                    <li class="swiper-slide">
                                        <figure>
                                            <p class="no-body-lg fw300 no-mg-24--b --tac">처음엔 괜찮았는데<br>
                                                <b class="fw600">며칠 후 더 아픈 이유는?</b>
                                            </p>

                                            <img src="/resource/images/rehab-symptom2.png">
                                        </figure>

                                        <h3 class="no-mg-16--t no-body-xxl fw600 --tac">교통사고 후유증</h3>
                                    </li>

                                    <li class="swiper-slide">
                                        <figure>
                                            <p class="no-body-lg fw300 no-mg-24--b --tac">수술은 끝났는데<br>
                                                <b class="fw600">몸이 내 것이 아닌 것 같다면</b>
                                            </p>

                                            <img src="/resource/images/rehab-symptom3.png">
                                        </figure>

                                        <h3 class="no-mg-16--t no-body-xxl fw600 --tac">수술 후 재활</h3>
                                    </li>
                                </ul>

                                <div class="swiper-pagination"></div>
                            </div>

                            <div class="no-container-sm">
                                <div class="cancer-case-wrap fade-up no-mg-80--t">
                                    <strong class="no-heading-sm --tac no-mg-40--b">이미 <b class="navy">50,000명의 환자</b>들이<br> 일상을 되찾았습니다.</strong>
                                    <h2 class="no-body-lg fw600 --tac no-mg-16--b">누적 치료사례</h2>

                                    <div class="count-box-wrap">
                                        <ul class="box-list">
                                            <li class="no-heading-bl">
                                                5
                                            </li>

                                            <li class="no-heading-bl">
                                                0
                                            </li>

                                            <span class="no-heading-lg fw600">,</span>

                                            <li class="no-heading-bl">
                                                0
                                            </li>

                                            <li class="no-heading-bl">
                                                0
                                            </li>

                                            <li class="no-heading-bl">
                                                0
                                            </li>
                                        </ul>
                                        <h6 class="no-body-xxl fw600">건</h6>
                                    </div>

                                    <ul class="case-list list-js no-mg-24--t">
                                        <li>
                                            <div class="txt --tac">
                                                <p class="no-body-sm fw600 no-mg-4--b">숫자로 증명된</p>
                                                <h3 class="no-body-xxl fw600">환자 만족도</h3>

                                            </div>

                                            <figure>
                                                <img src="/resource/images/neuro-case-img.svg">

                                                <span class="no-body-sm fw700">
                                                    <div class="counter no-heading-xs fw700" data-count="93.5">
                                                        0
                                                    </div>
                                                    %
                                                </span>
                                            </figure>
                                        </li>

                                        <li>
                                            <div class="txt --tac">
                                                <p class="no-body-sm fw600 no-mg-4--b">전담 의료진</p>
                                                <h3 class="no-body-xxl fw600">
                                                    <div class="counter" data-count="19">
                                                        0
                                                    </div>명
                                                </h3>

                                            </div>

                                            <img src="/resource/images/neuro-case-img2.svg">
                                        </li>
                                    </ul>

                                    <span class="source no-body-sm fw300 --tac no-mg-24--t" <?= $aos_fade ?>>2024. 11. 06 기준, 전지점 조사결과</span>
                                </div>
                            </div>
                        </section>

                        <section class="no-cancer-video no-main-video neuro no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-32--b">
                                    <h2 class="no-heading-sl">면력한방병원에서<br> 찾은 회복</h2>
                                </hgroup>

                                <div class="basic-slider" <?= $aos_left_slow ?>>
                                    <ul class="swiper-wrapper video-list">
                                        <li class="swiper-slide">
                                            <a href="https://www.youtube.com/watch?v=LiBjhAbLUa4" target="_blank">
                                                <figure>
                                                    <img src="/resource/images/rehab-video1.jpg">
                                                </figure>

                                                <div class="f-wrap no-mg-16--t">
                                                    <h3 class="no-heading-sm no-mg-8--b">갑작스러운 자궁근종, 심한 가스통증도 사라졌어요!</h3>
                                                    <i class=" fa-regular fa-arrow-right i-30"></i>
                                                </div>
                                                <div class="txt no-mg-8--t">
                                                    <span class="no-body-lg fw300">54세 이미영님</span>
                                                    <p class="no-mg-8--t no-body-md fw300">갑작스러운 자궁근종 수술 후 면력에서 회복관리를 받았습니다. 정성 가득한 면역 식단과 원장님의 다양한 치료로 극심한 가스통증이 사라졌어요. 세심한 치료와 배려에 진심으로 감사드립니다.</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </section>

                        <section class="no-cancer-data rehab no-pd-64--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-24--b">
                                    <p class="no-body-lg fw300">5만 환우분들은</p>
                                    <h2 class="no-heading-sl">왜 면력을 선택했을까요?</h2>
                                </hgroup>

                                <figure class="no-mg-32--t fade-up">
                                    <h3 class="no-body-lg fw600 --tac">입원생활 시<br>
                                        <b>가장 만족한 서비스</b>
                                    </h3>

                                    <img src="/resource/images/neuro-data.svg">
                                </figure>

                                <span class="source no-body-sm fw300 --tac no-mg-32--t" <?= $aos_fade ?>>25.4.17 면력 서비스 만족도 설문 조사 결과</span>
                            </div>
                        </section>

                        <section class="no-neuro-doctor no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-32--b">
                                    <h2 class="no-heading-sl no-mg-8--t">회복에도 기준이<br>
                                        필요합니다.</h2>
                                    <p class="no-body-lg fw600 no-mg-32--t">한방재활의학과 전문의 구성</p>
                                </hgroup>

                                <img src="/resource/images/rehab-doctor.jpg" class="no-radius-sm fade-up">

                                <div class="txt no-mg-16--t --tac fade-up">
                                    <p class="no-body-lg fw600">면력한방병원</p>
                                    <span class="no-body-md fw300 gray">한방재활의학과 전문의</span>
                                    <h2 class="no-heading-sm no-mg-8--t">배길준</h2>
                                </div>
                        </section>

                        <section class="no-cancer-sub-system bg no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-32--b">
                                    <h2 class="no-heading-sl no-mg-8--b">식사는 또하나의<br>
                                        치료제 입니다.</h2>
                                    <p class="no-body-lg fw300">회복 중인 몸에 맞춘 식단은<br> <b class="fw600 navy">치료의 연장이자 재활의 시작</b>입니다.</p>
                                </hgroup>

                                <img src="/resource/images/neuro-food.jpg" class="fade-up no-radius-sm">

                                <strong class="no-body-lg fw300 no-mg-24--t fade-up --tac">면력 재활센터는 수술 후·사고 후<br> 몸에 맞춘 맞춤 식단으로<br> <b class="fw600 navy">회복에 최적화된 식사를 제공합니다.</b></strong>

                                <ul class="system-list no-mg-48--t">
                                    <li class="fade-up">
                                        <div class="aos-wrap f-wrap" <?= $aos_right_slow ?>>
                                            <img src="/resource/images/doctor-illust1.svg">
                                            <div class="txt">
                                                <p class="no-body-md fw300">의료진</p>
                                                <h class="no-body-lg fw600">정확한 건강 진단</h>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="fade-up">
                                        <div class="aos-wrap f-wrap" <?= $aos_right_slow ?>>
                                            <img src="/resource/images/doctor-illust2.svg">
                                            <div class="txt">
                                                <p class="no-body-md fw300">임상영양사</p>
                                                <h class="no-body-lg fw600">영양상태, 식습관 분석</h>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="fade-up">
                                        <div class="aos-wrap f-wrap" <?= $aos_right_slow ?>>
                                            <img src="/resource/images/doctor-illust3.svg">
                                            <div class="txt">
                                                <p class="no-body-md fw300">치료식 셰프</p>
                                                <h class="no-body-lg fw600">프리미엄 요리제공</h>
                                            </div>
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