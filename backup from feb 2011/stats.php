<?php include("phpfunctions.php");  
include("header.php"); ?>


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
<script type="text/javascript" src="http://www.dirtpage.com/jsfunctions.js"></script>




<?php include("google.php"); ?>
   
</head>

<body>




<?php
















switch ($stat) {

 case "about":
 ?><div id = "container"> <div id = "output"> 
 <h3> Definition: </h3> 
<h4>Dirtpage global is a free, anonymous, automatic, accumulative, messageboard-ish encyclopedia of brilliance, humor, and crap. </h4>


<h3> What to do: </h3> 
<h4> SEARCH for anything.  Instantly POST anything about anything (or anyone) in order to inform, explain, collaborate, entertain, warn, praise, tease, tickle, vent, or confess. </h4>

<h3> Voting: </h3> 
<h4> Vote as much as you want on messages you like</h4>



<h3> Have fun and play nice. </h3> </div></div>
<?php 
 break;  
 
 
 
 
 
 
 
 
 
 
 
case "recent":
    
	
	
	 ?><div id = "container"> <div id = "output"> <?php
	
	
	  
echo "<h3> Recently posted dirt     </h3>  ";
$query = "SELECT * FROM people where (rank > garbage) ORDER BY id DESC LIMIT 100"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){

	?>   
  <A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>">   
    


<?php
	
echo "<span class = \"topic\">" . $row['person'] . " : " . "</span></a>" . 
	"<span class = \"comment\">"     .  
	hyper($row['comment']) . "</span>" ;
	


echo "<br>";
echo "<br></div></div>";	



}
 break;












case "active":
mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());
echo "<h3> Recently voted on </h3>  ";
$query = "SELECT * from people ORDER BY date DESC LIMIT 100"; 
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
 

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());

$query = "SELECT * FROM people where (rank > garbage) ORDER BY rand() DESC LIMIT 100"; 
$result = mysql_query($query) or die(mysql_error());

?>     <div id = "container">     <div id = "output"> 
<span class = "redtitle"> random dirt</span><br><br> 


<?php



while($row = mysql_fetch_array($result)){
		?>   
  <A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>">   
    


<?php
	
	
echo "<span class = \"smalltopic\"><span class = \"card\">" . strtolower(($row['person'])) . "</span> : " . "</span></a>" . 
	"<span class = \"comment\">"     .  
	hyper(strtolower($row['comment'])) . "</span>" ;
	


echo "<br>";
echo "<br>";	

}
?> </div>   </div><div id = "boxes"></div><?php


 break;
 
 
 
 
 
 
 
 
 
 case "busy":
 
mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());

$query = "SELECT person, COUNT(comment) FROM people where (rank > garbage) GROUP BY person asc order by COUNT(comment) desc limit 25"; 
$result = mysql_query($query) or die(mysql_error());

 
 
?> <div id = "container"><div id = "output"> 
<span class = "redtitle"> topics with most dirt</span> <br><br>

 
 <?php
 
echo "<ol class = \"comment\" >";

while($row = mysql_fetch_array($result)){
	
	
	
	?>    
  <span class = "dirt"><A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>">
	
	<?php
	
echo "<li><span class = \"topic\"><span class = \"expandable\">".  strtolower($row['person']) .   "</span></span></a> <span class = \"comment\">"           . "(". $row['COUNT(comment)'] ." messages)</span></li></span>";
	
	 
echo "<br />";


}
	echo "</ol>";
 ?></div></div><div id = "boxes"></div><?php
 break;
 
 
 
 
 
 
 
 
 
 
 case "ratings":
 

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());

$query = "SELECT * FROM people where (rank > garbage)  ORDER BY rank DESC LIMIT 100"; 
$result = mysql_query($query) or die(mysql_error());


?> <div id = "container"> <div id = "output"> 
<span class = "redtitle"> top-rated dirt</span> <br><br>
<?php



echo "<ol>";


while($row = mysql_fetch_array($result)){
	?><li><A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>">   
    


<?php
	
echo "<span class = \"smalltopic\"><span class = \"card\">" . $row['person'] . "</span> : " . "</span></a>" . 
	"<span class = \"comment\">"     .  
	hyper($row['comment']) . "</span>" ;
	


echo "<br>";
echo "<br>";	

}
echo "</ol></div></div><div id = \"boxes\"></div>";

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
<div id = "container">
<div id = "output"> 
<span class = "redtitle"> featured topics</span> 
<br><br>






<span class = "dirt"><A HREF="http://www.dirtpage.com/page/confessions"><span class = "topic"> <span class = "expandable">confessions</span></span> </A></span>




 <span class = "dirt"><A HREF="http://www.dirtpage.com/page/girls"><span class = "topic"> <span class = "expandable">girls</span></span> </A></span>
 


 <span class = "dirt"><A HREF="http://www.dirtpage.com/page/best+villain+ever"> <span class = "topic"><span class = "expandable">best villain ever</span></span> </A></span>
 
 
 
 <span class = "dirt"><A HREF="http://www.dirtpage.com/page/barack+obama"><span class = "topic"> <span class = "expandable">barack obama</span></span> </A></span>


 <span class = "dirt"><A HREF="http://www.dirtpage.com/page/funny+sounding+words"><span class = "topic"> <span class = "expandable">funny sounding words</span></span> </A></span>



 <span class = "dirt"><A HREF="http://www.dirtpage.com/page/bad+first+date+comments"><span class = "topic"> <span class = "expandable">bad first date comments</span> </span> </A></span>



 <span class = "dirt"><A HREF="http://www.dirtpage.com/page/dirtage+slogans"> <span class = "topic"> <span class = "expandable">dirtpage slogans</span></span> </A></span>



 <span class = "dirt"><A HREF="http://www.dirtpage.com/page/earth"><span class = "topic"> <span class = "expandable">earth</span></span> </A></span>


 <span class = "dirt"><A HREF="http://www.dirtpage.com/page/contradictory+haikus"> <span class = "topic"> <span class = "expandable">contradictory haikus</span></span> </A></span>





 <span class = "dirt"><A HREF="http://www.dirtpage.com/page/god"><span class = "topic"> <span class = "expandable">god</span> </span> </A></span>


 <span class = "dirt"><A HREF="http://www.dirtpage.com/page/ironic+if+transparent"> <span class = "topic"> <span class = "expandable">ironic if transparent</span> </span> </A></span>



 <span class = "dirt"><A HREF="http://www.dirtpage.com/page/best+weapons"> <span class = "topic"> <span class = "expandable">best weapons</span></span> </A></span>



 <span class = "dirt"><A HREF="http://www.dirtpage.com/page/ugliest+celebrity"><span class = "topic"> <span class = "expandable">ugliest celebrity </span></span> </A></span>


 <span class = "dirt"><A HREF="http://www.dirtpage.com/page/how+to+save+the+world"> <span class = "topic"> <span class = "expandable">how to save the world</span></span> </A></span>


 <span class = "dirt"><A HREF="http://www.dirtpage.com/page/almost+a+sport"> <span class = "topic"> <span class = "expandable">almost a sport</span></span> </A></span>
<br><br>


</div></div>
<?php

 break;

	
}
	   

?>

<div id = "boxes">    <div class = "results"></div>   <div class = "results2"></div> </div>

<script type="text/javascript"> 



header();
//TEMP setcards();

//TEMP setexpand();
 


</script>


</body>
