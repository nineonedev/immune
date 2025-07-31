<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php';
$connect = DB::getInstance();

$no = (int)($_REQUEST['no'] ?? 0);
$board_no = (int)($_REQUEST['board_no'] ?? 0);

$searchKeyword = $_REQUEST['searchKeyword'] ?? '';
$searchColumn = $_REQUEST['searchColumn'] ?? '';
$page = (int)($_REQUEST['page'] ?? 1);

// 게시물 정보 조회
$query = "SELECT a.*, c.name as category_name  
          FROM nb_board a
		  LEFT JOIN nb_board_category as c on a.category_no = c.no 
          WHERE a.no = :no";
$stmt = $connect->prepare($query);
$stmt->bindParam(':no', $no, PDO::PARAM_INT);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);

// 게시물 데이터 확인
if (!$data) {
    error("정보를 찾을 수 없습니다");
}

// 게시판 정보와 역할 정보 조회
$board_info = getBoardInfoByNo($board_no);
$role_info = getBoardRole($board_no, $NO_USR_LEV);

// 비밀글 확인
if ($data['is_secret'] === "Y" && ($_SESSION['board_secret_confirmed_' . $no] ?? "N") !== "Y") {
    error("비밀번호 확인이 필요한 게시물입니다.");
}

// 열람 권한 확인
if (($board_info[0]['isOpen'] ?? "N") === "N" && $NO_USR_NO !== $data['user_no']) {
    alert("열람 권한이 없습니다.");
    exit;
}

// 조회수 증가 처리 (중복 방지 세션 확인)
if (!isset($_SESSION['nb_board_view_count'])) {
    $query = "UPDATE nb_board SET read_cnt = read_cnt + 1 WHERE no = :no AND board_no = :board_no";
    $stmt = $connect->prepare($query);
    $stmt->bindParam(':no', $no, PDO::PARAM_INT);
    $stmt->bindParam(':board_no', $board_no, PDO::PARAM_INT);
    $stmt->execute();
    $_SESSION['nb_board_view_count'] = time();
}

// 게시판 제목 및 목록 페이지 URL 생성
$board_title = $board_info[0]['title'] ?? '게시판';
$go_to_list = "./board.list.php?board_no=" . $board_no . "&RtsearchKeyword=" . urlencode($searchKeyword) . "&RtsearchColumn=" . urlencode($searchColumn) . "&page=" . $page;


?>

<!-- Head -->
<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>

<!-- 스타일, 스크립트  -->
<script type="text/javascript" src="<?= $NO_IS_SUBDIR ?>/pages/board/js/board.js?v=<?= $STATIC_FRONT_JS_MODIFY_DATE ?>">
</script>

<!-- Header -->
<?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>

<main>
    <form id="frm" name="frm" method="post">
        <input type="hidden" id="mode" name="mode" value="">
        <input type="hidden" id="comment_no" name="comment_no" value="">
        <input type="hidden" id="no" name="no" value="<?= $no ?>">
        <input type="hidden" id="board_no" name="board_no" value="<?= $board_no ?>">
        <input type="hidden" id="returnUrl" value="">
        <?php
			if ($board_no != 9) { 
				include_once $STATIC_ROOT."/pages/board/view/view.default.php";
			}
			?>

        <?php
			if ($board_no == 9) {
				include_once $STATIC_ROOT."/pages/board/view/view.doctor.php";
			}
			?>
    </form>
</main>

<?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>