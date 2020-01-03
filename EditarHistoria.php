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
                    

$antheredo      = $_POST['antheredo'];
$antpnpat  = $_POST['antpnpat'];
$antppat  = $_POST['antppat'];
$antgino     = $_POST['antgino'];
$antter     = $_POST['antter'];


$sql = "INSERT INTO ANTECEDENTES(PACIENTE_idPACIENTE,AntHeredofam,AntPNPatolog,AntPPatol,AntGinobs,AntTerap) VALUES ($id,'$antheredo','$antpnpat','$antppat','$antgino','$antter') ON DUPLICATE KEY UPDATE AntHeredofam='$antheredo',AntPNPatolog='$antpnpat',AntPPatol='$antppat',AntGinobs='$antgino',AntTerap='$antter'";

if(mysqli_query($enlace, $sql)){

	header("Location: HistoriaClinica.php?id=$id");
  die();
}else{
	
	header("Location: HistoriaClinica.php?id=$id");
}
?>

