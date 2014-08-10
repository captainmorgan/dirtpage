<?php

$theirName = $_GET['topic'];
$change = $_GET['change'];
$messageNumber = $_GET['messagenumber'];

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());
include("phpfunctions.php"); 

 
//	   
//MAIN QUERY
//













// TOPIC MATCHES


$query = "SELECT person, comment, COUNT(comment), sum(rank) FROM people WHERE person LIKE '%$theirName%' and person <> '$theirName' GROUP BY person asc order by sum(rank) desc, rank desc "; 
$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){

?><A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>"><?php
echo "<span class = \"t\"> ".  (undert($row['person'],$theirName)) .   " </span></a><span class = \"m\"> " . " (". $row['COUNT(comment)'] ."  messages)</span>";
echo  "<br>" ;
}
//END OF THAT
//



 


?>





<script type="text/javascript" src="http://www.dirtpage.com/jq.js"></script>
<script type="text/javascript" src="http://www.dirtpage.com/jsfunctions.js"></script>
<script type="text/javascript">





$("#div2 .my a").mouseover(function(){
	
	 $.get("http://www.dirtpage.com/divfiller2.php", {topic: $(this).text()},  function(data) {
$('#div3').html(data)  }); });



$("#div3 .my a").mouseover(function(){
	
	 $.get("http://www.dirtpage.com/divfiller2.php", {topic: $(this).text()},  function(data) {
$('#div2').html(data)  }); });

</script>