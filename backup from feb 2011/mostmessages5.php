<html>

<head>
<title> dirtPage </title>
<link rel="stylesheet" href="styles.css" type="text/css">
</head>

 

 
<script type="text/javascript">

   

function searchExact(topic)
{
	
	document.searchexact.topic.value = topic;
 document.searchexact.submit()
	
}

</script>


 
<body>
<SCRIPT LANGUAGE="JavaScript" SRC="navbar.js">
</SCRIPT>



 <form name="searchexact" action="searchexact7.php" method="post">
<input type="hidden" name="topic" value="fred">
</form>


<h3>Topics with most messages</h3>



<?php


mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());


$query = "SELECT person, COUNT(comment) FROM people where (rank > garbage) GROUP BY person asc order by COUNT(comment) desc limit 50"; 
$result = mysql_query($query) or die(mysql_error());

 
echo "<ol class = \"comment\" >";

while($row = mysql_fetch_array($result)){
	
	
	
	?>    
 <A HREF="javascript:void(0)" onClick= 'searchExact("<?php echo $row['person']; ?>")'> 
	
	<?php
	
echo "<li><span class = \"topic\">".  $row['person'] .   "</span></a> <span class = \"comment\">"           . "(". $row['COUNT(comment)'] ." messages)</span></li>";
	
     
  
	 
echo "<br />";


}
	echo "</ol>";
?>
</body>
