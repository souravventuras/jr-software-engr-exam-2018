<?php
SESSION_START();
require("mysql-to-json.php");

 $ut=$_SESSION['usertype']."<br>";
 $pass=$_SESSION['pass'];
 $act=$_SESSION['act'];
 $name=$_SESSION['uname'];
//$name=$_SESSION['uname'];
$ap=$_SESSION['usertype'];
if($ap=="a"){
	 $enable="";
	
}
else if($ap=="e"){
	 $enable="disabled";
}

echo "<h1>hye this is marchent panel....:)</h1><br><h2>WELCOME MR.".$name.'</h2>';


?>
<script type="text/javascript">

function adminp()
{
	
		window.location = "admin.php";
	
}



</script>
<pre>                                                                                     <input type='button'  value='admin_panel' onclick="adminp()" <?php echo $enable;?> /></pre>

<a href="styledesc.php">Style Description</a>
<a href="masterstyle.php">MASTER STYLE</a>
<a href="showdetails.php">show details</a>
<a href="msstl_details.php">master_style_details</a><br>
<a href="logout.php">logout</a>