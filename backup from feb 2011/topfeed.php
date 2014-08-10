<?php mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());?>


<?php include("functions.php"); ?>

<?php $query = "SELECT * FROM people where (rank > garbage) ORDER BY rand() DESC LIMIT 1"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){

	?><A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>"><?php
	
echo "<span class = \"smalltopic\">" . $row['person'] . " : " . "</span></a>" . 
	"<span class = \"comment\">"  .  ($row['comment']) . "</span>" ;}?>