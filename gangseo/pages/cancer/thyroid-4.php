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

                            <h2 class="no-heading-sm --tac fade-up">정성을 담아, 한 분만을 위한<br> 맞춤 항암식단을 준비합니다.</h2>

                            <figure>
                                <img src="/resource/images/cancer-visual2.jpg">
                            </figure>

                        </section>

                        <section class="no-cancer-sub-system no-pd-48--y">
                            <div class="no-container-sm">
                                <h2 class="no-heading-sm --tac fade-up">1:1 식이 시스템</h2>

                                <ul class="system-list no-mg-32--t">
                                    <li class="fade-up">
                                        <div class="aos-wrap f-wrap" <?= $aos_right_slow ?>>
                                            <img src="/resource/images/doctor-illust1.png">
                                            <div class="txt">
                                                <p class="no-body-md fw300">의료진</p>
                                                <h class="no-body-lg fw600">정확한 건강 진단</h>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="fade-up">
                                        <div class="aos-wrap f-wrap" <?= $aos_right_slow ?>>
                                            <img src="/resource/images/doctor-illust2.png">
                                            <div class="txt">
                                                <p class="no-body-md fw300">임상영양사</p>
                                                <h class="no-body-lg fw600">영양상태, 식습관 분석</h>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="fade-up">
                                        <div class="aos-wrap f-wrap" <?= $aos_right_slow ?>>
                                            <img src="/resource/images/doctor-illust3.png">
                                            <div class="txt">
                                                <p class="no-body-md fw300">치료식 셰프</p>
                                                <h class="no-body-lg fw600">프리미엄 요리제공</h>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </section>

                        <section class="no-cancer-sub-talk no-cancer-sub-essential no-cancer-process no-pd-48--y">
                            <div class="no-container-sm">
                                <div class="speech-wrap">
                                    <img src="/resource/images/talk-speech1.png" <?= $aos_right_slow ?>>
                                    <img src="/resource/images/talk-speech2.png" <?= $aos_left_slow ?>>
                                </div>

                                <div class="speech-wrap">
                                    <img src="/resource/images/talk-speech3.png" <?= $aos_right_slow ?>>
                                    <img src="/resource/images/talk-speech4.png" <?= $aos_left_slow ?>>
                                </div>

                                <div class="speech-wrap">
                                    <img src="/resource/images/talk-speech5.png" <?= $aos_right_slow ?>>
                                    <img src="/resource/images/talk-speech6.png" <?= $aos_left_slow ?>>
                                </div>

                                <div class="focus fade-up">
                                    <img src="/resource/images/icon/quotes-open.svg">
                                    <strong class="font-kr blur-js no-body-xxl fw300 --tac">
                                        식사는<br> 또 하나의 <b>치료제</b>입니다.
                                    </strong>
                                    <img src="/resource/images/icon/quotes-close.svg">
                                </div>

                                <ul class="process-list">
                                    <li class="fade-up">
                                        <img src="/resource/images/icon/cancer-process6.svg">

                                        <div class="left">
                                            <i class="fa-sharp fa-regular fa-plus"></i>
                                            <div class="line"></div>
                                        </div>

                                        <div class="txt no-pd-48--b">
                                            <span class="no-body-md fw600">1</span>

                                            <p class="no-body-md fw300 no-mg-16--t">암 치료로 손상된</p>
                                            <h3 class="no-body-xxl fw600 no-mg-4--t">조직의 재생을 도움</h3>
                                        </div>
                                    </li>

                                    <li class="fade-up">
                                        <img src="/resource/images/icon/cancer-process7.svg">

                                        <div class="left">
                                            <i class="fa-sharp fa-regular fa-plus"></i>
                                            <div class="line"></div>
                                        </div>

                                        <div class="txt no-pd-48--b">
                                            <span class="no-body-md fw600">2</span>

                                            <p class="no-body-md fw300 no-mg-16--t">항암치료 후유증</p>
                                            <h3 class="no-body-xxl fw600 no-mg-4--t">증상별 맞춤식이</h3>
                                        </div>
                                    </li>

                                    <li class="fade-up">
                                        <img src="/resource/images/icon/cancer-process8.svg">

                                        <div class="left">
                                            <i class="fa-sharp fa-regular fa-plus"></i>
                                            <div class="line"></div>
                                        </div>

                                        <div class="txt">
                                            <span class="no-body-md fw600">3</span>

                                            <p class="no-body-md fw300 no-mg-16--t">꾸준한 영양상태와</p>
                                            <h3 class="no-body-xxl fw600 no-mg-4--t">건강 상태 유지와 관리</h3>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </section>

                        <section class="no-cancer-sub-role no-pd-48--y">
                            <div class="no-container-sm">
                                <ul class="role-list list-js">
                                    <li class="--tac">
                                        <h3 class="no-body-xxl fw600 brown">임상영양사</h3>
                                        <p class="no-body-md fw300">디테일한 영양 상담</p>

                                        <img src="/resource/images/cancer-role1.png" class="no-mg-16--t">
                                    </li>

                                    <i class="fa-regular fa-plus i-24 fade-up"></i>

                                    <li class="--tac">
                                        <h3 class="no-body-xxl fw600 brown">치료식 셰프</h3>
                                        <p class="no-body-md fw300">맞춤 치료식이 제공</p>

                                        <img src="/resource/images/cancer-role2.png" class="no-mg-16--t">
                                    </li>
                                </ul>
                            </div>
                        </section>

                        <section class="no-cancer-sub-food no-pd-48--y">
                            <div class="no-container-sm">
                                <h2 class="no-heading-sm --tac fade-up">갑상선암 치료식이</h2>

                                <figure class="no-mg-32--y fade-up">
                                    <img src="/resource/images/cancer-food.jpg">
                                </figure>

                                <ul class="point-list fade-up">
                                    <li class="no-pd-32--b">
                                        <h3 class="brown no-body-lg fw600">권장 식이 요법</h3>

                                        <ul class="dept2">
                                            <li>
                                                <i class="fa-solid fa-check i-24 brown"></i>
                                                <p class="no-body-md fw300">저요오드 식단 <span class="no-body-xs">(과일과 채소, 가금류, 소고기) </span></p>
                                            </li>

                                            <li>
                                                <i class="fa-solid fa-check i-24 brown"></i>
                                                <p class="no-body-md fw300">고단백 식품 <span class="no-body-xs">(닭가슴살, 생선) </span></p>
                                            </li>

                                            <li>
                                                <i class="fa-solid fa-check i-24 brown"></i>
                                                <p class="no-body-md fw300">균형 잡힌 식사</p>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="no-mg-32--t">
                                        <h3 class="no-body-lg fw600">피해야 할 식품</h3>

                                        <ul class="dept2">
                                            <li>
                                                <i class="fa-solid fa-minus i-24" style="color: #d3d3d3;"></i>
                                                <p class="no-body-md fw300">해조류 (미역, 김 등)</p>
                                            </li>

                                            <li>
                                                <i class="fa-solid fa-minus i-24" style="color: #d3d3d3;"></i>
                                                <p class="no-body-md fw300">요오드가 첨가된 소금 및 가공식품</p>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>

                                <figure class="no-mg-32--y fade-up">
                                    <img src="/resource/images/cancer-food-data3.jpg">
                                </figure>

                                <strong class="no-body-lg fw600 --tac fade-up">
                                    적절한 영양을 제공하여 치료 기간 동안<br>
                                    부작용을 줄입니다.
                                </strong>

                                <strong class="no-body-lg fw600 --tac fade-up no-mg-32--t">
                                    또한, <b class="brown">항암 치료로 손상된 조직의 회복</b>을 돕고,<br> <b class="brown">영양 상태와 적정 체중을 유지</b>할 수 있도록<br>
                                    식사를 제공합니다.
                                </strong>
                            </div>
                        </section>

                        <section class="no-cancer-sub-corner no-main-video no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-24--b">
                                    <h2 class="no-heading-sl">면역 회복 식이</h2>
                                    <p class="no-body-lg fw300">환우분들의 기호에 맞춘 30여 종<br> 면역 회복 선택식 제공</p>
                                </hgroup>

                                <div class="basic-slider" <?= $aos_left_slow ?>>
                                    <ul class="swiper-wrapper video-list">
                                        <li class="swiper-slide">
                                            <figure>
                                                <img src="/resource/images/cancer-corner1.jpg">
                                            </figure>

                                            <div class="no-mg-16--t">
                                                <h3 class="no-body-xxl fw600 no-mg-8--b">라이브 코너</h3>
                                                <p class="no-body-md fw300">총괄 셰프가 직접 즉석에서 조리해 최적의 온도와 맛으로 바로 제공하는 음식을 즐기실 수 있습니다.</p>
                                            </div>
                                        </li>

                                        <li class="swiper-slide">
                                            <figure>
                                                <img src="/resource/images/cancer-corner2.jpg">
                                            </figure>

                                            <div class="no-mg-16--t">
                                                <h3 class="no-body-xxl fw600 no-mg-8--b">항암 맞춤 코너</h3>
                                                <p class="no-body-md fw300">암 환우를 위한 맞춤형 면역 강화 항암 식단을 매 끼니 제공하여 최상의 영양과 맛을 보장합니다.</p>
                                            </div>
                                        </li>

                                        <li class="swiper-slide">
                                            <figure>
                                                <img src="/resource/images/cancer-corner3.jpg">
                                            </figure>

                                            <div class="no-mg-16--t">
                                                <h3 class="no-body-xxl fw600 no-mg-8--b">항암 쌈채소 코너</h3>
                                                <p class="no-body-md fw300">항암과 면역 강화에 좋은 신선한 쌈 야채를 매 끼니 제공하여 건강한 식사를 지원합니다.</p>
                                            </div>
                                        </li>

                                        <li class="swiper-slide">
                                            <figure>
                                                <img src="/resource/images/cancer-corner4.jpg">
                                            </figure>

                                            <div class="no-mg-16--t">
                                                <h3 class="no-body-xxl fw600 no-mg-8--b">제철 과일 코너</h3>
                                                <p class="no-body-md fw300">계절에 맞는 신선한 제철 과일을 매 끼니 제공하여 건강한 식사를 돕습니다.</p>
                                            </div>
                                        </li>

                                        <li class="swiper-slide">
                                            <figure>
                                                <img src="/resource/images/cancer-corner5.jpg">
                                            </figure>

                                            <div class="no-mg-16--t">
                                                <h3 class="no-body-xxl fw600 no-mg-8--b">수제 건강음료 코너</h3>
                                                <p class="no-body-md fw300">항암에 좋은 음료를 직접 수제로 만들어 매일 제공하여 건강을 지원합니다.</p>
                                            </div>
                                        </li>

                                        <li class="swiper-slide">
                                            <figure>
                                                <img src="/resource/images/cancer-corner6.jpg">
                                            </figure>

                                            <div class="no-mg-16--t">
                                                <h3 class="no-body-xxl fw600 no-mg-8--b">비빔밥 코너</h3>
                                                <p class="no-body-md fw300">항암 후 부작용으로 입맛이 없는 환우분들을 위한 특별 코너를 마련하여 맛있고 풍성한 식사를 제공합니다.</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </section>

                        <section class="no-cancer-sub-aftermath no-cancer-sub-intro no-pd-48--y">
                            <div class="no-container-sm">
                                <ul class="think-list v2 list-js">
                                    <li class="--tac">
                                        <h3 class="no-body-lg fw600">"<b class="brown">먹고 싶은 게 없어요</b>, 뭐라도<br>
                                            먹어야 하나요?"</h3>
                                    </li>

                                    <li class="--tac">
                                        <h3 class="no-body-lg fw600">"<b class="brown">구역질 날 때</b> 어떤 음식을<br>
                                            먹으면 좋을까요?"</h3>
                                    </li>

                                    <li class="--tac">
                                        <h3 class="no-body-lg fw600">"<b class="brown">항암 후 감기</b> 잘 걸려요…"</h3>
                                    </li>

                                    <li class="--tac">
                                        <h3 class="no-body-lg fw600">"<b class="brown">면역력 높이려면</b> 뭘 먹어야 하나요?"</h3>
                                    </li>
                                </ul>

                                <hgroup class="--tac fade-up no-mg-48--y">
                                    <p class="no-body-lg fw300">항암 치료에서 가장 어려운 부분은</p>
                                    <h2 class="no-heading-sl">치료 후에 찾아오는<br>
                                        후유증입니다.</h2>
                                </hgroup>

                                <strong class="--tac no-body-lg fw600 fade-up">면력한방병원은 환자분들의 이런 후유증까지<br> 고려한 맞춤형 식단을 제공합니다.</strong>

                                <div class="basic-slider v2 no-mg-48--t" <?= $aos_left_slow ?>>
                                    <ul class="swiper-wrapper">
                                        <li class="swiper-slide">
                                            <figure>
                                                <img src="/resource/images/cancer-aftermath1.jpg">
                                            </figure>
                                        </li>

                                        <li class="swiper-slide">
                                            <figure>
                                                <img src="/resource/images/cancer-aftermath2.jpg">
                                            </figure>
                                        </li>

                                        <li class="swiper-slide">
                                            <figure>
                                                <img src="/resource/images/cancer-aftermath3.jpg">
                                            </figure>
                                        </li>

                                        <li class="swiper-slide">
                                            <figure>
                                                <img src="/resource/images/cancer-aftermath4.jpg">
                                            </figure>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </section>

                        <section class="no-cancer-sub-live no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-24--b">
                                    <p class="no-body-lg fw300">면역력 강화 항암 특선 요리 </p>
                                    <h2 class="no-heading-sl">라이브로 즐기세요!</h2>
                                </hgroup>

                                <figure class="fade-up">
                                    <img src="/resource/images/cancer-live.jpg">
                                </figure>

                                <p class="no-body-lg fw600 --tac no-mg-24--y fade-up">호텔 출신 셰프와 임상 영양사가 고심하여<br> 맛과 영양을 잡은 항암에 도움이 되는<br> 특선 요리를 라이브로 제공합니다.</p>

                                <a href="https://www.youtube.com/watch?v=6nImsfP2zew" target="_blank" class="basic-btn cancer no-body-lg fw600 no-mg-16--t">
                                    셰프특식 바로가기
                                </a>
                            </div>
                        </section>

                        <section class="no-cancer-sub-chart no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-24--b">
                                    <p class="no-body-lg fw300">호텔 출신 셰프와 임상영양사가</p>
                                    <h2 class="no-heading-sl">맛과 영양을 잡았습니다.</h2>
                                </hgroup>

                                <figure class="fade-up">
                                    <img src="/resource/images/cancer-chart.png">

                                    <ul class="chart-list no-mg-16--t">
                                        <li>
                                            <h3 class="no-body-lg fw600 brown">영양, 체중관리</h3>
                                            <p class="no-body-md fw300">영양소를 충분히 챙기고 체중을 관리할 수 있는 식단을 제공합니다.</p>
                                        </li>

                                        <li>
                                            <h3 class="no-body-lg fw600 brown">항암 후 면역력 회복</h3>
                                            <p class="no-body-md fw300">항암 치료 후 면역력 회복을 지원하고 건강을 유지할 수 있도록 맞춤형 식단을 제공합니다.</p>
                                        </li>

                                        <li>
                                            <h3 class="no-body-lg fw600 brown">기호와 트렌드 반영한 식단</h3>
                                            <p class="no-body-md fw300">기호와 최신 식문화 트렌드를 반영하여 개인의 취향에 맞춘 맞춤형 식단을 제공합니다.</p>
                                        </li>
                                    </ul>
                                </figure>
                            </div>
                        </section>

                        <?php include_once $STATIC_ROOT . '/inc/layouts/integrate-link.php'; ?>

                        <?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>

                        <?php include_once $STATIC_ROOT . '/inc/layouts/floating-bottom.php'; ?>
                    </div>
                </div>
    </section>
</main>