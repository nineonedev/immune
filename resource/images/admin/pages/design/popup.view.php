<!DOCTYPE html>
<html lang="ko">
<?
	include_once "../../../inc/lib/base.class.php";
	

	$depthnum = 2;
	$pagenum = 2;



	$no	= $_REQUEST[no];

	$query = "  select 
					a.no,
					a.p_title,
					a.p_img,
					a.p_target,
					a.p_link,
					a.p_view,
					a.p_left,
					a.p_top,
					a.p_idx, 
					a.p_sdate,
					a.p_edate,
					a.p_rdate,
					a.p_none_limit,
					a.p_loc
			  from nb_popup a
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
            <form id="frm" name="frm" method="POST" enctype="multipart/form-data">
            <input type="hidden" id="mode" name="mode" value="">
		    <input type="hidden" id="no" name="no" value="<?=$data[no]?>">
                <section class="no-content">
                    <!-- Page Title -->
                    <div class="no-toolbar">
                        <div class="no-toolbar-container no-flex-stack">
                            <div class="no-page-indicator">
                            <h1 class="no-page-title">배너 관리</h1>
                            <div class="no-breadcrumb-container">
                                <ul class="no-breadcrumb-list">
                                <li class="no-breadcrumb-item">
                                    <span>디자인</span>
                                </li>
                                <li class="no-breadcrumb-item">
                                    <span>배너 관리</span>
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
                                <h2 class="no-card-title">팝업 등록</h2>
                            </div>
                            <div
                                class="no-card-body no-admin-column no-admin-column--detail"
                            >
                                
                                
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="title">팝업노출</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <div class="no-radio-form">
                                            <label for="input1">
                                                <div class="no-radio-box">
                                                    <input
                                                        type="radio"
                                                        name="p_view"
                                                        id="input1"
                                                        value="Y"
                                                        <? if($data[p_view] == "Y") echo "checked";?>
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
                                                        name="p_view"
                                                        id="input2"
                                                        value="N"
                                                        <? if($data[p_view] == "N") echo "checked";?>
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
                                                            name="p_none_limit"
                                                            id="input3"
                                                            value="Y"
                                                            <? if($data[p_none_limit] == "Y") echo "checked";?>
                                                            onClick="doAttrChange('p_date', 'disabled', true);"
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
                                                            name="p_none_limit"
                                                            id="input4"
                                                            value="N"
                                                            <? if($data[p_none_limit] == "N") echo "checked";?>
                                                            onClick="doAttrChange('p_date', 'disabled', false);"
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
                                                    name="p_sdate"
                                                    id="p_sdate"
                                                    value="<?=$data[p_sdate]?>"
                                                    <?=($data[p_none_limit] == "Y" ? "disabled" : "")?>
                                                />
                                                <span></span>
                                                <input
                                                    type="text"
                                                    name="p_edate"
                                                    id="p_edate"
                                                    value="<?=$data[p_edate]?>"
                                                    <?=($data[p_none_limit] == "Y" ? "disabled" : "")?> 
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- admin-block -->

                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="title">팝업 이미지</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <? if($data[p_img]){?>
                                            <div class="no-banner-image">
                                                <img
                                                    src="<?=$UPLOAD_WDIR_POPUP?>/<?=$data[p_img]?>"
                                                    alt="<?=$data[p_title]?>"
                                                />
                                            </div>
                                        <? } ?>
                                        <div class="no-file-control">
                                            <input
                                                type="text"
                                                class="no-fake-file"
                                                id="fake_p_img"
                                                placeholder="파일을 선택해주세요."
                                                readonly
                                                disabled
                                            />
                                            <div class="no-file-box">
                                                <input
                                                    type="file"
                                                    name="p_img"
                                                    id="p_img"
                                                    onchange="document.getElementById('fake_p_img').value = this.value"
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
                                    </div>
                                </div>
                                <!-- admin-block -->

                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="p_idx">노출순위</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="p_idx"
                                            id="p_idx"
                                            value="<?=$data[p_idx]?>"
                                            class="no-input--detail"
                                            placeholder="0"
                                        />
                                        <span class="no-admin-info">
                                            <i class="bx bxs-info-circle"></i>
                                            노출순위가 높을수록 우선 노출됩니다.
                                        </span>
                                        <span class="no-admin-info">
                                            <i class="bx bxs-info-circle"></i>
                                            미입력시 자동으로 부여됩니다.
                                        </span>
                                    </div>
                                </div>
                                <!-- admin-block -->


                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="p_title">타이틀</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="p_title"
                                            id="p_title"
                                            value="<?=$data[p_title]?>"
                                            class="no-input--detail"
                                            placeholder="타이틀을 입력해주세요."
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
                                                        name="p_target"
                                                        id="input5"
                                                        value="_none"
                                                        checked
                                                        <? if($data[p_target] == "_none") echo "checked";?>
                                                        onClick="doHideDiv('no_linkaddress');"
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
                                                        name="p_target"
                                                        id="input6"
                                                        value="_self"
                                                        <? if($data[p_target] == "_self") echo "checked";?>
                                                        onClick="doOpenDiv('no_link_target_box');"
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
                                                        name="p_target"
                                                        id="input7"
                                                        value="_blank"
                                                        <? if($data[p_target] == "_blank") echo "checked";?>
                                                        onClick="doOpenDiv('no_link_target_box');"
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

                                <div id="no_link_target_box" class="no-admin-block no_linkaddress"  style="<?=($data[p_loc] == "_none" ? "display:none" : ";")?>">
                                    <h3 class="no-admin-title">
                                        <label for="p_link">링크주소</label>
                                    </h3>
                                    <div class="no-admin-content">
                                        <input
                                            type="text"
                                            name="p_link"
                                            id="p_link"
                                            class="no-input--detail"
                                            value="<?=$data[p_link]?>"
                                            placeholder="링크주소를 입력해주세요."
                                        />
                                    </div>
                                </div>
                                <!-- admin-block -->

                                <div class="no-admin-block" >
                                    <h3 class="no-admin-title">
                                        <span>노출 위치</span>
                                    </h3>
                                    <div class="no-admin-content">
                                        <div class="no-radio-form">

                                            <label for="input10">
                                                <div class="no-radio-box">
                                                    <input
                                                        type="radio"
                                                        name="p_loc"
                                                        id="input10"
                                                        <? if($data[p_loc] == "P") echo "checked";?> 
                                                        value="P"
                                                        onClick="doOpenDiv('no_loc_target_box');"
                                                    />
                                                    <span>
                                                        <i
                                                            class="bx bx-radio-circle-marked"
                                                        ></i>
                                                    </span>
                                                </div>
                                                <span class="no-radio-text"
                                                    >PC 노출</span
                                                >
                                            </label>

                                            <label for="input11">
                                                <div class="no-radio-box">
                                                    <input
                                                        type="radio"
                                                        name="p_loc"
                                                        id="input11"
                                                        <? if($data[p_loc] == "M") echo "checked";?>
                                                        value="M" 
                                                        onClick="doHideDiv('no_pc_pos');"
                                                    />
                                                    <span>
                                                        <i
                                                            class="bx bx-radio-circle-marked"
                                                        ></i>
                                                    </span>
                                                </div>
                                                <span class="no-radio-text"
                                                    >Mobile 노출</span
                                                >
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- admin-block -->


                                <div id="no_loc_target_box" class="no-admin-block no_pc_pos" style="<?=($data[p_loc] == "P" ? "" : "display:none;")?>">
                                    <h3 class="no-admin-title">
                                        <span>PC 노출위치</span>
                                    </h3>
                                    <div class="no-admin-content">
                                        <div class="no-input-pos">
                                            <span>왼쪽으로부터 거리 (px)</span>
                                            <input
                                                type="text"
                                                name="p_left"
                                                id="p_left"
                                                class="no-input--detail"
                                                placeholder="0"
                                                value="<?=$data[p_left]?>"
                                            />
                                        </div>
                                        <div class="no-input-pos">
                                            <span>위쪽으로부터 거리 (px)</span>
                                            <input
                                                type="text"
                                                name="p_top"
                                                id="p_top"
                                                class="no-input--detail"
                                                placeholder="0"
                                                value="<?=$data[p_top]?>"
                                            />
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
                                        href="./popup.list.php"
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
        <script type="text/javascript" src="./js/popup.process.js?c=<?=$STATIC_ADMIN_JS_MODIFY_DATE?>"></script>
        <?
            include_once "../../inc/admin.footer.php";
        ?>
        
    </div>
</script>
</body>
</html>