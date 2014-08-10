<html>

<head>
<title> dirtPage </title>


<link rel="stylesheet" href="styles.css" type="text/css">

<script type="text/javascript">

function searchExact(topic)
{
	
	document.searchexact.topic.value = topic;
 document.searchexact.submit()
	
}

function searchTopics(topic)
{
	
	document.searchtopics.topic.value = topic;
 document.searchtopics.submit()
	
}


function increaseScore(i, topic)
{
	
	document.increasescore.message.value = i;
document.increasescore.topic.value = topic;
 document.increasescore.submit()
	
}



</script> 



</head>


<Body onLoad="document.post.message.focus()">

 
  



<body>

<SCRIPT LANGUAGE="JavaScript" SRC="navbar.js">
</SCRIPT>



 <form name="searchexact" action="searchexact5.php" method="post">
<input type="hidden" name="topic" value="fred">
</form>

 <form name="searchtopics" action="searchtopics5.php" method="post">
<input type="hidden" name="topic" value="fred">
</form>

<form name="increasescore" action="increasescore5.php" method="post">
<input type="hidden" name="message" value="fred">
<input type="hidden" name="topic">
</form>

<h3>MESSAGES with


<?php



$theirName = $_POST['topic'];
echo 


"\"$theirName\"         ";

?>
</h3>

<A HREF="javascript:void(0)" onClick= 'searchTopics("<?php echo $theirName; ?>")' <h4> switch to topic view </h4> </A>  



<form name="post" action="post5.php" method="POST">

 
   <input type="text" name="message" size="28" value="" maxlength="125">
  <input type="hidden" name="topic" value= <?php echo "\"$theirName\"" ?>
  <input type="submit" value="POST NEW MESSAGE">
   </form>
        
        
    
<?php

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());


mysql_select_db("dirtpage1") or die(mysql_error());




 


$query = "SELECT * FROM people
WHERE (person like '%$theirName%' or comment like '%theirName%')


ORDER BY rank DESC"; 
	 
$result = mysql_query($query) or die(mysql_error());

 


while($row = mysql_fetch_array($result)){
	
	?>    
 <A HREF="javascript:void(0)" onClick= 'searchExact("<?php echo $row['person']; ?>")'> 
	
	<?php
	
echo "<span class = \"topic\">" .$row['person'] . " : " . "</span></a>" . 
	"<span class = \"comment\">"     .  
	$row['comment'] . "</span>"     .   "<span class = \"topic\">";
	echo "<br />";
echo "<br />";
	}
 

	$query = "SELECT * FROM people
WHERE comment like '%$theirName%'or person like '%theirName%'
ORDER BY rank DESC"; 
	 
$result = mysql_query($query) or die(mysql_error());

  
 

while($row = mysql_fetch_array($result)){
	
	?>    
 <A HREF="javascript:void(0)" onClick= 'searchExact("<?php echo $row['person']; ?>" , "<?php echo $theirName; ?>")'> 
	
	<?php
	
echo "<span class = \"comment\">" .$row['person'] . " : " . "</span></a>" . 
	"<span class = \"topic\">"     .  
	$row['comment'] . "</span>"     .    "<span class = \"topic\">";
	echo "<br />";
echo "<br />";
	}

?>
</body>
