<!DOCTYPE html>
<html lang="ko">
<?
	include_once "../../../inc/lib/base.class.php";
	

	$depthnum = 2;
	$pagenum = 1;


	$no	= $_REQUEST[no];

	$query = "  select a.no, a.b_loc, a.b_img, a.b_link, a.b_target, a.b_view, a.b_title, a.b_idx, a.b_none_limit, a.b_sdate, 
						a.b_edate, a.b_rdate, b_desc
			  from nb_banner a
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
<script type="text/javascript" src="./js/banner.process.js?c=<?=$STATIC_ADMIN_JS_MODIFY_DATE?>"></script>
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
                                        <label for="b_loc"> 배너구분 </label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <select name="b_loc" id="b_loc">
                                            <option value="">선택</option>
                                            <?
                                                foreach( $arr_banner_loc  as $key=>$val ) {
                                            ?>
                                            <option value="<?=$key?>" <? if($data[b_loc] == $key) echo "selected";?>><?=$val?></option>
                                            <?
                                                }
                                            ?>
                                        </select>
                                        <span class="no-admin-info">
                                            글을 등록하시려는 게시판을
                                            선택하세요
                                        </span>
                                    </div>
                                </div>
                                <!-- admin-block -->
                                
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="title">배너노출</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <div class="no-radio-form">
                                            <label for="input1">
                                                <div class="no-radio-box">
                                                    <input
                                                        type="radio"
                                                        name="b_view"
                                                        id="input1"
                                                        value="Y"
                                                        <? if($data[b_view] == "Y") echo "checked";?>
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

                                            <label for="input2">
                                                <div class="no-radio-box">
                                                    <input
                                                        type="radio"
                                                        name="b_view"
                                                        id="input2"
                                                        value="N"
                                                        <? if($data[b_view] == "N") echo "checked";?>
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
                                <!-- admin-block -->

                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="b_idx">노출순위</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="b_idx"
                                            id="b_idx"
                                            class="no-input--detail"
                                            placeholder="0"
                                            value="<?=$data[b_idx]?>"
                                        />
                                    </div>
                                </div>
                                <!-- admin-block -->

                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <span>기한설정</span>
                                    </h3>
                                    <div class="no-admin-content">
                                        <div
                                            class="no-radio-form no-radio-flex"
                                        >
                                            <div class="no-radio-link">
                                                <label for="input3">
                                                    <div class="no-radio-box">
                                                        <input
                                                            type="radio"
                                                            name="b_none_limit"
                                                            id="input3"
                                                            value="Y"
                                                            <? if($data[b_none_limit] == "Y") echo "checked";?> onClick="doAttrChange('b_date', 'disabled', true);"
                                                        />
                                                        <span>
                                                            <i
                                                                class="bx bx-radio-circle-marked"
                                                            ></i>
                                                        </span>
                                                    </div>
                                                    <span class="no-radio-text"
                                                        >무기한</span
                                                    >
                                                </label>

                                                <label for="input4">
                                                    <div class="no-radio-box">
                                                        <input
                                                            type="radio"
                                                            name="b_none_limit"
                                                            id="input4"
                                                            value="N"
                                                            <? if($data[b_none_limit] == "N") echo "checked";?> onClick="doAttrChange('b_date', 'disabled', false);"
                                                        />
                                                        <span>
                                                            <i
                                                                class="bx bx-radio-circle-marked"
                                                            ></i>
                                                        </span>
                                                    </div>
                                                    <span class="no-radio-text"
                                                        >기한지정</span
                                                    >
                                                </label>
                                            </div>

                                            <div
                                                class="no-admin-content no-admin-date no-pd no-flex-row"
                                            >
                                                <input
                                                    type="text"
                                                    name="b_sdate"
                                                    id="b_sdate"
                                                    <?= ($data[b_none_limit] == "N" ? "" : "disabled") ?>
                                                    value="<?=($data[b_sdate] == "0000-00-00" ? "" : $data[b_sdate])?>"
                                                />
                                                <span></span>
                                                <input
                                                    type="text"
                                                    name="b_edate"
                                                    id="b_edate"
                                                    <?= ($data[b_none_limit] == "N" ? "" : "disabled") ?> value="<?=($data[b_edate] == "0000-00-00" ? "" : $data[b_edate])?>"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- admin-block -->

                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="title">배너 이미지</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <? if($data[b_img]){?>
                                            <div class="no-banner-image">
                                                <img
                                                    src="<?=$UPLOAD_WDIR_BANNER?>/<?=$data[b_img]?>"
                                                    alt="<?=$data[b_title]?>"
                                                />
                                            </div>
                                        <? } ?>
                                        
                                        <div class="no-file-control">
                                            <input
                                                type="text"
                                                class="no-fake-file"
                                                id="fake_banner_file"
                                                placeholder="파일을 선택해주세요."
                                                readonly
                                                disabled
                                            />
                                            <div class="no-file-box">
                                                <input
                                                    type="file"
                                                    name="banner_file"
                                                    id="banner_file"
                                                    onchange="document.getElementById('fake_banner_file').value = this.value"
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
                                        <span class="no-admin-info">
                                            <i class="bx bxs-info-circle"></i>
                                            이미지 수정시에만 선택하세요.
                                        </span>
                                        <span class="no-admin-info">
                                            <i class="bx bxs-info-circle"></i>
                                            크기는 자동 조절될 수 있습니다.
                                        </span>
                                    </div>
                                </div>
                                <!-- admin-block -->


                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="title">타이틀</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="b_title"
                                            id="b_title"
                                            class="no-input--detail"
                                            placeholder="제목을 입력해주세요."
                                            value="<?=$data[b_title]?>" 
                                        />
                                    </div>
                                </div>
                                <!-- admin-block -->

                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="b_desc">서브 타이틀</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="b_desc"
                                            id="b_desc"
                                            class="no-input--detail"
                                            placeholder="제목을 입력해주세요."
                                            value="<?=$data[b_desc]?>"
                                        />
                                    </div>
                                </div>
                                <!-- admin-block -->

                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <span>링크타겟</span>
                                    </h3>
                                    <div class="no-admin-content">
                                        <div class="no-radio-form">
                                            <label for="input5">
                                                <div class="no-radio-box">
                                                    <input
                                                        type="radio"
                                                        name="b_target"
                                                        id="input5"
                                                        value="_none"
                                                        onClick="doHideDiv('no_linkaddress');doResetInput('b_link');"
                                                        <? if($data[b_target] == "_none") echo "checked";?>
                                                    />
                                                    <span>
                                                        <i
                                                            class="bx bx-radio-circle-marked"
                                                        ></i>
                                                    </span>
                                                </div>
                                                <span class="no-radio-text"
                                                    >링크없음</span
                                                >
                                            </label>

                                            <label for="input6">
                                                <div class="no-radio-box">
                                                    <input
                                                        type="radio"
                                                        name="b_target"
                                                        id="input6"
                                                        value="_self"
                                                        onClick="doOpenDiv('no_link_target_box');"
                                                        <? if($data[b_target] == "_self") echo "checked";?>  
                                                    />
                                                    <span>
                                                        <i
                                                            class="bx bx-radio-circle-marked"
                                                        ></i>
                                                    </span>
                                                </div>
                                                <span class="no-radio-text"
                                                    >같은창</span
                                                >
                                            </label>

                                            <label for="input7">
                                                <div class="no-radio-box">
                                                    <input
                                                        type="radio"
                                                        name="b_target"
                                                        id="input7"
                                                        value="_blank"
                                                        onClick="doOpenDiv('no_link_target_box');"
                                                        <? if($data[b_target] == "_blank") echo "checked";?>  
                                                    />
                                                    <span>
                                                        <i
                                                            class="bx bx-radio-circle-marked"
                                                        ></i>
                                                    </span>
                                                </div>
                                                <span class="no-radio-text"
                                                    >새창</span
                                                >
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- admin-block -->

                                <div id="no_link_target_box" class="no-admin-block no_linkaddress" <?=($data[b_target] == "_self" || $data[b_target] == "_blank") ? "style='display:block'" : "style='display:none'" ?>>
                                    <h3 class="no-admin-title">
                                        <label for="b_link">링크주소</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="b_link"
                                            id="b_link"
                                            class="no-input--detail"
                                            placeholder="링크주소를 입력해주세요."
                                            value="<?=$data[b_link]?>"
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
                                        href="./banner.list.php"
                                        class="no-btn no-btn--big no-btn--normal"
                                    >
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
        <script type="text/javascript" src="./js/board.process.js?c=<?=$STATIC_ADMIN_JS_MODIFY_DATE?>"></script>
        <?
            include_once "../../inc/admin.footer.php";
        ?>
        
    </div>
</body>
</html>