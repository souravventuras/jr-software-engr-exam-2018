<?php
echo "<h1>welcome to admin page</h1>";
?>
<script>
function show(){
	
	si=document.forms[0].mytxt.value;
	
	//alert(si);
    var resp;
		var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						//resp=xmlhttp.responseText
            console.log(JSON.parse(xmlhttp.responseText));
						resp=JSON.parse(xmlhttp.responseText);
            
						
			//console.log(resp);
			msg="";
			
			for(i=0;i<resp.length;i++){
				msg="<b>emp ID :"+resp[i].id+"</b><br> <b>Name:"+resp[i].uname+"</b><br>";
			}
			
			document.getElementById("sidemsg1").innerHTML=msg; 
			
			//document.getElementById('sidemsg1').innerHTML=resp;
		}
              	//document.forms[0].uid.value=resp[i].id;
				document.getElementById("uid").value=resp[0].id;
				document.getElementById("uname").value=resp[0].uname;
				document.getElementById("email").value=resp[0].email;
				document.getElementById("pass").value=resp[0].password;
				document.getElementById("ut").value=resp[0].usertype;
				document.getElementById("am").value=resp[0].action;
	};
	
		url="emp_show.php?empid="+si;
	    xmlhttp.open("GET",url,true);
	    xmlhttp.send();
}
function insert(){
	val=document.forms[0].i.value;
	if(val=="ins"){
		document.forms[0].setAttribute("action","insert_emprec.php");
	    document.getElementById("act").value="insert";
	}
	else if(val=="upd"){
		document.forms[0].setAttribute("action","update_emprec.php");
	    document.getElementById("act").value="update";
	}
	else if(val=="del"){
			document.forms[0].setAttribute("action","delete_emprec.php");
	        document.getElementById("act").value="delete";
	}
	
}
function usert(){
	document.getElementById("ut").value=document.getElementById("ust").value;
	
}
function actmode(){
	document.getElementById("am").value=document.getElementById("acm").value;
	
}

</script>
<form action="insert_emprec.php" method="post" >
<p><b>Start typing a styleid in the input field below:</b></p>
Search Id : <input type="text" id="mytext" name="mytxt" onkeyup="show()"><span id="sidemsg1"></span><br>
<pre>

user id        :<input type="text" id="uid"  name="uid" onkeyup="check()" /><br>
user name      :<input type="text" id="uname"  name="uname" onkeyup="check()" /><br>
user email     :<input type="text" id="email"  name="email" onkeyup="check()" /><br>
user password  :<input type="text" id="pass"  name="pass" onkeyup="check()" /><br>
user type      :<select name="ut" id="ust"  onclick="usert()">
  <option value="a"  >admin</option>
  <option value="e" >employee</option>
</select><input type="text" id="ut"  name="ut" onkeyup="check()" />

activation mode:<select name="acmode" id="acm" onclick="actmode()">
  <option value="on" >on</option>
  <option value="off" >off</option>
</select><input type="text" id="am"  name="am" onkeyup="check()" />
insert :<input type="radio" value="ins" id="ins" name="i"  onclick="insert()" />
update :<input type="radio" value="upd" id="upd" name="i"  onclick="insert()" />
delete :<input type="radio" value="del" id="del" name="i"  onclick="insert()" />
</pre>
<input type="submit" value="submit" id="act" />
</form>
<a href="marchentpanel.php">marchent panel</a>
	 <a href="logout.php">log out</a>
	 