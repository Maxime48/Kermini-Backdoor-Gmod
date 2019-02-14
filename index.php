<?php

	// SourceQuery
	require( __DIR__ . '/SourceQuery/SourceQuery.class.php');
	// Database Settings
	$Database_Host 		= "sql.mtxserv.com";
	$Database_Database 	= "157071_sql";
	$Database_Username 	= "w_157071";
	$Database_Password	= "Ps0820max";
	
	// Page Settings
	$Title		= "Panel";
	$Color		= "Dark"; // White, Blue, Green, Sky, Orange, Red, Dark
	
	$PageTitle	= "KerminiDRM";
	
	// Language
	$T_ServerList = "Kermini Server List";
	$T_BanList = "_NIL_";
	
	$S_IP = "IP";
	$S_ServerName = "Server Name";
	$S_Gamemode = "Gamemode";
	$S_Map = "Map";
	$S_Players = "Players";
	$S_Update = "Join Date";
	$S_First = "First Players";
	
	//$B_SteamID = "SteamID";
	//$B_IGN = "IGN";
	//$B_Reason = "Reason";
	//$B_Expires = "Expires";
	//$B_Admin = "Admin";
	
	// Connect MySQL
	try
	{
		$db = new PDO('mysql:host=' . $Database_Host . ';dbname=' . $Database_Database, $Database_Username, $Database_Password);
	}catch(PDOException $e){
		die("Failed to connect to database! Please check the database settings.");
	}
	
	// Color
	if($Color=="White"){$PColor="default";}elseif($Color=="Blue"){$PColor="primary";}
	elseif($Color=="Green"){$PColor="success";}elseif($Color=="Sky"){$PColor="info";}
	elseif($Color=="Orange"){$PColor="warning";}elseif($Color=="Red"){$PColor="danger";}
	elseif($Color=="Dark"){$PColor="dark";}
	
?>
<!DOCTYPE html>
<html>
	<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    	<title><?php echo $PageTitle; ?></title>
        
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <linl rel="stylesheet" type="text/css" href="css/widget.bootstrap.css">
        <link href='http://fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,500,800' rel='stylesheet' type='text/css'>
        
        <!-- Javascript -->
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    	<script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/jquery.tablesorter.js" type="text/javascript"></script>
        <script src="js/jquery.tablesorter.widgets.js" type="text/javascript"></script>
        <script src="js/jquery.tablesorter.run.js" type="text/javascript"></script>
		
    </head>
	<body style="background-image:url(img/shattered.png);">
    
    <div class="container">
    	
        <center>
        	<h1 style="font-family: 'Alegreya Sans SC', sans-serif;">
            	<span class="label label-<?php echo $PColor; ?>" style="padding:.2em .6em .2em;"><b><?php echo $Title; ?></b></span>
            </h1>
		</center><br/>
        
        <!-- Servers -->
        <div class="panel panel-<?php echo $PColor; ?>">
		<div class="panel-heading"><b><?php echo $T_ServerList; ?></b></div>
        <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th><?php echo $S_IP; ?></th>
                <th><?php echo $S_ServerName; ?></th>
                <th><?php echo $S_Gamemode; ?></th>
                <th><?php echo $S_Map; ?></th>
                <th><?php echo $S_Players; ?></th>
				<th><?php echo $S_Update; ?></th>
				<th><?php echo $S_First; ?></th>
              </tr>
            </thead>
            <tbody>
            	<?php
				
					// Select Bans
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
								<td><a href='steam://connect/" . $PrintServers['IPAddress'] . ":" . $PrintServers['Port'] . "'>" . $PrintServers['IPAddress'] . ":" . $PrintServers['Port'] . "</a></td>
								<td>" . str_replace("_", " ", $PrintServers['HostName']) . "</td>
								<td>" . htmlspecialchars($ServerInfo['ModDesc']) . "</td>
								<td>" . htmlspecialchars($ServerInfo['Map']) . "</td>
								<td>" . htmlspecialchars($ServerInfo['Players']) . " / " . htmlspecialchars($ServerInfo['MaxPlayers']) . "</td>
								<td>" . $PrintServers['LastUpdate'] . "</td>
								<td>" . $PrintServers['Players'] . "</td>
							</tr>
						";
							
					}
					
				?>
            </tbody>
        </table>
        </div>
        <!-- ./Servers -->
            </tbody>
        </table>
        </div>  
    </div>
    
    </body>
</html>