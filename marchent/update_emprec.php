<?php
echo "iupdate page";
function updateEmpDB($usql){
	
	$conn = mysqli_connect("localhost", "root", "","march_doc");
	$result = mysqli_query($conn, $usql)or die(mysqli_error($conn));
}
echo $uid=$_POST['uid'];
echo $uname=$_POST['uname'];
echo $email=$_POST['email'];
echo $pass=$_POST['pass'];
echo $ut=$_POST['ut'];
echo $acmode=$_POST['acmode'];
 if(isset($uid) && isset($uname) && isset($email) && isset($pass)&& isset($ut) && isset($acmode)){
	 if(!empty($uid) && !empty($uname) && !empty($email) && !empty($pass) && !empty($ut)&& !empty($acmode))
     {
        $sql = "UPDATE emp_log_rec SET id='".$uid."',uname='".$uname."',email='".$email."',password='". $pass."',usertype='".$ut."',action='".$acmode."' WHERE id='".$uid."';";
	echo $sql."<br>";
		updateEmpDB($sql);
		echo "data has successfully updated";
	 }
}
?>
