<?php include_once("phpfunctions.php"); 
include("header.php"); ?><html>



<?php

$theirName = $_GET['topic'];
$messageNumber = $_GET['message'];
$act = $_GET['act'];
$newMessage = $_GET['newmessage'];

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> dirtpage: <?php echo $theirName?> </title>
<link rel="stylesheet" href="http://www.dirtpage.com/styles.css" type="text/css">

<?php include("google.php"); ?>

</head>



<body> 


<div id="container">
<div id="output">

<form name="chat"id="chat" onSubmit="return false;">
<br>

<span class = "post"><INPUT TYPE=radio NAME="recentwhat" value="post" id="post" checked> <span class = "message">new messages</span></span>
<span class = "view"><INPUT TYPE=radio NAME="recentwhat" value="view" id="view"> <span class = "smalltopic">page views</span></span>
<br>
</form>
  
  
  
</div>

<br><br>


</div></div>

<div id = "boxes">    <div class = "results"></div>   <div class = "results2"></div> </div>








<script type="text/javascript" src="http://www.dirtpage.com/jq.js"></script>
<script type="text/javascript" src="http://www.dirtpage.com/jsfunctions.js"></script>
<script type="text/javascript">




///////// LOAD FEED-DIV

$.get("http://www.dirtpage.com/feed.php", {val: "post"}, function(data) {
$('#output').html(data); 
// TEMP setcards();
 });



$("input[name='recentwhat']").change(function(){
	
	if ($("input[@name='recentwhat']:checked").val() == 'post')
       {$.get("http://www.dirtpage.com/feed.php", {val: "post"}, function(data) {
$('#output').html(data);  });
}
    else if ($("input[@name='recentwhat']:checked").val() == 'view')
       {$.get("http://www.dirtpage.com/feed.php", {val: "view"}, function(data) {
$('#output').html(data);  });
}
   
 
     else if ($("input[@name='recentwhat']:checked").val() == 'search')
       {$.get("http://www.dirtpage.com/feed.php", {val: "search"}, function(data) {
$('#output').html(data);  });
}
   
       
});




////// KEEP LOADING FEED-DIV EVERY TEN SECONDS
 
 setInterval( "refresh1();", 10000 );  ///////// 10 seconds
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

	 
// TEMP setcards();
header();
</script>

 






</body>