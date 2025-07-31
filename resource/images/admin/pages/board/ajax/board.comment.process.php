<?
	
	include_once "../../../../inc/lib/base.class.php";
	include_once "../../../lib/admin.check.ajax.php";

	$mode	= $_POST[mode];

	 if($mode == "save"){
		
	
		$no						= xss_clean($_POST[no]);
		$board_no			= xss_clean($_POST[board_no]);
		$comment			= wrap_tag_iframe($_POST[comment]);
	
		/* user no match */
		$user_no = -1;

	
		$query = "insert into nb_board_comment (sitekey, parent_no, user_no, write_name, regdate, contents, isAdmin) 
					values
					(
						 '$NO_SITE_UNIQUE_KEY'
						, $no
						, $user_no
						,'$NO_ADM_NAME'
						, now()
						,'$comment'
						,'Y'
						)";
		// echo $query;
		$result = mysql_query($query);

		$query = "update nb_board set comment_cnt = comment_cnt + 1 where no = $no";
		$result = mysql_query($query);
		
		if($result){
			echo "{\"result\":\"success\", \"msg\":\"정상적으로 등록되었습니다.\"}";
		}else{
			echo "{\"result\":\"fail\", \"msg\":\"처리중 문제가 발생하였습니다.[Error-DB]\"}";
		}
	
	
	
	}else if($mode == "delete"){
	
		
		$no				= $_REQUEST[no];
		$board_no	= $_REQUEST[board_no];

		$query = "delete from nb_board_comment where no = $no";
		$result = mysql_query($query);

		$query = "update nb_board set comment_cnt = comment_cnt - 1 where no = $board_no";
		$result = mysql_query($query);

		if($result){
			echo "{\"result\":\"success\", \"msg\":\"정상적으로 삭제되었습니다.\"}";
		}else{
			echo "{\"result\":\"fail\", \"msg\":\"삭제에 실패했습니다.\"}";
		}
	
	
	}


?>