<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>

<center> <h1> Sitemap was just remade dynamically! SEO here we come!!</h1> 

 <a href = "http://www.dirtpage.com/sitemap.html">

<h3> Show Chris Morgan </h3>  </a></center>

<?php


 


//html
 
mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());

$query = "SELECT distinct person FROM people ORDER by person"; 
$result = mysql_query($query) or die(mysql_error());

$fp = fopen("sitemap.html", "w"); 

$content = "<H3><center> SITE MAP!!!</center> </H3> ";
 
$fw = fwrite ($fp, $content);  	

while($row = mysql_fetch_array($result)){
	
$content = "<a href=\"http://www.dirtpage.com/page/" . str_replace(" ", "+", $row['person']) . "\">" . $row['person'] . "</a><br>";
 
$fw = fwrite ($fp, $content);  	
	 
}





//xml



$fp2 = fopen("sitemap.xml", "w"); 

$content = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\r\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\r\n";
$fw2 = fwrite ($fp2, $content);  	



$query = "SELECT distinct person FROM people ORDER by person"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
	


$content = "<url>\r\n<loc>http://www.dirtpage.com/page/" . str_replace(" ", "+", $row['person']) . "</loc>\r\n<lastmod>2010-09-27</lastmod>\r\n<changefreq>always</changefreq>\r\n<priority>1.00</priority>\r\n</url>\r\n";
$fw2 = fwrite ($fp2, $content);  	
	
}

$content = "</urlset>";
$fw2 = fwrite ($fp2, $content);  








?>


</body>
</html>