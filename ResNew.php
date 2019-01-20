<?php

//if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) {
//  header("Location: https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
 //  exit();
//}

require_once('config/config.php');

if(!islogin()){
header("Location: index.php");
}
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
<h1>User Reservation</h1>
</header>
<div class="register">
			<form action="ResNewCnf.php" method="post" id="frmReg">
				Hours: <select id="StartHrs"  name="StartHrs" >
					<option value="0"> 00</option>
					<option value="1"> 01</option>
					<option value="2"> 02</option>
					<option value="3"> 03</option>
					<option value="4"> 04</option>
					<option value="5"> 05</option>
					<option value="6"> 06</option>
					<option value="7"> 07</option>
					<option value="8"> 08</option>
					<option value="9"> 09</option>
					<option value="10"> 10</option>
					<option value="11"> 11</option>
					<option value="12"> 12</option>
					<option value="13"> 13</option>
					<option value="14"> 14</option>
					<option value="15"> 15</option>
					<option value="16"> 16</option>
					<option value="17"> 17</option>
					<option value="18"> 18</option>
					<option value="19"> 19</option>
					<option value="20"> 20</option>
					<option value="21"> 21</option>
					<option value="22"> 22</option>
					<option value="23"> 23</option>
				</select>
				Minutes: <select id="StartMins"  name="StartMins">
					<option value="0"> 00</option>
					<option value="1"> 01</option>
					<option value="2"> 02</option>
					<option value="3"> 03</option>
					<option value="4"> 04</option>
					<option value="5"> 05</option>
					<option value="6"> 06</option>
					<option value="7"> 07</option>
					<option value="8"> 08</option>
					<option value="9"> 09</option>
					<option value="10"> 10</option>
					<option value="11"> 11</option>
					<option value="12"> 12</option>
					<option value="13"> 13</option>
					<option value="14"> 14</option>
					<option value="15"> 15</option>
					<option value="16"> 16</option>
					<option value="17"> 17</option>
					<option value="18"> 18</option>
					<option value="19"> 19</option>
					<option value="20"> 20</option>
					<option value="21"> 21</option>
					<option value="22"> 22</option>
					<option value="23"> 23</option>
					<option value="24"> 24</option>
					<option value="25"> 25</option>
					<option value="26"> 26</option>
					<option value="27"> 27</option>
					<option value="28"> 28</option>
					<option value="29"> 29</option>
					<option value="30"> 30</option>
					<option value="31"> 31</option>
					<option value="32"> 32</option>
					<option value="33"> 33</option>
					<option value="34"> 34</option>
					<option value="35"> 35</option>
					<option value="36"> 36</option>
					<option value="37"> 37</option>
					<option value="38"> 38</option>
					<option value="39"> 39</option>
					<option value="40"> 40</option>
					<option value="41"> 41</option>
					<option value="42"> 42</option>
					<option value="43"> 43</option>
					<option value="44"> 44</option>
					<option value="45"> 45</option>
					<option value="46"> 46</option>
					<option value="47"> 47</option>
					<option value="48"> 48</option>
					<option value="49"> 49</option>
					<option value="50"> 50</option>
					<option value="51"> 51</option>
					<option value="52"> 52</option>
					<option value="53"> 53</option>
					<option value="54"> 54</option>
					<option value="55"> 55</option>
					<option value="56"> 56</option>
					<option value="57"> 57</option>
					<option value="58"> 58</option>					
					<option value="59"> 59</option>
				</select>
			<br>
				<input type="text"  placeholder="Duration (mins)" id="Duration" size=10 name="Duration" required>
				<br><br>
				<button type="submit" value="Submit" >Register For Me</button>
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
<script language=javascript>
function check100()
{
 var x = document.getElementById("pnumber").value;
 if(x>100) alert("100");
}
</script>

