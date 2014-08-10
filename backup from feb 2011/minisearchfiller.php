<head>
<link rel="stylesheet" href="http://www.dirtpage.com/styles.css" type="text/css">
</head>

<?php

$theirName = $_GET['topic'];
$change = $_GET['change'];
$messageNumber = $_GET['messagenumber'];

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());
include("functions.php"); 



?>  <A HREF="http://www.dirtpage.com/results/<?php echo $theirName ?>"><?php echo "<span class=\"message\">other results for \"" . strtolower($theirName) . "\"</span></a><br><br>";

//	   
//MAIN QUERY
//

$query = "SELECT person, comment, COUNT(comment), sum(rank) FROM people WHERE person LIKE '%$theirName%' and person <> '$theirName' GROUP BY person order by sum(rank) desc limit 50"; 
$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){

?><div class = "dirt">
<A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>"><?php
echo "<span class = \"smalltopic\"><span class = \"card\">".  strtolower($row['person']) .   "</span></span></a>";
 echo  "</div><br>";}

 $num = 50 - mysql_num_rows($result); 

 


$query = "SELECT person, comment, COUNT(comment), sum(rank) FROM people WHERE (comment like '%$theirName %' or comment like '% $theirName%' or comment like '$theirName') and person <> '$theirName' GROUP BY person order by sum(rank) desc limit $num"; 
$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){

?><div class = "dirt">
<A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>"><?php
echo "<span class = \"smalltopic\"><span class = \"card\">".  strtolower($row['person']) /*.   "</span></span></a><span class = \"garbage\">" . " (". $row['COUNT(comment)'] ." total messages)</span>"*/;
 echo  "</div><br>";}
 
 
 
 
 
?>





<script type="text/javascript">




</script>