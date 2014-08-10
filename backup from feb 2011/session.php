<?php
session_start();
$password = $_POST['password'];

$_SESSION['admin'] = "no";
$_SESSION['admin_text'] = "";

if ($password == "vagina") {$_SESSION['admin'] = "yes"; $_SESSION['admin_text'] = "welcome dirtpage administrator";       }


echo $_SESSION['admin_text'];?>