<nav>
<h1>Navigation</h1>
<?php
if(islogin()){
?>
Welcome  
<?php echo $_SESSION['email'];  }?>

<br>
	<div class="nav">
<ul>
<li><a href="index.php">Homepage</a></li>
<?php if(!islogin()){?><li><a href="register.php">SignUp</a></li><?php }?>
<?php if(islogin()){?><li><a href="ResNew.php?action=newreserve">New Reserve</a></li><?php }?>
<?php if(islogin()){?><li><a href="mylist.php">List Of Reserve</a></li><?php }?>
<?php if(islogin()){?><li><a href="config/actions.php?action=logout">Logout</a></li><?php }?>
</ul>
</div>
<?php
if(!islogin()){
?>
	<div class="login">
		<h1>Login</h1>
        <form action="login.php" method="post" id="login">
				<input type="text" placeholder="email" id="email" name="email" required><br>
				<input type="password" placeholder="password" id="password" name="password" required><br>
				<input type="hidden" value="login" name="login"><br>
				<input type="submit" value="Login">
                <input type=hidden name=action value=login>   
           </form>
		
		</div>
<?php
}
?>
</nav>