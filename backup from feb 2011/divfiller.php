<?php include("phpfunctions.php"); ?><head>
<link rel="stylesheet" href="http://www.dirtpage.com/styles.css" type="text/css">
</head>

<?php

$theirName = trim($_GET['topic']);
$newMessage = $_GET['newmessage'];
$act = $_GET['act'];
$change = $_GET['change'];
$messageNumber = $_GET['messagenumber'];

//	   
//MAIN QUERY
//


echo "<A HREF=\"http://www.dirtpage.com/results/" . str_replace(" ", "+", $theirName) . "\"><span class=\"pinktitle\">page: " . strtolower($theirName) . "</span></a>";?> 

<br>
<?php echo "<span name = \"$theirName\" class = \"search\"><A HREF=\"http://www.dirtpage.com/results/" . str_replace(" ", "+", $theirName) . "\">search</a></span></span><br><br>";

?><form name="post"id="test" onSubmit="return false;"><br />
</h1><span id="post">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="newmessage" size="28" value="" maxlength="125" autocomplete="off"></span>
<input type="hidden" name="topic" value= <?php echo "\"$theirName\"" ?>>
<input type="hidden" name="act" value="postmessage">
<input id="button" type="submit" value="add new item">
   </form> <?php


$query = "SELECT * FROM people WHERE person = '$theirName' ORDER BY rank DESC"; 
$result = mysql_query($query) or die(mysql_error()); 
echo"<ol>"; while($row = mysql_fetch_array($result)){
echo  "<li><span class = \"message\">" . hyper($row['comment']) . "</span>"   .  "<span class = \"t\">".  " (" . $row['rank']. ") </span>&nbsp; ";
if( $odd = $row['rank']%2 ) {$pic1 = "http://www.dirtpage.com/thumbgray.jpg"; $class1 = "up"; $pic2 = "http://www.dirtpage.com/thumbdowngray.jpg"; $class2 = "down";}
else {$pic2 = "http://www.dirtpage.com/thumbgray.jpg"; $class2 = "up"; $pic1 = "http://www.dirtpage.com/thumbdowngray.jpg"; $class1 = "down";   }?>
<a href="javascript:void(0)"> <img class = <?php echo $class1 ?> name ="<?php echo $row['id']; ?>"  src="<?php echo $pic1 ?>" border = "0"/> </a>
<a href="javascript:void(0)"> <img class = <?php echo $class2 ?> name ="<?php echo $row['id']; ?>" src="<?php echo $pic2 ?>"  border = "0"/> </a><span class ="del" name="<?php echo $row['id']?>"><span class = "manip"> x &nbsp;</span></span>
 <br><br></li>
 <?php } echo "</ol>"?>



<script type="text/javascript" src="http://www.dirtpage.com/jsfunctions.js"></script>



<script type="text/javascript">

//TEMP$('.messagex').hover(function(){ $('.manip').toggle();  }); 
//TEMP$('.manip').hide();
//TEMP$('li', '#output').hover(function(){ $('li').css("border", "0px solid white");  $('.manip').hide(); $(this).css("border-top", "3px dotted green"); $(this).css("border-right", "3px dotted green");    $(this).find('.manip').show();  }); 




// set posting

$('#test').submit(function() {
$.get("http://www.dirtpage.com/datacalls.php", { topic: <?php echo "\"$theirName\"" ?>, newmessage: document.post.newmessage.value, act: "postmessage"}, function() {
$.get("http://www.dirtpage.com/divfiller.php", { topic: <?php echo "\"$theirName\"" ?>}, function(data) {
  $('#output').html(data);});
});
 });
 
 
 // set voting


$('.up').click(function() {
$.get("http://www.dirtpage.com/datacalls.php", {messagenumber: this.name, change: "up", topic: <?php echo "\"$theirName\"" ?>}, function() {
$.get("http://www.dirtpage.com/divfiller.php", { topic: <?php echo "\"$theirName\"" ?>}, function(data) {
$('#output').html(data);}); });
});

$('.down').click(function() {
$.get("http://www.dirtpage.com/datacalls.php", {messagenumber: this.name, change: "down", topic: <?php echo "\"$theirName\"" ?>}, function() {
$.get("http://www.dirtpage.com/divfiller.php", { topic: <?php echo "\"$theirName\"" ?>}, function(data) {
$('#output').html(data);}); });
});
  
  
// set delete
$('.del').click(function(){    $j = $(this).attr("name");   if ("<?php echo $_SESSION['admin']?>" == "yes") {
$.get("http://www.dirtpage.com/datacalls", {topic: <?php echo "\"$theirName\"" ?>, messagenumber: $j, act: "deletemessage"}, function() {
$.get("http://www.dirtpage.com/divfiller.php", { topic: <?php echo "\"$theirName\"" ?>}, function(data) {
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