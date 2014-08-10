<head>
<link rel="stylesheet" href="http://www.dirtpage.com/styles.css" type="text/css">
</head>

<?php

$topic = trim($_GET['topic']);

 
 mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());
include_once('../phpfunctions.php');





 


 
 
?>


<!--<table width="450"><tr><td>contents</td><td>messages</td><td>pictures</td><td>similar</td><td>-->
<?php // echo "<span name = \"$topic\" class = \"search\"><A HREF=\"http://www.dirtpage.com/results/" . str_replace(" ", "+", $topic) . "\">search</a></span></span>"?>
<!--</td></tr></table> -->


<?php echo "<A HREF=\"http://www.dirtpage.com/results/" . str_replace(" ", "+", $topic) . "\"><span class=\"pinktitle\">dirtpage : " . strtolower($topic) . "</span></a><span class=\"pinktitle\"> : preview</span>"; 

 $query = "SELECT * FROM topics WHERE topic like '$topic'"; $result = mysql_query($query) or die(mysql_error()); while($row = mysql_fetch_array($result)){echo "<span style = \"float: right\">views: ". $row['num_views'] . "</span>";}?>






<br>




