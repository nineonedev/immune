<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php';
$connect = DB::getInstance();

// ==============================
// 요청 파라미터 수집 및 방어 처리
// ==============================
$board_no          = $_REQUEST['board_no']         ?? null;
$category_no       = $_REQUEST['category_no']      ?? null;
$page              = $_REQUEST['page']             ?? 1;
$searchKeyword     = $_REQUEST['searchKeyword']    ?? '';
$searchColumn      = $_REQUEST['searchColumn']     ?? '';
$sdate             = $_REQUEST['sdate']            ?? '';
$edate             = $_REQUEST['edate']            ?? '';
$RtsearchKeyword   = $_REQUEST['RtsearchKeyword']  ?? null;
$RtsearchColumn    = $_REQUEST['RtsearchColumn']   ?? null;

// 배열 방어 처리
$category_no       = is_array($category_no) ? null : $category_no;
$page              = is_array($page) ? 1 : (int)$page;
$searchKeyword     = is_array($searchKeyword) ? '' : $searchKeyword;
$searchColumn      = is_array($searchColumn) ? '' : $searchColumn;

// base64 디코딩 처리 (방어 포함)
if (!is_array($RtsearchKeyword) && $RtsearchKeyword) {
    $searchKeyword = base64_decode($RtsearchKeyword);
}
if (!is_array($RtsearchColumn) && $RtsearchColumn) {
    $searchColumn = base64_decode($RtsearchColumn);
}

// ==============================
// 게시판 설정 및 권한 확인
// ==============================
$board_info        = getBoardInfoByNo($board_no)         ?? [];
$role_info         = getBoardRole($board_no, $NO_USR_LEV) ?? [];
$boardManage_info  = getBoardManageInfoByNo($board_no)   ?? [];
$boardCategory     = getBoardCategory($board_no)         ?? [];

if (($board_info[0]['isOpen'] ?? 'Y') === "N") {
    if (!$role_info) {
        alert("게시판 권한 설정이 먼저 필요합니다.");
        exit;
    }
    if (($role_info[0]['role_list'] ?? 'N') === "N") {
        error("열람 권한이 없습니다.", "/pages/member/login.php");
        exit;
    }
}

$skin = $board_info[0]['skin'] ?? 'default';

// ==============================
// SQL 조건 구성
// ==============================
$mainqry = " WHERE a.sitekey = :sitekey";

if ($board_no)      $mainqry .= " AND a.board_no = :board_no";
if ($category_no)   $mainqry .= " AND a.category_no = :category_no";
if ($searchKeyword) {
    $mainqry .= " AND (REPLACE(a.title, ' ', '') LIKE :searchKeyword OR REPLACE(a.contents, ' ', '') LIKE :searchKeyword)";
    $searchKeyword = '%' . trim($searchKeyword) . '%';
}
if ($sdate && $edate) {
    $mainqry .= " AND (DATE_FORMAT(a.regdate, '%Y-%m-%d') BETWEEN :sdate AND :edate)";
}

// ==============================
// 페이징 처리
// ==============================
$perpage       = (int)($_REQUEST['perpage'] ?? ($board_info[0]['list_size'] ?? 10));
$listRowCnt    = $perpage;
$listCurPage   = $page;
$count         = ($listCurPage * $listRowCnt) - $listRowCnt;

// ==============================
// 데이터 수 조회
// ==============================
$countQuery = "SELECT COUNT(*) AS cnt FROM nb_board a $mainqry";
$stmt = $connect->prepare($countQuery);

$params = [
    ':sitekey'        => $NO_SITE_UNIQUE_KEY,
    ':board_no'       => $board_no,
    ':category_no'    => $category_no,
    ':searchKeyword'  => $searchKeyword,
    ':sdate'          => $sdate,
    ':edate'          => $edate,
];

$stmt->execute(array_filter($params));
$totalCnt = $stmt->fetchColumn();
$Page     = (int)ceil($totalCnt / $listRowCnt);

// ==============================
// 실제 데이터 조회
// ==============================
$dataQuery = "
    SELECT a.*, b.title AS board_name, c.name AS category_name
    FROM nb_board a
    LEFT JOIN nb_board_manage b ON a.board_no = b.no
    LEFT JOIN nb_board_category c ON a.category_no = c.no
    $mainqry
    ORDER BY a.is_notice='Y' DESC, a.regdate DESC
    LIMIT $count, $listRowCnt
";
$stmt = $connect->prepare($dataQuery);
$stmt->execute(array_filter($params));
$arrResultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);

// ==============================
// 기타 변수
// ==============================
$rnumber      = $totalCnt - (($listCurPage - 1) * $listRowCnt);
$board_title  = $board_info[0]['title'] ?? '';

// ==============================
// 이후 템플릿 렌더링에서 사용
// ex) include skin view
// ==============================
?>



<!-- HTML & PHP Integration -->

<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>
<script src="<?= $ROOT ?>/resource/js/sub.js" <?= date('YmdHis') ?> defer></script>
<?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>

<main>
    <form id="frm" name="frm" method="get" autocomplete='off'>
        <input type="hidden" id="board_no" name="board_no" value="<?= htmlspecialchars($board_no) ?>">
        <input type="hidden" id="category_no" name="category_no" value="<?= htmlspecialchars($category_no) ?>">
        <input type="hidden" id="mode" name="mode" value="">
        <?php
            switch($skin) {
                case "bbs":  include __DIR__."/skin/skin.list.php"; break;
                case "gal":   include __DIR__."/skin/skin.gallery.php"; break;
                case "faq":   include __DIR__."/skin/skin.faq.php"; break;
            }
        ?>
    </form>
</main>

<?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>

<script type="text/javascript" src="<?=$NO_IS_SUBDIR?>/pages/board/js/board.js?v=<?=$STATIC_FRONT_JS_MODIFY_DATE?>">
</script>