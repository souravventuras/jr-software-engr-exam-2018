<?php
function updateStlDesDB($sql){
	$conn = mysqli_connect("localhost", "root", "","march_doc");
	
	//echo $sql;
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
}
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
		$sql = "UPDATE styledesc SET styleno='".$styleno."',styledescript='".$stldesc."',destination='".$dest."',colour='".$color."',size='".$size."',wash_desc='".$wash_desc."',total_qty='".$tota_qty."',	first_del_date='".$fdd."',	trim_in_house='".$tih."' WHERE styleno='".$styleno."';";
	echo $sql."<br>";
	updateStlDesDB($sql);
	echo "data has successfully updated";
	}
}	

?>