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
                                        <a href="#" class="active no-body-lg fw300">
                                            입원/퇴원/외출
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="no-body-lg fw300">
                                            진료/처방/본원진료
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="no-body-lg fw300">
                                            입원생활
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="no-body-lg fw300">
                                            식이/영양
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="no-body-lg fw300">
                                            상담/문의/후기
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="no-body-lg fw300">
                                            기타
                                        </a>
                                    </li>
                                </ul>

                                <ul class="faq-list no-mg-64--t">
                                    <li>
                                        <div class="top">
                                            <div class="group">
                                                <p class="no-body-lg fw300 no-mg-4--b">입원/퇴원/외출</p>
                                                <h3 class="no-body-xl fw600">안면신경이완술은 어떤 원리로 효과가 있나요?</h3>
                                            </div>
                                            <div class="plus-icon">
                                                <i class="horizon"></i>
                                                <i class="vertical"></i>
                                            </div>
                                        </div>

                                        <div class="answer">
                                            <span class="blue no-body-lg fw600">답변</span>
                                            <p class="no-body-lg fw300 no-mg-4--t">
                                                안면신경이완술은 한의학적으로 정제된 생약 성분이 안면신경의 손상 부위에 직접 작용하여 염증과 부종을 완화하고, 신경 재생을 촉진합니다. 혈류 개선과 영양 공급을 통해 신경 회복을 가속화하는 원리입니다.
                                            </p>
                                        </div>
                                    </li>
                                </ul>

                                <?php include_once $STATIC_ROOT . '/inc/layouts/pagination.php'; ?>
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