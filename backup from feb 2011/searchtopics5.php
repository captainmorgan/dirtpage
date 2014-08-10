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

function searchMessages(topic)
{
	
 document.searchmessages.topic.value = topic;
 document.searchmessages.submit()
	
}


</script> 


</head>



<body onLoad="document.form1.comment.focus()">

 




<body>

<SCRIPT LANGUAGE="JavaScript" SRC="navbar.js">
</SCRIPT>



  <form name="searchexact" action="searchexact5.php" method="post">
<input type="hidden" name="topic" value="fred">
</form>

 <form name="searchmessages" action="searchmessages5.php" method="post">
<input type="hidden" name="topic" value="fred">
</form>


 
 
 
  
 






<h3>TOPICS with


<?php
 


$theirName = $_POST['topic'];


   
echo 


"\"$theirName\"         ";

?>
</h3>

<A HREF="javascript:void(0)" onClick= 'searchMessages("<?php echo $theirName; ?>")' <h4> switch to message view </h4> </A> 





<form name="post" action="post5.php" method="POST">

 
   <input type="text" name="message" size="28" value="" maxlength="125">
  <input type="hidden" name="topic" value= <?php echo "\"$theirName\"" ?>
  <input type="submit" value="POST NEW MESSAGE">
   </form>
        
        
    
<?php




mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());








$query = "SELECT person, COUNT(comment) FROM people WHERE person = '$theirName' GROUP BY person asc order by COUNT(comment) desc limit 100"; 
$result = mysql_query($query) or die(mysql_error());

 while($row = mysql_fetch_array($result)){
	
	 ?>    
 <A HREF="javascript:void(0)" onClick= 'searchExact("<?php echo $row['person']; ?>")'> 
	
	<?php
	
echo "<span class = \"topic\">".  $row['person'] .   "</span></a> <span class = \"comment\">"           . "(". $row['COUNT(comment)'] ." messages)</span>";
	
echo "<br />";
echo "<br />";
}








$query = "SELECT person, COUNT(comment) FROM people WHERE person LIKE '%$theirName%' and person <> '$theirName' GROUP BY person asc order by COUNT(comment) desc limit 100"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
	
?>    
 <A HREF="javascript:void(0)" onClick= 'searchExact("<?php echo $row['person']; ?>")'> 
	
	<?php
	
echo "<span class = \"topic\">".  $row['person'] .   "</span></a> <span class = \"comment\">"           . "(". $row['COUNT(comment)'] ." messages)</span>";
	
echo "<br />";
echo "<br />";
}



?>
</body>