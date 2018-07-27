<?php
$host='localhost';
$user='root';
$pass='';
$db='mydb';

$con=mysqli_connect($host,$user,$pass,$db);
if($con)
//echo 'connected successfully to mydb database';
//$sql="insert into developers(email)values('Nasrin',123456,'ridika@diu.com')";
if(isset($_POST["search"])){
$pr_lang = mysqli_real_escape_string($con,$_POST['pr_lang']);
$lang = mysqli_real_escape_string($con,$_POST['lang']);
if($pr_lang && !$lang){
	$query = "select * from dev_proglanguage dp join dev_language dl on dp.dev_id=dl.dev_id join developers d on dl.dev_id=d.id where proglang_id='$pr_lang'";
	$result = mysqli_query($con,$query);
}else if($pr_lang && $lang){
$query = "select * from dev_proglanguage dp join dev_language dl on dp.dev_id=dl.dev_id join developers d on dl.dev_id=d.id where proglang_id='$pr_lang' and language_id='$lang'";
	$result = mysqli_query($con,$query);
}
}
 ?>
 <html>
 <head>
 <title>Task A</title>
 </head>
 <body>
 <br/>
 <form method="POST" action="">
 programming language:
 <input type="text" placeholder="eg: php, ruby etc..." name="pr_lang" 
 value="<?php echo isset($pr_lang)? $pr_lang:'';?>"/><br/>
 language:
 <input type="text" placeholder="eg: en, ja, bn etc..." name="lang"
 value="<?php echo isset($lang)? $lang:'';?>"/><br/>
 <input type="submit" placeholder="eg: php, ruby etc..." name="search" value="Search"/>
 </form><hr/>
 <div>
 <table>
 <tr>
 <td style="width:20%">Email</td>
 <td style="width:20%">Programming language</td>
 <td style="width:20%">Language</td>
 </tr>
 <?php
 if(isset($result)){
//echo "<tr>";
while($row = mysqli_fetch_assoc($result)){
echo "<tr>";
echo "<td style='width:20%'>".$row['email']."</td>";
echo "<td style='width:20%'>".$row['proglang_id']."</td>";
echo "<td style='width:20%'>".$row['language_id']."</td>";
echo "</tr>";
}

//echo "</tr>";
 }
 ?>
 </table>
 </div>
 </body>
 </html>