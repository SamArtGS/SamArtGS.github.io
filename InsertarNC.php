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
                    

$dia = $_POST['dia'];
$mes = $_POST['mes'];
$anio = $_POST['anio'];
$hora = $_POST['hora'];
$minuto = $_POST['minuto'];
$tipo = $_POST['tipo'];
$descripcion = $_POST['descripcion'];

if(isset($_POST['medicoSeleccionado']) ){
    $ced=$_POST['medicoSeleccionado'];
}
    
$sql = "INSERT INTO CITA(FechaHora,Tipo,PACIENTE_idPACIENTE,MEDICO_CedProf,Descripcion) VALUES ('$anio-$mes-$dia $hora:$minuto:00','$tipo',$id,$ced,'$descripcion');";

    
if(mysqli_query($enlace, $sql)){
	header("Location: CitasPaciente.php?id=$id");
}else{
	header("Location: CitasPaciente.php?id=$id");
}
?>

