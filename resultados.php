<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Gestion de tutorias: buscar ficha alumno</title>
</head>

<body>
<table>

<?php
 include('/class/ficha.php');
 $q=$_GET['q'];
 $generar_ficha = new ficha();
 $generar_ficha->mostrar_ficha($q);
 
?>
</table>
</body>




