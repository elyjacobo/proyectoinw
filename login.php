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
	<link rel="stylesheet" href="css/login.css">
</header>
<body>
	<section class="loginform cf">  
	<form name="login" action="validarusuario.php" method="get" accept-charset="utf-8">  
    <table>  
        <tr>
			<td><label for="username">Usuario:</label></td>
			<td><input type="text" name="username" placeholder="text" required></td>
		</tr> 
        <tr>
			<td><label for="password">Contrase&ntilde;a:</label></td>
			<td><input type="password" name="password" placeholder="password" required></td>
		</tr>
    </table>
	<input type="submit" value="Login"> 
</form>  
</section> 


</body>
</html> 
	