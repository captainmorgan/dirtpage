<?php header("Cache-Control: no-cache, must-revalidate"); session_start(); ?>
 
<head>

<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
</head>


<?php
mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());


$m = $_GET['m'];

$topic = $_GET['topic'];
$mode = $_GET['mode'];
$message = $_GET['message'];
$picture = $_GET['picture'];

$update = mysql_query("UPDATE topics SET num_views = num_views +1  WHERE topic = '$topic'") or die(mysql_error()); 
 



if (isset($_GET['topic']) and $topic!=''){

mysql_query("delete from viewed where topic = '$topic'") or die(mysql_error());  
mysql_query("INSERT INTO viewed
(topic) VALUES('$topic')")
or die(mysql_error());  
}
 

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
<link rel="stylesheet" href="http://www.dirtpage.com/resources/styles.css" type="text/css">
<?php include("resources/google.php"); ?>
</head>
<?php


?>

       


	     
	

<body>

<div id = "everything">

<div id = "header">
<?php include("header.php"); ?>
</div>
 

 

<div id= "holder">



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

// tags
if (($_GET['mode']) == 'tags' )
{include_once("divfillers/tags.php"); }


?>
 
</div>


<div id ="right">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/divfillers/right.php';  ?>
</div>




<div id ="footer"> 
</div>



 
</div>






</body> 





<script type="text/javascript" src="http://www.dirtpage.com/resources/jq.js"></script>


<script type="text/javascript" src="http://www.dirtpage.com/resources/jsfunctions.js"></script>



<script type="text/javascript">


$.ajaxSetup({ cache: false });




////// KEEP LOADING FEED-DIV EVERY TEN SECONDS
 
 setInterval( "refresh1();", 10000 );  ///////// 10 seconds
 $(function() {
refresh1 = function(){
 $.get("http://www.dirtpage.com/divfillers/right.php",   function(data) {
$('#right').html(data);  });

   


 }
 });
 
 </script>