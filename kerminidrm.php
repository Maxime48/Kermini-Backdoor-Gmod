<?php
$iplogfile = 'ip-address-mainsite.html';
$ipaddress = $_SERVER['REMOTE_ADDR'];
$webpage = $_SERVER['QUERY_STRING'];
$timestamp = date('d/m/Y h:i:s');
$browser = $_SERVER['HTTP_USER_AGENT'];
$fp = fopen($iplogfile, 'a+');
chmod($iplogfile, 0777);
fwrite($fp, '['.$timestamp.']: '.$ipaddress.' '.$webpage.' '.$browser. "\n<br><br>");
fclose($fp);
?>