<?
	
	include_once "../../../../inc/lib/base.class.php";
	include_once "../../../lib/admin.check.ajax.php";

	$mode	= $_POST[mode];

	 if($mode == "save"){
			
			$board_no	= $_POST[board_no];

			$query = "delete from nb_board_lev_manage where sitekey = '$NO_SITE_UNIQUE_KEY' and board_no = $board_no";
			$result = mysql_query($query);
			

			
			$i=0;

			foreach ($_POST['nb_auth_lev_no'] as $value) {
				
				//if ($value) {
			
					$nb_auth_lev_no		= $value;
					$role_list					= ($_POST['role_list'][$i] ? "Y" : "N");
					$role_write				= ($_POST['role_write'][$i] ? "Y" : "N");
					$role_view				= ($_POST['role_view'][$i] ? "Y" : "N");
					$role_edit					= ($_POST['role_edit'][$i] ? "Y" : "N");
					$role_delete				= ($_POST['role_delete'][$i] ? "Y" : "N");
					$role_comment			= ($_POST['role_comment'][$i] ? "Y" : "N");


					$query = "insert into  nb_board_lev_manage (sitekey, board_no, lev_no, role_write, role_edit,  role_view, role_list, role_delete, role_comment) 
					values
					(
						'$NO_SITE_UNIQUE_KEY'
						, $board_no
						, $nb_auth_lev_no
						,'$role_write'
						,'$role_edit'
						,'$role_view'
						,'$role_list'
						,'$role_delete'
						,'$role_comment'
					)";
					$result = mysql_query($query);

					$i++;

				//}

			}

				
			if($result){
				echo "{\"result\":\"success\", \"msg\":\"정상적으로 저장되었습니다.\"}";
			}else{
				echo "{\"result\":\"fail\", \"msg\":\"처리중 문제가 발생하였습니다.[Error-DB]\"}";
			}



	 }


?>