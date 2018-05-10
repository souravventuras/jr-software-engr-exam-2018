<?php
echo "insert page";
function insertEmpDB($usql){
	
	$conn = mysqli_connect("localhost", "root", "","march_doc");
	$result = mysqli_query($conn, $usql)or die(mysqli_error($conn));
}
 $uid=$_POST['uid'];
 $uname=$_POST['uname'];
 $email=$_POST['email'];
 $pass=$_POST['pass'];
 $ut=$_POST['ut'];
 $acmode=$_POST['acmode'];
 if(isset($uid) && isset($uname) && isset($email) && isset($pass)&& isset($ut) && isset($acmode)){
	 if(!empty($uid) && !empty($uname) && !empty($email) && !empty($pass) && !empty($ut)&& !empty($acmode))
     {
		 $sql = "INSERT INTO emp_log_rec 
	VALUES ('".$uid."','".$uname."','".$email."','".$pass."','".$ut."','".$acmode."');";
        echo $sql;
		insertEmpDB($sql);
		echo "data has successfully inserted";
	 }
}
?>