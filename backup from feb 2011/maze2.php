<html>

<head>
<title> dirtpage </title>


<link rel="stylesheet" href="http://www.dirtpage.com/styles.css" type="text/css">

 



 

<body>



<!--THIS IS THE HEADER -->
<a href="http://www.dirtpage.com/default.html">
<H1> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: green">dirt</span><span style="color:white">page </a><CENTER>MAZE GAME !</CENTER><hr></span></center>
<!-- END OF HEADER -->


<?php



mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());

//set up game

//establish first random link
$query = "SELECT distinct person FROM people order by rand() limit 1"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$T = $row['person'];
$links[] = $row['person'];
$T = "Scott Yanofski";
echo "$T"; 
}


$stop = "no";












unset($matches);

//cycle through all the comments of the topic ($T)
$query = "SELECT comment FROM people WHERE person = '$T'ORDER BY rank DESC"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result))

{
$match = "none";
$matchrank = 0;
$mystring = " " . $row['comment'] . " ";



//for each topic in the database..
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
{$match = $row2['person']; $matchrank = $row2['rank']; ;};}
}





if ($match != "none"){$matches[] = $match;}
}

print_r ($links);

if(isset($matches)){$T = $matches[array_rand($matches,1)];$links[] = $T;} 
else {$stop = "yes";};










echo "<br>";
print_r ($links);











 



?>
</body>