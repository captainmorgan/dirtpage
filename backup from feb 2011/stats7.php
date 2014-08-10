<html>

<head>
<title> dirtPage </title>
<link rel="stylesheet" href="styles.css" type="text/css">
</head>



 
<script type="text/javascript">



function searchExact(topic)
{
	
	document.searchexact.topic.value = topic;
 document.searchexact.submit()
	
}


 
 
 
 
 
</script>

<body>


<?php

$stat = $_GET['stat'];


?>


<a href="home5.php">

<H1> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: green">dirt</span><span style="color:white">page</span></H1>


</a>


<center>
<h5>
<form name="form1" action="search5.php" method="post" >
<input type="text" name="topic" size="28" value="" maxlength="25" >
<input type="submit" value="search dirtpage ">
</form>
</h5>
</center>     

<center>
<h4>
<span style="color:blue">



<a href="javascript:void(0)" onClick='document.statsform.stat.value = "about";
document.statsform.submit()'>
about</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;




<a href="javascript:void(0)" onClick='document.statsform.stat.value = "recent";
document.statsform.submit()'>
recent</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<a href="javascript:void(0)" onClick='document.statsform.stat.value = "active";
document.statsform.submit()'>

active</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<a href="javascript:void(0)" onClick='document.statsform.stat.value = "random";
document.statsform.submit()'>
random</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<a href="javascript:void(0)" onClick='document.statsform.stat.value = "busy";
document.statsform.submit()'>
busy</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<a href="javascript:void(0)" onClick='document.statsform.stat.value = "ratings";
document.statsform.submit()'>
ratings</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

 
<a href="javascript:void(0)" onClick='document.statsform.stat.value = "disputed";
document.statsform.submit()'>
disputed</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<a href="javascript:void(0)" onClick='document.statsform.stat.value = "featured";
document.statsform.submit()'>
featured</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<a href="mailto:dirtpage1@gmail.com?">
contact</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;



</span>
</h4>
</center>
<hr>




<form name="searchexact" action="searchexact7.php" method="post">
<input type="hidden" name="act" value="none">
<input type="hidden" name="topic" value="fred">
<input type="hidden" name="message" value="flintstone">
</form>



<form name="statsform" action="stats7.php" method="get">
<input type="hidden" name="stat" value="none">
</form>



<?php



mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());




switch ($stat) {

 case "about":
 ?>
 <h3> Definition: </h3> 
<h4>Dirtpage is a free, anonymous, automatic, accumulative, messageboard-ish encyclopedia of brilliance, humor, and crap. </h4>


<h3> Purpose: </h3> 
<h4>You can instantly POST on anyone or anything in order to inform, explain, collaborate, entertain, warn, praise, tease, tickle, vent, or confess. </h4>

<h3> Voting: </h3> 
<h4> 
<img src="thumb.jpg"  border = "0"/> : vote as much as you want on messages you like</h4>



<h3> Garbage: </h3> <h4>
<img src="garbage.jpg"  border = "0"/> : send a message to the garbage by clicking until it goes away. 
<br><br>
<img src="up.jpg"  border = "0"/> &nbsp;: return a message from the garbage
<br><br> If a message remains garbage for 21 days continuously it will be removed.

<h3> Have fun and play nice. </h3> 
<?php
 break;  
 
 
 
 
 
 
 
 
 
 
 
case "recent":
      
echo "<h3> Recently posted dirt     </h3>  ";
$query = "SELECT * FROM people where (rank > garbage) ORDER BY id DESC LIMIT 100"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){

	?>   
 <A HREF="javascript:void(0)" onClick='searchExact("<?php echo $row['person']; ?> ")'>
	
<?php
	
if  ( $row['rank'] > $row['garbage'] ) {
	
echo "<span class = \"topic\">" .$row['person'] . " : " . "</span></a>" . 
	"<span class = \"comment\">"     .  
	$row['comment']. "</span>" ;}
	
else {?>   
 <A HREF="javascript:void(0)" onClick='searchExact("<?php echo $row['person']; ?> ")'> 
	
<?php
	
echo "<span class = \"garbage\">" .$row['person'] . " : " . "</span></a>" . 
	"<span class = \"garbage\">"     .  
	$row['comment']. "</span>" ;}
echo "<br>";
echo "<br>";	

}
 break;












case "active":
mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());
echo "<h3> Recently updated dirt </h3>  ";
$query = "SELECT * from people ORDER BY date DESC LIMIT 100"; 
$result = mysql_query($query) or die(mysql_error());




while($row = mysql_fetch_array($result)){



	?>   
 <A HREF="javascript:void(0)" onClick='searchExact("<?php echo $row['person']; ?> ")'> 
	
	<?php
	
if  (( $row['rank'] > 1 ) || ($row['garbagetotal'] > 0 )) {	
	
if  ( $row['rank'] > $row['garbage'] ) {
	
echo "<span class = \"topic\">" .$row['person'] . " : " . "</span></a>" . 
	"<span class = \"comment\">"     .  
	$row['comment']. "</span>" ;}
	
else {?>   
 <A HREF="javascript:void(0)" onClick='searchExact("<?php echo $row['person']; ?> ")'> 
	
	<?php
	
echo "<span class = \"garbage\">" .$row['person'] . " : " . "</span></a>" . 
	"<span class = \"garbage\">"     .  
	$row['comment']. "</span>" ;}


	
   
echo "<br>";
echo "<br>";	

}
}
 break;
 
 
 
 
 
 
 
 case "random":
 

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());
echo "<h3> Random dirt     </h3>  ";
$query = "SELECT * FROM people where (rank > garbage) ORDER BY rand() DESC LIMIT 10"; 
$result = mysql_query($query) or die(mysql_error());




while($row = mysql_fetch_array($result)){
	if  ( $row['rank'] > $row['garbage'] ) {
	?>    
 <A HREF="javascript:void(0)" onClick= 'searchExact("<?php echo $row['person']; ?>")'> 
	
	<?php
	
echo "<span class = \"topic\">" .$row['person'] . " : " . "</span></a>" . 
	"<span class = \"comment\">"     .  
	$row['comment'] . "</span>"     .   "<span class = \"topic\">";
	 
	echo "<br />";
echo "<br />";
	}
}
 break;
 
 
 
 
 
 
 
 
 
 
 
 case "busy":
 
mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());

echo "<h3> Topics with most messages   </h3>  ";
$query = "SELECT person, COUNT(comment) FROM people where (rank > garbage) GROUP BY person asc order by COUNT(comment) desc limit 50"; 
$result = mysql_query($query) or die(mysql_error());

 
echo "<ol class = \"comment\" >";

while($row = mysql_fetch_array($result)){
	
	
	
	?>    
 <A HREF="javascript:void(0)" onClick= 'searchExact("<?php echo $row['person']; ?>")'> 
	
	<?php
	
echo "<li><span class = \"topic\">".  $row['person'] .   "</span></a> <span class = \"comment\">"           . "(". $row['COUNT(comment)'] ." messages)</span></li>";
	
	 
echo "<br />";


}
	echo "</ol>";
 break;
 
 
 
 
 
 
 
 
 
 
 case "ratings":
 

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());
echo "<h3> Top rated dirt    </h3>  ";
$query = "SELECT * FROM people where (rank > garbage)  ORDER BY rank DESC LIMIT 100"; 
$result = mysql_query($query) or die(mysql_error());

echo "<ol class = \"comment\" >";


while($row = mysql_fetch_array($result)){
	 if  ( $row['rank'] > $row['garbage'] ) {
	
	

	?>   
 <A HREF="javascript:void(0)" onClick='searchExact("<?php echo $row['person']; ?> ")'> 
	
	<?php
	
echo "<li><span class = \"topic\">" .$row['person'] . " : " . "</span></a>" . 
	"<span class = \"comment\">"     .  
	$row['comment']. "</span>"  .   "<span class = \"topic\">".   " (" . $row['rank']. ")". 
	
	"</span></li>";
	
		
	
   
echo "<br>";	
	 }
}

echo "</ol>";
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
 <A HREF="javascript:void(0)" onClick='searchExact("<?php echo $row['person']; ?> ")'> 
	
	<?php
	
if  ( $row['rank'] > $row['garbage'] ) {
	
echo "<li><span class = \"topic\">" .$row['person'] . " : " . "</span></a>" . 
	"<span class = \"comment\">"     .  
	$row['comment']. "</span></li>" ;}
	
else {?>   
 <A HREF="javascript:void(0)" onClick='searchExact("<?php echo $row['person']; ?> ")'> 
	
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


<h3> Featured topics </h3>














<A HREF="javascript:void(0)"  onClick= 'searchExact("confessions")'> <span class = "topic"> confessions</span> </A>

<br /><br />


<A HREF="javascript:void(0)"  onClick= 'searchExact("girls")'> <span class = "topic"> girls</span> </A>

<br><br>

<A HREF="javascript:void(0)"  onClick= 'searchExact("best villain ever")'> <span class = "topic"> best villain ever</span> </A>

<br> <br>
<A HREF="javascript:void(0)"  onClick= 'searchExact("barack obama")'> <span class = "topic"> barack obama</span> </A>

<br> <br>

<A HREF="javascript:void(0)"  onClick= 'searchExact("funny sounding words")'> <span class = "topic"> funny sounding words</span> </A>

<br> <br>

<A HREF="javascript:void(0)"  onClick= 'searchExact("bad first date comments")'> <span class = "topic"> bad first date comments</span> </A>

<br> <br>

<A HREF="javascript:void(0)"  onClick= 'searchExact("dirtpage slogans")'> <span class = "topic"> dirtpage slogans </span> </A>

<br> <br>

<A HREF="javascript:void(0)"  onClick= 'searchExact("earth")'> <span class = "topic"> earth</span> </A>

<br> <br>
<A HREF="javascript:void(0)"  onClick= 'searchExact("contradictory haikus")'> <span class = "topic"> contradictory haikus</span> </A>

<br> <br>



<A HREF="javascript:void(0)"  onClick= 'searchExact("god")'> <span class = "topic"> god </span> </A>

<br> <br>
<A HREF="javascript:void(0)"  onClick= 'searchExact("ironic if transparent")'> <span class = "topic"> ironic if transparent</span> </A>


<br> <br>
<A HREF="javascript:void(0)"  onClick= 'searchExact("best weapons")'> <span class = "topic"> best weapons </span> </A>

<br> <br>

<A HREF="javascript:void(0)"  onClick= 'searchExact("ugliest celebrity")'> <span class = "topic"> ugliest celebrity </span> </A>

<br> <br>
<A HREF="javascript:void(0)"  onClick= 'searchExact("how to save the world")'> <span class = "topic"> how to save the world </span> </A>

<br> <br>
<A HREF="javascript:void(0)"  onClick= 'searchExact("almost a sport")'> <span class = "topic"> almost a sport </span> </A>
</body>
<?php

 break;

	
}
	   

?>


</body>
