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



 <form name="searchexact" action="searchexact5.php" method="post">
<input type="hidden" name="topic" value="fred">
</form>


<h3>TOPICS with most messages</h3>

<A HREF="javascript:void(0)" onClick= 'searchTopics("<?php echo $theirName; ?>")' <h4> switch to most-votes view </h4> </A>  


<?php


mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());


$query = "SELECT person, COUNT(comment) FROM people GROUP BY person asc order by COUNT(comment) desc limit 100"; 
$result = mysql_query($query) or die(mysql_error());

 


while($row = mysql_fetch_array($result)){
	
	
	
	?>    
 <A HREF="javascript:void(0)" onClick= 'searchExact("<?php echo $row['person']; ?>")'> 
	
	<?php
	
echo "<span class = \"topic\">".  $row['person'] .   "</span><span class = \"comment\">"           . " (". $row['COUNT(comment)'] ." messages)</span>";
	
     
  
	 
	echo "<br />";
echo "<br />";
	}


?>
</body>
