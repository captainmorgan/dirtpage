<?php 
 
 

/*function hyper ($string, $exclude = "") {
$hyperQuery = "SELECT distinct * FROM people ORDER by rank"; 
$hyperResult = mysql_query($hyperQuery) or die(mysql_error);
$match = "none";
$matchrank = 0;
$untrim_string = " ". $string . " ";
while($hyperRow = mysql_fetch_array($hyperResult)){
$topic = $hyperRow['person'];
$untrim_topic = " ". $topic . " ";
$rank = $hyperRow['rank'];
if (strlen($topic) > 2 and strtolower($topic) != strtolower($exclude) and stristr($untrim_string, $untrim_topic) != false and $rank > $matchrank) 
{$match = $topic; $matchrank = $rank;}
}
$url = "http://www.dirtpage.com/x/page.php?topic=" . str_replace(" ", "+", $match); 
$link = "<a class=\"card\" href = \"$url\">" . $match . "</a>";
$hyper_string = str_ireplace($match, $link, $string);
return strtolower($hyper_string);}*/



function hyper ($string, $exclude = "") {
$hyperQuery = "SELECT distinct * FROM messages ORDER by score"; 
$hyperResult = mysql_query($hyperQuery) or die(mysql_error);
$match = "none";
$matchrank = 0;
$untrim_string = " ". $string . " ";
while($hyperRow = mysql_fetch_array($hyperResult)){
$topic = $hyperRow['topic'];
$untrim_topic = " ". $topic . " ";
$rank = $hyperRow['score'];
if (strlen($topic) > 2 and strtolower($topic) != strtolower($exclude) and stristr($untrim_string, $untrim_topic) != false and $rank > $matchrank) 
{$match = $topic; $matchrank = $rank;}
}
$url = "http://www.dirtpage.com/page.php?topic=" . str_replace(" ", "+", $match); 
$link = "<a class=\"card\" href = \"$url\">" . $match . "</a>";
$hyper_string = str_ireplace($match, $link, $string);
return strtolower($hyper_string);}




function undert ($string, $topic) {


$link = "<span><u>" . ($topic) . "</u></span>";
$under_string = str_ireplace(ucwords($topic), $link, $string);
return ucwords($under_string);}


function underm ($string, $topic) {


$link = "<span><u>" . strtolower($topic) . "</u></span>";
$under_string = str_ireplace($topic, $link, $string);
return strtolower($under_string);}








class SimpleImage {
   
   var $image;
   var $image_type;
 
   function load($filename) {
      $image_info = getimagesize($filename);
      $this->image_type = $image_info[2];
      if( $this->image_type == IMAGETYPE_JPEG ) {
         $this->image = imagecreatefromjpeg($filename);
      } elseif( $this->image_type == IMAGETYPE_GIF ) {
         $this->image = imagecreatefromgif($filename);
      } elseif( $this->image_type == IMAGETYPE_PNG ) {
         $this->image = imagecreatefrompng($filename);
      }
   }
   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image,$filename,$compression);
      } elseif( $image_type == IMAGETYPE_GIF ) {
         imagegif($this->image,$filename);         
      } elseif( $image_type == IMAGETYPE_PNG ) {
         imagepng($this->image,$filename);
      }   
      if( $permissions != null) {
         chmod($filename,$permissions);
      }
   }
   function output($image_type=IMAGETYPE_JPEG) {
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {
         imagegif($this->image);         
      } elseif( $image_type == IMAGETYPE_PNG ) {
         imagepng($this->image);
      }   
   }
   function getWidth() {
      return imagesx($this->image);
   }
   function getHeight() {
      return imagesy($this->image);
   }
   function resizeToHeight($height) {
      $ratio = $height / $this->getHeight();
      $width = $this->getWidth() * $ratio;
      $this->resize($width,$height);
   }
   function resizeToWidth($width) {
      $ratio = $width / $this->getWidth();
      $height = $this->getheight() * $ratio;
      $this->resize($width,$height);
   }
   function scale($scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getheight() * $scale/100; 
      $this->resize($width,$height);
   }
   function resize($width,$height) {
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image = $new_image;   
   }      
}




?>