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
                        <section class="no-cancer-sub-intro no-cancer-intro no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-24--b">
                                    <p class="no-body-lg fw300">암과의 싸움에서</p>
                                    <h2 class="no-heading-sm">큰 결정을 앞두고 계신가요?</h2>
                                </hgroup>

                                <ul class="think-list list-js">
                                    <li class="--tac">
                                        <h3 class="no-body-lg fw600">내 몸 한 부분을 떼어낸 건데...<br>
                                            무슨 일이 있지 않을까?</h3>
                                        <span class="no-body-sm fw300">#수술 부작용 관리</span>
                                    </li>

                                    <li class="--tac">
                                        <h3 class="no-body-lg fw600">수술이 처음인데<br>
                                            어떻게 관리해야 하지?</h3>
                                        <span class="no-body-sm fw300">#상처관리, 목욕</span>
                                    </li>

                                    <li class="--tac">
                                        <h3 class="no-body-lg fw600">수술했다고 끝이 아닌데<br>
                                            앞으로 어떻게 치료해야 하지?</h3>
                                        <span class="no-body-sm fw300">#향후 치료 스케쥴</span>
                                    </li>
                                </ul>

                                <strong class="no-body-xxl fw600 --tac fade-up no-mg-64--t">처음 겪는 불안함,<br> 이제 걱정하지 마세요.</strong>

                                <div class="cancer-case-wrap fade-up no-mg-80--t">
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
                                                <img src="/resource/images/cancer-case-img.svg">

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

                                            <img src="/resource/images/cancer-case-img2.svg">
                                        </li>
                                    </ul>

                                    <span class="source no-body-sm fw600 --tac no-mg-24--t" <?= $aos_fade ?>>2024. 11. 06 기준, 전지점 조사결과</span>
                                </div>
                            </div>
                        </section>

                        <section class="no-cancer-sub-ba no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-24--b">
                                    <p class="no-body-lg fw300">내 몸 일부를 떼어냈는데…</p>
                                    <h2 class="no-heading-sm">괜찮을까?</h2>
                                </hgroup>

                                <div class="question no-body-md fw300 --tac fade-up">
                                    절제 수술 후 관리는 어떻게 하나요?<br> 장루 관리가 걱정돼요.
                                </div>

                                <ul class="ba-list list-js no-mg-40--t">
                                    <li class="--tac">
                                        <span class="no-body-lg fw600">장 절제 후</span>
                                        <img src="/resource/images/icon/cancer-before-icon2.svg" class="no-mg-16--y">

                                        <p class="no-body-md fw300 no-mg-4--b">장루 관리</p>
                                        <p class="no-body-md fw300 no-mg-4--b">배변 조절</p>
                                        <p class="no-body-md fw300">식사법</p>
                                    </li>

                                    <li class="--tac">
                                        <span class="no-body-lg fw600">위 절제 후</span>
                                        <img src="/resource/images/icon/cancer-after-icon2.svg" class="no-mg-16--y">

                                        <p class="no-body-md fw300 no-mg-4--b">덤핑증후군</p>
                                        <p class="no-body-md fw300 no-mg-4--b">체중 감소</p>
                                        <p class="no-body-md fw300 no-mg-4--b">소화장애</p>
                                    </li>
                                </ul>
                            </div>
                        </section>

                        <section class="no-cancer-sub-disease no-pd-48--t">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-32--b">
                                    <h2 class="no-heading-sm no-mg-32--b">수술 후 겪는 어려움을<br>
                                        깊이 이해하고 있습니다.</h2>

                                    <span class="no-body-md fw300 no-mg-24--b">이런 증상은 회복 과정의 일부지만,<br>
                                        추가적인 치료와 관리가 필요할 수 있습니다.</span>

                                    <p class="no-body-lg fw600">지속적인 치료로 빠르고<br>
                                        안전한 회복을 돕겠습니다.</p>
                                </hgroup>
                            </div>

                            <ul class="disease-list">
                                <li class="updown-content">
                                    <a href="#" onclick="return false">
                                        <h3 class="no-body-lg fw600">고열</h3>

                                        <i class="fa-regular fa-angle-up i-24"></i>
                                    </a>
                                    <div class="content">
                                        <figure>
                                            <img src="/resource/images/cancer-disease1.jpg">
                                        </figure>

                                        <p class="no-body-md fw300 no-mg-16--t">수술 후 발열은 흔한 후유증이며, 수술부위로 세균이 침입해서 나타난 발열일 경우에는 빠르게 처치하지 않으면 패혈증으로 진행될 수 있어 주의가 필요합니다.</p>
                                    </div>
                                </li>

                                <li class="updown-content">
                                    <a href="#" onclick="return false">
                                        <h3 class="no-body-lg fw600">문합부 누출</h3>

                                        <i class="fa-regular fa-angle-up i-24"></i>
                                    </a>
                                    <div class="content">
                                        <figure>
                                            <img src="/resource/images/cancer-disease9.jpg">
                                        </figure>

                                        <p class="no-body-md fw300 no-mg-16--t">위나 대장 절제 후 문합 부위가 제대로 아물지 않으면 복막염이나 농양이 생길 수 있습니다. 복통, 발열, 황달 등이 나타나면 문합부 누출을 의심해 정확한 진단이 필요합니다.</p>
                                    </div>
                                </li>

                                <li class="updown-content">
                                    <a href="#" onclick="return false">
                                        <h3 class="no-body-lg fw600">장기능 변화</h3>

                                        <i class="fa-regular fa-angle-up i-24"></i>
                                    </a>
                                    <div class="content">
                                        <figure>
                                            <img src="/resource/images/cancer-disease10.jpg">
                                        </figure>

                                        <p class="no-body-md fw300 no-mg-16--t">수술이나 치료 후 장기능 변화로 설사, 변비, 잔변감, 급박변 등이 나타날 수 있으며, 생활의 불편과 스트레스로 이어질 수 있어 관리가 필요합니다.</p>
                                    </div>
                                </li>

                                <li class="updown-content">
                                    <a href="#" onclick="return false">
                                        <h3 class="no-body-lg fw600">수술부위 합병증</h3>

                                        <i class="fa-regular fa-angle-up i-24"></i>
                                    </a>
                                    <div class="content">
                                        <figure>
                                            <img src="/resource/images/cancer-disease11.jpg">
                                        </figure>

                                        <p class="no-body-md fw300 no-mg-16--t">환자의 수술 부위가 제대로 관리되지 않거나 당뇨, 감염, 영양장애 등이 있으면 염증이 생기고 상처가 잘 아물지 않을 수 있습니다. 특히 고열이 동반될 경우 즉시 처치가 필요합니다.</p>
                                    </div>
                                </li>

                                <li class="updown-content">
                                    <a href="#" onclick="return false">
                                        <h3 class="no-body-lg fw600">장유착, 장폐색</h3>

                                        <i class="fa-regular fa-angle-up i-24"></i>
                                    </a>
                                    <div class="content">
                                        <figure>
                                            <img src="/resource/images/cancer-disease12.jpg">
                                        </figure>

                                        <p class="no-body-md fw300 no-mg-16--t">복부나 골반 장기 수술 후에는 장이 수술 부위에 들러붙는 장유착이 생길 수 있으며, 이로 인해 음식물 통과가 어려워지는 장폐색으로 이어질 수 있습니다.</p>
                                    </div>
                                </li>

                                <li class="updown-content">
                                    <a href="#" onclick="return false">
                                        <h3 class="no-body-lg fw600">미세잔존암</h3>

                                        <i class="fa-regular fa-angle-up i-24"></i>
                                    </a>
                                    <div class="content">
                                        <figure>
                                            <img src="/resource/images/cancer-disease6.jpg">
                                        </figure>

                                        <p class="no-body-md fw300 no-mg-16--t">수술 이후에도 신체에는 미세잔존암 암줄기세포는 남아있습니다. 수술 후 암환우에게 필요한 '세포면역 점막면역' 중심으로 신체 스스로 암세포를 공격하고, 세포돌연변이의 발생을 줄입니다.</p>
                                    </div>
                                </li>

                                <li class="updown-content">
                                    <a href="#" onclick="return false">
                                        <h3 class="no-body-lg fw600">영양 기력 저하</h3>

                                        <i class="fa-regular fa-angle-up i-24"></i>
                                    </a>
                                    <div class="content">
                                        <figure>
                                            <img src="/resource/images/cancer-disease7.jpg">
                                        </figure>

                                        <p class="no-body-md fw300 no-mg-16--t">수술 중 불가피하게 조직손상이 있기 때문에, 수술 후 집중 회복재활 및 영양관리가 필요합니다. 이후 항암 방사선 치료가 있다면, 더욱 회복 커디션 관리가 필수적입니다.</p>
                                    </div>
                                </li>

                                <li class="updown-content on">
                                    <a href="#" onclick="return false" class="active">
                                        <h3 class="no-body-lg fw600">정서적 문제</h3>

                                        <i class="fa-regular fa-angle-up i-24"></i>
                                    </a>
                                    <div class="content">
                                        <figure>
                                            <img src="/resource/images/cancer-disease8.jpg">
                                        </figure>

                                        <p class="no-body-md fw300 no-mg-16--t">신체적 변화와 더불어 암 치료과정에서 오는 스트레스와 불안감으로 인한 마음의 병을 함께 치유해야 합니다.
                                            저희는 다양한 힐링프로그램으로 환우들의 정서적 치유를 돕고, 환우들의 유대감 형성으로 긴 암치료과정을 극복하도록 돕습니다./p>

                                            <a href="/pages/board/board.list.php?board_no=13&category_no=18" class="basic-btn cancer no-body-lg fw600 no-mg-16--t">
                                                힐링 프로그램 바로가기
                                            </a>
                                    </div>
                                </li>
                            </ul>

                        </section>

                        <section class="no-cancer-sub-care no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-32--b">
                                    <h2 class="no-heading-sm">수술부위, 어떻게<br>
                                        관리해야 하나요?</h2>
                                    <p class="no-body-lg fw300 no-mg-8--t">올바른 수술부위 관리방법을 배워보세요.</p>
                                </hgroup>

                                <ul class="care-list fade-up">
                                    <li class="mini-modal">
                                        <a href="#" onclick="return false">
                                            <h3 class="no-body-lg fw600">식이 관리</h3>
                                            <i class="fa-regular fa-angle-up fa-rotate-90 i-24"></i>

                                            <img src="/resource/images/icon/cancer-care5.svg">
                                        </a>

                                        <div class="mini-modal-wrap">
                                            <div class="modal-slider">
                                                <ul class="swiper-wrapper">
                                                    <li class="swiper-slide">
                                                        <img src="/resource/images/card/cancer-card22-1.jpg">
                                                    </li>

                                                    <li class="swiper-slide">
                                                        <img src="/resource/images/card/cancer-card22-2.jpg">
                                                    </li>

                                                    <li class="swiper-slide">
                                                        <img src="/resource/images/card/cancer-card22-3.jpg">
                                                    </li>

                                                    <li class="swiper-slide">
                                                        <img src="/resource/images/card/cancer-card22-4.jpg">
                                                    </li>

                                                    <li class="swiper-slide">
                                                        <img src="/resource/images/card/cancer-card22-5.jpg">
                                                    </li>

                                                    <li class="swiper-slide">
                                                        <img src="/resource/images/card/cancer-card22-6.jpg">
                                                    </li>

                                                    <li class="swiper-slide">
                                                        <img src="/resource/images/card/cancer-card22-7.jpg">
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="swiper-controller no-mg-16--t">
                                                <div class="swiper-button-prev arrow"><i class="fa-sharp fa-light fa-angle-up fa-rotate-270" style="color: #fff;"></i></div>
                                                <div class="swiper-pagination-custom swiper-pagination-horizontal">
                                                    <span class="current no-body-lg fw600"></span>
                                                    <span class="slash no-body-lg fw600">/</span>
                                                    <span class="total no-body-lg fw600"></span>
                                                </div>
                                                <div class="swiper-button-next arrow"><i class="fa-sharp fa-light fa-angle-up fa-rotate-90" style="color: #fff;"></i></div>
                                            </div>

                                            <div class="modal-close">
                                                <i class="fa-regular fa-xmark i-24"></i>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="mini-modal">
                                        <a href="#" onclick="return false">
                                            <h3 class="no-body-lg fw600">장루 관리</h3>
                                            <i class="fa-regular fa-angle-up fa-rotate-90 i-24"></i>

                                            <img src="/resource/images/icon/cancer-care6.svg">
                                        </a>

                                        <div class="mini-modal-wrap">
                                            <div class="modal-slider">
                                                <ul class="swiper-wrapper">
                                                    <li class="swiper-slide">
                                                        <img src="/resource/images/card/cancer-card23-1.jpg">
                                                    </li>

                                                    <li class="swiper-slide">
                                                        <img src="/resource/images/card/cancer-card23-2.jpg">
                                                    </li>

                                                    <li class="swiper-slide">
                                                        <img src="/resource/images/card/cancer-card23-3.jpg">
                                                    </li>

                                                    <li class="swiper-slide">
                                                        <img src="/resource/images/card/cancer-card23-4.jpg">
                                                    </li>

                                                    <li class="swiper-slide">
                                                        <img src="/resource/images/card/cancer-card23-5.jpg">
                                                    </li>

                                                    <li class="swiper-slide">
                                                        <img src="/resource/images/card/cancer-card23-6.jpg">
                                                    </li>

                                                    <li class="swiper-slide">
                                                        <img src="/resource/images/card/cancer-card23-7.jpg">
                                                    </li>

                                                    <li class="swiper-slide">
                                                        <img src="/resource/images/card/cancer-card23-8.jpg">
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="swiper-controller no-mg-16--t">
                                                <div class="swiper-button-prev arrow"><i class="fa-sharp fa-light fa-angle-up fa-rotate-270" style="color: #fff;"></i></div>
                                                <div class="swiper-pagination-custom swiper-pagination-horizontal">
                                                    <span class="current no-body-lg fw600"></span>
                                                    <span class="slash no-body-lg fw600">/</span>
                                                    <span class="total no-body-lg fw600"></span>
                                                </div>
                                                <div class="swiper-button-next arrow"><i class="fa-sharp fa-light fa-angle-up fa-rotate-90" style="color: #fff;"></i></div>
                                            </div>

                                            <div class="modal-close">
                                                <i class="fa-regular fa-xmark i-24"></i>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="mini-modal">
                                        <a href="#" onclick="return false">
                                            <h3 class="no-body-lg fw600">상처 관리</h3>
                                            <i class="fa-regular fa-angle-up fa-rotate-90 i-24"></i>

                                            <img src="/resource/images/icon/cancer-care2.svg">
                                        </a>

                                        <div class="mini-modal-wrap">
                                            <div class="modal-slider">
                                                <ul class="swiper-wrapper">
                                                    <li class="swiper-slide">
                                                        <img src="/resource/images/card/cancer-card24-1.jpg">
                                                    </li>

                                                    <li class="swiper-slide">
                                                        <img src="/resource/images/card/cancer-card24-2.jpg">
                                                    </li>

                                                    <li class="swiper-slide">
                                                        <img src="/resource/images/card/cancer-card24-3.jpg">
                                                    </li>

                                                    <li class="swiper-slide">
                                                        <img src="/resource/images/card/cancer-card24-4.jpg">
                                                    </li>

                                                    <li class="swiper-slide">
                                                        <img src="/resource/images/card/cancer-card24-5.jpg">
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="swiper-controller no-mg-16--t">
                                                <div class="swiper-button-prev arrow"><i class="fa-sharp fa-light fa-angle-up fa-rotate-270" style="color: #fff;"></i></div>
                                                <div class="swiper-pagination-custom swiper-pagination-horizontal">
                                                    <span class="current no-body-lg fw600"></span>
                                                    <span class="slash no-body-lg fw600">/</span>
                                                    <span class="total no-body-lg fw600"></span>
                                                </div>
                                                <div class="swiper-button-next arrow"><i class="fa-sharp fa-light fa-angle-up fa-rotate-90" style="color: #fff;"></i></div>
                                            </div>

                                            <div class="modal-close">
                                                <i class="fa-regular fa-xmark i-24"></i>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </section>

                        <section class="no-cancer-sub-heal no-pd-48--t">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-32--b">
                                    <h2 class="no-heading-sm">잘 회복하려면<br>
                                        어떻게 해야 할까요?</h2>
                                </hgroup>

                                <div class="speech no-mg-32--b fade-up --tac">
                                    <h3 class="no-body-lg fw600">수술은 끝이 아닌,<br> 새로운 치유의 시작점입니다.</h3>
                                    <p class="no-body-sm fw300 no-mg-8--t"> 잃어버린 몸의 일부만큼, 정상 기능을<br>
                                        되찾기 위해선 더 많은 노력이 필요합니다.</p>
                                </div>

                                <img src="/resource/images/cancer-heal.svg" class="schematic">
                            </div>

                            <ul class="heal-list no-mg-32--t">
                                <li class="updown-content on">
                                    <a href="#" onclick="return false" class="active">
                                        <h3 class="no-body-lg fw600">영양 (Nutrition)</h3>

                                        <i class="fa-regular fa-angle-up i-24"></i>
                                    </a>
                                    <div class="content v2 v3">
                                        <div class="group">
                                            <span class="no-body-md fw600">저잔사 치료식이</span>

                                            <ul class="grid-wrap no-mg-16--t">
                                                <li>
                                                    <img src="/resource/images/cancer-heal6-1-v2.jpg">
                                                </li>
                                                <li>
                                                    <img src="/resource/images/cancer-heal6-2-v2.jpg">
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="group">
                                            <span class="no-body-md fw600">위절제 치료식이</span>

                                            <img src="/resource/images/cancer-heal7.png" class="no-mg-16--t">
                                        </div>

                                        <div class="group">
                                            <span class="no-body-md fw600">맞춤식이</span>
                                            <p class="no-body-md fw300">환우분들의 기호에 맞춘 30여 종 면역 회복 선택식 제공</p>

                                            <ul class="grid-wrap no-mg-16--t">
                                                <li>
                                                    <img src="/resource/images/cancer-heal6-3.jpg">
                                                    <h3 class="no-body-md fw700 no-mg-8--t --tac">셰프 라이브 코너</h3>
                                                </li>
                                                <li>
                                                    <img src="/resource/images/cancer-heal6-4.jpg">
                                                    <h3 class="no-body-md fw700 no-mg-8--t --tac">항암 맞춤 코너</h3>
                                                </li>
                                                <li>
                                                    <img src="/resource/images/cancer-heal6-5.jpg">
                                                    <h3 class="no-body-md fw700 no-mg-8--t --tac">항암 쌈채소 코너</h3>
                                                </li>
                                                <li>
                                                    <img src="/resource/images/cancer-heal6-6.jpg">
                                                    <h3 class="no-body-md fw700 no-mg-8--t --tac">제철 과일 코너</h3>
                                                </li>
                                                <li>
                                                    <img src="/resource/images/cancer-heal6-7.jpg">
                                                    <h3 class="no-body-md fw700 no-mg-8--t --tac">수제 건강음료 코너</h3>
                                                </li>
                                                <li>
                                                    <img src="/resource/images/cancer-heal6-8.jpg">
                                                    <h3 class="no-body-md fw700 no-mg-8--t --tac">비빔밥 코너</h3>
                                                </li>
                                            </ul>
                                        </div>

                                        <a href="/gangseo/pages/cancer/digest-4.php" class="basic-btn cancer no-body-lg fw600 no-mg-16--t">
                                            항암식이 바로가기
                                        </a>
                                    </div>
                                </li>

                                <li class="updown-content">
                                    <a href="#" onclick="return false">
                                        <h3 class="no-body-lg fw600">면역 (Immunity)</h3>

                                        <i class="fa-regular fa-angle-up i-24"></i>
                                    </a>
                                    <div class="content v2">

                                        <div class="group">
                                            <span class="no-body-md fw600 no-mg-16--b">세포면역</span>

                                            <div class="dept2">
                                                <div class="txt">
                                                    <h4 class="no-body-lg fw600">싸이모신알파1 요법</h4>
                                                    <p class="no-body-xs fw300 no-mg-4--t">면역방어 기능을 높여 항암효과를 얻도록 합니다. 면역조절작용을 통해 T세포 및 NK세포를 활성화시켜 암세포를 파괴합니다.</p>
                                                </div>

                                                <figure class="white">
                                                    <img src="/resource/images/cancer-heal1-1.png">
                                                </figure>
                                            </div>

                                            <div class="dept2">
                                                <div class="txt">
                                                    <h4 class="no-body-lg fw600">미슬토 요법</h4>
                                                    <p class="no-body-xs fw300 no-mg-4--t">암세포의 증식을 억제시켜 사멸에 도움, 항암물질 및 면역기능을 증가시키는 물 함유되어 있습니다.</p>
                                                </div>

                                                <figure class="white">
                                                    <img src="/resource/images/cancer-heal1-2.png">
                                                </figure>
                                            </div>

                                            <div class="dept2">
                                                <div class="txt">
                                                    <h4 class="no-body-lg fw600">이뮤노시아닌</h4>
                                                    <p class="no-body-xs fw300 no-mg-4--t">NK세포 활성과 면역 반응을 조절하여 항암 치료를 보조합니다.</p>
                                                </div>

                                                <figure class="white">
                                                    <img src="/resource/images/cancer-heal1-3.png">
                                                </figure>
                                            </div>

                                            <div class="dept2">
                                                <div class="txt">
                                                    <h4 class="no-body-lg fw600">NK세포치료제</h4>
                                                    <p class="no-body-xs fw300 no-mg-4--t">몸속 면역세포를 배양시킨 살해 세포로써 암세포만을 선택적으로 공격합니다. 환자 본인에게만 투여할 수 있는 항암제로, 수술 이후의 미세 암 제거에도 도움을 줍니다.</p>
                                                </div>

                                                <figure class="white">
                                                    <img src="/resource/images/cancer-heal1-4.png">
                                                </figure>
                                            </div>

                                            <div class="dept2">
                                                <div class="txt">
                                                    <h4 class="no-body-lg fw600">항암면역증강제</h4>
                                                    <p class="no-body-xs fw300 no-mg-4--t">면역세포 활성화를 통해 항암 효과를 보조하고 재발 위험을 낮춥니다.</p>
                                                </div>

                                                <figure class="white">
                                                    <img src="/resource/images/cancer-heal1-5.png">
                                                </figure>
                                            </div>
                                        </div>

                                        <div class="group">
                                            <span class="no-body-md fw600">체액면역</span>

                                            <div class="dept2">
                                                <div class="txt">
                                                    <h4 class="no-body-lg fw600">글루타민 주사</h4>
                                                    <p class="no-body-xs fw300 no-mg-4--t">간세포 재생을 촉진하고 항암 치료로 인한 간 손상을 완화합니다.</p>
                                                </div>

                                                <figure class="white">
                                                    <img src="/resource/images/cancer-heal2-1.png">
                                                </figure>
                                            </div>

                                            <div class="dept2">
                                                <div class="txt">
                                                    <h4 class="no-body-lg fw600">면역플러스</h4>
                                                    <p class="no-body-xs fw300 no-mg-4--t">황기 부정단 처방으로 종양 면역 세포의 활성화를 돕습니다. 면역기능 증강, 골수기능 개선 및 종양의 증식을 억제합니다.</p>
                                                </div>

                                                <figure class="white">
                                                    <img src="/resource/images/cancer-heal2-2.png">
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="updown-content">
                                    <a href="#" onclick="return false">
                                        <h3 class="no-body-lg fw600">체온 (Temperature)</h3>

                                        <i class="fa-regular fa-angle-up i-24"></i>
                                    </a>
                                    <div class="content">
                                        <figure class="no-mg-16--b">
                                            <img src="/resource/images/cancer-heal3.jpg">
                                        </figure>

                                        <span class="no-body-md fw600 brown">중심체온상승</span>
                                        <h4 class="no-body-lg fw600">고주파온열암치료</h4>

                                        <p class="no-body-md fw300 no-mg-16--y">고온 환경에서 암 조직은 더 민감해지고,
                                            면역세포가 활성화되어 종양 미세환경에서 항암 면역 반응이 강화됩니다.
                                            항암제 투여와 고주파온열 치료를 병행할경우,
                                            생존기간이 유의미하게 증가했다는 연구결과가 존재합니다.</p>

                                        <span class="no-body-md fw600 brown">온열요법</span>
                                        <h4 class="no-body-lg fw600 no-pd-24--b">적외선온열요법</h4>
                                    </div>
                                </li>

                                <li class="updown-content">
                                    <a href="#" onclick="return false">
                                        <h3 class="no-body-lg fw600">순환 (Circulation)</h3>

                                        <i class="fa-regular fa-angle-up i-24"></i>
                                    </a>
                                    <div class="content">
                                        <figure class="no-mg-16--b">
                                            <img src="/resource/images/cancer-heal4.jpg">
                                        </figure>

                                        <span class="no-body-md fw600 brown">림프순환</span>
                                        <p class="bullet no-body-md fw300">림프도수</p>
                                        <p class="bullet no-body-md fw300">침전기물리치료</p>

                                        <span class="no-body-md fw600 brown no-mg-16--t">혈액순환</span>
                                        <p class="bullet no-body-md fw300 no-pd-24--b ">침전기물리치료</p>
                                    </div>
                                </li>

                                <li class="updown-content">
                                    <a href="#" onclick="return false">
                                        <h3 class="no-body-lg fw600">저항성 (Resistibility)</h3>

                                        <i class="fa-regular fa-angle-up i-24"></i>
                                    </a>
                                    <div class="content v2">
                                        <div class="group">
                                            <span class="no-body-md fw600 no-mg-16--b">항산화 항노화</span>

                                            <div class="dept2">
                                                <div class="txt">
                                                    <h4 class="no-body-lg fw600">셀레늄 요법</h4>
                                                    <p class="no-body-xs fw300 no-mg-4--t">체내의 활성산소를 제거하고 항산화 작용을 활성화합니다. 비타민E의 2,000배에 달하는 효과로 암세포의 자연사멸을 유도합니다.</p>
                                                </div>

                                                <figure>
                                                    <img src="/resource/images/cancer-heal5-1.png">
                                                </figure>
                                            </div>

                                            <div class="dept2">
                                                <div class="txt">
                                                    <h4 class="no-body-lg fw600">글루타치온</h4>
                                                    <p class="no-body-xs fw300 no-mg-4--t">영양제가 몸속에서 효과적으로 작용하도록 돕습니다. 항암제로 인한 신경성 통증 감소에 효과가 있으며 중금속, 방사선 등의 해독작용을 합니다.</p>
                                                </div>

                                                <figure>
                                                    <img src="/resource/images/cancer-heal5-2.png">
                                                </figure>
                                            </div>

                                            <div class="dept2">
                                                <div class="txt">
                                                    <h4 class="no-body-lg fw600">고농도 비타민 요법</h4>
                                                    <p class="no-body-xs fw300 no-mg-4--t">단백질 대사에 필요한 수용성 비타민입니다. 메스꺼움을 줄여주고 항노화 핵산의 합성을 촉진하며 근육경련, 말초신경 염증을 완화시킵니다.</p>
                                                </div>

                                                <figure>
                                                    <img src="/resource/images/cancer-heal5-3.png">
                                                </figure>
                                            </div>

                                            <div class="dept2">
                                                <div class="txt">
                                                    <h4 class="no-body-lg fw600">태반추출물</h4>
                                                    <p class="no-body-xs fw300 no-mg-4--t">간 기능 개선을 돕고 피로 회복과 면역 활성에 효과적인 생리활성 성분입니다.</p>
                                                </div>

                                                <figure>
                                                    <img src="/resource/images/cancer-heal5-4.png">
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </section>

                        <section class="no-cancer-graph no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-24--b">
                                    <p class="no-body-lg fw300">암 수술 후, 생존율 54%</p>
                                    <h2 class="no-heading-sl">한방+항암 병행치료</h2>
                                </hgroup>

                                <figure class="no-mg-32--t fade-up">
                                    <p class="no-body-md fw300 --tac no-pd-24--b">말기위암환자 수술 후 한약치료</p>

                                    <img src="/resource/images/cancer-graph.jpg" class="no-mg-32--t">

                                    <span class="source no-body-sm fw300 --tac no-mg-32--t">※ 한약의 안정성 및 효과가 입증된 자료입니다.</span>
                                    <span class="source source-info no-mg-4--t --tac">참고논문 Rao. X.Q. et al, (1994), The long-term effects of shen xue tang comblned
                                        with chemotherapy on mid-and late-stage stomach cancer. CJITWM, 14(6), 366.</span>
                                </figure>
                            </div>
                        </section>

                        <section class="no-cancer-sub-ba no-pd-48--t no-pd-32--b">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-32--b">
                                    <h2 class="no-heading-sm">수술은 시작일 뿐입니다.</h2>
                                    <p class="no-body-lg fw300 no-mg8--t">지속적인 추적 관찰과<br>
                                        면역 관리가 핵심입니다.</p>
                                </hgroup>

                                <ul class="ba-list list-js">
                                    <li class="--tac">
                                        <h4 class="no-body-xxl fw600">항암<br>
                                            <span>치료 전</span> 준비
                                        </h4>
                                        <img src="/resource/images/icon/cancer-before-icon.svg" class="no-mg-24--y">

                                        <p class="no-body-md fw600 no-mg-4--b">체력 관리</p>
                                        <p class="no-body-md fw600">면역력 강화</p>
                                    </li>

                                    <li class="--tac">
                                        <h4 class="no-body-xxl fw600">항암<br>
                                            <span>치료 중</span> 케어
                                        </h4>
                                        <img src="/resource/images/icon/cancer-after-icon.svg" class="no-mg-24--y">

                                        <p class="no-body-md fw600 no-mg-4--b">구토·피로 완화</p>
                                        <p class="no-body-md fw600 no-mg-4--b">식욕 저하 개선</p>
                                        <p class="no-body-md fw600">구내염 개선</p>
                                    </li>
                                </ul>
                            </div>
                        </section>

                        <section class="no-cancer-sub-end no-pd-48--b">
                            <div class="no-container-sm">
                                <strong class="no-body-xxl fw600 --tac fade-up">
                                    암 치료의 시작부터 회복까지,<br> 우리가 늘 곁에 있겠습니다.
                                </strong>

                                <ul class="symbol no-mg-24--t fade-up blur-js">
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>

                                <div class="speech no-mg-32--y fade-up --tac">
                                    <h3 class="no-body-lg fw600">항암 부작용, <b>견딜 수밖에 없나요?</b></h3>
                                </div>

                                <hgroup class="--tac fade-up">
                                    <h2 class="no-heading-sm">아닙니다!</h2>
                                    <p class="no-body-lg fw600">어떤 케어가 있는지 확인해보세요.</p>
                                </hgroup>

                                <a href="/gangseo/pages/cancer/digest-2.php" class="basic-btn cancer no-body-lg fw600 no-mg-32--t">
                                    항암방사선 이어서 보기

                                    <i class="fa-regular fa-arrow-right i-24"></i>
                                </a>
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