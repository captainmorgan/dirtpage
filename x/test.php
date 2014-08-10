<?php
include("header.php"); 
include("phpfunctions.php"); 

// for each person in people, create a new message for them

















$query = "SELECT * FROM topics ORDER BY score desc"; 
$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){	

echo $row['topic'] . ":". $row['score'];
echo "<br><br>";
 }
 
	
	