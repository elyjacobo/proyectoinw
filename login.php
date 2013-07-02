<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Ficha Tutoria Estudiantil: Login</title>
        <link rel="stylesheet" type="text/css" href="css/login.css" />
		<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.24.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.24.custom.min.js"></script>
    </head>
    <body>
        <div id="login">
        <center>
            <?php
                include('class/usuario.php');
                Usuario::EstablecerZonaHoraria();
                if(isset($_GET['error'])){
                    Usuario::EscribirError($_GET['error']);
                }
            ?>
            <h1>Login</h1>
            <h3>Ingrese sus datos por favor:</h3>
            <form method="POST" action="comprobarUsuario.php">
                <table>
                    <tr>
                        <td><label for="user">Usuario: </label></td>
                        <td><input type="text" name="usuario" size="25" maxlength="25"></td>
                    </tr>
                    <tr>
                        <td><label for="pass">Contrase&ntilde;a: </label></td>
                        <td><input type="password" name="pass" size="25" maxlength="25"></td>
                    </tr>
                </table>
                <input type="submit" value="Ingresar">
            </form>
        </center>
            </div>
    </body>
</html>