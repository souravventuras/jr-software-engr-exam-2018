<?php
require("mysql-to-json.php");
echo "this is insert data page";
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
		// echo "all is well<br>";
		if($mainitem=="fabrics"){
			$sql = "INSERT INTO fabrics 
	VALUES ('".$styleid."','".$itemdesc."','".$matcol."','".$gqty."','".$marker."','".$allowence."','".$tot_qty."','".$req_qty."','".$rec_qty."','".$bal_qty."','".$inhouse."','".$etd_date."','".$del_mode."');";
        echo $sql;
		getJSONFromDB($sql);
		echo "data has inserted";
		//$jsonData 
//$jsn=array();
//$jsn=json_decode($jsonData,true);
		}
		else if($mainitem=="thread"){
			$sql = "INSERT INTO thread 
	VALUES ('".$styleid."','".$itemdesc."','".$matcol."','".$gqty."','".$marker."','".$allowence."','".$tot_qty."','".$req_qty."','".$rec_qty."','".$bal_qty."','".$inhouse."','".$etd_date."','".$del_mode."');";
        echo $sql;
		getJSONFromDB($sql);
		echo "data has inserted";
		}
		else if($mainitem=="label"){
			$sql = "INSERT INTO label 
	VALUES ('".$styleid."','".$itemdesc."','".$matcol."','".$gqty."','".$marker."','".$allowence."','".$tot_qty."','".$req_qty."','".$rec_qty."','".$bal_qty."','".$inhouse."','".$etd_date."','".$del_mode."');";
        echo $sql;
		getJSONFromDB($sql);
		echo "data has inserted";
		}
		else if($mainitem=="interlining"){
			$sql = "INSERT INTO interlining 
	VALUES ('".$styleid."','".$itemdesc."','".$matcol."','".$gqty."','".$marker."','".$allowence."','".$tot_qty."','".$req_qty."','".$rec_qty."','".$bal_qty."','".$inhouse."','".$etd_date."','".$del_mode."');";
        echo $sql;
		getJSONFromDB($sql);
		echo "data has inserted";
		}
		else if($mainitem=="trims"){
			$sql = "INSERT INTO trims 
	VALUES ('".$styleid."','".$itemdesc."','".$matcol."','".$gqty."','".$marker."','".$allowence."','".$tot_qty."','".$req_qty."','".$rec_qty."','".$bal_qty."','".$inhouse."','".$etd_date."','".$del_mode."');";
        echo $sql;
		getJSONFromDB($sql);
		echo "data has inserted";
		}
		else{
			echo "u have to choose a main item.....";
		}
		 	
	}
 }
	 
	 ?>