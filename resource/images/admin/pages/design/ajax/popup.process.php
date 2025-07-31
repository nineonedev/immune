<?
	
	include_once "../../../../inc/lib/base.class.php";
	include_once "../../../lib/admin.check.ajax.php";

	$mode	= $_POST[mode];

	 if($mode == "save"){
		
	
		$p_view				= xss_clean($_POST[p_view]);
		$p_none_limit		= xss_clean($_POST[p_none_limit]);
		$p_sdate				= xss_clean($_POST[p_sdate]);
		$p_edate				= xss_clean($_POST[p_edate]);
		$p_title					= xss_clean($_POST[p_title]);
		$p_target				= xss_clean($_POST[p_target]);
		$p_link					= xss_clean($_POST[p_link]);
		$p_idx					= xss_clean($_POST[p_idx]);
		$p_loc					= xss_clean($_POST[p_loc]);
		$p_left					= xss_clean($_POST[p_left]);
		$p_top					= xss_clean($_POST[p_top]);

		if($p_none_limit == "Y"){
			$p_sdate = "";
			$p_edate = "";
		}

		if($p_loc == "M"){
			$p_left = "";
			$p_top = "";
		}
		
		/* user no match */
		$user_no = -1;
		
		$uploads_dir		=  $UPLOAD_DIR_POPUP;
		$uploadResult		= imageUpoad($uploads_dir, $_FILES['p_img'], $origin_file, false);
		$savedFile			= $uploadResult['saved'];

		$query = "select ifnull((max(p_idx)+1),1) as maxcnt from nb_popup 
						where sitekey = '$NO_SITE_UNIQUE_KEY' and p_loc = '$p_loc' ";
		//echo $query;
		$result=mysql_query($query);
		$data=mysql_fetch_array($result);
		if(!$data){
			error("정보를 찾을 수 없습니다");
		}

		$maxcnt = $data[maxcnt];


		$query = "insert into  nb_popup (sitekey, p_title, p_img, p_target, p_link, p_view, p_left, p_top, p_idx, 
						p_sdate, p_edate, p_rdate, p_none_limit, p_loc
					) 
					values
					(
						'$NO_SITE_UNIQUE_KEY'
						, '$p_title'
						,'$savedFile'
						,'$p_target'
						,'$p_link'
						,'$p_view'
						,'$p_left'
						,'$p_top'
						, $maxcnt
						,'$p_sdate'
						,'$p_edate'
						, now()
						,'$p_none_limit'
						,'$p_loc')";
		
		$result = mysql_query($query);
		//echo mysql_error();
		
		if($result){
			echo "{\"result\":\"success\", \"msg\":\"정상적으로 등록되었습니다.\"}";
		}else{
			echo "{\"result\":\"fail\", \"msg\":\"처리중 문제가 발생하였습니다.[Error-DB]\"}";
		}
	
	
	
	}else if($mode == "edit"){
		

		$no						= $_POST[no];

		$p_view				= xss_clean($_POST[p_view]);
		$p_none_limit		= xss_clean($_POST[p_none_limit]);
		$p_sdate				= xss_clean($_POST[p_sdate]);
		$p_edate				= xss_clean($_POST[p_edate]);
		$p_title					= xss_clean($_POST[p_title]);
		$p_target				= xss_clean($_POST[p_target]);
		$p_link					= xss_clean($_POST[p_link]);
		$p_idx					= xss_clean($_POST[p_idx]);
		$p_loc					= xss_clean($_POST[p_loc]);
		$p_left					= xss_clean($_POST[p_left]);
		$p_top					= xss_clean($_POST[p_top]);
	
		$query = "select p_title, p_img, p_target, p_link, p_view, p_left, p_top, p_idx, 
						p_sdate, p_edate, p_rdate, p_none_limit, p_loc
					from nb_popup 
						where no = $no ";
		//echo $query;
		$result=mysql_query($query);
		$data=mysql_fetch_array($result);
		if(!$data){
			error("정보를 찾을 수 없습니다");
		}

		$p_img = $data[p_img];

		$uploads_dir		=  $UPLOAD_DIR_POPUP;
		$uploadResult		= imageUpoad($uploads_dir, $_FILES['p_img'], $p_img, false);
		$savedFile			= $uploadResult['saved'];

		$query = "update nb_popup set 
						p_title = '$p_title'
						";
						if($savedFile){
							$query = $query . ",p_img = '$savedFile' ";
						}
		$query = $query .",p_target = '$p_target'
						,p_link = '$p_link'
						,p_view = '$p_view'
						,p_left = '$p_left'
						,p_top = '$p_top'
						,p_idx = '$p_idx'
						,p_sdate = '$p_sdate'
						,p_edate = '$p_edate'
						,p_none_limit = '$p_none_limit'
						,p_loc = '$p_loc'
						,p_target = '$p_target'
						 where no = $no";
		//echo $query;
		$result = mysql_query($query);
		//echo mysql_error();
		
		if($result){
			echo "{\"result\":\"success\", \"msg\":\"정상적으로 수정되었습니다.\"}";
		}else{
			echo "{\"result\":\"fail\", \"msg\":\"처리중 문제가 발생하였습니다.[Error-DB]\"}";
		}
	
	
	}else if($mode == "delete"){
	
	
		$no		= $_POST[no];

		$query = " select p_title, p_img, p_target, p_link, p_view, p_left, p_top, p_idx, 
						p_sdate, p_edate, p_rdate, p_none_limit, p_loc
						from nb_popup 
						where no = $no ";

		$result=mysql_query($query);
		$data=mysql_fetch_array($result);
		if(!$data){
			error("정보를 찾을 수 없습니다");
		}

		$filename	= $data[p_img];

		if($filename){
			imageDelete($UPLOAD_DIR_POPUP."/".$filename);
		}


		$query = "delete from nb_popup where no = $no";
		$result = mysql_query($query);

		if($result){
			echo "{\"result\":\"success\", \"msg\":\"정상적으로 삭제되었습니다.\"}";
		}else{
			echo "{\"result\":\"fail\", \"msg\":\"파일 삭제에 실패했습니다.\"}";
		}
	
	
	}



	?>