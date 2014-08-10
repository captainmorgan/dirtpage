<html>

<head>
<title> dirtPage </title>
<link rel="stylesheet" href="styles.css" type="text/css">




<script type="text/javascript">

function increaseScore(i, topic)
{
	
	document.increasescore.message.value = i;
document.increasescore.topic.value = topic;
 document.increasescore.submit()
	
}


function searchExact(topic)
{
	
	document.searchexact.topic.value = topic;
 document.searchexact.submit()
	
}

</script>






</head>



  

 
<body>

<h3><center>
<?php

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());


mysql_select_db("dirtpage1") or die(mysql_error());
$query = "SELECT * FROM people";
$result = mysql_query($query) or die(mysql_error());
$z = 0;
while($row = mysql_fetch_array($result))
{


$z = $z + $row['rank'];
}

echo $z ;

?>
</center></h3>
<SCRIPT LANGUAGE="JavaScript" SRC="navbarhome.js">
</SCRIPT>
<br><br>

<form name="increasescore" action="increasescore5.php" method="post">
<input type="hidden" name="message" value="fred">
<input type="hidden" name="topic">
</form>


 <form name="searchexact" action="searchexact5.php" method="post">
<input type="hidden" name="topic" value="fred">
</form>


	






</body>

</html>

</html>