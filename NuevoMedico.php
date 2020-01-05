<?php
    
 
header('Content-Type: text/html; charset=UTF-8');
session_start();
//Si existe la sesión "cliente"..., la guardamos en una variable.
if (!isset($_SESSION['admin'])){
    header('Location: IniciarSesion.php');//Aqui lo redireccionas al lugar que quieras.
    die();
  }

  $ced = $_SESSION['admin'];
$enlace = mysqli_connect("slh.chjrd0648elz.us-west-2.rds.amazonaws.com", "proteco", "proteco123", "clinicaslh");

                  if (!$enlace) {
                         echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
                         echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
                         echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
                         exit;
                  }
 
                    

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellidopat = $_POST['apellidopat'];
$apellidomat = $_POST['apellidomat'];
    
$contrasena = $_POST['contrasena'];


$sql = "INSERT INTO MEDICO VALUES ($cedula,'$nombre','$apellidopat','$apellidomat',MD5('$contrasena'));";

    
if(mysqli_query($enlace, $sql)){
	header("Location: Administracion.php");
}else{
	header("Location: Administracion.php");
}
?>

