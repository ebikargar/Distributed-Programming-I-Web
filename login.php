<?php
require_once('config/config.php');

//if($_POST['login'])) {
if($_POST['action']=="login") 
{
	$email =  $db->real_escape_string(trim($_POST['email']));;
	$password =  $db->real_escape_string(trim($_POST['password']));;

	$sql = "SELECT * FROM registration WHERE email='$email' AND password='$password'";

	$result = $db->query($sql);
	$num_row = mysqli_num_rows($result);
	$row=mysqli_fetch_array($result);
	if( $num_row ==1 )
	 {		
			$_SESSION['UName'] = $_POST['name'];
			$_SESSION['UFname'] = $_POST['Fname'];
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['UserId'] = $row['RegId'];
			$_SESSION['time']=time();
			header("Location: mylist.php");
			exit();
	}
	else
	{
		echo "Login Failed: (" . $db->errno .")" . $db->error;
		header("Location: index.php");
	}
}
$db->close();

?>