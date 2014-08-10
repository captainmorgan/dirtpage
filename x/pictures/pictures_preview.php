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
  

echo "<span class=\"garbage\">pictures</span>"; ?>

 

<form enctype="multipart/form-data" action="http://www.dirtpage.com/x/upload.php" method="post">
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
   <input name="uploaded_file" type="file" value="add new pic"  />
    <input type="submit" value="add new pic" />
    <input type="hidden" name="topic" value= <?php echo "\"$topic\"" ?>>
    </form> 



 



 <?php

$query = "SELECT * FROM pictures WHERE topic = '$topic' ORDER BY score DESC"; 
$result = mysql_query($query) or die(mysql_error()); 
echo"<ol>"; while($row = mysql_fetch_array($result)){
echo  "<li>";
?>

<A HREF="http://www.dirtpage.com/pages.php?topic=<?php echo str_replace(" ", "+", trim($row['pic'])); ?>&m=p">
<img src="/picturess/<?php echo $row['picture']; ?>" height="150"></a>


   
  
  <?php




echo "<span class = \"t\">".  " (" . $row['score']. ") </span>&nbsp; ";
if( $odd = $row['rank']%2 ) {$pic1 = "http://www.dirtpage.com/thumbgray.jpg"; $class1 = "up"; $pic2 = "http://www.dirtpage.com/thumbdowngray.jpg"; $class2 = "down";}
else {$pic2 = "http://www.dirtpage.com/thumbgray.jpg"; $class2 = "up"; $pic1 = "http://www.dirtpage.com/thumbdowngray.jpg"; $class1 = "down";   }?>
<a href="javascript:void(0)"> <img class = <?php echo $class1 ?> name ="<?php echo $row['id']; ?>"  src="<?php echo $pic1 ?>" border = "0"/> </a>
<a href="javascript:void(0)"> <img class = <?php echo $class2 ?> name ="<?php echo $row['id']; ?>" src="<?php echo $pic2 ?>"  border = "0"/> </a><span class ="del" name="<?php echo $row['id']?>"><span class = "manip"> x &nbsp;</span></span>
 <br>
</li>
 <?php   $p = $row['pic'];
  
$query2 = "SELECT * FROM captions WHERE pic = '$p' ORDER BY rank DESC limit 1"; 
$result2 = mysql_query($query2) or die(mysql_error()); 
while($row2 = mysql_fetch_array($result2))
{echo  "<span class = \"m\">" . hyper($row2['caption']) . "</span><br><br>";}

} echo "</ol>"?>









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