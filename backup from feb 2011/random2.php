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








<body onLoad="document.form1.theirName.focus()">

 



<body>








<?php






mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());


mysql_select_db("dirtpage1") or die(mysql_error());



echo " <h3> Random dirt     </h3>  ";


$query = "SELECT * FROM people ORDER BY rand() DESC LIMIT 10"; 


	 
$result = mysql_query($query) or die(mysql_error());


while($row = mysql_fetch_array($result)){
	

	?>   
 <A HREF="javascript:void(0)" onClick='searchExact("<?php echo $row['person']; ?> ")'> 
	
	<?php
	
echo "<span class = \"topic\">" .$row['person'] . " : " . "</span></a>" . 
	"<span class = \"comment\">"     .  
	$row['comment']. "</span>"  .   "<span class = \"topic\">".   " (" . $row['rank']. ")". 
	
	"</span>";
	
		
		 
	 ?> <a href="javascript:void(0)" onClick='increaseScore("<?php echo $row['id']; ?>"   ,   "<?php echo $row['person']; ?> "  )'> <img src="up.jpg" width="20" height="26" /> </a>  <?php  
	 
echo "<br /><br>";
}



?>






</body>

</html>

