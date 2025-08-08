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

                        <section class="no-cancer-sub-relapse no-pd-48--y">

                            <div class="no-container-sm">

                                <hgroup class="--tac fade-up no-mg-24--b">

                                    <h2 class="no-heading-sl">암 치료 후,<br> 마음 한켠이 불안하신가요?</h2>

                                </hgroup>



                                <div class="speech-wrap">

                                    <img src="/resource/images/relapse-speech1.png" <?= $aos_right_slow ?>>

                                    <img src="/resource/images/relapse-speech2.png" <?= $aos_left_slow ?>>

                                </div>



                                <div class="relapse-graph no-mg-48--t">

                                    <h3 class="no-body-xxl fw600 --tac fade-up">암 종류와 기수별 <b class="brown">재발률</b></h3>



                                    <ul class="no-mg-16--t fade-up">

                                        <li>

                                            <img src="/resource/images/cancer-graph6.jpg">

                                        </li>



                                        <li>

                                            <img src="/resource/images/cancer-graph7.jpg">

                                        </li>

                                    </ul>

                                </div>



                                <div class="relapse-percent no-mg-48--t">

                                    <h3 class="no-body-xxl fw600 --tac fade-up">대장암 재발률</h3>



                                    <ul class="no-mg-16--t fade-up v2">

                                        <li class="--tac">

                                            <p class="no-body-sm fw600 no-mg-4--b">최대</p>

                                            <div class="f-wrap brown"><b class="counter no-heading-lg" data-count="40"></b><span class="no-body-lg fw600">%</span></div>

                                            <h4 class="no-body-sm fw300 no-mg-8--t">3기 환자</h4>

                                        </li>

                                    </ul>

                                </div>



                                <div class="relapse-percent no-mg-48--t">

                                    <h3 class="no-body-xxl fw600 --tac fade-up">위암 재발률</h3>



                                    <ul class="no-mg-16--t fade-up">

                                        <li class="--tac">

                                            <p class="no-body-sm fw600 no-mg-4--b">최대</p>

                                            <div class="f-wrap brown"><b class="counter no-heading-lg" data-count="30"></b><span class="no-body-lg fw600">%</span></div>

                                            <h4 class="no-body-sm fw300 no-mg-8--t">2기 환자</h4>

                                        </li>



                                        <li class="--tac">

                                            <p class="no-body-sm fw600 no-mg-4--b">최대</p>

                                            <div class="f-wrap brown"><b class="counter no-heading-lg" data-count="60"></b><span class="no-body-lg fw600">%</span></div>

                                            <h4 class="no-body-sm fw300 no-mg-8--t">3기 환자</h4>

                                        </li>

                                    </ul>

                                </div>

                            </div>

                        </section>



                        <section class="no-cancer-graph no-pd-48--y">

                            <div class="no-container-sm">

                                <hgroup class="--tac fade-up">

                                    <h2 class="no-heading-sm">‘완치' 할 수 있을까?</h2>

                                    <p class="no-body-lg fw300">통상적으로 암은 5년간 재발이나 전이가 없으면<br> 완치 가능성이 높다고 봅니다.</p>

                                </hgroup>



                                <figure class="no-mg-32--t fade-up">

                                    <img src="/resource/images/cancer-heal8.jpg">



                                    <h3 class="--tac no-body-lg fw300 no-mg-32--t"><b class="brown fw600">정기적인 예방 검사</b>를 통해<br>

                                        재발 여부를 체크하세요</h3>

                                </figure>

                            </div>

                        </section>



                        <section class="no-cancer-sub-test no-pd-48--y">

                            <div class="no-container-sm">

                                <hgroup class="--tac fade-up">

                                    <h2 class="no-heading-sm">미세 잔존암</h2>

                                    <p class="no-body-lg fw300 no-mg-16--t">전이·재발·2차 암의 가장 큰 위험인자,<br> 바로 <b class="fw600 brown">‘숨어 있는 암세포’</b>입니다.<br> 10mm 이하의 미세 잔존암은<br> <b class="fw600 brown">MRI나 CT로도 발견되지 않습니다.</b></p>

                                </hgroup>



                                <ul class="cancer-size-list list-js no-mg-32--y">

                                    <li>

                                        <img src="/resource/images/cancer-size1.png">



                                        <div class="txt">

                                            <h3 class="no-body-xxl fw600">2mm ↓</h3>

                                            <p class="no-body-md fw300">혈관 형성이 되지 않아<br>

                                                <b class="fw600">전이가 불가능한 크기</b>

                                            </p>

                                        </div>

                                    </li>



                                    <li>

                                        <img src="/resource/images/cancer-size2.png">



                                        <div class="txt">

                                            <h3 class="no-body-xxl fw600">2mm ↑</h3>

                                            <p class="no-body-md fw300">혈관 형성이 시작되어<br>

                                                <b class="fw600">전이가 가능한 크기</b>

                                            </p>

                                        </div>

                                    </li>



                                    <li>

                                        <img src="/resource/images/cancer-size3.png">



                                        <div class="txt">

                                            <h3 class="no-body-xxl fw600">5mm ↑</h3>

                                            <p class="no-body-md fw300">PET-CT로<br>

                                                <b class="fw600">발견 가능</b>한 크기

                                            </p>

                                        </div>

                                    </li>



                                    <li>

                                        <img src="/resource/images/cancer-size4.png">



                                        <div class="txt">

                                            <h3 class="no-body-xxl fw600">10mm ↑</h3>

                                            <p class="no-body-md fw300">CT나 MRI에서<br>

                                                <b class="fw600">발견 가능</b>한 크기

                                            </p>

                                        </div>

                                    </li>

                                </ul>



                                <strong class="no-heading-sm fade-up --tac">면력에서 꼼꼼하게<br>

                                    진단해드려요.</strong>



                                <ul class="cancer-test-list no-mg-32--t fade-up">

                                    <li class="mini-modal">

                                        <a href="#" onclick="return false">

                                            <div class="f-wrap">

                                                <h3 class="no-body-lg fw600">종양표지자<br>

                                                    검사</h3>

                                                <i class="fa-regular fa-angle-up fa-rotate-90 i-24"></i>

                                            </div>



                                            <img src="/resource/images/icon/cancer-test-icon1.svg">

                                        </a>



                                        <div class="mini-modal-wrap">

                                            <div class="modal-slider">

                                                <ul class="swiper-wrapper">

                                                    <li class="swiper-slide">

                                                        <img src="/resource/images/card/cancer-card16-1.jpg">

                                                    </li>



                                                    <li class="swiper-slide">

                                                        <img src="/resource/images/card/cancer-card16-2.jpg">

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

                                            <div class="f-wrap">

                                                <h3 class="no-body-lg fw600">NK세포<br>

                                                    활성화 검사</h3>

                                                <i class="fa-regular fa-angle-up fa-rotate-90 i-24"></i>

                                            </div>



                                            <img src="/resource/images/icon/cancer-test-icon2.svg">

                                        </a>



                                        <div class="mini-modal-wrap">

                                            <div class="modal-slider">

                                                <ul class="swiper-wrapper">

                                                    <li class="swiper-slide">

                                                        <img src="/resource/images/card/cancer-card17-1.jpg">

                                                    </li>



                                                    <li class="swiper-slide">

                                                        <img src="/resource/images/card/cancer-card17-2.jpg">

                                                    </li>



                                                    <li class="swiper-slide">

                                                        <img src="/resource/images/card/cancer-card17-3.jpg">

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

                                            <div class="f-wrap">

                                                <h3 class="no-body-lg fw600">암유전자<br>

                                                    검사</h3>

                                                <i class="fa-regular fa-angle-up fa-rotate-90 i-24"></i>

                                            </div>



                                            <img src="/resource/images/icon/cancer-test-icon3.svg">

                                        </a>



                                        <div class="mini-modal-wrap">

                                            <div class="modal-slider">

                                                <ul class="swiper-wrapper">

                                                    <li class="swiper-slide">

                                                        <img src="/resource/images/card/cancer-card18-1.jpg">

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

                                            <div class="f-wrap">

                                                <h3 class="no-body-lg fw600">활성산소<br>

                                                    &항산화검사</h3>

                                                <i class="fa-regular fa-angle-up fa-rotate-90 i-24"></i>

                                            </div>



                                            <img src="/resource/images/icon/cancer-test-icon4.svg">

                                        </a>



                                        <div class="mini-modal-wrap">

                                            <div class="modal-slider">

                                                <ul class="swiper-wrapper">

                                                    <li class="swiper-slide">

                                                        <img src="/resource/images/card/cancer-card19-1.jpg">

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

                                            <div class="f-wrap">

                                                <h3 class="no-body-lg fw600">모발미네랄<br>

                                                    &중금속검사</h3>

                                                <i class="fa-regular fa-angle-up fa-rotate-90 i-24"></i>

                                            </div>



                                            <img src="/resource/images/icon/cancer-test-icon5.svg">

                                        </a>



                                        <div class="mini-modal-wrap">

                                            <div class="modal-slider">

                                                <ul class="swiper-wrapper">

                                                    <li class="swiper-slide">

                                                        <img src="/resource/images/card/cancer-card20-1.jpg">

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

                                            <div class="f-wrap">

                                                <h3 class="no-body-lg fw600">90음식<br>

                                                    알러지검사 </h3>

                                                <i class="fa-regular fa-angle-up fa-rotate-90 i-24"></i>

                                            </div>



                                            <img src="/resource/images/icon/cancer-test-icon6.svg">

                                        </a>



                                        <div class="mini-modal-wrap">

                                            <div class="modal-slider">

                                                <ul class="swiper-wrapper">

                                                    <li class="swiper-slide">

                                                        <img src="/resource/images/card/cancer-card21-1.jpg">

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



                        <section class="no-cancer-sub-danger no-pd-48--y">

                            <div class="no-container-sm">

                                <hgroup class="--tac fade-up">

                                    <h2 class="no-heading-sm">그러면 5년 지나면<br>

                                        관리 안 해도 되나요?</h2>

                                </hgroup>



                                <div class="speech-brown no-body-xxl fw600 no-mg-32--y --tac fade-up">

                                    꼭 그렇진 않습니다!

                                </div>



                                <strong class="no-body-md fw600 --tac fade-up">암의 종류에 따라 <b class="brown">5년 이후에도 재발</b>하거나,<br>

                                    <b class="brown">2차 암(새로운 암)이 발생</b>할 수도 있습니다.</strong>



                                <strong class="no-body-md fw600 --tac no-mg-16--t fade-up">의료진이 권하는 경우<br>

                                    <b class="brown">정기 검진은 계속 필요</b>합니다.</strong>



                                <ul class="danger-list no-mg-32--t">

                                    <li class="--tac fade-up">

                                        <p class="no-body-md fw300">동일 연령/성별대 일반인과 비교,</p>

                                        <h3 class="no-body-xxl fw600">암(2차)발생 확률<br> <b class="brown">30~60%이상 높음</b>

                                        </h3>

                                    </li>



                                    <li class="--tac fade-up">

                                        <p class="no-body-md fw600">저하된 면역력으로 인한</p>

                                        <h3 class="no-body-xxl fw600"><b class="brown">급속 진행</b></h3>

                                    </li>



                                    <li class="--tac fade-up">

                                        <p class="no-body-md fw300">전이 및 재발된 암</p>

                                        <h3 class="no-body-xxl fw600"><b class="brown">빠른 악화</b>로<br> 치료가 더욱 어려움

                                        </h3>

                                    </li>

                                </ul>

                            </div>

                        </section>



                        <section class=" no-cancer-sub-heal v2">

                            <div class="no-container-sm">

                                <hgroup class="--tac fade-up no-mg-32--b">

                                    <h2 class="no-heading-sm">그래서<br>

                                        어떻게 치료하나요?</h2>

                                </hgroup>



                                <img src="/resource/images/cancer-heal-v2.svg" class="schematic fade-up">

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

                                                    <img src="/resource/images/cancer-heal6-2-w-v2.jpg">

                                                </li>

                                            </ul>

                                        </div>



                                        <div class="group">

                                            <span class="no-body-md fw600">위절제 치료식이</span>



                                            <img src="/resource/images/cancer-heal7-2.png" class="no-mg-16--t">

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



                                                <figure>

                                                    <img src="/resource/images/cancer-heal1-1.png">

                                                </figure>

                                            </div>



                                            <div class="dept2">

                                                <div class="txt">

                                                    <h4 class="no-body-lg fw600">미슬토 요법</h4>

                                                    <p class="no-body-xs fw300 no-mg-4--t">암세포의 증식을 억제시켜 사멸에 도움, 항암물질 및 면역기능을 증가시키는 물 함유되어 있습니다.</p>

                                                </div>



                                                <figure>

                                                    <img src="/resource/images/cancer-heal1-2.png">

                                                </figure>

                                            </div>



                                            <div class="dept2">

                                                <div class="txt">

                                                    <h4 class="no-body-lg fw600">이뮤노시아닌</h4>

                                                    <p class="no-body-xs fw300 no-mg-4--t">NK세포 활성과 면역 반응을 조절하여 항암 치료를 보조합니다.</p>

                                                </div>



                                                <figure>

                                                    <img src="/resource/images/cancer-heal1-3.png">

                                                </figure>

                                            </div>



                                            <div class="dept2">

                                                <div class="txt">

                                                    <h4 class="no-body-lg fw600">NK세포치료제</h4>

                                                    <p class="no-body-xs fw300 no-mg-4--t">몸속 면역세포를 배양시킨 살해 세포로써 암세포만을 선택적으로 공격합니다. 환자 본인에게만 투여할 수 있는 항암제로, 수술 이후의 미세 암 제거에도 도움을 줍니다.</p>

                                                </div>



                                                <figure>

                                                    <img src="/resource/images/cancer-heal1-4.png">

                                                </figure>

                                            </div>



                                            <div class="dept2">

                                                <div class="txt">

                                                    <h4 class="no-body-lg fw600">항암면역증강제</h4>

                                                    <p class="no-body-xs fw300 no-mg-4--t">면역세포 활성화를 통해 항암 효과를 보조하고 재발 위험을 낮춥니다.</p>

                                                </div>



                                                <figure>

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



                                                <figure>

                                                    <img src="/resource/images/cancer-heal2-1.png">

                                                </figure>

                                            </div>



                                            <div class="dept2">

                                                <div class="txt">

                                                    <h4 class="no-body-lg fw600">면역플러스</h4>

                                                    <p class="no-body-xs fw300 no-mg-4--t">황기 부정단 처방으로 종양 면역 세포의 활성화를 돕습니다. 면역기능 증강, 골수기능 개선 및 종양의 증식을 억제합니다.</p>

                                                </div>



                                                <figure>

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



                                                <figure class="white">

                                                    <img src="/resource/images/cancer-heal5-1.png">

                                                </figure>

                                            </div>



                                            <div class="dept2">

                                                <div class="txt">

                                                    <h4 class="no-body-lg fw600">글루타치온</h4>

                                                    <p class="no-body-xs fw300 no-mg-4--t">영양제가 몸속에서 효과적으로 작용하도록 돕습니다. 항암제로 인한 신경성 통증 감소에 효과가 있으며 중금속, 방사선 등의 해독작용을 합니다.</p>

                                                </div>



                                                <figure class="white">

                                                    <img src="/resource/images/cancer-heal5-2.png">

                                                </figure>

                                            </div>



                                            <div class="dept2">

                                                <div class="txt">

                                                    <h4 class="no-body-lg fw600">고농도 비타민 요법</h4>

                                                    <p class="no-body-xs fw300 no-mg-4--t">단백질 대사에 필요한 수용성 비타민입니다. 메스꺼움을 줄여주고 항노화 핵산의 합성을 촉진하며 근육경련, 말초신경 염증을 완화시킵니다.</p>

                                                </div>



                                                <figure class="white">

                                                    <img src="/resource/images/cancer-heal5-3.png">

                                                </figure>

                                            </div>



                                            <div class="dept2">

                                                <div class="txt">

                                                    <h4 class="no-body-lg fw600">태반추출물</h4>

                                                    <p class="no-body-xs fw300 no-mg-4--t">간 기능 개선을 돕고 피로 회복과 면역 활성에 효과적인 생리활성 성분입니다.</p>

                                                </div>



                                                <figure class="white">

                                                    <img src="/resource/images/cancer-heal5-4.png">

                                                </figure>

                                            </div>

                                        </div>

                                    </div>

                                </li>

                            </ul>

                        </section>



                        <section class="no-cancer-sub-essential no-pd-80--y">

                            <div class="no-container-sm">

                                <h2 class="no-heading-sl --tac fade-up">겨울을 건너면,<br>

                                    봄은 반드시 옵니다.</h2>



                                <div class="focus no-pd-64--t fade-up">

                                    <img src="/resource/images/icon/quotes-open.svg">

                                    <strong class="font-kr blur-js no-body-xxl fw300 --tac">

                                        <b>당신의 봄을 면력이<br> 함께 맞이하겠습니다.</b>

                                    </strong>

                                    <img src="/resource/images/icon/quotes-close.svg">

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