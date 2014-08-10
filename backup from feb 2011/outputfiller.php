<head>
<link rel="stylesheet" href="http://www.dirtpage.com/styles.css" type="text/css">
</head>

<?php
include("functions.php");

$theirName = $_GET['topic'];
$change = $_GET['change'];
$messageNumber = $_GET['messagenumber'];
mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());

$type = $_GET['type'];










switch ($type) {

 case "page":
 ?>
 

<?php echo "<A HREF=\"http://www.dirtpage.com/results/" . str_replace(" ", "+", $theirName) . "\"><span class=\"pinktitle\">the \"" . strtolower($theirName) . "\" page </span></a>";?> <br>
<?php echo "<A HREF=\"http://www.dirtpage.com/results/" . str_replace(" ", "+", $theirName) . "\">search</a>";?>

 <div id="data">
 
 
 <form name="post"id="test" onSubmit="return false;"><br />
</h1><span id="post">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="newmessage" size="28" value="" maxlength="125" autocomplete="off"></span>
<input type="hidden" name="topic" value= <?php echo "\"$theirName\"" ?>>
<input type="hidden" name="act" value="postmessage">
<input id="button" type="submit" value="post new message">
   </form> <?php


$query = "SELECT * FROM people WHERE person = '$theirName' ORDER BY rank DESC"; 
$result = mysql_query($query) or die(mysql_error()); 
echo"<ol>"; while($row = mysql_fetch_array($result)){
echo  "<span class = \"message\"><li>" . hyper($row['comment']) . "</span>"   .  "<span class = \"t\">".  " (" . $row['rank']. ")</span>"; 
if( $odd = $row['rank']%2 ) {$pic1 = "http://www.dirtpage.com/thumb.jpg"; $class1 = "up"; $pic2 = "http://www.dirtpage.com/thumbdown.jpg"; $class2 = "down";}
else {$pic2 = "http://www.dirtpage.com/thumb.jpg"; $class2 = "up"; $pic1 = "http://www.dirtpage.com/thumbdown.jpg"; $class1 = "down";   }?>
<a href="javascript:void(0)"> <img class = <?php echo $class1 ?> name ="<?php echo $row['id']; ?>"  src="<?php echo $pic1 ?>" border = "0"/> </a>
<a href="javascript:void(0)"> <img class = <?php echo $class2 ?> name ="<?php echo $row['id']; ?>" src="<?php echo $pic2 ?>"  border = "0"/> </a> 
 <br><br>
 <?php } echo "</ol>"?>

 
 
 
 </div> 
<br>


 <?php
 break;  
 

 
 
 
 
 
 
 
 
 
 
 case "search":


?> <span class = "redtitle"> search results for <?php echo "\"$theirName\""; echo "</span>"; ?>





<div id="data">

<?php
//THIS IS TO DISPLAY THE EXACT MATCH TOPIC IF THERE IS ONE
$query = "SELECT comment, person, COUNT(comment) FROM people WHERE person like '$theirName' group by person"; 
$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){
?>

<div class = "dirt">
<A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>"><?php
echo "<span class = \"topic\"><span class = \"expandable\">".  strtolower($row['person']) .   "</span></span></a><span class = \"garbage\">" . " (". $row['COUNT(comment)'] ." total messages)</span>";



echo  "</div><br>";
}


//THIS IS TO SHOW 'NO MESSAGES' IF THERE IS NO EXACT TOPIC MATCH
$num_results = mysql_num_rows($result); 
if ($num_results < 1 ) { ?> <A HREF="http://www.dirtpage.com/page/<?php echo "$theirName"; ?>">	
<?php
echo "<span class = \"topic\">".  strtolower($theirName) .   "</span></a> <span class = \"garbage\">"           . "(no messages)</span>";
?><A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $theirName); ?>"><?php             echo "<span class = \"goto\">  create this page! </a></span>";
echo "<br><br>";}
// END OF THAT
//


//
// THIS IS FOR THE FIRST BATCH'NON-EXACT' TOPIC MATCHES

$query = "SELECT person, comment, COUNT(comment), sum(rank) FROM people WHERE person LIKE '%$theirName%' and person <> '$theirName' GROUP BY person order by sum(rank) desc limit 7"; 
$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){

?><div class = "dirt">
<A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>"><?php
echo "<span class = \"topic\"><span class = \"expandable\">".  strtolower($row['person']) .   "</span></span></a><span class = \"garbage\">" . " (". $row['COUNT(comment)'] ." total messages)</span>";
 echo  "</div><br>";
}
//END OF THAT
//










//THE FOLLOWING IS THE SEARCH AND RESULTS FOR 'MESSAGE' MATCHES (THAT ARE NOT ALSO TOPIC MATCHES)
?> <div id = "messagematches"> <?php
echo "<br>";
$query = "SELECT * FROM people WHERE comment like '%$theirName%'AND person not like '%$theirName%'
ORDER BY rank DESC limit 7"; 
$result = mysql_query($query) or die(mysql_error());
$num_results = mysql_num_rows($result); 
if ($num_results > 0 ){echo "<span class = \"gotomessages topic2\"><u>Message Matches</u> </span> <span class = \"hidemessages\">(hide)</span><br><br>";}
	while($row = mysql_fetch_array($result)){	
	?><A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", trim($row['person'])); ?>"><?php
	echo "<span class = \"smalltopic\"><span class = \"card\">" . strtolower($row['person']) . "</span> : " . "</span></a>" . 
	"<span class = \"comment\">" .  hyper($row['comment']). "</span>";
	echo "<br><br>";} echo "<br></div>";


//
// THIS IS FOR THE SECOND BATCH OF 'NON-EXACT' TOPIC MATCHES
$query = "SELECT person, comment, COUNT(comment), sum(rank) FROM people WHERE person LIKE '%$theirName%' and person <> '$theirName' GROUP BY person order by sum(rank) desc limit 7, 30"; 
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
</div>
 



<div id="messageresults">


<?php

$query = "SELECT * FROM people WHERE comment like '%$theirName%'AND person not like '%$theirName%'
ORDER BY rank DESC limit 75"; 
$result = mysql_query($query) or die(mysql_error());
$num_results = mysql_num_rows($result); 


if ($num_results > 0 ){echo "<span  class = \"topic2\" ><u>Message Matches</u></span><br><br>";}
	
while($row = mysql_fetch_array($result)){	
	
?><A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", trim($row['person'])); ?>"><?php
	
echo "<span class = \"comment2\"><span class = \"card\">" .strtolower($row['person']) . "</span> : " . "</span></a>" . 
	"<span class = \"comment\">" .  hyper($row['comment']). "</span>";
	echo "<br><br>";} echo "<br></div></div>"; 
	
	?>
	
	<script type="text/javascript">
header();




$("#messageresults").hide();  







$('.hidemessages').click(function(){
	$("#messagematches").slideUp("fast");
}); 


$('.gotomessages').click(function(){
	$("#data").hide("");
	$(".extra:first").show();
	$("#messageresults").slideDown("fast");
	
}); 









$(".redtitle").click(function(){
$("#messageresults").fadeOut("fast");
$("#data").fadeIn("slow");
	
if ( $(".extra").is(":visible") ){
$(".extra").slideUp("fast");
$("#messagematches").slideDown("fast");	
$(".options").hide();}

else{
$(".extra").slideDown("slow");
$(".options").show("slow");}
}); 
 
 
 
 
 
 
 setexpand();
 


	
	
	
	
	
	
	
</script>


<?php


 break;  
}



















 ?>











<script type="text/javascript" src="http://www.dirtpage.com/jq.js"></script>
<script type="text/javascript" src="http://www.dirtpage.com/jsfunctions.js"></script>
<script type="text/javascript">


///// HANDLES POSTS MUCH BETTER IN THIS FILE FOR SOME REASON

setcards();

  
  </script>