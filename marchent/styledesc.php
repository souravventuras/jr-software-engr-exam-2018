<?php
?>
<form action="style_describ_db.php" method="post">
<pre>
                   <h1> STYLE DESCRIPTION </h1>
					
style no           :<input type="text" id="stn"  name="styleid" onkeyup="check()"/><br>
style description  :<input type="text" id="sds"  name="stldesc" onkeyup="check()"/><br>
colour             :<input type="text" id="col"  name="color" onkeyup="check()"/><br>
destination        :<input type="text" id="dest"  name="destination" onkeyup="check()"/><br>
size               :<input type="text" id="size"  name="size" onkeyup="check()"/><br>
wash description   :<input type="text" id="washdesc"  name="wash_desc" onkeyup="check()" /><br>
total quantity     :<input type="text" id="t_qty"  name="tot_qty" onkeyup="check()" /><br>
first delivery date:<input type="text" id="fdd"  name="f_del_date" onkeyup="check()" /><br>
trims in house date:<input type="text" id="tid"  name="in_house_date" onkeyup="check()" /><br>
<input type="submit"  value="submit" /><br>
</pre>
</form>
<a href="marchentpanel.php">marchent panel</a>
	 <a href="logout.php">log out</a>