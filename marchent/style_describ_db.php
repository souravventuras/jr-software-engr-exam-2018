<?php
require("mysql-to-json.php");
 $styleno=$_POST['styleid'];
 $stldesc=$_POST['stldesc'];
 $dest=$_POST['destination'];
 $color=$_POST['color'];
 $size=$_POST['size'];
 $wash_desc=$_POST['wash_desc'];
 $tota_qty=$_POST['tot_qty'];
 $fdd=$_POST['f_del_date'];
 $tih=$_POST['in_house_date'];
if(isset($styleno)||isset($stldesc)||isset($dest)||isset($color)||isset($size)||isset($wash_desc)||isset($tota_qty)||isset($fdd)||isset($tih))
{
	if(!empty($styleno)||!empty($stldesc)||!empty($dest)||!empty($color)||!empty($size)||!empty($wash_desc)||!empty($tota_qty)||!empty($fdd)||!empty($tih))
	{
		$sql = "INSERT INTO styledesc 
	VALUES ('".$styleno."','".$stldesc."','".$dest."','".$color."','".$size."','".$wash_desc."','".$tota_qty."','".$fdd."','".$tih."');";
	echo $sql."<br>";
	getJSONFromDB($sql);
	echo "data has inserted";
	}
}	

?>