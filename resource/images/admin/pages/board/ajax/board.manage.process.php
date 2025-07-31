<?
	
	include_once "../../../../inc/lib/base.class.php";
	include_once "../../../lib/admin.check.ajax.php";

	$mode	= $_POST[mode];

	 if($mode == "save"){
		
	
		$title							= xss_clean($_POST[title]);
		$skin							= xss_clean($_POST[skin]);
		$content					= wrap_tag_iframe($_POST[content]);
		$view_yn					= xss_clean($_POST[view_yn]);
		$secret_yn					= xss_clean($_POST[secret_yn]);
		$list_size					= xss_clean($_POST[list_size]);
		$fileattach_yn				= xss_clean($_POST[fileattach_yn]);
		$fileattach_cnt				= xss_clean($_POST[fileattach_cnt]);
		$comment_yn				= xss_clean($_POST[comment_yn]);
		$category_yn				= xss_clean($_POST[category_yn]);
		$depth1						= xss_clean($_POST[depth1]);
		$depth2						= xss_clean($_POST[depth2]);
		$depth3						= xss_clean($_POST[depth3]);
		$lnb_path					= xss_clean($_POST[lnb_path]);

		$extra_match_field1					= xss_clean($_POST[extra_match_field1]);
		$extra_match_field2					= xss_clean($_POST[extra_match_field2]);
		$extra_match_field3					= xss_clean($_POST[extra_match_field3]);
		$extra_match_field4					= xss_clean($_POST[extra_match_field4]);
		$extra_match_field5					= xss_clean($_POST[extra_match_field5]);
		$extra_match_field6					= xss_clean($_POST[extra_match_field6]);
		$extra_match_field7					= xss_clean($_POST[extra_match_field7]);
		$extra_match_field8					= xss_clean($_POST[extra_match_field8]);
		$extra_match_field9					= xss_clean($_POST[extra_match_field9]);
		$extra_match_field10				= xss_clean($_POST[extra_match_field10]);
		$extra_match_field11				= xss_clean($_POST[extra_match_field11]);
		$extra_match_field12				= xss_clean($_POST[extra_match_field12]);
		$extra_match_field13				= xss_clean($_POST[extra_match_field13]);
		$extra_match_field14				= xss_clean($_POST[extra_match_field14]);
		$extra_match_field15				= xss_clean($_POST[extra_match_field15]);


		if(!$fileattach_cnt)
			$fileattach_cnt = 0;

		if(!$list_size)
			$list_size = $BOARD_DEFAULT_LIST_SIZE;

		/* user no match */
		$user_no = -1;
		
		$uploads_dir		=  $UPLOAD_DIR_BOARD;
		$uploadResult		= imageUpoad($uploads_dir, $_FILES['top_banner_image'], $origin_file, false);
		$savedFile			= $uploadResult['saved'];

	
		$query = "insert into  nb_board_manage (sitekey, title, skin, regdate, top_banner_image, contents, view_yn, secret_yn, 
						list_size, fileattach_yn, fileattach_cnt, comment_yn, depth1, depth2, depth3, lnb_path, category_yn, 
						extra_match_field1, extra_match_field2, extra_match_field3, extra_match_field4, extra_match_field5, extra_match_field6 , extra_match_field7 , extra_match_field8 , extra_match_field9 , extra_match_field10 , extra_match_field11 , extra_match_field12 , extra_match_field13 , extra_match_field14 , extra_match_field15
					) 
					values
					(
						'$NO_SITE_UNIQUE_KEY'
						,'$title'
						,'$skin'
						, now()
						,'$savedFile'
						,'$content'
						,'$view_yn'
						,'$secret_yn'
						, $list_size
						,'$fileattach_yn'
						, $fileattach_cnt
						,'$comment_yn'
						,'$depth1'
						,'$depth2'
						,'$depth3'
						,'$lnb_path'
						,'$category_yn'
						,'$extra_match_field1'
						,'$extra_match_field2'
						,'$extra_match_field3'
						,'$extra_match_field4'
						,'$extra_match_field5'
						,'$extra_match_field6'
						,'$extra_match_field7'
						,'$extra_match_field8'
						,'$extra_match_field9'
						,'$extra_match_field10'
						,'$extra_match_field11'
						,'$extra_match_field12'
						,'$extra_match_field13'
						,'$extra_match_field14'
						,'$extra_match_field15'
						)";
		//echo $query; exit; 
		$result = mysql_query($query);
		
		
		if($result){
			echo "{\"result\":\"success\", \"msg\":\"정상적으로 등록되었습니다.\"}";
		}else{
			echo "{\"result\":\"fail\", \"msg\":\"처리중 문제가 발생하였습니다.[Error-DB]\"}";
		}
	
	
	
	}else if($mode == "edit"){
		
			$no							= $_POST[no];

			$title							= xss_clean($_POST[title]);
			$skin							= xss_clean($_POST[skin]);
			$content					= wrap_tag_iframe($_POST[content]);
			$view_yn					= xss_clean($_POST[view_yn]);
			$secret_yn					= xss_clean($_POST[secret_yn]);
			$list_size					= xss_clean($_POST[list_size]);
			$fileattach_yn				= xss_clean($_POST[fileattach_yn]);
			$fileattach_cnt				= xss_clean($_POST[fileattach_cnt]);
			$comment_yn				= xss_clean($_POST[comment_yn]);
			$category_yn				= xss_clean($_POST[category_yn]);
			$depth1						= xss_clean($_POST[depth1]);
			$depth2						= xss_clean($_POST[depth2]);
			$depth3						= xss_clean($_POST[depth3]);
			$lnb_path					= xss_clean($_POST[lnb_path]);
			
			$extra_match_field1					= xss_clean($_POST[extra_match_field1]);
			$extra_match_field2					= xss_clean($_POST[extra_match_field2]);
			$extra_match_field3					= xss_clean($_POST[extra_match_field3]);
			$extra_match_field4					= xss_clean($_POST[extra_match_field4]);
			$extra_match_field5					= xss_clean($_POST[extra_match_field5]);
			$extra_match_field6					= xss_clean($_POST[extra_match_field6]);
			$extra_match_field7					= xss_clean($_POST[extra_match_field7]);
			$extra_match_field8					= xss_clean($_POST[extra_match_field8]);
			$extra_match_field9					= xss_clean($_POST[extra_match_field9]);
			$extra_match_field10				= xss_clean($_POST[extra_match_field10]);
			$extra_match_field11				= xss_clean($_POST[extra_match_field11]);
			$extra_match_field12				= xss_clean($_POST[extra_match_field12]);
			$extra_match_field13				= xss_clean($_POST[extra_match_field13]);
			$extra_match_field14				= xss_clean($_POST[extra_match_field14]);
			$extra_match_field15				= xss_clean($_POST[extra_match_field15]);

			if(!$fileattach_cnt)
				$fileattach_cnt = 0;

			if(!$list_size)
				$list_size = $BOARD_DEFAULT_LIST_SIZE;

			/* user no match */
			$user_no = -1;
			
			$uploads_dir		=  $UPLOAD_DIR_BOARD;
			$uploadResult		= imageUpoad($uploads_dir, $_FILES['top_banner_image'], $origin_file, false);
			$savedFile			= $uploadResult['saved'];


			$query = "update nb_board_manage set 
						title = '$title'
						";
						if($savedFile){
							$query = $query . ",top_banner_image = '$savedFile' ";
						}
			$query = $query ."
							,skin = '$skin'
							,contents = '$content'
							,view_yn = '$view_yn'
							,secret_yn = '$secret_yn'
							,list_size = $list_size
							,fileattach_yn = '$fileattach_yn'
							,fileattach_cnt = $fileattach_cnt
							,comment_yn = '$comment_yn'
							,depth1 = '$depth1'
							,depth2 = '$depth2'
							,depth3 = '$depth3'
							,lnb_path = '$lnb_path'
							,category_yn = '$category_yn'
							,extra_match_field1 = '$extra_match_field1'
							,extra_match_field2 = '$extra_match_field2'
							,extra_match_field3 = '$extra_match_field3'
							,extra_match_field4 = '$extra_match_field4'
							,extra_match_field5 = '$extra_match_field5'
							,extra_match_field6 = '$extra_match_field6'
							,extra_match_field7 = '$extra_match_field7'
							,extra_match_field8 = '$extra_match_field8'
							,extra_match_field9 = '$extra_match_field9'
							,extra_match_field10 = '$extra_match_field10'
							,extra_match_field11 = '$extra_match_field11'
							,extra_match_field12 = '$extra_match_field12'
							,extra_match_field13 = '$extra_match_field13'
							,extra_match_field14 = '$extra_match_field14'
							,extra_match_field15 = '$extra_match_field15'
							 where no = $no";
			$result = mysql_query($query);
			//echo mysql_error();
			
			if($result){
				echo "{\"result\":\"success\", \"msg\":\"정상적으로 수정되었습니다.\"}";
			}else{
				echo "{\"result\":\"fail\", \"msg\":\"처리중 문제가 발생하였습니다.[Error-DB]\"}";
			}



	
	}else if($mode == "delete"){
	
		
		$no		= $_POST[no];

		$query = " select a.no, a.top_banner_image
						from nb_board_manage a
						where a.no = $no ";

		$result=mysql_query($query);
		$data=mysql_fetch_array($result);
		if(!$data){
			error("정보를 찾을 수 없습니다");
		}

		$filename	= $data[top_banner_image];

		if($filename){
			imageDelete($UPLOAD_DIR_BOARD."/".$filename);
		}


		$query = "delete from nb_board_manage where no = $no";
		$result = mysql_query($query);

		if($result){
			echo "{\"result\":\"success\", \"msg\":\"정상적으로 삭제되었습니다.\"}";
		}else{
			echo "{\"result\":\"fail\", \"msg\":\"파일 삭제에 실패했습니다.\"}";
		}
	
	
	}else if($mode == "category.add"){
	
		$board_no			= $_POST[board_no];
		$name					= $_POST[name];

		
		$query = " select ifnull(max(sort_no), 0)+1 as sort_no
						from nb_board_category 
						where sitekey = '$NO_SITE_UNIQUE_KEY' and board_no = $board_no ";

		$result=mysql_query($query);
		$data=mysql_fetch_array($result);
		if(!$data){
			error("정보를 찾을 수 없습니다");
		}

		$sort_no = $data[sort_no];
		
		$query = "insert into  nb_board_category (sitekey, board_no, name, sort_no
					) 
					values
					(
						'$NO_SITE_UNIQUE_KEY'
						, $board_no
						,'$name'
						, $sort_no
						
						)";
		//echo $query;
		$result = mysql_query($query);
		
		
		if($result){
			echo "{\"result\":\"success\", \"msg\":\"정상적으로 등록되었습니다.\"}";
		}else{
			echo "{\"result\":\"fail\", \"msg\":\"처리중 문제가 발생하였습니다.[Error-DB]\"}";
		}
	
	
	
	}else if($mode == "category.save"){
		

		$no						= $_POST[no];
		$name					= urldecode($_POST[name]);
		$sort_no				= $_POST[sort_no];


		$query = "update nb_board_category 
						set
						name = '$name'
						, sort_no = $sort_no
						where no = $no";
		//echo $query;
		$result = mysql_query($query);
		
		
		if($result){
			echo "{\"result\":\"success\", \"msg\":\"정상적으로 수정 되었습니다.\"}";
		}else{
			echo "{\"result\":\"fail\", \"msg\":\"처리중 문제가 발생하였습니다.[Error-DB]\"}";
		}

	}else if($mode == "category.delete"){
	
		$no		= $_POST[no];

		
		$query = "delete from nb_board_category where no = $no";
		$result = mysql_query($query);

		if($result){
			echo "{\"result\":\"success\", \"msg\":\"정상적으로 삭제되었습니다.\"}";
		}else{
			echo "{\"result\":\"fail\", \"msg\":\"파일 삭제에 실패했습니다.\"}";
		}
	
	}




?>