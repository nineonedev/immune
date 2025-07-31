<!DOCTYPE html>
<html lang="ko">
<?
include_once $_SERVER[DOCUMENT_ROOT]."/inc/lib/base.class.php";

$depthnum = 3;
$pagenum = 1;



$no	= $_REQUEST[no];

$query = "select  *
		  from nb_request a
		  where a.no = $no  ";

$result=mysql_query($query);
$data=mysql_fetch_array($result);
if(!$data){
	error("정보를 찾을 수 없습니다");
}

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
            <?
                $query = "select no, title, skin, sort_no  from nb_board_manage order by no asc";
                $result_2nd =mysql_query($query);
                $arrBoardList = array(); 
                while($row = mysql_fetch_assoc($result_2nd)) { 
                    $arrBoardList[] = $row; 
                } 
            ?>
            <form id="frm" name="frm" method="post" enctype="multipart/form-data">
            <input type="hidden" id="mode" name="mode" value="">
            <input type="hidden" id="no" name="no" value="<?=$data[no]?>">
                <section class="no-content">
                    <!-- Page Title -->
                    <div class="no-toolbar">
                        <div class="no-toolbar-container no-flex-stack">
                            <div class="no-page-indicator">
                            <h1 class="no-page-title">상담문의 목록</h1>
                            <div class="no-breadcrumb-container">
                                <ul class="no-breadcrumb-list">
                                <li class="no-breadcrumb-item">
                                    <span>상담문의</span>
                                </li>
                                <li class="no-breadcrumb-item">
                                    <span>상담목록</span>
                                </li>
                                </ul>
                            </div>
                            </div>
                            <!-- page indicator -->
                        </div>
                    </div>
                    <!-- card-title -->
                    <div class="no-toolbar-container">
                        <div class="no-card">
                            <div class="no-card-header no-card-header--detail">
                                <h2 class="no-card-title">신청 내용</h2>
                            </div>
                            <div
                                class="no-card-body no-admin-column no-admin-column--detail"
                            >
								<div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="b_desc">성명</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="b_desc"
                                            id="b_desc"
                                            class="no-input--detail"
                                            value="<?=$data[name]?>"
                                            readonly
                                        />
                                    </div>
                                </div>
                                <!-- admin-block -->
								<div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="b_desc">법인명</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="b_desc"
                                            id="b_desc"
                                            class="no-input--detail"
                                            value="<?=$data[company]?>"
                                            readonly
                                        />
                                    </div>
                                </div>
                                <!-- admin-block -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="b_desc">이메일</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="b_desc"
                                            id="b_desc"
                                            class="no-input--detail"
                                            value="<?=$data[email]?>"
                                            readonly
                                        />
                                    </div>
                                </div>
                                <!-- admin-block -->

                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="b_desc">연락처</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="b_desc"
                                            id="b_desc"
                                            class="no-input--detail"
                                            value="<?=$data[phone]?>"
                                            readonly
                                        />
                                    </div>
                                </div>
                                <!-- admin-block -->

								<div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="b_desc">문의 유형</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="b_desc"
                                            id="b_desc"
                                            class="no-input--detail"
                                            value="<?=$data[service_type]?>"
                                            readonly
                                        />
                                    </div>
                                </div>
                                <!-- admin-block -->

								<div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="b_desc">형태</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="b_desc"
                                            id="b_desc"
                                            class="no-input--detail"
                                            value="<?=$data[member_type]?>"
                                            readonly
                                        />
                                    </div>
                                </div>
                                <!-- admin-block -->

								<div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="b_desc">거래구분</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="b_desc"
                                            id="b_desc"
                                            class="no-input--detail"
                                            value="<?=$data[deal_type]?>"
                                            readonly
                                        />
                                    </div>
                                </div>
                                <!-- admin-block -->

								<div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="b_desc">내용</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <textarea style="height: 20rem" readonly><?=$data[contents]?></textarea>
                                    </div>
                                </div>
                                <!-- admin-block -->

                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="b_desc">등록일</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="b_desc"
                                            id="b_desc"
                                            class="no-input--detail"
                                            value="<?=$data[regdate]?>"
                                            readonly
                                        />
                                    </div>
                                </div>
                                <!-- admin-block -->

                           

                                <div class="no-items-center center">
                                    <a
                                        href="javascript:void(0);"
                                        class="no-btn no-btn--big no-btn--delete-outline"
                                        onClick="doDelete(<?=$data[no]?>);"
                                    >
                                        삭제
                                    </a>
                                    <a
                                        href="./request.list.php"
                                        class="no-btn no-btn--big no-btn--normal"
                                    >
                                        목록
                                    </a>
                                </div>
                            </div>
                            <!-- card-body -->
                        </div>
                    </div>
                </section>
            </form>
        </main>

        

        <!-- Footer -->
        <script type="text/javascript" src="./js/request.process.js?c=<?=$STATIC_ADMIN_JS_MODIFY_DATE?>"></script>
        <?
            include_once "../../inc/admin.footer.php";
        ?>
        
    </div>
</body>
</html>