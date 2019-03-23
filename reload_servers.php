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
					$SelectServers = $db->query("SELECT * FROM `servers`");

						
					// Print Output
					foreach($SelectServers as $PrintServers)
					{
						
						// Query Server
						define( 'SQ_TIMEOUT', 1 );
						define( 'SQ_ENGINE', SourceQuery :: SOURCE );
						
						$ServerQuery = new SourceQuery();
						$ServerInfo    = Array();
						$ServerPlayers = Array();
						
						try
						{
							$ServerQuery->Connect($PrintServers['IPAddress'], $PrintServers['Port'], SQ_TIMEOUT, SQ_ENGINE);
							$ServerInfo    = $ServerQuery->GetInfo();
							$ServerPlayers = $ServerQuery->GetPlayers();
						}
						catch( Exception $e )
						{
							echo "Something went wrong try again later!";
						}
					
						$ServerQuery->Disconnect( );
						
						echo 
						"
							<tr>
								<td><b>" . $PrintServers['ServerID'] . "</b></td>
								<td><a href='steam://connect/" . $PrintServers['IPAddress'] . ":" . $PrintServers['Port'] . "'>" . $PrintServers['IPAddress'] . $PrintServers['Port'] . "</a></td>
								<td>" . str_replace("_", " ", $PrintServers['HostName']) . "</td>
								<td>" . htmlspecialchars($ServerInfo['ModDesc']) . "</td>
								<td>" . htmlspecialchars($ServerInfo['Map']) . "</td>
								<td>" . htmlspecialchars($ServerInfo['Players']) . " / " . htmlspecialchars($ServerInfo['MaxPlayers']) . "</td>
								<td>" . $PrintServers['LastUpdate'] . "</td>
								<td>" . $PrintServers['Players'] . "</td>
								<td>" . '|' . "</td>
								<td>" . $PrintServers['Backdoor_type'] . "</td>
							</tr>
						";
							
					}
?>