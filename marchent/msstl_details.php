<?php
?>

<script>
function show(){
	si=document.forms[0].mytxt.value;
	mi=document.getElementById('mainitem').value;
	//alert(si);
		var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						resp=JSON.parse(xmlhttp.responseText);
			console.log(resp);
			
			for(i=0;i<resp.length;i++){
				msg="<b>STYLE ID :"+resp[i].styleid+"</b><br> <b>MAIN ITEM:"+mi+"</b><br>";
			}
			
			document.getElementById("txtHint").innerHTML=msg; 
			//document.getElementById('sidemsg1').innerHTML=resp;
		}
		document.getElementById("sid").value=resp[0].styleid;
		document.getElementById("itdesc").value=resp[0].itemdesc;
		document.getElementById("matcol").value=resp[0].matcol;
		document.getElementById("g_qty").value=resp[0].garqty;
		document.getElementById("marker").value=resp[0].marker;
		document.getElementById("allowence").value=resp[0].allowence;
		document.getElementById("tot_qty").value=resp[0].totqty;
		document.getElementById("req_qty").value=resp[0].reqqty;
		document.getElementById("rec_qty").value=resp[0].reciveqty;
		document.getElementById("bal_qty").value=resp[0].bal_qty;
		document.getElementById("inhouse").value=resp[0].inhouse;
		document.getElementById("etd_date").value=resp[0].etd_date;
		document.getElementById("del_mode").value=resp[0].del_mode;
	
	};
	
		url="msstyle_db.php?styleid="+si+"&mainitm="+mi;
	    xmlhttp.open("GET",url,true);
	    xmlhttp.send();
	
}
function qtycalc(){
	
	//alert("yeah this function is working");
	g_qty=document.forms[0].g_qty.value;
   marker=document.forms[0].marker.value;
   allowence=document.forms[0].allowence.value;
    gqty=parseFloat(g_qty);
	 mrkr=parseFloat(marker);
	 alnce=parseFloat(allowence);
	tempqty=mrkr*(alnce/100);
	totmrkr = mrkr+tempqty;
	reqqty=gqty*totmrkr;
	recqty=document.forms[0].rec_qty.value;
    rcqty=parseFloat(recqty);
	balqty=reqqty-rcqty;
	inhouse=((rcqty/reqqty)*100).toFixed(2);
	document.forms[0].tot_qty.value=totmrkr.toString();
	document.forms[0].req_qty.value=reqqty.toString();
	document.forms[0].bal_qty.value=balqty.toString();
	document.forms[0].inhouse.value=inhouse.toString()+"%";
}
function del(){
	document.forms[0].setAttribute("action","delete_msstyle.php");
	document.getElementById("action").value="delete";
}
function upd(){
	document.forms[0].setAttribute("action","update_msstyle.php");
	document.getElementById("action").value="update";
}
</script>



<form action="msstyle.php" method="post">
<p><b>Start typing a styleid in the input field below:</b></p>
Style Id : <input type="text" id="mytext" name="mytxt" onkeyup="show()"> 
Main Item : <Select id="mainitem" name = "mainitem" onclick="show()" >
            <option value = "none"> none </option>
			<option value = "fabrics"> fabrics </option>
			<option value = "thread"> thread </option>
			<option value = "label"> label </option>
			<option value = "interlining"> interlining </option>
			<option value = "trims"> trims </option>
			
</select><br>		<p><span id="txtHint"></span></p>
<pre>	
style id                            :<input type="text" id="sid"  name="sid" onkeyup="check()" /><span id="sidemsg1"></span><br>
item description                    :<input type="text" id="itdesc"  name="itdesc" onkeyup="check()" /><span id="sidemsg2"></span><br>
material colour                     :<input type="text" id="matcol"  name="matcol" onkeyup="check()" /><span id="sidemsg3"></span><br>
garment quantity                    :<input type="text" id="g_qty"  name="g_qty" onkeyup="qtycalc()" /><span id="sidemsg4"></span><br>
marker(yard/mtr)                    :<input type="text" id="marker"  name="marker" onkeyup="qtycalc()" /><span id="sidemsg5"></span><br>
allowence(2%of marker)              :<input type="text" id="allowence"  name="allowence" onkeyup="qtycalc()" /><span id="sidemsg6"></span><br>
total quantity(marker with allownce):<input type="text" id="tot_qty"  name="tot_qty"  onkeyup="qtycalc()" /><span id="sidemsg7"></span><br>
request qunatity                    :<input type="text" id="req_qty"  name="req_qty" onkeyup="qtycalc()" /><span id="sidemsg8"></span><br>
recive qunatity                     :<input type="text" id="rec_qty"  name="rec_qty" onkeyup="qtycalc()" /><span id="sidemsg9"></span><br>
balance quantity                    :<input type="text" id="bal_qty"  name="bal_qty" onkeyup="qtycalc()" /><br>
inhouse(% of recive quantity)       :<input type="text" id="inhouse"  name="inhouse" onkeyup="qtycalc()" /><br>
etd date(fabric recive date)        :<input type="text" id="etd_date"  name="etd_date" onkeyup="check()" /><br>
delivery mode                       :<input type="text" id="del_mode"  name="del_mode" onkeyup="check()" /><br>
</pre>

update :<input type="radio"   onclick="upd()" /><br>
delete :<input type="radio"   onclick="del()" /><br>
<input type="submit" id="action" value="submit" />
</form>
<a href="marchentpanel.php">marchent panel</a>
	 <a href="logout.php">log out</a>
<?php

?>