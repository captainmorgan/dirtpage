<?php include("resources/phpfunctions.php"); ?>
  
<html>

<head>

<meta name="description" content="Dirtpage is a free, anonymous, automatic, accumulative, messageboard-ish encyclopedia of brilliance, humor, and crap. SEARCH for anything. Instantly POST anything about anything (or anyone) in order to inform, explain, collaborate, entertain, warn, praise, tease, tickle, vent, or confess.">

<meta name="keywords" content="dirtpage wikipedia facebook">
<title> dirtpage </title>
<link rel="stylesheet" href="styles.css" type="text/css">

<?php

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error()); ?>

<?php include("resources/google.php"); ?>
</head>






<body>



	

<div id = "everything">




<span id = "default">
<center>
<span     style="font-size:800%">   <span style="color: green">dirt</span><span style="color:white">page</span></span>

<br><br><br><br><br><br><!--span class = "database"> global </span>&nbsp;-->


 

<form name="search_form" onSubmit="search();return false;" >

<input type="text" name="topic" size="28" value="" maxlength="25" >
<input type="submit" value="search/go">

</form>
 
 </center>



<A class="tinyblue" HREF="http://www.dirtpage.com/nav.php?page=about">about</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="http://www.dirtpage.com/nav.php?page=recent">recent</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--<A HREF="http://www.dirtpage.com/nav/active">active</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<A HREF="http://www.dirtpage.com/nav.php?page=random">random</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="http://www.dirtpage.com/nav.php?page=tags">tags</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="http://www.dirtpage.com/nav.php?page=busy">prolific</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="http://www.dirtpage.com/nav.php?page=top_items">top-items</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="http://www.dirtpage.com/nav.php?page=top_topics">top-topics</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="http://www.dirtpage.com/nav.php?page=views">views</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!-- <A HREF="http://www.dirtpage.com/nav/disputed">disputed</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
<!-- <<A HREF="http://www.dirtpage.com/maze.php">play</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<A HREF="http://www.dirtpage.com/nav.php?page=featured">featured</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--<A HREF="http://www.dirtpage.com/feedviewer">feed</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<!--<A href="mailto:dirtpage1@gmail.com?">contact</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->


<br /><br />


 
</span>






</div>

<span id = "right">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/divfillers/right.php';  ?>
</span>
   




<script type="text/javascript" src="http://www.dirtpage.com/resources/jq.js"></script>

<script type="text/javascript" src="http://www.dirtpage.com/resources/jsfunctions.js"></script>

<script type="text/javascript">






</script>


 
 
</body>
