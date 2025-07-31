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

                    <div class="no-cancer-sub no-neuro-sub">
                        <section class="no-cancer-sub-intro no-cancer-intro no-neuro-sub-intro no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-24--b">
                                    <h2 class="no-heading-sm">대상포진</h2>
                                    <p class="no-body-lg fw300 no-mg-8--t">당장 통증이랑 수포가 심한데<br>
                                        대체 어느 병원으로 가야 할까요?</p>
                                </hgroup>

                                <ul class="think-list list-js neuro">
                                    <li class="--tac">
                                        <h3 class="no-body-lg fw600">분명 처방받은 약을 먹고 있는데...<br>
                                            왜 통증은 여전하고<br>
                                            수포는 가라앉지 않는 걸까요?</h3>
                                    </li>

                                    <li class="--tac">
                                        <h3 class="no-body-lg fw600">밤마다 찌릿하고 타는 듯한 통증 때문에<br>
                                            잠을 이루기 힘들어요.<br>
                                            더 심각해지는 건 아닐까 불안합니다.</h3>
                                    </li>

                                    <li class="--tac">
                                        <h3 class="no-body-lg fw600">다른 병원에서 치료를 받았는데도<br>
                                            차도가 없어서 답답해요.<br>
                                            혹시 다른 치료 방법은 없을까요?</h3>
                                    </li>
                                </ul>
                            </div>
                        </section>

                        <section class="no-neuro-sub-time no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-32--b">
                                    <p class="no-body-lg fw300">대상포진 초기 집중치료에서<br> 가장 중요한 것은</p>
                                    <h2 class="no-heading-sm">72시간 골든타임 입니다.</h2>
                                </hgroup>

                                <ul class="ba-list grid-col-2 no-gap-8 list-js">
                                    <li class="--tac">
                                        <img src="/resource/images/neuro-before.jpg" class="no-radius-sm">
                                    </li>

                                    <li class="--tac">
                                        <img src="/resource/images/neuro-after.jpg" class="no-radius-sm">
                                    </li>
                                </ul>

                                <div class="speech-wrap no-mg-32--t">
                                    <img src="/resource/images/neuro-time-speech1.png" <?= $aos_right_slow ?>>
                                    <img src="/resource/images/neuro-time-speech2.png" <?= $aos_left_slow ?>>
                                    <img src="/resource/images/neuro-time-speech3.png" <?= $aos_left_slow ?>>
                                    <img src="/resource/images/neuro-time-speech4.png" <?= $aos_right_slow ?>>
                                    <img src="/resource/images/neuro-time-speech5.png" <?= $aos_left_slow ?>>
                                    <img src="/resource/images/neuro-time-speech6.png" <?= $aos_left_slow ?>>
                                </div>
                            </div>
                        </section>

                        <section class="no-neuro-heal no-neuro-sub-promise no-pd-48--t">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-32--b">
                                    <p class="no-body-lg fw300">면력 신경면역센터의</p>
                                    <h2 class="no-heading-sm">치료 약속</h2>
                                </hgroup>

                                <div class="promise-wrap">
                                    <h3 class="fade-up no-body-xxl fw600 --tac">저희는 72시간 골든타임 내</h3>

                                    <ul class="promise-list no-mg-16--y fade-up">
                                        <li>
                                            <i class="fa-regular fa-check i-24"></i>
                                            <p class="no-body-md fw600">신경치료</p>
                                        </li>

                                        <li>
                                            <i class="fa-regular fa-check i-24"></i>
                                            <p class="no-body-md fw600">맞춤 통증관리</p>
                                        </li>

                                        <li>
                                            <i class="fa-regular fa-check i-24"></i>
                                            <p class="no-body-md fw600">항바이러스 주사</p>
                                        </li>

                                        <li>
                                            <i class="fa-regular fa-check i-24"></i>
                                            <p class="no-body-md fw600">신속한 진단</p>
                                        </li>
                                    </ul>

                                    <strong class="fade-up no-body-lg fw300 --tac">차별화된 집중치료로 빠른 통증 완화와<br>
                                        후유증 예방을 목표로 합니다.</strong>
                                </div>

                                <ul class="ba-list grid-col-2 no-gap-8 list-js no-mg-32--t">
                                    <li class="--tac">
                                        <img src="/resource/images/neuro-before-2.jpg" class="no-radius-sm">
                                    </li>

                                    <li class="--tac">
                                        <img src="/resource/images/neuro-after-2.jpg" class="no-radius-sm">
                                    </li>
                                </ul>

                                <div class="program fade-up">
                                    <h3 class="no-heading-sm --tac no-mg-32--y">대상포진 초기<br>
                                        집중치료 프로그램</h3>

                                    <img src="/resource/images/neuro-program.svg">
                                </div>
                            </div>

                            <ul class="heal-list neuro no-mg-32--t">
                                <li class="updown-content">
                                    <a href="#" onclick="return false">
                                        <h3 class="no-body-lg fw600">대상포진 검진</h3>

                                        <i class="fa-regular fa-angle-up i-24"></i>
                                    </a>
                                    <div class="content">
                                        <figure>
                                            <img src="/resource/images/neuro-heal1.jpg">
                                        </figure>

                                        <p class="no-body-md fw300 no-mg-16--t bullet">수두-대상포진 바이러스 혈액검사<br></p>
                                        <span class="no-body-xs fw300" style="padding-left: 1.2rem; line-height: 1;">(항원 항체 DNA PCR검사)</span>
                                        <p class="no-body-md fw300 no-mg-16--t bullet">자율신경 검사</p>
                                    </div>
                                </li>

                                <li class="updown-content">
                                    <a href="#" onclick="return false">
                                        <h3 class="no-body-lg fw600">항바이러스/신경염 수액</h3>

                                        <i class="fa-regular fa-angle-up i-24"></i>
                                    </a>
                                    <div class="content">
                                        <figure>
                                            <img src="/resource/images/neuro-heal1-2.jpg">
                                        </figure>

                                        <p class="no-body-md fw300 no-mg-16--t">대상포진의 직접적인 원인이 되는 항염증 작용, 신경재생 촉진 수액치료</p>
                                    </div>
                                </li>

                                <li class="updown-content">
                                    <a href="#" onclick="return false">
                                        <h3 class="no-body-lg fw600">통증조절 및 수포관리</h3>

                                        <i class="fa-regular fa-angle-up i-24"></i>
                                    </a>
                                    <div class="content">
                                        <figure>
                                            <img src="/resource/images/neuro-heal1-3.jpg">
                                        </figure>

                                        <p class="no-body-md fw300 no-mg-16--t">세균감염 및 흉터가 생기지 않도록 치료하고 통증 부위와 증상에 따라 진통제 및 국소마취제가 도포된 패치 등을 사용, 즉각적인 통증 경감</p>
                                    </div>
                                </li>

                                <li class="updown-content">
                                    <a href="#" onclick="return false">
                                        <h3 class="no-body-lg fw600">무통증 신호요법</h3>

                                        <i class="fa-regular fa-angle-up i-24"></i>
                                    </a>
                                    <div class="content">
                                        <figure>
                                            <img src="/resource/images/neuro-heal1-4.jpg">
                                        </figure>

                                        <p class="no-body-md fw300 no-mg-16--t">비침습적 방법으로 신경 신호를 교란시켜 통증 감소 약물 사용 없이 통증 관리 가능</p>
                                    </div>
                                </li>

                                <li class="updown-content">
                                    <a href="#" onclick="return false">
                                        <h3 class="no-body-lg fw600">신경회복 도수치료</h3>

                                        <i class="fa-regular fa-angle-up i-24"></i>
                                    </a>
                                    <div class="content">
                                        <figure>
                                            <img src="/resource/images/neuro-heal1-5.jpg">
                                        </figure>

                                        <p class="no-body-md fw300 no-mg-16--t">손상된 부위의 혈액 순환을 촉진하여 염증 물질 배출과 통증 감소에 도움을 줍니다.</p>
                                    </div>
                                </li>

                                <li class="updown-content">
                                    <a href="#" onclick="return false">
                                        <h3 class="no-body-lg fw600">신경회복 주사요법</h3>

                                        <i class="fa-regular fa-angle-up i-24"></i>
                                    </a>
                                    <div class="content">
                                        <figure>
                                            <img src="/resource/images/neuro-heal1-6.jpg">
                                        </figure>

                                        <p class="no-body-md fw300 bullet no-mg-16--t">수포가 발생한 신경분절에 직접 약물을 투여하여 염증 감소</p>
                                    </div>
                                </li>

                                <li class="updown-content">
                                    <a href="#" onclick="return false">
                                        <h3 class="no-body-lg fw600">면역플러스/개인맞춤한약</h3>

                                        <i class="fa-regular fa-angle-up i-24"></i>
                                    </a>
                                    <div class="content">
                                        <figure>
                                            <img src="/resource/images/neuro-heal1-7.jpg">
                                        </figure>

                                        <p class="no-body-md fw300 no-mg-16--t bullet">노루 궁뎅이 버섯을 주 성분으로 NK세포, T세포를 활성화</p>
                                        <p class="no-body-md fw300 bullet">체질별 개인 맞춤 처방</p>
                                    </div>
                                </li>

                                <li class="updown-content">
                                    <a href="#" onclick="return false">
                                        <h3 class="no-body-lg fw600">고압산소챔버</h3>

                                        <i class="fa-regular fa-angle-up i-24"></i>
                                    </a>
                                    <div class="content">
                                        <figure>
                                            <img src="/resource/images/neuro-heal1-8.jpg">
                                        </figure>

                                        <p class="no-body-md fw300 no-mg-16--t">고농도 산소를 공급하여 수포 치유와 신경 재생을 촉진하고 회복 속도를 높입니다.</p>
                                    </div>
                                </li>
                            </ul>
                        </section>

                        <section class="no-cancer-video no-main-video neuro no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-32--b">
                                    <h2 class="no-heading-sl">수많은 환자분들이 우리와 함께했습니다.</h2>
                                </hgroup>
                            </div>

                            <div class="basic-slider" <?= $aos_left_slow ?>>
                                <ul class="swiper-wrapper video-list">
                                    <li class="swiper-slide">
                                        <a href="https://www.youtube.com/watch?v=4GcbFIm2_P8&t=16s" target="_blank">
                                            <figure>
                                                <img src="/resource/images/video2.jpg">
                                            </figure>

                                            <div class="f-wrap no-mg-16--t">
                                                <h3 class="no-heading-sm no-mg-8--b">벌레 물린 줄 알았더니?
                                                    대상포진!</h3>
                                                <i class=" fa-regular fa-arrow-right i-30"></i>
                                            </div>
                                            <div class="txt no-mg-8--t">
                                                <span class="no-body-lg fw300">42세 윤만식님</span>
                                                <p class="no-mg-8--t no-body-md fw300">벌레 물린 줄 알았던 대상포진을 면력한방병원에서 집중 치료받았습니다.
                                                    영양 가득한 식사와 침, 수액, 도수치료 등 토탈케어로 많이 좋아져 세심한 배려에 감사드립니다.</p>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="swiper-slide">
                                        <a href="https://www.youtube.com/watch?v=Gq7qBAFwIFY" target="_blank">
                                            <figure>
                                                <img src="/resource/images/neuro-video1.jpg">
                                            </figure>

                                            <div class="f-wrap no-mg-16--t">
                                                <h3 class="no-heading-sm no-mg-8--b">대상포진으로 병원 12곳을
                                                    다녔습니다.</h3>
                                                <i class=" fa-regular fa-arrow-right i-30"></i>
                                            </div>
                                            <div class="txt no-mg-8--t">
                                                <span class="no-body-lg fw300">64세 류동선님</span>
                                                <p class="no-mg-8--t no-body-md fw300">2년간 치료해도 낫지 않던 대상포진 신경통이 면력한방병원에 입원하여 다양한 치료로 크게 호전되었습니다.
                                                    통증과 가려움뿐 아니라 위장, 어깨도 좋아져 감사드립니다.</p>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="swiper-slide">
                                        <a href="https://www.youtube.com/watch?v=Gq7qBAFwIFY" target="_blank">
                                            <figure>
                                                <img src="/resource/images/neuro-video2.jpg">
                                            </figure>

                                            <div class="f-wrap no-mg-16--t">
                                                <h3 class="no-heading-sm no-mg-8--b">집중 치료로 굉장히 많이 좋아졌어요.</h3>
                                                <i class=" fa-regular fa-arrow-right i-30"></i>
                                            </div>
                                            <div class="txt no-mg-8--t">
                                                <span class="no-body-lg fw300">49세 김미영님</span>
                                                <p class="no-mg-8--t no-body-md fw300">극심한 대상포진 통증과 수포로 고통받았으나, 면력한방병원의 다양한 집중 치료로 통증이 크게 줄고 수포도 호전되었습니다. 세심한 케어에 감사드립니다.</p>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="swiper-slide">
                                        <a href="https://www.youtube.com/watch?v=Gq7qBAFwIFY" target="_blank">
                                            <figure>
                                                <img src="/resource/images/neuro-video3.jpg">
                                            </figure>

                                            <div class="f-wrap no-mg-16--t">
                                                <h3 class="no-heading-sm no-mg-8--b">60대 대상포진 신경통,
                                                    이걸로 완치했어요!</h3>
                                                <i class=" fa-regular fa-arrow-right i-30"></i>
                                            </div>
                                            <div class="txt no-mg-8--t">
                                                <span class="no-body-lg fw300">60세 이진옥님
                                                </span>
                                                <p class="no-mg-8--t no-body-md fw300">심한 대상포진 통증이 타병원 약으론 해결되지 않았으나, 면력한방병원에서 집중 치료로 3~4일 만에 호전되어 빠르게 회복되었습니다. 진심으로 감사드립니다.</p>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="swiper-slide">
                                        <a href="https://www.youtube.com/watch?v=Gq7qBAFwIFY" target="_blank">
                                            <figure>
                                                <img src="/resource/images/neuro-video4.jpg">
                                            </figure>

                                            <div class="f-wrap no-mg-16--t">
                                                <h3 class="no-heading-sm no-mg-8--b">얼굴 대상포진, 면력한방병원에서 찾은 변화</h3>
                                                <i class=" fa-regular fa-arrow-right i-30"></i>
                                            </div>
                                            <div class="txt no-mg-8--t">
                                                <span class="no-body-lg fw300">30세 권도은님

                                                </span>
                                                <p class="no-mg-8--t no-body-md fw300">얼굴 대상포진으로 형태가 변할 정도로 붓고 수포가 생겨 힘들었습니다. 면력한방병원에서 치료를 받으며 매일 좋아지는 변화를 느꼈고, 정성 어린 케어로 빠르게 회복되어 감사합니다.</p>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="swiper-slide">
                                        <a href="https://www.youtube.com/watch?v=Gq7qBAFwIFY" target="_blank">
                                            <figure>
                                                <img src="/resource/images/neuro-video5.jpg">
                                            </figure>

                                            <div class="f-wrap no-mg-16--t">
                                                <h3 class="no-heading-sm no-mg-8--b">대상포진 신경통, 100% 완치로 면력에서 해결!</h3>
                                                <i class=" fa-regular fa-arrow-right i-30"></i>
                                            </div>
                                            <div class="txt no-mg-8--t">
                                                <span class="no-body-lg fw300">65세 우쓰(세례명)님</span>
                                                <p class="no-mg-8--t no-body-md fw300">견딜 수 없는 대상포진 통증이 여러 병원 치료에도 해결되지 않았으나, 면력한방병원의 침, 도수, 약침, 한약 치료로 99% 사라졌습니다. 면역 식사와 친절한 간호로 회복되어 감사합니다.</p>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="swiper-slide">
                                        <a href="https://www.youtube.com/watch?v=Gq7qBAFwIFY" target="_blank">
                                            <figure>
                                                <img src="/resource/images/neuro-video6.jpg">
                                            </figure>

                                            <div class="f-wrap no-mg-16--t">
                                                <h3 class="no-heading-sm no-mg-8--b">원인모를 통증으로 힘들었던 시간, 참 다행입니다</h3>
                                                <i class=" fa-regular fa-arrow-right i-30"></i>
                                            </div>
                                            <div class="txt no-mg-8--t">
                                                <span class="no-body-lg fw300">76세 박종건님</span>
                                                <p class="no-mg-8--t no-body-md fw300">통증으로 여러 병원에서 치료받아도 잠을 못 잤습니다. 면력한방병원에서 침, 도수 치료 등을 받은 후 통증이 크게 줄고 회복도 빨라 진심으로 감사드립니다.</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </section>

                        <section class="no-pd-64--y bg">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-24--b">
                                    <p class="no-body-lg fw300">2025년 면력한방병원 치료 환자 523명 중</p>
                                    <h2 class="no-heading-sl"><b class="blue">91.2%가 통증 감소<br>
                                            효과</b>를 경험했습니다.</h2>
                                </hgroup>

                                <div class="graph-wrap fade-up">
                                    <img src="/resource/images/neuro-graph.svg" class="no-mg-24--b">

                                    <p class="no-body-xs fw300 --tac gray">면력한방병원 2024년 연간 내부 조사 결과</p>
                                </div>

                                <div class="txt fade-up no-mg-32--t">
                                    <p class="no-body-lg fw300 --tac">치료 시작 2주 내 통증 지수가</p>
                                    <h3 class="no-heading-sl --tac"><b class="blue">평균 <b class="no-heading-xxl">65</b>%<br>
                                            감소</b>했습니다.</h3>
                                    <p class="no-body-xs fw300 --tac gray no-mg-16--t">VAS 통증 척도 측정, 2024년 환자 523명 대상</p>
                                </div>
                            </div>
                        </section>

                        <section class="no-cancer-process neuro no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up">
                                    <h2 class="no-heading-sl">대상포진, 증상 단계별<br>
                                        양방·한방 협진 치료</h2>
                                    <p class="no-body-lg fw300">소중한 일상을 되찾아드립니다.</p>
                                </hgroup>

                                <ul class="process-list v2 no-mg-32--t">
                                    <li class="fade-up">
                                        <div class="left">
                                            <i class="fa-sharp fa-regular fa-plus"></i>
                                            <div class="line"></div>
                                        </div>

                                        <div class="txt no-pd-24--b">
                                            <span class="no-body-md fw600 blue">발병초기</span>

                                            <h3 class="no-body-xxl fw600 no-mg-16--t">수포/발진/통증</h3>

                                            <figure class="no-mg-16--t">
                                                <img src="/resource/images/neuro-process1.jpg">
                                            </figure>

                                            <p class="no-body-sm fw300 no-mg-16--t">주요 증상 : 피부 발진, 수포 형성, 국소적 통증<br>
                                                치료 방법 : 항바이러스제와 양방·한방 치료 병행<br>
                                                치료 효과 : 빠른 바이러스 억제 및 초기 통증 완화<br>
                                                권장 사항 : 발진 발견 즉시 내원하여 72시간 이내 치료 </p>
                                        </div>
                                    </li>

                                    <li class="fade-up">
                                        <div class="left">
                                            <i class="fa-sharp fa-regular fa-plus"></i>
                                            <div class="line"></div>
                                        </div>

                                        <div class="txt no-pd-24--b">
                                            <div class="group">
                                                <span class="no-body-md fw600 blue">발병 1-2주</span>
                                            </div>

                                            <h3 class="no-body-xxl fw600 no-mg-16--t">극심한 통증/수포 가피</h3>

                                            <figure class="no-mg-16--t">
                                                <img src="/resource/images/neuro-process1-2.jpg">
                                            </figure>

                                            <p class="no-body-sm fw300 no-mg-16--t">주요 증상 : 통증 심화, 수포 가피화<br>
                                                치료 방법 : 무통증 신호요법, 신경회복 주사요법 집중 치료<br>
                                                치료 효과 : 극심한 통증 조절 및 염증 감소<br>
                                                권장 사항 : 충분한 휴식과 집중 치료로 신경 손상 최소화</p>
                                        </div>
                                    </li>

                                    <li class="fade-up">
                                        <div class="left">
                                            <i class="fa-sharp fa-regular fa-plus"></i>
                                            <div class="line"></div>
                                        </div>

                                        <div class="txt no-pd-24--b">
                                            <span class="no-body-md fw600 blue">발병 2-4주</span>

                                            <h3 class="no-body-xxl fw600 no-mg-16--t">신경 침범/감각 과부하</h3>

                                            <figure class="no-mg-16--t">
                                                <img src="/resource/images/neuro-process1-3.jpg">
                                            </figure>

                                            <p class="no-body-sm fw300 no-mg-16--t">주요 증상 : 신경 손상으로 인한 감각 이상, 지속적 통증<br>
                                                치료 방법 : 신경 회복을 위한 맞춤 처방 및 양방·한방 치료<br>
                                                치료 효과 : 빠른 바이러스 억제 및 초기 통증 완화<br>
                                                권장 사항 : 발진 발견 즉시 내원하여 72시간 이내 치료</p>
                                        </div>
                                    </li>

                                    <li class="fade-up">
                                        <div class="left">
                                            <i class="fa-sharp fa-regular fa-plus"></i>
                                            <div class="line"></div>
                                        </div>

                                        <div class="txt no-pd-24--b">
                                            <div class="group">
                                                <span class="no-body-md fw600 blue">발병 1개월 이후</span>
                                            </div>

                                            <h3 class="no-body-xxl fw600 no-mg-16--t">신경통/재발</h3>

                                            <figure class="no-mg-16--t">
                                                <img src="/resource/images/neuro-process1-4.jpg">
                                            </figure>

                                            <p class="no-body-sm fw300 no-mg-16--t">주요 증상 : 대상포진후신경통, 재발 위험 증가<br>
                                                치료 방법: 통합 신경재활 프로그램, 면역력 강화 집중 치료교정<br>
                                                치료 효과 : 만성 통증 관리 및 재발 방지<br>
                                                권장 사항 : 정기적인 면역력 관리와 지속적 관찰 필요</p>
                                        </div>
                                    </li>

                                    <li class="fade-up">
                                        <div class="left">
                                            <i class="fa-sharp fa-regular fa-plus"></i>
                                            <div class="line"></div>
                                        </div>

                                        <div class="txt">
                                            <span class="no-body-md fw600 blue">합병증</span>

                                            <h3 class="no-body-xxl fw600 no-mg-16--t">안면마비/일상생활 장애</h3>

                                            <figure class="no-mg-16--t">
                                                <img src="/resource/images/neuro-process1-5.jpg">
                                            </figure>

                                            <p class="no-body-sm fw300 no-mg-16--t">주요 증상 : 안면신경 마비, 일상생활 어려움<br>
                                                치료 방법 : 양방·한방 집중 후유증 치료<br>
                                                치료 효과 : 마비 증상 개선 및 일상생활 기능 회복<br>
                                                권장 사항 : 꾸준한 재활 치료 지속</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </section>

                        <section class="no-neuro-sub-special no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-32--b">
                                    <h2 class="no-heading-sl">면력한방병원<br>
                                        대상포진 치료의 특별함</h2>
                                </hgroup>

                                <ul class="special-list">
                                    <li class="no-radius-sm fade-up">
                                        <figure>
                                            <img src="/resource/images/neuro-special1.jpg">
                                        </figure>

                                        <div class="txt">
                                            <h3 class="blue no-body-xxl fw600">최적의 입원, 진료 환경</h3>
                                            <p class="no-mg-4--t no-body-lg fw300">편안하고 쾌적한 입원 시설과 스트레스 없는 치유 공간</p>
                                        </div>
                                    </li>

                                    <li class="no-radius-sm fade-up">
                                        <figure>
                                            <img src="/resource/images/neuro-special2.jpg">
                                        </figure>

                                        <div class="txt">
                                            <h3 class="blue no-body-xxl fw600">대상포진 맞춤 식단</h3>
                                            <p class="no-mg-4--t no-body-lg fw300">면역력 강화에 도움이 되는 영양 균형을 고려한 회복 식단 제공</p>
                                        </div>
                                    </li>

                                    <li class="no-radius-sm fade-up">
                                        <figure>
                                            <img src="/resource/images/neuro-special3.jpg">
                                        </figure>

                                        <div class="txt">
                                            <h3 class="blue no-body-xxl fw600">양방·한방 통합 치료</h3>
                                            <p class="no-mg-4--t no-body-lg fw300">한약, 약침, 신경회복 물리 치료 등 다양한 치료법의 시너지 효과</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </section>

                        <section class="no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-32--b">
                                    <h2 class="no-heading-sl">면력한방병원<br>
                                        대상포진 치료의 특별함</h2>
                                </hgroup>

                                <a href="https://www.youtube.com/watch?v=-R7D6sOehVQ" class="fade-up" target="_blank">
                                    <img src="/resource/images/neuro-story.jpg" class="no-radius-sm">
                                </a>
                            </div>
                        </section>

                        <section class="no-neuro-sub-faq no-pd-48--y bg">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-32--b">
                                    <h2 class="no-heading-sl">자주 묻는 질문</h2>
                                </hgroup>

                                <ul class="faq-list no-mg-64--t">
                                    <li>
                                        <div class="top">
                                            <h3 class="no-body-xl fw600">꼭 입원치료가 필요한가요?</h3>
                                            <div class="plus-icon">
                                                <i class="horizon"></i>
                                                <i class="vertical"></i>
                                            </div>
                                        </div>

                                        <div class="answer">
                                            <span class="blue no-body-lg fw600">답변</span>
                                            <p class="no-body-lg fw300 no-mg-4--t">
                                                대상포진 급성기에는 24시간 심한 통증을 동반하는 수포가 발생하여 가정에서 통증 조절이 어려우며, 접촉을 통한 전염이 가능하여 각별한 주의가 필요합니다.
                                            </p>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="top">
                                            <h3 class="no-body-xl fw600">얼마나 입원해야 되나요?</h3>
                                            <div class="plus-icon">
                                                <i class="horizon"></i>
                                                <i class="vertical"></i>
                                            </div>
                                        </div>

                                        <div class="answer">
                                            <span class="blue no-body-lg fw600">답변</span>
                                            <p class="no-body-lg fw300 no-mg-4--t">
                                                대상포진 급성기에는 보통 3일~7일 기준으로입원 집중치료 기간을 잡게 되는데요. 환자상태에 따라서,입원연장이 필요 할 수 있습니다.
                                            </p>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="top">
                                            <h3 class="no-body-xl fw600">실비보험 적용되나요?</h3>
                                            <div class="plus-icon">
                                                <i class="horizon"></i>
                                                <i class="vertical"></i>
                                            </div>
                                        </div>

                                        <div class="answer">
                                            <span class="blue no-body-lg fw600">답변</span>
                                            <p class="no-body-lg fw300 no-mg-4--t">
                                                네 가능합니다. 다만, 보험약관에 따라 개인 차이가있을 수 있으므로, 개별적인 확인 조회가 필요합니다.
                                            </p>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="top">
                                            <h3 class="no-body-xl fw600">양방치료 말고 한방치료(침치료)를 꼭 받아야하나요?</h3>
                                            <div class="plus-icon">
                                                <i class="horizon"></i>
                                                <i class="vertical"></i>
                                            </div>
                                        </div>

                                        <div class="answer">
                                            <span class="blue no-body-lg fw600">답변</span>
                                            <p class="no-body-lg fw300 no-mg-4--t">
                                                한방 약침 치료는 신경통 신경염 완화 및 면역증진에도움을 줄 수 있습니다. 물리치료, 침 치료,추나 치료 등은 기혈 순환 개선과 신경기능 회복에도움을 줍니다.
                                                환자분께 꼭 맞는 다양한 제형의 한방 처방으로빠른 증상의 호전뿐만 아니라 면역력이 저하된원인에 따른 근본 치료가 가능합니다.
                                            </p>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="top">
                                            <h3 class="no-body-xl fw600">혈액검사 결과는 언제 나오나요?</h3>
                                            <div class="plus-icon">
                                                <i class="horizon"></i>
                                                <i class="vertical"></i>
                                            </div>
                                        </div>

                                        <div class="answer">
                                            <span class="blue no-body-lg fw600">답변</span>
                                            <p class="no-body-lg fw300 no-mg-4--t">
                                                대상포진 혈액검사는 채혈 후 약 3~4일 소요됩니다.
                                            </p>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="top">
                                            <h3 class="no-body-xl fw600">통증 호전 및 완치는 얼마나 걸리나요?</h3>
                                            <div class="plus-icon">
                                                <i class="horizon"></i>
                                                <i class="vertical"></i>
                                            </div>
                                        </div>

                                        <div class="answer">
                                            <span class="blue no-body-lg fw600">답변</span>
                                            <p class="no-body-lg fw300 no-mg-4--t">
                                                개인의 면역 상태와 치료 반응에 따라 다르며,초기 발병기에 적극적인 양방 한방 협진 치료를 병행하여호전 속도를 높일 수 있습니다.
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </section>

                        <section class="no-cancer-sub-essential no-pd-80--y">
                            <div class="no-container-sm">
                                <h2 class="no-heading-sl --tac fade-up">면력 신경면역센터의<br>
                                    약속</h2>

                                <div class="focus no-pd-64--t fade-up">
                                    <img src="/resource/images/icon/quotes-open-v2.svg">
                                    <strong class="font-kr blur-js no-body-xxl fw300 --tac">
                                        대상포진으로 인한 어려움,<br>
                                        이제 면력 신경면역센터에서<br> 통증을 멈추고,
                                    </strong>

                                    <strong class="font-kr blur-js no-body-xxl fw300 --tac no-mg-16--t blue">
                                        잃어버린 일상을 되찾아 드리겠습니다.
                                    </strong>
                                    <img src="/resource/images/icon/quotes-close-v2.svg">
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