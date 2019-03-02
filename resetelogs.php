<?php
include('class/include.php');
	 $log_user = $_SESSION['name'];
	 $log_what1 = ' Deleted log : '. $_POST['deletelogs'] . ' | When : ';
	 $log_what2 = $log_what1 . date("Y-m-d H:i:s");
	 $log_what = $_SESSION['name'] . $log_what2;
	 Server::LogAddNew($log_what);
	 
				 $GLOBALS['DB']->Delete("logs", ["log_id" => $_POST['deletelogs']]);
            
		 echo '<meta http-equiv="refresh" content="2; url=index.html" />LOG' . $_POST['deletelogs'] . 'reseted (if not : check what you typed)';	

?>
