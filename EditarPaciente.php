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
                    

$nombres      = $_POST['nombres'];
$apellidoPat  = $_POST['apellidopat'];
$apellidoMat  = $_POST['apellidomat'];
$telefono     = $_POST['telefono'];



$fechaNac     = $_POST['fechanacimiento'];
$sangre="";
if(isset($_POST['tiposangre']) ){
    $sangre=$_POST['tiposangre'];
}
$sexo="";
if(isset($_POST['sexo']) ){
    $sexo=$_POST['sexo'];
}

$direccion    = $_POST['direccion'];
$ciudad       = $_POST['ciudad'];
$estado       = $_POST['estado'];
$cp           = $_POST['cp'];
$EdoCivil     = $_POST['EstadoCivil'];
$religion      = $_POST['religion'];
$lugarnacimiento  = $_POST['lugarnacimiento'];

$sql = "UPDATE PACIENTE SET Nombre='$nombres',ApellidoPat='$apellidoPat',ApellidoMat='$apellidoMat',Direccion='$direccion',Ciudad='$ciudad',Sexo='$sexo',FechaNacimiento='$fechaNac',TipoSangre='$sangre',Estado='$estado',CP=$cp,Telefono=$telefono,EstadoCivil='$EdoCivil',Religion='$religion',LugarNacim='$lugarnacimiento' WHERE idPACIENTE=$id;";

if(mysqli_query($enlace, $sql)){
	phpAlert("Datos modificados correctamente");
	header("Location: DatosPaciente.php?id=$id");
  die();
}else{
	phpAlert("Error al modificar datos del paciente");
	header("Location: DatosPaciente.php?id=$id");
}
?>

