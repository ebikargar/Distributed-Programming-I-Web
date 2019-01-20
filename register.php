<?php
//if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) {
//  header("Location: https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
 //  exit();
//}
require_once('config/config.php');

if(!islogin()){
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Distributed Programming Project</title>
<link rel="stylesheet" href="imgs/style.css" />
</head>
<body>
<?php
if (!isset($_SERVER['HTTP_COOKIE'])){
echo "Error!!<br> 
Cookie disabled on your browser,Please enable it!";
}
?>
<noscript><meta http-equiv="refresh" content="0; url=error.php"></noscript>    
<header>
<h1>Device Booking Management</h1>
</header>
<div id="container">
<article>
<header>
<h1>User Registration</h1>
</header>
<div class="register">
			<form action="reg_user.php" method="post" id="frmReg">
				<input type="text"  placeholder="Name" id="name"  name="name" required><br>
				<input type="text"  placeholder="Last Name" id="Fname"  name="Fname" required><br>
				<input type="email"  placeholder="Email" id="email"  name="email" required><br>
				<input type="password" placeholder="Password" id="password" name="password"required><br>
				<input type="password" placeholder="Password1" id="password1" name="password1" onblur="check();" name="password1"required><br>
				<button type="submit" value="Submit" >Sign Up</button>
				<button type="reset" value="Reset">Reset</button>        
			</form>
        </div>
</article>

<?php 
include_once('menubar.php');

?>
</div>
<footer>
    <h1>© Designed and Implemented by: Ebrahim</h1>
</footer>
</body>
</html>
<?php }else{
   header("location: index.php");
}
?>

<script >
function check()
{
	var password = document.getElementById("password");
	var password1 = document.getElementById("password1");
	
	if(password.value != password1.value)
	{
		alert("You must enter the same values for password boxes: " );
		 document.getElementById("password").focus();
	}
		
		
}
</script>
