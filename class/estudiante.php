<?php

	require_once("conexion.php");
	
class estudiante{
    
    private $carnet;
    private $nombre;
    private $apellidos;
    private $encargado;
    private $direccion;
    private $telefono_trabajo;
    private $telefono_casa;
    private $celular;
    private $sexo;
    private $email;
    private $foto;
    private $idcarrera;
	private $carrera;
    private $cum;
    private $aprobadas;
    private $reprobadas;
    private $retiradas;
	private $idtutor;
	private $tutor;
    
    public function __construct($carneta,$nombrea,$apellidosa,$encargadoa,$direcciona,$teltrab,$telca,$cel,$sexo,$emaila,$fotoa,$carreraa,$cuma,$aprobadasa,$reprobadasa,$retiradasa,$tutora){
        $this->carnet=$carneta;
        $this->nombre = $nombrea;
        $this->apellidos=$apellidosa;
        $this->encargado=$encargadoa;
        $this->direccion=$direcciona;
        $this->telefono_trabajo=$teltrab;
        $this->telefono_casa = $telca;
        $this->celular = $cel;
        $this->sexo = $sexo;
        $this->email=$emaila;
        $this->foto = '/images/photos/' . $fotoa;
        $this->carrera=$carreraa;
        $this->cum=$cuma;
        $this->aprobadas = $aprobadasa;
        $this->reprobadas = $reprobadasa;
        $this->retiradas=$retiradasa;
		$this->tutor=$tutora;        
    }
    
    public function agregar_estudiante(){
         $con=conectarse();
		 
		 $query = "SELECT `ID_USUARIO` from `ficha`.`usuario` where `APELLIDO` = '".trim($this->tutor)."'";
		 $row = mysql_query($query ,$con);
		 $this->idtutor =  trim($row['ID_USUARIO']);

		 $query = "SELECT `ID_CARRERA` FROM `carreras` WHERE `CARRERA` = '".trim($this->carrera)."'";
		 $row = mysql_query($query ,$con);
		 $this->idcarrera =  trim($row['ID_CARRERA']);

		 $cadenaset="'".$this->carnet."','".$this->idtutor."','".$this->nombre."','".$this->apellidos."','".$this->sexo."','".$this->email."','".$this->encargado."','".$this->direccion."','".$this->telefono_trabajo."','".$this->telefono_casa."','".$this->celular."','".$this->foto."'";
		 
         $cadenaset1="'".$this->carnet."',".$this->idcarrera.",'".$this->cum."','".$this->aprobadas."','".$this->reprobadas."','".$this->retiradas."'";
		 
         $query="INSERT INTO `ficha`.`estudiante` (`ID_ESTUDIANTE` ,`ID_USUARIO` ,`NOMBRE` ,`APELLIDO` ,
		`SEXO` , `EMAIL` , `RESPONSABLE` , `DIRECCION` , `TEL_TRABAJO` , `TEL_CASA` , `CELULAR` ,
		`FOTO` )VALUES (".$cadenaset.");";
		 
         $query1="INSERT INTO `ficha`.`expediente` (`ID_ESTUDIANTE`, `ID_CARRERA`, `CUM`, `MATERIAS_APROBADAS`, `MATERIAS_REPROBADAS`, `MATERIAS_RETIRADAS` ) VALUES (".$cadenaset1.");";
         mysql_query($query,$con);
         $nr=mysql_affected_rows();
         
        if($nr>0)
        {
	       mysql_query($query1,$con);
           $nr1=mysql_affected_rows();
        
	       if($nr1>0){
           echo "<br><br><b>La ficha se creo correctamente</b><br>";
           }
           else{
            echo "<br><br>";

            echo mysql_error();
    	    echo "<br><b>No se pudo crear la ficha en expediente</b><br>";
           }
        }
        else
        {
        echo "<br><br>";
        echo mysql_error();
    	echo "<br><b>No se pudo crear la ficha en estudiantes</b><br>";
        }
        mysql_close($con);       
        
    }
    
    function subir_foto($archivo,$archivo_name){        
        if($archivo != " "){
			$ruta=getcwd();
            if(copy($archivo_name,"$ruta/images/photos/".$archivo)){
				echo 'Archivo subido con exito <br />';
            }
        }   
    }    
    }//fin de la clase estudiante
?>