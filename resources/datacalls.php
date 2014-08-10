<?php //include_once('phpfunctions.php');

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());

$topic = trim($_GET['topic']);
$newMessage = $_GET['newmessage'];
$act = $_GET['act'];

$message_number = $_GET['message_id'];
$picture_id = $_GET['picture_id'];
$response_id = $_GET['response_id'];

$change = $_GET['change'];

$caption_id = $_GET['caption_id'];
$picture = $_GET['picture'];
$new_caption = $_GET['new_caption'];
$new_tag = $_GET['new_tag'];
$new_response = $_GET['new_response'];
$message_id = $_GET['message_id'];
$tag_id = $_GET['tag_id'];
$_FILES = $_FILES['newPic']; 

//$topic = trim($_POST['topic']);



if ($act == "site_up") {$loginid = mysql_query("UPDATE site SET score = score +1  ") or die(mysql_error());}


if ($act == "site_down") {$loginid = mysql_query("UPDATE site SET score = score -1  ") or die(mysql_error());}

if ($act == "topic_up"){$loginid = mysql_query("UPDATE topics SET score = score +1  WHERE `topic` = '".$topic."'") or die(mysql_error());}
if ($act == "topic_down"){$loginid = mysql_query("UPDATE topics SET score = score -1  WHERE `topic` = '".$topic."'") or die(mysql_error());}

if ($act == "message_up"){$loginid = mysql_query("UPDATE messages SET score = score +1  WHERE `message_id` = '".$message_id."'") or die(mysql_error());}
if ($act == "message_down"){$loginid = mysql_query("UPDATE messages SET score = score -1  WHERE `message_id` = '".$message_id."'") or die(mysql_error());}

if ($act == "picture_up"){$loginid = mysql_query("UPDATE pictures SET score = score +1  WHERE `picture_id` = '".$picture_id."'") or die(mysql_error());}
if ($act == "picture_down"){$loginid = mysql_query("UPDATE pictures SET score = score -1  WHERE `picture_id` = '".$picture_id."'") or die(mysql_error());}

if ($act == "response_up"){$loginid = mysql_query("UPDATE responses SET score = score +1  WHERE `response_id` = '".$response_id."'") or die(mysql_error());}
if ($act == "response_down"){$loginid = mysql_query("UPDATE responses SET score = score -1  WHERE `response_id` = '".$response_id."'") or die(mysql_error());}



if ($act == "tag_up"){$loginid = mysql_query("UPDATE tags SET score = score +1  WHERE `tag_id` = '$tag_id'") or die(mysql_error());}
if ($act == "tag_down"){$loginid = mysql_query("UPDATE tags SET score = score -1  WHERE `tag_id` = '".$tag_id."'") or die(mysql_error());}


 













if ($act == "caption_up"){$loginid = mysql_query("UPDATE captions SET score = score +1  WHERE `caption_id` = '".$caption_id."'") or die(mysql_error());}
if ($act == "caption_down"){$loginid = mysql_query("UPDATE captions SET score = score -1  WHERE `caption_id` = '".$caption_id."'") or die(mysql_error());}

if ($change == "up"){$loginid = mysql_query("UPDATE pics SET rank= rank+1  WHERE `id` = '".$messageNumber."'") or die(mysql_error());}

if ($change == "down"){$loginid = mysql_query("UPDATE pics SET rank= rank-1  WHERE `id` = '".$messageNumber."'") or die(mysql_error());}

if ($change == "up"){$loginid = mysql_query("UPDATE captions SET rank= rank+1  WHERE `id` = '".$messageNumber."'") or die(mysql_error());}

if ($change == "down"){$loginid = mysql_query("UPDATE captions SET rank= rank-1  WHERE `id` = '".$messageNumber."'") or die(mysql_error());}



if ($act == "see_also_up"){$loginid = mysql_query("UPDATE see_also SET score = score +1  WHERE `see_also_id` = '".$messageNumber."'") or die(mysql_error());}

if ($act == "see_also_down"){$loginid = mysql_query("UPDATE see_also SET score = score -1  WHERE `see_also_id` = '".$messageNumber."'") or die(mysql_error());}





if ($act == "postmessage"){
	if ($newMessage != "" ){
		if ($topic != "" ){
	mysql_query("delete from postedon where topic = '$topic'") or die(mysql_error());  
mysql_query("INSERT INTO postedon
(topic) VALUES('$topic')")
or die(mysql_error());  
	
	
	
	echo "test";
	echo $topic;
	
//$query = "SELECT * FROM messages WHERE topic = '$topic' and message = '$newMessage'";
//$result = mysql_query($query) or die(mysql_error());
//$num_results = mysql_num_rows($result); 
//if ($newMessage != ""){
//if ($num_results < 1){
	
mysql_query("INSERT INTO messages (topic_id, message, user, ip, origin, topic) VALUES('', '$newMessage','','', now(), '$topic') ") or die(mysql_error());  
 
 //}}
}}}
 

  
  
 if ($act == "post_see_also"){
//$query = "SELECT * FROM messages WHERE topic = '$topic' and message = '$newMessage'";
//$result = mysql_query($query) or die(mysql_error());
//$num_results = mysql_num_rows($result); 
//if ($newMessage != ""){
//if ($num_results < 1){
	
mysql_query("INSERT INTO see_also (topic_id, see_also, topic) VALUES('', '$newMessage', '$topic') ") or die(mysql_error());  
 
 //}}
} 
    
  
if ($act == "post_tag"){
	if ($new_tag != "" ){
		if ($topic != "" ){ 
mysql_query("INSERT INTO tags (topic, tag) VALUES('$topic', '$new_tag') ") 
or die(mysql_error());  
 
	
}  }}
  










if ($act == "post_caption"){
	if ($new_caption != "" ){
		if ($topic != "" ){
//$query = "SELECT * FROM captions WHERE pic = '$topic' and caption = '$newMessage'";
//$result = mysql_query($query) or die(mysql_error());
//$num_results = mysql_num_rows($result); 
//if ($newMessage != ""){
//if ($num_results < 1){
mysql_query("INSERT INTO captions (picture, caption, origin) VALUES('$picture', '$new_caption',curdate()) ") 
or die(mysql_error());  

mysql_query("delete from postedon where topic = '$topic'") or die(mysql_error());  
mysql_query("INSERT INTO postedon
(topic) VALUES('$topic')")
or die(mysql_error());  
	
}  }}
  
  
if ($act == "post_response" ){
	if ($new_response != "" ){
		if ($topic != "" ){
//$query = "SELECT * FROM captions WHERE pic = '$topic' and caption = '$newMessage'";
//$result = mysql_query($query) or die(mysql_error());
//$num_results = mysql_num_rows($result); 
//if ($newMessage != ""){
//if ($num_results < 1){
mysql_query("INSERT INTO responses (message_id, response, origin) VALUES('$message_id', '$new_response',curdate()) ") 
or die(mysql_error());  

mysql_query("delete from postedon where topic = '$topic'") or die(mysql_error());  
mysql_query("INSERT INTO postedon
(topic) VALUES('$topic')")
or die(mysql_error());  
	
}}}  
  
  
 if ($act == "deletemessage"){

mysql_query("delete from people where id = '$messageNumber'") or die(mysql_error());  

}
 


  
 if ($act == "deletemessage"){

mysql_query("delete from pics where id = '$messageNumber'") or die(mysql_error());  

}
 


if ($act == "create_topic"){

mysql_query("INSERT INTO topics (topic, user, ip, origin) VALUES('$topic', '$user', '$ip', curdate()) ") 
or die(mysql_error());  



header( 'Location: page.php?topic='.$topic ) ;
}
 




 
 
 
 ?>