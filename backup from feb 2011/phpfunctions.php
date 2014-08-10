<?php session_start();
  
mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());


function hyper ($string, $exclude = "") {
$hyperQuery = "SELECT distinct * FROM people ORDER by rank"; 
$hyperResult = mysql_query($hyperQuery) or die(mysql_error);
$match = "none";
$matchrank = 0;
$untrim_string = " ". $string . " ";
while($hyperRow = mysql_fetch_array($hyperResult)){
$topic = $hyperRow['person'];
$untrim_topic = " ". $topic . " ";
$rank = $hyperRow['rank'];
if (strlen($topic) > 2 and strtolower($topic) != strtolower($exclude) and stristr($untrim_string, $untrim_topic) != false and $rank > $matchrank) 
{$match = $topic; $matchrank = $rank;}
}
$url = "http://www.dirtpage.com/page/" . str_replace(" ", "+", $match); 
$link = "<a class=\"card\" href = \"$url\">" . $match . "</a>";
$hyper_string = str_ireplace($match, $link, $string);
return strtolower($hyper_string);}


function undert ($string, $topic) {


$link = "<span><u>" . ($topic) . "</u></span>";
$under_string = str_ireplace(ucwords($topic), $link, $string);
return ucwords($under_string);}


function underm ($string, $topic) {


$link = "<span><u>" . strtolower($topic) . "</u></span>";
$under_string = str_ireplace($topic, $link, $string);
return strtolower($under_string);}

?>    