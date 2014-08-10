<head>
<link rel="stylesheet" href="http://www.dirtpage.com/x/styles.css" type="text/css">
</head>

<?php 

$topic = trim($_GET['topic']);
$newMessage = $_GET['newmessage'];
$messageNumber = $_GET['messagenumber'];
 
mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());
include_once('../phpfunctions.php');


 
//	   
//MAIN QUERY
//
 
 


$query = "SELECT * FROM messages WHERE topic = '$topic' ORDER BY score DESC"; 
$result = mysql_query($query) or die(mysql_error()); 
$num_rows = mysql_num_rows($result);




echo "<br><a href = \"http://www.dirtpage.com/x/page.php?topic=". $topic . "&mode=message\"> <span class=\"smallblack\"><u>messages</u></span></a><span class=\"smallblack\">  ($num_rows total)</span>";


  $i = 0;
$query = "SELECT * FROM messages WHERE topic = '$topic' ORDER BY score DESC limit 25"; 
$result = mysql_query($query) or die(mysql_error()); 
 while($row = mysql_fetch_array($result)){ $i++;
echo  "<div class = \"message_b\" name = \"". $row['message_id']."\"><span class = \"message\"  name = \"hello\">$i. &nbsp;" . hyper($row['message']) . "</span><br>" ;

//$m = $row['message_id'];
//$query2 = "SELECT * FROM responses WHERE message_id = '$m' ORDER BY score DESC limit 1"; 
//$result2 = mysql_query($query2) or die(mysql_error()); 
//while($row2 = mysql_fetch_array($result2))
//{echo  "<span class = \"m\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-" . hyper($row2['response']) . "</span>";}

?>
</div><?php }
echo "<br>";


?><script type="text/javascript" src="http://www.dirtpage.com/jsfunctions.js"></script>



<script type="text/javascript">

//TEMP$('.messagex').hover(function(){ $('.manip').toggle();  }); 
//TEMP$('.manip').hide();
//TEMP$('li', '#output').hover(function(){ $('li').css("border", "0px solid white");  $('.manip').hide(); $(this).css("border-top", "3px dotted green"); $(this).css("border-right", "3px dotted green");    $(this).find('.manip').show();  }); 

  
   

// set posting

$('#post_message').submit(function() { 

$.get("http://www.dirtpage.com/x/datacalls.php", {topic: <?php echo "\"$topic\"" ?>, newmessage: document.post_message.newmessage.value, act: "postmessage"}, function() {
$.get("http://www.dirtpage.com/x/divfillers/messages_preview.php", { topic: <?php echo "\"$topic\"" ?>}, function(data) {
  $('#messages_preview').html(data);});
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
  

  $('.message_b').click(function() {$(location).attr('href','http://www.dirtpage.com/x/page.php?topic=<?php echo $topic ?>&mode=message&message='+ this.getAttribute("name"));
});

  
// TEMP DISABLE set 'search' button
  
//$('#output .search').mouseenter(function(){ 
//$.get("http://www.dirtpage.com/minisearchfiller.php", {topic: $(this).attr('name')},  function(data) {
//$('.results').html(data);	  }     ); 
//$('.results').fadeIn("slow");
//});

  
</script>