<?php
session_start();
$usertoken=$_GET['usertoken'];
$pagetoken=$_GET['pagetoken'];
$authcode=$_GET['authcode'];
$name=$_GET['name'];
setcookie("usertoken", $usertoken, time()+3600);
setcookie("pagetoken", $pagetoken, time()+3600);
setcookie("authcode", $authcode, time()+3600);
setcookie("name", $name, time()+3600);
$header_string='Location: http://example.com/admin.php';
header($header_string); 
?>