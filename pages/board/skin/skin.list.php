<?php
	if ($board_no == 10) {
?>

<main>
    <section class="sub-notice">
        <div class="container-xl">
            <hgroup class="sub-title">
                <h2>공지사항</h2>
                <span></span>
            </hgroup>

            <article class="no-article">
                <div class="opt_top">
                    <div class="search-box">
                        <input type="search" name="searchKeyword" placeholder="검색어를 입력해주세요.">
                        <button type="button" aria-label="search" onclick="doSearch();">
                            <i class="fa-light fa-magnifying-glass" style="color: #0c0c0c;"></i>
                        </button>
                    </div>
                </div>

                <ul class="notice-list">
                    <?php
                    // Reverse the array to display latest items first
                    $reversedArrResultSet = array_reverse($arrResultSet);

                    // Iterate over the reversed result set
                    foreach ($reversedArrResultSet as $k => $v) { 
                        $title = $v['title'];
                        
                        // Determine link based on secret status
                        if ($v['is_secret'] === "Y") {
                            if ($_SESSION['board_secret_confirmed_' . $v['no']] === "Y") {
                                $link = "./board.view.php?board_no=$board_no&no={$v['no']}&searchKeyword=" . base64_encode($searchKeyword) . "&searchColumn=" . base64_encode($searchColumn) . "&page=$page&category_no=$category_no";
                            } else {
                                $link = "./board.confirm.php?mode=view&board_no=$board_no&no={$v['no']}&searchKeyword=" . base64_encode($searchKeyword) . "&searchColumn=" . base64_encode($searchColumn) . "&page=$page&returnUrl=/pages/sub4/sub_inquiry_view.php";
                            }
                        } else {
                            $link = "./board.view.php?board_no=$board_no&no={$v['no']}&searchKeyword=" . base64_encode($searchKeyword) . "&searchColumn=" . base64_encode($searchColumn) . "&page=$page&category_no=$category_no";
                        }

                        // Set display values for notice or regular items
                        $numZone = "";
                        $numZoneName = "";
                        if ($v['is_notice'] === "Y") {
                            $numZone = "<span class='notice'>공지</span>";
                            $numZoneName = "";
                        } else {
                            $numZoneName = $rnumber;
                        }
                    ?>
                        <li>
                            <a href="<?= $link ?>">
                                <span class="num"><?= $numZoneName ?><?= $numZone ?></span>
                                <div class="wrap">
                                    <h3><?= $title ?></h3>
                                    <p class="date"><?= date("Y.m.d", strtotime($v['regdate'])) ?></p>
                                </div>
                            </a>
                        </li>
                    <?php
                        $rnumber--;
                    }
                    ?>
                </ul>

				<?php include_once $STATIC_ROOT."/pages/board/components/pagination.php"; ?>
            </article>
        </div>
    </section>
</main>

<?php
	}
?>