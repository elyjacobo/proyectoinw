<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Gestion de fichas: crear ficha alumno</title>
</head>
<body>
<?php
	require_once("conexion.php");
	$conexion1 = conectarse();
?>
<form action="ficha_guardar.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <table width="588" height="52" border="1">
      <tr>
        <td colspan="2"><h2 align="center"> Ingreso de fichas estudiantiles </h2></td>
      </tr>
      <tr>
        <td width="136"><label for="textfield">Carnet: </label></td>
        <td width="436"><input name="carnet" type="text" id="carnet" size="20" maxlength="8" /></td>
      </tr>
      <tr>
        <td><label for="label">Nombres:</label></td>
        <td><input name="nombre" type="text" id="nombres" size="50" /></td>
      </tr>
      <tr>
        <td><label for="label2">Apellidos: </label></td>
        <td><input name="apellidos" type="text" id="apellidos" size="50" /></td>
      </tr>
      <tr>
        <td><label for="label3">Responsable:</label></td>
        <td><input name="apellidos" type="text" id="responsable" size="50" />          
        </td>
      </tr>
      <tr>
        <td><label for="label4">Direccion:</label></td>
        <td><textarea name="direccion" cols="50" rows="5" id="label4"></textarea></td>
      </tr>
      <tr>
        <td><label for="label5">Telefono Trabajo:</label></td>
        <td><input name="telefono_trabajo" type="text" id="label5" size="15" /></td>
      </tr>
      <tr>
        <td><label for="label6">Telefono Casa:</label></td>
        <td><input name="telefono_casa" type="text" id="label6" size="15" /></td>
      </tr>
      <tr>
        <td><label for="label7">Celular</label></td>
        <td><input name="celular" type="text" id="label7" size="15" /></td>
      </tr>
      <tr>
        <td><label for="file"></label>
        <label for="label8">Sexo:</label></td>
        <td><input name="sexo" type="radio" value="M" id="radiobutton" />
        <label for="radiobutton">Masculino
        <input name="sexo" type="radio" value="F" id="radio" />
        Femenino</label></td>
      </tr>
      <tr>
        <td><label for="file">Fotografia:</label>
          <label for="label11"></label></td>
        <td><input type="file" name="foto" id="foto" /></td>
      </tr>
      <tr>
        <td colspan="2"><h2 align="center">Informaci&oacute;n Acad&eacute;mica </h2></td>
      </tr>
      <tr>
        <td><label for="select">Carrera</label></td>
        <td><select name="carrera" id="select">	
			<?php
				$query = "SELECT * FROM  carreras";
			    $carreras = mysql_query($query ,$conexion1);
			    While($row=mysql_fetch_array($carreras)){
				echo "<option>"  . $row['CARRERA'] . "</option>";}
			?>
            
        </select></td>
      </tr>
      <tr>
        <td><label for="textfield">Cum:</label></td>
        <td><input name="cum" type="text" id="textfield" size="9" /></td>
      </tr>
      <tr>
        <td><label for="label8">Materias Aprobadas:</label></td>
        <td><input name="aprobadas" type="text" id="label8" size="9" /></td>
      </tr>
      <tr>
        <td><label for="label9">Materias Reprobadas:</label></td>
        <td><input name="reprobadas" type="text" id="label9" size="9" /></td>
      </tr>
      <tr>
        <td><label for="label10">Materias Retiradas</label></td>
        <td><input name="retiradas" type="text" id="label10" size="9" /></td>
      </tr>
      <tr>
	  <tr>
        <td><label for="label10">Tutor: </label></td>
        <td><select name="tutor" id="tutor">	
			
			<?php
				$query = "SELECT * FROM  docentes";
			    $docentes = mysql_query($query ,$conexion1);
			    While($row=mysql_fetch_array($docentes)){
				echo "<option>"  . $row['NOMBRES'] . "</option>";}
			?>
            
        </select></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label for="Submit"></label>
            <input type="submit" name="Submit" value="Guardar" id="Submit" /></td>
      </tr> 
    </table>
</form>
</body>
</html>