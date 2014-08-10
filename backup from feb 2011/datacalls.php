<?php session_start();
  
mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());





$theirName = trim($_GET['topic']);
$newMessage = $_GET['newmessage'];
$act = $_GET['act'];
$change = $_GET['change'];
$messageNumber = $_GET['messagenumber'];






if ($change == "up"){$loginid = mysql_query("UPDATE people SET rank= rank+1  WHERE `id` = '".$messageNumber."'") or die(mysql_error());}

if ($change == "down"){$loginid = mysql_query("UPDATE people SET rank= rank-1  WHERE `id` = '".$messageNumber."'") or die(mysql_error());}

if ($act == "postmessage"){
$query = "SELECT * FROM people WHERE person = '$theirName' and comment = '$newMessage'";
$result = mysql_query($query) or die(mysql_error());
$num_results = mysql_num_rows($result); 
if ($newMessage != ""){
if ($num_results < 1){
mysql_query("INSERT INTO people
(person, comment, origin) VALUES('$theirName', '$newMessage',curdate()) ") 
or die(mysql_error());  
mysql_query("delete from feed where event = '$theirName'") or die(mysql_error());  
$p = $theirName . " : " . $newMessage;
mysql_query("INSERT INTO feed
(type, event) VALUES(\"post\", '$p')")
or die(mysql_error()); }}
}
 
  
 if ($act == "deletemessage"){

mysql_query("delete from people where id = '$messageNumber'") or die(mysql_error());  

}
 



















 
 
 
 
 ?>