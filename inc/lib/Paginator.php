<?php
class Paginator {
    public int $currentPage;
    public int $perPage;
    public int $totalItems;
    public int $totalPages;

    public function __construct(int $totalItems, int $currentPage = 1, int $perPage = 10) {
        $this->totalItems  = $totalItems;
        $this->perPage     = $perPage;
        $this->totalPages  = (int)ceil($totalItems / $perPage);
        $this->currentPage = max(1, min($currentPage, $this->totalPages));
    }

    public function getOffset(): int {
        return ($this->currentPage - 1) * $this->perPage;
    }

    public function getLimit(): int {
        return $this->perPage;
    }

    public function getPaginationData(): array {
        $pages = [];
        $range = 2;
        $start = max(1, $this->currentPage - $range);
        $end = min($this->totalPages, $this->currentPage + $range);

        if ($start > 1) {
            $pages[] = ['type' => 'page', 'num' => 1];
            if ($start > 2) {
                $pages[] = ['type' => 'dots'];
            }
        }

        for ($i = $start; $i <= $end; $i++) {
            $pages[] = ['type' => 'page', 'num' => $i, 'current' => ($i === $this->currentPage)];
        }

        if ($end < $this->totalPages) {
            if ($end < $this->totalPages - 1) {
                $pages[] = ['type' => 'dots'];
            }
            $pages[] = ['type' => 'page', 'num' => $this->totalPages];
        }

        return [
            'prev' => max(1, $this->currentPage - 1),
            'next' => min($this->totalPages, $this->currentPage + 1),
            'pages' => $pages
        ];
    }


}