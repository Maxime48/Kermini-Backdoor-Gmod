<?php
include('class/include.php');
// Change this to your connection info.
$DB_HOST = $GLOBALS['mysql_host']; // usually localhost
$DB_NAME = $GLOBALS['mysql_database']; // The Database name
$DB_USER = $GLOBALS['mysql_username']; // The Username that has access to the database
$DB_PASS = $GLOBALS['mysql_password']; // The Password for the user.
// Try and connect using the info above.
    $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$id = $_POST['delete'];
	Payload::DeletePayload($id);
	 $log_what1 = ' Deleted Payload : '. $id . ' | When : ';
	 $log_what2 = $log_what1 . date("Y-m-d H:i:s");
	 $log_what = $_SESSION['name'] . $log_what2;
	 Server::LogAddNew($log_what);
	echo '<meta http-equiv="refresh" content="2; url=index.html" />redirection to login page';
	$mysqli->close();
?>