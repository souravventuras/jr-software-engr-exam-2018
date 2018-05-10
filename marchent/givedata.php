<h1>thread details<h1>
<script  text="">
 

function check(){
	
	//alert("this is working");
}
</script>
<form action="insertdata.php" method="post" onsubmit="return check()">
<pre>
style id         :<input type="text" id="sid"  name="sid" onkeyup="check()" />
item description :<input type="text" id="itdesc"  name="itdesc" onkeyup="check()" />
material colour  :<input type="text" id="matcol"  name="matcol" onkeyup="check()" />
garment quantity :<input type="text" id="g_qty"  name="g_qty" onkeyup="valid()" />
marker(yard/mtr) :<input type="text" id="marker"  name="marker" onkeyup="check()" />
allowence(2%of marker):<input type="text" id="allowence"  name="allowence" onkeyup="check()" />
total quantity(marker with allownce):<input type="text" id="tot_qty"  name="tot_qty" onkeyup="check()" />
recive qunatity  :<input type="password" id="text"  name="rec_qty" onkeyup="check()" />
balance:<input type="text" id="balance"  name="balance" onkeyup="check()" />
inhouse(% of recive quantity):
etd date(fabric recive date):<input type="text" id="etd_date"  name="etd_date" onkeyup="check()" />
delivery mode:<input type="text" id="del_mode"  name="del_mode" onkeyup="check()" />
<input type="submit"  value="submit" /><br>
</pre>
</form>
<a href="marchentpanel.php">marchent panel</a>
	 <a href="logout.php">log out</a>