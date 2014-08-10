<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">



 


<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> Playing with jquery</title>


<script src="jq.js" type="text/javascript"></script>



 <script type="text/javascript">
 
     $(document).ready(function(){
		 
		 
       $("a").click(function(event){
     
	     alert("As you can see, the link no longer took you to jquery.com");
         event.preventDefault();
		 $("body").load("up.jpg");
		 
       });
     
	 });
     
  
  
  
  
   </script>
 
 
 
 
 </head>
 <body>
   <a href="http://jquery.com/">jQuery</a>
 </body>
 </html>