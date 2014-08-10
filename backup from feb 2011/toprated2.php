<html>

<head>
<title> dirtPage </title>
<link rel="stylesheet" href="styles.css" type="text/css">
</head>



 

 
<body>


<?php



mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());
echo "<h3> Top rated dirt    </h3>  ";
$query = "SELECT * FROM people ORDER BY rank DESC LIMIT 100"; 
$result = mysql_query($query) or die(mysql_error());




while($row = mysql_fetch_array($result)){
	
	
	

	?>   
 <A HREF="javascript:void(0)" onClick='searchExact("<?php echo $row['person']; ?> ")'> 
	
	<?php
	
echo "<span class = \"topic\">" .$row['person'] . " : " . "</span></a>" . 
	"<span class = \"comment\">"     .  
	$row['comment']. "</span>"  .   "<span class = \"topic\">".   " (" . $row['rank']. ")". 
	
	"</span>";
	
		
		 
	 ?> <a href="javascript:void(0)" onClick='increaseScore("<?php echo $row['id']; ?>"   ,   "<?php echo $row['person']; ?> "  )'> <img src="up.jpg" width="20" height="26" /> </a>  <?php  
	 
   
echo "<br>";
echo "<br>";	

}
?>
	






</body>

</html>

