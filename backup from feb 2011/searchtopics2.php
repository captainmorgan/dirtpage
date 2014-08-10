

<body>   



<h3>MESSAGES with


<?php
 


$theirName = $_GET['t'];


   
echo 


"\"$theirName\"         ";

?>
</h3>

<A HREF="javascript:void(0)" onClick="digDirt(document.form1.theirName.value)"> <h4> switch to topic view </h4> </A>  



<form name="form2" onSubmit="return false;">

 
      <input type="text" name="theirComment" size="28" value="" maxlength="125" onKeyDown= "if(enter_pressed(event)){ throwDirt(document.form1.theirName.value, document.form2.theirComment.value) }">
  
    <A HREF="javascript:void(0)" onClick= "throwDirt(document.form1.theirName.value, document.form2.theirComment.value)">
POST </A>
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
 <A HREF="javascript:void(0)" onClick= 'searchExact("<?php echo $row['person']; ?>" , "<?php echo $theirName; ?>")'> 

	<?php
	
echo "<span class = \"topic\">" .$row['person'] . " : " . "</span></a>" . 
	"<span class = \"comment\">"     .  
	$row['comment'] . "</span>"     .   "<span class = \"topic\">".   " (" . $row['rank']. ")". 
	
	"</span>";
	
		
		 
	 ?> <a href="javascript:void(0)" onClick='increaseScore("<?php echo $row['id']; ?>"   ,   "<?php echo $row['person']; ?> "  )'> <img src="up.jpg" width="20" height="26" /> </a>  <?php  
	 
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
	$row['comment'] . "</span>"     .    "<span class = \"topic\">".   " (" . $row['rank']. ")". 
	
	"</span>";
	
		
		 
	 ?> <a href="javascript:void(0)" onClick='increaseScore("<?php echo $row['id']; ?>"   ,   "<?php echo $row['person']; ?> "  )'> <img src="up.jpg" width="20" height="26" /> </a>  <?php  
	 
	
	echo "<br />";
echo "<br />";
	}

?>
</body>
