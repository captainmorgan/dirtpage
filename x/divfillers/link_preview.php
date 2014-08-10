<head>
<link rel="stylesheet" href="http://www.dirtpage.com/x/styles.css" type="text/css">
</head>

<?php

$topic = trim($_GET['topic']);
$newMessage = $_GET['newmessage'];
$act = $_GET['act'];
$change = $_GET['change'];
$messageNumber = $_GET['messagenumber'];
 
 mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());
include_once('../phpfunctions.php');

//	   
//MAIN QUERY
//
 

echo "<span class=\"garbage\">external link [edit]</span>";

?><input type="button" value ="try me!"><?php
 
?><form name="post_see_also"id="post_see_also" onSubmit="return false;"><br />
</h1><span id="post">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="newmessage" size="28" value="" maxlength="125" autocomplete="off"></span>
<input type="hidden" name="topic" value= <?php echo "\"$topic\"" ?>>
<input type="hidden" name="act" value="postmessage">
<input id="button" type="submit" value="add new recommendation">
   </form> 

  
  
   
   
  
  <?php
  
$query = "SELECT * FROM see_also WHERE topic = '$topic' ORDER BY score DESC"; 
$result = mysql_query($query) or die(mysql_error()); 
echo"<ol>"; while($row = mysql_fetch_array($result)){
echo  "<li>";  ?><A HREF="../../x/page?topic=<?php echo str_replace(" ", "+", $row['see_also']); ?>"><?php           echo "<span class = \"topic\">" . ($row['see_also']) . "</span></a>"   .  "<span class = \"t\">".  " (" . $row['score']. ") </span>&nbsp; ";
if( $odd = $row['score']%2 ) {$pic1 = "http://www.dirtpage.com/thumbgray.jpg"; $class1 = "up"; $pic2 = "http://www.dirtpage.com/thumbdowngray.jpg"; $class2 = "down";}
else {$pic2 = "http://www.dirtpage.com/thumbgray.jpg"; $class2 = "up"; $pic1 = "http://www.dirtpage.com/thumbdowngray.jpg"; $class1 = "down";   }?>
<a href="javascript:void(0)"> <img class = <?php echo $class1 ?> name ="<?php echo $row['see_also_id']; ?>"  src="<?php echo $pic1 ?>" border = "0"/> </a>
<a href="javascript:void(0)"> <img class = <?php echo $class2 ?> name ="<?php echo $row['see_also_id']; ?>" src="<?php echo $pic2 ?>"  border = "0"/> </a><span class ="del" name="<?php echo $row['message_id']?>"><span class = "manip"> x &nbsp;</span></span>
 <br><br></li>
 <?php } echo "</ol>"?>








<script type="text/javascript" src="http://www.dirtpage.com/jsfunctions.js"></script>



<script type="text/javascript">

//TEMP$('.messagex').hover(function(){ $('.manip').toggle();  }); 
//TEMP$('.manip').hide();
//TEMP$('li', '#output').hover(function(){ $('li').css("border", "0px solid white");  $('.manip').hide(); $(this).css("border-top", "3px dotted green"); $(this).css("border-right", "3px dotted green");    $(this).find('.manip').show();  }); 




// set posting

$('#post_see_also').submit(function() {
$.get("http://www.dirtpage.com/x/datacalls.php", {topic: <?php echo "\"$topic\"" ?>, newmessage: document.post_see_also.newmessage.value, act: "post_see_also"}, function() {
$.get("http://www.dirtpage.com/x/divfillers/see_also_preview", { topic: <?php echo "\"$topic\"" ?>}, function(data) {
  $('#see_also_preview').html(data);});
});
 });
 
 // set voting


$('.up').click(function() {
$.get("http://www.dirtpage.com/x/datacalls.php", {messagenumber: this.name, act: "see_also_up", topic: <?php echo "\"$topic\"" ?>}, function() {
$.get("http://www.dirtpage.com/x/divfillers/see_also_preview.php", { topic: <?php echo "\"$topic\"" ?>}, function(data) {
$('#see_also_preview').html(data);}); });
});


$('.down').click(function() {
$.get("http://www.dirtpage.com/x/datacalls.php", {messagenumber: this.name, act: "see_also_down", topic: <?php echo "\"$topic\"" ?>}, function() {
$.get("http://www.dirtpage.com/x/divfillers/see_also_preview.php", { topic: <?php echo "\"$topic\"" ?>}, function(data) {
$('#see_also_preview').html(data);}); });
});

  
  
// set delete
$('.del').click(function(){    $j = $(this).attr("name");   if ("<?php echo $_SESSION['admin']?>" == "yes") {
$.get("http://www.dirtpage.com/datacalls", {topic: <?php echo "\"$topic\"" ?>, messagenumber: $j, act: "deletemessage"}, function() {
$.get("http://www.dirtpage.com/divfiller.php", { topic: <?php echo "\"$topic\"" ?>}, function(data) {
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