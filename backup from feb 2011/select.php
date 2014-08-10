<html>

<?php

$theirName = $_GET['topic'];
$messageNumber = $_GET['message'];
$act = $_GET['act'];
$newMessage = $_GET['newmessage'];
$stat = $_GET['stat'];

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());?>



<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> dirtpage: <?php echo $theirName?> </title>
<link rel="stylesheet" href="http://www.dirtpage.com/styles.css" type="text/css">
<script type="text/javascript" src="http://www.dirtpage.com/jq.js"></script>

<?php include("phpfunctions.php"); ?>


<?php include("google.php"); ?>
   
</head>

<body>

<?php include("header.php"); ?>


<div id="dirt">
<?php





  
echo "<h3> Recently posted dirt     </h3>  ";
$query = "SELECT * FROM people where (rank > garbage) ORDER BY id DESC LIMIT 10"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){

	?>   
 
    


<?php
echo "<span class=\"m\">";

$words = explode(" ", $row['comment']);
	
foreach ($words as $word) {echo "<span style=\"border: 5px solid black\" class = \"comment\">" .  $word. " ". "</span>" ;}
	

	echo "</span>";
echo "<br><br>";

}

echo "<span class=\"m\">";

echo "<span style=\"border: 5px solid black\" class = \"comment\">" . "hello" . " ". "</span>" ;

echo "<span style=\"border: 5px solid black\" class = \"comment\"><u><a href=\"http://www.google.com\">" .  goodbye. " ". "</span>" ;
echo "<span style=\"border: 5px solid black\" class = \"comment\">" . hello. " ". "</a></u></span>" ;
echo "<span style=\"border: 5px solid black\" class = \"comment\">" .  goodbye. " ". "</span>" ;
echo "</span>";
echo "<br><br>";
?>
</div>


<div id="results"></div>







<script type="text/javascript" src="http://www.dirtpage.com/jq.js"></script>
<script type="text/javascript" src="http://www.dirtpage.com/jsfunctions.js"></script>
<script type="text/javascript">




$(".comment").mouseenter(function(){
	$(this).attr('style', 'border: 5px solid yellow');
	
		if ($("span[style*='yellow']").text().length >25) {
	
	$("span").attr('style', 'border: 5px solid black');$(this).attr('style', 'border: 5px solid yellow'); }
	
	});
	 
	 
	 
	$(".comment").mouseenter(function(){
	
		 $.get("http://www.dirtpage.com/divfiller.php", {topic: $("span[style*='yellow']").text()}, function(data) {
$('#results').html(data)  }); 
	
	}); 
	 
	 
	 
	 
	$(".m").mouseleave(function(){
	
$('#results').html("")  });  
	 
	 

	 
	 
	
	
$(".m").mouseleave(function(){
	
	$("span").attr('style', 'border: 5px solid black'); });
	
		


$(".comment").click(function(){	
	
		window.location.href="http://www.dirtpage.com/results/"+$("span[style*='yellow']").text()});
		
		
		

			

		
		
		

header();
 





</script>


</body>
