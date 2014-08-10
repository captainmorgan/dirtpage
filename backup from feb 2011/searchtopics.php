<html>

<head>
<title> dirtPage </title>


<link rel="stylesheet" href="styles.css" type="text/css">



 

</head>



<body onLoad="document.form1.comment.focus()">






<body>

<SCRIPT LANGUAGE="JavaScript" SRC="navbar.js">
</SCRIPT>






<?php



$theirName = $_POST['theirName'];
$method = $_POST['method'];
$comment = $_POST['comment'];

if($theirName ==""){}

else{

echo 


"<br>  <i> <h3> Search results for topics that contain \"$theirName\"    </i>   </h3>  ";



mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());


mysql_select_db("dirtpage1") or die(mysql_error());






$query = "SELECT * FROM people
WHERE person LIKE '%$theirName%'
ORDER BY id DESC"; 
	 
$result = mysql_query($query) or die(mysql_error());

 


while($row = mysql_fetch_array($result)){
	
	
	
	
echo "<span class = \"topic\">" .$row['person'] . "</span>" . 
	"<span class = \"comment\">"     .   " : "   . 
	$row['comment']. "</span>";
	
	
	echo "<br />";
echo "<br />";
}
}


?>



</body>

</html>

