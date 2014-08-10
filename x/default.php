<?php include("phpfunctions.php"); ?>
  
  
  







<html>

<head>

<meta name="description" content="Dirtpage is a free, anonymous, automatic, accumulative, messageboard-ish encyclopedia of brilliance, humor, and crap. SEARCH for anything. Instantly POST anything about anything (or anyone) in order to inform, explain, collaborate, entertain, warn, praise, tease, tickle, vent, or confess.">


<meta name="keywords" content="dirtpage wikipedia facebook">
<title> dirtpage </title>
<link rel="stylesheet" href="styles.css" type="text/css">




<?php

$theirName = $_GET['topic'];
$messageNumber = $_GET['message'];
$act = $_GET['act'];
$newMessage = $_GET['newmessage'];

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error()); ?>




<?php include("google.php"); ?>
 



 

</head>
<body><br><BR><BR><BR>
<div id="ticker">   </div>

<span id="dirtpage1"><center><span     style="font-size:1000%">   <span style="color: green">dirt</span><span style="color:white">page</span></span>
<?php $query = "SELECT * FROM site"; $result = mysql_query($query) or die(mysql_error()); while($row = mysql_fetch_array($result)){ 
	echo "<span class = \"hugeyellow\">" .  "(".    $row['score']       . ")</span> ";} 
if( $odd = $row['score']%2 ) {$pic1 = "graphics/thumb.jpg"; $class1 = "site_up"; $pic2 = "graphics/thumbdown.jpg"; $class2 = "site_down";}
else {$pic2 = "graphics/thumb.jpg"; $class2 = "site_up"; $pic1 = "graphics/thumbdown.jpg"; $class1 = "site_down";   }?>
<a href="javascript:void(0)"> <img class = <?php echo $class1; ?>   src="<?php echo $pic1; ?>" height = "5%" border = "0"/> </a>
<a href="javascript:void(0)"> <img class = <?php echo $class2; ?>  src="<?php echo $pic2; ?>"  height = "5%" border = "0"/> </a>

<br><br><br><br><br><br><!--span class = "database"> global </span>&nbsp;-->

</span>


<center>
<h5>

<form name="form1" action="../../x/search.php?topic=<?php echo"$theirName"?>" method="GET" onSubmit="searchXXX();return false;" >
<input type="text" name="topic" size="28" value="" maxlength="25" >
<input type="submit" value="search dirtpage">
</form>

</h5>
</center>     

<center>
<h4>
<span style="color:blue">




<A HREF="http://www.dirtpage.com/nav/about">about</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="http://www.dirtpage.com/feedviewer">recent</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--<A HREF="http://www.dirtpage.com/nav/active">active</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<A HREF="http://www.dirtpage.com/nav/random">random</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="http://www.dirtpage.com/nav/busy">prolific</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="http://www.dirtpage.com/nav/ratings">ratings</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!-- <A HREF="http://www.dirtpage.com/nav/disputed">disputed</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
<!-- <<A HREF="http://www.dirtpage.com/maze.php">play</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<A HREF="http://www.dirtpage.com/nav/featured">featured</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--<A HREF="http://www.dirtpage.com/feedviewer">feed</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<A href="mailto:dirtpage1@gmail.com?">contact</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 

</span>
</h4>
<!--
<br><br><br><br><br><br><hr>

what is dirtpage.com?

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
create new dirtpage
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A href="mailto:jason.yanofski@gmail.com?">contact</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</center>-->


<script type="text/javascript" src="http://www.dirtpage.com/jq.js"></script>

<script type="text/javascript" src="http://www.dirtpage.com/jsfunctions.js"></script>

<script type="text/javascript">


header();




$('.site_up').click(function() {
	$.get("datacalls.php", {act: "site_up"});window.location.reload();
});



$('.site_down').click(function() {
	$.get("datacalls.php", {act: "site_down"});window.location.reload();
});



</script>


 
 
</body>
