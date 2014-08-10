
<?php
include_once('../phpfunctions.php');
$picture = $_GET['picture'];
  mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());

  
echo "<span class=\"pinktitle\">dirtpage : <A HREF=\"page.php?topic=" . str_replace(" ", "+", $topic) . "\"><span class=\"pinktitle\">" . strtolower($topic) . "</span></a> : <A HREF=\"page.php?topic=" . str_replace(" ", "+", $topic) . "&mode=picture\"><span class=\"pinktitle\"> pictures : </span></a>". $picture. "</span><br><br>"; 




$query = "SELECT * FROM pictures WHERE picture = '$picture' ORDER BY score ASC"; 
$result = mysql_query($query) or die(mysql_error()); 
while($row = mysql_fetch_array($result)){

echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"../../x/pictures/" . $row['picture'] . "\" height=\"500\">";  } 
  



  
?>