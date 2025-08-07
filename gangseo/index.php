<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>


<!-- dev -->

<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>

<!-- 팝업입니다============================================== -->
<?php
    $branchId = 2;
    // var.php에서 poppu_type 확인
    $popupType = 1;
    include_once $STATIC_ROOT . '/inc/lib/popup.new.php';
?>
<!-- 팝업입니다============================================== -->

<!-- contents -->
<main>
    <?php
        $banners = getBannersByBranch('gangseo', 1);
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

                    <div class="no-main">
                        <section class="no-main-visual">
                            <?php if (!empty($banners)): ?>
                            <?php foreach ($banners as $banner): ?>
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
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </section>


                        <section class="no-main-center no-pd-48--y">
                            <div class="no-container-sm">
                                <h2 class="no-heading-sl --tac no-mg-24--b fade-up">센터소개</h2>

                                <ul class="center-list list-js">
                                    <li>
                                        <div class="center-box">
                                            <h3 class="no-body-xl fw600 no-mg-16--b">
                                                <a href="/gangseo/pages/cancer/home.php"><b>암면역</b>센터 <i
                                                        class="fa-solid fa-plus i-30"></i></a>
                                            </h3>

                                            <ul class="dept2">
                                                <li>
                                                    <a href="/gangseo/pages/cancer/female-1.php" class="no-body-md">
                                                        유방/자궁/난소암
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="/gangseo/pages/cancer/digest-1.php" class="no-body-md">
                                                        대장/위암
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="/gangseo/pages/cancer/liver-1.php" class="no-body-md">
                                                        간/담도/췌장암
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="/gangseo/pages/cancer/lung-1.php" class="no-body-md">
                                                        폐암
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="/gangseo/pages/cancer/thyroid-1.php" class="no-body-md">
                                                        갑상선암
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="/gangseo/pages/cancer/etc-1.php" class="no-body-md">
                                                        기타암
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="center-box">
                                            <h3 class="no-body-xl fw600 no-mg-16--b">
                                                <a href="/gangseo/pages/neuro/home.php"><b>신경면역</b>센터 <i
                                                        class="fa-solid fa-plus i-30"></i></a>
                                            </h3>

                                            <ul class="dept2">
                                                <li>
                                                    <a href="#" class="no-body-md">
                                                        대상포진
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#" class="no-body-md">
                                                        안면마비
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="center-box">
                                            <h3 class="no-body-xl fw600 no-mg-16--b">
                                                <a href="/gangseo/pages/rehab/home.php"><b>재활</b>센터 <i
                                                        class="fa-solid fa-plus i-30"></i></a>
                                            </h3>

                                            <ul class="dept2">
                                                <li>
                                                    <a href="#" class="no-body-md">
                                                        부인과 수술 후 회복
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#" class="no-body-md">
                                                        교통사고 후유증
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#" class="no-body-md">
                                                        수술 후 재활
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </section>

                        <section class="no-main-case no-pd-64--y">
                            <div class="no-container-sm">
                                <h2 class="no-heading-sl --tac no-mg-16--b fade-up">누적 치료사례</h2>

                                <ul class="case-list list-js">
                                    <li>
                                        <div class="txt">
                                            <p class="no-body-sm fw600">누적 치료사례</p>
                                            <h3 class="no-heading-sm">50,000건<br> <b>돌파!</b></h3>
                                        </div>

                                        <img src="/resource/images/main-case-img.svg">
                                    </li>

                                    <li>
                                        <div class="txt">
                                            <h3 class="no-heading-sm">환자 만족도</h3>
                                            <p class="no-body-sm fw600">신뢰로 증명된 의료 서비스</p>
                                        </div>

                                        <figure>
                                            <img src="/resource/images/main-case-img2.svg">

                                            <span class="no-body-sm fw700">
                                                <div class="counter no-heading-xs fw700" data-count="93.5">
                                                    0
                                                </div>
                                                %
                                            </span>
                                        </figure>
                                    </li>
                                </ul>

                                <span class="source no-body-sm fw400 --tac no-mg-16--t" <?= $aos_fade ?>>2024. 11. 06
                                    기준, 전지점 조사결과</span>
                            </div>
                        </section>

                        <?php
                            $doctors = getDoctors('gangseo'); 
                        ?>
                        <section class="no-main-doctor no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-24--b">
                                    <h2 class="no-heading-sl">함께하는 면력 의료진</h2>
                                    <p class="no-body-lg fw300">편안한 치료를 위해 면력은 노력합니다.</p>
                                </hgroup>
                                <div class="basic-slider" <?= $aos_left_slow ?>>
                                    <ul class="swiper-wrapper doctor-list">
                                        <?php foreach ($doctors as $doctor): ?>
                                        <?php
                                            $name = htmlspecialchars($doctor['title']);
                                            $position = htmlspecialchars($doctor['position']);
                                            $imgSrc = !empty($doctor['thumb_image']) 
                                            ? "/uploads/doctors/" . $doctor['thumb_image'] 
                                            : "";
                                            $link = "pages/hospital/doctor.view.php?id=" . urlencode($doctor['id']);
                                        ?>
                                        <li class="swiper-slide">
                                            <a href="<?= $link ?>">
                                                <figure>
                                                    <img src="<?= $imgSrc ?>" alt="<?= $name ?>">
                                                </figure>

                                                <div class="f-wrap no-mg-16--t">
                                                    <div class="txt">
                                                        <h3 class="no-heading-sm no-mg-8--b"><?= $name ?></h3>
                                                        <p class="no-body-lg fw600"><?= $position ?></p>
                                                    </div>

                                                    <i class="fa-regular fa-arrow-right i-30"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>

                                <a href="pages/hospital/doctor.php" class="basic-btn no-body-lg fw600 no-mg-40--t">
                                    의료진 더보기
                                </a>
                            </div>
                        </section>

                        <section class="no-main-video no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-24--b">
                                    <h2 class="no-heading-sl">회복으로 이뤄진 신뢰</h2>
                                    <p class="no-body-lg fw300">근본적인 치료에 집중합니다.</p>
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
                                                    <p class="no-mg-8--t no-body-md fw300">벌레 물린 줄 알았던 대상포진을 면력한방병원에서 집중
                                                        치료받았습니다.
                                                        영양 가득한 식사와 침, 수액, 도수치료 등 토탈케어로 많이 좋아져 세심한 배려에 감사드립니다.</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </section>


                        <?php
                            $facilities = getFacilities('gangseo', 1, 4);
                        ?>

                        <section class="no-main-facility no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-24--b">
                                    <h2 class="no-heading-sl">회복을 위한 공간 설계</h2>
                                    <p class="no-body-lg fw300">작은 부분까지 배려한 공간에서<br>온전한 회복을 경험하세요.</p>
                                </hgroup>

                                <div class="basic-slider" <?= $aos_left_slow ?>>
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

                                <a href="pages/hospital/facility.php" class="basic-btn no-body-lg fw600 no-mg-40--t">
                                    시설 더보기
                                </a>
                            </div>
                        </section>


                        <section class="no-main-location no-pd-48--t no-pd-64--b">
                            <div class="no-container-sm">
                                <hgroup class="--tac fade-up no-mg-24--b">
                                    <h2 class="no-heading-sl">치유로 향하는 첫 걸음</h2>
                                    <p class="no-body-lg fw300">건강한 변화를 향한 여정,<br>
                                        지금 면력에서 시작하세요.</p>
                                </hgroup>
                            </div>

                            <div id="daumRoughmapContainer1752029358628"
                                class="root_daum_roughmap root_daum_roughmap_landing"></div>

                            <script charset="UTF-8" class="daum_roughmap_loader_script"
                                src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>

                            <script charset="UTF-8">
                            new daum.roughmap.Lander({
                                "timestamp": "1752029358628",
                                "key": "4x538kgm8z4",
                                "mapWidth": "100%",
                                "mapHeight": "200"
                            }).render();
                            </script>

                            <div class="no-container-sm">
                                <a href="#" class="basic-btn no-body-lg fw600 no-mg-24--t">
                                    오시는 길
                                </a>
                            </div>
                        </section>

                        <?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>

                        <?php include_once $STATIC_ROOT . '/inc/layouts/floating-bottom.php'; ?>
                    </div>

                    <?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>

                    <?php include_once $STATIC_ROOT . '/inc/layouts/floating-bottom.php'; ?>
                </div>
            </div>
    </section>
</main>