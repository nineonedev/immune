<?
	
	include_once "../../../../inc/lib/base.class.php";
	include_once "../../../lib/admin.check.ajax.php";

	$mode	= $_POST[mode];


	if($mode == "save"){
		

		$target			= xss_clean($_POST[target]);
		$contents		= $_POST[content];

		$query = "select  a.no
						from nb_data  a
					where a.sitekey = '$NO_SITE_UNIQUE_KEY' and a.target = '$target' ";
		
		$result1st=mysql_query($query);
		$data=mysql_fetch_array($result1st);

		if($data){
			echo "{\"result\":\"fail\", \"msg\":\"이미 데이터가 등록되어 있습니다.\"}";
		}else{
			
			$query = "insert into nb_data(sitekey, target, contents, regdate) values ('$NO_SITE_UNIQUE_KEY', '$target', '$contents', now())";
			$result = mysql_query($query);
			//echo mysql_error();
			
			if($result){
				echo "{\"result\":\"success\", \"msg\":\"정상적으로 등록되었습니다.\"}";
			}else{
				echo "{\"result\":\"fail\", \"msg\":\"처리중 문제가 발생하였습니다.[Error-DB]\"}";
			}
		
		}

	} else if($mode == "edit"){
	
		$no				= xss_clean($_POST[no]);
		$target			= xss_clean($_POST[target]);
		$contents		= $_POST[content];

		$query = "update nb_data set target = '$target' , contents = '$contents' where no = $no and sitekey = '$NO_SITE_UNIQUE_KEY'";
		$result = mysql_query($query);
		//echo mysql_error();
		
		if($result){
			echo "{\"result\":\"success\", \"msg\":\"정상적으로 수정 되었습니다.\"}";
		}else{
			echo "{\"result\":\"fail\", \"msg\":\"처리중 문제가 발생하였습니다.[Error-DB]\"}";
		}


	}