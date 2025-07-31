<?
	$gnbActive_1 = "";
	$gnbActive_2 = "";
	$gnbActive_3 = "";
	$gnbActive_4 = "";
	$gnbActive_5 = "";
	$gnbActive_6 = "";
	$gnbActive_7 = "";
	$gnbActive_8 = "";
	$gnbActive_9 = "";

	// Board -----------------------------------------------------------------------------
	$boardPageActive_1 = "";
	$boardPageActive_2 = "";

	if ($depthnum == "1" || $depthnum == 1) {
		$gnbActive_1 = "active";

		switch($pagenum){
			case 1: $boardPageActive_1 = "active"; break; 
			case 2: $boardPageActive_2 = "active"; break; 
		}
	}

	// Design -----------------------------------------------------------------------------
	$designPageActive_1 = "";
	$designPageActive_2 = "";

	if ($depthnum == "2" || $depthnum == 2) {
		$gnbActive_2 = "active";

		switch($pagenum){
			case 1: $designPageActive_1 = "active"; break; 
			case 2: $designPageActive_2 = "active"; break; 
		}
	}

	// Request ------------------------------------------------------------------------------
	if ($depthnum == "3" || $depthnum == 3) {
		$gnbActive_3 = "active";

		switch($pagenum){
			case 1: $boardPageActive_1 = "active"; break; 
			case 2: $boardPageActive_2 = "active"; break; 
		}
	}

	// Setting -----------------------------------------------------------------------------
	$settingPageActive_1 = "";
	$settingPageActive_2 = "";
	$settingPageActive_3 = "";

	if ($depthnum == "4" || $depthnum == 4) {
		$gnbActive_4 = "active";

		switch($pagenum){
			case 1: $settingPageActive_1 = "active"; break; 
			case 2: $settingPageActive_2 = "active"; break; 
			case 3: $settingPageActive_3 = "active"; break; 
		}
	}

	// Log -----------------------------------------------------------------------------
	$logPageActive_1 = "";
	$logPageActive_2 = "";
	$logPageActive_3 = "";
	$logPageActive_4 = "";

	if ($depthnum == "5" || $depthnum == 5) {
		$gnbActive_5 = "active";

		switch($pagenum){
			case 1: $logPageActive_1 = "active"; break; 
			case 2: $logPageActive_2 = "active"; break; 
			case 3: $logPageActive_3 = "active"; break; 
			case 4: $logPageActive_4 = "active"; break; 
		}
	}

    // Calendar --------------------------------------------------------------------------
    $calendarActive_1 = "";

	if ($depthnum == "6" || $depthnum == 6) {
		$gnbActive_6 = "active";

		switch($pagenum){
			case 1: $calendarActive_1 = "active"; break;
		}
	}

	// Employment --------------------------------------------------------------------------
	$empPageActive_1 = "";

	if ($depthnum == "7" || $depthnum == 7) {
		$gnbActive_7 = "active";

		switch($pagenum){
			case 1: $empPageActive_1 = "active"; break;
		}
	}

    

    // Member --------------------------------------------------------------------------
    $memberActive_1 = "";

	if ($depthnum == "8" || $depthnum == 8) {
		$gnbActive_8 = "active";

		switch($pagenum){
			case 1: $memberActive_1 = "active"; break;
		}
	}

    // Admission  --------------------------------------------------------------------------
    $categoryActive = "";

	if ($depthnum == "9" || $depthnum == 9) {
		$gnbActive_9 = "active";

		switch($pagenum){
			case 1: $categoryActive = "active"; break;
		}
	}

	 // map  --------------------------------------------------------------------------
    $mapActive = "";

	if ($depthnum == "10" || $depthnum == 10) {
		$gnbActive_10 = "active";

		switch($pagenum){
			case 1: $mapActive = "active"; break;
		}
	}
?>



<?
	// echo $depthnum.' and '.$pagenum;
?>	
<aside class="no-sidebar">
    <h1 class="no-sidebar-logo">
    <a href="<?=$NO_IS_SUBDIR?>/admin/pages/board/board.list.php">
        <img
        src="<?=$NO_IS_SUBDIR?>/resource/images/admin/logo.png"
        alt=""
        class="no-logo--default"
        />
        <img
        src="<?=$NO_IS_SUBDIR?>/resource/images/admin/logo-sm.png"
        alt=""
        class="no-logo--sm"
        />
    </a>
    <!-- toggle open close btn -->
    <div class="no-sidebar-toggle">
        <span>
        <i class="bx bx-chevrons-left"></i>
        </span>
    </div>
    </h1>
    <div class="no-sidebar-menu">
		<nav class="no-sidebar-menu__inner">
			<ul class="no-menu-list">
				<li class="no-menu-item <?=$gnbActive_1?>">
					<span class="no-menu-link">
						<span class="no-menu-icon">
							<i class="bx bx-list-ul"></i>
						</span>
						<span class="no-menu-title">게시판</span>
						<span class="no-menu-arrow">
							<i class="bx bx-chevron-down"></i>
						</span>
					</span>
					<ul class="no-menu-sub">
						<!--<li class="no-menu-item">
							<a href="<?=$NO_IS_SUBDIR?>/admin/pages/board/board.manage.list.php" class="no-menu-link <?=$boardPageActive_1?>">
								<span class="no-menu-bullet">
									<span class="no-menu-bullet-dot"></span>
								</span>
								<span class="no-menu-title">게시판 관리</span>
							</a>
						</li>-->
						<li class="no-menu-item">
							<a href="<?=$NO_IS_SUBDIR?>/admin/pages/board/board.list.php" class="no-menu-link <?=$boardPageActive_2?>">
								<span class="no-menu-bullet">
									<span class="no-menu-bullet-dot"></span>
								</span>
								<span class="no-menu-title">게시글 관리</span>
							</a>
						</li>
					</ul>
				</li>
				<!-- 게시판 Sub -->
				<li class="no-menu-item <?=$gnbActive_2?>">
					<span class="no-menu-link">
					<span class="no-menu-icon">
						<i class="bx bx-color"></i>
					</span>
					<span class="no-menu-title">디자인</span>
					<span class="no-menu-arrow">
						<i class="bx bx-chevron-down"></i>
					</span>
					</span>
					<ul class="no-menu-sub">
						<li class="no-menu-item">
							<a href="<?=$NO_IS_SUBDIR?>/admin/pages/design/banner.list.php" class="no-menu-link <?=$designPageActive_1?>">
								<span class="no-menu-bullet">
									<span class="no-menu-bullet-dot"></span>
								</span>
								<span class="no-menu-title">배너 관리</span>
							</a>
						</li>
						<li class="no-menu-item">
							<a href="<?=$NO_IS_SUBDIR?>/admin/pages/design/popup.list.php" class="no-menu-link <?=$designPageActive_2?>">
								<span class="no-menu-bullet">
									<span class="no-menu-bullet-dot"></span>
								</span>
								<span class="no-menu-title">팝업 관리</span>
							</a>
						</li>
					</ul>
				</li>
				<!-- 디자인 Sub -->
				<!--<li class="no-menu-item <?=$gnbActive_3?>">
					<a href="<?=$NO_IS_SUBDIR?>/admin/pages/request/request.list.php" class="no-menu-link">
						<span class="no-menu-icon">
							<i class='bx bx-headphone'></i>
						</span>
						<span class="no-menu-title">고객센터</span>
					</a>
				</li>
				<!-- 상담문의 -->

                <!-- <li class="no-menu-item <?=$gnbActive_6?>">
					<a href="<?=$NO_IS_SUBDIR?>/admin/pages/calendar/calendar.list.php" class="no-menu-link">
						<span class="no-menu-icon">
				                            <i class='bx bx-calendar'></i>
						</span>
						<span class="no-menu-title">Calendar</span>
					</a>
				</li>
				Calendar
				
				                <li class="no-menu-item <?=$gnbActive_7?>">
					<a href="<?=$NO_IS_SUBDIR?>/admin/pages/employment/employment.list.php" class="no-menu-link">
						<span class="no-menu-icon">
				                         <i class='bx bx-book-content'></i>
						</span>
						<span class="no-menu-title">Employment</span>
					</a>
				</li>
				Employment
				
				                <li class="no-menu-item <?=$gnbActive_8?>">
					<a href="<?=$NO_IS_SUBDIR?>/admin/pages/member/member.list.php" class="no-menu-link">
						<span class="no-menu-icon">
				                            <i class='bx bx-user' ></i>
						</span>
						<span class="no-menu-title">Member</span>
					</a>
				</li>
				Member
				
				<li class="no-menu-item <?=$gnbActive_9?>">
					<a href="<?=$NO_IS_SUBDIR?>/admin/pages/admission/admission.list.php" class="no-menu-link">
						<span class="no-menu-icon">
				                            <i class='bx bx-user' ></i>
						</span>
						<span class="no-menu-title">Admission</span>
					</a>
				</li>
				Admission -->
				<!-- <li class="no-menu-item <?=$gnbActive_10?>">
					<a href="<?=$NO_IS_SUBDIR?>/admin/pages/map/map.list.php" class="no-menu-link">
						<span class="no-menu-icon">
							<i class='bx bx-map-alt'></i>
						</span>
						<span class="no-menu-title">지도관리</span>
					</a>
				</li> -->
                
				<li class="no-menu-item <?=$gnbActive_4?>">
					<span class="no-menu-link">
						<span class="no-menu-icon">
							<i class="bx bx-cog"></i>
						</span>
						<span class="no-menu-title">설정</span>
						<span class="no-menu-arrow">
							<i class="bx bx-chevron-down"></i>
						</span>
					</span>
					<ul class="no-menu-sub">
						<li class="no-menu-item">
							<a href="<?=$NO_IS_SUBDIR?>/admin/pages/setting/setting.php" class="no-menu-link <?=$settingPageActive_1?>">
								<span class="no-menu-bullet">
									<span class="no-menu-bullet-dot"></span>
								</span>
								<span class="no-menu-title">비밀번호 변경</span>
							</a>
						</li>
						<li class="no-menu-item">
							<a href="<?=$NO_IS_SUBDIR?>/admin/pages/setting/site.config.php" class="no-menu-link <?=$settingPageActive_2?>">
								<span class="no-menu-bullet">
									<span class="no-menu-bullet-dot"></span>
								</span>
								<span class="no-menu-title">사이트 정보관리</span>
							</a>
						</li>
						<li class="no-menu-item">
							<a href="<?=$NO_IS_SUBDIR?>/admin/pages/setting/site.data.list.php" class="no-menu-link <?=$settingPageActive_3?>">
								<span class="no-menu-bullet">
									<span class="no-menu-bullet-dot"></span>
								</span>
								<span class="no-menu-title">사이트 데이터관리</span>
							</a>
						</li>
					</ul>
				</li>
				<!-- 설정 Sub -->
				<li class="no-menu-item <?=$gnbActive_5?>">
					<span class="no-menu-link">
						<span class="no-menu-icon">
							<i class="bx bx-bar-chart-square"></i>
						</span>
						<span class="no-menu-title">접속통계</span>
						<span class="no-menu-arrow">
							<i class="bx bx-chevron-down"></i>
						</span>
					</span>
					<ul class="no-menu-sub">
					<li class="no-menu-item">
						<a href="<?=$NO_IS_SUBDIR?>/admin/pages/log/log.time.php" class="no-menu-link <?=$logPageActive_1?>">
							<span class="no-menu-bullet">
								<span class="no-menu-bullet-dot"></span>
							</span>
							<span class="no-menu-title">시간별</span>
						</a>
					</li>
					<li class="no-menu-item">
						<a href="<?=$NO_IS_SUBDIR?>/admin/pages/log/log.day.php" class="no-menu-link <?=$logPageActive_2?>">
							<span class="no-menu-bullet">
								<span class="no-menu-bullet-dot"></span>
							</span>
							<span class="no-menu-title">일자별</span>
						</a>
					</li>
					<li class="no-menu-item">
						<a href="<?=$NO_IS_SUBDIR?>/admin/pages/log/log.month.php" class="no-menu-link <?=$logPageActive_3?>">
							<span class="no-menu-bullet">
								<span class="no-menu-bullet-dot"></span>
							</span>
							<span class="no-menu-title">월별</span>
						</a>
					</li>
					<li class="no-menu-item">
						<a href="<?=$NO_IS_SUBDIR?>/admin/pages/log/log.year.php" class="no-menu-link <?=$logPageActive_4?>">
							<span class="no-menu-bullet">
								<span class="no-menu-bullet-dot"></span>
							</span>
							<span class="no-menu-title">년도별</span>
						</a>
					</li>
					</ul>
				</li>
			<!-- 접속통계 Sub -->
			</ul>
		</nav>
    </div>

    <div type="button" id="theme-btn">
    <input type="checkbox" id="toggle" />
    <label class="toggle" for="toggle">
        <i class="bx bxs-sun"></i>
        <i class="bx bx-moon"></i>
        <span class="ball"></span>
    </label>
    </div>
</aside>

<script defer>
	const activatedMenu = document.querySelector('.no-menu-item.active .no-menu-arrow');
	activatedMenu.classList.add('open');
</script>



<!-- 메뉴 영역 -->
<!-- <div class="no_header_menu">
    <ul class="no_hm_list">
    <? if($NO_ADMIN_GNB_BOARD_OPEN){?>
        <li <?=$gnbActive_1?>><a href="<?=$NO_IS_SUBDIR?>/admin/pages/board/board.list.php">게시판</a></li>
        <? } ?>

        <? if($NO_ADMIN_GNB_DESIGN_OPEN){?>
        <li <?=$gnbActive_2?>><a href="<?=$NO_IS_SUBDIR?>/admin/pages/design/banner.list.php">디자인</a></li>
        <? } ?>

    
        <? if($NO_ADMIN_GNB_REQUEST_OPEN){?>
        <li <?=$gnbActive_3?>><a href="<?=$NO_IS_SUBDIR?>/admin/pages/request/request.list.php">상담문의</a></li>
        <? } ?>

        <? if($NO_ADMIN_GNB_SMS_OPEN){?>
        <li <?=$gnbActive_4?>><a href="<?=$NO_IS_SUBDIR?>/admin/pages/sms/sms.php">문자관리</a></li>
        <? } ?>

        <? if($NO_ADMIN_GNB_SETTING_OPEN){?>
        <li <?=$gnbActive_5?>><a href="<?=$NO_IS_SUBDIR?>/admin/pages/setting/setting.php">설정</a></li>
        <? } ?>

        <? if($NO_ADMIN_GNB_LOG_OPEN){?>
        <li <?=$gnbActive_6?>><a href="<?=$NO_IS_SUBDIR?>/admin/pages/log/log.day.php">접속통계</a></li>
        <? } ?>
    </ul>
</div> -->