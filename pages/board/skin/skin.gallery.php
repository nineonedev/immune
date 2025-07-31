<?php
	if ($board_no == 9) {
?>

<main>
	<section class="no-cetner-visual">
		<div class="no-container-pc">
			<div class="visual-wrap">
				<?php include_once $STATIC_ROOT . '/inc/shared/pc-info.php'; ?>

				<div class="mobile-visual-wrap">
					<?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>
					<?php include_once $STATIC_ROOT . '/inc/shared/sub.nav-board.php'; ?>

					<div class="no-cancer no-neuro no-rehab no-doctor">
						<section class="no-doctor-ceo no-pd-48--y">

							<h2 class="no-heading-sm --tac fade-up">환자분들의 <br>
								편안한 치료를 위해<br>
								<b class="fw700 blue">면력은 노력합니다.</b>
							</h2>

							<?php
							$noticeItem = null;
							foreach ($arrResultSet as $v) {
								if (isset($v['is_notice']) && $v['is_notice'] === 'Y') {
									$noticeItem = $v;
									break;
								}
							}
							if ($noticeItem):
								$title = iconv_substr($noticeItem['title'], 0, 2000, "utf-8");
								$contents = strip_tags(html_entity_decode($noticeItem['contents'], ENT_QUOTES, 'UTF-8'));
								$contents = iconv_substr($contents, 0, 500, "utf-8");
								$link = "./board.view.php?board_no=$board_no&no={$noticeItem['no']}&searchKeyword=" . base64_encode($searchKeyword) . "&searchColumn=" . base64_encode($searchColumn) . "&page=$page&category_no=$category_no";

								$imgSrc = "";
								if (!empty($noticeItem['thumb_image'])) {
									$imgSrc = $UPLOAD_WDIR_BOARD . "/" . $noticeItem['thumb_image'];
								}

								$target = '_self';
							?>
							<figure class="no-mg-16--t">
								<img src="<?= $imgSrc ?>" alt="<?= $title ?>" class="fade-up">
							</figure>

							<div class="no-container-sm">
								<a href="<?= $link ?>" class="f-wrap no-mg-16--t">
									<div class="txt">
										<h3 class="no-heading-sm"><?= $title ?></h3>
										<p class="no-body-lg fw600"><?= $v['category_name'] ?><b class="blue"><?= $v['extra1'] ?></b></p>
									</div>

									<i class=" fa-regular fa-arrow-right i-30"></i>
								</a>
							</div>
							<?php endif; ?>
						</section>

						<section class="no-doctor-members no-pd-48--y">
							<div class="no-container-sm">
								<ul class="doctor-list">
									<?php foreach ($arrResultSet as $k => $v): ?>
									<?php if (isset($v['is_notice']) && $v['is_notice'] === 'Y') continue; ?>

									<?php
										$title = iconv_substr($v['title'], 0, 2000, "utf-8");
										$contents = strip_tags(html_entity_decode($v['contents'], ENT_QUOTES, 'UTF-8'));
										$contents = iconv_substr($contents, 0, 500, "utf-8");
										$link = "./board.view.php?board_no=$board_no&no={$v['no']}&searchKeyword=" . base64_encode($searchKeyword) . "&searchColumn=" . base64_encode($searchColumn) . "&page=$page&category_no=$category_no";

										$imgSrc = "";
										if (!empty($v['thumb_image'])) {
											$imgSrc = $UPLOAD_WDIR_BOARD . "/" . $v['thumb_image'];
										}

										$target = '_self';
									?>

									<li class="fade-up">
										<a href="<?= $link ?>">
											<figure>
												<img src="<?= $imgSrc ?>" alt="<?= $title ?>" class="fade-up">
											</figure>

											<div class="f-wrap no-mg-16--t">
												<div class="txt">
													<h3 class="no-heading-sm no-mg-8--b"><?= $title ?></h3>
													<p class="no-body-lg fw600"><?= $v['category_name'] ?> <?= $v['extra1'] ?> <span class="no-body-md fw300"><?= $v['extra2'] ?></span></p>
												</div>
												<i class="fa-regular fa-arrow-right i-30"></i>
											</div>
										</a>
									</li>
								<?php endforeach; ?>
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

<?php
	}
?>

<?php
	if ($board_no == 10) {
?>

<main>
    <section class="no-cetner-visual">
        <div class="no-container-pc">
            <div class="visual-wrap">
                <?php include_once $STATIC_ROOT . '/inc/shared/pc-info.php'; ?>

                <div class="mobile-visual-wrap">
                    <?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>
                    <?php include_once $STATIC_ROOT . '/inc/shared/sub.nav-board.php'; ?>

                    <div class="no-cancer no-neuro no-rehab no-facility">
                        <section class="no-cancer-visual">
                            <h2 class="no-heading-sm fw300 --tac fade-up">필요한 치료만,<br>
                                <b class="fw700">진심을 담아</b>
                            </h2>

                            <img src="/resource/images/facility-visual.jpg">
                        </section>

                        <section class="no-cancer-sub-thyroid-guide facility no-pd-48--y">
                            <div class="no-container-sm">
                                <div class="left-slider" <?= $aos_left_slow ?>>
                                    <h3 class="no-heading-sm no-mg-20--b">VIP 입원실</h3>

                                    <ul class="swiper-wrapper facility-list">
										<?php
										foreach ($arrResultSet as $k => $v) {
											if (!isset($v['category_name']) || $v['category_name'] !== 'VIP 입원실') continue;

											$title = iconv_substr($v['title'], 0, 2000, "utf-8");
											$contents = strip_tags(html_entity_decode($v['contents'], ENT_QUOTES, 'UTF-8'));
											$contents = iconv_substr($contents, 0, 500, "utf-8");
											$link = "./board.view.php?board_no=$board_no&no={$v['no']}&searchKeyword=" . base64_encode($searchKeyword) . "&searchColumn=" . base64_encode($searchColumn) . "&page=$page&category_no=$category_no";

											$imgSrc = "";
											if (!empty($v['thumb_image'])) {
												$imgSrc = $UPLOAD_WDIR_BOARD . "/" . $v['thumb_image'];
											}

											$target = '_self';
										?>
											<li class="swiper-slide">
												<figure>
													<img src="<?= $imgSrc ?>" alt="<?= $title ?>">
												</figure>
											</li>
										<?php } ?>
                                    </ul>
                                </div>

                                <hgroup class="no-mg-20--t">
                                    <h3 class="no-body-xl fw300">특별한 당신을 위해<br>
                                        한 차원 더 높은 기준을 제시합니다.</h3>
                                    <p class="no-body-lg fw300 no-mg-8--t gray">프라이버시를 보장하는 아늑한 공간에서 몸과 마음을 치유하며, 진정한 휴식을 경험하세요.</p>
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
                                        <?php
										foreach ($arrResultSet as $k => $v) {
											if (!isset($v['category_name']) || $v['category_name'] !== '다인입원실') continue;

											$title = iconv_substr($v['title'], 0, 2000, "utf-8");
											$contents = strip_tags(html_entity_decode($v['contents'], ENT_QUOTES, 'UTF-8'));
											$contents = iconv_substr($contents, 0, 500, "utf-8");
											$link = "./board.view.php?board_no=$board_no&no={$v['no']}&searchKeyword=" . base64_encode($searchKeyword) . "&searchColumn=" . base64_encode($searchColumn) . "&page=$page&category_no=$category_no";

											$imgSrc = "";
											if (!empty($v['thumb_image'])) {
												$imgSrc = $UPLOAD_WDIR_BOARD . "/" . $v['thumb_image'];
											}

											$target = '_self';
										?>
											<li class="swiper-slide">
												<figure>
													<img src="<?= $imgSrc ?>" alt="<?= $title ?>">
												</figure>
											</li>
										<?php } ?>
                                    </ul>
                                </div>

                                <hgroup class="no-mg-20--t">
                                    <h3 class="no-body-xl fw300">모두를 위한 편안함과<br>
                                        세심한 배려를 담았습니다.</h3>
                                    <p class="no-body-lg fw300 no-mg-8--t gray">아늑한 공간과 효율적인 동선으로 진료와 휴식의 조화를 이루며, 함께하는 시간을 더 편안하게 만들어 드립니다.</p>
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
                                    <h3 class="no-heading-sm no-mg-20--b">회복을 끌어 올리는<br>
                                        다양한 치료공간</h3>

                                    <ul class="swiper-wrapper facility-list">
                                        <?php
										foreach ($arrResultSet as $k => $v) {
											if (!isset($v['category_name']) || $v['category_name'] !== '회복을 끌어 올리는 다양한 치료공간') continue;

											$title = iconv_substr($v['title'], 0, 2000, "utf-8");
											$contents = strip_tags(html_entity_decode($v['contents'], ENT_QUOTES, 'UTF-8'));
											$contents = iconv_substr($contents, 0, 500, "utf-8");
											$link = "./board.view.php?board_no=$board_no&no={$v['no']}&searchKeyword=" . base64_encode($searchKeyword) . "&searchColumn=" . base64_encode($searchColumn) . "&page=$page&category_no=$category_no";

											$imgSrc = "";
											if (!empty($v['thumb_image'])) {
												$imgSrc = $UPLOAD_WDIR_BOARD . "/" . $v['thumb_image'];
											}

											$target = '_self';
										?>
											<li class="swiper-slide">
												<figure>
													<img src="<?= $imgSrc ?>" alt="<?= $title ?>">
												</figure>
											</li>
										<?php } ?>
                                    </ul>
                                </div>

                                <hgroup class="no-mg-20--t">
                                    <h3 class="no-body-xl fw300">치유를 위한 최적의 공간을 제공합니다.</h3>
                                    <p class="no-body-lg fw300 no-mg-8--t gray">효율적이고 안락한 치료 환경에서, 몸과 마음의 회복이 조화롭게 이루어질 수 있도록 세심하게 설계했습니다.</p>
                                </hgroup>
                            </div>
                        </section>

                        <section class="no-cancer-sub-thyroid-guide facility no-pd-48--y">
                            <div class="no-container-sm">
                                <div class="left-slider" <?= $aos_left_slow ?>>
                                    <h3 class="no-heading-sm no-mg-20--b">24시간/365일<br>
                                        힐링 할 수 있는 환경</h3>

                                    <ul class="swiper-wrapper facility-list">
                                        <?php
										foreach ($arrResultSet as $k => $v) {
											if (!isset($v['category_name']) || $v['category_name'] !== '24시간/365일 힐링 할 수 있는 환경') continue;

											$title = iconv_substr($v['title'], 0, 2000, "utf-8");
											$contents = strip_tags(html_entity_decode($v['contents'], ENT_QUOTES, 'UTF-8'));
											$contents = iconv_substr($contents, 0, 500, "utf-8");
											$link = "./board.view.php?board_no=$board_no&no={$v['no']}&searchKeyword=" . base64_encode($searchKeyword) . "&searchColumn=" . base64_encode($searchColumn) . "&page=$page&category_no=$category_no";

											$imgSrc = "";
											if (!empty($v['thumb_image'])) {
												$imgSrc = $UPLOAD_WDIR_BOARD . "/" . $v['thumb_image'];
											}

											$target = '_self';
										?>
											<li class="swiper-slide">
												<figure>
													<img src="<?= $imgSrc ?>" alt="<?= $title ?>">
												</figure>
											</li>
										<?php } ?>
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

<?php
	}
?>

<?php
	if ($board_no == 11) {
?>

<main>
    <section class="no-cetner-visual">
        <div class="no-container-pc">
            <div class="visual-wrap">
                <?php include_once $STATIC_ROOT . '/inc/shared/pc-info.php'; ?>

                <div class="mobile-visual-wrap">
                    <?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>
                    <?php include_once $STATIC_ROOT . '/inc/shared/sub.nav-board.php'; ?>

                    <div class="no-cancer no-neuro no-rehab no-review">
                        <section class="no-review-top no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac no-mg-24--b">
                                    <h2 class="no-heading-sm">나와 비슷한 이야기,<br>
                                        회복의 여정을 확인하세요.</h2>
                                </hgroup>

                                <!-- 검색결과 O -->
                                <div class="search-success">
                                    <p class="no-body-xl fw700 --tac"><b class="blue">‘00’</b>에 대한 검색 결과 입니다.</p>
                                </div>

                                <!-- 검색결과 X -->
                                <div class=" no-search-result">
                                    <p class="no-body-xl fw300 --tac">‘000’에 대한 검색 결과가 없습니다.</p>

                                    <div class="search-guide bg no-mg-32--t">
                                        <p class="bullet no-body-lg fw300">단어의 철자가 정확한지 확인해 주세요.</p>
                                        <p class="bullet no-body-lg fw300">검색어의 수를 줄여서 검색해 보세요.</p>
                                        <p class="bullet no-body-lg fw300">일반적인 검색어로 다시 검색해 보세요.</p>
                                    </div>
                                </div>

                                <div class="header-search-box no-mg-32--y">
                                    <input type="search" name="searchKeyword" placeholder="검색어를 입력해주세요" class="no-body-md">
                                    <button type="button">
                                        <i class="fa-regular fa-magnifying-glass" aria-hidden="true"></i>
                                    </button>
                                </div>

                                <ul class="cartegory-wrap">
                                    <li>
                                        <a href="javascript:void(0);"  onClick="doCategoryClick(0);" class="<?= empty($category_no) ? 'active' : '' ?> no-body-lg fw300">
                                            전체
                                        </a>
                                    </li>
									
									<?php if(count($boardCategory) > 0) : ?>
										<?php
										foreach($boardCategory as $k => $v) :
											$categoryActive = ($category_no == $v['no']) ? "active" : '';
										?>
										<li>
											<a href="javascript:void(0);"  onClick="doCategoryClick(<?= $v['no'] ?>);" class="no-body-lg fw300 <?= $categoryActive ?>">
												<?= $v['name'] ?>
											</a>
										</li>
										<?php endforeach; ?>
									<?php endif; ?>
                                </ul>
                            </div>
                        </section>

                        <section class="no-review-wrap no-pd-48--y">
                            <div class="no-container-sm">
                                <ul class="review-list">
									<?php
									foreach ($arrResultSet as $k => $v) {
										$title = iconv_substr($v['title'], 0, 2000, "utf-8");
										$contents = strip_tags(html_entity_decode($v['contents'], ENT_QUOTES, 'UTF-8'));
										$contents = iconv_substr($contents, 0, 500, "utf-8");
										$link = "./board.view.php?board_no=$board_no&no={$v['no']}&searchKeyword=" . base64_encode($searchKeyword) . "&searchColumn=" . base64_encode($searchColumn) . "&page=$page&category_no=$category_no";

										$imgSrc = "";
										if ($v['thumb_image']) {
											$imgSrc = $UPLOAD_WDIR_BOARD . "/" . $v['thumb_image'];
										}

										$target = '_self';
										$link = $link;
									?>
                                    <li class="fade-up">
                                        <a href="<?= $link ?>">
                                            <figure>
                                                <span class="no-body-xs fw600"><?= $v['category_name'] ?></span>
                                                <img src="<?= $imgSrc ?>" alt="<?= $title ?>">
                                            </figure>

                                            <div class="f-wrap no-gap-8 no-pd-8--x no-mg-16--t">
                                                <h3 class="no-body-xxl fw600"><?= $title ?></h3>
                                                <i class=" fa-regular fa-arrow-right i-30"></i>
                                            </div>
                                        </a>
                                    </li>
									<?php } ?>
                                </ul>

                                <?php include_once $STATIC_ROOT."/pages/board/components/pagination.php"; ?>
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

<?php
	}
?>

<?php
	if ($board_no == 12) {
?>

<?php
$order_by = $_GET['order_by'] ?? 'latest';
$order_sql = ($order_by === 'views') ? 'read_cnt DESC' : 'regdate DESC';

$baseParams = $_GET;
$baseParams['order_by'] = 'latest';
$latestUrl = './board.list.php?' . http_build_query($baseParams);

$baseParams['order_by'] = 'views';
$viewsUrl = './board.list.php?' . http_build_query($baseParams);
?>

<main>
    <section class="no-cetner-visual">
        <div class="no-container-pc">
            <div class="visual-wrap">
                <?php include_once $STATIC_ROOT . '/inc/shared/pc-info.php'; ?>

                <div class="mobile-visual-wrap">
                    <?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>
                    <?php include_once $STATIC_ROOT . '/inc/shared/sub.nav-board.php'; ?>

                    <div class="no-cancer no-neuro no-rehab no-media">
                        <section class="no-cancer-visual">
                            <h2 class="no-heading-sm fw300 --tac fade-up">필요한 치료만,<br>
                                <b class="fw700">진심을 담아</b>
                            </h2>

                            <figure>
                                <img src="/resource/images/media-visual.jpg">
                            </figure>
                        </section>

                        <section class="no-review-wrap no-pd-48--y">
                            <div class="no-container-sm">

                                <ul class="array-option no-mg-16--b f-wrap no-gap-8">
									<li>
										<a href="<?= $latestUrl ?>" class="no-body-lg fw300 gray <?= ($order_by === 'latest' ? 'active' : '') ?>">최신순</a>
									</li>
									<li>
										<a href="<?= $viewsUrl ?>" class="no-body-lg fw300 gray <?= ($order_by === 'views' ? 'active' : '') ?>">조회순</a>
									</li>
								</ul>

                                <ul class="review-list">
									<?php
									foreach ($arrResultSet as $k => $v) {
										$title = iconv_substr($v['title'], 0, 2000, "utf-8");
										$contents = strip_tags(html_entity_decode($v['contents'], ENT_QUOTES, 'UTF-8'));
										$contents = iconv_substr($contents, 0, 500, "utf-8");
										$link = "./board.view.php?board_no=$board_no&no={$v['no']}&searchKeyword=" . base64_encode($searchKeyword) . "&searchColumn=" . base64_encode($searchColumn) . "&page=$page&category_no=$category_no";

										$imgSrc = "";
										if ($v['thumb_image']) {
											$imgSrc = $UPLOAD_WDIR_BOARD . "/" . $v['thumb_image'];
										}

										$target = '_self';
										$link = $link;
									?>
                                    <li class="fade-up">
                                        <a href="<?= $link ?>">
                                            <figure>
                                                <img src="<?= $imgSrc ?>" alt="<?= $title ?>">
                                            </figure>

                                            <div class="f-wrap no-gap-8 no-pd-8--x no-mg-16--t">
                                                <h3 class="no-body-xxl fw600"><?= $title ?></h3>
                                                <i class=" fa-regular fa-arrow-right i-30"></i>
                                            </div>
                                            <p class="no-body-lg fw300 gray no-pd-8--x no-mg-8--t"><?= date("Y.m.d", strtotime($v['regdate'])) ?></p>
                                        </a>
                                    </li>
									<?php } ?>
                                </ul>

                                <?php include_once $STATIC_ROOT."/pages/board/components/pagination.php"; ?>
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

<?php
	}
?>

<?php
	if ($board_no == 13) {
?>

<main>
    <section class="no-cetner-visual">
        <div class="no-container-pc">
            <div class="visual-wrap">
                <?php include_once $STATIC_ROOT . '/inc/shared/pc-info.php'; ?>

                <div class="mobile-visual-wrap">
                    <?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>
                    <?php include_once $STATIC_ROOT . '/inc/shared/sub.nav-board.php'; ?>

                    <div class="no-cancer no-neuro no-rehab">
                        <section class="no-review-top no-pd-48--t no-pd-16--b">
                            <div class="no-container-sm">
                                <hgroup class="--tac no-mg-48--b">
                                    <h2 class="no-heading-sm">함께 나누는 따뜻한 소식,<br>
                                        지금 전해드립니다.</h2>
                                </hgroup>

                                <ul class="cartegory-wrap v2 v3">
									<li>
                                        <a href="javascript:void(0);"  onClick="doCategoryClick(0);" class="<?= empty($category_no) ? 'active' : '' ?> no-body-lg fw300">
                                            전체
                                        </a>
                                    </li>

                                    <?php if(count($boardCategory) > 0) : ?>
										<?php
										foreach($boardCategory as $k => $v) :
											$categoryActive = ($category_no == $v['no']) ? "active" : '';
										?>
										<li>
											<a href="javascript:void(0);"  onClick="doCategoryClick(<?= $v['no'] ?>);" class="no-body-lg fw300 <?= $categoryActive ?>">
												<?= $v['name'] ?>
											</a>
										</li>
										<?php endforeach; ?>
									<?php endif; ?>
                                </ul>
                            </div>
                        </section>

                        <section class="no-review-wrap no-pd-48--b">
                            <div class="no-container-sm">
                                <ul class="review-list">
									<?php
									foreach ($arrResultSet as $k => $v) {
										$title = iconv_substr($v['title'], 0, 2000, "utf-8");
										$contents = strip_tags(html_entity_decode($v['contents'], ENT_QUOTES, 'UTF-8'));
										$contents = iconv_substr($contents, 0, 500, "utf-8");
										$link = "./board.view.php?board_no=$board_no&no={$v['no']}&searchKeyword=" . base64_encode($searchKeyword) . "&searchColumn=" . base64_encode($searchColumn) . "&page=$page&category_no=$category_no";

										$imgSrc = "";
										if ($v['thumb_image']) {
											$imgSrc = $UPLOAD_WDIR_BOARD . "/" . $v['thumb_image'];
										}

										$target = '_self';
										$link = $link;
									?>
                                    <li class="fade-up">
                                        <a href="<?= $link ?>">
                                            <figure>
                                                <img src="<?= $imgSrc ?>" alt="<?= $title ?>">
                                            </figure>

                                            <div class="f-wrap no-gap-8 no-pd-8--x no-mg-16--t">
                                                <h3 class="no-body-xxl fw600"><?= $title ?></h3>
                                                <i class=" fa-regular fa-arrow-right i-30"></i>
                                            </div>
                                            <p class="no-body-lg fw300 gray no-pd-8--x no-mg-8--t"><?= date("Y.m.d", strtotime($v['regdate'])) ?></p>
                                        </a>
                                    </li>
									<?php } ?>
                                </ul>

                                <?php include_once $STATIC_ROOT."/pages/board/components/pagination.php"; ?>
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

<?php
	}
?>


<?php
	if ($board_no == 16) {
?>

<main>
    <section class="no-cetner-visual">
        <div class="no-container-pc">
            <div class="visual-wrap">
                <?php include_once $STATIC_ROOT . '/inc/shared/pc-info.php'; ?>

                <div class="mobile-visual-wrap">
                    <?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>
                    <?php include_once $STATIC_ROOT . '/inc/shared/sub.nav-board.php'; ?>

                    <div class="no-cancer no-neuro no-rehab no-faq">
                        <section class="no-review-top no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac no-mg-24--b">
                                    <h2 class="no-heading-sm">나와 비슷한 이야기,<br>
                                        회복의 여정을 확인하세요.</h2>
                                </hgroup>

                                <!-- 검색결과 O -->
                                <div class="search-success">
                                    <p class="no-body-xl fw700 --tac"><b class="blue">‘입원’</b>에 대한 검색 결과 입니다.</p>
                                </div>

                                <!-- 검색결과 X -->
                                <div class="no-search-result">
                                    <p class="no-body-xl fw300 --tac">‘000’에 대한 검색 결과가 없습니다.</p>

                                    <div class="search-guide bg no-mg-16--t">
                                        <p class="bullet no-body-lg fw300">단어의 철자가 정확한지 확인해 주세요.</p>
                                        <p class="bullet no-body-lg fw300">검색어의 수를 줄여서 검색해 보세요.</p>
                                        <p class="bullet no-body-lg fw300">일반적인 검색어로 다시 검색해 보세요.</p>
                                    </div>
                                </div>

                                <div class="header-search-box no-mg-16--y">
                                    <input type="search" name="searchKeyword" placeholder="검색어를 입력해주세요" class="no-body-md">
                                    <button type="button">
                                        <i class="fa-regular fa-magnifying-glass" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </section>

                        <section class="no-faq-wrap no-neuro-sub-faq no-pd-48--y">
                            <div class="no-container-sm">

                                <ul class="cartegory-wrap">
									<li>
                                        <a href="javascript:void(0);"  onClick="doCategoryClick(0);" class="<?= empty($category_no) ? 'active' : '' ?> no-body-lg fw300">
                                            전체
                                        </a>
                                    </li>

                                    <?php if(count($boardCategory) > 0) : ?>
										<?php
										foreach($boardCategory as $k => $v) :
											$categoryActive = ($category_no == $v['no']) ? "active" : '';
										?>
										<li>
											<a href="javascript:void(0);"  onClick="doCategoryClick(<?= $v['no'] ?>);" class="no-body-lg fw300 <?= $categoryActive ?>">
												<?= $v['name'] ?>
											</a>
										</li>
										<?php endforeach; ?>
									<?php endif; ?>
                                </ul>

                                <ul class="faq-list no-mg-64--t">
									<?php
									foreach ($arrResultSet as $k => $v) {
										$title = iconv_substr($v['title'], 0, 2000, "utf-8");
										$contents = strip_tags(html_entity_decode($v['contents'], ENT_QUOTES, 'UTF-8'));
										$contents = iconv_substr($contents, 0, 500, "utf-8");
										$link = "./board.view.php?board_no=$board_no&no={$v['no']}&searchKeyword=" . base64_encode($searchKeyword) . "&searchColumn=" . base64_encode($searchColumn) . "&page=$page&category_no=$category_no";

										$imgSrc = "";
										if ($v['thumb_image']) {
											$imgSrc = $UPLOAD_WDIR_BOARD . "/" . $v['thumb_image'];
										}

										$target = '_self';
										$link = $link;
									?>
                                    <li>
                                        <div class="top">
                                            <div class="group">
                                                <p class="no-body-lg fw300 no-mg-4--b"><?=$v['category_name']?></p>
                                                <h3 class="no-body-xl fw600"><?= $title ?></h3>
                                            </div>
                                            <div class="plus-icon">
                                                <i class="horizon"></i>
                                                <i class="vertical"></i>
                                            </div>
                                        </div>

                                        <div class="answer">
                                            <span class="blue no-body-lg fw600">답변</span>
                                            <p class="no-body-lg fw300 no-mg-4--t">
                                                <?= $v['extra12'] ?>
                                            </p>
                                        </div>
                                    </li>
									<?php } ?>
                                </ul>

                                <?php include_once $STATIC_ROOT."/pages/board/components/pagination.php"; ?>
                            </div>
                        </section>
                    </div>

                    <?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>

                    <?php include_once $STATIC_ROOT . '/inc/layouts/floating-bottom.php'; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
	}
?>