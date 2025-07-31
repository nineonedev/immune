<?php include_once "../../../inc/lib/base.class.php";
$LnbName = "계정";

$depthnum = 8; 

?>

<!--=====================HEAD========================= -->
<?php include_once "../../inc/admin.head.php"; ?>

<body>
    <div class="no-wrap">

        <!--=====================HEADER========================= -->
        <?php include_once "../../inc/admin.header.php"; ?>

        <!--=====================MAIN========================= -->
        <main class="no-app no-container">

            <!--=====================DRAWER========================= -->
            <?php include_once "../../inc/admin.drawer.php"; ?>

            <!--=====================CONTENTS========================= -->
            <form method="POST" name="frm" id="frm" autocomplete="off">
                <input type="hidden" name="mode" id="mode" value="list">
                <section class="no-content">
                    <div class="no-toolbar">
                        <div class="no-toolbar-container no-flex-stack">
                            <div class="no-page-indicator">
                                <h1 class="no-page-title"><?=$pageName?> 관리</h1>
                                <div class="no-breadcrumb-container">
                                    <ul class="no-breadcrumb-list">
                                        <li class="no-breadcrumb-item"><span>게시판</span></li>
                                        <li class="no-breadcrumb-item"><span><?=$pageName?> 관리</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="no-items-center">
                                <a href="./board.add.php" class="no-btn no-btn--main no-btn--big"> 글등록 </a>
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
                                            <a href="javascript:void(0);" class="no-btn no-btn--sm no-btn--check active"
                                                onClick="doCheckUnCheck('no-chk', 'check');">전체선택</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="no-btn no-btn--sm no-btn--check"
                                                onClick="doCheckUnCheck('no-chk', 'uncheck');">선택해제</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="no-btn no-btn--sm no-btn--check"
                                                onClick="doDeleteArray();">선택삭제</a>
                                        </li>
                                    </ul>

                                </div>
                                <div class="no-table-responsive">
                                    <table class="no-table">
                                        <thead>
                                            <tr>
                                                <th class="no-width-25 no-check">
                                                    <div class="no-checkbox-form">
                                                        <label>
                                                            <input type="checkbox" />
                                                            <span><i class="bx bxs-check-square"></i></span>
                                                        </label>
                                                    </div>
                                                </th>
                                                <th>번호</th>
                                                <th>게시판 이름</th>
                                                <th>공지</th>
                                                <th>제목</th>
                                                <th>작성자</th>
                                                <th>작성일</th>
                                                <th>조회수</th>
                                                <th>관리</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="no-check">
                                                    <div class="no-checkbox-form">
                                                        <label>
                                                            <input type="checkbox" />
                                                            <span><i class="bx bxs-check-square"></i></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>10</td>
                                                <td>공지사항</td>
                                                <td><span class="no-btn no-btn--notice">공지</span></td>
                                                <td><a href="./board.view.php?no=10">홈페이지 리뉴얼 안내</a></td>
                                                <td>관리자</td>
                                                <td>2024-07-01</td>
                                                <td>154</td>
                                                <td>
                                                    <div class="no-table-role">
                                                        <span class="no-role-btn"><i
                                                                class="bx bx-dots-vertical-rounded"></i></span>
                                                        <div class="no-table-action">
                                                            <a href="#" class="no-btn no-btn--sm no-btn--normal">댓글</a>
                                                            <a href="#" class="no-btn no-btn--sm no-btn--normal">수정</a>
                                                            <a href="#" class="no-btn no-btn--sm no-btn--normal">복사</a>
                                                            <a href="#"
                                                                class="no-btn no-btn--sm no-btn--delete-outline">삭제</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include_once "../../lib/admin.pagination.php"; ?>
                </section>
            </form>
        </main>
        <script type="text/javascript" src="./js/board.process.js?v=<?= date('YmdHis') ?>"></script>
    </div>
    <?php include_once "../../inc/admin.footer.php"; ?>