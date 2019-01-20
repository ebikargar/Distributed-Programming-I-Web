<?php
require_once('config/config.php');
  
    $name = $_POST['name'];
    $Fname = $_POST['Fname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];
	
	if($password != $password1) 
	{
		echo '<script  language=javascript>
					alert("You must enter the same values for password boxes");
					 window.location = "register.php";
				</script>';
				exit;
	}
	
	
//prevent Sql injection	
   $name = $db->real_escape_string(trim($name));
   $Fname = $db->real_escape_string(trim($Fname));
   $email = $db->real_escape_string(trim($email));
   $password = $db->real_escape_string(trim($password));	
	//$password = hash('sha512', $password . $salt);

/* set autocommit to off */
//$db->autocommit(FALSE);

$flag=true;
$query = "select count(*) as countTitle from registration where email='".$email."'";
if ($result = $db->query($query)) 
{
	if ($elm= mysqli_fetch_array($result))
		if($elm['countTitle'] >= 1)
		{
			$flag=false;
			 echo '<script  language=javascript>
						alert("repeated Username");
						 window.location = "register.php";
					</script>';	
		}
} 

if($flag)
{
	$sql ="INSERT INTO registration (email, password,name,fname) VALUES ('$email','$password','$name','$Fname');";
	 if ($db->query($sql) === TRUE) {
		echo '<script  language=javascript>
				alert("New record created successfully");
				 window.location = "index.php";
			</script>';
		die();
	} else {
		echo "Error: " . $sql . "<br>" . $db->error;
		header("Location: register.php");
	}
	$db->close();
}



?>