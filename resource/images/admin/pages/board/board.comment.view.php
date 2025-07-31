<!DOCTYPE html>
<html lang="ko">
<?

	include_once "../../../inc/lib/base.class.php";


	$depthnum = 1;
	$pagenum = 2;

	$no	= $_REQUEST[no];

	$query = "  select a.no, a.board_no, a.user_no, a.category_no, a.comment_cnt, a.title, a.contents, a.regdate, a.read_cnt, a.thumb_image, 
					 a.is_admin_writed, a.is_notice, a.is_secret, a.secret_pwd, a.write_name, a.isFile
					 ,file_attach_1,file_attach_origin_1 ,file_attach_2,file_attach_origin_2 ,file_attach_3, file_attach_origin_3 ,file_attach_4, file_attach_origin_4 ,file_attach_5, file_attach_origin_5
			
					from nb_board a
					where a.no = $no  ";
	//echo $query;exit;
	$result=mysql_query($query);
	$data=mysql_fetch_array($result);
	if(!$data){
		error("정보를 찾을 수 없습니다");
	}
	
	$board_no	= $data[board_no];
	$board_info	= getBoardInfoByNo($board_no);

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
            <form id="frm" name="frm" method="post" enctype="multipart/form-data">
			<input type="hidden" id="mode" name="mode" value="">
			<input type="hidden" id="no" name="no" value="<?=$data[no]?>">
			<input type="hidden" id="board_no" name="board_no" value="<?=$board_no?>">
                <section class="no-content">
                    <!-- Page Title -->
                    <div class="no-toolbar">
                        <div class="no-toolbar-container no-flex-stack">
                            <div class="no-page-indicator">
                            <h1 class="no-page-title">게시판</h1>
                                <div class="no-breadcrumb-container">
                                    <ul class="no-breadcrumb-list">
                                        <li class="no-breadcrumb-item">
                                            <span>게시판 관리</span>
                                        </li>
                                        <li class="no-breadcrumb-item">
                                            <span>댓글 관리</span>
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
									<h2 class="no-card-title">댓글관리</h2>
								</div>
								<div
									class="no-card-body no-admin-column no-admin-column--detail"
								>

								

									<div class="no-admin-block">
										<h3 class="no-admin-title">
											<label for="board">게시판</label>
										</h3>
										<div class="no-admin-content">
											<input
												type="text"
												name="board"
												id="board"
												class="no-input--detail"
												value="<?=$board_info[0]['title']?>"
												readonly
											/>
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
												class="no-input--detail"
												value="<?=$data[title]?>"
												placeholder="제목"
												readonly
											/>
										</div>
									</div>
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
												class="no-input--detail"
												value="<?=$data[write_name]?>"
												placeholder="작성자"
												readonly
											/>
										</div>
									</div>
									<!-- admin-block -->

									<div class="no-admin-block">
										<h3 class="no-admin-title">
											<label for="contents">내용</label>
										</h3>
										<div class="no-admin-content">
											<textarea
												name="contents"
												id="contents"
												class="no-input--detail"
												readonly
												placeholder="내용"
											/><?=stripslashes(nl2br($data[contents]))?></textarea>
										</div>
									</div>
									<!-- admin-block -->

									<div class="no-admin-block">
                                    <h3 class="no-admin-title">
                                        <label for="comment">댓글</label>
                                    </h3>
                                    <div class="no-admin-content file">
                                        <div class="admin-flex">
											 <textarea
											name="comment"
											id="comment"
											class="no-input--detail"
											placeholder="댓글내용"
											/></textarea>
											<a href="javascript:void(0);" class="no-btn no-btn--main" onClick="doRegSave();">등록</a>
										</div>
                                    </div>
                                </div>
                                <!-- admin-block -->
									
									<?
										$query = " select a.no, a.sitekey, a.parent_no, a.write_name, a.regdate, a.contents
														from nb_board_comment a
														where a.parent_no = $no and a.sitekey = '$NO_SITE_UNIQUE_KEY' order by a.no desc";
										//echo $query;
										$result = mysql_query($query);
									?>
									<div class="no-admin-block">
										<h3 class="no-admin-title">
											<strong>등록된 댓글</strong>
										</h3>
										<div class="no-admin-content">
											<ul class="no-cmt-list">
												<?
													while($v = mysql_fetch_array($result)){
												?>
												<li class="no-cmt-item">
													<div class="no-cmt-item__info">
														<span><?=$v[write_name]?></span>
														<span><?=getChangeDate($v[regdate], "Y.m.d")?></span>
													</div>
													<div class="no-cmt-item__content"><?=$v[contents]?></div>
													<div class="no-cmt-item__btn">
														<a href="javascript:void(0);" class="no-btn no-btn--sm no-btn--delete-outline" onClick="doCommentDelete(<?=$v[no]?>, <?=$no?>);">삭제</a>
													</div>
												</li>
												<? 
													}
												?>
											</ul>
										</div>
									</div>
									<!-- admin-block -->
									
									

									<div class="no-items-center center">
										<a
											href="./board.list.php"
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
        <script type="text/javascript" src="./js/board.comment.process.js?c=<?=$STATIC_ADMIN_JS_MODIFY_DATE?>"></script>
        <?
            include_once "../../inc/admin.footer.php";
        ?>

    </div>
	<style>
		#board_no-button{
			display: none; 
		}
		.no-cmt-list{
			display: flex; 
			flex-direction: column;
		}
		.no-cmt-item{
			border-bottom: 1px solid var(--border-color);
			border-radius: 0.6rem;	
			padding: 2.4rem 1.6rem;
		}
		.no-cmt-item:last-child{
			border-bottom: 0;
			padding-bottom:0;
		}
		.no-cmt-item:first-child{
			padding-top: 0;
		}
		.no-cmt-item__info{
			display: flex; 
			align-items: center; 
			gap: 1.6rem;
			color: var(--muted);
			font-size: 1.4rem;
		}
		.no-cmt-item__info span:nth-child(1){
			position: relative; 
		}
		.no-cmt-item__info span:nth-child(1)::after{
			position: absolute; 
			content: ''; 
			right: -0.8rem;
			top: 50%; 
			transform:  translateY(-50%);
			height: 1.2rem;
			width: 0.1rem; 
			background-color: #ddd;
		}
		.no-cmt-item__content{
			padding: 2rem 0;

		}
	</style>
</body>
</html>