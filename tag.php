

<title> dirtpage: <?php echo $topic?> </title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="http://www.dirtpage.com/resources/styles.css" type="text/css">
<?php include("resources/google.php"); ?>
</head>
<?php



$tag = $_GET['tag'];
 mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());


?>

      


	     
	

<body><div id = "everything">


<?php include("header.php"); ?>

<br><br>

<span id = "holder">




<br>

<span class = "pinktitle"> topics with the tag '<?php echo $tag ?>'</span> <br><br>



<?php



 

$query = "SELECT * FROM tags WHERE tag LIKE '$tag' order by score desc"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
?><A HREF="page.php?topic=<?php echo str_replace(" ", "+", $row['topic']); ?>"><?php echo "<span class = \"bigyellow\">". $row['topic'];
 echo  "</span></a><br><br>";
}




 
?>
<br /><br />
 
</span>

<span id = "right">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/divfillers/right.php';  ?>
</span>
 
</div>






</body>
</html>