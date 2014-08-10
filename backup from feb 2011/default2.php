<html>

<head>
<title> dirtPage </title>


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
</style>
</head>














<body>

 

<hr width=800px color=white>
<!--<img src= "san2.JPG"/> -->
<center> 
<center>



<a STYLE="text-decoration: none" href="default2.html"> 
<img src="monster.jpg"/>
</a>

</center>
<H1> <span style="color: #660">dirt</span>Page</H1> 






<form name="form1" action="default2.php" method="post"> 



 <br><input type="text" name="theirName" size="28" value="">






 <input type="text" name="comment" size=47 value="" ><input type="submit" value="submit">



</form>








</center> 





<form name="form2" action="browse.php">
<center> <input type="submit" value = "recent history"> </center>
</form>






 <hr width=800px color=white>

<?php



$theirName = $_POST['theirName'];
$method = $_POST['method'];
$comment = $_POST['comment'];

if($theirName ==""){}

else{

echo "<h2> <center> dirt on $theirName : </center> </h2>";

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());


mysql_select_db("dirtpage1") or die(mysql_error());




if($comment ==""){}
else{
mysql_query("INSERT INTO people
(person, comment) VALUES('$theirName', '$comment') ") 
or die(mysql_error());  }



echo "<br />";
echo "<br />";
$query = "SELECT * FROM people
WHERE person LIKE'%$theirName%'
ORDER BY person"; 
	 
$result = mysql_query($query) or die(mysql_error());


while($row = mysql_fetch_array($result)){
	echo 
	
	
	
	"<span style='color:green'> <strong> ".$row['person'] . "</strong> </span>" . " - ". $row['comment'];
	echo "<br />";








echo "<br />";
}
}


?>

 

</body>

</html>

