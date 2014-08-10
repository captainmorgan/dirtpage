<head>
<link rel="stylesheet" href="http://www.dirtpage.com/styles.css" type="text/css">
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
  





$i=0;
$query = "SELECT * FROM pictures WHERE topic = '$topic' ORDER BY score DESC"; 
$result = mysql_query($query) or die(mysql_error()); 
$num_rows = mysql_num_rows($result);

echo "<a href = \"http://www.dirtpage.com/x/page.php?topic=". $topic . "&mode=picture\"> <span class=\"smallblack\"><u>pictures</u> ($num_rows total)</span></a>  <br><br>";
$query = "SELECT * FROM pictures WHERE topic = '$topic' ORDER BY score DESC limit 9"; 
$result = mysql_query($query) or die(mysql_error()); 

echo "<table cellpadding = \"10\"><tr valign = \"bottom\" >";
while($row = mysql_fetch_array($result)){$i++;


echo "<td max-width = 300>";



?>



<A HREF="http://www.dirtpage.com/x/page.php?topic=<?php echo $topic; ?>&mode=picture&picture=<?php echo $row['picture']; ?>">
<img src="../../../../x/pictures/<?php echo $row['picture']; ?>" width="200"> </a>

 <?php
 

echo "</td>";

if ($i == 3) {echo "</tr><tr valign = \"bottom\">";};

if ($i == 6) {echo "</tr><tr valign = \"bottom\">";};
} 
echo "</tr></table>";
if($i > 0){echo "<br><br>";}
  
?>



<script type="text/javascript" src="http://www.dirtpage.com/jsfunctions.js"></script>



<script type="text/javascript">

//TEMP$('.messagex').hover(function(){ $('.manip').toggle();  }); 
//TEMP$('.manip').hide();
//TEMP$('li', '#output').hover(function(){ $('li').css("border", "0px solid white");  $('.manip').hide(); $(this).css("border-top", "3px dotted green"); $(this).css("border-right", "3px dotted green");    $(this).find('.manip').show();  }); 




// set posting

$('#post_pic').submit(function() {
$.get("http://www.dirtpage.com/x/datacalls.php", {topic: <?php echo "\"$topic\"" ?>, newmessage: document.post.newmessage.value, act: "postmessage"}, function() {
$.get("http://www.dirtpage.com/x/divfillers/messages_preview", { topic: <?php echo "\"$topic\"" ?>}, function(data) {
  $('#output').html(data);});
});
 });
 
 
 // set voting


$('.up').click(function() {
$.get("http://www.dirtpage.com/datacalls.php", {messagenumber: this.name, act: "picture_up", topic: <?php echo "\"$topic\"" ?>}, function() {
$.get("http://www.dirtpage.com/divfiller.php", { topic: <?php echo "\"$topic\"" ?>}, function(data) {
$('#output').html(data);}); });
});

$('.down').click(function() {
$.get("http://www.dirtpage.com/datacalls.php", {messagenumber: this.name, act: "picture_down", topic: <?php echo "\"$topic\"" ?>}, function() {
$.get("http://www.dirtpage.com/divfiller.php", { topic: <?php echo "\"$topic\"" ?>}, function(data) {
$('#output').html(data);}); });
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