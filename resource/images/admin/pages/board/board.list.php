<!DOCTYPE html>
<html lang="ko">
<?

include_once "../../../inc/lib/base.class.php";


$depthnum = 1;
$pagenum = 2;

$searchKeyword        = $_REQUEST['searchKeyword'];
$searchColumn        = $_REQUEST['searchColumn'];
$sdate                    = $_REQUEST['sdate'];
$edate                    = $_REQUEST['edate'];
$board_no                = $_REQUEST['board_no'];

$depth1                    = $_REQUEST['depth1'];
$depth2                    = $_REQUEST['depth2'];
$depth3                    = $_REQUEST['depth3'];
$depth4                    = $_REQUEST['depth4'];

$mainqry = " where a.sitekey = '$NO_SITE_UNIQUE_KEY' ";

// 검색 체크
if ($board_no)
    $mainqry .= " and a.board_no = " . $board_no . " ";

if ($depth1) {
    $depth_arr = explode("^", $depth1);
    $mainqry .= " and a.depth1 = " . $depth_arr[0] . " ";
    $depth1 = $depth_arr[0];
}
if ($depth2) {
    $depth_arr = explode("^", $depth2);
    $mainqry .= " and a.depth2 = " . $depth_arr[0] . " ";
    $depth2 = $depth_arr[0];
}
if ($depth3) {
    $depth_arr = explode("^", $depth3);
    $mainqry .= " and a.depth3 = " . $depth_arr[0] . " ";
    $depth3 = $depth_arr[0];
}
if ($depth4) {
    $depth_arr = explode("^", $depth4);
    $mainqry .= " and a.depth4 = " . $depth_arr[0] . " ";
    $depth4 = $depth_arr[0];
}

if ($searchColumn && $searchKeyword) {
    $mainqry .=  " and  ( replace($searchColumn,' ','') like '%" . trim($searchKeyword) . "%' ) ";
}

if ($sdate && $edate) {
    $mainqry .=  " and (DATE_FORMAT(a.regdate, '%Y-%m-%d') between '$sdate' and '$edate')";
}

$page        = $_REQUEST['page']; //페이지 번호
$pages        = $_POST['pages']; //총 페이지 수 
$perpage    = $_POST['perpage']; //한 페이지에 출력될 rows
$total            = $_POST['total']; //전체 레코드 수

/* 페이지에 출력된 페이지 블럭 1, 2, 3, 4, 등 */
$pageBlock    = 10;

if (!$page)
    $page = 1;

if (!$perpage) {
    $perpage = 20;
}

/* 출력될 rows */
$listRowCnt = $perpage;

/* 현재 페이지 */
$listCurPage = $page;


if (!$listCurPage) {
    $listCurPage = 1;
}
$count = $listCurPage * $listRowCnt - $listRowCnt;

$query = " select count(*)  as cnt from nb_board a  $mainqry ";
$result = mysql_query($query);
$data = mysql_fetch_array($result);
if ($data) {
    $totalCnt = $data[cnt];
}


/* 출력되는 페이지수 */
$Page = ceil($totalCnt / $listRowCnt);

$query = " select a.no, a.board_no, a.user_no, a.category_no, a.comment_cnt, a.title, a.contents, a.regdate, a.read_cnt, a.thumb_image, 
						a.is_admin_writed, a.is_notice, a.is_secret, a.secret_pwd, a.write_name, a.isFile
						  ,file_attach_1,file_attach_origin_1 ,file_attach_2,file_attach_origin_2 ,file_attach_3, file_attach_origin_3 ,file_attach_4, file_attach_origin_4 ,file_attach_5, file_attach_origin_5, a.extra1 ,a.extra2 ,a.extra3 ,a.extra4 ,a.extra5, a.extra6, a.extra7, a.extra8 ,a.extra9,a.extra10,a.extra11,a.extra12,a.extra13,a.extra14,a.extra15
						  ,b.title as board_name
						from nb_board a
						left join nb_board_manage b on a.board_no = b.no
						$mainqry  order by  a.is_notice='Y' desc , a.no desc

		limit $count , $listRowCnt 
	";

//echo $query;

$result = mysql_query($query);
$rnumber = $totalCnt - ($listCurPage - 1) * $listRowCnt;


$searchParam = "board_no=" . $board_no . "&page=" . $page . "&sdate=" . $sdate . "&edate=" . $edate;



include_once "../../inc/admin.title.php";
include_once "../../inc/admin.css.php";
include_once "../../inc/admin.js.php";
?>
<style>


</style>
</head>

<body>
    <div class="no-wrap">
        <!-- Header -->
        <?
        include_once "../../inc/admin.header.php";
        ?>

        <!-- Main -->
        <main class="no-app no-container">
            <!-- Drawer -->
            <?
            include_once "../../inc/admin.drawer.php";
            ?>

            <!-- Contents -->
            <form method="POST" name="frm" id="frm" autocomplete="off">
                <input type="hidden" name="mode" id="mode" value="list">
                <input type="hidden" id="depth1" value="<?= $depth1 ?>">
                <input type="hidden" id="depth2" value="<?= $depth2 ?>">
                <input type="hidden" id="depth3" value="<?= $depth3 ?>">
                <input type="hidden" id="depth4" value="<?= $depth4 ?>">
                <section class="no-content">
                    <!-- Page Title -->
                    <div class="no-toolbar">
                        <div class="no-toolbar-container no-flex-stack">
                            <div class="no-page-indicator">
                                <h1 class="no-page-title">게시글 관리</h1>
                                <div class="no-breadcrumb-container">
                                    <ul class="no-breadcrumb-list">
                                        <li class="no-breadcrumb-item">
                                            <span>게시판</span>
                                        </li>
                                        <li class="no-breadcrumb-item">
                                            <span>게시글 관리</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- page indicator -->

                            <div class="no-items-center">
                                <a href="./board.add.php" class="no-btn no-btn--main no-btn--big"> 글등록 </a>
                            </div>
                        </div>
                    </div>


                    <?
                    $query = "select no, title, skin, sort_no  from nb_board_manage where sitekey = '$NO_SITE_UNIQUE_KEY' order by no asc";
                    $result_2nd = mysql_query($query);
                    $arrBoardList = array();
                    while ($row = mysql_fetch_assoc($result_2nd)) {
                        $arrBoardList[] = $row;
                    }
                    ?>
                    <!-- Search -->
                    <div class="no-search no-toolbar-container">
                        <div class="no-card">
                            <div class="no-card-header">
                                <h2 class="no-card-title">게시글 검색</h2>
                            </div>
                            <div class="no-card-body no-admin-column">
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">게시판 선택</h3>
                                    <div class="no-admin-content">
                                        <select name="board_no" id="board_no">
                                            <option value="">게시판 선택</option>
                                            <?
                                            foreach ($arrBoardList as $k => $v) {
                                            ?>
                                                <option value="<?= $v[no] ?>" <? if ($board_no == $v[no]) echo "selected" ?>>
                                                    <?= $v[title] ?>
                                                </option>
                                            <?
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">검색 일자</h3>
                                    <div class="no-admin-content no-admin-date">
                                        <input type="text" name="sdate" id="sdate" value="<?= $sdate ?>" />
                                        <span></span>
                                        <input type="text" name="edate" id="edate" value="<?= $edate ?>" />
                                    </div>
                                </div>
                                <!-- admin block -->
                                <!-- <div class="no-admin-block wide">
								 									<h3 class="no-admin-title">카테고리 분류</h3>	
								 									<div class="no-search-select no-admin-catg">
								 										<select
								                                             name="depth1"
								                                             id="category_big"
								 											data-catg-type="big"
								 											class="no-form-control"
								 											onChange="doChangeCategory(this.value, 'mid');">
								                                             <option value="">
								                                                 대분류 선택
								                                             </option>
								                                         </select>
								 
								 										<select
								                                             name="depth2"
								                                             id="category_mid"
								 											data-catg-type="mid"
								 											class="no-form-control"
								 											onChange="doChangeCategory(this.value, 'sml');">
								                                             <option value="">
								                                                 중분류 선택
								                                             </option>
								                                         </select>
								 
								 										<select
								                                             name="depth3"
								 											data-catg-type="sml"
								 											class="no-form-control"
								                                             id="category_sml" onChange="doChangeCategory(this.value, 'itm');">
								                                             <option value="">
								                                                 소분류 선택
								                                             </option>
								                                         </select>
								 
								 										<select
								                                             name="depth4"
								 											data-catg-type="itm"
								                                             id="category_itm" 
								 											class="no-form-control"
								 										>
								                                             <option value="">
								                                                 상세분류 선택
								                                             </option>
								                                         </select>
								 										
								 									</div>
								 </div> -->


                                <div class="no-admin-block wide">
                                    <h3 class="no-admin-title">검색어</h3>

                                    <div class="no-search-select">
                                        <select name="searchColumn" id="searchColumn">
                                            <option value="">선택</option>
                                            <option value="a.title" <? if ($searchColumn == "a.title") echo "selected"; ?>>게시물 제목</option>
                                            <option value="a.contents" <? if ($searchColumn == "a.contents") echo "selected"; ?>>게시물 내용</option>
                                        </select>
                                        <div class="no-search-wrap no-ml">
                                            <div class="no-search-input">
                                                <i class="bx bx-search-alt-2"></i>
                                                <input name="searchKeyword" id="searchKeyword" type="text" title="검색어 입력" placeholder="검색어를 입력해주세요." value="<?= $searchKeyword ?>" />
                                            </div>
                                            <div class="no-search-btn">
                                                <button type="button" title="검색" class="no-btn no-btn--main no-btn--search" onClick="doSearchList();">
                                                    검색
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contents -->
                    <div class="no-content-container">
                        <div class="no-card">
                            <div class="no-card-header">
                                <h2 class="no-card-title">게시글 관리</h2>
                            </div>

                            <div class="no-card-body">
                                <div class="no-table-option">
                                    <ul class="no-table-check-control">
                                        <li>
                                            <a href="javascript:void(0);" class="no-btn no-btn--sm no-btn--check active" onClick="doCheckUnCheck('no-chk', 'check');">전체선택</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="no-btn no-btn--sm no-btn--check" onClick="doCheckUnCheck('no-chk', 'uncheck');">선택해제</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="no-btn no-btn--sm no-btn--check" onClick="doDeleteArray();">선택삭제</a>
                                        </li>
                                    </ul>

                                    <div class="no-perpage">
                                        <select name="perpage" id="perpage">
                                            <option value="20" <? if ($perpage == "20") echo "selected"; ?>>20개씩</option>
                                            <option value="50" <? if ($perpage == "50") echo "selected"; ?>>50개씩</option>
                                            <option value="100" <? if ($perpage == "100") echo "selected"; ?>>100개씩</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="no-table-responsive">
                                    <table class="no-table">
                                        <caption class="no-blind">
                                            번호, 게시판 이름, 공지, 제목, 작성자, 작성일, 조회수,
                                            관리로 구성된 게시글 관리표
                                        </caption>

                                        <thead>
                                            <tr>
                                                <th scope="col" class="no-width-25 no-check">
                                                    <div class="no-checkbox-form">
                                                        <label for="chkAll">
                                                            <input type="checkbox" id="chkAll" class="no-chk" onClick="doCheckUnCheckOne(this, 'no-chk');" />
                                                            <span>
                                                                <i class="bx bxs-check-square"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </th>
                                                <th scope="col" class="no-width-120 no-min-width-60">
                                                    번호
                                                </th>
                                                <th scope="col" class="no-min-width-120">
                                                    게시판 이름
                                                </th>
                                                <th scope="col" class="no-width-100 no-min-width-70">
                                                    공지
                                                </th>
                                                <th scope="col" class="no-min-width-150">제목</th>

                                                <th scope="col" class="no-min-width-100">작성자</th>
                                                <th scope="col" class="no-min-width-150">작성일</th>
                                                <th scope="col" class="no-min-width-60">조회수</th>
                                                <th scope="col" class="no-min-width-role no-td-center">
                                                    관리
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?
                                            while ($v = mysql_fetch_array($result)) {

                                                $isNotice = "";
                                                if ($v[is_notice] == "Y") $isNotice = "<span class=\"no-btn no-btn--notice\"> 공지 </span>";
                                            ?>
                                                <tr>
                                                    <td class="no-check">
                                                        <div class="no-checkbox-form">
                                                            <label for="<?= $v[no] ?>">
                                                                <input type="checkbox" name="board_file_check_no[]" class="no-chk" id="<?= $v[no] ?>" value="<?= $v[no] ?>" />
                                                                <span>
                                                                    <i class="bx bxs-check-square"></i>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span> <?= $rnumber ?> </span>
                                                    </td>
                                                    <td>
                                                        <span> <?= $v[board_name] ?> </span>
                                                    </td>
                                                    <td>
                                                        <?= $isNotice ?>
                                                    </td>
                                                    <td class="no-td-title">
                                                        <a href="./board.view.php?no=<?= $v[no] ?>&<?= $searchParam ?>">
                                                            <?= $v[title] ?>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <span><?= $v[write_name] ?> </span>
                                                    </td>
                                                    <td>
                                                        <span> <?= $v[regdate] ?> </span>
                                                    </td>
                                                    <td>
                                                        <span> <?= $v[read_cnt] ?> </span>
                                                    </td>
                                                    <td>
                                                        <div class="no-table-role">
                                                            <span class="no-role-btn">
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </span>
                                                            <div class="no-table-action">
                                                                <a href="./board.comment.view.php?no=<?= $v[no] ?>&<?= $searchParam ?>" class="no-btn no-btn--sm no-btn--normal">댓글</a>
                                                                <!-- <a
                                                        href=""
                                                        class="no-btn no-btn--sm no-btn--normal"
                                                        >권한관리</a
                                                        >
                                                        <a
                                                        href=""
                                                        class="no-btn no-btn--sm no-btn--normal"
                                                        >카테고리</a
                                                        > -->
                                                                <a href="./board.view.php?no=<?= $v[no] ?>&<?= $searchParam ?>" class="no-btn no-btn--sm no-btn--normal">수정</a>
                                                                <a href="javascript:doCopy(<?= $v[no] ?>);" class="no-btn no-btn--sm no-btn--normal">복사</a>
                                                                <a href="javascript:doDelete(<?= $v[no] ?>);" class="no-btn no-btn--sm no-btn--delete-outline">삭제</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?
                                                $rnumber--;
                                            }
                                            ?>
                                            <? if (!$result) { ?>
                                                <!-- 글이 하나라도 등록되지 않았을 때 보여줄 div -->
                                                <p>등록된 내용이 없습니다.</p>
                                            <? } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- card body -->
                        </div>
                        <!-- card -->
                    </div>
                    <!-- contents -->

                    <!-- Pagination -->
                    <? include_once "../../lib/admin.pagination.php"; ?>
                </section>
            </form>
        </main>



        <!-- Footer -->
        <script type="text/javascript" src="./js/board.process.js?c=<?= $STATIC_ADMIN_JS_MODIFY_DATE ?>"></script>
        <script type="text/javascript" src="./js/board.category.depth.js?c=<?= $STATIC_ADMIN_JS_MODIFY_DATE ?>" defer></script>
        <?
        include_once "../../inc/admin.footer.php";
        ?>
    </div>

    <script>
        $(function() {
            $("#sdate").datepicker();
            $("#edate").datepicker();
            /*
            $('#category_big').selectmenu({ 
            	change: function (event, ui) {
            		const el = ui.item.element[0];
            		const value = el.value;
            		const catgType = el.closest('select').dataset.catgType;
            		doChangeCategory(value, catgType);
            		console.log(value, 'mid');
            		// $('#category_mid').selectmenu('refresh');
            	}
            });
            */
        });
    </script>
</body>

</html>