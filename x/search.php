<?php
include('init.php'); 
include("header.php");



$topic_searched = strtolower($_GET['topic']);

?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title> dirtpage: <?php echo $topic_searched?> </title>

<?php include("google.php"); ?>
   
</head>

 
<Body onLoad="document.form1.topic.focus()">

<body>


<div id="container">
<div id="output">
<span class = "redtitle">results: <?php echo "\"$topic_searched\""; echo "</span>"; ?>





<br><br>


<?php


//THIS IS TO DISPLAY THE EXACT MATCH TOPIC IF THERE IS ONE

$query = "SELECT topic FROM topics WHERE topic like '$topic_searched'"; 
$result = mysql_query($query) or die(mysql_error());
$num_results = mysql_num_rows($result); 
if ($num_results > 0) {?><div class = "dirt"><A HREF="page/?topic=<?php echo str_replace(" ", "+", $topic_searched); ?>"><?php
echo "<span class = \"topic\"><span class = \"expandable\">".  strtolower($topic_searched) .   "</span></span></a>";

$query = "SELECT message FROM messages WHERE topic like '$topic_searched'"; 
$result = mysql_query($query) or die(mysql_error());
$num_results2 = mysql_num_rows($result); 

?>
<A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>"><?php
echo "<span class = \"topic\"><span class = \"expandable\">".  strtolower($row['topic']) .   "</span></span></a><span class = \"garbage\">" . " (". $num_results2." items)</span>";
 echo  "</div><br>";


}



//THIS IS TO SHOW 'NO MESSAGES' IF THERE IS NO EXACT TOPIC MATCH


if ($num_results < 1 ) { ?> 


<?php
echo "<span class = \"garbage\">There is no '".  strtolower($topic_searched) . "' topic.</span>";
?> 

<a href = "page.php?topic=<?php echo "$topic_searched"?>">  - start this page! </a>


<?php

echo "<br><br>";}



// END OF THAT
//










// THIS IS FOR THE FIRST BATCH'NON-EXACT' TOPIC MATCHES

$query = "SELECT * FROM topics WHERE topic LIKE '%$topic_searched%' and topic <> '$topic_searched' order by score desc limit 7"; 
$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){

?><div class = "dirt">



<A HREF="page.php?topic=<?php echo str_replace(" ", "+", $row['topic']); ?>"><?php
echo "<span class = \"topic\"><span class = \"expandable\">".  strtolower($row['topic']) .   "</span></span></a><span class = \"garbage\">" . " (". $row['COUNT(message)'] ." items)</span>";
 echo  "</div><br>";
}
//END OF THAT
//


//THE FOLLOWING IS THE SEARCH AND RESULTS FOR 'MESSAGE' MATCHES (THAT ARE NOT ALSO TOPIC MATCHES)
?> <div id = "messagematches"> <?php
echo "<br>";
$query = "SELECT * FROM messages WHERE (message like '%$topic_searched %' or message like '% $topic_searched%' or message like '$topic_searched')  AND topic not like '%$topic_searched%'
ORDER BY score DESC limit 7"; 
$result = mysql_query($query) or die(mysql_error());
$num_results2 = mysql_num_rows($result); 
if ($num_results2 > 0 ){echo "<span class = \"gotomessages topic2\"><u>Message Matches</u> </span> <span class = \"hidemessages\"></span><br><br>";
	while($row = mysql_fetch_array($result)){	
	?><A HREF="page/?topic=<?php echo str_replace(" ", "+", $row['topic']); ?>"><?php
	echo "<span class = \"smalltopic\"><span class = \"card\">" . strtolower($row['topic']) . "</span> : " . "</span></a>" . 
	"<span class = \"message\">" .  hyper($row['message']). "</span>";
	echo "<br><br>";} }echo "<br></div>";

//
// THIS IS FOR THE SECOND BATCH OF 'NON-EXACT' TOPIC MATCHES
$query = "SELECT * FROM topics WHERE topic LIKE '%$topic_searched%' and topic <> '$topic_searched' order by score desc limit 7, 50"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
?><div class = "dirt">

<A HREF="page/?topic=<?php echo str_replace(" ", "+", $row['topic']); ?>"><?php
echo "<span class = \"topic\"><span class = \"expandable\">".  strtolower($row['topic']) .   "</span></span></a><span class = \"garbage\">" . " (". $row['COUNT(message)'] ." total messages)</span>";
 echo  "</div><br>";
}
//END OF THAT
//
?>

</span><span id="messageresults">


<?php
$query = "SELECT * FROM messages WHERE (message like '%$topic_searched %' or message like '% $topic_searched%' or message like '$topic_searched') AND topic not like '%$topic_searched%'
ORDER BY score DESC limit 50"; 
$result = mysql_query($query) or die(mysql_error());
$num_results = mysql_num_rows($result); 


if ($num_results > 0 ){echo "<span  class = \"topic2\" ><br><u>Message Matchess</u></span><br><br>";}
	
while($row = mysql_fetch_array($result)){	
	
?><A HREF="page/?topic=<?php echo str_replace(" ", "+", $row['topic']); ?>"><?php
	
echo "<span class = \"comment2\"><span class = \"card\">" .strtolower($row['topic']) . "</span> : " . "</span></a>" . 
	"<span class = \"comment\">" .  hyper($row['message']). "</span>";
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





