<html>

<head>
<title> dirtPage </title>
<link rel="stylesheet" href="styles.css" type="text/css">

<script language="JavaScript">



</script>


<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-16891280-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>




</head><body onLoad="document.form1.theirName.focus()">
<body>







<br>
<a href="default.html">
<H1> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: green">dirt</span><span style="color:white">page</span></H1> 
</a>
<br><br>
<center> 

<h5>
<form name="form1" action="default.php" method="post">
    topic:
      <input type="text" name="theirName" size="28" value="" maxlength="25">
    comment: 
      <input type="text" name="comment" size=47 value="" maxlength="125" >
      <input type="submit" value="GET DIRTY" style="height:30px; width:75px;"></p>
    </form>
</h5>

</center>        

<center>
<h4>
<span style="color:blue">
<a href="about.html">about </a>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="browse.php">log </a>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="random.php">random</a>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="featured.php">featured</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://en.wikipedia.org/wiki/Dirt_(TV_series)">contact</a>
</span>
</h4>
</center>





 



<?php






mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());


mysql_select_db("dirtpage1") or die(mysql_error());



echo "<br>  <i> <h3> recent dirt   </i>   </h3>  ";





$query = "SELECT * FROM people ORDER BY id DESC LIMIT 10"; 


	 
$result = mysql_query($query) or die(mysql_error());


while($row = mysql_fetch_array($result)){
	

	echo "<span class = \"topic\">" .$row['person'] . "</span>" . 
	"<span class = \"comment\">"     .   " : "   . 
	$row['comment']. "</span>";
	
	
	
echo "<br><br>";
}



	




?>






</body>

</html>

