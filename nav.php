<?php include("resources/phpfunctions.php");  
?>


<html>

<?php

$theirName = $_GET['topic'];
$messageNumber = $_GET['message'];
$act = $_GET['act'];
$newMessage = $_GET['newmessage'];
$page = $_GET['page'];

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());?>



<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> dirtpage: <?php echo $theirName?> </title>
<link rel="stylesheet" href="http://www.dirtpage.com/resources/styles.css" type="text/css">
<script type="text/javascript" src="http://www.dirtpage.com/resources/jq.js"></script> 
<script type="text/javascript" src="http://www.dirtpage.com/resources/jsfunctions.js"></script>

 


<?php include("resources/google.php"); ?>
   
</head>

<body>


<div id="everything">

<?php

include("header.php"); 
echo "<br><br>";
echo "<span id=\"holder\">" ;
 echo "<br>";











switch ($page) {

 case "about":
 
 
 
 
 
 
 
 
 
 
 
 
 
 ?> 
 <h3> Definition: </h3> 
<h4>Dirtpage is a free, anonymous, automatic, accumulative, messageboard-ish encyclopedia of brilliance, humor, and crap. </h4>


<h3> What to do: </h3> 
<h4> SEARCH for anything.  Instantly POST anything about anything (or anyone), in order to inform, explain, collaborate, entertain, warn, praise, tease, tickle, vent, or confess. </h4>

<h3> Voting: </h3> 
<h4> Vote as much as you want on messages you like</h4>



<h3> Have fun and play nice. </h3>  
<?php 
 break;  
 
 
 
 
 
 
 
 
 
 
 
case "recent":
    
	
	echo "<span class = \"pinktitle\">most recent items</span> <br><br>";

	
	// QUERY
$query = "SELECT 'messages' as table_name, topic, message as item, score, origin, message_id as item_id
        FROM messages 
        UNION
        SELECT 'pictures' as table_name, topic, picture as item, score, origin, picture_id as item_id
        FROM pictures  
        ORDER BY origin DESC limit 50";
$result = mysql_query($query) or die(mysql_error());
$i = 0;

while($row = mysql_fetch_array($result)){ $i ++;
	

// MESSAGES
if 	($row['table_name'] == 'messages') { 
echo  "<table ><tr ><td valign=\"top\"><span class=\"smallwhite\">$i.</span></td>";
echo "<td valign=\"top\" width= \"600\" style=\"padding-left:5px; \">

<A HREF=\"page/?topic=" . str_replace(" ", "+", $row['topic']). "\"><span class = \"smallyellow\">". $row['topic'] ." : </span></a>
<span class = \"smallwhite\">" . hyper($row['item']) . "</span>"   ;
?>

<br></td>
</tr></table>
<?php  
}
	
	
//PICTURES	
if 	($row['table_name'] == 'pictures') {

echo "<table ><tr ><td valign = \"top\"><span class=\"smallwhite\"> $i.</span> </td>";

echo "<td valign = \"top\"><A HREF=\"page/?topic=" . str_replace(" ", "+", $row['topic']). "\"><span class = \"smallyellow\">&nbsp;". $row['topic'] .": </span></a></td>";


echo "<td valign = \"top\">&nbsp;<a href = \"http://www.dirtpage.com/page.php?topic=". $row['topic'] . "&mode=picture&picture=". $row['item'] . "\"><img src=\"pictures/".  $row['item'] . "\" height=\"150\" border=\"black\"></a></td>";
echo "<td valign = \"top\">"; 
 
 

echo "</td><td valign = \"bottom\" style=\"padding-left:20px; padding-right:70px;\"><span class = \"tinysilver\">";

 


// CAPTION
$item = $row['item'];
$query2 = "SELECT * FROM captions WHERE picture = '$item' ORDER BY score DESC limit 1"; 
$result2 = mysql_query($query2) or die(mysql_error()); 
while($row2 = mysql_fetch_array($result2))
{echo ($row2['caption']) ;}




echo "</span><br><br></td></tr></table>";
}
	
	
echo "<br>";
}
	 	
 break;












case "active":

echo "<h3> Recently voted on </h3>  ";
$query = "SELECT * from people ORDER BY date DESC LIMIT 50"; 
$result = mysql_query($query) or die(mysql_error());




while($row = mysql_fetch_array($result)){


if  (( $row['rank'] > 1 ) || ($row['garbagetotal'] > 0 )) {	
		?>   
<A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>">   
    


<?php
	
echo "<span class = \"topic\">" . $row['person'] . " : " . "</span></a>" . 
	"<span class = \"comment\">"     .  
	hyper($row['comment']) . "</span>" ;
	


echo "<br>";
echo "<br>";	

}}
 break;
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 case "random":
 

	echo "<span class = \"pinktitle\">random items</span> <br><br>";
	// QUERY
$query = "SELECT 'messages' as table_name, topic, message as item, score, origin, message_id as item_id
        FROM messages 
        UNION
        SELECT 'pictures' as table_name, topic, picture as item, score, origin, picture_id as item_id
        FROM pictures  
        ORDER BY rand() DESC limit 10";
$result = mysql_query($query) or die(mysql_error());
$i = 0;

while($row = mysql_fetch_array($result)){ $i ++;
	

// MESSAGES
if 	($row['table_name'] == 'messages') { 
echo  "<table ><tr ><td valign=\"top\"><span class=\"smallwhite\">$i.</span></td>";
echo "<td valign=\"top\" width= \"600\" style=\"padding-left:5px; \">

<A HREF=\"page/?topic=" . str_replace(" ", "+", $row['topic']). "\"><span class = \"smallyellow\">". $row['topic'] ." : </span></a>
<span class = \"smallwhite\">" . hyper($row['item']) . "</span>"   ;?>

<br></td>
</tr></table>
<?php  
}
	
	
//PICTURES	
if 	($row['table_name'] == 'pictures') {

echo "<table ><tr ><td valign = \"top\"><span class=\"smallwhite\"> $i.</span> </td>";

echo "<td valign = \"top\"><A HREF=\"page/?topic=" . str_replace(" ", "+", $row['topic']). "\"><span class = \"smallyellow\">&nbsp;". $row['topic'] ." : </span></a></td>";


echo "<td valign = \"top\">&nbsp;<a href = \"http://www.dirtpage.com/page.php?topic=". $row['topic'] . "&mode=picture&picture=". $row['item'] . "\"><img src=\"pictures/".  $row['item'] . "\" height=\"150\" border=\"black\"></a></td>";
echo "<td valign = \"top\">"; 
  

echo "</td><td valign = \"bottom\" style=\"padding-left:20px; padding-right:70px;\"><span class = \"tinysilver\">";

 


// CAPTION
$item = $row['item'];
$query2 = "SELECT * FROM captions WHERE picture = '$item' ORDER BY score DESC limit 1"; 
$result2 = mysql_query($query2) or die(mysql_error()); 
while($row2 = mysql_fetch_array($result2))
{echo ($row2['caption']) ;}




echo "</span><br><br></td></tr></table>";
}
	
	
echo "<br>";
}



 break;
 
 
 
 
 
 
 
 
 
 case "busy":
 
mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());

$query = "SELECT person, COUNT(comment) FROM people where (rank > garbage) GROUP BY person asc order by COUNT(comment) desc limit 25"; 
$result = mysql_query($query) or die(mysql_error());

 
 
?>  
<span class = "pinktitle"> topics with most items</span> <br><br>

 
 <?php
 
echo "<ol class = \"comment\" >";

while($row = mysql_fetch_array($result)){
	
	
	
	?>    
  <span class = "dirt"><A HREF="http://www.dirtpage.com/page.php?topic=<?php echo str_replace(" ", "+", $row['person']); ?>">
	
	<?php
	
echo "<li><span class = \"topic\"><span class = \"expandable\">".  strtolower($row['person']) .   "</span></span></a> <span class = \"comment\">"           . "(". $row['COUNT(comment)'] ." messages)</span></li></span>";
	
	 
echo "<br />";


}
	echo "</ol>";
 
 break;
 
 
 
 
 
  case "tags":
 
 
$query = "SELECT tag, COUNT(tag) FROM tags GROUP BY tag asc order by COUNT(tag) desc limit 100"; 
$result = mysql_query($query) or die(mysql_error());

 
 
?>  
<span class = "pinktitle">most popular tags</span> <br><br>

 
 <?php
 
echo "<ol class = \"comment\" >";

while($row = mysql_fetch_array($result)){
	
	
	
	?>    
  <span class = "dirt"><A HREF="http://www.dirtpage.com/tag.php?tag=<?php echo str_replace(" ", "+", $row['tag']); ?>">
	
	<?php
	
echo "<li><span class = \"bigred\"><span class = \"expandable\">".  strtolower($row['tag']) .   "</span></span></a> &nbsp;<span class = \"comment\">"           . "(". $row['COUNT(tag)'] ." topics)</span></li></span>";
	
	 
echo "<br />";


}
	echo "</ol>";
 
 break;
 
 
 
 
 
 
 
 case "top_items":
 
	
	 
	echo "<span class = \"pinktitle\">highest rated items</span> <br><br>";
	// QUERY
$query = "SELECT 'messages' as table_name, topic, message as item, score, origin, message_id as item_id
        FROM messages 
        UNION
        SELECT 'pictures' as table_name, topic, picture as item, score, origin, picture_id as item_id
        FROM pictures  
        ORDER BY score DESC limit 50";
$result = mysql_query($query) or die(mysql_error());
$i = 0;

while($row = mysql_fetch_array($result)){ $i ++;
	

// MESSAGES
if 	($row['table_name'] == 'messages') { 
echo  "<table ><tr ><td valign=\"top\"><span class=\"smallwhite\">$i.</span></td>";
echo "<td valign=\"top\" width= \"600\" style=\"padding-left:5px; \">

<A HREF=\"page/?topic=" . str_replace(" ", "+", $row['topic']). "\"><span class = \"smallyellow\">". $row['topic'] ." : </span></a>
<span class = \"smallwhite\">" . hyper($row['item']) . "</span>"   ;
?>
<br></td>
</tr></table>
<?php  
}
	
	
//PICTURES	
if 	($row['table_name'] == 'pictures') {

echo "<table ><tr ><td valign = \"top\"><span class=\"smallwhite\"> $i.</span> </td>";

echo "<td valign = \"top\"><A HREF=\"page/?topic=" . str_replace(" ", "+", $row['topic']). "\"><span class = \"smallyellow\">&nbsp;". $row['topic'] ." : </span></a></td>";


echo "<td valign = \"top\">&nbsp;<a href = \"http://www.dirtpage.com/page.php?topic=". $row['topic'] . "&mode=picture&picture=". $row['item'] . "\"><img src=\"pictures/".  $row['item'] . "\" height=\"150\" border=\"black\"></a></td>";
echo "<td valign = \"top\">"; 
 

echo "</td><td valign = \"bottom\" style=\"padding-left:20px; padding-right:20px;\"><span class = \"tinywhite\">";

 


// CAPTION
$item = $row['item'];
$query2 = "SELECT * FROM captions WHERE picture = '$item' ORDER BY score DESC limit 1"; 
$result2 = mysql_query($query2) or die(mysql_error()); 
while($row2 = mysql_fetch_array($result2))
{echo ($row2['caption']) ;}




echo "</span><br><br></td></tr></table>";
}
	
	
echo "<br>";
}
	 
	

 break;
 
 
 
 
 
 
 
 
 
 
 
 case "top_topics":
 
$query = "SELECT * FROM topics order by score desc limit 50"; 
$result = mysql_query($query) or die(mysql_error());

 
 
?>   
<span class = "pinktitle">highest rated topics</span> <br><br>

 
 <?php
 
echo "<ol class = \"comment\" >";

while($row = mysql_fetch_array($result)){
	
	
	
	?>    
  <span class = "dirt"><A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>">
	
	<?php
	
echo "<li><A HREF=\"page/?topic=" . str_replace(" ", "+", $row['topic']). "\"><span class = \"bigyellow\">".  strtolower($row['topic']) .   "</span></a> <span class = \"comment\">"           . "(". $row['score'] .")</span></li></span>";
	
	 
echo "<br />";


}
	echo "</ol>";
 	

 break;
 
 
 
 
  
 
 case "views":
 
$query = "SELECT * FROM topics order by num_views desc limit 50"; 
$result = mysql_query($query) or die(mysql_error());

 
 
?>  
<span class = "pinktitle"> most viewed topics</span> <br><br>

 
 <?php
 
echo "<ol class = \"comment\" >";

while($row = mysql_fetch_array($result)){
	
	
	
	?>    
  <span class = "dirt"><A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>">
	
	<?php
	
echo "<li><A HREF=\"page/?topic=" . str_replace(" ", "+", $row['topic']). "\"><span class = \"bigyellow\">".  strtolower($row['topic']) .   "</span></a> <span class = \"comment\">"           . "(". $row['num_views'] ." views)</span></li></span>";
	
	 
echo "<br />";


}
	echo "</ol>";
 ?> <?php	

 break;
 
 
 
 
 
 
 case "disputed":
 


mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());
echo "<h3> Top rated garbage   </h3>  ";
$query = "SELECT * FROM people where (rank <= garbage) ORDER BY rank DESC LIMIT 25"; 
$result = mysql_query($query) or die(mysql_error());



echo "<ol class = \"comment\" >";

while($row = mysql_fetch_array($result)){
	 
	
	

	?>   
  <A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>">	
	<?php
	
if  ( $row['rank'] > $row['garbage'] ) {
	
echo "<li><span class = \"topic\">" .$row['person'] . " : " . "</span></a>" . 
	"<span class = \"comment\">"     .  
	$row['comment']. "</span></li>" ;}
	
else {?>   
  <A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>">
	
	<?php
	
echo "<li><span class = \"garbage\">" .$row['person'] . " : " . "</span></a>" . 
	"<span class = \"garbage\">"     .  
	$row['comment']. "</span>"  .  "<span class = \"garbagescore\">"   . " (". (21 + date("Y-m-d") - $row['garbagedate']) . " days)" . "</span></li>";}


	
echo "<br>";	

}

echo "</ol >";


 break;
 
 
 
 
 
 
 
 
 
 
 
 case "featured":
 ?>

 
<span class = "pinktitle"> featured topics</span> 
<br><br>






<span class = "dirt"><A HREF="http://www.dirtpage.com/page.php?topic=confessions"><span class = "topic"> <span class = "expandable">confessions</span></span> </A></span><br><br>




 <span class = "dirt"><A HREF="http://www.dirtpage.com/page.php?topic=girls"><span class = "topic"> <span class = "expandable">girls</span></span> </A></span><br><br>
 


 <span class = "dirt"><A HREF="http://www.dirtpage.com/page.php?topic=best+villain+ever"> <span class = "topic"><span class = "expandable">best villain ever</span></span> </A></span><br><br>
 
 
 
 <span class = "dirt"><A HREF="http://www.dirtpage.com/page.php?topic=barack+obama"><span class = "topic"> <span class = "expandable">barack obama</span></span> </A></span><br><br>


 <span class = "dirt"><A HREF="http://www.dirtpage.com/page.php?topic=funny+sounding+words"><span class = "topic"> <span class = "expandable">funny sounding words</span></span> </A></span><br><br>



 <span class = "dirt"><A HREF="http://www.dirtpage.com/page.php?topic=bad+first+date+comments"><span class = "topic"> <span class = "expandable">bad first date comments</span> </span> </A></span><br><br>



 <span class = "dirt"><A HREF="http://www.dirtpage.com/page.php?topic=dirtage+slogans"> <span class = "topic"> <span class = "expandable">dirtpage slogans</span></span> </A></span><br><br>



 <span class = "dirt"><A HREF="http://www.dirtpage.com/page.php?topic=earth"><span class = "topic"> <span class = "expandable">earth</span></span> </A></span><br><br>


 <span class = "dirt"><A HREF="http://www.dirtpage.com/page.php?topic=contradictory+haikus"> <span class = "topic"> <span class = "expandable">contradictory haikus</span></span> </A></span><br><br>





 <span class = "dirt"><A HREF="http://www.dirtpage.com/page.php?topic=god"><span class = "topic"> <span class = "expandable">god</span> </span> </A></span><br><br>


 <span class = "dirt"><A HREF="http://www.dirtpage.com/page.php?topic=ironic+if+transparent"> <span class = "topic"> <span class = "expandable">ironic if transparent</span> </span> </A></span><br><br>



 <span class = "dirt"><A HREF="http://www.dirtpage.com/page.php?topic=best+weapons"> <span class = "topic"> <span class = "expandable">best weapons</span></span> </A></span><br><br>



 <span class = "dirt"><A HREF="http://www.dirtpage.com/page.php?topic=ugliest+celebrity"><span class = "topic"> <span class = "expandable">ugliest celebrity </span></span> </A></span><br><br>


 <span class = "dirt"><A HREF="http://www.dirtpage.com/page.php?topic=how+to+save+the+world"> <span class = "topic"> <span class = "expandable">how to save the world</span></span> </A></span><br><br>


 <span class = "dirt"><A HREF="http://www.dirtpage.com/page.php?topic=almost+a+sport"> <span class = "topic"> <span class = "expandable">almost a sport</span></span> </A></span><br>
<br><br>

 
<?php

 break;

	
}
	   



?>



</div>


</span>
<span id = "right">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/divfillers/right.php';  ?>
</span>
 
 

</div>

<script type="text/javascript"> 



header();
//TEMP setcards();

//TEMP setexpand();
 


</script>


</body>
