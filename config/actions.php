<?php
require_once('config.php');

if(isset($_GET['action'])){
	$actions=$_GET['action'];
	switch ($actions) {
		case 'logout':
			 logout();
			 header("Location: http://$_SERVER[SERVER_NAME]/~s202999/abb58d/index.php");
			 break;
		// case 'newreserve':
			// //echo 'sdfasdf';exit;
			// echo '<script  language=javascript>
					 // window.location = "../ResNew.php";
				// </script>';
			 //header("Location: ../ResNew.php");
			break;
		case 'delete':
			echo '<script  language=javascript>
					 window.location = "../delete.php?id='.$_GET['id'].'";
				</script>';
		    //header("Location: ../delete.php?id=".$_GET['id']);
			break;	
	}

}

?>