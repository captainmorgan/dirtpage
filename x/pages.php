<?php include_once("phpfunctions.php"); ?>
<?php include("header.php"); 
$m = $_GET['m']
?>

<html>
<head>
<title> dirtpage: <?php echo $theirName?> </title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="http://www.dirtpage.com/styles.css" type="text/css">
<?php include("google.php"); ?>
</head>
<?php

$theirName = $_GET['topic'];
$act = $_GET['act'];
$newMessage = $_GET['newmessage'];
$messageNumber = $_GET['message'];


  
 

mysql_query("delete from feed where event = '$theirName'") or die(mysql_error());  
mysql_query("INSERT INTO feed
(type, event) VALUES(\"view\", '$theirName')")
or die(mysql_error());  

?>
	   
	

<body> 


<div id = "boxes">    <div class = "results"></div>   <div class = "results2"></div> </div>

<div id = "container">
<div id = "output"></div></div>

 
<script type="text/javascript" src="http://www.dirtpage.com/jsfunctions.js"></script>
<script type="text/javascript">
//header();

/////// LOAD DIV INITIALLY

<?php if ($m == 'p'){?>  
$.get("http://www.dirtpage.com/captiondivfiller.php", {topic: <?php echo "\"$theirName\"" ?>}, function(data) {
$('#output').html(data);  });
   <?PHP }


else {?>
$.get("http://www.dirtpage.com/divfiller.php", {topic: <?php echo "\"$theirName\"" ?>}, function(data) {
$('#output').html(data);  });
<?PHP }?>

//TEMPORARILY TURNING OFF SIDE BOXES  ****  setcards();

   

</script>
</body> 