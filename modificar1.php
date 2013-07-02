<html>
<head>
<title>Gestion de fichas: modificar ficha alumno</title>
</head>
<body>
<h2>Ficha estudiantil actualizada</h2>
<?php
echo "<b>Carnet: </b>";
echo $carnet=$_POST['carnet'];
echo "<br><b>Nombres: </b>";
echo $nombres=$_POST['nombres'];
echo "<br><b>Apellidos: </b>";
echo $apellidos=$_POST['apellidos'];
echo "<br><b>Encargado: </b>";
echo $encargado =$_POST['encargado'];
echo "<br><b>Direcci&oacute;n: </b>";
echo $direccion=$_POST['direccion'];
echo "<br><b>Tel&eacute;fono de trabajo: </b>";
echo $telefonoTrabajo=$_POST['teltrab'];
echo "<br><b>Tel&eacute;fono de casa: </b>";
echo $telefonocasa=$_POST['telca'];
echo "<br><b>Celular: </b>";
echo $celular=$_POST['celular'];
echo "<br><b>Sexo: </b>";
echo $sexo=$_POST['sexo'];
echo "<br><b>Email: </b>";
echo $email=$_POST['email'];
echo "<br><b>CUM: </b>";
echo $cum=$_POST['cum'];
echo "<br><b>Asignaturas aprobadas: </b>";
echo $aprobadas=$_POST['aprobadas'];
echo "<br><b>Asignaturas reprobadas: </b>";
echo $reprobadas=$_POST['reprobadas'];
echo "<br><b>Asignaturas retiradas: </b>";
echo $retiradas=$_POST['retiradas'];

include('/class/ficha.php');
$actualiza_ficha = new ficha();
$actualiza_ficha->actualizar_ficha($carnet,$nombres,$apellidos,$encargado,$direccion,$telefonoTrabajo,$telefonocasa,$celular,$sexo,$email,$cum,$aprobadas,$reprobadas,$retiradas);
?>
</body>
