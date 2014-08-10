<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/resources/phpfunctions.php'; 
$picture = $_GET['picture'];
mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());


$topic = trim($_GET['topic']);
$newMessage = $_GET['newmessage'];
$act = $_GET['act'];
$change = $_GET['change'];
$messageNumber = $_GET['messagenumber'];

echo "<table cellspacing=\"5\"><tr><td>";
echo "<A HREF=\"page.php?topic=" . str_replace(" ", "+", $topic). "\"><img src=\"http://www.dirtpage.com/graphics/left.png\"></a></td>";
  
echo "<td><span class=\"pinktitle\">" . strtolower($topic) . "</span></td></tr></table>";



// echo "<span class=\"pinktitle\"></span></a><br>picture &nbsp;&nbsp;: <A HREF=\"page.php?topic=" . str_replace(" ", "+", $topic) . "&mode=picture\"><span class=\"pinktitle\"> $picture </span><br><br>"; 







//QUERY

$query = "SELECT * FROM pictures WHERE picture = '$picture' ORDER BY score ASC"; 
$result = mysql_query($query) or die(mysql_error()); 
while($row = mysql_fetch_array($result)){
echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src=\"../pictures/" . $row['picture'] . "\" height=\"400\"> ";  


?>



<br /><br />
<form name="post"id="post_caption" onSubmit="return false;"><br />
</h1><span id="post">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="new_caption" size="65" value="" maxlength="125" autocomplete="off"></span>
<input id="button" type="submit" value="post new caption">
</form> 
<?php

  
$query = "SELECT * FROM captions WHERE picture = '$picture' ORDER BY score DESC"; 
$result = mysql_query($query) or die(mysql_error()); 



$i = 0;
while($row = mysql_fetch_array($result)){$i++;
echo "<span class=\"smallyellow\">$i.&nbsp;&nbsp;</span>";
echo  "<span class = \"message\">" . hyper($row['caption']) . "</span>"   .  "<span class = \"t\">".  " (" . $row['score']. ") </span>&nbsp; ";
if( $odd = $row['score']%2 ) {$pic1 = "http://www.dirtpage.com/graphics/up.png"; $class1 = "up"; $pic2 = "http://www.dirtpage.com/graphics/down.png"; $class2 = "down";}
else {$pic2 = "http://www.dirtpage.com/graphics/up.png"; $class2 = "up"; $pic1 = "http://www.dirtpage.com/graphics/down.png"; $class1 = "down";   }?>
<a href="javascript:void(0)"> <img class = <?php echo $class1 ?> name ="<?php echo $row['caption_id']; ?>"  src="<?php echo $pic1 ?>" border = "0"/> </a>
<a href="javascript:void(0)"> <img class = <?php echo $class2 ?> name ="<?php echo $row['caption_id']; ?>" src="<?php echo $pic2 ?>"  border = "0"/> </a><span class ="del" name="<?php echo $row['id']?>"></span>
 <br><br>
 <?php }
  }
  ?>
 
 
 
 
 
 
 
 
 
 
 



<script type="text/javascript" src="http://www.dirtpage.com/resources/jsfunctions.js"></script>



<script type="text/javascript">


// set posting

$('#post_caption').submit(function() { 
$.get("http://www.dirtpage.com/resources/datacalls.php", {topic: <?php echo "\"$topic\"" ?>, picture: <?php echo "\"$picture\"" ?>, new_caption: document.post.new_caption.value, act: "post_caption"}, function()
{
$.get("http://www.dirtpage.com/divfillers/picture.php", {topic: <?php echo "\"$topic\"" ?>, picture: <?php echo "\"$picture\"" ?>}, function(data) {
$('#holder').html(data);});
})});
 
 
 // set voting




$('.up').click(function() {
$.get("http://www.dirtpage.com/resources/datacalls.php", {caption_id: this.name, act: "caption_up", picture: <?php echo "\"$picture\"" ?>}, function() {
$.get("http://www.dirtpage.com/divfillers/picture.php", {topic: <?php echo "\"$topic\"" ?>,picture: <?php echo "\"$picture\"" ?>}, function(data) {
$('#holder').html(data);}); });
});




$('.down').click(function() {
$.get("http://www.dirtpage.com/resources/datacalls.php", {caption_id: this.name, act: "caption_down", picture: <?php echo "\"$picture\"" ?>}, function() {
$.get("http://www.dirtpage.com/divfillers/picture.php", {topic: <?php echo "\"$topic\"" ?>,picture: <?php echo "\"$picture\"" ?>}, function(data) {
$('#holder').html(data);}); });
});


  
// set delete
$('.del').click(function(){    $j = $(this).attr("name");   if ("<?php echo $_SESSION['admin']?>" == "yes") {
$.get("http://www.dirtpage.com/datacalls", {topic: <?php echo "\"$theirName\"" ?>, messagenumber: $j, act: "deletemessage"}, function() {
$.get("http://www.dirtpage.com/captiondivfiller.php", { topic: <?php echo "\"$theirName\"" ?>}, function(data) {
$('#output').html(data);});} 
);} 
else{alert("you don't have administrator access.. idiot")} }); 
  

  

  
// TEMP DISABLE set 'search' button
  
//$('#output .search').mouseenter(function(){ 
//$.get("http://www.dirtpage.com/minisearchfiller.php", {topic: $(this).attr('name')},  function(data) {
//$('.results').html(data);	  }     ); 
//$('.results').fadeIn("slow");
//});

  
</script>