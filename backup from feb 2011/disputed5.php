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
<SCRIPT LANGUAGE="JavaScript" SRC="navbar.js">
</SCRIPT>


<form name="increasescore" action="increasescore5.php" method="post">
<input type="hidden" name="message" value="fred">
<input type="hidden" name="topic">
</form>


 <form name="searchexact" action="searchexact7.php" method="post">
<input type="hidden" name="topic" value="fred">
</form>

<?php



mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());
echo "<h3> Top rated garbage   </h3>  ";
$query = "SELECT * FROM people where (rank <= garbage) ORDER BY rank DESC LIMIT 25"; 
$result = mysql_query($query) or die(mysql_error());



echo "<ol class = \"comment\" >";

while($row = mysql_fetch_array($result)){
	 
	
	

	?>   
 <A HREF="javascript:void(0)" onClick='searchExact("<?php echo $row['person']; ?> ")'> 
	
	<?php
	
if  ( $row['rank'] > $row['garbage'] ) {
	
echo "<li><span class = \"topic\">" .$row['person'] . " : " . "</span></a>" . 
	"<span class = \"comment\">"     .  
	$row['comment']. "</span></li>" ;}
	
else {?>   
 <A HREF="javascript:void(0)" onClick='searchExact("<?php echo $row['person']; ?> ")'> 
	
	<?php
	
echo "<li><span class = \"garbage\">" .$row['person'] . " : " . "</span></a>" . 
	"<span class = \"garbage\">"     .  
	$row['comment']. "</span>"  .  "<span class = \"garbagescore\">"   . " (". (21 + date("Y-m-d") - $row['garbagedate']) . " days)" . "</span></li>";}


	
echo "<br>";	

}

echo "</ol >";




	 

?>
	






</body>

</html>

