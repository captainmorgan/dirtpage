<?php session_start();
include("header.php"); 


$m = $_GET['m'];

$topic = $_GET['topic'];
$mode = $_GET['mode'];
$message = $_GET['message'];
$picture = $_GET['picture'];

$update = mysql_query("UPDATE topics SET num_views = num_views +1  WHERE topic = '$topic'") or die(mysql_error()); 





if (isset($_GET['topic'])){
	
	
	
$query = "SELECT topic FROM topics WHERE topic like '$topic'"; 
$result = mysql_query($query) or die(mysql_error());
$num_results = mysql_num_rows($result); 
if ($num_results < 1) {
	
mysql_query("INSERT INTO topics (topic, user, ip, origin) VALUES('$topic', '$user', '$ip', curdate()) ") 
or die(mysql_error());  }
}




?>




<html>
<head>


<title> dirtpage: <?php echo $topic?> </title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="http://www.dirtpage.com/x/styles.css" type="text/css">
<?php include("google.php"); ?>
</head>
<?php


?>

 


	     
	

<body>


<div id = "holder"  style="margin-left: auto; margin-right: auto;">



<?php

// EVERYTHING
if (!isset($_GET['mode']))
{ include_once("divfillers/items.php"); }


// RESPONSES
if (($_GET['mode']) == 'message' && isset($_GET['message']))
{include_once("divfillers/message.php"); }

// CAPTIONS
if (($_GET['mode']) == 'picture' && isset($_GET['picture']))
{include_once("divfillers/picture.php"); }

?>

</div>




</body> 