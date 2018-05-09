<?php
require("mysql-to-json.php");
  $styleno=$_POST['styleid'];
  
if(isset($styleno))
{
	if(!empty($styleno))
	{
		//"DELETE FROM `styledesc` WHERE `styleno` = '.$styleno.'"
		$sql="DELETE FROM styledesc WHERE styleno='".$styleno."'";
	echo $sql."<br>";
	getJSONFromDB($sql);
	echo "data has succesfully deleted";
	}
}	

?>