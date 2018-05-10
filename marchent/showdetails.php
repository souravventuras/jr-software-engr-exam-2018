<?php
?>

<script>
function showHint() {
	//alert("the function is working");
	str=document.getElementById('mytext').value;
	//document.getElementById("spinner").style.visibility= "visible";
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			resp=JSON.parse(xmlhttp.responseText);
			msg="styleno---------style description-------destination-----colour-----size-----wash_desc---------total_quantity-----1st_del_date-----del_in_house<br>";
			for(i=0;i<resp.length;i++){
				msg=msg+resp[i].styleno+"------"+resp[i].styledescript+"-------------"+resp[i].destination+"-------------"+resp[i].colour+"--------"+resp[i].size+"-------"+resp[i].wash_desc+"-----"+resp[i].total_qty+"----------------"+resp[i].first_del_date+"--------"+resp[i].trim_in_house+"<br>";
			}
			document.getElementById("txtHint").innerHTML = msg;
		}
		document.getElementById("stn").value=resp[0].styleno;
	document.getElementById("sds").value=resp[0].styledescript;
	document.getElementById("col").value=resp[0].colour;
	document.getElementById("dest").value=resp[0].destination;
	document.getElementById("size").value=resp[0].size;
	document.getElementById("washdesc").value=resp[0].wash_desc;
	document.getElementById("t_qty").value=resp[0].total_qty;
	document.getElementById("fdd").value=resp[0].first_del_date;
	document.getElementById("tid").value=resp[0].trim_in_house;
	};
	var url="mysql-to-json2.php?signal=readjson&stlid="+str;
	//alert(url);
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
	
}
function del(){
	document.forms[0].setAttribute("action","dlt_style_desc.php");
	document.getElementById("action").value="delete";
}
function upd(){
	document.forms[0].setAttribute("action","update_style_describ.php");
	document.getElementById("action").value="update";
}
</script>


<p><b>Start typing a styleid in the input field below:</b></p>
Style Id : <input type="text" id="mytext" onkeyup="showHint()"> <p><span id="txtHint"></span></p><br/>
<input type="button" value="show" onclick="showHint()">
<?php

?>
<form action="update_style_describ.php" method="post">
<pre>
                   <h1>update STYLE DESCRIPTION </h1>
					
style no           :<input type="text" id="stn"  name="styleid" onkeyup="check()"/><br>
style description  :<input type="text" id="sds"  name="stldesc" onkeyup="check()"/><br>
colour             :<input type="text" id="col"  name="color" onkeyup="check()"/><br>
destination        :<input type="text" id="dest"  name="destination" onkeyup="check()"/><br>
size               :<input type="text" id="size"  name="size" onkeyup="check()"/><br>
wash description   :<input type="text" id="washdesc"  name="wash_desc" onkeyup="check()" /><br>
total quantity     :<input type="text" id="t_qty"  name="tot_qty" onkeyup="check()" /><br>
first delivery date:<input type="text" id="fdd"  name="f_del_date" onkeyup="check()" /><br>
trims in house date:<input type="text" id="tid"  name="in_house_date" onkeyup="check()" /><br>
update :<input type="radio"   onclick="upd()" /><br>
delete :<input type="radio"   onclick="del()" /><br>
<input type="submit" id="action" value="submit" />
</pre>
</form>
<a href="marchentpanel.php">marchent panel</a>
	 <a href="logout.php">log out</a>