<!DOCTYPE html>
<html>
<?
	include_once "../../../inc/lib/base.class.php";

	$depthnum = 5;
	$pagenum = 1;



	include_once "../../inc/admin.title.php";
	include_once "../../inc/admin.css.php";
	include_once "../../inc/admin.js.php";
?>
<script type="text/javascript" src="<?=$NO_IS_SUBDIR?>/admin/resource/js/datepicker.onlymonth.js?v=<?=$STATIC_FRONT_JS_MODIFY_DATE?>"></script>
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

            <?			

            $sdate = $_REQUEST[sdate];
            if($sdate){
                $sdateArr = explode("-", $sdate);
                $Select_Year = $sdateArr[0];
                $Select_Month =  $sdateArr[1];
                $Select_Day = $sdateArr[2];
            }
            $ToDay_Time = time();
            $ToDay_Year = date("Y");
            $ToDay_Month = date("m");
            $ToDay_Day = date("d");
            $ToDay_Hour = date("H");

            if(!$Select_Year) $Select_Year = $ToDay_Year;
            if(!$Select_Month) $Select_Month = $ToDay_Month;
            if(!$Select_Day) $Select_Day = $ToDay_Day;


            $curYMD = $Select_Year."-".$Select_Month."-".$Select_Day;

            // 중복체크
            $result=mysql_query("select count(*) as cnt from nb_counter_data WHERE Year='$Select_Year' AND Month='$Select_Month' AND Day='$Select_Day'");
            $isTwo = mysql_fetch_array($result);
            if($isTwo[cnt] > 1) {
                mysql_query("delete from nb_counter_data WHERE Year='$Select_Year' AND Month='$Select_Month' AND Day='$Select_Day' limit 1");
            }

            $result=mysql_query("SELECT SUM(Visit_Num) as CDSV FROM nb_counter_data WHERE Year='$Select_Year' AND Month='$Select_Month' AND Day='$Select_Day'  limit 1");
            $data = mysql_fetch_array($result);
            $Total = $data[CDSV];
            if(!$Total) $Total = 0;

            ## 시작년도 구함
            $result=mysql_query("SELECT MIN(Year) as CDMY FROM nb_counter_data limit 1");
            $data = mysql_fetch_array($result);
            $Start_Year = $data[CDMY];
            if(!$Start_Year) $Start_Year = $ToDay_Year;

            ## 시작월 구함
            $result=mysql_query("SELECT MIN(Month) as CDMM FROM nb_counter_data WHERE Year='$Start_Year' limit 1");
            $data = mysql_fetch_array($result);
            $Start_Month = $data[CDMM];
            if(!$Start_Month) $Start_Month = $ToDay_Month;

            $arr_year = array();	$arr_month = array();	$arr_day = array();
            for($i = ($ToDay_Year-2) ; $i <= $ToDay_Year ; $i++) {$arr_year[$i]++;}
            for($i = 1 ; $i <= 12 ; $i++) {$arr_month[$i]++;}
            for($i = 1 ; $i <= 31 ; $i++) {$arr_day[$i]++;}

            ?>

            <!-- Contents -->
            <form id="frm" name="frm" method="post"  autocomplete="off">
			<input type="hidden" id="mode" name="mode" value="">
                <section class="no-content">
                    <!-- Page Title -->
                    <div class="no-toolbar">
                        <div class="no-toolbar-container no-flex-stack">
                            <div class="no-page-indicator">
                            <h1 class="no-page-title">접속통계</h1>
                            <div class="no-breadcrumb-container">
                                <ul class="no-breadcrumb-list">
                                <li class="no-breadcrumb-item">
                                    <span>접속통계</span>
                                </li>
                                <li class="no-breadcrumb-item">
                                    <span>시간별</span>
                                </li>
                                </ul>
                            </div>
                            </div>
                            <!-- page indicator -->
                        </div>
                    </div>

                    <!-- Search -->
                    <div class="no-search no-toolbar-container">
                        <div class="no-card">
                            <div class="no-card-body no-admin-column">

                                <div class="no-admin-block no-w-20">
                                    <h3 class="no-admin-title">총방문자</h3>
                                    <div class="no-admin-content">
                                        <span class="no-admin-cnt"><?=$Total?>명</span>
                                    </div>
                                </div>    

                                <div class="no-admin-block no-w-80">
                                    <h3 class="no-admin-title">날짜선택</h3>
                                    
                                    <div class="no-admin-content no-admin-date">
                                        <div class="no-search-wrap">
                                            <input type="text" name="sdate" id="sdate" value="<?=$curYMD?>" autocomplete="off">

                                            <div class="no-search-btn">
                                                <button class="no-btn no-btn--main no-btn--search" onClick="doSearchList">
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
                                <h2 class="no-card-title">시간별 접속통계</h2>
                            </div>

                            <div class="no-card-body">
                               
                                <div class="no-table-responsive">
                                    <table class="no-table">
                                        <caption class="no-blind">
                                        시간, 접속수, 접속수 그래프, 접속수 퍼센트로 구성된 시간별 접속통계표
                                        </caption>
                                        
                                        <thead class="no-blind">
                                            <tr>
                                                <th scope="col" class="no-min-width-60">
                                                    시간
                                                </th>
                                                <th scope="col" class="no-min-width-60">
                                                    접속수
                                                </th>
                                                <th scope="col" class="no-min-width-150">
                                                    접속수 그래프
                                                </th>
                                                <th scope="col" class="no-min-width-60">
                                                    접속수 퍼센트
                                                </th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?                       
                                                $result = mysql_query("SELECT * FROM nb_counter_data WHERE Year='$Select_Year' AND Month='$Select_Month' AND Day='$Select_Day' limit 1");
                                                $Hour_Num_One = mysql_fetch_array($result);
                                                for($i=0;$i<=23;$i++) {
                                                    if(strlen($i) == 1) $i = "0".$i;
                                                    $Hour_Num = $Hour_Num_One["Hour$i"] ;
                                                    if($max < $Hour_Num) {
                                                        $max = $Hour_Num;
                                                    }
                                                }

                                                for($i=0 ; $i<=23 ; $i++) {
                                                    if(strlen($i) == 1) $i = "0".$i;

                                                    $result = mysql_query("SELECT SUM(Hour$i) as SH FROM nb_counter_data WHERE Year='$Select_Year' AND Month='$Select_Month' AND Day='$Select_Day' limit 1");
                                                    $data = mysql_fetch_array($result);
                                                    $Month_Num = $data[SH];
                                                    if(!$Month_Num) $Month_Num = 0;

                                                    if($Total) {
                                                        $Percent = round(100 * $Month_Num / $Total, 2);
                                                        $Percent1 = round(100 * $Month_Num / $max, 2);
                                                        $Percent_Width = 100 * $Percent1 / 100;
                                                    }
                                                    $Percent = number_format($Percent, 2);

                                                    if(!$Percent_Width) $Percent_Width = "1";

                                                    $i_D = number_format($i);

                                                    if($max == $Month_Num && $max > 0) {
                                                        $Back_Color = " bgcolor='#0083e8' ";
                                                    }
                                                    else {
                                                        $Back_Color = " bgcolor='#CCCCCC' ";
                                                    }
                                            ?>
                                            <tr>
                                                <td>
                                                    <span>
                                                        <?=$i_D?>시
                                                    </span>
                                                </td>
                                                <td>
                                                    <span>
                                                        <?=$Month_Num?>명
                                                    </span>
                                                </td>
                                                <td>
                                                    <table width='<?=$Percent_Width?>%'  cellspacing='0' cellpadding='0' height='8'>
                                                        <tr><td <?=$Back_Color?>>&nbsp;</td></tr>
                                                    </table>
                                                </td>
                                                <td>
                                                    <span><?=$Percent?>%</span>
                                                </td>
                                            </tr>
                                            <?
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- card body -->
                        </div>
                        <!-- card -->
                    </div>
                    <!-- contents -->
                </section>
            </form>
        </main>

       

        <!-- Footer -->
        <script type="text/javascript" src="./js/setting.process.js?c=<?=$STATIC_ADMIN_JS_MODIFY_DATE?>"></script>
        <?
            include_once "../../inc/admin.footer.php";
        ?>
    </div>
</body>
</html>