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

<?php include("phpfunctions.php"); ?>


<?php include("google.php"); ?>
   
</head>

<body>

<?php include("header.php"); ?>


<?php






 









switch ($stat) {

 case "about":
 ?>
 <h3> Definition: </h3> 
<h4>Dirtpage is a free, anonymous, automatic, accumulative, messageboard-ish encyclopedia of brilliance, humor, and crap. </h4>


<h3> What to do: </h3> 
<h4> SEARCH for anything.  Instantly POST anything about anything (or anyone) in order to inform, explain, collaborate, entertain, warn, praise, tease, tickle, vent, or confess. </h4>

<h3> Voting: </h3> 
<h4> Vote as much as you want on messages you like</h4>



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
    


<?php
	
echo "<span class = \"topic\">" . $row['person'] . " : " . "</span></a>" . 
	"<span class = \"comment\">"     .  
	hyper($row['comment']) . "</span>" ;
	


echo "<br>";
echo "<br>";	

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
echo "<h3> Random dirt     </h3>  ";
$query = "SELECT * FROM people where (rank > garbage) ORDER BY rand() DESC LIMIT 10"; 
$result = mysql_query($query) or die(mysql_error());




while($row = mysql_fetch_array($result)){
		?>   
  <A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>">   
    


<?php
	
	
echo "<span class = \"topic\">" . ($row['person']) . " : " . "</span></a>" . 
	"<span class = \"comment\">"     .  
	hyper($row['comment']) . "</span>" ;
	


echo "<br>";
echo "<br>";	

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
	?><A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>">   
    


<?php
	
echo "<span class = \"topic\">" . $row['person'] . " : " . "</span></a>" . 
	"<span class = \"comment\">"     .  
	hyper($row['comment']) . "</span>" ;
	


echo "<br>";
echo "<br>";	

}
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


<script type="text/javascript" src="http://www.dirtpage.com/jq.js"></script>
<script type="text/javascript" src="http://www.dirtpage.com/jsfunctions.js"></script>
<script type="text/javascript">



header();






</script>


</body>
