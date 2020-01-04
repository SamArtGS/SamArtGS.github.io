<?php
    
 
header('Content-Type: text/html; charset=UTF-8');
session_start();
//Si existe la sesión "cliente"..., la guardamos en una variable.
if (!isset($_SESSION['medico'])){
    header('Location: IniciarSesion.php');//Aqui lo redireccionas al lugar que quieras.
    die();
  }

  if(!isset($_GET['id'])){
      echo 'No hay datos de id';
      header('Location: ListaPaciente.php');
      die();
  }
  $id = $_GET['id'];
  $enlace = mysqli_connect("slh.chjrd0648elz.us-west-2.rds.amazonaws.com", "proteco", "proteco123", "clinicaslh");

    if (!$enlace) {
           echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
           echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
           echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
           exit;
    }
                    

$nombre      = $_POST['nombrediag'];
$descrip  = $_POST['descripcion'];
$fecha = date("Y-m-d");


$sql = "INSERT INTO DIAGNOSTICO(FechaInicio,Nombre,Descripcion,PACIENTE_idPACIENTE) VALUES ('$fecha','$nombre','$descrip',$id);";
    
if(mysqli_query($enlace, $sql)){
	header("Location: Diagnosticos.php?id=$id");
  die();
}else{
	header("Location: Diagnosticos.php?id=$id");
}
?>

