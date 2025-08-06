<?php

interface SearchFilterInterface {
    public function getWhere(): string;
    public function getParams(): array;
}

class SearchQueryBuilder {
    private SearchFilterInterface $filter;

    public function __construct(SearchFilterInterface $filter) {
        $this->filter = $filter;
    }

    public function getWhere(): string {
        return $this->filter->getWhere();
    }

    public function getParams(): array {
        return $this->filter->getParams();
    }
}

class FaqFilter implements SearchFilterInterface {
    private array $params = [];
    private string $whereClause = '';

    public function __construct(array $filters) {
        $this->build($filters);
    }

    private function build(array $filters): void {
        $wheres = ["f.is_active = 1"];

        if (!empty($filters['branch'])) {
            $wheres[] = "br.name = :branchName";
            $this->params[':branchName'] = $filters['branch'];
        }

        if (!empty($filters['category'])) {
            $wheres[] = "f.categories = :category";
            $this->params[':category'] = $filters['category'];
        }

        if (!empty($filters['keyword'])) {
            $wheres[] = "f.question LIKE :keyword";
            $this->params[':keyword'] = '%' . $filters['keyword'] . '%';
        }

        $this->whereClause = count($wheres) ? ' AND ' . implode(' AND ', $wheres) : '';
    }

    public function getWhere(): string {
        return $this->whereClause;
    }

    public function getParams(): array {
        return $this->params;
    }
}

class GlobalFilter implements SearchFilterInterface {
    private array $params = [];
    private string $whereClause = '';

    public function __construct(array $filters) {
        $this->build($filters);
    }

    private function build(array $filters): void {
        $wheres = [];

        if (!empty($filters['branch'])) {
            $wheres[] = "br.name = :branchName";
            $this->params[':branchName'] = $filters['branch'];
        }

        if (!empty($filters['keyword'])) {
            $keyword = '%' . $filters['keyword'] . '%';
            $wheres[] = "(f.question LIKE :keyword OR f.answer LIKE :keyword OR f.categories LIKE :keyword)";
            $this->params[':keyword'] = $keyword;
        }

        $this->whereClause = count($wheres) ? ' AND ' . implode(' AND ', $wheres) : '';
    }

    public function getWhere(): string {
        return $this->whereClause;
    }

    public function getParams(): array {
        return $this->params;
    }
}

class BoardFilter implements SearchFilterInterface {
    private array $params = [];
    private string $whereClause = '';

    public function __construct(array $filters) {
        $this->build($filters);
    }

    private function build(array $filters): void {
        $wheres = [];

        $wheres[] = "a.sitekey = :sitekey";
        $this->params[':sitekey'] = $filters['sitekey'];

        if (!empty($filters['board_no'])) {
            $wheres[] = "a.board_no = :board_no";
            $this->params[':board_no'] = $filters['board_no'];
        }

        if (!empty($filters['category_no'])) {
            $wheres[] = "a.category_no = :category_no";
            $this->params[':category_no'] = $filters['category_no'];
        }

        if (!empty($filters['searchKeyword'])) {
            $keyword = '%' . trim($filters['searchKeyword']) . '%';
            $wheres[] = "(REPLACE(a.title, ' ', '') LIKE :searchKeyword OR REPLACE(a.contents, ' ', '') LIKE :searchKeyword)";
            $this->params[':searchKeyword'] = $keyword;
        }

        if (!empty($filters['sdate']) && !empty($filters['edate'])) {
            $wheres[] = "(DATE_FORMAT(a.regdate, '%Y-%m-%d') BETWEEN :sdate AND :edate)";
            $this->params[':sdate'] = $filters['sdate'];
            $this->params[':edate'] = $filters['edate'];
        }

        $this->whereClause = count($wheres) ? ' WHERE ' . implode(' AND ', $wheres) : '';
    }

    public function getWhere(): string {
        return $this->whereClause;
    }

    public function getParams(): array {
        return $this->params;
    }
}


class GlobalSearchFilter implements SearchFilterInterface {
    private array $params = [];
    private string $whereClause = '';

    public function __construct(array $filters) {
        $this->build($filters);
    }

    private function build(array $filters): void {
        $wheres = [];

        if (!empty($filters['branch'])) {
            $wheres[] = "br.name = :branchName";
            $this->params[':branchName'] = $filters['branch'];
        }

        if (!empty($filters['keyword'])) {
            $keyword = '%' . trim($filters['keyword']) . '%';
            $wheres[] = "(f.question LIKE :keyword OR f.answer LIKE :keyword OR f.categories LIKE :keyword)";
            $this->params[':keyword'] = $keyword;
        }

        if (!empty($filters['category'])) {
            $wheres[] = "f.categories = :category";
            $this->params[':category'] = $filters['category'];
        }

        $this->whereClause = count($wheres) ? ' AND ' . implode(' AND ', $wheres) : '';
    }

    public function getWhere(): string {
        return $this->whereClause;
    }

    public function getParams(): array {
        return $this->params;
    }
}