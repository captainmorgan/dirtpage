<html>

<head>
<title> dirtpage </title>
<link rel="stylesheet" href="http://www.dirtpage.com/styles.css" type="text/css">
</head>



 
<script type="text/javascript">



function searchExact(topic)
{
	

	document.searchexact.topic.value = topic;
 document.searchexact.submit()
	
}


 
  
 function search ()
{

window.location.href="http://www.dirtpage.com/results/"+document.form1.topic.value.replace(" ", "+");
	
}
 
 
 
</script>

<body>


<?php

$stat = $_GET['stat'];


?>


<a href="http://www.dirtpage.com/default.html">

<H1> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: green">dirt</span><span style="color:white">page</span></H1>


</a>


<center>
<h5>
<form name="form1" action="search.php" method="GET" onSubmit="search();return false;" >
<input type="text" name="topic" size="28" value="" maxlength="25" >
<input type="submit" value="search dirtpage ">
</form>
</h5>
</center>     

<center>
<h4>
<span style="color:blue">




<A HREF="http://www.dirtpage.com/nav/about">about</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="http://www.dirtpage.com/nav/recent">recent</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="http://www.dirtpage.com/nav/active">active</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="http://www.dirtpage.com/nav/random">random</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="http://www.dirtpage.com/nav/busy">busy</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="http://www.dirtpage.com/nav/ratings">ratings</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="http://www.dirtpage.com/nav/disputed">disputed</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="http://www.dirtpage.com/nav/featured">featured</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A href="mailto:dirtpage1@gmail.com?">contact</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;




</span>
</h4>
</center>
<hr>




<form name="searchexact" action="pages.php" method="GET">
<input type="hidden" name="topic" value="fred">
</form>



<form name="statsform" action="stats.php" method="get">
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
<img src="http://www.dirtpage.com/thumb.jpg"  border = "0"/> : vote as much as you want on messages you like</h4>



<h3> Garbage: </h3> <h4>
<img src="http://www.dirtpage.com/garbage.jpg"  border = "0"/> : send a message to the garbage by clicking until it goes away. 
<br><br>
<img src="http://www.dirtpage.com/up.jpg"  border = "0"/> &nbsp;: return a message from the garbage
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
  <A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>">
  
    
    

<!--<A HREF="javascript:void(0)" onClick='searchExact("<?php echo $row['person']; ?>")'>-->


<?php
	
if  ( $row['rank'] > $row['garbage'] ) {
	
echo "<span class = \"topic\">" .$row['person'] . " : " . "</span></a>" . 
	"<span class = \"comment\">"     .  
	$row['comment']. "</span>" ;}
	
else {?>   
  <A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>">
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
  <A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>">
	
	<?php
	
if  (( $row['rank'] > 1 ) || ($row['garbagetotal'] > 0 )) {	
	
if  ( $row['rank'] > $row['garbage'] ) {
	
echo "<span class = \"topic\">" .$row['person'] . " : " . "</span></a>" . 
	"<span class = \"comment\">"     .  
	$row['comment']. "</span>" ;}
	
else {?>   
  <A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>">
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
  <A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>">
	
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
  <A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>">
	
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
  <A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>">
	
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


<h3> Featured topics </h3>














 <A HREF="http://www.dirtpage.com/page/confessions">
<span class = "topic"> confessions</span> </A>

<br /><br />



 <A HREF="http://www.dirtpage.com/page/girls">
<span class = "topic"> girls</span> </A>
 
<br><br>

 <A HREF="http://www.dirtpage.com/page/best+villain+ever"> <span class = "topic"> best villain ever</span> </A>

<br> <br>
 <A HREF="http://www.dirtpage.com/page/barack+obama"><span class = "topic"> barack obama</span> </A>

<br> <br>

 <A HREF="http://www.dirtpage.com/page/funny+sounding+words"><span class = "topic"> funny sounding words</span> </A>

<br> <br>

 <A HREF="http://www.dirtpage.com/page/bad+first+date+comments"><span class = "topic"> bad first date comments</span> </A>

<br> <br>

 <A HREF="http://www.dirtpage.com/page/dirtage+slogans"> <span class = "topic"> dirtpage slogans </span> </A>

<br> <br>

 <A HREF="http://www.dirtpage.com/page/earth"><span class = "topic"> earth</span> </A>

<br> <br>
 <A HREF="http://www.dirtpage.com/page/contradictory+haikus"> <span class = "topic"> contradictory haikus</span> </A>

<br> <br>



 <A HREF="http://www.dirtpage.com/page/god"><span class = "topic"> god </span> </A>

<br> <br>
 <A HREF="http://www.dirtpage.com/page/ironic+if+transparent"> <span class = "topic"> ironic if transparent</span> </A>


<br> <br>
 <A HREF="http://www.dirtpage.com/page/best+weapons"> <span class = "topic"> best weapons </span> </A>

<br> <br>

 <A HREF="http://www.dirtpage.com/page/ugliest+celebrity"><span class = "topic"> ugliest celebrity </span> </A>

<br> <br>
 <A HREF="http://www.dirtpage.com/page/how+to+save+the+world"> <span class = "topic"> how to save the world </span> </A>

<br> <br>
 <A HREF="http://www.dirtpage.com/page/almost+a+sport"> <span class = "topic"> almost a sport </span> </A>
</body>
<?php

 break;

	
}
	   

?>


</body>
