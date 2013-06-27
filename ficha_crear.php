<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Gestion de fichas: crear ficha alumno</title>
</head>
<body>
<form action="ficha_guardar.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <table>
      <tr>
        <td colspan="2">Ingreso de fichas estudiantiles</td>
      </tr>
      <tr>
        <td width="136"><label for="carnet">Carnet: </label></td>
        <td width="436"><input name="carnet" type="text" id="carnet" size="20" maxlength="8" /></td>
      </tr>
      <tr>
        <td><label for="nombre">Nombres:</label></td>
        <td><input name="nombre" type="text" id="nombres" size="50" /></td>
      </tr>
      <tr>
        <td><label for="apellidos">Apellidos: </label></td>
        <td><input name="apellidos" type="text" id="apellidos" size="50" /></td>
      </tr>
      <tr>
        <td><label for="label3">Responsable:</label></td>
        <td><input name="apellidos" type="text" id="responsable" size="50" />          
        </td>
      </tr>
      <tr>
        <td><label for="direccion">Direccion:</label></td>
        <td><textarea name="direccion" cols="50" rows="5" id="direccion"></textarea></td>
      </tr>
      <tr>
        <td><label for="telefono_trabajo">Telefono Trabajo:</label></td>
        <td><input name="telefono_trabajo" type="text" id="direccion" size="15" /></td>
      </tr>
      <tr>
        <td><label for="telefono_casa">Telefono Casa:</label></td>
        <td><input name="telefono_casa" type="text" id="telefono_casa" size="15" /></td>
      </tr>
      <tr>
        <td><label for="celular">Celular</label></td>
        <td><input name="celular" type="text" id="celular" size="15" /></td>
      </tr>
      <tr>
        <td><label for="sexo">Sexo:</label></td>
        <td><input name="sexo" type="radio" value="M" id="radiobutton" />
        <label for="radiobutton">Masculino
        <input name="sexo" type="radio" value="F" id="radio"/>
        <label for="radio">Femenino</label></td>
      </tr>
      <tr>
        <td><label for="foto">Fotografia:</label></td>
        <td><input type="file" name="foto" id="foto" /></td>
      </tr>
      <tr>
        <td colspan="2">Informaci&oacute;n Acad&eacute;mica</td>
      </tr>
      <tr>
        <td><label for="carrera">Carrera</label></td>
        <td><select name="carrera" id="carrera">	
			<?php
				$conexion1 = mysql_connect("localhost","root",'');
				mysql_select_db("ficha",$conexion1);
				$query = "SELECT * FROM  carreras";
			    $carreras = mysql_query($query ,$conexion1);
			    While($row=mysql_fetch_array($carreras)){
				echo "<option>"  . $row['CARRERA'] . "</option>";}
			?>
            
        </select></td>
      </tr>
      <tr>
        <td><label for="cum">Cum:</label></td>
        <td><input name="cum" type="text" id="cum" size="9" /></td>
      </tr>
      <tr>
        <td><label for="aprobadas">Materias Aprobadas:</label></td>
        <td><input name="aprobadas" type="text" id="aprobadas" size="9" /></td>
      </tr>
      <tr>
        <td><label for="reprobadas">Materias Reprobadas:</label></td>
        <td><input name="reprobadas" type="text" id="reprobadas" size="9" /></td>
      </tr>
      <tr>
        <td><label for="retiradas">Materias Retiradas</label></td>
        <td><input name="retiradas" type="text" id="retiradas" size="9" /></td>
      </tr>
      <tr>
	  <tr>
        <td><label for="tutor">Tutor: </label></td>
        <td><select name="tutor" id="tutor">	
			<?php
				$conexion1 = mysql_connect("localhost","root",'');
				mysql_select_db("ficha",$conexion1);
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