<!DOCTYPE html>
<html lang="ko">
<?
	include_once "../../../inc/lib/base.class.php";


	$depthnum = 1;
	$pagenum = 1;


	$search_word		= $_REQUEST['search_word'];
	$category			= $_REQUEST['category'];
	$skin					= $_REQUEST['skin'];
	

	$mainqry = " where a.sitekey = '$NO_SITE_UNIQUE_KEY' ";

	if($search_word) {
		$mainqry .=  " and  ( replace(a.title,' ','') like '%".trim($search_word)."%' ) ";
	}

	if($category){
		$mainqry .= " and category = ".trim($category);				
	}
	
	if($skin){
		$mainqry .= " and skin = '".trim($skin) ."'";				
	}
	
	
	$page		= $_POST['page']; //페이지 번호
	$pages		= $_POST['pages']; //총 페이지 수 
	$perpage	= $_POST['perpage']; //한 페이지에 출력될 rows
	$total		= $_POST['total']; //전체 레코드 수
	
	/* 페이지에 출력된 페이지 블럭 1, 2, 3, 4, 등 */
	$pageBlock	= 10;

	if(!$page)
		$page = 1;

	if(!$perpage){ $perpage = 20; }

	/* 출력될 rows */
	$listRowCnt = $perpage;
	
	/* 현재 페이지 */
	$listCurPage = $page;


	if( !$listCurPage ) {$listCurPage = 1 ;}
	$count = $listCurPage * $listRowCnt - $listRowCnt;

	$query = " select count(*)  as cnt from nb_board_manage a  $mainqry ";
	$result=mysql_query($query);
	$data=mysql_fetch_array($result);
	if($data){
		$totalCnt = $data[cnt];
	}


	/* 출력되는 페이지수 */
	$Page = ceil($totalCnt / $listRowCnt);

	$query = " select a.no, a.title, a.skin, a.regdate, a.top_banner_image, a.contents, a.view_yn, a.secret_yn, a.sort_no, a.list_size, 
						a.fileattach_yn, a.fileattach_cnt, a.comment_yn
						from nb_board_manage a
						$mainqry  order by  a.no desc

		limit $count , $listRowCnt 
	";
	//echo $query;
	$result = mysql_query($query);

	$rnumber=$totalCnt-($listCurPage-1)*$listRowCnt;


	include_once "../../inc/admin.title.php";
	include_once "../../inc/admin.css.php";
	include_once "../../inc/admin.js.php";
?>
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
            <section class="no-content">
                    <!-- Page Title -->
                    <div class="no-toolbar">
                        <div class="no-toolbar-container no-flex-stack">
                            <div class="no-page-indicator">
                                <h1 class="no-page-title">게시판 관리</h1>
                                <div class="no-breadcrumb-container">
                                    <ul class="no-breadcrumb-list">
                                        <li class="no-breadcrumb-item">
                                            <span>게시판 관리</span>
                                        </li>
                                        <li class="no-breadcrumb-item">
                                            <span>게시판 목록</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- page indicator -->

                            <div class="no-items-center">
                                <a
                                    href="./board.manage.add.php"
                                    class="no-btn no-btn--main no-btn--big"
                                >
                                    게시판 등록
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Search -->
                    <div class="no-search no-toolbar-container">
                        <div class="no-card">
                            <div class="no-card-header">
                                <h2 class="no-card-title">게시판 검색</h2>
                            </div>
                            <div class="no-card-body no-admin-column">
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">게시판 스킨</h3>
                                    <div class="no-ammin-content">
                                        <select name="skin" id="skin">
                                            <option value="">선택</option>
											<?
												foreach( $board_type  as $key=>$val ) {
											?>
											<option value="<?=$key?>" <? if($skin == $key) echo "selected";?>><?=$val?></option>
											<?
												}
											?>
                                        </select>
                                    </div>
                                </div>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">노출 여부</h3>
                                    <div class="no-admin-content">
                                        <div class="no-radio-form no-list">
                                            <label for="input1">
                                                <div class="no-radio-box">
                                                    <input
                                                        type="radio"
                                                        name="b_view"
                                                        id="input1"
                                                        value=""
                                                        <? if($_loc == "") echo "checked";?>
                                                    />
                                                    <span>
                                                        <i
                                                            class="bx bx-radio-circle-marked"
                                                        ></i>
                                                    </span>
                                                </div>
                                                <span class="no-radio-text"
                                                    >전체</span
                                                >
                                            </label>

                                            <label for="input2">
                                                <div class="no-radio-box">
                                                    <input
                                                        type="radio"
                                                        name="b_view"
                                                        id="input2"
                                                        value="Y"
                                                        <? if($_view == "Y") echo "checked";?>
                                                    />
                                                    <span>
                                                        <i
                                                            class="bx bx-radio-circle-marked"
                                                        ></i>
                                                    </span>
                                                </div>
                                                <span class="no-radio-text"
                                                    >노출</span
                                                >
                                            </label>

                                            <label for="input3">
                                                <div class="no-radio-box">
                                                    <input
                                                        type="radio"
                                                        name="b_view"
                                                        id="input3"
                                                        value="N"
                                                        <? if($_view == "N") echo "checked";?>
                                                    />
                                                    <span>
                                                        <i
                                                            class="bx bx-radio-circle-marked"
                                                        ></i>
                                                    </span>
                                                </div>
                                                <span class="no-radio-text"
                                                    >숨김</span
                                                >
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">검색어</h3>
                                    <div class="no-search-wrap">
                                        <div class="no-search-input">
                                            <i class="bx bx-search-alt-2"></i>
                                            <input
                                                type="text"
                                                name="search_word"
                                                id="name"
                                                title="검색어 입력"
                                                placeholder="검색어를 입력해주세요."
                                                value="<?=$search_word?>"
                                            />
                                        </div>
                                        <div class="no-search-btn">
                                            <button
                                                type="button"
                                                title="검색"
                                                class="no-btn no-btn--main no-btn--search"
                                                onClick="doSearchList();"
                                            >
                                                검색
                                            </button>
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
                                <h2 class="no-card-title">게시판 관리</h2>
                            </div>

                            <div class="no-card-body">
                                <div class="no-table-responsive">
                                    <table class="no-table">
                                        <caption class="no-blind">
                                            번호, 게시판 이름, 공지, 제목,
                                            작성자, 작성일, 조회수, 관리로
                                            구성된 게시글 관리표
                                        </caption>
                                        <thead>
                                            <tr>
                                                <th
                                                    scope="col"
                                                    class="no-width-120 no-min-width-60"
                                                >
                                                    번호
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="no-width-100 no-min-width-70"
                                                >
                                                    노출
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="no-min-width-150"
                                                >
                                                    게시판 이름
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="no-min-width-150"
                                                >
                                                    게시판 스킨
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="no-min-width-150"
                                                >
                                                    개재일
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="no-min-width-role no-td-center"
                                                >
                                                    관리
                                                </th>
                                            </tr>
                                            <!-- col 9 -->
                                        </thead>
                                        <tbody>
                                            <?
                                                while($v = mysql_fetch_array($result)){
                                            
                                                $category = "";
                                                $skin = "";
                                                $skin = $board_type[$v[skin]];


                                                $view_yn = "";
                                                if( $v[view_yn] == "N") {
                                                    $view_yn = "숨김";
                                                }else {
                                                    $view_yn = "노출";
                                                }
                                                    
                                            ?>
                                            <tr>
                                                <td>
                                                    <span> <?=$rnumber?> </span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="no-btn no-btn--notice"
                                                    >
                                                        <?=$view_yn?>
                                                    </span>
                                                </td>
                                                
                                                <td class="no-td-title">
                                                    <a href="./board.manage.view.php?no=<?=$v[no]?>">
                                                        <?=$v[title]?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <?=$skin?>
                                                </td>
                                                <td>
                                                    <?=$v[regdate]?>
                                                </td>
                                                <td>
                                                    <div class="no-table-role">
                                                        <span
                                                            class="no-role-btn"
                                                        >
                                                            <i
                                                                class="bx bx-dots-vertical-rounded"
                                                            ></i>
                                                        </span>
                                                        <div
                                                            class="no-table-action"
                                                        >
                                                            <a
                                                                href="./board.role.view.php?no=<?=$v[no]?>"
                                                                class="no-btn no-btn--sm no-btn--normal"
                                                                >권한관리</a
                                                            >
                                                            <a
                                                                href="./board.category.view.php?no=<?=$v[no]?>"
                                                                class="no-btn no-btn--sm no-btn--normal"
                                                                >카테고리</a
                                                            >
                                                            <a
                                                                href="./board.manage.view.php?no=<?=$v[no]?>"
                                                                class="no-btn no-btn--sm no-btn--normal"
                                                                >수정</a
                                                            >
                                                            <a
                                                                href="javascript:doDelete(<?=$v[no]?>);"
                                                                class="no-btn no-btn--sm no-btn--delete-outline"
                                                                onClick="doDelete(<?=$v[no]?>);"
                                                                >삭제</a
                                                            >
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?
                                                    $rnumber--;
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <? include_once "../../lib/admin.pagination.php"; ?>
                </section>
            </form>
        </main>

        <!-- Footer -->
        <script type="text/javascript" src="./js/banner.process.js?c=<?=$STATIC_ADMIN_JS_MODIFY_DATE?>"></script>
        <?
            include_once "../../inc/admin.footer.php";
        ?>
    </div>
</body>
</html>