<?php
//<ul>
//<li><a href="fabric.php">Fabric</a></li>
//<li><a href="thread.php">Thread</a></li>
//<li><a href="label.php">Label</a></li>
//<li><a href="interlining.php">Interlining</a></li>
//<li><a href="trims.php">Trims[button]</a></li>
//</ul>
?>
<h1>insert data information</h1>
<script  text="">
 

function check(){
	//alert('this is not working');
   //sid=document.getElementById(sid).value;
  // alert(sid);
   sid=document.forms[0].sid.value;
   //alert(sid);
   itdesc=document.forms[0].itdesc.value;
   //alert(itdesc);
   matcol=document.forms[0].matcol.value;
   g_qty=document.forms[0].g_qty.value;
   marker=document.forms[0].marker.value;
   allowence=document.forms[0].allowence.value;
if(sid=="")
	{
		
		document.getElementById("sidemsg1").innerHTML="please fill style id.";
		//alert("please fill this step");
		//return false;
		
	}
	else if(itdesc=="")
	{
        document.getElementById("sidemsg2").innerHTML="please fill item description.";
        //alert("please fill this step");
		//return false;
    }
	else if(matcol=="")
	{
        document.getElementById("sidemsg3").innerHTML="please fill material colour.";
        //alert("please fill this step");
		//return false;
    }
	else if(g_qty=="")
	{
        document.getElementById("sidemsg4").innerHTML="please fill g_qty.";
        //alert("please fill this step");
		//return false;
    }
	else if(marker=="")
	{
        document.getElementById("sidemsg5").innerHTML="please fill marker.";
        //alert("please fill this step");
		//return false;
    }
	else if(allowence=="")
	{
        document.getElementById("sidemsg6").innerHTML="please fill allowence.";
        //alert("please fill this step");
		//return false;
    }
	
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

//etd_date=document.getElementById("etd_date").value;
//del_mode=document.getElementById("del_mode").value;
	//alert("this is working");
		//alert("valid function is working");
		
	
//document.getElementById("bal_qty").value=reqqty-rcqty;

//document.getElementById("inhouse").value=inhouse.toString()+"%";

	
	
}
</script>
<form action="insertdata.php" method="post" onsubmit="return check()">
Main Item : <Select name = "mainitem">
            <option value = "none"> none </option>
			<option value = "fabrics"> fabrics </option>
			<option value = "thread"> thread </option>
			<option value = "label"> label </option>
			<option value = "interlining"> interlining </option>
			<option value = "trims"> trims </option>
			
</select><br>	
<pre>		
style id                     :<input type="text" id="sid"  name="sid" onkeyup="check()" /><span id="sidemsg1"></span><br>
item description             :<input type="text" id="itdesc"  name="itdesc" onkeyup="check()" /><span id="sidemsg2"></span><br>
material colour              :<input type="text" id="matcol"  name="matcol" onkeyup="check()" /><span id="sidemsg3"></span><br>
garment quantity             :<input type="text" id="g_qty"  name="g_qty" onkeyup="check()" /><span id="sidemsg4"></span><br>
marker(yard/mtr)             :<input type="text" id="marker"  name="marker" onkeyup="check()" /><span id="sidemsg5"></span><br>
allowence(2%of marker)       :<input type="text" id="allowence"  name="allowence" onkeyup="check()" /><span id="sidemsg6"></span><br>
total quantity(marker with allownce):<input type="text" id="tot_qty"  name="tot_qty"  onkeyup="check()" /><span id="sidemsg7"></span><br>
request qunatity             :<input type="text" id="req_qty"  name="req_qty" onkeyup="check()" /><span id="sidemsg8"></span><br>
recive qunatity              :<input type="text" id="rec_qty"  name="rec_qty" onkeyup="check()" /><span id="sidemsg9"></span><br>
balance quantity             :<input type="text" id="bal_qty"  name="bal_qty" onkeyup="check()" /><br>
inhouse(% of recive quantity):<input type="text" id="inhouse"  name="inhouse" onkeyup="check()" /><br>
etd date(fabric recive date) :<input type="text" id="etd_date"  name="etd_date" onkeyup="check()" /><br>
delivery mode                :<input type="text" id="del_mode"  name="del_mode" onkeyup="check()" /><br>
<input type="submit"  value="submit" /><br>
</pre>
</form>
<a href="marchentpanel.php">marchent panel</a>
	 <a href="logout.php">log out</a>