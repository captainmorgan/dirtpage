<link rel="stylesheet" href="http://www.dirtpage.com/resources/styles.css" type="text/css">






<link rel="stylesheet" href="http://www.dirtpage.com/resources/styles.css" type="text/css">
<span class="tinywhite">being posted on:</span><br><br>
<?php


$query = "SELECT * FROM postedon ORDER BY id DESC limit 200";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
	echo "<A HREF=\"http://www.dirtpage.com/page.php?topic=" . str_replace(" ", "+", $row['topic']) . "\"><span class=\"tinysilver\">".strtolower($row['topic'])."</span></a>";
	echo "<br>";
	}


 
 

?> 



<br /> 


<span class="tinywhite">being viewed:</span><br><br>
<?php






$query = "SELECT * FROM viewed ORDER BY id DESC limit 50";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
	echo "<A HREF=\"http://www.dirtpage.com/page.php?topic=" . str_replace(" ", "+", $row['topic']) . "\"><span class=\"tinysilver\">".strtolower($row['topic'])."</span></a>";
	echo "<br>";
	}





?>  