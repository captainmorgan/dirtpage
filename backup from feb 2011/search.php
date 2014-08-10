<?php include("phpfunctions.php"); ?>
<?php include("header.php");



$theirName = strtolower($_GET['topic']);
$messageNumber = $_GET['message'];
$act = $_GET['act'];
$newMessage = $_GET['newmessage'];
$stat = $_GET['stat'];

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> dirtpage: <?php echo $theirName?> </title>
<link rel="stylesheet" href="http://www.dirtpage.com/styles.css" type="text/css">

<?php include("google.php"); ?>
   
</head>

 
<Body onLoad="document.form1.topic.focus()">
<body>
<?php  






/*////
//////////////// FEED TABLE MANIPULATION
//////

mysql_query("delete from feed where event = '$theirName'") or die(mysql_error());  
mysql_query("INSERT INTO feed
(type, event) VALUES(\"search\", '$theirName')")
or die(mysql_error());  */

?>



 



<div id="container">
<div id="output">
<span class = "redtitle">results: <?php echo "\"$theirName\""; echo "</span>"; ?>




<span id="topicmatches">

<br><br>


<?php


//THIS IS TO DISPLAY THE EXACT MATCH TOPIC IF THERE IS ONE

$query = "SELECT comment, person, COUNT(comment) FROM people WHERE person like '$theirName' group by person"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){?>
<div class = "dirt">
<A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>"><?php
echo "<span class = \"topic\"><span class = \"expandable\">".  strtolower($row['person']) .   "</span></span></a><span class = \"garbage\">" . " (". $row['COUNT(comment)'] ." items)</span>";
echo  "</div><br>";}


//THIS IS TO SHOW 'NO MESSAGES' IF THERE IS NO EXACT TOPIC MATCH

$num_results = mysql_num_rows($result); 
if ($num_results < 1 ) { ?> <A HREF="http://www.dirtpage.com/page/<?php echo "$theirName"; ?>">	
<?php
echo "<span class = \"topic\">".  strtolower($theirName) .   "</span></a> <span class = \"garbage\">"           . "(no items)</span>";
?><A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $theirName); ?>"><?php             echo "<span class = \"goto\">  start this page! </a></span>";
echo "<br><br>";}
// END OF THAT
//



// THIS IS FOR THE FIRST BATCH'NON-EXACT' TOPIC MATCHES

$query = "SELECT person, comment, COUNT(comment), sum(rank) FROM people WHERE person LIKE '%$theirName%' and person <> '$theirName' GROUP BY person order by sum(rank) desc limit 7"; 
$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){

?><div class = "dirt">
<A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>"><?php
echo "<span class = \"topic\"><span class = \"expandable\">".  strtolower($row['person']) .   "</span></span></a><span class = \"garbage\">" . " (". $row['COUNT(comment)'] ." items)</span>";
 echo  "</div><br>";
}
//END OF THAT
//


//THE FOLLOWING IS THE SEARCH AND RESULTS FOR 'MESSAGE' MATCHES (THAT ARE NOT ALSO TOPIC MATCHES)
?> <div id = "messagematches"> <?php
echo "<br>";
$query = "SELECT * FROM people WHERE (comment like '%$theirName %' or comment like '% $theirName%' or comment like '$theirName')  AND person not like '%$theirName%'
ORDER BY rank DESC limit 7"; 
$result = mysql_query($query) or die(mysql_error());
$num_results2 = mysql_num_rows($result); 
if ($num_results2 > 0 ){echo "<span class = \"gotomessages topic2\"><u>Message Matches</u> </span> <span class = \"hidemessages\"></span><br><br>";
	while($row = mysql_fetch_array($result)){	
	?><A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", trim($row['person'])); ?>"><?php
	echo "<span class = \"smalltopic\"><span class = \"card\">" . strtolower($row['person']) . "</span> : " . "</span></a>" . 
	"<span class = \"comment\">" .  hyper($row['comment']). "</span>";
	echo "<br><br>";} }echo "<br></div>";

//
// THIS IS FOR THE SECOND BATCH OF 'NON-EXACT' TOPIC MATCHES
$query = "SELECT person, comment, COUNT(comment), sum(rank) FROM people WHERE person LIKE '%$theirName%' and person <> '$theirName' GROUP BY person order by sum(rank) desc limit 7, 50"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
?><div class = "dirt">

<A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>"><?php
echo "<span class = \"topic\"><span class = \"expandable\">".  strtolower($row['person']) .   "</span></span></a><span class = \"garbage\">" . " (". $row['COUNT(comment)'] ." total messages)</span>";
 echo  "</div><br>";
}
//END OF THAT
//
?>

</span><span id="messageresults">


<?php
$query = "SELECT * FROM people WHERE (comment like '%$theirName %' or comment like '% $theirName%' or comment like '$theirName') AND person not like '%$theirName%'
ORDER BY rank DESC limit 50"; 
$result = mysql_query($query) or die(mysql_error());
$num_results = mysql_num_rows($result); 


if ($num_results > 0 ){echo "<span  class = \"topic2\" ><br><u>Message Matchess</u></span><br><br>";}
	
while($row = mysql_fetch_array($result)){	
	
?><A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", trim($row['person'])); ?>"><?php
	
echo "<span class = \"comment2\"><span class = \"card\">" .strtolower($row['person']) . "</span> : " . "</span></a>" . 
	"<span class = \"comment\">" .  hyper($row['comment']). "</span>";
	echo "<br><br>";} echo "<br></div></div>"; ?>


</span>

</div>



</div>



</div>
<div id = "boxes">    <div class = "results"></div>   <div class = "results2"></div> </div>
</body>





<script type="text/javascript" src="http://www.dirtpage.com/jq.js"></script>
<script type="text/javascript" src="http://www.dirtpage.com/jsfunctions.js"></script>
<script type="text/javascript">
header();







$("#messageresults").hide();  







$('.hidemessages').click(function(){
	$("#messagematches").slideUp("fast");
}); 


$('.gotomessages').click(function(){
	$("#dirt").hide();
	$("#topicmatches").hide();
$("#messagematches").hide();
	$("#messageresults").slideDown("fast");
	
}); 





 
 


$(".redtitleXXX-tempdisable").click(function(){$("#messageresults").fadeOut("fast");$("#data").fadeIn("slow");
	
if ( $(".extra").is(":visible") ){
$(".extra").slideUp("fast");
$("#messagematches").slideDown("fast");	
$(".options").hide();}

else{
$(".extra").slideDown("slow");
$(".options").show("slow");}
}); 
 
 
 
 
// TEMP DISABLE  setcards();
 
 
// TEMPOARILY DISABLE setexpand();
 


	
	
	
	
</script>





