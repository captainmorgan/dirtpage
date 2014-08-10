<html>

<head>
<title> dirtPage </title>


<link rel="stylesheet" href="styles.css" type="text/css">

<script type="text/javascript">

function searchExact(topic)
{
	
	document.searchexact.topic.value = topic;
 document.searchexact.submit()
	
}

function searchTopics(topic)
{
	
	document.searchtopics.topic.value = topic;
 document.searchtopics.submit()
	
}


function increaseScore(i, topic)
{
	
	document.increasescore.message.value = i;
document.increasescore.topic.value = topic;
 document.increasescore.submit()
	
}



</script> 



</head>


<Body onLoad="document.post.message.focus()">

 
  



<body>

<SCRIPT LANGUAGE="JavaScript" SRC="navbar.js">
</SCRIPT>



 <form name="searchexact" action="searchexact7.php" method="post">
<input type="hidden" name="topic" value="fred">
</form>

 <form name="searchtopics" action="searchtopics5.php" method="post">
<input type="hidden" name="topic" value="fred">
</form>

<form name="increasescore" action="increasescore5.php" method="post">
<input type="hidden" name="message" value="fred">
<input type="hidden" name="topic">
</form>

<h2>Results for 


<?php



$theirName = $_POST['topic'];
echo 


"\"$theirName\"         "; echo "<br></h2>";




mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());


mysql_select_db("dirtpage1") or die(mysql_error());






$query = "SELECT person, COUNT(comment) FROM people WHERE person = '$theirName' GROUP BY person asc order by COUNT(comment) desc limit 100"; 




$result = mysql_query($query) or die(mysql_error());

 while($row = mysql_fetch_array($result)){
	
	 ?>    
 <A HREF="javascript:void(0)" onClick= 'searchExact("<?php echo $row['person']; ?>")'> 
	
	<?php
	
echo "<span class = \"topic\">".  $row['person'] .   "</span></a> <span class = \"comment\">"           . "(". $row['COUNT(comment)'] ." messages)</span>";
	
	
	
	
echo "<br />";
echo "<br />";


}

$num_results = mysql_num_rows($result); 
	
	if ($num_results < 1 and $num_results2 < 1 ) { ?>    
 <A HREF="javascript:void(0)" onClick= 'searchExact("<?php echo $theirName; ?>")'> 
	
	<?php
	
echo "<span class = \"topic\">".  $theirName .   "</span></a> <span class = \"comment\">"           . "(no messages)</span><br><br>";}
 



$query = "SELECT person, COUNT(comment), sum(rank) FROM people WHERE person LIKE '%$theirName%' and person <> '$theirName' GROUP BY person asc order by sum(rank) desc"; 
$result = mysql_query($query) or die(mysql_error());

$num_results = mysql_num_rows($result); 


	$query2 = "SELECT * FROM people
WHERE comment like '%$theirName%'or person like '%theirName%'
ORDER BY rank DESC"; 
	 
$result2 = mysql_query($query2) or die(mysql_error());
$num_results2 = mysql_num_rows($result2); 

if ($num_results < 1 and $num_results2 < 1 ) {?> 





<?php } 


	


while($row = mysql_fetch_array($result)){
	
	

	
?>    
 <A HREF="javascript:void(0)" onClick= 'searchExact("<?php echo $row['person']; ?>")'> 
	
	<?php
	
echo "<span class = \"topic\">".  $row['person'] .   "</span></a> <span class = \"comment\">"           . "(". $row['COUNT(comment)'] ." messages)</span>";
	
echo "<br />";
echo "<br />";
}
 




	$query = "SELECT * FROM people
WHERE comment like '%$theirName%'or person like '%theirName%'
ORDER BY rank DESC"; 
	 
$result = mysql_query($query) or die(mysql_error());

	
echo "<hr><br>";
 

while($row = mysql_fetch_array($result)){
if  ( $row['rank'] > $row['garbage'] ) {	
	?>    
 <A HREF="javascript:void(0)" onClick= 'searchExact("<?php echo $row['person']; ?>" , "<?php echo $theirName; ?>")'> 
	
	<?php
	
echo "<span class = \"topic2\">" .$row['person'] . " : " . "</span></a>" . 
	"<span class = \"comment2\">"     .  
	$row['comment'] . "</span>"     .    "<span class = \"topic\">";
	echo "<br /><br>";

	}}

?>
</body>
