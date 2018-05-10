<?php
function updateMsDB($usql){
	
	$conn = mysqli_connect("localhost", "root", "","march_doc");
	$result = mysqli_query($conn, $usql)or die(mysqli_error($conn));
}
echo "this is update data page";
 $mainitem=$_POST['mainitem'];
 $styleid=$_POST['sid'];
 $itemdesc=$_POST['itdesc'];
 $matcol=$_POST['matcol'];
 $gqty=$_POST['g_qty'];
 $marker=$_POST['marker'];
 $allowence=$_POST['allowence'];
 $tot_qty=$_POST['tot_qty'];
 $req_qty=$_POST['req_qty'];
 $rec_qty=$_POST['rec_qty'];
 $bal_qty=$_POST['bal_qty'];
 $inhouse=$_POST['inhouse'];
 $etd_date=$_POST['etd_date'];
 $del_mode=$_POST['del_mode'];
 
 if(isset($mainitem) || isset($styleid) ||isset($itemdesc)||isset($matcol)||isset($gqty)||isset($marker)||isset($allowence)||isset($tot_qty)||isset($req_qty)||isset($rec_qty)||isset($bal_qty)||isset($inhouse)||isset($etd_date)||isset($del_mode))
 {
	 if(!empty($mainitem) || !empty($styleid) ||!empty($itemdesc)||!empty($matcol)||!empty($gqty)||!empty($marker)||!empty($allowence)||!empty($tot_qty)||!empty($req_qty)||!empty($bal_qty)||!empty($inhouse)||!empty($etd_date)||!empty($del_mode))
	 {
		echo "all is well<br>";
		if($mainitem=="fabrics"){
			$sql = "UPDATE ".$mainitem." SET styleid='".$styleid."',itemdesc='".$itemdesc."',matcol='".$matcol."',garqty='". $gqty."',marker='".$marker."',allowence='".$allowence."',totqty='".$tot_qty."',reqqty='".$req_qty."',reciveqty='".$rec_qty."',bal_qty='".$bal_qty."',inhouse='".$inhouse."',etd_date='".$etd_date."',del_mode='".$del_mode."' WHERE styleid='".$styleid."';";
	echo $sql."<br>";
		updateMsDB($sql);
		echo "data has inserted";
		//$jsonData 
//$jsn=array();
//$jsn=json_decode($jsonData,true);
		}
		else if($mainitem=="thread"){
			$sql = "UPDATE ".$mainitem." SET styleid='".$styleid."',itemdesc='".$itemdesc."',matcol='".$matcol."',garqty='". $gqty."',marker='".$marker."',allowence='".$allowence."',totqty='".$tot_qty."',reqqty='".$req_qty."',reciveqty='".$rec_qty."',bal_qty='".$bal_qty."',inhouse='".$inhouse."',etd_date='".$etd_date."',del_mode='".$del_mode."' WHERE styleid='".$styleid."';";
			echo $sql."<br>";
		updateMsDB($sql);
		echo "data has updated";
		}
		else if($mainitem=="label"){
			$sql = "UPDATE ".$mainitem." SET styleid='".$styleid."',itemdesc='".$itemdesc."',matcol='".$matcol."',garqty='". $gqty."',marker='".$marker."',allowence='".$allowence."',totqty='".$tot_qty."',reqqty='".$req_qty."',reciveqty='".$rec_qty."',bal_qty='".$bal_qty."',inhouse='".$inhouse."',etd_date='".$etd_date."',del_mode='".$del_mode."' WHERE styleid='".$styleid."';";
       echo $sql."<br>";
		updateMsDB($sql);
		echo "data has updated";
		}
		else if($mainitem=="interlining"){
			$sql = "UPDATE ".$mainitem." SET styleid='".$styleid."',itemdesc='".$itemdesc."',matcol='".$matcol."',garqty='". $gqty."',marker='".$marker."',allowence='".$allowence."',totqty='".$tot_qty."',reqqty='".$req_qty."',reciveqty='".$rec_qty."',bal_qty='".$bal_qty."',inhouse='".$inhouse."',etd_date='".$etd_date."',del_mode='".$del_mode."' WHERE styleid='".$styleid."';";
        echo $sql."<br>";
		updateMsDB($sql);
		echo "data has updated";
		}
		else if($mainitem=="trims"){
		$sql = "UPDATE ".$mainitem." SET styleid='".$styleid."',itemdesc='".$itemdesc."',matcol='".$matcol."',garqty='". $gqty."',marker='".$marker."',allowence='".$allowence."',totqty='".$tot_qty."',reqqty='".$req_qty."',reciveqty='".$rec_qty."',bal_qty='".$bal_qty."',inhouse='".$inhouse."',etd_date='".$etd_date."',del_mode='".$del_mode."' WHERE styleid='".$styleid."';";
       echo $sql."<br>";
		updateMsDB($sql);
		echo "data has updated";
		}
		else{
			echo "u have to choose a main item.....";
		}
		 	
	}
 }
	 
	 ?>
	 <a href="marchentpanel.php">marchent panel</a>
	 <a href="logout.php">log out</a>
	 