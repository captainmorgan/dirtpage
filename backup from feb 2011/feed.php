<?php include_once("phpfunctions.php"); ?>
<html>

<?php

$theirName = strtolower($_GET['topic']);
$messageNumber = $_GET['message'];
$act = $_GET['act'];
$newMessage = $_GET['newmessage'];
$c = $_GET['c'];
$v = $_GET['v'];
$p = $_GET['p'];

$val= $_GET['val'];


mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());?>



<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> dirtpage: <?php echo $theirName?> </title>
<link rel="stylesheet" href="http://www.dirtpage.com/styles.css" type="text/css">






 


<?php include("google.php"); ?>
 
</head>



<body>


<span class = "redtitle">Real time feed</span>





<?php 

$limit = 50;

if ($val == "post")
{?><form name="chat"id="chat" onSubmit="return false;">
<br>

<span class = "post"><INPUT TYPE=radio NAME="recentwhat" value="post" id="post" checked> <span class = "message">new messages</span></span>
<span class = "view"><INPUT TYPE=radio NAME="recentwhat" value="view" id="view"> <span class = "smalltopic">page views</span></span>
<br>



  </form><?php
  
  
  $query = "SELECT * FROM feed where type = 'post' ORDER BY id DESC limit $limit";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
list($posttopic, $postmessage) = explode(":", $row['event']);
echo  "<A HREF=\"http://www.dirtpage.com/page/" . str_replace(" ", "+", $posttopic) . "\"><span class = \"smalltopic\"><span class = \"card\">" . strtolower($posttopic) . "</span></span></a><span class = \"smalltopic\">: </span><span class = \"message\">". hyper(strtolower($postmessage)) ."</span><br><br>";}




 }
	 

if ($val == "view")
{?><form name="chat"id="chat" onSubmit="return false;">
<br>

<span class = "post"><INPUT TYPE=radio NAME="recentwhat" value="post" id="post"> <span class = "message">new messages</span></span>
<span class = "view"><INPUT TYPE=radio NAME="recentwhat" value="view" id="view" checked> <span class = "smalltopic">page views</span></span>
<br>



  </form><?php
  
  $query = "SELECT * FROM feed where type = 'view' ORDER BY id DESC limit $limit"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
echo "<div class = \"dirt\"><A HREF=\"http://www.dirtpage.com/page/" . str_replace(" ", "+", $row['event']) . "\"><span class = \"smalltopic\"><span class = \"card\">".strtolower($row['event']) . "</span></span></a></div><br>";}







}
	 

if ($val == "search")
{$query = "SELECT * FROM feed where type = 'search' ORDER BY id DESC limit $limit"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
echo "<A HREF=\"http://www.dirtpage.com/page/" . str_replace(" ", "+", $row['event']) . "\"><span class = \"biggarbage\">".strtolower($row['event']) . "</span></a>"   .   
"<span class = \"topic\"><br><br>";}
}





?>









<script type="text/javascript" src="http://www.dirtpage.com/jq.js"></script>
<script type="text/javascript" src="http://www.dirtpage.com/jsfunctions.js"></script>
<script type="text/javascript">


// TEMP setexpand();


 ( "refresh1();", 5000 );  ///////// 10 seconds
 
 
 $(function() {
refresh1 = function(){
	
	
	
	if ($("input[@name='recentwhat']:checked").val() == 'post')
       {$.get("http://www.dirtpage.com/feed.php", {val: "post"}, function(data) {
$('#output').html(data);  });
}
    else if ($("input[@name='recentwhat']:checked").val() == 'view')
       {$.get("http://www.dirtpage.com/feed.php", {val: "view"}, function(data) {
$('#output').html(data);  });
}
   

 }
 });







  $('.view').mouseenter(function(){  $('input[name="recentwhat"]')[1].checked = true        ;
  
  
  
    $.get("http://www.dirtpage.com/feed.php", {val: "view"}, function(data) {
$('#output').html(data);  });  }); 



  $('.post').mouseenter(function(){  $('input[name="recentwhat"]')[0].checked = true           
    $.get("http://www.dirtpage.com/feed.php", {val: "post"}, function(data) {
$('#output').html(data);  });  }); 





</script>