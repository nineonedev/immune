<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>

<?php
    $data1 = getNonpayItemsByPrimaryCategory(1); // 행위료
    $data2 = getNonpayItemsByPrimaryCategory(2); // 약제비
    
?>
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
                    <?php include_once $STATIC_ROOT . '/inc/shared/sub.nav-board.php'; ?>

                    <div class="no-cancer no-neuro no-rehab no-nonpayment">
                        <section class="no-review-top no-pd-48--t">
                            <div class="no-container-sm">
                                <hgroup class="--tac no-mg-48--b">
                                    <h2 class="no-heading-sm">비급여안내</h2>
                                </hgroup>

                                <div class="no-search-result no-mg-8--b">
                                    <div class="search-guide bg">
                                        <p class="bullet no-body-lg fw300">비급여란, 건강보험의 혜택이 적용되지 않는 항목을 말합니다.</p>
                                        <p class="bullet no-body-lg fw300">개별 항목의 1회 비용으로 처방에 따라 항목의 비용이 달라질 수 있습니다.</p>
                                    </div>
                                </div>

                                <ul class="cartegory-wrap v2">
                                    <li>
                                        <a href="#" class="active no-body-lg fw300">
                                            행위료
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="no-body-lg fw300">
                                            약제비
                                        </a>
                                    </li>
                                </ul>

                                <p class="no-body-xs fw300 wgray --tar no-mg-8--t edit">최종변경일.00.00.00</p>
                            </div>
                        </section>

                        <section class="no-nonpayment-table-wrap no-pd-24--t no-pd-48--b">
                            <div class="no-container-sm">
                                <ul class="table-list active" data-index="0">
                                    <?php foreach ($data1 as $secondaryTitle => $items): ?>
                                    <li class="fade-up">
                                        <h3 class="no-body-xl fw700 blue --tac title">
                                            <?= htmlspecialchars($secondaryTitle) ?></h3>
                                        <table>
                                            <colgroup>
                                                <col width="50%">
                                                <col width="50%">
                                            </colgroup>
                                            <tbody>
                                                <tr class="top">
                                                    <th class="no-body-lg fw600">명칭</th>
                                                    <th class="no-body-lg fw600">비용</th>
                                                </tr>
                                                <?php foreach ($items as $item): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($item['title']) ?></td>
                                                    <td><?= number_format($item['cost']) ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>

                                <ul class="table-list" data-index="1">
                                    <?php foreach ($data2 as $secondaryTitle => $items): ?>
                                    <li class="fade-up">
                                        <h3 class="no-body-xl fw700 blue --tac title">
                                            <?= htmlspecialchars($secondaryTitle) ?></h3>
                                        <table>
                                            <colgroup>
                                                <col width="50%">
                                                <col width="50%">
                                            </colgroup>
                                            <tbody>
                                                <tr class="top">
                                                    <th class="no-body-lg fw600">명칭</th>
                                                    <th class="no-body-lg fw600">비용</th>
                                                </tr>
                                                <?php foreach ($items as $item): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($item['title']) ?></td>
                                                    <td><?= number_format($item['cost']) ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
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