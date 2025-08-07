<?php
    $prevDisabled = ($listCurPage <= 1);
    $nextDisabled = ($listCurPage >= $Page);
?>
<?php if ($Page > 0): ?>
<div class="no-pagination">
    <ul class="no-page-list">
        <!-- 이전 페이지 -->
        <li class="no-page-item <?= $prevDisabled ? 'disabled' : '' ?>">
            <?php if (!$prevDisabled): ?>
            <a href="javascript:void(0);" class="no-page-link"
                onClick="goListMove(<?= $listCurPage - 1 ?>, '<?= htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8') ?>');">
                <i class="bx bx-chevron-left"></i>
            </a>
            <?php else: ?>
            <a href="javascript:void(0);" class="no-page-link" aria-disabled="true">
                <i class="bx bx-chevron-left"></i>
            </a>
            <?php endif; ?>
        </li>

        <!-- 숫자 페이지 -->
        <?php
        for ($x = ($listCurPage - $pageBlock); $x < (($listCurPage + $pageBlock) + 1); $x++) {
            if ($x > 0 && $x <= $Page):
        ?>
        <li class="no-page-item <?= $x == $listCurPage ? 'active' : '' ?>">
            <?php if ($x == $listCurPage): ?>
            <a href="javascript:void(0);" class="no-page-link active"><?= $x ?></a>
            <?php else: ?>
            <a href="javascript:void(0);"
                onClick="goListMove(<?= $x ?>, '<?= htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8') ?>');"
                class="no-page-link"><?= $x ?></a>
            <?php endif; ?>
        </li>
        <?php endif; } ?>

        <!-- 다음 페이지 -->
        <li class="no-page-item <?= $nextDisabled ? 'disabled' : '' ?>">
            <?php if (!$nextDisabled): ?>
            <a href="javascript:void(0);" class="no-page-link"
                onClick="goListMove(<?= $listCurPage + 1 ?>, '<?= htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8') ?>');">
                <i class="bx bx-chevron-right"></i>
            </a>
            <?php else: ?>
            <a href="javascript:void(0);" class="no-page-link" aria-disabled="true">
                <i class="bx bx-chevron-right"></i>
            </a>
            <?php endif; ?>
        </li>
    </ul>
</div>
<?php endif; ?>


<style>
.no-page-item.disabled a {
    pointer-events: none;
    opacity: 0.4;
    cursor: default;
}
</style>

<script>
function goListMove(start, url) {
    const form = document.getElementById('frm');
    const pageInput = document.createElement('input');
    pageInput.type = 'hidden';
    pageInput.name = 'page';
    pageInput.value = start;
    form.appendChild(pageInput);
    form.setAttribute('action', url);
    form.submit();
}
</script>