<?php
require_once('config/config.php');

if(islogin()){
if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) {
  header("Location: https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
  exit();
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Distributed Programming Project</title>
<link rel="stylesheet" href="imgs/style.css" />
<script type="text/javascript" src="script.js"></script>
</head>
<body>
<?php
if (!isset($_SERVER['HTTP_COOKIE'])){
echo "Error!!<br> 
Cookie disabled on your browser,Please enable it!";
}
?>
<noscript>
<div class="label" align="left">
Your browser does not seem to use JavaScript to use the most functionality of this website!!<br>
Please enable JavaScript on your Browser.
</div>
</noscript>
<header>
<h1>Contacts Management</h1>
</header>

<div id="container">
<article>
<header>
<h1>Error</h1>
</header>
<?php
if(isset($_GET['type'])){

switch ($_GET['type']){
	 case "java":
      echo "You don't have javascript enabled! Please download Google Chrome!";
	  break;
	 case "cookie":
	  echo "You don't have cookie enabled! Please download Google Chrome!";
	  break;
	 case "username": 
	 echo "your username is duplicated";
	  break;
	  case "delete": 
	 echo "record couldn't be deleted ";
	  break;
	 }
}	 
?>

<footer>
</footer>
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