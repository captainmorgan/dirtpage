<?php

 

$messageNumber = $_GET['ii'];
$theirName = $_GET['topic'];


mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());


mysql_select_db("dirtpage1") or die(mysql_error());


 
$query = "SELECT * FROM people
WHERE id = $messageNumber";

	 
$result = mysql_query($query) or die(mysql_error());


while($row = mysql_fetch_array($result)){
	
echo  $row['person'] ;

echo  $row['rank'] . "<br>" ;
echo  $row['rank'] ;
echo  $row['rank'] ;

echo  $row['person'] ;
	
echo  $row['rank'] ;
echo  $row['comment'] ;
echo  $row['rank'] ;
echo  $row['rank'] ;
echo  $row['rank'] ;



$loginid = mysql_query("UPDATE people SET rank= rank+1  WHERE `id` = '".$messageNumber."'") or die(mysql_error());

echo $theirName;


}

echo "$theirName";

?>
	
	

<h3> Thanks for your input!</h3> 