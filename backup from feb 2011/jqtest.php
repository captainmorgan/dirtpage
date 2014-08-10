
<?php include("functions.php"); ?>
<?php include("head.php"); ?>



 
 
 


<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> Playing with jquery</title>
    <script src="jq.js" type="text/javascript"></script>




 
 

<script type="text/javascript">
 

$(document).ready(function(){

	$("ul#ticker01").liScroll();
});
 

  </script>

</head>




<body>
<ul id="ticker01">
	<li><span>10/10/2007</span><a href="#">The first thing ...</a></li>
	<li><span>10/10/2007</span><a href="#">End up doing is ...</a></li>
	<li><span>10/10/2007</span><a href="#">The code that you ...</a></li>
	<!-- eccetera -->
</ul>

</body>
</html>