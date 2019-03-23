<?php
include('class/include.php');
$Database_Host = $GLOBALS['mysql_host']; // usually localhost

$Database_Database = $GLOBALS['mysql_database']; // The Database name

$Database_Username = $GLOBALS['mysql_username']; // The Username that has access to the database

$Database_Password = $GLOBALS['mysql_password']; // The Password for the user.

	try
	{
		$db = new PDO('mysql:host=' . $Database_Host . ';dbname=' . $Database_Database, $Database_Username, $Database_Password);
	}catch(PDOException $e){
		die("Failed to connect to database! Please check the database settings.");
	}
	
	// Preparing Values to Send
	
	$chat_username = $_POST['username'];
	
	$chat_message = $_POST['message'];
	 
    $req = $db->prepare('INSERT INTO `chat` (`Text`, `member`) VALUES ("'.$chat_message.'","'.$chat_username.'");');
    
	$req->execute();
   
?>