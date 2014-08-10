

<body>
<?php

$id = $_GET['i'];






echo "<br>  <i> <h3>" . $id . " : " . $id. " </i>   </h3>  ";

?>






<form name="form2">

      <input type="text" name="theirComment" size="28" value="" maxlength="125">
  
    <A HREF="javascript:void(0)" onClick="throwDirt(document.form1.theirName.value, document.form2.theirComment.value)">
post new sub-comment</A>
</form>
        
        
    
<?php

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());


mysql_select_db("dirtpage1") or die(mysql_error());







$query = "SELECT DISTINCT person FROM people
WHERE person LIKE '%$theirName%'
order by length(person) asc"; 
	 
$result = mysql_query($query) or die(mysql_error());

 


while($row = mysql_fetch_array($result)){
	
	
	

	?>   
 <A HREF="javascript:void(0)" onClick='searchExact("<?php echo $row['person']; ?> ")'> 
	
	<?php
	
echo "<span class = \"topic\">" .$row['person'] . " : " . "</span></a>" . 
	"<span class = \"comment\">"     .  
	$row['comment']. "</span>";	
	
	
	echo "<br />";
echo "<br />";
		



}


	

?>
</body>