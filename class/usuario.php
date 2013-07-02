<?php
    class Usuario{
        private $login;
		private $loginid;
        private $pass;
        private $rol;
        private $escuela;
        private $nombre;
        private $apellido;
        public  $error;

        function __construct($login = null, $pass = null, $rol = null, $escuela = null, $nombre = null, $apellido = null, $loginid1 = null){
            $this->login = $login;
			$this->loginid = $loginid1;
            $this->pass = $pass;
            $this->rol = $rol;
            $this->escuela = $escuela;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->error = 0;
        }		
		
		function mostrar($conexion){
            $query = "SELECT * FROM usuario order by nombre, apellido";
            $result = mysql_query($query, $conexion);
            if ($result){
				echo '<table id="tbp2"><thead><th>Usuario</th><th>Nombre</th><th>Apellido</th><th>Escuela</th><th>Rol</th><th></th><th></th></thead><tbody>';
                while(($row = mysql_fetch_assoc($result))) {
					echo '<tr><td>' . $row['login'] . '</td>';
					echo '<td>' . $row['nombre'] . '</td>';
					echo '<td>' . $row['apellido'] . '</td>';
					echo '<td>' . $row['idescuela'] . '</td>';
					echo '<td>' . $row['idrol'] . '</td>';
					echo '<td><input type="button" class="btnchulo" value="Modificar" onclick="modificar(\'' . $row["login"] . '\', \'' . $row["pass"] . '\', \'' . $row['nombre'] . '\', \'' . $row['apellido'] . '\', \'' . $row['idescuela'] . '\', \'' . $row['idrol'] . '\');"/></td>';
					echo '<td><input type="button" class="btnchulo" value="Eliminar" onclick="eliminar(\'' . $row["login"] . '\');"/></td></tr>';
                }				
				echo '</tbody></table>';
            }
            else{
                $this->error = 1;
                return false;
            }
        }

        function CrearUsuario($conexion){
            $query = "INSERT INTO usuario VALUES('".$this->login."',".$this->escuela.",".$this->rol.",'";
            $query .= md5($this->pass)."','".$this->nombre."','".$this->apellido."')";
            $result = mysql_query($query, $conexion);
            if ($result){
                return true;
            }
            else{
                $this->error = 3;
                return false;
            }
        }
		function modificar($conexion){		
            $query = "update usuario set login = '" . $this->login . "', idescuela='" . $this->escuela . "', idrol='" . $this->rol . "', pass='" . md5($this->pass) . "', nombre='" . $this->nombre . "', apellido='" . $this->apellido . "' where login = '" . $this->loginid . "'" ;			
            $result = mysql_query($query, $conexion);
            if ($result == 1){
                return true;
            }
            else{
                $this->error = 3;
                return false;
            }
        }
		function eliminar($conexion){		
            $query = "delete from usuario where login = '" . $this->login . "'" ;
            $result = mysql_query($query, $conexion);
            if ($result == 1){
                return true;
            }
            else{
                $this->error = 3;
                return false;
            }
        }

        function ChequearUsuario($conexion,$user,$passw){
            $query = "SELECT * FROM usuario WHERE USUARIO ='".$user."'";
            $result = mysql_query($query, $conexion);
            if ($result){
                $row = mysql_fetch_array($result);
                if (md5($passw) == $row['password']){
                    $this->CopiarRol($row['id_rol'], $conexion);
                    $this->nombre = $row['nombre'];
                    $this->apellido = $row['apellido'];
                    return true;
                }
                else{
                    $this->error = 1;
                    return false;
                }
            }
            else{
                $this->error = 1;
                return false;
            }
        }

        function CopiarRol($idrol, $conexion){
            $query = "SELECT * FROM rol WHERE id_rol=".$idrol;
            $result = mysql_query($query, $conexion);
            if ($result){
                $row = mysql_fetch_array($result);
                $this->rol = $row['rol'];
            }
        }

        function CopiarEscuela($idescuela, $conexion){
            $query = "SELECT * FROM escuela WHERE idrol=".$idescuela;
            $result = mysql_query($query, $conexion);
            if ($result){
                $row = mysql_fetch_array($result);
                $this->escuela = $row['nombreescuela'];
            }
        }

        function CrearSelectEscuela($conexion){
            $query = "SELECT * FROM escuela";
            $result = mysql_query($query, $conexion);
            echo '<select name="escuela" id="escuela"  style="width: 130px;">';
            while ($row = mysql_fetch_array($result)){
                echo '<option value="'.$row['idescuela'].'">'.utf8_encode($row['nombreescuela']).'</option>';
            }
            echo '</select>';
        }
        
        function ObtenerDato($nombredato){
            switch ($nombredato){
                case "login":
                    return $this->login;
                    break;
                case "rol":
                    return $this->rol;
                    break;
                case "escuela":
                    return $this->escuela;
                    break;
            }
        }

        function EscribirError($error){
			echo "<div style='text-align: center; margin: 0 auto;'>";
            switch ($error){
                case 1:
                    echo "<h3 style='color: red;'>Nombre de usuario o contrasenia incorrectos</h3>";
                    break;
                case 2:
                    echo "<h3 style=\"color: red;\">Debe loguearse para ingresar a esta pagina</h3><br />";
                    echo "<a href=\"login.php\">Ir a la página de login</a>";
                    break;
                case 3:
                    echo "<h3 style=\"color: red;\">Ocurrió un error al crear el nuevo usuario</h3>";
                    break;
            }
			echo "</div>";
        }

        function EstablecerZonaHoraria(){
            date_default_timezone_set("America/El_Salvador");
        }

        static function EsAdmin($tipousuario){
            return ($tipousuario == "admin" || $tipousuario == "Ambos");
        }

        static function EsDocente($tipousuario){
            return ($tipousuario == "docente" || $tipousuario == "Ambos");
        }

        static function ImprimirSemana(){
            $diahoy = date("w");
            $numerodia = date("j");
            $iniciosemana = strtotime("-".($diahoy - 1)." days");
            $finsemana = strtotime("+".(6 - $diahoy)." days");
            $mesinicio = date("n", $iniciosemana);
            $mesfin = date("n", $finsemana);
            $extra = ($mesfin == $mesinicio)? "":" de ".Usuario::MesEnEspaniol($mesinicio);
            echo "Semana del ".date("d", $iniciosemana).$extra." al ".date("d", $finsemana)." de ".Usuario::MesEnEspaniol($mesfin)." de ".date("Y", $finsemana);
        }

        private function MesEnEspaniol($mes){
            switch ($mes){
                case 1:
                    return "Enero";
                    break;
                case 2:
                    return "Febrero";
                    break;
                case 3:
                    return "Marzo";
                    break;
                case 4:
                    return "Abril";
                    break;
                case 5:
                    return "Mayo";
                    break;
                case 6:
                    return "Junio";
                    break;
                case 7:
                    return "Julio";
                    break;
                case 8:
                    return "Agosto";
                    break;
                case 9:
                    return "Septiembre";
                    break;
                case 10:
                    return "Octubre";
                    break;
                case 11:
                    return "Noviembre";
                    break;
                case 12:
                    return "Diciembre";
                    break;
            }
        }
    }
?>