<head>
<link rel="stylesheet" href="http://www.dirtpage.com/styles.css" type="text/css">
</head>

<?php

$topic = trim($_GET['topic']);
$newMessage = $_GET['newmessage'];
$act = $_GET['act'];
$change = $_GET['change'];
$messageNumber = $_GET['messagenumber'];
 
 mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());
include_once('../phpfunctions.php');

//	   
//MAIN QUERY
//
   echo "<span class=\"pinktitle\">dirtpage : <A HREF=\"page.php?topic=" . str_replace(" ", "+", $topic) . "\"><span class=\"pinktitle\">" . strtolower($topic) . "</span></a></span>"; 


?>





<br><br>

   




<form>
post new message: <input type="text" size = "41"><input type="button" value = "post">

</form>

<form enctype="multipart/form-data" action="http://www.dirtpage.com/x/upload.php" method="post">

post new picture: 
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
   <input name="uploaded_file" type="file" value="add new pic"  />
    <input type="submit" value="post" />
    <input type="hidden" name="topic" value= <?php echo "\"$topic\"" ?>>
    </form> <br><br />


 

 <?php








 $query = "SELECT 'messages' as table_name, message as item, score, message_id as item_id
        FROM messages WHERE topic = '$topic' 
        UNION
        SELECT 'pictures' as table_name, picture as item, score, picture_id as item_id
        FROM pictures WHERE topic = '$topic' 
        ORDER BY score DESC";
		
$result = mysql_query($query) or die(mysql_error());

$i = 0;



while($row = mysql_fetch_array($result)){ $i ++;
	
if 	($row['table_name'] == 'messages') { 

 
echo  "<table ><tr ><td valign=\"top\"><span class=\"smallyellow\">$i.</span></td>";

echo "<td valign=\"top\" width= \"600\">

<span class = \"smallwhite\">" . hyper($row['item']) . "&nbsp;</span>"   .  "<span class = \"smallyellow\">".  " (" . $row['score']. ") </span> ";


if( $odd = $row['score']%2 ) {$pic1 = "http://www.dirtpage.com/thumbgray.jpg"; $class1 = "up"; $pic2 = "http://www.dirtpage.com/thumbdowngray.jpg"; $class2 = "down";}
else {$pic2 = "http://www.dirtpage.com/thumbgray.jpg"; $class2 = "up"; $pic1 = "http://www.dirtpage.com/thumbdowngray.jpg"; $class1 = "down";   }?>
<a href="javascript:void(0)"> <img class = <?php echo $class1; ?> name ="<?php echo $row['id']; ?>"  src="<?php echo $pic1; ?>" height = "80%" border = "0"/> </a>
<a href="javascript:void(0)"> <img class = <?php echo $class2; ?> name ="<?php echo $row['id']; ?>" src="<?php echo $pic2; ?>"  height = "80%" border = "0"/> </a><span class ="del" name="<?php echo $row['item_id']; ?>">



<?php echo "<a href = \"http://www.dirtpage.com/x/page.php?topic=". $topic . "&mode=picture&picture=". $row['item'] . "\">"?><image src = "../../../x/graphics/deeper2.jpg" height = "80%" ></span></a>
 <br></td>
 
 </tr></table>
 <?php  
 


}
	
	
	
	
if 	($row['table_name'] == 'pictures') {

echo "<table ><tr ><td valign = \"top\"><span class=\"smallyellow\"> $i.</span> </td>";

echo "<td valign = \"top\">&nbsp;<img src=\"../../../../x/pictures/".  $row['item'] . "\" width=\"225\" border=\"white\"></td>";

echo "<td valign = \"top\">"; 

 
echo  "<span class = \"t\">".  " (" . $row['score']. ") </span><br> ";

if( $odd = $row['score']%2 ) {$pic1 = "http://www.dirtpage.com/thumbgray.jpg"; $class1 = "up"; $pic2 = "http://www.dirtpage.com/thumbdowngray.jpg"; $class2 = "down";}

else {$pic2 = "http://www.dirtpage.com/thumbgray.jpg"; $class2 = "up"; $pic1 = "http://www.dirtpage.com/thumbdowngray.jpg"; $class1 = "down";   }?>


<a href="javascript:void(0)"> <img class = <?php echo $class1; ?> name ="<?php echo $row['id']; ?>"  src="<?php echo $pic1; ?>" border = "0"/> </a><br>
<a href="javascript:void(0)"> <img class = <?php echo $class2; ?> name ="<?php echo $row['id']; ?>" src="<?php echo $pic2; ?>"  border = "0"/> </a><br>
<?php echo "<a href = \"http://www.dirtpage.com/x/page.php?topic=". $topic . "&mode=picture&picture=". $row['item'] . "\">"?> <span class ="del" name="<?php echo $row['item_id']; ?>"><image src = "../../../x/graphics/deeper2.jpg"></span></a>


<?php


echo "</td><td valign = \"bottom\"><span class = \"smallblack\">hellooooooo well now that i have your attention.. i wanted to say.. i'm a stupid idiot!!! haha</span><br><br></td></tr></table>";


}
	
	
	
	
	
echo "<br>";
	
	
	
}







?>






