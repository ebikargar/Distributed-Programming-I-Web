<?php 

require_once('config/config.php');
$userid=$_SESSION['UserId'];

$id=$_GET['resId']; //should be check for sql injection
$id = $db->real_escape_string(trim($id));	
$userid = $db->real_escape_string(trim($_SESSION['UserId']));	

date_default_timezone_set("Europe/Rome");
$time = explode(':', date("h:i:A"));
if($time[2] == 'PM' || $time[2] == 'pm')
	 $current_StartSeedIndex = $time[0]*60 + $time[1] + 720;
else 
	$current_StartSeedIndex = $time[0]*60 + $time[1];
$query = "SELECT * from tblreservation  where 	ResId = '".$id."'  ";

if ($result = $db->query($query)) 
{
	if ($elm= mysqli_fetch_array($result))
	{
		$dbs_StartSeedIndex = $elm['StartSeedIndex'];
		
		if($current_StartSeedIndex - $dbs_StartSeedIndex > 1)
		{
				echo '<script  language=javascript>
					alert("Error: Impossible to assign try again in different time");
					 window.location = "mylist.php";
				</script>';
				  //header("Location: mylist.php");
				  exit;
		}
		
	}
}



$query = "DELETE from `tblreservation` where  `UserId`='$userid' AND `ResId`='$id' ";
if($db->query($query)){
  header("Location: mylist.php");
}else{
    header("Location: error.php?type=delete");
}
?>