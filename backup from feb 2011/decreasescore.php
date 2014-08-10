$theirName = $_GET['topic'];
$messageNumber = $_GET['message'];
$act = $_GET['act'];
$newMessage = $_GET['newmessage'];
$messageNumber = $_POST['messagenumber'];


mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());






<?php


$loginid = mysql_query("UPDATE people SET rank= rank-1  WHERE `id` = '".$messageNumber."'") or die(mysql_error());

?>
