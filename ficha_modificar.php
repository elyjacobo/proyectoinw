<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Gestion de fichas: modificar ficha alumno</title>
<script type= "text/javascript" > 


function showUser(str)
{
if (str=="")
  {
  document.getElementById("resultados").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("resultados").innerHTML=xmlhttp.responseText;
    }
  }


xmlhttp.open("GET","resultados.php?q="+str,true);
xmlhttp.send();
}

</script>
</head>

<body>
<?php
	require_once("conexion.php");
	$conexion1 = conectarse();
?>
<form action="modificar.php" method="post" enctype="multipart/form-data">
<div id="busqueda">
Buscar ficha estudiantil<br>
<table>
    <tr>
        <td><label for="carnet">Seleccione el carnet: </label></td>
        <td><select name="carnet" id="carnet" onChange="showUser(this.value)">	
			<?php
				$query = "SELECT * FROM  `estudiante`";
			    $estudiantes = mysql_query($query ,$conexion1);
			    While($row=mysql_fetch_array($estudiantes)){
				echo "<option>"  . $row['ID_ESTUDIANTE'] . "</option>";}
			?>            
        </select></td>
      </tr>
	  <tr>
	  <td><label for="Submit"></label>
            <input type="submit" name="Submit" value="Seleccionar ficha" id="Submit" /></td>
      </tr>
</div>

<div id="resultados"> 
</div>

</body>
</html>
