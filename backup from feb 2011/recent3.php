<html>

<head>
<title> dirtPage </title>
<link rel="stylesheet" href="styles.css" type="text/css">

<script language="JavaScript">

function changeSelect () {
	
	document.bgColor="white";
	
	if (document.form1.method.value == "1") {document.form1.comment.disabled = true; document.form1.comment.value = ""}
	if (document.form1.method.value == "2") {document.form1.comment.disabled = false;}
	
	}

</script>


<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type="text/css">
body {
	background-color: #000;
}
body,td,th {
	color: #FFF;
}
a:link {
	color: #0CF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #0CF;
}
a:hover {
	text-decoration: none;
	color: #FFF;
}
a:active {
	text-decoration: none;
	color: #FFF;
}
</style>



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
</head>










  







<br>
<a href="default.html">
<H1> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: green">dirt</span><span style="color:white">page</span></H1> 
</a>
<br><br>
<center> 

<h5>
<form name="form1" action="default.php" method="post">
    topic:
      <input type="text" name="theirName" size="28" value="confessions" maxlength="25">
     message: 
      <input type="text" name="comment" size=47 value="" maxlength="125" >
      <input type="submit" value="GET DIRTY" style="height:500px; width:75px;"></p>
    </form>
</h5>

</center>        

<center>
<h4>
<span style="color:blue">
<a href="about.html">(about dirtpage) </a>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="browse.php">(recent dirt) </a>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="random.php">(random dirt) </a>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="featured.php">(featured subject)</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://en.wikipedia.org/wiki/Dirt_(TV_series)">(contact dirtpage)</a>
</span>
</h4>
</center>








</center> 






<?php






mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());


mysql_select_db("dirtpage1") or die(mysql_error());



echo	"<h2> <center> Recent dirt</center> </h2>";


echo "<br />";


$query = "SELECT * FROM people ORDER BY id DESC LIMIT 500"; 


	 
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
