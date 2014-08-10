<?php

// Start the session
session_start();

// set STATIC variables

//connect database
mysql_connect("dirtpage1.db.6263223.hostedresource.com", "dirtpage1", "Jason7734") or die(mysql_error());
mysql_select_db("dirtpage1") or die(mysql_error());



// Seed the random number generator
srand();



// Include functions


include_once 'phpfunctions.php';
include_once 'datacalls.php';





?>