<html>

<head>
<title> dirtPage </title>


<link rel="stylesheet" href="styles.css" type="text/css">


</head>


 




<body>

<SCRIPT LANGUAGE="JavaScript" SRC="navbar.js">
</SCRIPT>

<h3>

<?php

 
  
  
  
mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());


mysql_select_db("dirtpage1") or die(mysql_error());
     

$query = "SELECT * FROM people";
$result = mysql_query($query) or die(mysql_error());
$x = 0;
while($row = mysql_fetch_array($result))
{
if ($row['rank'] > $row['garbage'] ) 
{
$x = $x + 1;
}
}
echo "non-garbage messages " . $x ; 
echo "<br>";



$query = "SELECT * FROM people";
$result = mysql_query($query) or die(mysql_error());
$y = 0;
while($row = mysql_fetch_array($result))
{
if ($row['rank'] > $row['garbage'] ) {} else
{
$y = $y + 1;
}
}
echo "garbage messages " . $y ;
echo "<br>";

$t = $y + $x;
echo "total messages " . $t;
echo "<br>";
	 

$query = "SELECT * FROM people";
$result = mysql_query($query) or die(mysql_error());
$z = 0;
while($row = mysql_fetch_array($result))
{


$z = $z + $row['rank'];
}

echo "total of all score points (including garbage) " . $z ;
echo "<br>";

?>

<br>
<A HREF= "viewgarbage.php" > view garbage </A>

<br>
<A HREF= "log5.php" > log </A>

<br>
<A HREF= "controversial.php" > most controversial </A>

<br>
<A HREF= "mostmessages5.php" > most messages</A>

</h3>

</body>