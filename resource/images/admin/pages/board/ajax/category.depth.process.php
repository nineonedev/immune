<?
	
	include_once "../../../../inc/lib/base.class.php";
	$mode	= $_POST[mode];


	if($mode == "getCategory"){
		
		$kind	= $_REQUEST["kind"];
		$big	= $_REQUEST["big"];
		$mid	= $_REQUEST["mid"];
		$sml	= $_REQUEST["sml"];
		
		if($big){
			$bigArr = explode("^", $big);
			$big = $bigArr[0];
		}

		if($mid){
			$midArr = explode("^", $mid);
			$mid = $midArr[0];
		}

		if($sml){
			$smlArr = explode("^", $sml);
			$sml = $smlArr[0];
		}

		if($kind == "big"){
		
			$query = " select * from nb_category where mid=0 and sml=0 and itm=0 and kind='b' order by sort_no asc";

			$result=mysql_query($query);
			//echo $query;

			echo "{";
			echo "\"result\":\"success\",";
			echo "\"msg\":\"데이터 로드 성공\",";
			echo "\"rows\":[";
			
			$i=0;

			while($row = mysql_fetch_assoc($result)) { 
				
				if($i>0)
					echo ",";
					
					$no			= $row['no'];
					$big			= $row['big'];
					$mid			= $row['mid'];
					$sml			= $row['sml'];
					$itm			= $row['itm'];
					$subject		= $row['subject'];
					$disp			= $row['disp'];

					echo "{ \"no\":\"".$no."\", \"big\":\"".$big."\", \"mid\":\"".$mid."\", \"sml\":\"".$sml."\", \"itm\":\"".$itm."\",\"subject\":\"".$subject."\", \"disp\":\"".$disp."\" }";

				$i++;

			}

			echo "]";
			echo "}";


		}else if($kind == "mid"){
			

			$query = " select * from nb_category where big= $big and mid>0 and sml = 0 and itm = 0 order by sort_no asc";

			$result=mysql_query($query);
			
			echo "{";
			echo "\"result\":\"success\",";
			echo "\"msg\":\"데이터 로드 성공\",";
			echo "\"rows\":[";
			
			$i=0;

			while($row = mysql_fetch_assoc($result)) { 
				
				if($i>0)
					echo ",";
					
					$no			= $row['no'];
					$big			= $row['big'];
					$mid			= $row['mid'];
					$sml			= $row['sml'];
					$itm			= $row['itm'];
					$subject		= $row['subject'];
					$disp			= $row['disp'];

					echo "{ \"no\":\"".$no."\", \"big\":\"".$big."\", \"mid\":\"".$mid."\", \"sml\":\"".$sml."\", \"itm\":\"".$itm."\",\"subject\":\"".$subject."\", \"disp\":\"".$disp."\" }";

				$i++;

			}

			echo "]";
			echo "}";
		
		
		}else if($kind == "sml"){
			

			$query = " select * from nb_category where big= $big and mid = $mid and sml > 0 and itm = 0 order by sort_no asc";

			$result=mysql_query($query);
			
			echo "{";
			echo "\"result\":\"success\",";
			echo "\"msg\":\"데이터 로드 성공\",";
			echo "\"rows\":[";
			
			$i=0;

			while($row = mysql_fetch_assoc($result)) { 
				
				if($i>0)
					echo ",";
					
					$no			= $row['no'];
					$big			= $row['big'];
					$mid			= $row['mid'];
					$sml			= $row['sml'];
					$itm			= $row['itm'];
					$subject		= $row['subject'];
					$disp			= $row['disp'];

					echo "{ \"no\":\"".$no."\", \"big\":\"".$big."\", \"mid\":\"".$mid."\", \"sml\":\"".$sml."\", \"itm\":\"".$itm."\",\"subject\":\"".$subject."\", \"disp\":\"".$disp."\" }";

				$i++;

			}

			echo "]";
			echo "}";
		
		
		}else if($kind == "itm"){
			

			$query = " select * from nb_category where big= $big and mid = $mid and sml = $sml and itm > 0 order by sort_no asc";

			$result=mysql_query($query);
			
			echo "{";
			echo "\"result\":\"success\",";
			echo "\"msg\":\"데이터 로드 성공\",";
			echo "\"rows\":[";
			
			$i=0;

			while($row = mysql_fetch_assoc($result)) { 
				
				if($i>0)
					echo ",";
					
					$no			= $row['no'];
					$big			= $row['big'];
					$mid			= $row['mid'];
					$sml			= $row['sml'];
					$itm			= $row['itm'];
					$subject		= $row['subject'];
					$disp			= $row['disp'];

					echo "{ \"no\":\"".$no."\", \"big\":\"".$big."\", \"mid\":\"".$mid."\", \"sml\":\"".$sml."\", \"itm\":\"".$itm."\",\"subject\":\"".$subject."\", \"disp\":\"".$disp."\" }";

				$i++;

			}

			echo "]";
			echo "}";
		
		
		}


	 
	 
	 }



?>