<?php
if (!isset($paginator) || !$paginator instanceof Paginator) return;

$pagination = $paginator->getPaginationData();
$baseUrl = strtok($_SERVER['REQUEST_URI'], '?');
$queryParams = $_GET ?? [];

function buildPaginationUrl($page, $baseUrl, $queryParams) {
    return $baseUrl . '?' . http_build_query(array_merge($queryParams, ['page' => $page]));
}

$isFirstPage = $paginator->currentPage <= 1;
$isLastPage  = $paginator->currentPage >= $paginator->totalPages;
?>

<div class="no-pagination">
    <a href="<?= $isFirstPage ? '#' : buildPaginationUrl($pagination['prev'], $baseUrl, $queryParams) ?>"
        class="prev arrow wgray i-24 <?= $isFirstPage ? 'disabled' : '' ?>"
        <?= $isFirstPage ? 'onclick="return false;"' : '' ?>>
        ◣
    </a>

    <ul class="page_num">
        <?php foreach ($pagination['pages'] as $item): ?>
        <?php if ($item['type'] === 'dots'): ?>
        <li><a href="#" class="no-body-md wgray">•••</a></li>
        <?php elseif ($item['type'] === 'page'): ?>
        <li>
            <a href="<?= buildPaginationUrl($item['num'], $baseUrl, $queryParams) ?>"
                class="no-body-md wgray <?= !empty($item['current']) ? 'active' : '' ?>">
                <?= $item['num'] ?>
            </a>
        </li>
        <?php endif; ?>
        <?php endforeach; ?>
    </ul>

    <a href="<?= $isLastPage ? '#' : buildPaginationUrl($pagination['next'], $baseUrl, $queryParams) ?>"
        class="prev arrow wgray i-24 <?= $isLastPage ? 'disabled' : '' ?>"
        <?= $isLastPage ? 'onclick="return false;"' : '' ?>>
        ◥
    </a>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.no-pagination a.disabled').forEach(a => {
        a.addEventListener('click', e => e.preventDefault());
    });
});
</script>

<style>
.no-pagination a.disabled {
    pointer-events: none;
    opacity: 0.4;
    cursor: default;
}
</style>