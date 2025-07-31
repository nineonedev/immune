<?
	
	include_once "../../../../inc/lib/base.class.php";
	include_once "../../../lib/admin.check.ajax.php";


	$mode	= $_POST[mode];

	 if($mode == "save"){
	
		$board_no			= $_POST[board_no];
		$title					= xss_clean($_POST[title]);
		$direct_url			= xss_clean($_POST[direct_url]);
		$write_name		= xss_clean($_POST[write_name]);

		$contents			= mysql_real_escape_string($_POST['contents']);
		$contents			= htmlspecialchars($_POST['contents']);

		$category_no		= xss_clean($_POST[category_no]);
		$is_notice			= xss_clean($_POST[is_notice]);
		$regdate			= xss_clean($_POST[regdate]);


		$extra1				= xss_clean($_POST[extra1]);
		$extra2				= xss_clean($_POST[extra2]);
		$extra3				= xss_clean($_POST[extra3]);
		$extra4				= xss_clean($_POST[extra4]);
		$extra5				= xss_clean($_POST[extra5]);
		$extra6				= xss_clean($_POST[extra6]);
		$extra7				= xss_clean($_POST[extra7]);
		$extra8				= xss_clean($_POST[extra8]);
		$extra9				= xss_clean($_POST[extra9]);
		$extra10			= xss_clean($_POST[extra10]);
		$extra11			= xss_clean($_POST[extra11]);
		$extra12			= xss_clean($_POST[extra12]);
		$extra13			= xss_clean($_POST[extra13]);
		$extra14			= xss_clean($_POST[extra14]);
		$extra15			= xss_clean($_POST[extra15]);


		$depth1				= xss_clean($_POST[depth1]);
		$depth2				= xss_clean($_POST[depth2]);
		$depth3				= xss_clean($_POST[depth3]);
		$depth4				= xss_clean($_POST[depth4]);

		if(!$depth1)
			$depth1 = -1;

		if(!$depth2)
			$depth2 = -1;

		if(!$depth3)
			$depth3 = -1;

		if(!$depth4)
			$depth4 = -1;
		
		if(!$is_notice)
			$is_notice = "N";

		/* user no match */
		$user_no = -1;

		if(!$category_no)
			$category_no = 0;
		
		$allow							= $board_file_allow;
		$uploads_dir				= $UPLOAD_DIR_BOARD;


		$uploadResult				= fileUpoad($uploads_dir, $_FILES['thumb_image'], $origin_file, false, $allow);
		$thumb_image_saved	= $uploadResult['saved'];

		$uploadResult				= fileUpoad($uploads_dir, $_FILES['addFile1'], $origin_file, true, $allow);
		$file_attach_1_saved	= $uploadResult['saved'];
		$file_attach_1_origin		= $uploadResult['origin'];

		$uploadResult				= fileUpoad($uploads_dir, $_FILES['addFile2'], $origin_file, true, $allow);
		$file_attach_2_saved	= $uploadResult['saved'];
		$file_attach_2_origin		= $uploadResult['origin'];

		$uploadResult				= fileUpoad($uploads_dir, $_FILES['addFile3'], $origin_file, true, $allow);
		$file_attach_3_saved	= $uploadResult['saved'];
		$file_attach_3_origin		= $uploadResult['origin'];

		$uploadResult				= fileUpoad($uploads_dir, $_FILES['addFile4'], $origin_file, true, $allow);
		$file_attach_4_saved	= $uploadResult['saved'];
		$file_attach_4_origin		= $uploadResult['origin'];

		$uploadResult				= fileUpoad($uploads_dir, $_FILES['addFile5'], $origin_file, true, $allow);
		$file_attach_5_saved	= $uploadResult['saved'];
		$file_attach_5_origin		= $uploadResult['origin'];

		
		// $contents = SummerNote::save($contents);
		// $contents = mysql_real_escape_string(htmlspecialchars($contents)); 


		$query = "insert into  nb_board (sitekey, board_no, user_no, category_no, title, contents, regdate, is_notice, write_name, direct_url,
													thumb_image, 
													file_attach_1, file_attach_2, file_attach_3, file_attach_4, file_attach_5,
													file_attach_origin_1, file_attach_origin_2, file_attach_origin_3, file_attach_origin_4, file_attach_origin_5, extra1, extra2, extra3, extra4, extra5, extra6 , extra7 , extra8 , extra9 , extra10 , extra11 , extra12 , extra13 , extra14 , extra15
					) 
					values
					(
						'$NO_SITE_UNIQUE_KEY'
						,$board_no
						,$user_no
						,$category_no
						,'$title'
						,'$contents'
						";
					if(!$regdate){
						$query.= ", now()";
					}else{
						$query.= ", '$regdate'";				
					}
					$query.="
						,'$is_notice'
						,'$write_name'
                        ,'$direct_url'
						,'$thumb_image_saved'
						,'$file_attach_1_saved'
						,'$file_attach_2_saved'
						,'$file_attach_3_saved'
						,'$file_attach_4_saved'
						,'$file_attach_5_saved'
						,'$file_attach_1_origin'
						,'$file_attach_2_origin'
						,'$file_attach_3_origin'
						,'$file_attach_4_origin'
						,'$file_attach_5_origin'
						,'$extra1'
						,'$extra2'
						,'$extra3'
						,'$extra4'
						,'$extra5'
						,'$extra6'
						,'$extra7'
						,'$extra8'
						,'$extra9'
						,'$extra10'
						,'$extra11'
						,'$extra12'
						,'$extra13'
						,'$extra14'
						,'$extra15'
					)";
		//echo $query; exit; 
		$result = mysql_query($query);
		//echo mysql_error();
		
		if($result){
			echo "{\"result\":\"success\", \"msg\":\"정상적으로 등록되었습니다.\"}";
		}else{
			echo "{\"result\":\"fail\", \"msg\":\"처리중 문제가 발생하였습니다.[Error-DB]\"}";
		}
	
	
	
	}else if($mode == "edit"){

		
		$no						= $_POST[no];
		$board_no				= $_POST[board_no];
		$title						= xss_clean($_POST[title]);
		$write_name			= xss_clean($_POST[write_name]);

		$contents			= mysql_real_escape_string($_POST['contents']);
		$contents			= htmlspecialchars($_POST['contents']);

		$category_no			= xss_clean($_POST[cate_no]);
		$is_notice				= xss_clean($_POST[is_notice]);
		$regdate				= xss_clean($_POST[regdate]);
        $direct_url				= xss_clean($_POST[direct_url]);
		
		$extra1					= xss_clean($_POST[extra1]);
		$extra2					= xss_clean($_POST[extra2]);
		$extra3					= xss_clean($_POST[extra3]);
		$extra4					= xss_clean($_POST[extra4]);
		$extra5					= xss_clean($_POST[extra5]);
		$extra6					= xss_clean($_POST[extra6]);
		$extra7					= xss_clean($_POST[extra7]);
		$extra8					= xss_clean($_POST[extra8]);
		$extra9					= xss_clean($_POST[extra9]);
		$extra10				= xss_clean($_POST[extra10]);
		$extra11				= xss_clean($_POST[extra11]);
		$extra12				= xss_clean($_POST[extra12]);
		$extra13				= xss_clean($_POST[extra13]);
		$extra14				= xss_clean($_POST[extra14]);
		$extra15				= xss_clean($_POST[extra15]);


		/* user no match */
		$user_no = -1;

		if(!$category_no)
			$category_no = 0;

		if($is_notice){
			$is_notice = 'Y';
		} else {
			$is_notice = 'N';
		}
		
		$allow							= $board_file_allow;
		$uploads_dir				= $UPLOAD_DIR_BOARD;


		$uploadResult				= fileUpoad($uploads_dir, $_FILES['thumb_image'], $origin_file, false, $allow);
		$thumb_image_saved	= $uploadResult['saved'];

		$uploadResult				= fileUpoad($uploads_dir, $_FILES['addFile1'], $origin_file, true, $allow);
		$file_attach_1_saved	= $uploadResult['saved'];
		$file_attach_1_origin		= $uploadResult['origin'];

		$uploadResult				= fileUpoad($uploads_dir, $_FILES['addFile2'], $origin_file, true, $allow);
		$file_attach_2_saved	= $uploadResult['saved'];
		$file_attach_2_origin		= $uploadResult['origin'];

		$uploadResult				= fileUpoad($uploads_dir, $_FILES['addFile3'], $origin_file, true, $allow);
		$file_attach_3_saved	= $uploadResult['saved'];
		$file_attach_3_origin		= $uploadResult['origin'];

		$uploadResult				= fileUpoad($uploads_dir, $_FILES['addFile4'], $origin_file, true, $allow);
		$file_attach_4_saved	= $uploadResult['saved'];
		$file_attach_4_origin		= $uploadResult['origin'];

		$uploadResult				= fileUpoad($uploads_dir, $_FILES['addFile5'], $origin_file, true, $allow);
		$file_attach_5_saved	= $uploadResult['saved'];
		$file_attach_5_origin		= $uploadResult['origin'];




		$query = " select thumb_image, file_attach_1, file_attach_2, file_attach_3, file_attach_4, file_attach_5,
						file_attach_origin_1, file_attach_origin_2, file_attach_origin_3, file_attach_origin_4, file_attach_origin_5
						from nb_board 
						where no = $no ";

		$result=mysql_query($query);
		$data=mysql_fetch_array($result);
		if(!$data){
			error("정보를 찾을 수 없습니다");
		}

		$thumb_image	= $data[thumb_image];
		$file_attach_1	= $data[file_attach_1];
		$file_attach_2	= $data[file_attach_2];
		$file_attach_3	= $data[file_attach_3];
		$file_attach_4	= $data[file_attach_4];
		$file_attach_5	= $data[file_attach_5];


		$attach_file_del = $_POST[attach_file_del];
		
		foreach( $attach_file_del as $val ) {
			
			if($val == "0"){
				imageDelete($UPLOAD_DIR_BOARD."/".$thumb_image);
				$query	= "update nb_board set thumb_image = null where no = $no";
				mysql_query($query);
			}else if($val == "1"){
				imageDelete($UPLOAD_DIR_BOARD."/".$file_attach_1);
				$query	= "update nb_board set file_attach_1 = null, file_attach_origin_1 = null where no = $no";
				mysql_query($query);
			}else if($val == "2"){
				imageDelete($UPLOAD_DIR_BOARD."/".$file_attach_2);
				$query	= "update nb_board set file_attach_2 = null, file_attach_origin_2 = null where no = $no";
				mysql_query($query);
			}else if($val == "3"){
				imageDelete($UPLOAD_DIR_BOARD."/".$file_attach_3);
				$query	= "update nb_board set file_attach_3 = null, file_attach_origin_3 = null where no = $no";
				mysql_query($query);
			}else if($val == "4"){
				imageDelete($UPLOAD_DIR_BOARD."/".$file_attach_4);
				$query	= "update nb_board set file_attach_4 = null, file_attach_origin_4 = null where no = $no";
				mysql_query($query);
			}else if($val == "5"){
				imageDelete($UPLOAD_DIR_BOARD."/".$file_attach_5);
				$query	= "update nb_board set file_attach_5 = null, file_attach_origin_5 = null where no = $no";
				mysql_query($query);
			}
		}

		/* 신규 파일 등록시 기존 파일 제거 */
		if($thumb_image_saved){
			imageDelete($UPLOAD_DIR_BOARD."/".$thumb_image);
		}

		if($file_attach_1_saved){
			imageDelete($UPLOAD_DIR_BOARD."/".$file_attach_1);
		}

		if($file_attach_2_saved){
			imageDelete($UPLOAD_DIR_BOARD."/".$file_attach_2);
		}

		if($file_attach_3_saved){
			imageDelete($UPLOAD_DIR_BOARD."/".$file_attach_3);
		}

		if($file_attach_4_saved){
			imageDelete($UPLOAD_DIR_BOARD."/".$file_attach_4);
		}

		if($file_attach_5_saved){
			imageDelete($UPLOAD_DIR_BOARD."/".$file_attach_5);
		}


		$query = "update nb_board set 
						board_no = $board_no
						,title = '$title'
						";
						if($category_no){
							$query = $query . ",category_no = $category_no ";
						}
						if($thumb_image_saved){
							$query = $query . ",thumb_image = '$thumb_image_saved' ";
						}
						if($file_attach_1_saved){
							$query = $query . ",file_attach_1 = '$file_attach_1_saved' ";
							$query = $query . ",file_attach_origin_1 = '$file_attach_1_origin' ";
						}
						if($file_attach_2_saved){
							$query = $query . ",file_attach_2 = '$file_attach_2_saved' ";
							$query = $query . ",file_attach_origin_2 = '$file_attach_2_origin' ";
						}
						if($file_attach_3_saved){
							$query = $query . ",file_attach_3 = '$file_attach_3_saved' ";
							$query = $query . ",file_attach_origin_3 = '$file_attach_3_origin' ";
						}
						if($file_attach_4_saved){
							$query = $query . ",file_attach_4 = '$file_attach_4_saved' ";
							$query = $query . ",file_attach_origin_4 = '$file_attach_4_origin' ";
						}
						if($file_attach_5_saved){
							$query = $query . ",file_attach_5 = '$file_attach_5_saved' ";
							$query = $query . ",file_attach_origin_5 = '$file_attach_5_origin' ";
						}
						if($regdate){
							$query.= ", regdate = '$regdate'";				
						}
		$query = $query ."
                            ,direct_url = '$direct_url'
							,contents = '$contents'
							,is_notice = '$is_notice'
							,extra1 = '$extra1'
							,extra2 = '$extra2'
							,extra3 = '$extra3'
							,extra4 = '$extra4'
							,extra5 = '$extra5'
							,extra6 = '$extra6'
							,extra7 = '$extra7'
							,extra8 = '$extra8'
							,extra9 = '$extra9'
							,extra10 = '$extra10'
							,extra11 = '$extra11'
							,extra12 = '$extra12'
							,extra13 = '$extra13'
							,extra14 = '$extra14'
							,extra15 = '$extra15'
							 where no = $no";
		
		// var_dump($query); exit;
		$result = mysql_query($query);
		//echo mysql_error();
			
		if($result){
			echo "{\"result\":\"success\", \"msg\":\"정상적으로 수정되었습니다.\"}";
		}else{
			echo "{\"result\":\"fail\", \"msg\":\"처리중 문제가 발생하였습니다.[Error-DB]\"}";
		}




	}else if($mode == "delete"){
	
		
		$no		= $_POST[no];

		$query = " select thumb_image, file_attach_1, file_attach_2, file_attach_3, file_attach_4, file_attach_5,
						file_attach_origin_1, file_attach_origin_2, file_attach_origin_3, file_attach_origin_4, file_attach_origin_5
						from nb_board 
						where no = $no ";

		$result=mysql_query($query);
		$data=mysql_fetch_array($result);
		if(!$data){
			error("정보를 찾을 수 없습니다");
		}

		$thumb_image	= $data[thumb_image];
		$file_attach_1	= $data[file_attach_1];
		$file_attach_2	= $data[file_attach_2];
		$file_attach_3	= $data[file_attach_3];
		$file_attach_4	= $data[file_attach_4];
		$file_attach_5	= $data[file_attach_5];

		if($thumb_image){
			imageDelete($UPLOAD_DIR_BOARD."/".$thumb_image);
		}

		if($file_attach_1){
			imageDelete($UPLOAD_DIR_BOARD."/".$file_attach_1);
		}

		if($file_attach_2){
			imageDelete($UPLOAD_DIR_BOARD."/".$file_attach_2);
		}

		if($file_attach_3){
			imageDelete($UPLOAD_DIR_BOARD."/".$file_attach_3);
		}

		if($file_attach_4){
			imageDelete($UPLOAD_DIR_BOARD."/".$file_attach_4);
		}

		if($file_attach_5){
			imageDelete($UPLOAD_DIR_BOARD."/".$file_attach_5);
		}

		$query = "delete from nb_board where no = $no";
		$result = mysql_query($query);

		$query = "delete from nb_board_comment where parent_no = $no";
		$result = mysql_query($query);

		if($result){
			echo "{\"result\":\"success\", \"msg\":\"정상적으로 삭제되었습니다.\"}";
		}else{
			echo "{\"result\":\"fail\", \"msg\":\"파일 삭제에 실패했습니다.\"}";
		}
	
	
	}else if($mode == "delete.array"){
	
		$board_file_check_no = $_POST[board_file_check_no];
		foreach( $board_file_check_no as $val ) {

			$no		= $val;

			$query = " select thumb_image, file_attach_1, file_attach_2, file_attach_3, file_attach_4, file_attach_5,
							file_attach_origin_1, file_attach_origin_2, file_attach_origin_3, file_attach_origin_4, file_attach_origin_5
							from nb_board 
							where no = $no ";

			$result=mysql_query($query);
			$data=mysql_fetch_array($result);
			if(!$data){
				error("정보를 찾을 수 없습니다");
			}

			$thumb_image	= $data[thumb_image];
			$file_attach_1	= $data[file_attach_1];
			$file_attach_2	= $data[file_attach_2];
			$file_attach_3	= $data[file_attach_3];
			$file_attach_4	= $data[file_attach_4];
			$file_attach_5	= $data[file_attach_5];

			if($thumb_image){
				imageDelete($UPLOAD_DIR_BOARD."/".$thumb_image);
			}

			if($file_attach_1){
				imageDelete($UPLOAD_DIR_BOARD."/".$file_attach_1);
			}

			if($file_attach_2){
				imageDelete($UPLOAD_DIR_BOARD."/".$file_attach_2);
			}

			if($file_attach_3){
				imageDelete($UPLOAD_DIR_BOARD."/".$file_attach_3);
			}

			if($file_attach_4){
				imageDelete($UPLOAD_DIR_BOARD."/".$file_attach_4);
			}

			if($file_attach_5){
				imageDelete($UPLOAD_DIR_BOARD."/".$file_attach_5);
			}

			$query = "delete from nb_board where no = $no";
			$result = mysql_query($query);
			
			$query = "delete from nb_board_comment where parent_no = $no";
			$result = mysql_query($query);
			
		}

		if($result){
			echo "{\"result\":\"success\", \"msg\":\"정상적으로 삭제되었습니다.\"}";
		}else{
			echo "{\"result\":\"fail\", \"msg\":\"파일 삭제에 실패했습니다.\"}";
		}
	
	
	
	}else if($mode == "board.category"){
	
			
			$board_no = $_REQUEST[board_no];
			
			$boardManage_info	= getBoardManageInfoByNo($board_no);

			$category_yn = $boardManage_info[0]['category_yn'];


			$query = "select no, name from nb_board_category where sitekey = '$NO_SITE_UNIQUE_KEY' and board_no = $board_no order by sort_no asc";
			//echo $query;
			$result =mysql_query($query);
			$i = 0;
			$rows = "";
			while($row = mysql_fetch_array($result)) { 
				
				if($i == 0)
					$rows.= "{\"no\":\"".$row[no]."\", \"name\":\"".$row[name]."\"}";
				else
					$rows.= ",{\"no\":\"".$row[no]."\", \"name\":\"".$row[name]."\"}";
				$i++;
			}
			

			echo "{\"result\":\"success\", \"category_yn\":\"".$category_yn."\", \"rows\":[".$rows."], \"msg\":\"정상적으로 불러왔습니다.\"}";	
	
	}else if($mode == "category.depth"){
		
		$board_no = $_REQUEST[board_no];
		$boardManage_info	= getBoardManageInfoByNo($board_no);
		$depth_category_yn = $boardManage_info[0]['depth_category_yn'];
		echo "{\"result\":\"success\", \"depth_category_yn\":\"".$depth_category_yn."\", \"msg\":\"정상적으로 불러왔습니다.\"}";	
		
		
	}else if($mode == "board.field"){
	
		$board_no					= $_REQUEST['board_no'];
		$boardManage_info		= getBoardManageInfoByNo($board_no);

		
		$rows = array();
		foreach ($boardManage_info[0] as $k => $v){
			if(strpos($k, 'extra_match_field') !== false && !empty($v)) {
				$pos = strpos($k, 'extra_match_field');
				$i = substr($k, strlen('extra_match_field'), 1);
				$rows[] = array("name" => $v, "fields" => "extra$i");	
			}
		}

		echo json_encode(array(
			'test' => true,
			'result' => 'success', 
			'rows' => $rows,
			'msg' => '정상적으로 불러왔습니다.',
		));

	}else if($mode == "board.copy"){
	
			
			$no = $_REQUEST[no];

			$query = "insert into nb_board (
														sitekey, 
														board_no, 
														user_no, 
														category_no, 
														title, 
														contents, 
														regdate, 
														is_notice, 
														write_name, 
                                                        direct_url,
														thumb_image, 
														file_attach_1,
														file_attach_2,
														file_attach_3,
														file_attach_4,
														file_attach_5,
														file_attach_origin_1,
														file_attach_origin_2,
														file_attach_origin_3,
														file_attach_origin_4, 
														file_attach_origin_5,
														extra1,
														extra2, 
														extra3, 
														extra4,
														extra5,
														extra6,
														extra7,
														extra8,
														extra9,
														extra10,
														extra11,
														extra12,
														extra13,
														extra14,
														extra15
														) 
														( select 
														sitekey, 
														board_no, 
														user_no, 
														category_no, 
														title,
														contents, 
														regdate, 
														is_notice, 
														write_name, 
														direct_url,
														thumb_image, 
														file_attach_1, 
														file_attach_2, 
														file_attach_3, 
														file_attach_4, 
														file_attach_5,
														file_attach_origin_1,
														file_attach_origin_2, 
														file_attach_origin_3,
														file_attach_origin_4,
														file_attach_origin_5, 
														extra1, 
														extra2, 
														extra3, 
														extra4, 
														extra5,
														extra6,
														extra7,
														extra8,
														extra9,
														extra10,
														extra11,
														extra12,
														extra13,
														extra14,
														extra15
														from nb_board where no = $no)";
			//echo $query;
			
			$result =mysql_query($query);


			if($result){
				echo "{\"result\":\"success\", \"msg\":\"정상적으로 복사 되었습니다.\"}";
			}else{
				echo "{\"result\":\"fail\", \"msg\":\"복사에 실패했습니다.\"}";
			}
	
	}