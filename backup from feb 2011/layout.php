<html>

<?php

$theirName = $_GET['topic'];
$messageNumber = $_GET['message'];
$act = $_GET['act'];
$newMessage = $_GET['newmessage'];
$stat = $_GET['stat'];

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());?>



<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> dirtpage: <?php echo $theirName?> </title>
<link rel="stylesheet" href="http://www.dirtpage.com/styles.css" type="text/css">
<script type="text/javascript" src="http://www.dirtpage.com/jq.js"></script>

<?php include("phpfunctions.php"); ?>


<?php include("google.php"); ?>
   
</head>

<body>

<?php include("header.php"); ?> 




<div id="results">
<?php  
echo "<h3> Recently posted dirt     </h3>  ";
$query = "SELECT * FROM people where (rank > garbage) ORDER BY rand() LIMIT 50"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
echo "<span class=\"m\">-";
$words = explode(" ", $row['comment']);
	foreach ($words as $word) {echo "<span class = \"m\">" .  $word. " ". "</span>" ;}
echo "</span>";
echo "<br>";
}
echo "<br><br>";
?>
</div>




<div id="dirt">
<?php  
echo "<br>";
$query = "SELECT * FROM people where (rank > garbage) ORDER BY rand() LIMIT 12"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
echo "<span class=\"m\">";
$words = explode(" ", $row['comment']);
	foreach ($words as $word) {echo "<span class = \"comment\">" .  $word. " ". "</span>" ;}
echo "</span>";
echo "<br><br>";
}
echo "<h4> -see more- </h4>  ";
?>
</div>






<script type="text/javascript" src="http://www.dirtpage.com/jq.js"></script>
<script type="text/javascript" src="http://www.dirtpage.com/jsfunctions.js"></script>
<script type="text/javascript">



 





</script>


</body>
