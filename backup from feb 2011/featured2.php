<script type="text/javascript">
var feature = "ugliest celebrity";




function pause () {
	clearTimeout(q);
document.form2.theirComment.value = "take 10 seconds to think";
document.form2.theirComment.disabled = true;
var q = setTimeout("document.form2.disabled = true;", 10000);  }

</script>


<?php






mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());


mysql_select_db("dirtpage1") or die(mysql_error());



echo "<br>  <h3> featured topic: <i> ugliest celebrity   </i>   </h3>  ";

?>




<form name="form2" onsubmit="return false;">

      <input type="text" name="theirComment" size="28" value="" maxlength="125" onKeyDown= "if(enter_pressed(event)){ throwDirt(document.form1.theirName.value, document.form2.theirComment.value) }">
  

    <A HREF="javascript:void(0)" onClick="throwDirt("ugliest celebrity", document.form2.theirComment.value)">
post new comment on <span style="color: aqua"> <b><i> <?php echo "ugliest celebrity" ?> </i></b>  </span></A>
</form>

     
        
    
<?php



$query = "SELECT * FROM people WHERE person = 'ugliest celebrity' ORDER BY id DESC LIMIT 500"; 


	 
$result = mysql_query($query) or die(mysql_error());


while($row = mysql_fetch_array($result)){
	

	
	
	echo "<span class = \"topic\">" .$row['person'] . " : " . "</span></a>" . 
	"<span class = \"comment\">"     .  
	$row['comment']. "</span>";
	
echo "<br /><br>";
}



?>

