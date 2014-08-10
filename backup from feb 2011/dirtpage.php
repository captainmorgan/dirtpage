<html>
<head>
<title> dirtPage</title>
</head>
<body>

<?php



$theirName = $_POST['theirName'];
$method = $_POST['method'];
$comment = $_POST['comment'];


;
echo "<h2> <center> $theirName </center> </h2>";

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());


mysql_select_db("dirtpage1") or die(mysql_error());






if ($method == 2) {
mysql_query("INSERT INTO people
(person, comment) VALUES('$theirName', '$comment') ") 
or die(mysql_error());  }



echo "<br />";
echo "<br />";
$query = "SELECT * FROM people
WHERE person='$theirName'"; 
	 
$result = mysql_query($query) or die(mysql_error());


while($row = mysql_fetch_array($result)){
	echo " - ". $row['comment'];
	echo "<br />";
echo "<br />";
}



?>



</body>
</html>



