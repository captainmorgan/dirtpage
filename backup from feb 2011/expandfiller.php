<head>
<link rel="stylesheet" href="http://www.dirtpage.com/styles.css" type="text/css">
</head>

<?php

$theirName = $_GET['topic'];
$change = $_GET['change'];
$messageNumber = $_GET['messagenumber'];

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());
include("functions.php"); 

 
//	   
//MAIN QUERY
//


echo "<div class = \"extra\">";
echo "<div class = \"options\">"  ?>
<A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $theirName); ?>"><?php             echo "<span class = \"goto\">main page  - </a></span>";
 ?><A HREF="http://www.dirtpage.com/results/<?php echo str_replace(" ", "+", $theirName); ?>"><?php       
 echo "<span name = \"$theirName\" class = \"search\">search</span></a><br></div>";

echo"<ol>";
$query = "SELECT * FROM people
WHERE person = '$theirName'
ORDER BY rank DESC limit 3"; 
	 
$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){
	

	
	 
	
echo  "<br><span class = \"message\"><li>" . hyper($row['comment']) . "</span><br>";
 }
 
 echo "<ol></div><br>";
	
 

 
?>








<script type="text/javascript" src="http://www.dirtpage.com/jq.js"></script>
<script type="text/javascript" src="http://www.dirtpage.com/jsfunctions.js"></script>
<script type="text/javascript">

 $(".extra").hide();








  $('#output .search').mouseenter(function(){ 
	
$.get("http://www.dirtpage.com/minisearchfiller.php", {topic: $(this).attr('name')},  function(data) {
$('.results').html(data);	  }     ); 
 $('.results').fadeIn("slow");
  });



</script>