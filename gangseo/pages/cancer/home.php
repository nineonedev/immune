<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>

<!-- dev -->




<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>

<!-- 팝업입니다============================================== -->
<?php
$branchId = 2;
$popupType = 2;
include_once $STATIC_ROOT . '/inc/lib/popup.new.php';
?>

<!-- 팝업입니다============================================== -->

<!-- contents -->

<main>

    <?php
    $banners = getBannersByBranch('gangseo', 2);
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


                    <div class="no-cancer">
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
                                            <h2 class="no-heading-sm --tac"><?= $banner['description'] ?></h2>
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
                                <ul class="field-list fade-up">
                                    <li class="--tac">
                                        <a href="/gangseo/pages/cancer/female-1.php">
                                            <h3 class="no-body-xl fw600 brown">유방암</h3>
                                            <img src="/resource/images/cancer-field1.png" alt="field">
                                        </a>
                                    </li>

                                    <li class="--tac">
                                        <a href="/gangseo/pages/cancer/female-1.php">
                                            <h3 class="no-body-xl fw600 brown">자궁암</h3>
                                            <img src="/resource/images/cancer-field2.png" alt="field">
                                        </a>
                                    </li>

                                    <li class="--tac">
                                        <a href="/gangseo/pages/cancer/female-1.php">
                                            <h3 class="no-body-xl fw600 brown">난소암</h3>
                                            <img src="/resource/images/cancer-field3.png" alt="field">
                                        </a>
                                    </li>

                                    <li class="--tac">
                                        <a href="/gangseo/pages/cancer/digest-1.php">
                                            <h3 class="no-body-xl fw600 brown">대장암</h3>
                                            <img src="/resource/images/cancer-field4.png" alt="field">
                                        </a>
                                    </li>

                                    <li class="--tac">
                                        <a href="/gangseo/pages/cancer/digest-1.php">
                                            <h3 class="no-body-xl fw600 brown">위암</h3>
                                            <img src="/resource/images/cancer-field5.png" alt="field">
                                        </a>
                                    </li>

                                    <li class="--tac">
                                        <a href="/gangseo/pages/cancer/liver-1.php">
                                            <h3 class="no-body-xl fw600 brown">간암</h3>
                                            <img src="/resource/images/cancer-field6.png" alt="field">
                                        </a>
                                    </li>

                                    <li class="--tac">
                                        <a href="/gangseo/pages/cancer/liver-1.php">
                                            <h3 class="no-body-xl fw600 brown">담도암</h3>
                                            <img src="/resource/images/cancer-field7.png" alt="field">
                                        </a>
                                    </li>

                                    <li class="--tac">
                                        <a href="/gangseo/pages/cancer/liver-1.php">
                                            <h3 class="no-body-xl fw600 brown">췌장암</h3>
                                            <img src="/resource/images/cancer-field8.png" alt="field">
                                        </a>
                                    </li>

                                    <li class="--tac">
                                        <a href="/gangseo/pages/cancer/lung-1.php">
                                            <h3 class="no-body-xl fw600 brown">폐암</h3>
                                            <img src="/resource/images/cancer-field9.png" alt="field">
                                        </a>
                                    </li>

                                    <li class="--tac">
                                        <a href="/gangseo/pages/cancer/thyroid-1.php">
                                            <h3 class="no-body-xl fw600 brown">갑상선암</h3>
                                            <img src="/resource/images/cancer-field10.png" alt="field">
                                        </a>
                                    </li>

                                    <li class="--tac">
                                        <a href="/gangseo/pages/cancer/etc-1.php">
                                            <h3 class="no-body-xl fw600 brown">기타암</h3>
                                            <img src="/resource/images/cancer-field11.png" alt="field">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </section>

                        <section class="no-cancer-intro no-pd-72--t no-pd-48--b">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-24--b">
                                    <h2 class="no-heading-sl">갑자기 찾아온 <b>암</b></h2>
                                    <p class="no-body-lg fw300 no-mg-8--t">왜 나에게 이런일이 생겼을까<br>
                                        많이 두려우신가요?</p>
                                </hgroup>

                                <div class="speech no-mg-56--t no-mg-80--b fade-up">
                                    <p class="no-body-xxl fw600 --tac">우리는 <b>두려움을 희망으로</b><br>
                                        바꾸는 사람들입니다.</p>
                                </div>

                                <div class="cancer-case-wrap fade-up">
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

                                    <span class="source no-body-sm fw600 --tac no-mg-24--t" <?= $aos_fade ?>>2024. 11.
                                        06 기준, 전지점 조사결과</span>
                                </div>
                            </div>
                        </section>

                        <section class="no-cancer-video no-main-video no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-32--b">
                                    <h2 class="no-heading-sl">수많은 환자분들이 우리와 함께했습니다.</h2>
                                </hgroup>

                                <div class="basic-slider" <?= $aos_left_slow ?>>
                                    <ul class="swiper-wrapper video-list">
                                        <li class="swiper-slide">
                                            <a href="https://www.youtube.com/watch?v=4GcbFIm2_P8&t=16s" target="_blank">
                                                <figure>
                                                    <img src="/resource/images/video1.jpg">
                                                </figure>

                                                <div class="f-wrap no-mg-16--t">
                                                    <h3 class="no-heading-sm no-mg-8--b">림프종 항암 초기의 힘든 시간, 세심한 치료로
                                                        극복했습니다.</h3>
                                                    <i class=" fa-regular fa-arrow-right i-30"></i>
                                                </div>
                                                <div class="txt no-mg-8--t">
                                                    <span class="no-body-lg fw300">66세 김정아님</span>
                                                    <p class="no-mg-8--t no-body-md fw300">다른 병원에서는 연고와 약 처방만 받았는데 여기서
                                                        다양한 치료법으로 치료 받아서 많이 나았고 만독스러웠습니다.</p>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="swiper-slide">
                                            <a href="https://www.youtube.com/watch?v=Gq7qBAFwIFY" target="_blank">
                                                <figure>
                                                    <img src="/resource/images/cancer-video.jpg">
                                                </figure>

                                                <div class="f-wrap no-mg-16--t">
                                                    <h3 class="no-heading-sm no-mg-8--b">위암 절제술 후 기력 저하, 맞춤 케어로 활력을
                                                        되찾았어요.</h3>
                                                    <i class=" fa-regular fa-arrow-right i-30"></i>
                                                </div>
                                                <div class="txt no-mg-8--t">
                                                    <span class="no-body-lg fw300">65세 황일동님</span>
                                                    <p class="no-mg-8--t no-body-md fw300">맞춤 식사 케어와 세심한 치료로 기력을 회복하고
                                                        있습니다. 친절한 의료진 덕분에 암은 극복할 수 있다는 자신감을 얻게 되었습니다.</p>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="swiper-slide">
                                            <a href="https://www.youtube.com/watch?v=GF7rKZGRFNY" target="_blank">
                                                <figure>
                                                    <img src="/resource/images/cancer-video2.jpg">
                                                </figure>

                                                <div class="f-wrap no-mg-16--t">
                                                    <h3 class="no-heading-sm no-mg-8--b">유방암 2기, 통합치료로 부종 개선, 웃음도 되찾았어요.
                                                    </h3>
                                                    <i class=" fa-regular fa-arrow-right i-30"></i>
                                                </div>
                                                <div class="txt no-mg-8--t">
                                                    <span class="no-body-lg fw300">64세 한은숙님</span>
                                                    <p class="no-mg-8--t no-body-md fw300">면력 통합치료를 통해 림프 부종이 개선되고 삶의 질이
                                                        향상되었습니다. 가족의 지지와 긍정적인 마음가짐으로 암을 이겨낼 수 있다는 희망을 얻었습니다.</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </section>

                        <section class="no-cancer-data no-pd-64--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-24--b">
                                    <p class="no-body-lg fw300">5만 환우분들은</p>
                                    <h2 class="no-heading-sl">왜 면력을 선택했을까요?</h2>
                                </hgroup>

                                <figure class="no-mg-32--t fade-up">
                                    <h3 class="no-body-lg fw600 --tac">입원생활 시<br>
                                        <b>가장 만족한 서비스</b>
                                    </h3>

                                    <img src="/resource/images/cancer-data.png">
                                </figure>

                                <span class="source no-body-sm fw300 --tac no-mg-32--t" <?= $aos_fade ?>>25.4.17 면력 서비스
                                    만족도 설문 조사 결과</span>
                            </div>
                        </section>

                        <section class="no-cancer-process no-pd-48--y">
                            <div class="no-container-sm">
                                <p class="font-kr no-body-xxl fw300 blur-js --tac">힘든 암의 길,<br>
                                    혼자가 아닙니다.</p>

                                <ul class="symbol no-mg-24--y fade-up blur-js">
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>

                                <hgroup class="--tac fade-up no-mg-24--b">
                                    <p class="no-body-md fw600 no-mg-8--b">평범한 일상으로 다시 돌아갈 수 있도록</p>
                                    <h2 class="no-heading-sl">곁에서, <b>모든 여정</b>을
                                        함께하겠습니다.</h2>
                                </hgroup>

                                <ul class="process-list no-mg-80--t">
                                    <li class="fade-up">
                                        <img src="/resource/images/icon/cancer-process1.svg">

                                        <div class="left">
                                            <i class="fa-sharp fa-regular fa-plus"></i>
                                            <div class="line"></div>
                                        </div>

                                        <div class="txt no-pd-48--b">
                                            <span class="no-body-md fw600">암 진단</span>

                                            <h3 class="no-body-xxl fw600 no-mg-16--t">수술 전 면역관리</h3>
                                            <p class="no-body-md fw300 no-mg-4--t">체력강화 | 면역력 증진 | 감염 예방</p>
                                        </div>
                                    </li>

                                    <li class="fade-up">
                                        <img src="/resource/images/icon/cancer-process2.svg">

                                        <div class="left">
                                            <i class="fa-sharp fa-regular fa-plus"></i>
                                            <div class="line"></div>
                                        </div>

                                        <div class="txt no-pd-48--b">
                                            <span class="no-body-md fw600">암 수술</span>

                                            <h3 class="no-body-xxl fw600 no-mg-16--t">수술 후 회복 및 재활</h3>
                                            <p class="no-body-md fw300 no-mg-4--t">수술 후유증 완화 | 체력 및 면역력 회복 <br> 신체기능 정상화
                                                | 감염 예방관리</p>
                                        </div>
                                    </li>

                                    <li class="fade-up">
                                        <img src="/resource/images/icon/cancer-process3.svg">

                                        <div class="left">
                                            <i class="fa-sharp fa-regular fa-plus"></i>
                                            <div class="line"></div>
                                        </div>

                                        <div class="txt no-pd-48--b">
                                            <span class="no-body-md fw600">항암・방사선 치료 시작</span>

                                            <h3 class="no-body-xxl fw600 no-mg-16--t">항암·방사선 치료 효과
                                                개선 도움</h3>
                                            <p class="no-body-md fw300 no-mg-4--t">항암치료율 향상 | 항암부작용 감소<br> 항암내성 완화 |
                                                암성통증 관리<br> 손상 조직 회복 | 면역체계 정상화</p>
                                        </div>
                                    </li>

                                    <li class="fade-up">
                                        <img src="/resource/images/icon/cancer-process4.svg">

                                        <div class="left">
                                            <i class="fa-sharp fa-regular fa-plus"></i>
                                            <div class="line"></div>
                                        </div>

                                        <div class="txt no-pd-48--b">
                                            <span class="no-body-md fw600">항암・방사선 치료 종료</span>

                                            <h3 class="no-body-xxl fw600 no-mg-16--t">2차암/전이/재발관리</h3>
                                            <p class="no-body-md fw300 no-mg-4--t">면역세포 활성화 | 암세포 형식<br>
                                                증식 억제 | 미세 잔존 암세포 사멸<br>
                                                면역체계 강화 및 안정화</p>
                                        </div>
                                    </li>

                                    <li class="fade-up">
                                        <img src="/resource/images/icon/cancer-process5.svg">

                                        <div class="left">
                                            <i class="fa-sharp fa-regular fa-plus"></i>
                                        </div>

                                        <div class="txt no-pd-48--b">
                                            <span class="no-body-md fw600">2차암/전이/재발 관리</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </section>

                        <section class="no-cancer-graph no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-24--b">
                                    <p class="no-body-lg fw300">한・양방 면역치료</p>
                                    <h2 class="no-heading-sl">효과가 있을까요?</h2>
                                </hgroup>

                                <figure class="no-mg-32--t fade-up">
                                    <h3 class="no-body-xxl fw600 --tac">생존률을 높이는 협진 치료</h3>
                                    <p class="no-body-md fw300 --tac no-pd-24--b no-mg-4--t">말기위암환자 수술 후 한약치료</p>

                                    <img src="/resource/images/cancer-graph.jpg" class="no-mg-32--t">

                                    <span class="source no-body-sm fw300 --tac no-mg-32--t">※ 한약의 안정성 및 효과가 입증된
                                        자료입니다.</span>
                                    <span class="source source-info no-mg-4--t --tac">참고논문 Rao. X.Q. et al, (1994), The
                                        long-term effects of shen xue tang comblned
                                        with chemotherapy on mid-and late-stage stomach cancer. CJITWM, 14(6),
                                        366.</span>
                                </figure>

                                <strong class="no-body-xxl fw600 no-mg-32--t --tac fade-up">
                                    한・양방 협진, 면역 치료를 통해<br>
                                    <b>더욱 생존율을 높이고 있습니다.</b>
                                </strong>
                            </div>
                        </section>

                        <section class="no-cancer-food no-pd-48--y imgbg"
                            style="background-image: url('/resource/images/cancer-food-bg.jpg');">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-24--b">
                                    <p class="no-body-lg fw300">암을 진단받은 대부분의 환자들이<br>
                                        <b class="fw600">가장 먼저 하는 고민</b>
                                    </p>
                                    <h2 class="no-heading-sm font-kr fw300 no-mg-8--t">‘무엇을 먹어야 할까?’</h2>
                                </hgroup>

                                <ul class="speech-list list-js no-mg-56--y">
                                    <li class="--tac">
                                        <p class="no-body-xxl fw400">의료진</p>
                                        <h3 class="no-body-xxl fw700 no-mg-4--t">의학적 상태 <b>진단</b></h3>
                                    </li>

                                    <li class="--tac">
                                        <p class="no-body-xxl fw400">임상 영양사</p>
                                        <h3 class="no-body-xxl fw700 no-mg-4--t">영양상태, 식습관 <b>분석</b></h3>
                                    </li>

                                    <li class="--tac">
                                        <p class="no-body-xxl fw400">치료식 셰프</p>
                                        <h3 class="no-body-xxl fw700 no-mg-4--t"><b>프리미엄</b> 요리제공</h3>
                                    </li>
                                </ul>

                                <strong class="no-body-lg fw600 --tac">의료진·임상 영양사·치료식 셰프가<br> 오직 한 사람을 위해 끊임없이
                                    고민합니다.</strong>

                                <h2 class="blur-js font-kr fw300 no-heading-sm --tac no-mg-200--t">식사는 또 하나의<br> 치료제
                                    입니다.</h2>
                            </div>
                        </section>

                        <section class="no-cancer-program no-pd-48--t no-pd-64--b">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-24--b">
                                    <p class="no-body-lg fw300">몸의 치유를 넘어, 마음의 회복까지.<br>
                                        온전한 당신을 돌봅니다.
                                    </p>
                                    <h2 class="no-heading-sl fw700 no-mg-8--t">프로그램</h2>
                                </hgroup>

                                <ul class="program-list no-mg-32--t">
                                    <li class="fade-up">
                                        <figure>
                                            <img src="/resource/images/cancer-program1.jpg">
                                        </figure>
                                        <div class="txt">
                                            <h3 class="no-body-xl fw600">산책 프로그램</h3>
                                            <p class="no-body-md fw300 no-mg-8--t">매일 평일 오전, 병원 인근 산책 코스로 향하는 야외 산책 버스를
                                                운행합니다. 자연 속에서 컨디션과 마음을 회복해보세요.</p>
                                        </div>
                                    </li>

                                    <li class="fade-up">
                                        <figure>
                                            <img src="/resource/images/cancer-program2.jpg">
                                        </figure>
                                        <div class="txt">
                                            <h3 class="no-body-xl fw600">소풍 프로그램</h3>
                                            <p class="no-body-md fw300 no-mg-8--t">매주 1회, 병원 밖으로 떠나는 힐링 소풍 프로그램을 진행합니다.
                                                자연과 함께 몸과 마음에 여유를 더해보세요.</p>
                                        </div>
                                    </li>

                                    <li class="fade-up">
                                        <figure>
                                            <img src="/resource/images/cancer-program3.jpg">
                                        </figure>
                                        <div class="txt">
                                            <h3 class="no-body-xl fw600">운동치료</h3>
                                            <p class="no-body-md fw300 no-mg-8--t">매주 1회, 전문 치료사와 함께하는 운동치료 프로그램을 진행합니다.
                                                움직임을 통해 체력과 회복력을 높여보세요.</p>
                                        </div>
                                    </li>

                                    <li class="fade-up">
                                        <figure>
                                            <img src="/resource/images/cancer-program4.jpg">
                                        </figure>
                                        <div class="txt">
                                            <h3 class="no-body-xl fw600">원데이클래스</h3>
                                            <p class="no-body-md fw300 no-mg-8--t">매주 1회, 주제별로 달라지는 원데이 클래스 프로그램을 운영합니다.
                                                작은 즐거움이 쌓여, 마음 회복의 힘이 됩니다.</p>
                                        </div>
                                    </li>

                                    <li class="fade-up">
                                        <figure>
                                            <img src="/resource/images/cancer-program5.jpg">
                                        </figure>
                                        <div class="txt">
                                            <h3 class="no-body-xl fw600">푸드테라피</h3>
                                            <p class="no-body-md fw300 no-mg-8--t">2주에 한 번, 전문 셰프와 함께하는 푸드테라피 클래스가
                                                진행됩니다. 맛있고 건강한 식사를 통해 힐링과 영양을 동시에 채워보세요.</p>
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