<!DOCTYPE html>
<html>
<?
	include_once "../../../inc/lib/base.class.php";


	$depthnum = 1;
	$pagenum = 3;


	$no = $_REQUEST['no'];
	$board_info	= getBoardInfoByNo($no);	


	include_once "../../inc/admin.title.php";
	include_once "../../inc/admin.css.php";
	include_once "../../inc/admin.js.php";
?>
<style>
	#board_no-button{
		display: none; 		
	}
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
            <form  id="frm" name="frm" method="post">	
			<input type="hidden" name="mode" id="mode" >
			<input type="hidden" name="board_no" id="board_no" value="<?=$no?>">
                <section class="no-content">
                    <!-- Page Title -->
                    <div class="no-toolbar">
                        <div class="no-toolbar-container no-flex-stack">
                            <div class="no-page-indicator">
                            <h1 class="no-page-title"><?=$board_info[0]['title']?> 게시판 권한</h1>
                            <div class="no-breadcrumb-container">
                                <ul class="no-breadcrumb-list">
                                <li class="no-breadcrumb-item">
                                    <span>게시판</span>
                                </li>
                                <li class="no-breadcrumb-item">
                                    <span>게시판 권한</span>
                                </li>
                                </ul>
                            </div>
                            </div>
                            <!-- page indicator -->
                        </div>
                    </div>

                    <!-- Contents -->
                    <div class="no-content-container">
                        <div class="no-card">
                            <div class="no-card-header">
                                <h2 class="no-card-title">게시글 관리</h2>
                            </div>

                            <div class="no-card-body">
                                <div class="no-table-responsive no-check-box-center">
                                    <table class="no-table">
                                        <caption class="no-blind">
                                            번호, 게시판 이름, 공지, 제목, 작성자, 작성일, 조회수,
                                            관리로 구성된 게시글 관리표
                                        </caption>
                                        
                                        <thead>
                                            <tr>
                                                <th scope="col" class="no-width-100 no-min-width-70">
                                                    등급
                                                </th>
                                                <th scope="col" class="no-width-100 no-min-width-70">
                                                    목록
                                                </th>
                                                <th scope="col" class="no-width-100 no-min-width-70">
                                                    쓰기
                                                </th>
                                                <th scope="col" class="no-width-100 no-min-width-70">
                                                    읽기
                                                </th>
                                                <th scope="col" class="no-width-100 no-min-width-70">
                                                    수정
                                                </th>
                                                <th scope="col" class="no-width-100 no-min-width-70">
                                                    삭제
                                                </th>
                                                <th scope="col" class="no-width-100 no-min-width-70">
                                                    댓글
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?
                                                $query = "  select a.no, a.board_no, a.lev_no, a.role_write, a.role_edit, a.role_view, a.role_list, a.role_delete, a.role_comment
                                                        from nb_board_lev_manage a
                                                        where a.sitekey = '$NO_SITE_UNIQUE_KEY' and a.lev_no = 0 and a.board_no = $no  ";
                                                $result=mysql_query($query);
                                                $data=mysql_fetch_array($result);
                                            
                                                $role_list_checked = "";
                                                $role_write_checked = "";
                                                $role_view_checked = "";
                                                $role_edit_checked = "";
                                                $role_delete_checked = "";
                                                $role_comment_checked = "";
                                                

                                                if($data[role_list] == "Y")
                                                    $role_list_checked = "checked";

                                                if($data[role_write] == "Y")
                                                    $role_write_checked = "checked";

                                                if($data[role_view] == "Y")
                                                    $role_view_checked = "checked";

                                                if($data[role_edit] == "Y")
                                                    $role_edit_checked = "checked";

                                                if($data[role_delete] == "Y")
                                                    $role_delete_checked = "checked";

                                                if($data[role_comment] == "Y")
                                                    $role_comment_checked = "checked";


                                            ?>
                                            <tr>
                                                <td>
                                                    <span>
                                                       비회원
                                                        <input type="hidden" name="nb_auth_lev_no[]" value="0">    
                                                    </span>
                                                </td>
                                                <td class="no-check">
                                                    <div class="no-checkbox-form">
                                                        <label for="role_list">
                                                            <input 
                                                                type="checkbox" 
                                                                name="role_list[0]" 
                                                                class="no-chk" 
                                                                id="role_list" 
                                                                value="Y"
                                                                <?=$role_list_checked?>
                                                            />
                                                            <span>
                                                                <i class="bx bxs-check-square"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="no-check">
                                                    <div class="no-checkbox-form">
                                                        <label for="role_write">
                                                            <input 
                                                                type="checkbox" 
                                                                name="role_write[0]" 
                                                                class="no-chk" 
                                                                id="role_write" 
                                                                value="Y"
                                                                <?=$role_write_checked?>
                                                            />
                                                            <span>
                                                                <i class="bx bxs-check-square"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="no-check">
                                                    <div class="no-checkbox-form">
                                                        <label for="role_view">
                                                            <input 
                                                                type="checkbox" 
                                                                name="role_view[0]" 
                                                                class="no-chk" 
                                                                id="role_view" 
                                                                value="Y"
                                                                <?=$role_view_checked?>
                                                            />
                                                            <span>
                                                                <i class="bx bxs-check-square"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="no-check">
                                                    <div class="no-checkbox-form">
                                                        <label for="role_edit">
                                                            <input 
                                                                type="checkbox" 
                                                                name="role_edit[0]" 
                                                                class="no-chk" 
                                                                id="role_edit" 
                                                                value="Y"
                                                                <?=$role_edit_checked?>
                                                            />
                                                            <span>
                                                                <i class="bx bxs-check-square"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="no-check">
                                                    <div class="no-checkbox-form">
                                                        <label for="role_delete">
                                                            <input 
                                                                type="checkbox" 
                                                                name="role_delete[0]" 
                                                                class="no-chk" 
                                                                id="role_delete" 
                                                                value="Y"
                                                                <?=$role_delete_checked?>
                                                            />
                                                            <span>
                                                                <i class="bx bxs-check-square"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="no-check">
                                                    <div class="no-checkbox-form">
                                                        <label for="role_comment">
                                                            <input 
                                                                type="checkbox" 
                                                                name="role_comment[0]" 
                                                                class="no-chk" 
                                                                id="role_comment" 
                                                                value="Y"
                                                                <?=$role_comment_checked?>
                                                            />
                                                            <span>
                                                                <i class="bx bxs-check-square"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?
                                                $query = " select a.no, a.lev_name
                                                                    from nb_member_level a
                                                                    where  a.sitekey = '$NO_SITE_UNIQUE_KEY' 
                                                                    order by  a.no asc
                                                ";
                                                $result3rd = mysql_query($query);
                                                
                                                $i=1;
                                                while($v = mysql_fetch_array($result3rd)){


                                                    $query = "  select a.no, a.board_no, a.lev_no, a.role_write, a.role_edit, a.role_view, a.role_list, a.role_delete, a.role_comment
                                                            from nb_board_lev_manage a
                                                            where a.sitekey = '$NO_SITE_UNIQUE_KEY'  and a.lev_no = $v[no] and a.board_no = $no  ";

                                                    $result2nd=mysql_query($query);
                                                    $data=mysql_fetch_array($result2nd);
                                                

                                                    $role_list_checked = "";
                                                    $role_write_checked = "";
                                                    $role_view_checked = "";
                                                    $role_edit_checked = "";
                                                    $role_delete_checked = "";
                                                    $role_comment_checked = "";
                                                    

                                                    if($data[role_list] == "Y")
                                                        $role_list_checked = "checked";

                                                    if($data[role_write] == "Y")
                                                        $role_write_checked = "checked";

                                                    if($data[role_view] == "Y")
                                                        $role_view_checked = "checked";

                                                    if($data[role_edit] == "Y")
                                                        $role_edit_checked = "checked";

                                                    if($data[role_delete] == "Y")
                                                        $role_delete_checked = "checked";

                                                    if($data[role_comment] == "Y")
                                                        $role_comment_checked = "checked";
                                            ?>
                                            
                                            <tr>
                                                <td>
                                                    <span>
                                                        <?=$v[lev_name]?>
                                                        <input type="hidden" name="nb_auth_lev_no[]" value="<?=$v[no]?>">    
                                                    </span>
                                                </td>
                                                <td class="no-check">
                                                    <div class="no-checkbox-form">
                                                        <label for="role_list<?=$i?>">
                                                            <input 
                                                                type="checkbox" 
                                                                name="role_list[<?=$i?>]" 
                                                                class="no-chk" 
                                                                id="role_list<?=$i?>" 
                                                                value="Y"
                                                                <?=$role_list_checked?>
                                                            />
                                                            <span>
                                                                <i class="bx bxs-check-square"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="no-check">
                                                    <div class="no-checkbox-form">
                                                        <label for="role_write<?=$i?>">
                                                            <input 
                                                                type="checkbox" 
                                                                name="role_write[<?=$i?>]" 
                                                                class="no-chk" 
                                                                id="role_write<?=$i?>" 
                                                                value="Y"
                                                                <?=$role_write_checked?>
                                                            />
                                                            <span>
                                                                <i class="bx bxs-check-square"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="no-check">
                                                    <div class="no-checkbox-form">
                                                        <label for="role_view<?=$i?>">
                                                            <input 
                                                                type="checkbox" 
                                                                name="role_view[<?=$i?>]" 
                                                                class="no-chk" 
                                                                id="role_view<?=$i?>" 
                                                                value="Y"
                                                                <?=$role_view_checked?>
                                                            />
                                                            <span>
                                                                <i class="bx bxs-check-square"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="no-check">
                                                    <div class="no-checkbox-form">
                                                        <label for="role_edit<?=$i?>">
                                                            <input 
                                                                type="checkbox" 
                                                                name="role_edit[<?=$i?>]" 
                                                                class="no-chk" 
                                                                id="role_edit<?=$i?>" 
                                                                value="Y"
                                                                <?=$role_edit_checked?>
                                                            />
                                                            <span>
                                                                <i class="bx bxs-check-square"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="no-check">
                                                    <div class="no-checkbox-form">
                                                        <label for="role_delete<?=$i?>">
                                                            <input 
                                                                type="checkbox" 
                                                                name="role_delete[<?=$i?>]" 
                                                                class="no-chk" 
                                                                id="role_delete<?=$i?>" 
                                                                value="Y"
                                                                <?=$role_delete_checked?>
                                                            />
                                                            <span>
                                                                <i class="bx bxs-check-square"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="no-check">
                                                    <div class="no-checkbox-form">
                                                        <label for="role_comment<?=$i?>">
                                                            <input 
                                                                type="checkbox" 
                                                                name="role_comment[<?=$i?>]" 
                                                                class="no-chk" 
                                                                id="role_comment<?=$i?>" 
                                                                value="Y"
                                                                <?=$role_comment_checked?>
                                                            />
                                                            <span>
                                                                <i class="bx bxs-check-square"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?
                                                    $i++;
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="no-items-center center">
                                    <a
                                        href="./board.role.php"
                                        class="no-btn no-btn--big no-btn--normal"
                                    >
                                        목록
                                    </a>
                                    <a
                                        href="javascript:void(0);"
                                        class="no-btn no-btn--big no-btn--main"
                                        onClick="doEditSave();"
                                    >
                                        저장
                                    </a>
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
        <script type="text/javascript" src="./js/board.role.process.js?c=<?=$STATIC_ADMIN_JS_MODIFY_DATE?>"></script>
        <?
            include_once "../../inc/admin.footer.php";
        ?>
    </div>

</body>
</html>