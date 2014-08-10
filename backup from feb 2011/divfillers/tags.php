
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/resources/phpfunctions.php'; 
$picture = $_GET['picture'];
$topic = $_GET['topic'];
$message_id = $_GET['message'];
$tag = $_GET['tag_id'];
  mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());

 


echo "<table cellspacing=\"5\"><tr><td>";
echo "<A HREF=\"page.php?topic=" . str_replace(" ", "+", $topic). "\"><img src=\"graphics/left.png\"></a></td>";
  
echo "<td><span class=\"pinktitle\">" . strtolower($topic) . "</span></td></tr></table>";

echo "<br><div class=\"hugered\"  > tags </div>"; 


 
?>
 
<form  name="post_tag"id="post_tag" onSubmit="return false;"><br />
<input type="hidden" name="topic" value= <?php echo "\"$topic\"" ?>>
<input type="hidden" name="act" value="post_tag">
 
 <input type="text" name="new_tag" size="30" value="" maxlength="15" autocomplete="off"> 
 <input id="button" type="submit" value="post tag"> 
</form>

<?php



  
$query = "SELECT * FROM tags WHERE topic = '$topic' ORDER BY score DESC"; 
$result = mysql_query($query) or die(mysql_error());
$i=0; 
 while($row = mysql_fetch_array($result)){$i++;
 echo "<span class=\"smallyellow\">$i.&nbsp;&nbsp;</span>";
echo  "<span class = \"message\">" . ($row['tag']) . "</span>"   .  "<span class = \"t\">".  " (" . $row['score']. ") </span>&nbsp; ";
if( $odd = $row['score']%2 ) {$pic1 = "http://www.dirtpage.com/graphics/up.png"; $class1 = "up"; $pic2 = "http://www.dirtpage.com/graphics/down.png"; $class2 = "down";}
else {$pic2 = "http://www.dirtpage.com/graphics/up.png"; $class2 = "up"; $pic1 = "http://www.dirtpage.com/graphics/down.png"; $class1 = "down";   }?>
<a href="javascript:void(0)"> <img class = <?php echo $class1 ?> name ="<?php echo $row['tag_id']; ?>"  src="<?php echo $pic1 ?>" border = "0"/> </a>
<a href="javascript:void(0)"> <img class = <?php echo $class2 ?> name ="<?php echo $row['tag_id']; ?>" src="<?php echo $pic2 ?>"  border = "0"/> </a> 
 <br><br> 
 <?php } 
 
 
 
 ?>
 
 

 

<script type="text/javascript" src="http://www.dirtpage.com/resources/jsfunctions.js"></script>



<script type="text/javascript">


// set posting

 
 // set voting
$('#post_tag').submit(function() { 
$.get("http://www.dirtpage.com/resources/datacalls.php", {topic: <?php echo "\"$topic\"" ?>, new_tag: document.post_tag.new_tag.value, act: "post_tag"}, function() {
$.get("http://www.dirtpage.com/divfillers/tags.php", { topic: <?php echo "\"$topic\"" ?>}, function(data) {
  $('#holder').html(data);}); }); });


$('.up').click(function() {
$.get("http://www.dirtpage.com/resources/datacalls.php", {tag_id: this.name, act: "tag_up"}, function() {
$.get("http://www.dirtpage.com/divfillers/tags.php", {topic: <?php echo "\"$topic\"" ?>, message: <?php echo "\"$message_id\"" ?>}, function(data) {
$('#holder').html(data);}); });
});



$('.down').click(function() {
$.get("http://www.dirtpage.com/resources/datacalls.php", {tag_id: this.name, act: "tag_down"}, function() {
$.get("http://www.dirtpage.com/divfillers/tags.php", {topic: <?php echo "\"$topic\"" ?>, message: <?php echo "\"$message_id\"" ?>}, function(data) {
$('#holder').html(data);}); });
});

  
</script>