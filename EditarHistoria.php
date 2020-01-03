<?php
    
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
    
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
                    

$antheredo      = $_POST['antheredo'];
$antpnpat  = $_POST['antpnpat'];
$antppat  = $_POST['antppat'];
$antgino     = $_POST['antgino'];
$antter     = $_POST['antter'];


$sql = "UPDATE ANTECEDENTES SET AntHeredofam='$antheredo',AntPNPatolog='$antpnpat',AntPPatol='$antppat',AntGinobs='$antgino',AntTerap='$antter' WHERE PACIENTE_idPACIENTE=$id;";

if(mysqli_query($enlace, $sql)){
	phpAlert("Datos modificados correctamente");
	header("Location: HistoriaClinica.php?id=$id");
  die();
}else{
	phpAlert("Error al modificar datos del paciente");
	header("Location: HistoriaClinica.php?id=$id");
}
?>

