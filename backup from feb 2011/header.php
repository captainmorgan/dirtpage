<span id="admin"> <?php echo $_SESSION['admin_text'];  ?></span>

 
<?php mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());?>

<link rel="stylesheet" href="http://www.dirtpage.com/styles.css" type="text/css">
<span name ="admin" class="admin"><span name = "password" class="password"><form name="form"  onSubmit="return false;"><input type="password" name="password" /></form></span> admin?</span>

<div id="header">

<div id="ticker">

<?php $query = "SELECT * FROM people where (rank > garbage) ORDER BY rand() DESC LIMIT 1"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){

	?><A HREF="http://www.dirtpage.com/page/<?php echo str_replace(" ", "+", $row['person']); ?>"><?php
	echo "<span class = \"smalltopic\">" . $row['person'] . " : " . "</span></a>" . 
	"<span class = \"comment\">"  .  ($row['comment']) . "</span>" ;}?>
</div>




<div id="logo">
<a href="http://www.dirtpage.com/default.php"><span style="color: green; font-size: 40">dirt</span><span style="color:white; font-size: 40">page</span></a></span> <br />
</div>



<div id="search">
<form name="form1" action="results.php" method="GET" onSubmit="search();return false;" >
<input type="text" name="topic" size="28" value="" maxlength="25" >
<input type="submit" value="search dirtpage">
</form>
</div>


<div id="navbar">










<span style="color:blue" class="message"><br /><br />

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
<!--<A href="mailto:dirtpage1@gmail.com?">contact</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
</span></center>
</div>





</div>






<script type="text/javascript" src="http://www.dirtpage.com/jq.js"></script>


<script type="text/javascript">
/*
header();


  $('a[href*="feed"]').mouseleave(function(){location.href = 'http://www.dirtpage.com/feedviewer'}); 
  $('a[href*="about"]').mouseleave(function(){location.href = 'http://www.dirtpage.com/nav/about'}); 

$('a[href*="random"]').mouseleave(function(){location.href = 'http://www.dirtpage.com/nav/random'}); 
$('a[href*="busy"]').mouseleave(function(){location.href = 'http://www.dirtpage.com/nav/busy'}); 
$('a[href*="ratings"]').mouseleave(function(){location.href = 'http://www.dirtpage.com/nav/ratings'}); 
$('a[href*="feat"]').mouseleave(function(){location.href = 'http://www.dirtpage.com/nav/featured'}); 
  */
  $('.password').hide(); 
  
    $('.admin').mouseenter(function(){ $(this).find('.password').show();document.form.password.value=""}); 
  j=$('document.admin.password.password.value').text();
    $('.admin').mouseleave(function(){    $('.password').hide();   
	
$.post("http://www.dirtpage.com/session.php", {password: document.form.password.value},  function(data) {$('#admin').html(data);}); 
 }); 
	
	
	
  </script>