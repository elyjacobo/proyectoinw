<?php 
session_start();
session_destroy();
SESSION_START(); 
$_SESSION['validador']='login';
?>

<!DOCTYPE HTML>
<html>
<header>
	<title>Gestion de fichas: login</title>
</header>
<body>
	<section class="loginform cf">  
	<form name="login" action="index_submit" method="get" accept-charset="utf-8">  
    <table>  
        <tr>
			<td><label for="username">Usuario</label></td>
			<td><input type="email" name="username" placeholder="password" required></td>
		</tr> 
        <tr>
			<td><label for="password">Password</label></td>
			<td><input type="password" name="password" placeholder="password" required></td>
		</tr>
    </table>
	<input type="submit" value="Login"> 
</form>  
</section> 


</body>
</html> 
	