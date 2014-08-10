<head>
<link rel="stylesheet" href="http://www.dirtpage.com/styles.css" type="text/css">
</head>

<?php

$topic = trim($_GET['topic']);
$newMessage = $_GET['newmessage'];
$messageNumber = $_GET['messagenumber'];
 
mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());
include_once('../phpfunctions.php');


 
// title

echo "<span class=\"pinktitle\">dirtpage : <A HREF=\"page.php?topic=" . str_replace(" ", "+", $topic) . "\"><span class=\"pinktitle\">" . strtolower($topic) . "</span></a> : messages</span>"; 


// posting

?><form name="post_message"id="post_message" onSubmit="return false;"><br />
</h1><span id="post"><input type="text" name="newmessage" size="28" value="" maxlength="125" autocomplete="off"></span>
<input type="hidden" name="topic" value= <?php echo "\"$topic\"" ?>>
<input type="hidden" name="act" value="postmessage">
<input id="button" type="submit" value="post new message">
   </form> <br /></br><?php
   
   
// set thumbs 
 
$query = "SELECT * FROM messages WHERE topic = '$topic' ORDER BY score DESC"; 
$result = mysql_query($query) or die(mysql_error()); 
 while($row = mysql_fetch_array($result))
{
if( $odd = $row['score']%2 ) {$pic1 = "http://www.dirtpage.com/thumbgray.jpg"; $class1 = "up"; $pic2 = "http://www.dirtpage.com/thumbdowngray.jpg"; $class2 = "down";}
else {$pic2 = "http://www.dirtpage.com/thumbgray.jpg"; $class2 = "up"; $pic1 = "http://www.dirtpage.com/thumbdowngray.jpg"; $class1 = "down";   }








echo "<div style=\"border: 1px green dashed\";><table ><tr>";

echo "<td valign = \"top\" width = \"600\">";
echo "<span class = \"bigblue\">" . hyper($row['message']) . "</span>";
$query2 = "SELECT * FROM responses WHERE message_id = '$message' ORDER BY score DESC"; 
$result2 = mysql_query($query2) or die(mysql_error()); 
$num_rows = mysql_num_rows($result2);
//echo "<br> <span class = \"tinypink\"> <br>responses ($num_rows) </span>";


$m = $row['message_id'];
$query2 = "SELECT * FROM responses WHERE message_id = '$m' ORDER BY score DESC limit 1"; 
$result2 = mysql_query($query2) or die(mysql_error()); 
while($row2 = mysql_fetch_array($result2))
{echo  "<br><span class = \"smallwhite\"><br>-" . hyper($row2['response']) . "</span><br>";}


echo "</td>";




//echo "<td width = \"400\">";
//$m = $row['message_id'];
//$query2 = "SELECT * FROM responses WHERE message_id = '$m' ORDER BY score DESC limit 3"; 
//$result2 = mysql_query($query2) or die(mysql_error()); 
//while($row2 = mysql_fetch_array($result2))
//{echo  "<span class = \"tinywhite\">" . hyper($row2['response']) . "</span><br><br>";}
//echo "</td>";



echo "<td valign = \"top\" width = \"100\">";
echo "<span class = \"t\">".  " (" . $row['score']. ") </span>&nbsp; ";
echo "<a href=\"javascript:void(0)\"> <img class =  \"$class1\" name =\"" . $row['message_id']. "\"  src=\"$pic1\" border = \"0\"/> </a>";
echo "<a href=\"javascript:void(0)\"> <img class = \"$class2\" name = \"" . $row['message_id']. "\" src=\"$pic2\"  border = \"0\"/></a><span class =\"del\" name=\"" . $row['message_id']. "\"></span>";
echo "<br><br>";
echo "</td>";



echo "</tr></table></div><br>";



 
 }
?>





















<script type="text/javascript" src="http://www.dirtpage.com/jsfunctions.js"></script>



<script type="text/javascript">

//TEMP$('.messagex').hover(function(){ $('.manip').toggle();  }); 
//TEMP$('.manip').hide();
//TEMP$('li', '#output').hover(function(){ $('li').css("border", "0px solid white");  $('.manip').hide(); $(this).css("border-top", "3px dotted green"); $(this).css("border-right", "3px dotted green");    $(this).find('.manip').show();  }); 

  
   

// set posting

$('#post_message').submit(function() { 

$.get("http://www.dirtpage.com/x/datacalls.php", {topic: <?php echo "\"$topic\"" ?>, newmessage: document.post_message.newmessage.value, act: "postmessage"}, function() {
$.get("http://www.dirtpage.com/x/divfillers/messages.php", {topic: <?php echo "\"$topic\"" ?>, mode:"messages"}, function(data) {
  $('#messages').html(data);});
});
 });
 
 
 // set voting


$('.up').click(function() {
$.get("http://www.dirtpage.com/x/datacalls.php", {messagenumber: this.name, act: "message_up", topic: <?php echo "\"$topic\"" ?>}, function() {
$.get("http://www.dirtpage.com/x/divfillers/messages_preview.php", { topic: <?php echo "\"$topic\"" ?>}, function(data) {
$('#messages_preview').html(data);}); });
});



$('.down').click(function() {
$.get("http://www.dirtpage.com/x/datacalls.php", {messagenumber: this.name, act: "message_down", topic: <?php echo "\"$topic\"" ?>}, function() {
$.get("http://www.dirtpage.com/x/divfillers/messages_preview.php", { topic: <?php echo "\"$topic\"" ?>}, function(data) {
$('#messages_preview').html(data);}); });
});


  
  
// set delete
$('.del').click(function(){    $j = $(this).attr("name");   if ("<?php echo $_SESSION['admin']?>" == "yes") {
$.get("http://www.dirtpage.com/datacalls", {topic: <?php echo "\"$topic\"" ?>, messagenumber: $j, act: "deletemessage"}, function() {
$.get("http://www.dirtpage.com/divfiller.php", { topic: <?php echo "\"$topic\"" ?>}, function(data) {
$('#output').html(data);});} 
);} 
else{alert("you don't have administrator access.. idiot")} }); 
  

  $('.message_b').click(function() {alert(this.name);$(location).attr('href','http://www.dirtpage.com/x/page.php?topic=<?php echo $topic ?>&mode=message&message='+ this.name);
});

  
// TEMP DISABLE set 'search' button
  
//$('#output .search').mouseenter(function(){ 
//$.get("http://www.dirtpage.com/minisearchfiller.php", {topic: $(this).attr('name')},  function(data) {
//$('.results').html(data);	  }     ); 
//$('.results').fadeIn("slow");
//});

  
</script>