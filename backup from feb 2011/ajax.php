 
  
Home
Web Tutorials
Beginner Tutorial
HTML Tutorial
CSS Tutorial

Scripting
Javascript Tutorial
PHP Tutorial
Perl Tutorial
Ajax Tutorial
ASP Tutorial
VBScript Tutorial

Databases
SQL Tutorial
MySQL Tutorial

Miscellaneous
XML Tutorial
Webhost Tutorial
Flash Tutorial
SEO Tutorial
Ajax Tutorial
Ajax - Tutorial
Ajax - Form
Ajax - Browser Support
Ajax - XMLHttpRequest
Ajax - PHP
Advanced Ajax
Ajax - MySQL
Ajax - Javascript
Get Help!
Ajax Forum
Contact Us


ajax - server-side php script
We completed the "order.html" file in the Previous Lesson, but we had our Ajax linking to a PHP script that did not yet exist. This lesson will walk you through the process of creating a simple PHP script that displays the current server time.


Advertise on Tizag.com
ajax - servertime.php file
The XMLHttpRequest property, responseText, will store the data that this PHP script displays to the browser, so all we want this script to do is Echo the current time. If you would like a refresher on how to use PHP's date function, you can check out our PHP Date Tutorial. The php code below should be saved in the same directory as "order.html".

serverTime.php PHP Code:
<?php
echo date("H:i:s"); 
?>
ajax - run your ajax!
Below is a working version of the simple, yet super cool, Ajax application you have just created! To test it out just type some text into the "Name:" text box, then click inside the "Time:" text box.

Display of order.html:
Name:  
Time: 
Sweet! The time text box pulled down the server's time from "serverTime.php" without having to reload the entire page! Congratulations you've just written your first fully-functional Ajax application!

ajax - continued learning
That's all for now folks! If you're feeling adventerous about taking your Ajax skills to the next level, then I highly recommend you check out IBM's Master Ajax Series.


 



Go Back
Continue


found something wrong in this lesson?
Report a Bug or Comment on This Lesson - Your input is what keeps Tizag improving with time!

Web Reference
HTML Reference
CSS Reference
CSS Examples
PHP Examples
Help Tizag Grow
Link to Tizag
New - Tizag.com Forums!
Recent Forum Topics:
- Progressive downloads not happening 
- Calling the same template recursively 
- XSL variables 
- If Query isnt Done Reply N/A 

Advertise Here



More Tutorials! 
Microsoft Office Tutorials
Artist Tutorials
2003-2008 Erack Network | Copyright | Privacy Policy | Advertising Information 
Site design by Seattle Web Design