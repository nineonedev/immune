<!DOCTYPE html>
<html>
<?
	include_once "../../../inc/lib/base.class.php";

	$depthnum = 5;
	$pagenum = 4;



	include_once "../../inc/admin.title.php";
	include_once "../../inc/admin.css.php";
	include_once "../../inc/admin.js.php";
?>
<script type="text/javascript" src="<?=$NO_IS_SUBDIR?>/admin/resource/js/datepicker.onlyYear.js?v=<?=$STATIC_FRONT_JS_MODIFY_DATE?>"></script>
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



            $ToDay_Year = date("Y");

            $result=mysql_query("SELECT ifnull(SUM(Visit_Num),0) as CDSV FROM nb_counter_data");
            $data = mysql_fetch_array($result);
            $Total = $data[CDSV];
            if(!$Total) $Total = 0;

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
                                    <span>년도별</span>
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
                                            <input type="text" name="sdate" id="sdate" value="<?=$ToDay_Year?>" autocomplete="off">

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
                                <h2 class="no-card-title">년도별 접속통계</h2>
                            </div>

                            <div class="no-card-body">
                               
                                <div class="no-table-responsive">
                                    <table class="no-table">
                                        <caption class="no-blind">
                                        연도, 접속수, 접속수 그래프, 접속수 퍼센트로 구성된 시간별 접속통계표
                                        </caption>
                                        
                                        <thead class="no-blind">
                                            <tr>
                                                <th scope="col" class="no-min-width-60">
                                                    연도
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
                                                $result = mysql_query("SELECT ifnull(SUM(Visit_Num),0) as `0` FROM nb_counter_data group by Year order by Year desc ");
                                                $data = mysql_fetch_array($result);
                                                $max = $data[0];
                                        
                                                $result = mysql_query("SELECT Year FROM nb_counter_data GROUP BY Year ORDER BY Year ASC");
                                                $result_year = array(); 
                                                while($row = mysql_fetch_assoc($result)) { 
                                                    $result_year[] = $row; 
                                                } 

                                                foreach($result_year as $k=>$row) {
                                                    $Year_Select = $row[Year];
                                                    $result = mysql_query("SELECT ifnull(SUM(Visit_Num),0) as SV FROM nb_counter_data WHERE Year='$Year_Select'");
                                                    $data = mysql_fetch_array($result);
                                                    $Year_Num = $data[SV];

                                                    $Percent = round(100 * $Year_Num / $Total, 2);
                                                    $Percent_Width = 100 * $Percent / 100;
                                                    $Percent = number_format($Percent, 2);

                                                    if(!$Percent_Width) $Percent_Width = "1";


                                                    if($max == $Year_Num && $max > 0) {
                                                        $Back_Color = " bgcolor='#0083e8' ";
                                                    }
                                                    else {
                                                        $Back_Color = " bgcolor='#CCCCCC' ";
                                                    }


                                            ?>
                                            <tr>
                                                <td>
                                                    <span>
                                                        <?=$row[Year]?>년
                                                    </span>
                                                </td>
                                                <td>
                                                    <span>
                                                        <?=$Year_Num?>명
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
    <script>
		$(function() { 
		  $('#sdate').datepicker( {
			yearRange: "c-10:c",
			changeMonth: false,
			changeYear: true,
			showButtonPanel: true,
			closeText:'선택',
			currentText: '오늘',
			onClose: function(dateText, inst) {
			  var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
			  $(this).val($.datepicker.formatDate('yy', new Date(year, 1, 1)));
			}
		  }).focus(function () {
			$(".ui-datepicker-month").hide();
			$(".ui-datepicker-calendar").hide();
			$(".ui-datepicker-current").hide();
			$(".ui-datepicker-prev").hide();
			$(".ui-datepicker-next").hide();
			$("#ui-datepicker-div").position({
			  my: "left top",
			  at: "left bottom",
			  of: $(this)
			});
		  }).attr("readonly", false);
		});
	</script>
	<style>
	table.ui-datepicker-calendar { display:none; }
	table.ui-datepicker-months {display: none ;}
	</style>
</body>
</html>