<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Gestion de fichas: modificar ficha alumno</title>
</style>
</head>

<body>

<?php
    include('/class/ficha.php');
    if(isset($_POST['carnet'])){
        $editar = new ficha();
        $editar->Devolver_ficha($_POST['carnet']);         
    }
  
?>

</body>
</html>



