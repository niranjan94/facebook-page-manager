<?php
$ACCESS_TOKEN=$_POST['pagetoken'];
$message=$_POST['message'];
$url = 'http://testing.kovaideals.com/ac/fbpost.php';
$data = array('message' => $message, 'pagetoken' => $ACCESS_TOKEN);
// use key 'http' even if you send the request to https://...
$options = array('http' => array('method'  => 'POST','content' => http_build_query($data)));
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
?>