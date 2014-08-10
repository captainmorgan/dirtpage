<html>

<head>
<title> dirtpage </title>


<link rel="stylesheet" href="http://www.dirtpage.com/styles.css" type="text/css">

 


function searchExact(topic)
{
	
document.superform.topic.value = topic;
document.superform.act.value = "search";
document.superform.submit()
	
}






<body>


<?php

$theirName = "jason";
$messageNumber = $_GET['message'];
$act = $_GET['act'];
$newMessage = $_GET['newmessage'];


mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());

?>




  
<form name="statsform" action="http://www.dirtpage.com/stats.php" method="get">
<input type="hidden" name="stat" value="none">
</form>

  
  
<form name="superform" action="http://www.dirtpage.com/pages.php" method="get">
<input type="hidden" name="act" value="none">
<input type="hidden" name="topic" value="fred">
<input type="hidden" name="message" value="flintstone">
</form>


 <form name="searchexact" action="searchexact5.php" method="GET">
<input type="hidden" name="topic" value="fred">
</form>



     
<form name="increasescore" action="increasescore5.php" method="post">
<input type="hidden" name="message" value="fred">
<input type="hidden" name="topic">
</form>

<form name="increasegarbage" action="increasegarbage5.php" method="post">
<input type="hidden" name="message" value="fred">
<input type="hidden" name="topic">
</form>
    
 <form name="save" action="save5.php" method="post">
<input type="hidden" name="message" value="fred">
<input type="hidden" name="topic">
</form>
 




<?php

switch ($act) {
    case "increasescore":
       $loginid = mysql_query("UPDATE people SET rank= rank+1  WHERE `id` = '".$messageNumber."'") or die(mysql_error());
        break;
		
    
	case "increasegarbage":
       	$loginid = mysql_query("UPDATE people SET garbage= garbage+1  WHERE `id` = '".$messageNumber."'") or die(mysql_error());
		$loginid = mysql_query("UPDATE people SET garbagetotal= garbagetotal+1  WHERE `id` = '".$messageNumber."'") or die(mysql_error());
		$loginid = mysql_query("UPDATE people SET garbagedate = curdate()  WHERE `id` = '".$messageNumber."'") or die(mysql_error());
		$loginid = mysql_query("UPDATE people SET rank= rank-1  WHERE `id` = '".$messageNumber."'") or die(mysql_error());
		 
        break;
    
	case "savegarbage":
        $loginid = mysql_query("UPDATE people SET garbage= 0  WHERE `id` = '".$messageNumber."'") or die(mysql_error());
		$loginid = mysql_query("UPDATE people SET garbagedate = '4000-1-1'  WHERE `id` = '".$messageNumber."'") or die(mysql_error());
        break;
		
		    
	case "postmessage":
       mysql_query("INSERT INTO people
(person, comment, origin) VALUES('$theirName', '$newMessage',curdate()) ") 
or die(mysql_error());  
 break;
}
	   
	   







//TITLE OF PAPGE
echo "<h1><center>";

//HYPERLINKING !!!

$query2 = "SELECT distinct * FROM people ORDER by rank"; 
$result2 = mysql_query($query2) or die(mysql_error);

$match = "none";
$matchrank = 0;
$mystring = " " . $theirName . " ";

while($row2 = mysql_fetch_array($result2)){
$findme = " ". $row2['person'] . " ";
$pos = strpos(strtolower($mystring), strtolower($findme));
if ($pos === false) {
	
	
	
	} else { 
if (strlen($row2['person']) > 2 and strtolower($row2['person']) != strtolower($theirName) and $row2['rank'] > $matchrank) 
{$match = $row2['person']; $matchrank = $row2['rank'];};}


$url = "http://www.dirtpage.com/page/" . str_replace(" ", "+", $match); 
$link = "<b><u><a style=\"color: pink\" href = \"$url\">" . $match . "</a></u></b>    ";

$hyper_topic = str_replace(strtolower($match), strtolower($link), strtolower($theirName));

}




 

//DO YOU WANT TO SEE A TOPIC THIS IS A MESSAGE IN???

$query = "SELECT * FROM people WHERE comment = '$theirName'
ORDER BY rank DESC limit 1"; 
$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){	
	
	
	?>    
<A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>"><?php
echo "<span class = \"comment\"><u>".  $row['person'] .   "</u>?</span></a><br> ";



	}

//END OF THAT
//



//
//
//
//TITLE
//
//




echo "<i>$hyper_topic</i>"; ?><A HREF="http://www.dirtpage.com/results/<?php echo str_replace(" ", "+", $theirName); ?>"><?php echo "^</a></center>   ";




//DO YOU WANT TO SEE SOMETHING BIGGER???

$query = "SELECT person, sum(rank) FROM people WHERE person LIKE '%$theirName%' and person <> '$theirName' GROUP BY person asc order by sum(rank) desc limit 1"; 
$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){

?> <center><A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>"><?php
echo "<span class = \"comment\"><br><u>".  $row['person'] .   "</u>?</span></a> </center>";
}

//END OF THAT
//






 
 
//	   
//MAIN QUERY
//

$query = "SELECT * FROM people
WHERE person = '$theirName'
ORDER BY rank DESC"; 
	 
$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){
	

//HYPERLINKING !!!

$query2 = "SELECT distinct * FROM people ORDER by rank"; 
$result2 = mysql_query($query2) or die(mysql_error);

$match = "none";
$matchrank = 0;
$mystring = " " . $row['comment'] . " ";

while($row2 = mysql_fetch_array($result2)){
$findme = " ". $row2['person'] . " ";
$pos = strpos(strtolower($mystring), strtolower($findme));
if ($pos === false) {} else { 
if (strlen($row2['person']) > 2 and strtolower($row2['person']) != strtolower($row['person']) and $row2['rank'] > $matchrank) 
{$match = $row2['person']; $matchrank = $row2['rank'];};}
}

$url = "http://www.dirtpage.com/page/" . str_replace(" ", "+", $match); 
$link = "<b><u><a href = \"$url\">" . $match . "</a></u></b>";
$original_comment = $row['comment'];

$hyper_comment = str_replace(strtolower($match), strtolower($link), strtolower($original_comment));



 
 echo  "<span class = \"comment\">" .  $hyper_comment . "<br><br></span>"  ;



}












 




?>
</body>