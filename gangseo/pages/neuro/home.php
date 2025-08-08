<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>



<!-- dev -->



<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>

<!-- 팝업입니다============================================== -->
<?php
$branchId = 2;
// var.php에서 popup_type 확인
$popupType = 3;
include_once $STATIC_ROOT . '/inc/lib/popup.new.php';
?>
<!-- 팝업입니다============================================== -->



<!-- contents -->



<main>

    <?php
    $banners = getBannersByBranch('gangseo', 3);
    $sql = "SELECT banner_rolling_times FROM nb_etcs LIMIT 1";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // 6000 (6초)
    $rollingTime = isset($result['banner_rolling_times']) ? (int)$result['banner_rolling_times'] * 1000 : 5000; // ms로 변환

    // swiper div에 data-rolling=<?=$rollingTime.. 이거넣고 js에서 상수 등록 후 autoplay delay에 해당 값을 넣으세요.
    ?>

    <section class="no-cetner-visual">

        <div class="no-container-pc">

            <div class="visual-wrap">

                <?php include_once $STATIC_ROOT . '/inc/shared/pc-info.php'; ?>



                <div class="mobile-visual-wrap">

                    <?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>



                    <?php include_once $STATIC_ROOT . '/inc/shared/sub.nav.php'; ?>





                    <div class="no-cancer no-neuro">

                        <section class="no-cancer-visual visual-slider" data-rolling="<?= $rollingTime ?>">
                            <div class="swiper-wrapper">
                                <?php if (!empty($banners)): ?>
                                    <?php foreach ($banners as $banner): ?>
                                        <div class="swiper-slide">
                                            <?php
                                            $imgSrc = '/uploads/banners/' . $banner['banner_image'];
                                            $alt = htmlspecialchars($banner['title']);
                                            $imgTag = "<img src=\"{$imgSrc}\" alt=\"{$alt}\">";

                                            if ($banner['has_link'] == 1 && !empty($banner['link_url'])) {
                                                $href = htmlspecialchars($banner['link_url']);
                                                $target = ((int)$banner['is_target'] === 1) ? '_blank' : '_self';
                                                echo "<a href=\"{$href}\" target=\"{$target}\">{$imgTag}</a>";
                                            } else {
                                                echo $imgTag;
                                            }
                                            ?>
                                            <h2 class="no-heading-sm --tac black"><?= $banner['description'] ?></h2>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <div class="swiper-pagination-bar">
                                <div class="progress-bar">
                                    <div class="progress-fill"></div>
                                </div>
                                <button class="swiper-control play" title="Play"></button>
                                <button class="swiper-control pause" title="Pause"></button>
                            </div>
                        </section>

                        <section class="no-cancer-field no-pd-48--y">

                            <div class="no-container-sm">

                                <ul class="field-list neuro fade-up">

                                    <li class="--tac">

                                        <a href="/gangseo/pages/neuro/shingles-1.php">

                                            <h3 class="no-body-xl fw600">대상포진<br>

                                                초기치료</h3>

                                            <img src="/resource/images/neuro-field1.png" alt="field">

                                        </a>

                                    </li>



                                    <li class="--tac">

                                        <a href="/gangseo/pages/neuro/shingles-2.php">

                                            <h3 class="no-body-xl fw600">대상포진<br> 후유증</h3>

                                            <img src="/resource/images/neuro-field2.png" alt="field">

                                        </a>

                                    </li>



                                    <li class="--tac">

                                        <a href="/gangseo/pages/neuro/facial.php">

                                            <h3 class="no-body-xl fw600">안면마비</h3>

                                            <img src="/resource/images/neuro-field3.png" alt="field">

                                        </a>

                                    </li>

                                </ul>

                            </div>

                        </section>



                        <section class="no-cancer-intro neuro no-pd-24--t no-pd-48--b">

                            <div class="no-container-sm">

                                <hgroup class="--tac fade-up no-mg-32--b">

                                    <h2 class="no-heading-sm">이 증상,<br>

                                        병원에 오셔야 합니다</h2>

                                </hgroup>

                            </div>



                            <div class="basic-slider v2 v3" <?= $aos_left_slow ?>>

                                <ul class="swiper-wrapper">

                                    <li class="swiper-slide">

                                        <figure>

                                            <p class="no-body-lg fw300 no-mg-24--b --tac">수포는 사라졌는데<br>

                                                아직도 <b class="fw600">찌릿한 통증이 계속</b>된다면?</p>



                                            <img src="/resource/images/neuro-symptom1.jpg" class="no-radius-sm">

                                        </figure>



                                        <h3 class="no-mg-16--t no-body-xxl fw600 --tac">대상포진 신경통</h3>

                                    </li>



                                    <li class="swiper-slide">

                                        <figure>

                                            <p class="no-body-lg fw300 no-mg-24--b --tac">아침에 거울 속 내 얼굴이 다르다면?<br> <b class="fw600">입꼬리 처짐, 눈 감김 이상</b></p>



                                            <img src="/resource/images/neuro-symptom2.jpg" class="no-radius-sm">

                                        </figure>



                                        <h3 class="no-mg-16--t no-body-xxl fw600 --tac">안면마비</h3>

                                    </li>



                                    <li class="swiper-slide">

                                        <figure>

                                            <p class="no-body-lg fw300 no-mg-24--b --tac"><b class="fw600">감기처럼 자꾸 반복되는 대상포진</b><br> 면역 회복이 우선입니다.</p>



                                            <img src="/resource/images/neuro-symptom3.jpg" class="no-radius-sm">

                                        </figure>



                                        <h3 class="no-mg-16--t no-body-xxl fw600 --tac">대상포진</h3>

                                    </li>

                                </ul>



                                <div class="swiper-pagination"></div>

                            </div>



                            <div class="no-container-sm">

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

                                    <h2 class="no-heading-sl">수많은 환자분들이 저희와 함께했습니다.</h2>

                                </hgroup>



                                <div class="basic-slider" <?= $aos_left_slow ?>>

                                    <ul class="swiper-wrapper video-list">

                                        <li class="swiper-slide">

                                            <a href="https://www.youtube.com/watch?v=JVfLnGoZ0xY" target="_blank">

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

                                            <a href="https://www.youtube.com/watch?v=WVKujgzAvso&t" target="_blank">

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

                                            <a href="https://www.youtube.com/watch?v=vDZ3NhnbOBU" target="_blank">

                                                <figure>

                                                    <img src="/resource/images/neuro-video2.jpg">

                                                </figure>



                                                <div class="f-wrap no-mg-16--t">

                                                    <h3 class="no-heading-sm no-mg-8--b">집중 치료를 받고 굉장히 호전됐어요.</h3>

                                                    <i class=" fa-regular fa-arrow-right i-30"></i>

                                                </div>

                                                <div class="txt no-mg-8--t">

                                                    <span class="no-body-lg fw300">49세 김미영님</span>

                                                    <p class="no-mg-8--t no-body-md fw300">극심한 대상포진 통증과 수포로 고통받았으나, 면력한방병원의 다양한 집중 치료로 통증이 크게 줄고 수포도 호전되었습니다. 세심한 케어에 감사드립니다.</p>

                                                </div>

                                            </a>

                                        </li>



                                        <li class="swiper-slide">

                                            <a href="https://www.youtube.com/watch?v=IXXM0397bdQ" target="_blank">

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

                                            <a href="https://www.youtube.com/watch?v=JZriwWyZEqk" target="_blank">

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

                                            <a href="https://www.youtube.com/watch?v=xizWrwqTbBg" target="_blank">

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

                                            <a href="https://www.youtube.com/watch?v=-R7D6sOehVQ" target="_blank">

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

                            </div>

                        </section>



                        <section class="no-cancer-data neuro no-pd-64--y">

                            <div class="no-container-sm">

                                <hgroup class="--tac fade-up no-mg-24--b">

                                    <p class="no-body-lg fw300">5만 환우분들은</p>

                                    <h2 class="no-heading-sl">왜 면력을 선택했을까요?</h2>

                                </hgroup>



                                <figure class="no-mg-32--t fade-up">

                                    <h3 class="no-body-lg fw600 --tac">입원생활 시<br>

                                        <b>가장 만족한 서비스</b>

                                    </h3>



                                    <img src="/resource/images/neuro-data.png">

                                </figure>



                                <span class="source no-body-sm fw300 --tac no-mg-32--t" <?= $aos_fade ?>>25.4.17 면력 서비스 만족도 설문 조사 결과</span>

                            </div>

                        </section>



                        <section class="no-neuro-doctor no-pd-48--y">

                            <div class="no-container-sm">

                                <hgroup class="--tac fade-up no-mg-32--b">

                                    <span class="no-body-lg fw300">신경면역센터</span>

                                    <h2 class="no-heading-sl no-mg-8--t">한·양방 협진 집중치료</h2>

                                    <p class="no-body-lg fw600 no-mg-32--t">통증과 마비해소에 특화된 전담의 구성</p>

                                </hgroup>



                                <img src="/resource/images/neuro-doctor.jpg" class="no-radius-sm fade-up">



                                <div class="txt no-mg-16--t --tac fade-up">

                                    <p class="no-body-lg fw600">면력 신경면역센터</p>

                                    <span class="no-body-md fw300 gray">치료 전담의</span>

                                    <h2 class="no-heading-sm no-mg-8--t">황이준</h2>

                                </div>

                        </section>


                        <?php
                        $facilities = getFacilities('gangseo', 3, 4);
                        ?>

                        <section class="no-neuro-room no-pd-48--y bg">

                            <div class="no-container-sm">

                                <hgroup class="--tac fade-up no-mg-32--b">

                                    <span class="no-body-lg fw300">신경계 질환은 무엇보다<br> 빠른 대처와 치료가 중요하기에</span>

                                    <h2 class="no-heading-sl no-mg-8--y"><b class="blue">단기 입원</b>을 통해</h2>

                                    <p class="no-body-lg fw600">집중치료를 진행합니다.</p>

                                </hgroup>



                                <div class="left-slider v2 no-mg-32--t" <?= $aos_left_slow ?>>

                                    <ul class="swiper-wrapper facility-list">
                                        <?php foreach ($facilities as $facility): ?>
                                            <?php if (!empty($facility['thumb_image'])): ?>
                                                <li class="swiper-slide">
                                                    <figure>
                                                        <img src="/uploads/facilities/<?= htmlspecialchars($facility['thumb_image']) ?>"
                                                            alt="<?= htmlspecialchars($facility['title']) ?>">
                                                    </figure>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>



                                <img src="/resource/images/neuro-day.png" class="fade-up no-mg-32--y">



                                <h3 class="no-body-xxl fw600 --tac fade-up">입원이 필요한 이유</h3>



                                <ul class="list-js reason-list no-mg-24--t">

                                    <li class="f-wrap">

                                        <h4 class="no-body-lg fw300">대상포진</h4>

                                        <p class="no-body-lg fw600">감염예방 및 외부자극 차단</p>

                                    </li>



                                    <li class="f-wrap">

                                        <h4 class="no-body-lg fw300">안면마비</h4>

                                        <p class="no-body-lg fw600">집중치료로 빠른 마비 해소</p>

                                    </li>

                                </ul>

                            </div>

                        </section>



                        <section class="no-neuro-food no-pd-48--y">

                            <div class="no-container-sm">

                                <hgroup class="--tac fade-up no-mg-32--b">

                                    <h2 class="no-heading-sl no-mg-8--b">식사는 또하나의<br>

                                        치료제 입니다.</h2>

                                    <p class="no-body-lg fw300">대상포진, 안면마비 등 신경면역 질환 환자에게 <b class="fw600 blue">염증을 줄이고 면역을 회복시키는 식단</b>은

                                        ‘치료의 연장선’입니다.</p>

                                </hgroup>



                                <img src="/resource/images/neuro-food.jpg" class="fade-up no-radius-sm">



                                <strong class="no-body-lg fw300 no-mg-24--t fade-up --tac">면력 신경면역센터는 질환별 식단 가이드를<br>

                                    설계하여 <b class="fw600 blue">회복에 최적화된 식사를 제공</b>합니다.</strong>



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