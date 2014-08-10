<?php include("phpfunctions.php"); ?>
  
  
  







<html>

<head>

<meta name="description" content="Dirtpage is a free, anonymous, automatic, accumulative, messageboard-ish encyclopedia of brilliance, humor, and crap. SEARCH for anything. Instantly POST anything about anything (or anyone) in order to inform, explain, collaborate, entertain, warn, praise, tease, tickle, vent, or confess.">


<meta name="keywords" content="dirtpage wikipedia facebook">
<title> dirtpage </title>
<link rel="stylesheet" href="styles.css" type="text/css">




<?php

$theirName = $_GET['topic'];
$messageNumber = $_GET['message'];
$act = $_GET['act'];
$newMessage = $_GET['newmessage'];

mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error()); ?>




<?php include("google.php"); ?>
 



 

</head>
<body><br><BR><BR><BR>
<div id="ticker">   </div>

<span id="dirtpage1"><center><span     style="font-size:1000%">   <a href="http://www.dirtpage.com/sitemap.php">  <span style="color: green">dirt</span><span style="color:white">page</span></span></a>
<br><br><br><br><br><br><!--span class = "database"> global </span>&nbsp;-->

</span>


<center>
<h5>
<form name="form1" action="search.php" method="get" onSubmit="search();return false;" >
<input type="text" name="topic" size="28" value="" maxlength="25" >

<input type="submit" value="search dirtpage">
</form>
</h5>
</center>     

<center>
<h4>
<span style="color:blue">




<A HREF="http://www.dirtpage.com/nav/about">about</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="http://www.dirtpage.com/feedviewer">recent</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--<A HREF="http://www.dirtpage.com/nav/active">active</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<A HREF="http://www.dirtpage.com/nav/random">random</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="http://www.dirtpage.com/nav/busy">prolific</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="http://www.dirtpage.com/nav/ratings">ratings</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!-- <A HREF="http://www.dirtpage.com/nav/disputed">disputed</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
<!-- <<A HREF="http://www.dirtpage.com/maze.php">play</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<A HREF="http://www.dirtpage.com/nav/featured">featured</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--<A HREF="http://www.dirtpage.com/feedviewer">feed</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<A href="mailto:dirtpage1@gmail.com?">contact</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 

</span>
</h4>
<!--
<br><br><br><br><br><br><hr>

what is dirtpage.com?

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
create new dirtpage
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<A href="mailto:jason.yanofski@gmail.com?">contact</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</center>-->


<script type="text/javascript" src="http://www.dirtpage.com/jq.js"></script>

<script type="text/javascript" src="http://www.dirtpage.com/jsfunctions.js"></script>

<script type="text/javascript">


header();

$('#dirtpage').animate({opacity: 0.5}, 0);
$.get("http://www.dirtpage.com/topfeed.php", function(data) {
$('#feeed').html(data);  });
  

setInterval( "refresh();", 5000 );  ///// REPEAT THE FOLLOWING OVER AND OVER AND OVER!!!
$(function() {refresh = function(){
$('#dirtpage').animate({opacity: .25}, 2000);
$('#dirtpage').animate({opacity: 1}, 1000);
$.get("http://www.dirtpage.com/topfeed.php", function(data) {$('#feeed').html(data);  });}
});







</script>




 <!--SITE MAP!!!
0
1
2 PAC
8======>
a
Aaron Maddox
acupuncture
almost a sport
alphabet backwards
analfisting
andre 3000
andre petrikovets
Andre Stenzel
anna fritzsche
anonymity
anti-wikifacebook
ariele liez
Armen Carapetian
art
ashish raju
austin the dog
autism
bad first date comments
bananas
barack obama
bbq
bear (the person)
beer
best best topic
best free wallpaper sites
best new reality show
best pizza toppings
best topic ever
best TV character
Best TV show of all time
best villain ever
best weapons
big
big breasts
blackberries
bowling
BP
brian cooke
brian piatt
brown chicken brown cow
Burning man
butter
c
canadiana
capri sun
Captcha 
carrie underwood
cask
chad arkoff
chad spring
chaim katz
chanley martin
Charlie Long
chateaux
Cheese
chess
chinese people
chris morgan
christopher morgan
claudia pohl
cocozzella
comcast
confessions
contradictory haikus
coolest man alive
costa rica
crazy
creativity
CRNAs
dan cohen
Dan rhodes
dan yanofski
deborah
delicious
Derek
dinosaurs
dirtpag chance of success
dirtpage
dirtpage slogans
dirtpage uses
dirtpage.com
Do not mess this up
dog
dominatrix
donald fregans
Dortpage
DOsnot
Dr. Hayk Kaftarian
Drunken Sailor Activities
Dustin Byfuglien
dwelm
earth
ed kaftarian
eggs
Egypt 
emily clark
enough
esther fishman
ethan schur
everything
famous last words
farting
farts
fat people 
fish
football
Fred 
french fries
french people
french pussy
fresh squeezed oj
fridays
fried chicken
friendship island
fun
funny sounding words
genius
george bush
george pushchinsky
george washington
girls
god
google
goose
health care
heath miller
heather lowy
heather yanofski
heidi willems
hello
hi
hopkins psychiatrists
hot girls
houses
how to be a millionaire
how to save the world
humans
hungry hungry hippos
hyphenated
i really hate
icicles
idiots
if jason is dead
indian men
indians and jews
instructions
invention ideas
Iphone
iphones
ironic if transparent
jaime parks
jason
jason dwyer
jason messeri
Jason rosenfeld
jason yanofski
jason yanofski best trait
jay
jay kerwin
Jennifer Lavoie
jews
Joe Cocozzella
John Babb
john paul caraballo
jokes
juan carlos
Kaiser Heights
katharina klug
Kimberly Mitman
kjdaf;dasjf
knock knock
Kodi the dog
kristin forester
laura jakal
laura jakul
law
lazy ass uneducated
lazy ass uneducated idiot
leah malberg
leigh flanagan
lisa faer
LOL Cats
lost
lost finale
lucas cheadle
lucky numbers
man
matt rosenfeld
melissa
menstrual wisdom
michael gonano
michael jackson
michelle obama
milene
Milene Fregans
miriam raselbach
Mitchell martin
moles
moms
Monkey wrench
Morgan
movie: being john malcovich
muscle milk
mySQL
naked
neil roy
nibiru
Nicholas donahoe
Nicholas Donoghoe
no
No lemons, no melon
Nothing
obama
oil
OLD DIRT PAGE POST FORMAT
onenote
open
oren
oren marciano
palindrome
patricia roy
Patrick fox
paul
paul kursky
penelope feyers
people
pepperidge farm cookies
person
peter
Phil
physical therapy
pickle
porn
porno
Post quickly
president
Presidents in order
Prince of Persia
psychiatry
puerto rico
puppies
racecar
random
Raoul Bhatta
rob dholaria
Rugby
rupali
ryan scanlon
sadaf hashmi
sam bagot
samuel goldsmith
san francisco
San Quentin State Prison
scientists
scott beaver
scott shapiro
scott yanofski
sean mathew
self-referential words
Sentence that is country
Serif Fonts
sex
sexiest man ever 
sexiest woman ever
sexy
shana zaia
shane feyers
Shane Konrad
Sharyn
shoes
sitemap
sleep
slore
slores
slut
sluts
small pussy
Splice
sports bad if on fire
squash
Stacey Weger
start here
stephania halikas
stephen colbert
stop copying me
Streetfighter : Legend of Chun Li
stupid idiots
svetlana williams
tae lee
tea baggers
the dirtpage guys
the end
the future
the human brain
the man
things not to do naked
Things that annoy me
things to do before i die
this page sucks
this site
this website
thomas
thomas schaufbauer
Thursdays
to get to the other side
tradd yancey
truest stereotype
tuxedo size
type faster
ugliest celebrity
underappreciated cities
university of maryland
unknown facts
USA Soccer Team
vomit
Warren Lastnameless
water
water balloons
weird outfit to a funeral
west orange nj
what would jesus do
what would jesus do?
when i get stoned
where do you live?
White people +
who made this site
who made this site?
why i have no girlfriend
Why not?
Will dirtpage get huge?
will ferrell
wine
would make worst hat
yale
yano
yanofski
Yanofsky
yo momma
You can only do this once
Your mom is so fat, that
Your momma
zucchini-->

 
 
</body>
