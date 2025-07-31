<?
	
	include_once "../../../../inc/lib/base.class.php";
	include_once "../../../lib/admin.check.ajax.php";

	$mode	= $_POST[mode];

	if($mode == "pwd.change"){
	
		$pwd_old					= $_POST[pwd_old];
		$pwd_new					= $_POST[pwd_new];
		$pwd_new_confirm		= $_POST[pwd_new_confirm];


		$hashed = hash("sha256", $pwd_old);

		$query = "select  a.no, a.uid, a.upwd, a.uname, a.active_status
						from nb_admin  a
					where a.sitekey = '$NO_SITE_UNIQUE_KEY'";
		$result1st=mysql_query($query);
		$data=mysql_fetch_array($result1st);

		if(!$data){
			echo "{\"result\":\"fail\", \"msg\":\"비정상적인 접근입니다.\"}";
			exit;
		}else{
			
			$db_no		= $data[no];
			$db_pwd	= $data[upwd];

			if($db_pwd != $hashed){
				echo "{\"result\":\"fail\", \"msg\":\"현재 비밀번호가 일치하지 않습니다. 다시 입력해주세요\"}";
				exit;
			}

			if($pwd_new != $pwd_new_confirm){
				echo "{\"result\":\"fail\", \"msg\":\"변경하시려는 신규 비밀번호와 비밀번호 확인이 서로 일치하지 않습니다.\"}";
				exit;
			}

			$new_hashed	= hash("sha256", $pwd_new);

			$query = "update nb_admin set upwd = '$new_hashed'
					where no = $db_no";
			mysql_query($query);
		
			session_start();
			session_destroy();
			
			echo "{\"result\":\"success\", \"msg\":\"정상적으로 수정 되었습니다. 변경된 비밀번호로 새로 로그인해주세요.\"}";


		}

	}else if($mode == "setting.config.save"){
	
	
		$title											= xss_clean($_POST[title]);
		$phone										= xss_clean($_POST[phone]);
		$hp											= xss_clean($_POST[hp]);
		$fax											= xss_clean($_POST[fax]);
		$email										= xss_clean($_POST[email]);
		$customercenter_able_time		= xss_clean($_POST[customercenter_able_time]);
		$company_able_time				= xss_clean($_POST[company_able_time]);
		$google_map_key					= xss_clean($_POST[google_map_key]);
		$footer_name							= xss_clean($_POST[footer_name]);
		$footer_address						= xss_clean($_POST[footer_address]);
		$footer_phone							= xss_clean($_POST[footer_phone]);
		$footer_hp								= xss_clean($_POST[footer_hp]);
		$footer_fax								= xss_clean($_POST[footer_fax]);
		$footer_email							= xss_clean($_POST[footer_email]);
		$footer_owner							= xss_clean($_POST[footer_owner]);
		$footer_ssn								= xss_clean($_POST[footer_ssn]);
		$footer_owner							= xss_clean($_POST[footer_owner]);
		$footer_policy_charger				= xss_clean($_POST[footer_policy_charger]);
		$meta_keywords						= xss_clean($_POST[meta_keywords]);
		$meta_description					= xss_clean($_POST[meta_description]);
	
		$logo_top_filename					= xss_clean($_POST[logo_top_filename]);
		$logo_footer_filename				= xss_clean($_POST[logo_footer_filename]);
		$meta_thumb_filename				= xss_clean($_POST[meta_thumb_filename]);
		$meta_favicon_ico_filename		= xss_clean($_POST[meta_favicon_ico_filename]);

		$dir_logo			=  $UPLOAD_SITEINFO_DIR_LOGO;
		$dir_meta			=  $UPLOAD_META_DIR;
		
		$uploadResult				= imageUpoad($dir_logo, $_FILES['logo_top'], $logo_top_filename, false);
		$logo_top						= $uploadResult['saved'];

		$uploadResult				= imageUpoad($dir_logo, $_FILES['logo_footer'], $logo_footer_filename, false);
		$logo_footer					= $uploadResult['saved'];

		$uploadResult				= imageUpoad($dir_meta, $_FILES['meta_thumb'], $logo_footer_filename, false);
		$meta_thumb				= $uploadResult['saved'];
		
		$uploadResult				= imageUpoad($dir_meta, $_FILES['meta_favicon_ico'], $meta_favicon_ico_filename, false);
		$meta_favicon_ico		= $uploadResult['saved'];


		$query = "select  a.no
						from nb_siteinfo  a
					where a.sitekey = '$NO_SITE_UNIQUE_KEY' ";
		
		$result1st=mysql_query($query);
		$data=mysql_fetch_array($result1st);

		if($data){
		//update

			$query = "update nb_siteinfo set 
							title = '$title'
							";
							if($logo_top){
								$query = $query . ",logo_top = '$logo_top' ";
							}
							if($logo_footer){
								$query = $query . ",logo_footer = '$logo_footer' ";
							}
							if($meta_thumb){
								$query = $query . ",meta_thumb = '$meta_thumb' ";
							}
							if($meta_favicon_ico){
								$query = $query . ",meta_favicon_ico = '$meta_favicon_ico' ";
							}
			$query = $query .",phone = '$phone'
							,hp = '$hp'
							,fax = '$fax'
							,email = '$email'
							,customercenter_able_time = '$customercenter_able_time'
							,company_able_time = '$company_able_time'
							,google_map_key = '$google_map_key'
							,footer_name = '$footer_name'
							,footer_address = '$footer_address'
							,footer_phone = '$footer_phone'
							,footer_hp = '$footer_hp'
							,footer_fax = '$footer_fax'
							,footer_email = '$footer_email'
							,footer_owner = '$footer_owner'
							,footer_ssn = '$footer_ssn'
							,footer_policy_charger = '$footer_policy_charger'
							,meta_keywords = '$meta_keywords'
							,meta_description = '$meta_description'
							where sitekey = '$NO_SITE_UNIQUE_KEY'
							";
			// echo $query; exit;
			$result = mysql_query($query);
			//echo mysql_error();

			if($result){
				echo "{\"result\":\"success\", \"msg\":\"정상적으로 수정되었습니다.\"}";
			}else{
				echo "{\"result\":\"fail\", \"msg\":\"처리중 문제가 발생하였습니다.[Error-DB]\"}";
			}

		}else{
			//insert
			
			$query = "insert into nb_siteinfo
											(sitekey, title, logo_top, logo_footer, meta_thumb, meta_favicon_ico, phone,
											hp, fax, email, customercenter_able_time, company_able_time,
											google_map_key, footer_name, footer_address, footer_phone, footer_hp,
											footer_fax, footer_email, footer_owner, footer_ssn, 	footer_policy_charger, meta_keywords,meta_description)
											values
											(
												'$NO_SITE_UNIQUE_KEY' 
												,'$title'
												,'$logo_top'
												,'$logo_footer'
												,'$meta_thumb'
												,'$meta_favicon_ico'
												,'$phone'
												,'$hp'
												,'$fax'
												,'$email'
												,'$customercenter_able_time'
												,'$company_able_time'
												,'$google_map_key'
												,'$footer_name'
												,'$footer_address'
												,'$footer_phone'
												,'$footer_hp'
												,'$footer_fax'
												,'$footer_email'
												,'$footer_owner'
												,'$footer_ssn'
												,'$footer_policy_charger'
												,'$meta_keywords'
												,'$meta_description'

											)";

			//echo $query; exit;
			$result = mysql_query($query);
			//echo mysql_error();

			if($result){
				echo "{\"result\":\"success\", \"msg\":\"정상적으로 등록 되었습니다.\"}";
			}else{
				echo "{\"result\":\"fail\", \"msg\":\"처리중 문제가 발생하였습니다.[Error-DB]\"}";
			}

											
																

		}



	}



?>