
 


<?php
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
$link = "<a class = \"card\" href = \"$url\">" . $match . "</a>";
$hyper_string = str_ireplace($match, $link, $string);
return strtolower($hyper_string);}
?>


