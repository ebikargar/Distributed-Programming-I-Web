<?php
require_once('config/config.php');
  
$StartHrs = $_POST['StartHrs'];
$StartMins = $_POST['StartMins'];
$Duration = $_POST['Duration'];

if($_SESSION['UserId'] == '') 
{
	echo '<script  language=javascript>
				alert("You must Sign In");
				 window.location = "ResNew.php";
			</script>';
	exit;
}
if($StartHrs < 0 || $StartHrs>23) 
{
	echo '<script  language=javascript>
				alert("You must enter the houre [0,23]");
				 window.location = "ResNew.php";
			</script>';
	exit;
}
	
if($StartMins < 0 || $StartMins>59) 
{
	echo '<script  language=javascript>
				alert("You must enter the minute [0,59]");
				 window.location = "ResNew.php";
			</script>';
	exit;
}
	
if($Duration < 0 || $Duration>1440) 
{
	echo '<script  language=javascript>
				alert("You must enter the Duration minute [0,1440]");
				 window.location = "ResNew.php";
			</script>';
	exit;
}
	
	
//prevent Sql injection	
   $StartHrs = $db->real_escape_string(trim($StartHrs));
   $StartMins = $db->real_escape_string(trim($StartMins));
   $StartSeedIndex =  $StartHrs * 60 + $StartMins;
   $Duration = $db->real_escape_string(trim($Duration));
   $EndSeedIndex =  $StartSeedIndex +  $Duration ;
   $StartSeedIndex = $db->real_escape_string(trim($StartSeedIndex));
   $EndSeedIndex = $db->real_escape_string(trim($EndSeedIndex));

   $EndHour = (int)($EndSeedIndex / 60); $EndHour %= 24;
   $EndMin = $EndSeedIndex % 60;
   $EndHour = $db->real_escape_string(trim($EndHour));
   $EndMin = $db->real_escape_string(trim($EndMin));
	//$password = hash('sha512', $password . $salt);

/* set autocommit to off */
//$db->autocommit(FALSE);

$flag=true;
$SelectedDevice = 0;
$ErrorNumber=0; // nothing
for($i=1; $i <= $NumOfFixedSrc; $i++)
{
	$SelectedDevice = $i;
	$ErrorNumber=0; // nothing
	$flag = true;;
	 $query = "SELECT * FROM `tblreservation` WHERE `DeviceId` = '".$i."'";
	if ($result = $db->query($query)) 
	{
		 while ($elm= mysqli_fetch_array($result))
		 {
			//$flag = true;;
			$DBS_StartSeedIndex = $elm['StartSeedIndex'];
			$DBS_EndSeedIndex = $elm['EndSeedIndex'];
			
			//echo ' <br> <br> <br>DBS_StartSeedIndex = '.$DBS_StartSeedIndex .' , DBS_EndSeedIndex = '.$DBS_EndSeedIndex;
			//echo ' <br> StartSeedIndex = '.$StartSeedIndex .' , EndSeedIndex = '.$EndSeedIndex;
						
			if($StartSeedIndex <= $DBS_StartSeedIndex && $StartSeedIndex <= $DBS_EndSeedIndex &&  $EndSeedIndex >= $DBS_StartSeedIndex && $EndSeedIndex <= $DBS_EndSeedIndex ){	$flag = false;	$ErrorNumber = 1; /*1 */ }	
			if($StartSeedIndex <= $DBS_StartSeedIndex && $StartSeedIndex <= $DBS_EndSeedIndex &&  $EndSeedIndex >= $DBS_StartSeedIndex && $EndSeedIndex >= $DBS_EndSeedIndex ){	$flag = false;	$ErrorNumber = 2; /*2 */ }	
			if($StartSeedIndex >= $DBS_StartSeedIndex && $StartSeedIndex <= $DBS_EndSeedIndex &&  $EndSeedIndex >= $DBS_StartSeedIndex && $EndSeedIndex <= $DBS_EndSeedIndex ){	$flag = false;	$ErrorNumber = 3; /*3 */ }	
			if($StartSeedIndex >= $DBS_StartSeedIndex && $StartSeedIndex <= $DBS_EndSeedIndex &&  $EndSeedIndex >= $DBS_StartSeedIndex && $EndSeedIndex >= $DBS_EndSeedIndex ){	$flag = false;	$ErrorNumber = 4; /*4 */ }	
			
			//echo ' <br> ErrorNumber = '.$ErrorNumber.'  , DeviceId = '.$i;
			//if(!$flag)	break;
		}
	} //else $flag = false;
	//echo 	'i'.$i.' ER'.	$ErrorNumber;
	if($flag)	
	{
		$sql ="INSERT INTO `tblreservation` (`UserId`, `DeviceId`, `StartHour`, `StartMin`, `durationTime`, `EndHour`, `EndMin`, `StartSeedIndex`, `EndSeedIndex`) 
			VALUES (".$_SESSION['UserId'].",".$SelectedDevice.",".$StartHrs.",".$StartMins.",".$Duration.",	".$EndHour.",".$EndMin.",".$StartSeedIndex.",".$EndSeedIndex.")";
		 if ($db->query($sql) === TRUE) {
			echo '<script  language=javascript>
					alert("New record created successfully");
					 window.location = "mylist.php";
				</script>';
			die();
		} else {
			echo "Error: " . $sql . "<br>" . $db->error;
			header("Location: ResNew.php");
		}
		$db->close();
	}
}

//echo 'aslkdjfhakjsdfkja';
//exit;
	echo '<script  language=javascript>
					alert("Error: Impossible to assign try again in different time"+ '.$ErrorNumber.');
					 window.location = "mylist.php";
				</script>';
	



?>