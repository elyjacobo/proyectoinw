<?php

class ficha{

    
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
    
    
public function mostrar_ficha($q){
   $ruta=getcwd();    
$array=array();
include('conexion.php');
$cn = $this->conectarse();
$query = "SELECT * FROM estudiante WHERE CARNET='" . $q . "'";
$query1 = "SELECT * FROM expediente WHERE CARNET='" . $q . "'";
$estudiante = mysql_query($query,$cn);
$i=0;
while($rows = mysql_fetch_array($estudiante)){
    
    $array[$i]=$rows[0];
    $i++;
}



if(in_array($q,$array)){
    
   $estudiante = mysql_query($query,$cn);
   while($rows = mysql_fetch_array($estudiante)){
    
    
   echo '<tr><td bgcolor="darkblue" colspan="2"><B><font  color=white>INFORMACION DEL ESTUDIANTE</font></B></td></tr>';
  echo '<tr><td bgcolor="darkblue" colspan="2"><B><font color=white>Datos personales</font></B></td></tr>';
 // print ("<tr><td> <a target='_blank' href= '" . $rows['fotografia'] . "'><img src='iconos/ico-fichero.gif'></a></td></tr>");
    print ("<tr><td width=200 colspan=2 align=center><img width=125 heigth=125 src='". $rows['fotografia'] . "'></img></td></tr>");
   echo '<tr><td width="200"> CARNET: ' . '</td><td width="200">'. $rows['CARNET'] . '</td></tr>';
   echo '<tr><td width="200"> ENCARGADO: </td><td width="200">' . $rows['ID_ENCARGADO'] . '</td></tr>';
    echo '<tr><td width="200"> NOMBRES: </td><td width="200">' . $rows['NOMBRES'] . '</td></tr>';
    echo '<tr><td width="200"> APELLIDOS: </td><td width="200">' . $rows['APELLIDOS'] . '</td></tr>';
     echo '<tr><td width="200"> DIRECCION: </td><td width="200">' . $rows['DIRECCION'] . '</td></tr>';
      echo '<tr><td width="200"> TELEFONO DE TRABAJO: </td><td width="200">' . $rows['TELEFONO_TRABAJO'] . '</td></tr>';
      echo '<tr><td width="200"> TELEFONO DE CASA: </td><td width="200">' . $rows['TELEFONO_CASA'] . '</td></tr>';
       echo '<tr><td width="200"> CELULAR:</td><td width="200"> ' . $rows['CELULAR'] . '</td></tr>';
        echo '<tr><td width="200"> SEXO: </td><td width="200">' . $rows['SEXO'] . '</td></tr>';
       echo '<tr><td width="200"> EMAIL: </td><td width="200">' . $rows['EMAIL'] . '</td></tr>';
       
       }
       echo '<tr><td bgcolor="darkblue" colspan="2"><B><font color=white>Datos academicos</font></B></td></tr>';
       $expediente=mysql_query($query1,$cn);
       while($rowsexp=mysql_fetch_array($expediente)){
        echo '<tr><td width="200"> ID EXPEDIENTE: ' . '</td><td width="200">'. $rowsexp['ID_EXPEDIENTE'] . '</td></tr>';
        echo '<tr><td width="200"> CARRERA: ' . '</td><td width="200">'. $rowsexp['CARRERA'] . '</td></tr>';
        echo '<tr><td width="200"> CUM: ' . '</td><td width="200">'. $rowsexp['CUM'] . '</td></tr>';
        echo '<tr><td width="200"> MATERIAS APROBADAS: ' . '</td><td width="200">'. $rowsexp['MATERIAS_APROBADAS'] . '</td></tr>';
        echo '<tr><td width="200"> MATERIAS REPROBADAS: ' . '</td><td width="200">'. $rowsexp['MATERIAS_REPROBADAS'] . '</td></tr>';
        echo '<tr><td width="200"> MATERIAS RETIRADAS: ' . '</td><td width="200"> '. $rowsexp['MATERIAS_RETIRADAS'] . '</td></tr>';
       
       }
      
    
}

else if(trim($q)=='') {
    echo 'POR FAVOR INTRODUCIR SU NOMBRE';
}
else{
    
    echo '<tr><td colspan="2"><B><font color=red>FICHA INEXISTENTE</font></B></td></tr>';
}
   
        
    }    
    
    
    
    public function Devolver_ficha($carnet){
       
       $con=$this->conectarse();
       $query="SELECT * FROM estudiante WHERE CARNET='" . $carnet . "'";
       $query2 = "SELECT * FROM expediente WHERE CARNET='" . $carnet . "'";
       
       $result=mysql_query($query,$con);
       $result1=mysql_query($query2,$con);
       $rowexp = mysql_fetch_array($result1);
      $row=mysql_fetch_array($result);
      echo "<form action='modificar1.php' method='post' enctype='multipart/form-data'>";
     echo "<table border='0'>";
    
    echo "<tr>";
echo "<td>";
echo "CARNET: ";
echo "</td>";
echo "<td>";
echo $row['CARNET'];
echo "<input type='hidden' name='carnet' size='8' maxlenght='8' value='".$row['CARNET']."'>";
echo "</td>";
echo "</tr>";
    
    
     echo "<tr>";
     echo "<td>";
     echo "NOMBRE: ";
     echo "</td>";
     echo "<td>";
    echo "<input type='text' name='nombres' size='30' maxlenght='30' value='".$row['NOMBRES']."'>";
     echo "</td>";
     echo "</tr>";
       
        
    echo "<tr>";
    echo "<td>";
    echo "APELLIDOS: ";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='apellidos' size='30' maxlenght='30' value='".$row['APELLIDOS']."'>";
    echo "</td>";
    echo "</tr>";  
    
    echo "<tr>";
    echo "<td>";
    echo "ENCARGADO: ";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='encargado' size='30' maxlenght='30' value='".$row['ID_ENCARGADO']."'>";
    echo "</td>";
    echo "</tr>"; 
    
     echo "<tr>";
    echo "<td>";
    echo "DIRECCION: ";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='direccion' size='30' maxlenght='30' value='".$row['DIRECCION']."'>";
    echo "</td>";
    echo "</tr>";  
    echo "<tr>";
    echo "<td>";
    
    echo "TELEFONO DE TRABAJO: ";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='teltrab' size='30' maxlenght='30' value='".$row['TELEFONO_TRABAJO']."'>";
    echo "</td>";
    echo "</tr>"; 
    
     echo "<tr>";
    echo "<td>";
    echo "TELEFONO DE CASA: ";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='telca' size='30' maxlenght='30' value='".$row['TELEFONO_CASA']."'>";
    echo "</td>";
    echo "</tr>";
      
    echo "<tr>";
    echo "<td>";
    echo "CELULAR: ";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='celular' size='30' maxlenght='30' value='".$row['CELULAR']."'>";
    echo "</td>";
    echo "</tr>";  
    
    echo "<tr>";
    echo "<td>";
    echo "SEXO: ";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='sexo' size='30' maxlenght='30' value='".$row['SEXO']."'>";
    echo "</td>";
    echo "</tr>";  
    
    echo "<tr>";
    echo "<td>";
    echo "EMAIL: ";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='email' size='30' maxlenght='30' value='".$row['EMAIL']."'>";
    echo "</td>";
    echo "</tr>";  
    
    echo "<tr>";
    echo "<td>";
    echo "CARRERA: ";
    echo "<td><select name='carrera' id='select'>";
    echo "<option value='" . $rowexp['CARRERA'] . "'selected='selected'>" . $rowexp['CARRERA'] . "</option>";
    echo "<option value='Ing. Telecomunicaciones'>Ing. Telecomunicaciones</option>";
    echo "<option value='Ing. Biomedica'>Ing. Biomedica</option>";
    echo "<option value='Ing. Ciencias de la computacion'>Ing. Ciencias de la computacion</option>";
      echo "</select></td>";
    
      
    echo "<tr>";
    echo "<td>";
    echo "CUM: ";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='cum' size='30' maxlenght='30' value='".$rowexp['CUM']."'>";
    echo "</td>";
    echo "</tr>";  
    
    echo "<tr>";
    echo "<td>";
    echo "MATERIAS APROBADAS: ";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='aprobadas' size='30' maxlenght='30' value='".$rowexp['MATERIAS_APROBADAS']."'>";
    echo "</td>";
    echo "</tr>";  
    
    echo "<tr>";
    echo "<td>";
    echo "MATERIAS REPROBADAS: ";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='reprobadas' size='30' maxlenght='30' value='".$rowexp['MATERIAS_REPROBADAS']."'>";
    echo "</td>";
    echo "</tr>";
    
     echo "<tr>";
    echo "<td>";
    echo "MATERIAS RETIRADAS: ";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='retiradas' size='30' maxlenght='30' value='".$rowexp['MATERIAS_RETIRADAS']."'>";
    echo "</td>";
    echo "</tr>";   
    
    echo "<tr><td>";
        echo "<input type='submit' value='Modificar contacto'></td></tr>";
    }
    
    
  public function actualizar_ficha($carnet,$nombre,$apellidos,$encargadp,$direccion,$teltrab,$telca,$cel,$sexo,$email,$carrera,$cum,$mat_aprob,$mat_reprob,$mat_ret){    
    $con=$this->conectarse();
    $cadenaset="NOMBRES='".$nombre."', APELLIDOS='".$apellidos."', ID_ENCARGADO='".$encargadp."',DIRECCION='".$direccion."', TELEFONO_TRABAJO='".$teltrab."', TELEFONO_CASA='".$telca."', CELULAR='".$cel."',SEXO='".$sexo."',EMAIL='".$email."'";
    $cadenaset1 = "CARRERA='".$carrera."', CUM='".$cum."',MATERIAS_APROBADAS='".$mat_aprob."',MATERIAS_REPROBADAS='".$mat_reprob."',MATERIAS_RETIRADAS='".$mat_ret."'";
    $query = "UPDATE estudiante SET $cadenaset WHERE CARNET = '$carnet'";
    $query1 = "UPDATE expediente SET $cadenaset1 WHERE CARNET ='$carnet '";
    mysql_query($query1,$con);
    $nr=mysql_affected_rows();
    if($nr>0){
        mysql_query($query,$con);
        $nr1 = mysql_affected_rows();
        if($nr1>0){
        echo '<br><b>LOS DATOS SE ACTUALIZARON CORRECTAMENTE';
        }
        else{
        echo '<br><b>NO SE ACTUALIZO EL CONTACTO';
        }
    }
    
    
    
    
}


   public function Devolver_ficha_eliminar($carnet){
       
       $con=$this->conectarse();
       $query="SELECT * FROM estudiante WHERE CARNET='" . $carnet . "'";
       $query2 = "SELECT * FROM expediente WHERE CARNET='" . $carnet . "'";
       
       $result=mysql_query($query,$con);
       $result1=mysql_query($query2,$con);
       $rowexp = mysql_fetch_array($result1);
      $row=mysql_fetch_array($result);
      echo "<form action='eliminar1.php' method='post' enctype='multipart/form-data'>";
     echo "<table border='0'>";
    
    echo "<tr>";
echo "<td>";
echo "CARNET: ";
echo "</td>";
echo "<td>";
echo $row['CARNET'];
echo "<input type='hidden' name='carnet' size='8' maxlenght='8' value='".$row['CARNET']."'>";
echo "</td>";
echo "</tr>";
    
    
     echo "<tr>";
     echo "<td>";
     echo "NOMBRE: ";
     echo "</td>";
     echo "<td>";
    echo "<input type='text' name='nombres' size='30' maxlenght='30' value='".$row['NOMBRES']."'>";
     echo "</td>";
     echo "</tr>";
       
        
    echo "<tr>";
    echo "<td>";
    echo "APELLIDOS: ";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='apellidos' size='30' maxlenght='30' value='".$row['APELLIDOS']."'>";
    echo "</td>";
    echo "</tr>";  
    
    echo "<tr>";
    echo "<td>";
    echo "ENCARGADO: ";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='encargado' size='30' maxlenght='30' value='".$row['ID_ENCARGADO']."'>";
    echo "</td>";
    echo "</tr>"; 
    
     echo "<tr>";
    echo "<td>";
    echo "DIRECCION: ";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='direccion' size='30' maxlenght='30' value='".$row['DIRECCION']."'>";
    echo "</td>";
    echo "</tr>";  
    echo "<tr>";
    echo "<td>";
    
    echo "TELEFONO DE TRABAJO: ";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='teltrab' size='30' maxlenght='30' value='".$row['TELEFONO_TRABAJO']."'>";
    echo "</td>";
    echo "</tr>"; 
    
     echo "<tr>";
    echo "<td>";
    echo "TELEFONO DE CASA: ";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='telca' size='30' maxlenght='30' value='".$row['TELEFONO_CASA']."'>";
    echo "</td>";
    echo "</tr>";
      
    echo "<tr>";
    echo "<td>";
    echo "CELULAR: ";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='celular' size='30' maxlenght='30' value='".$row['CELULAR']."'>";
    echo "</td>";
    echo "</tr>";  
    
    echo "<tr>";
    echo "<td>";
    echo "SEXO: ";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='sexo' size='30' maxlenght='30' value='".$row['SEXO']."'>";
    echo "</td>";
    echo "</tr>";  
    
    echo "<tr>";
    echo "<td>";
    echo "EMAIL: ";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='email' size='30' maxlenght='30' value='".$row['EMAIL']."'>";
    echo "</td>";
    echo "</tr>";  
    
    echo "<tr>";
    echo "<td>";
    echo "CARRERA: ";
    echo "<td><select name='carrera' id='select'>";
    echo "<option value='" . $rowexp['CARRERA'] . "'selected='selected'>" . $rowexp['CARRERA'] . "</option>";
    echo "<option value='Ing. Telecomunicaciones'>Ing. Telecomunicaciones</option>";
    echo "<option value='Ing. Biomedica'>Ing. Biomedica</option>";
    echo "<option value='Ing. Ciencias de la computacion'>Ing. Ciencias de la computacion</option>";
      echo "</select></td>";
    
      
    echo "<tr>";
    echo "<td>";
    echo "CUM: ";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='cum' size='30' maxlenght='30' value='".$rowexp['CUM']."'>";
    echo "</td>";
    echo "</tr>";  
    
    echo "<tr>";
    echo "<td>";
    echo "MATERIAS APROBADAS: ";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='aprobadas' size='30' maxlenght='30' value='".$rowexp['MATERIAS_APROBADAS']."'>";
    echo "</td>";
    echo "</tr>";  
    
    echo "<tr>";
    echo "<td>";
    echo "MATERIAS REPROBADAS: ";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='reprobadas' size='30' maxlenght='30' value='".$rowexp['MATERIAS_REPROBADAS']."'>";
    echo "</td>";
    echo "</tr>";
    
     echo "<tr>";
    echo "<td>";
    echo "MATERIAS RETIRADAS: ";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='retiradas' size='30' maxlenght='30' value='".$rowexp['MATERIAS_RETIRADAS']."'>";
    echo "</td>";
    echo "</tr>";   
    
    echo "<tr><td colspan=2 align=center>";
        echo "<input type='submit' value='Eliminar ficha'></td></tr>";
        
    
    }

  public function eliminar_ficha($carnet){
    $con=$this->conectarse();
    $query = "DELETE FROM estudiante WHERE CARNET='" . $carnet . "'";
    $query1="DELETE FROM expediente WHERE CARNET='" . $carnet . "'";
    mysql_query($query1,$con);
    $nr=mysql_affected_rows();
    if($nr>0){
        
        mysql_query($query,$con);
        $nr1 = mysql_affected_rows();
        if($nr1>0){
           echo '<br><b>LA FICHA ESTUDIANTIL MOSTRADA HA SIDO ELIMINADA'; 
        }
        else{
            echo '<br><b>LA FICHA MOSTRADA NO SE HA PODIDO BORRAR';
        }
        
        
    }
    
  }
    
    
}






?>