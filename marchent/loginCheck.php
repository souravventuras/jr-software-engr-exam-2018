<?php
require("mysql-to-json.php");
SESSION_START();
if(isset($_POST['name']) && isset($_POST['pass']))
{
	$name=$_POST['name'];
	$pass=$_POST['pass'];
	
	if(!empty($name) && !empty($pass))
	{
		//$sql="select * from emp_log_rec where email='".$name."' AND password";
		$sql="select * from emp_log_rec where email='$name' AND password='$pass'";
		//echo $sql;
	} 
	else{
		echo 'u must provide all info';
	}
	
}



//echo $sql."<br>";
$jsonData= getJSONFromDB($sql);
$jsn=array();
$jsn=json_decode($jsonData,true);
//print_r($jsn);
//$jsn=json_decode($jsonData);echo $jsn[0]->name;
if(sizeof($jsn)==0){
	echo "the email or password combination is wrong please try again.<br>";
	include 'index.php';
}
else{
  // echo "yeah its ok the length is".sizeof($jsn)."<br>";
   echo "hye MR.:<b>".$jsn[0]['uname']."<b><br>";
   if($jsn[0]['usertype']=="a" || $jsn[0]['usertype']=="e"){
	  $_SESSION['usertype']=$jsn[0]['usertype']; 
	  $_SESSION['uname']=$jsn[0]['uname'];
	  $_SESSION['pass']=$jsn[0]['password']."<br>";
	  $_SESSION['act']=$jsn[0]['action'];
	 $_SESSION['usertype']=$jsn[0]['usertype'];
	 //echo $_SESSION['json']=$jsn;
  	//echo $_SESSION['uname']==$jsn[0]['uname'];
	if($jsn[0]['action']=="on")
	{
		header("Location:marchentpanel.php");
	}
	else if($jsn[0]['action']=="off"){
		echo "sorry u are blocked by admin";
	}
    
   }
  // else if($jsn[0]['usertype']=="e")
   //{
	 // echo $_SESSION['usertype']=$jsn[0]['usertype'];
	  //header("Location:marchentpanel.php");
   //}
}

//echo "<pre>";print_r($jsn);echo "</pre>";
?>