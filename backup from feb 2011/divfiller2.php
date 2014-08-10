<?php

$theirName = $_GET['topic'];
$change = $_GET['change'];
$messageNumber = $_GET['messagenumber'];

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());
include("functions.php"); 

 
 
mysql_query("delete from feed where event = '$theirName'") or die(mysql_error());  
mysql_query("INSERT INTO feed
(type, event) VALUES(\"view\", '$theirName')")
or die(mysql_error());  
 
 
//	   
//MAIN QUERY
//
echo "<A HREF=\"http://www.dirtpage.com/page/" . $theirName . "\"><span class=\"topic\">" . strtolower($theirName) . "</span></a>";

echo "<div class = \"options\">"  ?><A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $theirName); ?>"><?php             echo "<span class = \"goto\">main page  - </a></span>";
 ?><A HREF="http://www.dirtpage.com/results/<?php echo str_replace(" ", "+", $theirName); ?>"><?php       
 echo "<span class = \"search\">search</span></a></div>";


$query = "SELECT * FROM people
WHERE person = '$theirName'
ORDER BY rank DESC limit 50"; 
	 
$result = mysql_query($query) or die(mysql_error());
echo"<ol>";
while($row = mysql_fetch_array($result)){
	
echo  "<br><span class = \"m\"><li>" . hyper($row['comment']) . "</span>";

 
?>
<br>
 
<?php } echo "</ol></span>"?>








<script type="text/javascript" src="http://www.dirtpage.com/jq.js"></script>
<script type="text/javascript" src="http://www.dirtpage.com/jsfunctions.js"></script>
<script type="text/javascript">








 
 
 
 
 

  $('.goto').mouseenter(function(){ 


 });


//////// load topic pages into divs

$("#div1 a").mouseover(function(){
	
	 $.get("http://www.dirtpage.com/divfiller2.php", {topic: $(this).text()},  function(data) {
$('#div2').html(data)  }); });



$("#div3 .m a").mouseover(function(){
	
	 $.get("http://www.dirtpage.com/divfiller2.php", {topic: $(this).text()},  function(data) {
$('#div2').html(data)  }); });




//////// load search results into div

$("#div2 .redtopic").mouseover(function(){
	
	 $.get("http://www.dirtpage.com/resultfiller.php", {topic: $(this).text()},  function(data) {
$('#div3').html(data)  }); });





</script>