<h1>MARCHENDISING MANAGEMENT SYSTEM</h1>
<?php
//echo 'please login.';
?>
<script type="text/javascript">

function check(){
	l=document.forms[0].name.value;
	v=document.forms[0].pass.value;
	if(l=="")
	{
		
		document.getElementById("sidemsg1").innerHTML="please fill email.";
		//alert("please fill this step");
		return false;
		
	}
	else if(v=="")
	{
        document.getElementById("sidemsg2").innerHTML="please fill password.";
        //alert("please fill this step");
		return false;
    }
	else{
		
		return true;
	}
	
}

</script>

<h1>please give ur username and password for login........</h1>
<form action="loginCheck.php" method="post" onsubmit="return check()">



      <p>&nbsp &nbsp &nbsp email  :<input value="" type="text" id="uname"  name="name" onkeyup="check()" /><span id="sidemsg1"></span></br>  </p>
        Password  :<input type="password" id="pass"  name="pass" onkeyup="check()" /><span id="sidemsg2"></span></br>  
         

<input type="submit"  value="Log in" /><br>

</form>

