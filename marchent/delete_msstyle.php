<?php
echo "this is delete data page<br>";
function deleteMsDB($usql){
	
	$conn = mysqli_connect("localhost", "root", "","march_doc");
	$result = mysqli_query($conn, $usql)or die(mysqli_error($conn));
}
  $styleid=$_POST['sid'];
  $mainitem=$_POST['mainitem'];
  
if(isset($styleid)||isset($mainitem))
{
if(!empty($styleid)||!empty($mainitem))
	{
		//"DELETE FROM `styledesc` WHERE `styleno` = '.$styleno.'"
		$sql="DELETE FROM ".$mainitem." WHERE styleid='".$styleid."'";
	echo $sql."<br>";
	deleteMsDB($sql);
	echo "data has succesfully deleted";
	}
}	

	 
?>
<a href="marchentpanel.php">marchent panel</a>
	 <a href="logout.php">log out</a>