<?php
 
 
 
 
 
$newChat = $_GET['chat'];

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());
mysql_query("INSERT INTO feed
(type, event) VALUES(\"chat\", '$newChat')")
or die(mysql_error());  

?>