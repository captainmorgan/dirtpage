


<?php



$theirName = $_GET['t'];
$comment = $_GET['c'];


mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());


mysql_select_db("dirtpage1") or die(mysql_error());



if($comment ==""){}
else if ($comment =="take 10 seconds to think"){}
else{
mysql_query("INSERT INTO people
(person, comment) VALUES('$theirName', '$comment') ") 
or die(mysql_error());  }


echo "  <h3> \"$theirName\"      </h3>  ";

?>






<form name="form2" onsubmit="return false;">

      <input type="text" name="theirComment" size="28" value="" maxlength="125" onKeyDown= "if(enter_pressed(event)){ throwDirt(document.form1.theirName.value, document.form2.theirComment.value) }">
  
    <A HREF="javascript:void(0)" onClick= "throwDirt(document.form1.theirName.value, document.form2.theirComment.value)">
POST</A>
</form>
        
        
    
<?php

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());


mysql_select_db("dirtpage1") or die(mysql_error());


     


$query = "SELECT * FROM people
WHERE person = '$theirName'
ORDER BY rank DESC"; 
	 
$result = mysql_query($query) or die(mysql_error());

 


while($row = mysql_fetch_array($result)){
	
	
$combo = $row['person'] . " : " . $row['comment'];
$id = $row['id'];	
	
	  

	?>  
	 
<A HREF="javascript:void(0)" onClick='viewSubs("<?php echo $id; ?> ")'> 
	 
	
	
	<?php
	
echo "<span class = \"topic\">" .$row['person'] . " : " . "</span></a>" . 
	"<span class = \"comment\">"     .  
	$row['comment']. "</span>"   .   "<span class = \"topic\">".   " (" . $row['rank']. ")". 
	
	"</span>";
	
		
		 
	 ?> <a href="javascript:void(0)" onClick='increaseScore("<?php echo $row['id']; ?>"   ,   "<?php echo $row['person']; ?> "  )'> <img src="up.jpg" width="20" height="26" /> </a>  <?php  
	 
	
	 
	 
	 
	 
	echo "<br />";
echo "<br />";
}



?>






