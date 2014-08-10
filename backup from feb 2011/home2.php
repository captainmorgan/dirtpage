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
 

 
function increaseScore(i, mes) {



	
	if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  ajaxRequest=new XMLHttpRequest();}
  else
  {// code for IE6, IE5
  ajaxRequest=new ActiveXObject("Microsoft.XMLHTTP");}
  
ajaxRequest.open("GET","increaseScore.php?ii=" + i + "&p=" + mes,true);
ajaxRequest.send();

ajaxRequest.onreadystatechange=function()
{
  if (ajaxRequest.readyState==4 && ajaxRequest.status==200)
    {
	
document.getElementById('output').innerHTML=ajaxRequest.responseText;

	
	}
}
}



function enter_pressed(e){
var keycode;
if (window.event) keycode = window.event.keyCode; 
else if (e) keycode = e.which; 
else return false; 
return (keycode == 13); 
}

function clearScreen() {document.getElementById('output').innerHTML="";
document.form1.theirName.value="";}

function digDirt(topic)
{

	
if (topic == "undefined") {return;}
	
document.form1.theirName.value=topic;


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


 


}}
}

function featured() { document.getElementById('output').innerHTML="featured.html";  }

function searchTopics(topic)
{
	
	if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  ajaxRequest=new XMLHttpRequest();}
  else
  {// code for IE6, IE5
  ajaxRequest=new ActiveXObject("Microsoft.XMLHTTP");}
  
ajaxRequest.open("GET","searchtopics2.php?t=" + topic,true);
ajaxRequest.send();

ajaxRequest.onreadystatechange=function()
{
  if (ajaxRequest.readyState==4 && ajaxRequest.status==200)
    {
	
document.getElementById('output').innerHTML=ajaxRequest.responseText;






    


	
	}
}
}


function searchExact(topic, prev)
{
	
	
document.form1.theirName.value = topic;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  ajaxRequest=new XMLHttpRequest();}
  else
  {// code for IE6, IE5
  ajaxRequest=new ActiveXObject("Microsoft.XMLHTTP");}
  
ajaxRequest.open("GET","searchexact2.php?t=" + topic + "&p=" + prev,true);
ajaxRequest.send();

ajaxRequest.onreadystatechange=function()
{
  if (ajaxRequest.readyState==4 && ajaxRequest.status==200)
    {
	
document.getElementById('output').innerHTML=ajaxRequest.responseText;


   
   


	}
}
}


function viewhSubs(info)
{
	
	

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  ajaxRequest=new XMLHttpRequest();}
  else
  {// code for IE6, IE5
  ajaxRequest=new ActiveXObject("Microsoft.XMLHTTP");}
  
ajaxRequest.open("GET","post2.php?i=" + info,true);
ajaxRequest.send();

ajaxRequest.onreadystatechange=function()
{
  if (ajaxRequest.readyState==4 && ajaxRequest.status==200)
    {
	
document.getElementById('output').innerHTML=ajaxRequest.responseText;

  $(document).ready(function(){ 
        setTimeout("try{document.form2.theirComment.focus();}catch(error){}",100); 
    }); 




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
<a href="javascript:void(0)" onClick='window.location.reload()'>


<H1> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: green">dirt</span><span style="color:white">page</span></H1>







</a>


<center> 

<h5>



<form name="form1" action="" onSubmit="return false;" >
    topic:
      <input type="text" name="theirName" size="28" value="" maxlength="25" onMouseDown='clearScreen()'onKeyDown="if(enter_pressed(event)){ searchTopics(document.form1.theirName.value) }" >
  
    <A HREF="javascript:void(0)" onClick="searchTopics(document.form1.theirName.value)">
  <span style="color: khaki">search</span></A>
</form>
        
     

    
    
</h5>

</center>        

<center>
<h4>
<span style="color:blue">

<A HREF="javascript:void(0)" onclick='ajaxFunction("about2.html")'>
about</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="javascript:void(0)" onclick='ajaxFunction("recent2.php")'>
recent</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<A HREF="javascript:void(0)" onclick='ajaxFunction("random2.php")'>
random</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<A HREF="javascript:void(0)" onclick='ajaxFunction("toprated2.php")'>
top-rated</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<A HREF="javascript:void(0)" onclick='ajaxFunction("featured.html")'>
featured</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="javascript:void(0)" onclick='ajaxFunction("browse2.php")'>
log</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://en.wikipedia.org/wiki/Dirt_(TV_series)">contact</a>
</span>
</h4>
</center>





<br><br>


<div id="output">



 <br><br><br><br><br><br><br><br><br><br><br><br>



<?php



mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());

$query = "SELECT * FROM people ORDER BY rank DESC LIMIT 1"; 
$result = mysql_query($query) or die(mysql_error());




while($row = mysql_fetch_array($result)){
	
	
	

	?>   
 <A HREF="javascript:void(0)" onClick='searchExact("<?php echo $row['person']; ?> ")'> 
	
	<?php
	
echo "<center><span class = \"topic\">" .$row['person'] . " : " . "</span></a>" . 
	"<span class = \"comment\">"     .  
	$row['comment']. "</span>" .   "<span class = \"topic\">".   " (" . $row['rank']. ")". 
	
	"</span>";
	
	
	
		 
	 ?> <a href="javascript:void(0)" onClick='increaseScore("<?php echo $row['id']; ?>"   ,   "<?php echo $row['person']; ?> "  )'> <img src="up.jpg" width="20" height="26" /> </a> </center> <?php  
	 
	
	
echo "<br>";
echo "<br>";	

}
?>
	



</div>


















</body>
</html>