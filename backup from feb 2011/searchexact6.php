<html>

<head>
<title> dirtPage </title>


<link rel="stylesheet" href="styles.css" type="text/css">


  
<script type="text/javascript">


function searchExact(topic)
{
	
	document.searchexact.topic.value = topic;
 document.searchexact.submit();
	
}

function increaseScore(i, topic)
{
	
	
<?php $loginid = mysql_query("UPDATE people SET rank= rank+1  WHERE `id` = '".$row['id']."'") or die(mysql_error()); ?>
	
searchExact("<?php echo $theirName; ?>"); 
	
}


function increaseGarbage(i, topic)
{
	
	document.increasegarbage.message.value = i;
document.increasegarbage.topic.value = topic;
 document.increasegarbage.submit()
	
}

function saveGarbage(i, topic)
{
	
	document.save.message.value = i;
document.save.topic.value = topic;
 document.save.submit()
	
}
</script>

</head>

 

<body onLoad="document.form1.comment.focus()">

 




<body>

<SCRIPT LANGUAGE="JavaScript" SRC="navbar.js">
</SCRIPT>




 
  
  
  
 


<?php

$theirName = $_POST['topic'];






echo 


"<h1> <center>  <i> $theirName </i> </center> </h1>  ";




?>


<center>



 <form name="searchexact" action="searchexact5.php" method="post">
<input type="hidden" name="topic" value="fred">
</form>


<form name="post" action="post5.php" method="POST">

 
   <input type="text" name="message" size="28" value="" maxlength="125">
  <input type="hidden" name="topic" value= <?php echo "\"$theirName\"" ?>
  <input type="submit" value="post new message">
   </form>
</center>      
        
  
  
<form name="increasescore" action="increasescore5.php" method="post">
<input type="hidden" name="message" value="fred">
<input type="hidden" name="topic">
</form>

<form name="increasegarbage" action="increasegarbage5.php" method="post">
<input type="hidden" name="message" value="fred">
<input type="hidden" name="topic">
</form>
    
 <form name="save" action="save5.php" method="post">
<input type="hidden" name="message" value="fred">
<input type="hidden" name="topic">
</form>

<?php

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());


mysql_select_db("dirtpage1") or die(mysql_error());


     


$query = "SELECT * FROM people
WHERE person = '$theirName'
ORDER BY rank DESC"; 
	 
$result = mysql_query($query) or die(mysql_error());

 


while($row = mysql_fetch_array($result)){
	
if  ( $row['rank'] > $row['garbage'] ) {

echo  "<span class = \"comment\">"     .  
	$row['comment']. "</span>"   .   "<span class = \"topic\">".   " (" . $row['rank']. ")". 
	
	"</span>";
 ?> <a href="javascript:void(0)" onClick='increaseScore("<?php echo $row['id']; ?>", "<?php echo $row['person']; ?>")'> <img src="up.jpg"  border = "0"/> </a> <a href="javascript:void(0)" onClick='increaseGarbage("<?php echo $row['id']; ?>", "<?php echo $row['person']; ?>")'> <img src="garbage.jpg"  border = "0"/> </a> <?php  
	 echo "<span class = \"garbagescore\">".   " (" . $row['garbage']. ")". "</span>";
	
	 echo "<br />";
echo "<br />";
}


}
echo "<hr><br>";

$query = "SELECT * FROM people
WHERE person = '$theirName'
ORDER BY rank DESC"; 
	 
$result = mysql_query($query) or die(mysql_error());

 
while($row = mysql_fetch_array($result)){
	 
	
	
	
if  ( $row['rank'] <= $row['garbage'] ) {

echo  "<span class = \"garbage\">"     .  
	$row['comment']. "</span>"   .   "<span class = \"topic\">";
 ?> 
 
 <a href="javascript:void(0)" onClick='saveGarbage("<?php echo $row['id']; ?>", "<?php echo $row['person']; ?>")'>
 
 
  <img src="save.jpg" border="0"  /> </a> 
  
   <?php  
   
	   
	
echo "<br />";
}


}








?>
</body>