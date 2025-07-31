<!DOCTYPE html>
<html lang="ko">
<?

	include_once "../../../inc/lib/base.class.php";


	$depthnum = 1;
	$pagenum = 2;


	$no			= $_REQUEST[no];
	/* param */
	$board_no	= $_REQUEST[board_no];
	$page		= $_REQUEST[page];
	$sdate		= $_REQUEST[sdate];
	$edate		= $_REQUEST[edate];

	$searchParam = "board_no=".$board_no."&page=".$page."&sdate=".$sdate."&edate=".$edate;

	$query = "  select a.* 
					from nb_board a
					where a.no = $no  ";
	//echo $query;exit;
	$result=mysql_query($query);
	$data=mysql_fetch_array($result);
	if(!$data){
		error("정보를 찾을 수 없습니다");
	}
	

	$boardManage_info		= getBoardManageInfoByNo($data['board_no']);

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
            <input type="hidden" id="mode" name="mode" value="edit">
            <input type="hidden" id="no" name="no" value="<?=$data[no]?>">

			<input type="hidden" id="depth1" value="<?=$data[depth1]?>">
			<input type="hidden" id="depth2" value="<?=$data[depth2]?>">
			<input type="hidden" id="depth3" value="<?=$data[depth3]?>">
			<input type="hidden" id="depth4" value="<?=$data[depth4]?>">

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
                        </div>
                    </div>


                    <!-- card-title -->
                    <div class="no-toolbar-container">
                        <div class="no-card">
                            <div class="no-card-header no-card-header--detail">
                                <h2 class="no-card-title">게시글 등록</h2>
                            </div>
                            <div
                                class="no-card-body no-admin-column no-admin-column--detail"
                            >
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="board_no"> 게시판 선택 </label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <select name="board_no" id="board_no">
                                            <option value="">
                                                게시판 선택
                                            </option>
                                            <?
                                                foreach($arrBoardList as $k=>$v){
                                            ?>
                                                <option value="<?=$v[no]?>" <? if($data[board_no] == $v[no])echo "selected"?>>
                                                    <?=$v[title]?>    
                                                </option>
                                            <?
                                                }
                                            ?>
                                        </select>
                                        <span class="no-admin-info">
                                            <i class="bx bxs-info-circle"></i>
                                            글을 등록하시려는 게시판을
                                            선택하세요
                                        </span>
                                    </div>
                                </div>
                                <!-- admin-block -->
                                
                                <?
                                    $category_yn = $boardManage_info[0]['category_yn'];
                                    
                                    $viewCategory = "display:none;";
                                    if($category_yn == "Y"){
                                        $viewCategory = "display:flex;";
                                    }
								?>
								<input type="hidden" name="cate_no" id="cate_no" value="">
                                <div class="no-admin-block" style="<?=$viewCategory?>">
                                    <h3 class="no-admin-title">
                                        <label for="category_no">
                                            게시판 카테고리
                                        </label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <select
                                            name="category_no"
                                            id="category_no"
                                        >
                                            <option value="">
                                                카테고리 선택
                                            </option>
                                            <? 
                                                if($category_yn == "Y"){

                                                $query = "select no, name from nb_board_category where sitekey = '$NO_SITE_UNIQUE_KEY' and board_no = $data[board_no] order by sort_no asc";
                                                $result_in =mysql_query($query);
                                                while($row = mysql_fetch_array($result_in)) { 
                                            ?>
                                                <option value="<?=$row[no]?>" <? if($data[category_no] == $row[no]) echo "selected";?>><?=$row[name]?></option>
                                            <?
                                                }
                                            }
                                            ?>
                                        </select>
                                        <span class="no-admin-info">
                                            <i class="bx bxs-info-circle"></i>
                                            원하는 카테고리를 선택하세요
                                        </span>
                                    </div>
                                </div>
                                <!-- admin-block -->
                                
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="title">제목</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="title"
                                            id="title"
                                            value="<?=$data[title]?>"
                                            class="no-input--detail"
                                            placeholder="제목을 입력해주세요."
                                        />
                                    </div>
                                </div>
                                <!-- admin-block -->

                                <?
                                $extra_match_field1 = $boardManage_info[0]['extra_match_field1'];
                                if($extra_match_field1){
                                ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="extra1">
                                            <?=$extra_match_field1?>
                                        </label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="extra1"
                                            id="extra1"
                                            value="<?=$data['extra1']?>"
                                            class="no-input--detail"
                                            placeholder="<?=$extra_match_field1?>"
                                        />
                                    </div>
                                </div>
                                <? } ?>
                                <!-- admin-block -->
                                
                                <?
                                $extra_match_field2 = $boardManage_info[0]['extra_match_field2'];
                                if($extra_match_field2){
                                ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="extra2">
                                            <?=$extra_match_field2?>
                                        </label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="extra2"
                                            id="extra2"
                                            value="<?=$data['extra2']?>"
                                            class="no-input--detail"
                                            placeholder="<?=$extra_match_field2?>"
                                        />
                                    </div>
                                </div>
                                <? } ?>
                                <!-- admin-block -->

                                <?
                                $extra_match_field3 = $boardManage_info[0]['extra_match_field3'];
                                if($extra_match_field3){
                                ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="extra3">
                                            <?=$extra_match_field3?>
                                        </label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="extra3"
                                            id="extra3"
                                            value="<?=$data['extra3']?>"
                                            class="no-input--detail"
                                            placeholder="<?=$extra_match_field3?>"
                                        />
                                    </div>
                                </div>
                                <? } ?>
                                <!-- admin-block -->

                                <?
                                $extra_match_field4 = $boardManage_info[0]['extra_match_field4'];
                                if($extra_match_field4){
                                ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="extra4">
                                            <?=$extra_match_field4?>
                                        </label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="extra4"
                                            id="extra4"
                                            value="<?=$data['extra4']?>"
                                            class="no-input--detail"
                                            placeholder="<?=$extra_match_field4?>"
                                        />
                                    </div>
                                </div>
                                <? } ?>
                                <!-- admin-block -->

                                <?
                                $extra_match_field5 = $boardManage_info[0]['extra_match_field5'];
                                if($extra_match_field5){
                                ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="extra5">
                                            <?=$extra_match_field5?>
                                        </label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="extra5"
                                            id="extra5"
                                            value="<?=$data['extra5']?>"
                                            class="no-input--detail"
                                            placeholder="<?=$extra_match_field5?>"
                                        />
                                    </div>
                                </div>
                                <? } ?>
                                <!-- admin-block -->

								<?
                                $extra_match_field6 = $boardManage_info[0]['extra_match_field6'];
                                if($extra_match_field6){
                                ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="extra6">
                                            <?=$extra_match_field5?>
                                        </label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="extra6"
                                            id="extra6"
                                            value="<?=$data['extra6']?>"
                                            class="no-input--detail"
                                            placeholder="<?=$extra_match_field6?>"
                                        />
                                    </div>
                                </div>
                                <? } ?>
                                <!-- admin-block -->

								<?
                                $extra_match_field7 = $boardManage_info[0]['extra_match_field7'];
                                if($extra_match_field7){
                                ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="extra7">
                                            <?=$extra_match_field7?>
                                        </label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="extra7"
                                            id="extra7"
                                            value="<?=$data['extra7']?>"
                                            class="no-input--detail"
                                            placeholder="<?=$extra_match_field7?>"
                                        />
                                    </div>
                                </div>
                                <? } ?>
                                <!-- admin-block -->

								<?
                                $extra_match_field8 = $boardManage_info[0]['extra_match_field8'];
                                if($extra_match_field8){
                                ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="extra8">
                                            <?=$extra_match_field8?>
                                        </label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="extra8"
                                            id="extra8"
                                            value="<?=$data['extra8']?>"
                                            class="no-input--detail"
                                            placeholder="<?=$extra_match_field8?>"
                                        />
                                    </div>
                                </div>
                                <? } ?>
                                <!-- admin-block -->

								<?
                                $extra_match_field1 = $boardManage_info[0]['extra_match_field9'];
                                if($extra_match_field9){
                                ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="extra9">
                                            <?=$extra_match_field9?>
                                        </label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="extra9"
                                            id="extra9"
                                            value="<?=$data['extra9']?>"
                                            class="no-input--detail"
                                            placeholder="<?=$extra_match_field9?>"
                                        />
                                    </div>
                                </div>
                                <? } ?>
                                <!-- admin-block -->

								<?
                                $extra_match_field10 = $boardManage_info[0]['extra_match_field10'];
                                if($extra_match_field10){
                                ?>
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="extra10">
                                            <?=$extra_match_field10?>
                                        </label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="extra10"
                                            id="extra10"
                                            value="<?=$data['extra10']?>"
                                            class="no-input--detail"
                                            placeholder="<?=$extra_match_field10?>"
                                        />
                                    </div>
                                </div>
                                <? } ?>
                                <!-- admin-block -->

                                
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="write_name">작성자</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="write_name"
                                            id="write_name"
                                            value="<?=$data[write_name]?>"
                                            class="no-input--detail"
                                            placeholder="제목을 입력해주세요."
                                        />
                                    </div>
                                </div>
                                <!-- admin-block -->

                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="direct_url">링크 URL</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="direct_url"
                                            id="direct_url"
                                            value="<?=$data[direct_url]?>"
                                            class="no-input--detail"
                                            placeholder="링크URL을 입력해주세요."
                                        />
                                    </div>
                                </div>
                                <!-- admin-block -->

                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="regdate">작성일자</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="regdate"
                                            id="regdate"
                                            value="<?=$data[regdate]?>"
                                            class="no-input--detail"
                                            placeholder="제목을 입력해주세요."
                                        />
                                        <span class="no-admin-info">
                                            <i class="bx bxs-info-circle"></i>
                                            작성일자를 변경할 수 있습니다. 반드시 기존 형식에 맞추어 수정해야 합니다.
                                        </span>
                                    </div>
                                </div>
                                <!-- admin-block -->

								
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <span>공지</span>
                                    </h3>
                                    <div class="no-admin-content">
                                        <label
                                            for="is_notice"
                                            class="no-items-center"
                                        >
                                            <div class="no-checkbox-form">
                                                <input
                                                    type="checkbox"
                                                    name="is_notice"
                                                    id="is_notice"
                                                    class="no-input--detail"
                                                    <? if($data[is_notice] == "Y") echo "checked";?>
                                                />
                                                <span>
                                                    <i
                                                        class="bx bxs-check-square"
                                                    ></i>
                                                </span>
                                            </div>

                                            <span class="no-admin-info no-mt">
                                                공지사항으로 등록하면 게시판 상단에 고정됩니다.
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <!-- admin-block -->

                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="title">썸네일 파일</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <div class="no-file-control">
                                            <input
                                                type="text"
                                                class="no-fake-file"
                                                id="fakeThumbFileTxt"
                                                placeholder="파일을 선택해주세요."
                                                readonly
                                                disabled
                                            />
                                            <div class="no-file-box">
                                                <input
                                                    type="file"
                                                    name="thumb_image"
                                                    id="thumb_image"
                                                    onchange="javascript:document.getElementById('fakeThumbFileTxt').value = this.value"
                                                />
                                                <button
                                                    type="button"
                                                    class="no-btn no-btn--main"
                                                >
                                                    파일찾기
                                                </button>
                                            </div>
                                        </div>
                                        <!-- file control -->
                                        <? if($data[thumb_image]){?>
                                        <div class="no-board-thumb">
                                            <a href="/inc/lib/board.file.download.php?no=<?=$data[no]?>&fld=thumb">
                                                <?=$data[thumb_image]?>
                                            </a>
                                            <label class="no-thumb-check">
                                                <div class="no-checkbox-form">
                                                    <input type="checkbox" name="attach_file_del[]"  value="0" > 
                                                    <span>
                                                    <i
                                                        class="bx bxs-check-square"
                                                    ></i>
                                                    </span>
                                                </div>
                                                <span>삭제</span>
                                            </label>
                                        </div>
                                        <? } ?>
                                        <span class="no-admin-info">
                                            <i class="bx bxs-info-circle"></i>
                                            갤러리 게시판은 썸네일 파일을 필수 등록해야 합니다.
                                        </span>
                                    </div>
                                </div>
                                <!-- admin-block -->

								<div class="no-admin-block no_table_category"  style="display:none;">
                                    <h3 class="no-admin-title">
                                        <label for="category_no">
                                            게시판 카테고리
                                        </label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <select
                                            name="category_no"
                                            id="category_no"
                                        >
                                            <option value="">
                                                카테고리 선택
                                            </option>
                                        </select>
                                        <span class="no-admin-info">
                                            <i class="bx bxs-info-circle"></i>
                                            원하는 카테고리를 선택하세요
                                        </span>
                                    </div>
                                </div>
                                <!-- admin-block -->

                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="title">파일첨부</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <div class="no-file-wrap">
                                            <div class="no-file-control">
                                                <input
                                                    type="text"
                                                    class="no-fake-file"
                                                    id="fakeFileTxt1"
                                                    placeholder="파일을 선택해주세요."
                                                    readonly
                                                    disabled
                                                />
                                                <div class="no-file-box">
                                                    <input
                                                        type="file"
                                                        name="addFile1"
                                                        onchange="document.getElementById('fakeFileTxt1').value = this.value"
                                                    />
                                                    <button
                                                        type="button"
                                                        class="no-btn no-btn--main"
                                                    >
                                                        파일찾기
                                                    </button>
                                                    
                                                </div>
                                                <? if($data[file_attach_1]){?>
                                                    <div class="no-board-thumb">
                                                        <a href="/inc/lib/board.file.download.php?no=<?=$data[no]?>&fld=attach1">
                                                            <?=$data[file_attach_origin_1]?>
                                                        </a>
                                                        <label class="no-thumb-check">
                                                            <div class="no-checkbox-form">
                                                                <input type="checkbox" name="attach_file_del[]"  value="1" > 
                                                                <span>
                                                                <i
                                                                    class="bx bxs-check-square"
                                                                ></i>
                                                                </span>
                                                            </div>
                                                            <span>삭제</span>
                                                        </label>
                                                    </div>
                                                    <? } ?>
                                            </div>
                                            <!-- file control -->
                                            <div class="no-file-control">
                                                <input
                                                    type="text"
                                                    class="no-fake-file"
                                                    id="fakeFileTxt2"
                                                    placeholder="파일을 선택해주세요."
                                                    readonly
                                                    disabled
                                                />
                                                <div class="no-file-box">
                                                    <input
                                                        type="file"
                                                        name="addFile2"
                                                        onchange="document.getElementById('fakeFileTxt2').value = this.value"
                                                    />
                                                    <button
                                                        type="button"
                                                        class="no-btn no-btn--main"
                                                    >
                                                        파일찾기
                                                    </button>
                                                </div>

                                                <? if($data[file_attach_2]){?>
                                                    <div class="no-board-thumb">
                                                        <a href="/inc/lib/board.file.download.php?no=<?=$data[no]?>&fld=attach2">
                                                            <?=$data[file_attach_origin_2]?>
                                                        </a>
                                                        <label class="no-thumb-check">
                                                            <div class="no-checkbox-form">
                                                                <input type="checkbox" name="attach_file_del[]"  value="2" > 
                                                                <span>
                                                                <i
                                                                    class="bx bxs-check-square"
                                                                ></i>
                                                                </span>
                                                            </div>
                                                            <span>삭제</span>
                                                        </label>
                                                    </div>
                                                <? } ?>
                                            </div>
                                            <!-- file control -->
                                            <div class="no-file-control">
                                                <input
                                                    type="text"
                                                    class="no-fake-file"
                                                    id="fakeFileTxt3"
                                                    placeholder="파일을 선택해주세요."
                                                    readonly
                                                    disabled
                                                />
                                                <div class="no-file-box">
                                                    <input
                                                        type="file"
                                                        name="addFile3"
                                                        onchange="document.getElementById('fakeFileTxt3').value = this.value"
                                                    />
                                                    <button
                                                        type="button"
                                                        class="no-btn no-btn--main"
                                                    >
                                                        파일찾기
                                                    </button>
                                                </div>
                                                <? if($data[file_attach_3]){?>
                                                <div class="no-board-thumb">
                                                    <a href="/inc/lib/board.file.download.php?no=<?=$data[no]?>&fld=attach3">
                                                        <?=$data[file_attach_origin_3]?>
                                                    </a>
                                                    <label class="no-thumb-check">
                                                        <div class="no-checkbox-form">
                                                            <input type="checkbox" name="attach_file_del[]"  value="3" > 
                                                            <span>
                                                            <i
                                                                class="bx bxs-check-square"
                                                            ></i>
                                                            </span>
                                                        </div>
                                                        <span>삭제</span>
                                                    </label>
                                                </div>
                                                <? } ?>
                                            </div>
                                            <!-- file control -->
                                            <div class="no-file-control">
                                                <input
                                                    type="text"
                                                    class="no-fake-file"
                                                    id="fakeFileTxt4"
                                                    placeholder="파일을 선택해주세요."
                                                    readonly
                                                    disabled
                                                />
                                                <div class="no-file-box">
                                                    <input
                                                        type="file"
                                                        name="addFile4"
                                                        onchange="document.getElementById('fakeFileTxt4').value = this.value"
                                                    />
                                                    <button
                                                        type="button"
                                                        class="no-btn no-btn--main"
                                                    >
                                                        파일찾기
                                                    </button>
                                                </div>
                                                <? if($data[file_attach_4]){?>
                                                    <div class="no-board-thumb">
                                                        <a href="/inc/lib/board.file.download.php?no=<?=$data[no]?>&fld=attach4">
                                                            <?=$data[file_attach_origin_4]?>
                                                        </a>
                                                        <label class="no-thumb-check">
                                                            <div class="no-checkbox-form">
                                                                <input type="checkbox" name="attach_file_del[]"  value="4" > 
                                                                <span>
                                                                <i
                                                                    class="bx bxs-check-square"
                                                                ></i>
                                                                </span>
                                                            </div>
                                                            <span>삭제</span>
                                                        </label>
                                                    </div>
                                                    <? } ?>
                                            </div>
                                            <!-- file control -->
                                            <div class="no-file-control">
                                                <input
                                                    type="text"
                                                    class="no-fake-file"
                                                    id="fakeFileTxt5"
                                                    placeholder="파일을 선택해주세요."
                                                    readonly
                                                    disabled
                                                />
                                                <div class="no-file-box">
                                                    <input
                                                        type="file"
                                                        name="addFile5"
                                                        onchange="document.getElementById('fakeFileTxt5').value = this.value"
                                                    />
                                                    <button
                                                        type="button"
                                                        class="no-btn no-btn--main"
                                                    >
                                                        파일찾기
                                                    </button>
                                                </div>
                                                <? if($data[file_attach_5]){?>
                                                    <div class="no-board-thumb">
                                                        <a href="/inc/lib/board.file.download.php?no=<?=$data[no]?>&fld=attach5">
                                                            <?=$data[file_attach_origin_5]?>
                                                        </a>
                                                        <label class="no-thumb-check">
                                                            <div class="no-checkbox-form">
                                                                <input type="checkbox" name="attach_file_del[]"  value="5" > 
                                                                <span>
                                                                <i
                                                                    class="bx bxs-check-square"
                                                                ></i>
                                                                </span>
                                                            </div>
                                                            <span>삭제</span>
                                                        </label>
                                                    </div>
                                                    <? } ?>
                                            </div>
                                            <!-- file control -->
                                        </div>

                                        <span class="no-admin-info">
                                            zip,xls,xlsx,pdf,ppt,pptx,doc,docx,hwp
                                            파일만 등록 가능합니다.
                                        </span>
                                    </div>
                                </div>
                                <!-- admin-block -->
								<div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="contents" >내용</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <div class="no-admin-check">
                                            <textarea
                                                name="contents"
                                                id="contents"
                                            >
                                            <?=$data[contents]?>
                                            </textarea>
                                        </div>
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
                                        href="javascript:void(0);"
                                        class="no-btn no-btn--big no-btn--normal"
                                        onClick="doCopy(<?=$data[no]?>);"
                                    >
										복사
									</a>
                                    <a
                                        href="./board.list.php?<?=$searchParam?>"
                                        class="no-btn no-btn--big no-btn--normal">
                                        목록
                                    </a>
                                    <a
                                        href="javascript:void(0);"
                                        class="no-btn no-btn--big no-btn--main"
                                        onClick="doEditSave();"
                                    >
                                        수정
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
        <script type="text/javascript" src="./js/board.process.js?v=<?=date('YmdHis')?>"></script>
        <?
            include_once "../../inc/admin.footer.php";
        ?>
        
    </div>
</body>
</html>



             

