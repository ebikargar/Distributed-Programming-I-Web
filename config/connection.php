<?php
ob_start();
//if (session_status() == PHP_SESSION_NONE) {
if (session_id() == '') 
{
    session_start();
	if(isset($_SESSION['time']))
	{
		$t0=$_SESSION['time'];
		$t1=time();
		if(($t1-$t0)>120)
		{
			session_unset(); 	
			session_destroy(); 
		}else{
			$_SESSION['time']= time(); /* update time */
		}		
	}
	if(!isset($_SESSION['UserId']))
	{
		$_SESSION['UserId']="";	
	}
	
		
}

$db = new mysqli($server, $userdb, $passdb, $dbname);

if ($db->connect_errno>0) {
    die('Unable to connect to database [' . $db->connect_error . ']');
}
/*if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}*/
?>