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
<script language="javascript" type="text/javascript">
function show_confirm(Id)
{
	
	var r=confirm("Are you sure?!!!");
	if (r==true)
	  {
			window.location = ('delete.php?resId=' + Id);
	  }
	else
	  {
	  window.location="index.php";
	  }
}
</script>
</head>
<body>
<?php
if (!isset($_SERVER['HTTP_COOKIE']))
{
echo "Error!!<br> Cookie disabled on your browser,Please enable it!";
}
?>
<noscript>
<div class="label" align="left">
Your browser does not seem to use JavaScript to use the most functionality of this website!!<br>
Please enable JavaScript on your Browser.
</div>
</noscript>
<header>
<h1>Device Booking Management</h1>
</header>

<div id="container">
<article>
<header>
<?php 
if(islogin()) 	echo '<h1>List Of Bookings</h1>';
else 	echo '<h1>List Of Bookings</h1>';
?>
</header>
<table width="100%">
<tr>
	<?php 
			echo '<td>RowNo</td>
				  <td>Device Number</td>
				  <td>Starting Time</td>
				  <td>Duration</td>
				  <td>Ending Time</td>';
		  
	?>
</tr>

<?php

$query = "SELECT * from tblreservation   ORDER BY StartSeedIndex ";
if ($result = $db->query($query)) 
{
	$counter=1;
	while ($elm= mysqli_fetch_array($result))
	{
		echo '<tr>';
		echo '<td>'. $counter . '</td>';
		echo '<td>'. $elm['DeviceId'] . '</td>';
		echo '<td>'. $elm['StartHour'] . ':'. $elm['StartMin'] . '</td>';
		echo '<td>'. $elm['durationTime'] . '</td>';			
		echo '<td>'. $elm['EndHour'] . ':'. $elm['EndMin'] . '</td>';
		echo '</tr>';
	
		$counter++;
	}
	$result->close();
}



?>
</table>

<table>
<?php
$query = "SELECT count(*) as countuser from tblreservation ";
if ($result = $db->query($query)) 
{
	while ($elm= mysqli_fetch_array($result))
	{
		echo '<tr>';
		if(!islogin())
		{
			echo '<td>Total Number Of Reservations : </td>';
			echo '<td>'. $elm['countuser'] . '</td>';
		}
	}
    $result->close();
}
?>
</table>

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