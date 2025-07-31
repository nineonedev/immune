<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>

<!-- dev -->

<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>
<script src="<?= $ROOT ?>/resource/js/sub.js" <?= date('YmdHis') ?> defer></script>
<!-- css, js  -->

<!-- contents -->

<main>
    <section class="no-cetner-visual">
        <div class="no-container-pc">
            <div class="visual-wrap">
                <?php include_once $STATIC_ROOT . '/inc/shared/pc-info.php'; ?>

                <div class="mobile-visual-wrap">
                    <?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>
                    <?php include_once $STATIC_ROOT . '/inc/shared/sub.nav-depth.php'; ?>

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
										<li class="swiper-slide">
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
                                    <li class="fade-up">
                                        <a href="/pages/hospital/default.view.php">
                                            <figure>
                                                <span class="no-body-xs fw600">신경면역</span>
                                                <img src="/resource/images/review1.jpg">
                                            </figure>

                                            <div class="f-wrap no-gap-8 no-pd-8--x no-mg-16--t">
                                                <h3 class="no-body-xxl fw600">60대 대상포진 신경통, 이걸로 완치했어요!</h3>
                                                <i class=" fa-regular fa-arrow-right i-30"></i>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="fade-up">
                                        <a href="#">
                                            <figure>
                                                <span class="no-body-xs fw600">신경면역</span>
                                                <img src="/resource/images/review1.jpg">
                                            </figure>

                                            <div class="f-wrap no-gap-8 no-pd-8--x no-mg-16--t">
                                                <h3 class="no-body-xxl fw600">60대 대상포진 신경통, 이걸로 완치했어요!</h3>
                                                <i class=" fa-regular fa-arrow-right i-30"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>

                                <?php include_once $STATIC_ROOT . '/inc/layouts/pagination.php'; ?>
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