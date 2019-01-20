<?php
function islogin(){
	if(isset($_SESSION['email'])){
	$return=true;
	}else{
	$return=false;
	
	}
return $return;
}

function logout(){
if(isset($_SESSION['email'])){
		session_destroy();
		$return=true;
		}
return $return;

}
?>