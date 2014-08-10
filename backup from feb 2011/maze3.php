<html>

<head>
<title> dirtpage </title>


<link rel="stylesheet" href="http://www.dirtpage.com/styles.css" type="text/css">

 



 

<body>



<!--THIS IS THE HEADER -->
<a href="http://www.dirtpage.com/default.html">
<H1> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: green">dirt</span><span style="color:white">page </a>MAZE<hr></span></center>
<center>
<h5>
<form name="form1" action="search.php" method="GET" onSubmit="search();return false;" >
<input type="text" name="topic" size="28" value="" maxlength="25" >
<input type="submit" value="search dirtpage ">
</form>
</h5>
</center>     
<center>
<h4>
<span style="color:blue">
<A HREF="http://www.dirtpage.com/nav/about">about</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="http://www.dirtpage.com/nav/recent">recent</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="http://www.dirtpage.com/nav/active">active</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="http://www.dirtpage.com/nav/random">random</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="http://www.dirtpage.com/nav/busy">prolific</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="http://www.dirtpage.com/nav/ratings">ratings</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!-- <A HREF="http://www.dirtpage.com/nav/disputed">disputed</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
<A HREF="http://www.dirtpage.com/nav/featured">featured</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A href="mailto:dirtpage1@gmail.com?">contact</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span>
</h4>
</center>
<hr>
<!-- END OF HEADER -->


<?php

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());


$try = 0;

while (count($links) < 4){
$try = $try + 1;
//SETS UP ARRAY OF RANDOM LENGTH
//set up game
//establish first random link
unset($links);
$query = "SELECT distinct person FROM people order by rand() limit 1"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$T = $row['person'];
$links[] = $row['person'];
echo  "</h1>"; 
}
$status = "go";
//
while ($status == "go")
{
unset($matches);
$query = "SELECT * FROM people
WHERE person = '$T'
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
if ($match != "none") {$matches[] = $match;}
}

if(isset($matches)){$T = $matches[array_rand($matches,1)];$links[] = $T;} 
else {$status = "stop";};
}


}






echo "<h4>maze generated after " . $try . " attempts</h4>";

echo "<h2>Start: \"". $links[0] . "\"<br>";


echo "Finish: \"" . $links[count($links)-1] . "\"<br>";



?><br><A target="_blank" HREF="http://www.dirtpage.com/page/<?php echo "$links[0]"; ?>">play (in new window)</a><br><A HREF="http://www.dirtpage.com/maze3.php">reset</a><br><h4>Scroll down for the solution</h4>
 
 
 
 
<?php 
echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><h2>"; 





print_r($links);



echo "</h2>";

















?>
</body>