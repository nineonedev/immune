<?php if ($Page > 0): ?>
<div class="no-pagination">
    <ul class="no-page-list">
        <?php if ($listCurPage > 1): 
            $prevpage = $listCurPage - 1;
        ?>
        <li class="no-page-item">
            <a href="javascript:void(0);" class="no-page-link"
                onClick="goListMove(<?= $prevpage ?>, '<?= htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8') ?>');">
                <i class="bx bx-chevron-left"></i>
            </a>
        </li>
        <?php else: ?>
        <li class="no-page-item">
            <a href="javascript:void(0);" class="no-page-link">
                <i class="bx bx-chevron-left"></i>
            </a>
        </li>
        <?php endif; ?>

        <?php
        for ($x = ($listCurPage - $pageBlock); $x < (($listCurPage + $pageBlock) + 1); $x++) {
            if ($x > 0 && $x <= $Page) {
                if ($x == $listCurPage) {
        ?>
        <li class="no-page-item">
            <a href="javascript:void(0);" class="no-page-link active"><?= $x ?></a>
        </li>
        <?php 
                } else {
        ?>
        <li class="no-page-item">
            <a href="javascript:void(0);"
                onClick="goListMove(<?= $x ?>, '<?= htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8') ?>');"
                class="no-page-link"><?= $x ?></a>
        </li>
        <?php
                }
            }
        }
        ?>

        <?php if ($listCurPage != $Page): 
            $nextpage = $listCurPage + 1;
        ?>
        <li class="no-page-item">
            <a href="javascript:void(0);" class="no-page-link"
                onClick="goListMove(<?= $nextpage ?>, '<?= htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8') ?>');">
                <i class="bx bx-chevron-right"></i>
            </a>
        </li>
        <?php else: ?>
        <li class="no-page-item">
            <a href="javascript:void(0);" class="no-page-link">
                <i class="bx bx-chevron-right"></i>
            </a>
        </li>
        <?php endif; ?>
    </ul>
</div>
<?php endif; ?>

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