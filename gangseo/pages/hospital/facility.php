<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php';

// 배너 가져오기
$banners = getBannersByBranch('gangseo', 5, 1);
$banner = $banners[0] ?? null;

// 강서 지점 시설 정보 - 카테고리별
$facilities1 = getFacilities('gangseo', 1);
$facilities2 = getFacilities('gangseo', 2);
$facilities3 = getFacilities('gangseo', 3);
$facilities4 = getFacilities('gangseo', 4);

?>


<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>
<script src="<?= $ROOT ?>/resource/js/sub.js" <?= date('YmdHis') ?> defer></script>

<!-- css, js  -->

<!-- contents -->
<main>

    <?php
    $banners = getBannersByBranch('gangseo', 5);
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
                    <?php include_once $STATIC_ROOT . '/inc/shared/sub.nav-board.php'; ?>

                    <div class="no-cancer no-neuro no-rehab no-facility">

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
                                            <h2 class="no-heading-sm fw400 --tac black"><?= $banner['description'] ?></h2>
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

                        <!-- VIP 입원실 -->
                        <section class="no-cancer-sub-thyroid-guide facility no-pd-48--y">
                            <div class="no-container-sm">
                                <div class="left-slider" <?= $aos_left_slow ?>>
                                    <h3 class="no-heading-sm no-mg-20--b">VIP 입원실</h3>
                                    <ul class="swiper-wrapper facility-list">
                                        <?php foreach ($facilities1 as $v):
                                            $title = $v['title'];
                                            $imgSrc = !empty($v['thumb_image']) ? '/uploads/facilities/' . $v['thumb_image'] : '';
                                        ?>
                                            <li class="swiper-slide">
                                                <figure>
                                                    <img src="<?= $imgSrc ?>" alt="<?= htmlspecialchars($title) ?>">
                                                    <figcaption><?= htmlspecialchars($title) ?></figcaption>
                                                </figure>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>

                                <hgroup class="no-mg-20--t">
                                    <h3 class="no-body-xl fw300">특별한 당신을 위해<br>
                                        한 차원 더 높은 기준을 제시합니다.</h3>
                                    <p class="no-body-lg fw300 no-mg-8--t gray">프라이버시를 보장하는 아늑한 공간에서 몸과 마음을 치유하며, 진정한
                                        휴식을 경험하세요.</p>
                                </hgroup>

                                <ul class="room-point no-mg-24--t list-js">
                                    <li>
                                        <figure><img src="/resource/images/icon/blue-room-point1.svg"></figure>
                                        <h3 class="no-mg-8--t no-body-lg fw300">모션베드</h3>
                                    </li>

                                    <li>
                                        <figure><img src="/resource/images/icon/blue-room-point2.svg"></figure>
                                        <h3 class="no-mg-8--t no-body-lg fw300">개인 냉장고</h3>
                                    </li>

                                    <li>
                                        <figure><img src="/resource/images/icon/blue-room-point3.svg"></figure>
                                        <h3 class="no-mg-8--t no-body-lg fw300">Smart TV</h3>
                                    </li>

                                    <li>
                                        <figure><img src="/resource/images/icon/blue-room-point4.svg"></figure>
                                        <h3 class="no-mg-8--t no-body-lg fw300">안마의자</h3>
                                    </li>

                                    <li>
                                        <figure><img src="/resource/images/icon/blue-room-point5.svg"></figure>
                                        <h3 class="no-mg-8--t no-body-lg fw300">Wi-fi</h3>
                                    </li>

                                    <li>
                                        <figure><img src="/resource/images/icon/blue-room-point6.svg"></figure>
                                        <h3 class="no-mg-8--t no-body-lg fw300">병실 내 샤워실</h3>
                                    </li>
                                </ul>
                            </div>
                        </section>


                        <section class="no-cancer-sub-thyroid-guide facility no-pd-48--y">
                            <div class="no-container-sm">
                                <div class="left-slider" <?= $aos_left_slow ?>>
                                    <h3 class="no-heading-sm no-mg-20--b">다인입원실</h3>
                                    <ul class="swiper-wrapper facility-list">
                                        <?php foreach ($facilities2 as $v):
                                            $title = $v['title'];
                                            $imgSrc = !empty($v['thumb_image']) ? '/uploads/facilities/' . $v['thumb_image'] : '';
                                        ?>
                                            <li class="swiper-slide">
                                                <figure>
                                                    <img src="<?= $imgSrc ?>" alt="<?= htmlspecialchars($title) ?>">
                                                    <figcaption><?= htmlspecialchars($title) ?></figcaption>
                                                </figure>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <hgroup class="no-mg-20--t">
                                    <h3 class="no-body-xl fw300">모두를 위한 편안함과<br>
                                        세심한 배려를 담았습니다.</h3>
                                    <p class="no-body-lg fw300 no-mg-8--t gray">아늑한 공간과 효율적인 동선으로 진료와 휴식의 조화를 이루며, 함께하는
                                        시간을 더 편안하게 만들어 드립니다.</p>
                                </hgroup>

                                <ul class="room-point no-mg-24--t list-js">
                                    <li>
                                        <figure><img src="/resource/images/icon/blue-room-point1.svg"></figure>
                                        <h3 class="no-mg-8--t no-body-lg fw300">모션베드</h3>
                                    </li>

                                    <li>
                                        <figure><img src="/resource/images/icon/blue-room-point2.svg"></figure>
                                        <h3 class="no-mg-8--t no-body-lg fw300">개인 냉장고</h3>
                                    </li>

                                    <li>
                                        <figure><img src="/resource/images/icon/blue-room-point3.svg"></figure>
                                        <h3 class="no-mg-8--t no-body-lg fw300">Smart TV</h3>
                                    </li>

                                    <li>
                                        <figure><img src="/resource/images/icon/blue-room-point2-4.svg"></figure>
                                        <h3 class="no-mg-8--t no-body-lg fw300">개인캐비넷</h3>
                                    </li>

                                    <li>
                                        <figure><img src="/resource/images/icon/blue-room-point5.svg"></figure>
                                        <h3 class="no-mg-8--t no-body-lg fw300">Wi-fi</h3>
                                    </li>

                                    <li>
                                        <figure><img src="/resource/images/icon/blue-room-point6.svg"></figure>
                                        <h3 class="no-mg-8--t no-body-lg fw300">병실 내 샤워실</h3>
                                    </li>
                                </ul>
                            </div>
                        </section>



                        <section class="no-cancer-sub-thyroid-guide facility no-pd-48--y">
                            <div class="no-container-sm">
                                <div class="left-slider" <?= $aos_left_slow ?>>
                                    <h3 class="no-heading-sm no-mg-20--b">회복을 끌어 올리는 다양한 치료공간</h3>
                                    <ul class="swiper-wrapper facility-list">
                                        <?php foreach ($facilities3 as $v):
                                            $title = $v['title'];
                                            $imgSrc = !empty($v['thumb_image']) ? '/uploads/facilities/' . $v['thumb_image'] : '';
                                        ?>
                                            <li class="swiper-slide">
                                                <figure>
                                                    <img src="<?= $imgSrc ?>" alt="<?= htmlspecialchars($title) ?>">
                                                    <figcaption><?= htmlspecialchars($title) ?></figcaption>
                                                </figure>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <hgroup class="no-mg-20--t">
                                    <h3 class="no-body-xl fw300">치유를 위한 최적의 공간을 제공합니다.</h3>
                                    <p class="no-body-lg fw300 no-mg-8--t gray">
                                        효율적이고 안락한 치료 환경에서, 몸과 마음의 회복이 조화롭게 이루어질 수 있도록 세심하게 설계했습니다.
                                    </p>
                                </hgroup>
                            </div>
                        </section>




                        <section class="no-cancer-sub-thyroid-guide facility no-pd-48--y">
                            <div class="no-container-sm">
                                <div class="left-slider" <?= $aos_left_slow ?>>
                                    <h3 class="no-heading-sm no-mg-20--b">회복을 끌어 올리는 다양한 치료공간</h3>
                                    <ul class="swiper-wrapper facility-list">
                                        <?php foreach ($facilities4 as $v):
                                            $title = $v['title'];
                                            $imgSrc = !empty($v['thumb_image']) ? '/uploads/facilities/' . $v['thumb_image'] : '';
                                        ?>
                                            <li class="swiper-slide">
                                                <figure>
                                                    <img src="<?= $imgSrc ?>" alt="<?= htmlspecialchars($title) ?>">
                                                    <figcaption><?= htmlspecialchars($title) ?></figcaption>
                                                </figure>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <hgroup class="no-mg-20--t">
                                    <h3 class="no-body-xl fw300">몸과 마음이 쉬어가는 힐링의 공간.</h3>
                                    <p class="no-body-lg fw300 no-mg-8--t gray">편안하고 아늑한 환경에서 진정한 휴식과 재충전을 경험하세요.</p>
                                </hgroup>
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