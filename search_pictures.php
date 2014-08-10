<?php
include('resources/init.php');
 mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());

$topic_searched = strtolower($_GET['topic_searched']);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="http://www.dirtpage.com/resources/styles.css" type="text/css">


</head>

<body>


	

<div id = "everything">


<?php include("header.php"); ?>

<br><br>

<span id = "holder">







 






<br /><span class = "redtitle">Picture results: <?php echo "\"$topic_searched\""; echo "</span><br><br>"; ?>






<?php



$query = "SELECT * FROM captions WHERE (caption like '%$topic_searched %' or caption like '% $topic_searched%' or caption like '$topic_searched')  AND picture not like '%$topic_searched%'
ORDER BY score DESC limit 50"; 
$result = mysql_query($query) or die(mysql_error());
$num_results2 = mysql_num_rows($result); 

	while($row = mysql_fetch_array($result)){	
	
$p = $row['picture'];
$query4 = "SELECT * FROM pictures WHERE picture like '$p'"; 
$result4 = mysql_query($query4) or die(mysql_error());	
while($row4 = mysql_fetch_array($result4)){$topic = $row4['topic'];}

    echo "<A HREF=\"http://www.dirtpage.com/page.php?topic=". str_replace(" ", "+", $topic). "\"><span class=\"smallyellow\">". $topic . "</span></a><br>";
    
echo "<a href = \"http://www.dirtpage.com/page.php?topic=". $topic . "&mode=picture&picture=". $row['picture'] . "\"><img src=\"pictures/".  $row['picture'] . "\" height=\"150\" border=\"black\"></a>";
?>
    <br><?php
	echo "<span class = \"tinysilver\">" . strtolower($row['caption']) . "</span>" .  
	"<span class = \"message\">" .  hyper($row['message']). "</span>";
	echo "<br><br>";} echo "<br></div>";

?>





<span id = "right">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/divfillers/right.php';  ?>
</span>
 
 

</div>
</body>
</html>