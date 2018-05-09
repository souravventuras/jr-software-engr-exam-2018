<?php
echo "delete page";
echo "iupdate page";
function deleteEmpDB($usql){
	
	$conn = mysqli_connect("localhost", "root", "","march_doc");
	$result = mysqli_query($conn, $usql)or die(mysqli_error($conn));
}
$uid=$_POST['uid'];
if(isset($uid)){
	if(!empty($uid)){
		$sql="DELETE FROM emp_log_rec WHERE id='".$uid."'";
	echo $sql."<br>";
	deleteEmpDB($sql);
	echo "data has succesfully deleted";
	}
}

?>