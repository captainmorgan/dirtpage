<html>

<head>
<title> dirtPage </title>


<link rel="stylesheet" href="styles.css" type="text/css">




  
<script type="text/javascript">
function increaseScore(i, topic)

{	
document.superform.message.value = i;
document.superform.topic.value = topic;
document.superform.act.value = "increasescore";
document.superform.submit()
	} 


function increaseGarbage(i, topic)
{
	
document.superform.message.value = i;
document.superform.topic.value = topic;
document.superform.act.value = "increasegarbage";
document.superform.submit()
	
}

function saveGarbage(i, topic)
{
	
document.superform.message.value = i;
document.superform.topic.value = topic;
document.superform.act.value = "savegarbage";
document.superform.submit()
	
}

function searchExact(topic)
{
	
document.superform.topic.value = topic;
document.superform.act.value = "search";
document.superform.submit()
	
}
</script>

</head>



<body onLoad="document.form1.comment.focus()">

 




<body>

<SCRIPT LANGUAGE="JavaScript" SRC="navbar.js">
</SCRIPT>




 
  
  
  
 


<?php

$theirName = $_POST['topic'];
$messageNumber = $_POST['message'];
$act = $_POST['act'];
$newMessage = $_POST['newmessage'];






?>



<A HREF="javascript:void(0)" onClick= 'searchExact("<?php echo "$theirName" ?>")'> 


<?php

echo 


"<h1> <center>  <i> $theirName </i> </center> </h1></a>  ";




?>


<form name="superform" action="searchexact7.php" method="post">
<input type="hidden" name="act" value="none">
<input type="hidden" name="topic" value="fred">
<input type="hidden" name="message" value="flintstone">
</form>


 <form name="searchexact" action="searchexact5.php" method="post">
<input type="hidden" name="topic" value="fred">
</form>


<form name="post" action="searchexact7.php" method="POST">

<input type="text" name="newmessage" size="28" value="" maxlength="125">
<input type="hidden" name="topic" value= <?php echo "\"$theirName\"" ?>
<input type="hidden" name="act" value="postmessage">
<input type="submit" value="post new message">
   </form>

     
        
  
  
<form name="increasescore" action="increasescore5.php" method="post">
<input type="hidden" name="message" value="fred">
<input type="hidden" name="topic">
</form>

<form name="increasegarbage" action="increasegarbage5.php" method="post">
<input type="hidden" name="message" value="fred">
<input type="hidden" name="topic">
</form>
    
 <form name="save" action="save5.php" method="post">
<input type="hidden" name="message" value="fred">
<input type="hidden" name="topic">
</form>

<?php

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());


mysql_select_db("dirtpage1") or die(mysql_error());


       
	   

switch ($act) {
    case "increasescore":
       $loginid = mysql_query("UPDATE people SET rank= rank+1  WHERE `id` = '".$messageNumber."'") or die(mysql_error());
        break;
		
    
	case "increasegarbage":
       	$loginid = mysql_query("UPDATE people SET garbage= garbage+1  WHERE `id` = '".$messageNumber."'") or die(mysql_error());
		$loginid = mysql_query("UPDATE people SET garbagetotal= garbagetotal+1  WHERE `id` = '".$messageNumber."'") or die(mysql_error());
		$loginid = mysql_query("UPDATE people SET garbagedate = curdate()  WHERE `id` = '".$messageNumber."'") or die(mysql_error());
        break;
    
	case "savegarbage":
        $loginid = mysql_query("UPDATE people SET garbage= 0  WHERE `id` = '".$messageNumber."'") or die(mysql_error());
		$loginid = mysql_query("UPDATE people SET garbagedate = '4000-1-1'  WHERE `id` = '".$messageNumber."'") or die(mysql_error());
        break;
		
		    
	case "postmessage":
       mysql_query("INSERT INTO people
(person, comment, origin) VALUES('$theirName', '$newMessage',curdate()) ") 
or die(mysql_error());  
 break;
}
	   
	   
		
		
		
	   
	   
	   
	   
	   
	   


$query = "SELECT * FROM people
WHERE person = '$theirName'
ORDER BY rank DESC"; 
	 
$result = mysql_query($query) or die(mysql_error());

 


while($row = mysql_fetch_array($result)){
	
if  ( $row['rank'] > $row['garbage'] ) {

$dif = ($row['rank'] - $row['garbage']);

echo  "<span class = \"comment\">"     .  
	$row['comment']. "</span>"   .   "<span class = \"topic\">".   " (" . $row['rank']. ")". 
	
	"</span>";
 ?> <a href="javascript:void(0)" onClick='increaseScore("<?php echo $row['id']; ?>", "<?php echo $row['person']; ?>")'> <img src="thumb.jpg"  border = "0"/> </a> <a href="javascript:void(0)" onClick='increaseGarbage("<?php echo $row['id']; ?>", "<?php echo $row['person']; ?>")'> <img src="garbage.jpg"  border = "0"/> </a> <?php  
	 echo "<span class = \"garbagescore\">".   " (" . $dif. ")". "</span>";
	
	
	
	
	
	 echo "<br />";
echo "<br />";
}


}
echo "<hr><br>";

$query = "SELECT * FROM people
WHERE person = '$theirName'
ORDER BY rank DESC"; 
	 
$result = mysql_query($query) or die(mysql_error());

 
while($row = mysql_fetch_array($result)){
	 
	
	
	
if  ( $row['rank'] <= $row['garbage'] ) {




echo  "<span class = \"garbage\">"     .  
	$row['comment']. "</span>"   .   "<span class = \"topic\">";
 ?> 
 
 <a href="javascript:void(0)" onClick='saveGarbage("<?php echo $row['id']; ?>", "<?php echo $row['person']; ?>")'>
 
 
  <img src="up.jpg" border="0"  /> </a> 
  
  

   <?php  
   
 
	   echo  "<span class = \"garbagescore\">"   . "(". ($row['garbagedate']) . ")". "</span>";
	
echo "<br />"; 
}

  
}



 




?>
</body>