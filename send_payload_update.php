<?php
include('class/include.php');
// Change this to your connection info.
$DB_HOST = '';
$DB_USER = '';
$DB_PASS = '';
$DB_NAME = '';
// Try and connect using the info above.
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($mysqli->connect_errno) {
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to MySQL: ' . $mysqli->connect_errno);
}
// Now we check if the data was submitted, isset will check if the data exists.
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	// Could not get the data that should have been sent.
	die ('Please complete the payload registration form!<br><a href="index.html">Back</a>');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
	// One or more values are empty...
	die ('Please complete the payload registration form!<br><a href="index.html">Back</a>');
}

// We need to check if the account with that username exists
if ($stmt = $mysqli->prepare('SELECT payloadID , content FROM payload WHERE ServerID  = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute(); 
	$stmt->store_result(); 
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		echo 'Username exists, please choose another!<br><a href="index.html">Back</a>';
	} else {
	 $serverid = $_POST['username'];
	 $content = $_POST['password'];
	 $description = $_POST['email'];
	 // convert
	 $log_what1 = ' added : ' . $_POST['email'] . ' | When : ';
	 $log_what2 = $log_what1 . date("Y-m-d H:i:s");
	 $log_what = $_SESSION['name'] . $log_what2;
	 Payload::CreatePayload($serverid, $content, $description);
	 Server::LogAddNew($log_what);
     echo '<meta http-equiv="refresh" content="100; url=index.html" />redirection to login page';
	 echo $log_what;
	}
	$stmt->close();
} else {
	echo 'Could not prepare statement!';
}
$mysqli->close();
?>