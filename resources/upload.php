<?php

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());


include ("phpfunctions.php");


$topic = trim($_POST['topic']);


//Сheck that we have a file
if((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {
  
  
  //Check if the file is JPEG image and it's size is less than 350Kb
  $filename = basename($_FILES['uploaded_file']['name']);
  $ext = substr($filename, strrpos($filename, '.') + 1);
 
 if (($ext == "jpg") && ($_FILES["uploaded_file"]["type"] == "image/jpeg") && 
    ($_FILES["uploaded_file"]["size"] < 100000000000000000000000)) {
		
		
		
		
		$len = 8;
	$base='ABCDEFGHKLMNOPQRSTWXYZ123456789';
$max=strlen($base)-1;
$fileName='';
mt_srand((double)microtime()*1000000);
while (strlen($fileName)<$len+1)$fileName.=$base{mt_rand(0,$max)};	
		
		
		   
		 
		
    //Determine the path to which we want to save this file
      //$newname = dirname(__FILE__).'/upload/'.$filename;
	  //$newname = 'dirtpage/accounts/'.$filename;
        //$newname = 'dirtpage/html/accounts/'.$filename;     
		$newName = '../pictures/'.$fileName.'.jpg';
	
	  
	  
	  //Check if the file with the same name is already exists on the server
      if (!file_exists($newName)) {
      
	  
	  
	    //Attempt to move the uploaded file to it's new place
        if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newName))) {
			
			
			
			
    $image = new SimpleImage();
   $image->load($newName);
   $image->resizeToHeight(1000);
   $image->resizeToWidth(400);
   $image->save($newName);
   
   
   
        header ('Location: http://www.dirtpage.com/page/?topic='.$topic);
		   
		   
		  
mysql_query("INSERT INTO pictures (topic, picture, origin) VALUES('$topic', '$fileName',now()) ") 
or die(mysql_error());  

mysql_query("delete from postedon where topic = '$topic'") or die(mysql_error());  
mysql_query("INSERT INTO postedon
(topic) VALUES('$topic')")
or die(mysql_error());  
		   
		   
		   
		   
		       
		   
        } else {
           echo "Error: A problem occurred during file upload!";
        }
      } else {
         echo "Error: File ".$_FILES["uploaded_file"]["name"]." already exists";
      }
  } else {
     echo "Error: Only .jpg images under 10mb are accepted for upload";
	 echo "size: ". $_FILES["uploaded_file"]["size"];
  }
} 


else {
 echo "Error: No file chosen";
}
?> 