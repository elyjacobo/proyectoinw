<?php


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
    private $carrera;
    private $cum;
    private $aprobadas;
    private $reprobadas;
    private $retiradas;
	




function conectarse()
{
$servidor="localhost";
$usuario="root";
if(!($conexion=mysql_connect($servidor,$usuario,'')))
{
echo "Error conectando a la base de datos.";
exit();
}
if(!mysql_select_db("ficha",$conexion))
{
echo "Error Conexion con la Base de Datos.";
exit();
}
return $conexion;
}

    
    public function __construct($carneta,$nombrea,$apellidosa,$encargadoa,$direcciona,$teltrab,$telca,$cel,$sexo,$emaila,$fotoa,$carreraa,$cuma,$aprobadasa,$reprobadasa,$retiradasa){
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
         $this->foto = 'fotografias/' . $fotoa;
         $this->carrera=$carreraa;
         $this->cum=$cuma;
         $this->aprobadas = $aprobadasa;
         $this->reprobadas = $reprobadasa;
         $this->retiradas=$retiradasa;
        
    }
    
    

    
    
    
    
    
    public function agregar_estudiante(){
         $con=$this->conectarse();
         $cadenaset="'".$this->carnet."','".$this->encargado."','".$this->nombre."','".$this->apellidos."','".$this->direccion."','".$this->telefono_trabajo."','".$this->telefono_casa."','".$this->celular."','".$this->sexo."','".$this->email."','".$this->foto."'"; 
         $cadenaset1="'".$this->carnet."','".$this->carrera."','".$this->cum."','".$this->aprobadas."','".$this->reprobadas."','".$this->retiradas."'";
         $query="INSERT INTO `ficha`.`estudiante` (`CARNET`, `ID_ENCARGADO`, `NOMBRES`, `APELLIDOS`, `DIRECCION`, `TELEFONO_TRABAJO`, `TELEFONO_CASA`,`CELULAR`,`SEXO`,`EMAIL`,`fotografia`) VALUES ($cadenaset);";
         $query1="INSERT INTO `ficha`.`expediente` (`CARNET`, `CARRERA`, `CUM`, `MATERIAS_APROBADAS`, `MATERIAS_REPROBADAS`, `MATERIAS_RETIRADAS`) VALUES ($cadenaset1);";
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
    	    echo "<br><b>No se pudo crear la ficha en expediente</b>";
           }
        }
        else
        {
        echo "<br><br>";
        echo mysql_error();
    	echo "<br><b>No se pudo crear la ficha en estudiantes</b>";
        }
        mysql_close($con);
         
        
    }
    
    function subir_foto($archivo,$archivo_name){
        
         if($archivo != " "){
            $ruta=getcwd();
            if(copy($archivo_name,"$ruta/fotografias/".$archivo)){
            echo 'Archivo subido con exito <br />';
            
         }
        
    }
    
    
    }    
    
    
    }
    


?>