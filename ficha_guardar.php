<html>
<head>
<title>Gestion de fichas: guardar ficha alumno</title>
</head>
<body>

<?php
if(isset($_POST['carnet']) && $_POST['carnet'] != "" 
	&& isset($_POST['nombre']) && $_POST['nombre'] != "" 
	&& isset($_POST['apellidos']) && $_POST['apellidos'] != "" 
	&& isset($_POST['responsable']) && $_POST['responsable'] != "" 
	&& isset($_POST['direccion']) && $_POST['direccion'] != "" 
	&& isset($_POST['telefono_casa']) && $_POST['telefono_casa'] != "" 
	&& isset($_POST['sexo']) && $_POST['sexo'] != ""
	&& isset($_POST['cum']) && $_POST['cum'] != "" 
	&& isset($_POST['aprobadas']) && $_POST['aprobadas'] != "" 
	&& isset($_POST['reprobadas'])&& $_POST['reprobadas'] != "" 
	&& isset($_POST['retiradas']) && $_POST['retiradas'] != ""
	&& isset($_POST['retiradas']) && $_POST['retiradas'] != ""){

	require('estudiante.php');
	$archivo_name = $_FILES['foto']['tmp_name'];
	$foto = $_FILES['foto']['name']; 
	$carnet = $_POST['carnet'];
	$nombres = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$encargado = $_POST['responsable'];
	$direccion = $_POST['direccion'];
	$telefono_trabajo = $_POST['telefono_trabajo'];
	$telefono_casa = $_POST['telefono_casa'];
	$cel = $_POST['celular'];
	$sexo = $_POST['sexo'];
	$email = $_POST['email'];
	$carrera = $_POST['carrera'];
	$cum = $_POST['cum'];
	$aprobadas = $_POST['aprobadas'];
	$reprobadas = $_POST['reprobadas'];
	$retiradas = $_POST['retiradas'];
	$tutor = $_POST['tutor'];
    
	echo '<b>Carnet: ';
	echo $carnet . '<br>';
     
	if($_POST['action']=='upload'){   
        
	echo '<b>Carnet: ';
	echo $carnet . '<br>';
	echo '<b>Nombres: </b>';
	echo $nombres . '<br>' ;
	echo '<b>Apellidos: </b>';
	echo $apellidos . '<br>';
	echo '<b>Encargado: </b>';
	echo $encargado . '<br>';
	echo '<b>Direccion: </b>';
	echo $direccion . '<br>';
	echo '<b>Telefono de trabajo: </b>';
	echo $telefono_trabajo . '<br>';
	echo '<b>Telefono de casa: </b>';
	echo $telefono_casa . '<br>';
	echo '<b>Celular: </b>';
	echo $cel . '<br>';
	echo '<b>Sexo: </b>';
	echo $sexo . '<br>';
	echo '<b>Fotografia: </b>';
	echo $foto . '<br>';

	echo '<b>Carrera: </b>';
	echo $carrera . '<br>';

	echo '<b>Cum: </b>';
	echo $cum . '<br>';
	echo '<b>Materias aprobadas: </b>';
	echo $aprobadas . '<br>';

	echo '<b>Materias reprobadas: </b>';
	echo $reprobadas . '<br>';

	echo '<b>Materias retiradas: </b>';
	echo $retiradas . '<br>';

	$nuevaficha = new estudiante($carnet,$nombres,$apellidos,$encargado,$direccion,$telefono_trabajo,$telefono_casa,$cel,$sexo,$email,$foto,$carrera,$cum,$aprobadas,$reprobadas,$retiradas);
		$nuevaficha->agregar_estudiante();
		$nuevaficha->subir_foto($foto,$archivo_name); 		
	}
	}

	else{	
	?>
	
	<script>
		alert("No se han llenado algunos campos");
		window.history.back();
		//document.location=('./ficha_crear.php');
	</script>
	
	<?php } ?>

</body>

