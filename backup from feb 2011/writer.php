<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>


<?php





 
mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());

echo "<h3> Topics writer   </h3>  ";


$query = "SELECT distinct person FROM people ORDER by person"; 
$result = mysql_query($query) or die(mysql_error());

 
$fp = fopen("sitemap.html", "w"); // Open the data file, file points at the end of file

while($row = mysql_fetch_array($result)){
	
	
	
$content = "<a href=\"http://www.dirtpage.com/page/" . str_replace(" ", "+", $row['person']) . "\">" . $row['person'] . "</a><br>";
 
$fw = fwrite ($fp, $content); // Write the content on the file 	
	 
}








?>


</body>
</html>