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
if(isset($_REQUEST['styleid']) && isset($_REQUEST['mainitm'])){
	if(!empty($_REQUEST['styleid']) && !empty($_REQUEST['mainitm']))
	{
		$sql="SELECT * FROM ".$_REQUEST['mainitm']." WHERE styleid='".$_REQUEST['styleid']."'";
	 echo showsql($sql);
	
	}
}

?>