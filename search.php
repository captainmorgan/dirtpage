<?php
include('resources/init.php');
 mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());


$topic_searched = strtolower($_GET['topic']);

?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title> dirtpage: <?php echo $topic_searched?> </title>

<?php include("resources/google.php"); ?>
   
</head>

 
<Body onLoad="document.form1.topic.focus()">

<body>

<div id="everything">
 
<?php 
include("header.php");
?>

<br><br>
<div id="holder"><br>
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
echo "<span class = \"topic\"><span class = \"expandable\">".  strtolower($row['topic']) .   "</span></span></a><span class = \"smallgreen\">" . " (". $num_results2." items)</span>";
 echo  "</div><br>";


}



//THIS IS TO SHOW 'NO MESSAGES' IF THERE IS NO EXACT TOPIC MATCH


if ($num_results < 1 ) { ?> 


<?php
echo "<span class = \"smallgreen\">There is no '".  strtolower($topic_searched) . "' topic.</span>";
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
<?php

$t = $row['topic'];
 $query3 = "SELECT * FROM messages WHERE topic LIKE '$t'"; 
$result3 = mysql_query($query3) or die(mysql_error());
$num_results3 = mysql_num_rows($result3); 
?>

<A HREF="page.php?topic=<?php echo str_replace(" ", "+", $row['topic']); ?>"><?php
echo "<span class = \"topic\"><span class = \"expandable\">".  strtolower($row['topic']) .   "</span></span></a><span class = \"smallgreen\">" . " (". $num_results3 ." items)</span>";
 echo  "</div><br>";
}
//END OF THAT
//





//THE FOLLOWING IS THE SEARCH AND RESULTS FOR 'MESSAGE' MATCHES (THAT ARE NOT ALSO TOPIC MATCHES)
?> <div id = "messagematches"> <?php
echo "<br>";

$query = "SELECT * FROM messages WHERE (message like '%$topic_searched %' or message like '% $topic_searched%' or message like '$topic_searched')  AND topic not like '%$topic_searched%' limit 100"; 
$result = mysql_query($query) or die(mysql_error());
$num_results2 = mysql_num_rows($result);

$query = "SELECT * FROM messages WHERE (message like '%$topic_searched %' or message like '% $topic_searched%' or message like '$topic_searched')  AND topic not like '%$topic_searched%'
ORDER BY score DESC limit 3"; 
$result = mysql_query($query) or die(mysql_error());
if ($num_results2 > 0 ){echo "<span class = \"gotomessages topic2\"><a href=\"http://www.dirtpage.com/search_messages.php?topic_searched=". $topic_searched ."\">See all message matches</a> (" . $num_results2." total)  </span> <span class = \"hidemessages\"></span><br><br>";
	while($row = mysql_fetch_array($result)){	
	?><A HREF="page/?topic=<?php echo str_replace(" ", "+", $row['topic']); ?>"><?php
	echo "<span class = \"smalltopic\"><span class = \"card\">" . strtolower($row['topic']) . "</span> : " . "</span></a>" . 
	"<span class = \"message\">" .  hyper($row['message']). "</span>";
	echo "<br><br>";} }echo "<br></div>";



//THE FOLLOWING IS THE SEARCH AND RESULTS FOR 'PICTURE' MATCHES (THAT ARE NOT ALSO TOPIC MATCHES)
?> <div id = "messagematches"> <?php
echo "<br>";

$query = "SELECT * FROM captions WHERE (caption like '%$topic_searched %' or caption like '% $topic_searched%' or caption like '$topic_searched')  AND picture not like '%$topic_searched%'"; 
$result = mysql_query($query) or die(mysql_error());
$num_results2 = mysql_num_rows($result);

$query = "SELECT * FROM captions WHERE (caption like '%$topic_searched %' or caption like '% $topic_searched%' or caption like '$topic_searched')  AND picture not like '%$topic_searched%'
ORDER BY score DESC limit 1"; 
$result = mysql_query($query) or die(mysql_error());


 
if ($num_results2 > 0 ){echo "<span class = \"gotomessages topic2\"><a href=\"http://www.dirtpage.com/search_pictures.php?topic_searched=". $topic_searched ."\">See all picture matches</a> (". $num_results2 ." total) </span> <span class = \"hidemessages\"></span><br><br>";
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
	echo "<br><br>";} }echo "<br></div>";














//
// THIS IS FOR THE SECOND BATCH OF 'NON-EXACT' TOPIC MATCHES
$query = "SELECT * FROM topics WHERE topic LIKE '%$topic_searched%' and topic <> '$topic_searched' order by score desc limit 7, 50"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
	
	
	
$t = $row['topic'];
 $query3 = "SELECT * FROM messages WHERE topic LIKE '$t'"; 
$result3 = mysql_query($query3) or die(mysql_error());
$num_results3 = mysql_num_rows($result3); 
?><div class = "dirt">

<A HREF="page/?topic=<?php echo str_replace(" ", "+", $row['topic']); ?>"><?php
echo "<span class = \"topic\"><span class = \"expandable\">".  strtolower($row['topic']) .   "</span></span></a><span class = \"smallgreen\">" . " (". $num_results3 ." total items)</span>";
 echo  "</div><br>";
}
//END OF THAT
//
?>












</div>

<span id = "right">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/divfillers/right.php';  ?>
</span>
  


</div>
</body>

  

