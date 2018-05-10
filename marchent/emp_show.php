<?php
function showsql($sqle){
	
	//echo $sqle;
	$conn = mysqli_connect("localhost", "root", "","march_doc");
	
	//echo $sql;
	$result = mysqli_query($conn, $sqle)or die(mysqli_error($conn));
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
  	return json_encode($arr);
}
if(isset($_REQUEST['empid'])){
	if(!empty($_REQUEST['empid']))
	{
		$sql="SELECT * FROM emp_log_rec WHERE id='".$_REQUEST['empid']."'";
	 echo showsql($sql);
	echo $_REQUEST['empid'];
	}
}

?>