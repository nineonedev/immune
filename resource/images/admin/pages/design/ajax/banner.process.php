<?
	
	include_once "../../../../inc/lib/base.class.php";
	include_once "../../../lib/admin.check.ajax.php";

	$mode	= $_POST[mode];

	 if($mode == "save"){
		
	
		$b_loc				= xss_clean($_POST[b_loc]);
		$b_img				= xss_clean($_POST[b_img]);
		$b_link				= xss_clean($_POST[b_link]);
		$b_target			= xss_clean($_POST[b_target]);
		$b_view			= xss_clean($_POST[b_view]);
		$b_title				= xss_clean($_POST[b_title]);
		$b_idx				= xss_clean($_POST[b_idx]);
		$b_none_limit	= xss_clean($_POST[b_none_limit]);
		$b_sdate			= xss_clean($_POST[b_sdate]);
		$b_edate			= xss_clean($_POST[b_edate]);
		$b_desc			= xss_clean($_POST[b_desc]);
		

		/* user no match */
		$user_no = -1;
		
		$uploads_dir		=  $UPLOAD_DIR_BANNER;
		$uploadResult		= imageUpoad($uploads_dir, $_FILES['banner_file'], $origin_file, false);
		$savedFile			= $uploadResult['saved'];

		$query = "select ifnull((max(b_idx)+1),1) as maxcnt from nb_banner 
						where sitekey = '$NO_SITE_UNIQUE_KEY' and b_loc = '$b_loc' ";
		//echo $query;
		$result=mysql_query($query);
		$data=mysql_fetch_array($result);
		if(!$data){
			error("정보를 찾을 수 없습니다");
		}

		$maxcnt = $data[maxcnt];


		$query = "insert into  nb_banner (sitekey, b_loc, b_img, b_link, b_target, b_view, b_title, b_idx, 
						b_none_limit, b_sdate, b_edate, b_rdate, b_desc
					) 
					values
					(
						'$NO_SITE_UNIQUE_KEY'
						,'$b_loc'
						,'$savedFile'
						,'$b_link'
						,'$b_target'
						,'$b_view'
						,'$b_title'
						, $maxcnt
						,'$b_none_limit'
						,'$b_sdate'
						,'$b_edate'
						, now()
						, '$b_desc')";
		
		$result = mysql_query($query);
		//echo mysql_error();
		
		if($result){
			echo "{\"result\":\"success\", \"msg\":\"정상적으로 등록되었습니다.\"}";
		}else{
			echo "{\"result\":\"fail\", \"msg\":\"처리중 문제가 발생하였습니다.[Error-DB]\"}";
		}
	
	
	
	}else if($mode == "edit"){
		
		
		$no						= $_POST[no];

		$b_loc					= xss_clean($_POST[b_loc]);
		$b_img					= xss_clean($_POST[b_img]);
		$b_link					= xss_clean($_POST[b_link]);
		$b_target				= xss_clean($_POST[b_target]);
		$b_view				= xss_clean($_POST[b_view]);
		$b_title					= xss_clean($_POST[b_title]);
		$b_idx					= xss_clean($_POST[b_idx]);
		$b_none_limit		= xss_clean($_POST[b_none_limit]);
		$b_sdate				= xss_clean($_POST[b_sdate]);
		$b_edate				= xss_clean($_POST[b_edate]);
		$b_desc				= xss_clean($_POST[b_desc]);
		$b_youtube_link	= xss_clean($_POST[b_youtube_link]);
	
		$query = "select a.no, a.b_loc, a.b_img, a.b_link, a.b_target, a.b_view, a.b_title, a.b_idx, a.b_none_limit, a.b_sdate, 
						a.b_edate, a.b_rdate
					from nb_banner a
						where a.no = $no ";
		//echo $query;
		$result=mysql_query($query);
		$data=mysql_fetch_array($result);
		if(!$data){
			error("정보를 찾을 수 없습니다");
		}

		$db_banner_file = $data[b_img];

		$uploads_dir		=  $UPLOAD_DIR_BANNER;
		$uploadResult		= imageUpoad($uploads_dir, $_FILES['banner_file'], $db_banner_file, false);
		$savedFile			= $uploadResult['saved'];

		$query = "update nb_banner set 
						b_loc = '$b_loc'
						";
						if($savedFile){
							$query = $query . ",b_img = '$savedFile' ";
						}
		$query = $query .",b_link = '$b_link'
						,b_target = '$b_target'
						,b_view = '$b_view'
						,b_title = '$b_title'
						,b_idx = $b_idx
						,b_none_limit = '$b_none_limit'
						,b_sdate = '$b_sdate'
						,b_edate = '$b_edate'
						,b_desc = '$b_desc'
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

		$query = " select a.no, a.b_loc, a.b_img, a.b_link, a.b_target, a.b_view, a.b_title, a.b_idx, a.b_none_limit, a.b_sdate, 
						a.b_edate, a.b_rdate
						from nb_banner a
						where a.no = $no ";

		$result=mysql_query($query);
		$data=mysql_fetch_array($result);
		if(!$data){
			error("정보를 찾을 수 없습니다");
		}

		$filename	= $data[b_img];

		if($filename){
			imageDelete($UPLOAD_DIR_BANNER."/".$filename);
		}


		$query = "delete from nb_banner where no = $no";
		$result = mysql_query($query);

		if($result){
			echo "{\"result\":\"success\", \"msg\":\"정상적으로 삭제되었습니다.\"}";
		}else{
			echo "{\"result\":\"fail\", \"msg\":\"파일 삭제에 실패했습니다.\"}";
		}
	
	
	}




?>