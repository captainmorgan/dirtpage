<html>





<html>
<head>
<link rel="stylesheet" href="styles.css" type="text/css">
<script type="text/javascript">

function ajaxFunction(dataSource)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  ajaxRequest=new XMLHttpRequest();}
  else
  {// code for IE6, IE5
  ajaxRequest=new ActiveXObject("Microsoft.XMLHTTP");}
  
ajaxRequest.open("GET",dataSource,true);
ajaxRequest.send();

ajaxRequest.onreadystatechange=function()
{
  if (ajaxRequest.readyState==4 && ajaxRequest.status==200)
    {
	
document.getElementById('output').innerHTML=ajaxRequest.responseText;
	
	}
}
}


function digDirt(topic)
{
	
	

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  ajaxRequest=new XMLHttpRequest();}
  else
  {// code for IE6, IE5
  ajaxRequest=new ActiveXObject("Microsoft.XMLHTTP");}
  
ajaxRequest.open("GET","search2.php?t=" + topic,true);
ajaxRequest.send();

ajaxRequest.onreadystatechange=function()
{
  if (ajaxRequest.readyState==4 && ajaxRequest.status==200)
    {
	
document.getElementById('output').innerHTML=ajaxRequest.responseText;
	
	}
}
}



function throwDirt(topic, comment)

{
	
	
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  ajaxRequest=new XMLHttpRequest();}
  else
  {// code for IE6, IE5
  ajaxRequest=new ActiveXObject("Microsoft.XMLHTTP");}
  
ajaxRequest.open("GET","post2.php?t=" + topic + "&c=" + comment,true);
ajaxRequest.send();

ajaxRequest.onreadystatechange=function()
{
  if (ajaxRequest.readyState==4 && ajaxRequest.status==200)
    {
	
document.getElementById('output').innerHTML=ajaxRequest.responseText;
	
	}
}
}












</script>
</head>

 





<body onLoad="document.form1.theirName.focus()">
<body>







<br>
<a href="javascript:void(0)" onclick='ajaxFunction("recent2.php")'>
<H1> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: green">dirt</span><span style="color:white">page</span></H1>







</a>
<br><br>
<center> 

<h5>



<form name="form1">
    topic:
      <input type="text" name="theirName" size="28" value="" maxlength="25">
  
    <A HREF="javascript:void(0)" onClick="digDirt(document.form1.theirName.value)">
search</A>
</form>
        
    
  
    
    
</h5>

</center>        

<center>
<h4>
<span style="color:blue">

<A HREF="javascript:void(0)" onclick='ajaxFunction("about2.html")'>
about</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="javascript:void(0)" onclick='ajaxFunction("browse2.php")'>
log</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="javascript:void(0)" onclick='ajaxFunction("random2.php")'>
random</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="javascript:void(0)" onclick='ajaxFunction("featured2.php")'>
featured</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<a href="http://en.wikipedia.org/wiki/Dirt_(TV_series)">contact</a>
</span>
</h4>
</center>










<div id="output">





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





</div>


















</body>
</html>