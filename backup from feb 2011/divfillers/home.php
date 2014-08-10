<?php
mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error()); ?>

<span     style="font-size:800%">   <span style="color: green">dirt</span><span style="color:white">page</span></span>

<?php $query = "SELECT * FROM site"; $result = mysql_query($query) or die(mysql_error()); while($row = mysql_fetch_array($result)){ 
	echo "<span class = \"hugeyellow\">" .  "(".    $row['score']       . ")</span> ";} 
if( $odd = $row['score']%2 ) {$pic1 = "graphics/up.png"; $class1 = "site_up"; $pic2 = "graphics/down.png"; $class2 = "site_down";}
else {$pic2 = "graphics/up.png"; $class2 = "site_up"; $pic1 = "graphics/down.png"; $class1 = "site_down";   }?>
<a href="javascript:void(0)"> <img class = <?php echo $class1; ?>   src="<?php echo $pic1; ?>" height = "5%" border = "0"/> </a>
<a href="javascript:void(0)"> <img class = <?php echo $class2; ?>  src="<?php echo $pic2; ?>"  height = "5%" border = "0"/> </a>

<br><br><br><br><br><br><!--span class = "database"> global </span>&nbsp;-->


 


<center>
<form name="form1" action="search.php?topic=<?php echo"$theirName"?>" method="GET" onSubmit="searchXXX();return false;" >
<input type="text" name="topic" size="28" value="" maxlength="25" >
<input type="submit" value="search dirtpage">
</form></center>



<A class="tinyblue" HREF="http://www.dirtpage.com/nav.php?page=about">about</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="http://www.dirtpage.com/nav.php?page=recent">recent</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--<A HREF="http://www.dirtpage.com/nav/active">active</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<A HREF="http://www.dirtpage.com/nav.php?page=random">random</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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


 

<!--
<br><br><br><br><br><br><hr>

what is dirtpage.com?

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
create new dirtpage
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A href="mailto:jason.yanofski@gmail.com?">contact</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</center>-->

<div id="footer"><?php include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';  ?> </div>








<script type="text/javascript" src="http://www.dirtpage.com/resources/jq.js"></script>

<script type="text/javascript" src="http://www.dirtpage.com/resources/jsfunctions.js"></script>

<script type="text/javascript">





$('.site_up').click(function() {
	$.get("http://www.dirtpage.com/resources/datacalls.php", {act: "site_up"}),
	
	
	$.get("http://www.dirtpage.com/divfillers/home.php", function(data) {
  $('#default').html(data);});
	
});



$('.site_down').click(function() {
	$.get("http://www.dirtpage.com/resources/datacalls.php", {act: "site_down"});
	$.get("http://www.dirtpage.com/divfillers/home.php", { topic: <?php echo "\"$topic\"" ?>}, function(data) {
  $('#default').html(data);});
});



</script>


 
 
</body>
