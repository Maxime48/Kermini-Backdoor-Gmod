<?php
include('class/include.php');
// Change this to your connection info.
$DB_HOST = '';
$DB_USER = '';
$DB_PASS = '';
$DB_NAME = '';
// Try and connect using the info above.
    $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$id = $_POST['delete'];
	Payload::DeletePayload($id);	
	echo '<meta http-equiv="refresh" content="2; url=index.html" />redirection to login page';
	$mysqli->close();
?>