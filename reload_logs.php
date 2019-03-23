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
            $reponses = $db->query('SELECT * FROM logs');
             while ($satanis = $reponses->fetch())
             {
	         echo 'Log ID : ', $satanis['log_id'] . ' | ', $satanis['What'], '</br>';
             } 
?>