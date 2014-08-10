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
<?php include("phpfunctions.php"); ?>
<?php include("google.php"); ?>
   
</head>

 
<Body onLoad="document.form1.topic.focus()">
<body>
<?php include("header.php"); 






/*////
//////////////// FEED TABLE MANIPULATION
//////

mysql_query("delete from feed where event = '$theirName'") or die(mysql_error());  
mysql_query("INSERT INTO feed
(type, event) VALUES(\"search\", '$theirName')")
or die(mysql_error());  */

?>








<div id="searchresults">


<h2>Results for <?php echo "\"$theirName\""; echo "<br></h2>";










//THE FOLLOWING IS THE SEARCH AND RESULTS FOR 'MESSAGE' MATCHES (THAT ARE NOT ALSO TOPIC MATCHES)

?> <div id="messagematches"> <?php

$query = "SELECT * FROM people WHERE comment like '%$theirName%'AND person not like '%$theirName%'
ORDER BY rank DESC limit 75"; 
$result = mysql_query($query) or die(mysql_error());
$num_results = mysql_num_rows($result); 


if ($num_results > 0 ){
	
	echo "<span class = \"topic2\"><u>Message Matches</u></span>";}
	
?><A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $theirName); ?>"><?php   
if ($num_results > 0 ){echo "<span class = \"messageresults\"> (see all) </a></span>";
echo "<br><br>";}


while($row = mysql_fetch_array($result)){	
	
?><A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", trim($row['person'])); ?>"><?php
	
echo "<span class = \"comment2\">" .ucwords($row['person']) . " : " . "</span></a>" . 
	"<span class = \"comment\">" .  hyper($row['comment']). "</span>";
	echo "<br><br>";} echo "</div><br>";





?>







 </div>









<script type="text/javascript" src="http://www.dirtpage.com/jq.js"></script>
<script type="text/javascript" src="http://www.dirtpage.com/jsfunctions.js"></script>

<script type="text/javascript">
header();


$(".options").hide(); 
 

$(".extra").hide(); 
$("#results3b").hide(); 

$('.see').click(function(){
	$(".extra").hide("fast");
		$(".firsttoggle").hide("fast");
	$(this).parent().nextAll(".extra:first").slideToggle("fast");
}); 



$('.see1').click(function(){
	$(".firsttoggle").slideToggle("fast");
}); 




$('.topic').mouseenter(function(){

	

$(this).parent().nextAll(".extra:first").slideToggle("fast");
	
	
	$(this).parent().nextAll(".options").toggle();
	
}); 



 
 
 

$(document).click(function(){


if ( $(".extra").is(":visible") ){


$(".extra").hide("fast");
	
$(".options").hide();}

else{


$(".extra").show("fast");
	
$(".options").show();}

	
}); 
 
 
 
 





	
	
</script>












</body>
