<?php
    session_start();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
    if (!isset($_SESSION['medico'])){
        header('Location: IniciarSesion.php');//Aqui lo redireccionas al lugar que quieras.
        die();
      }

      if(!isset($_GET['id'])){
        header('Location: ListaPaciente.php');
        die();
      }
      $ced = $_SESSION['medico'];
      $id = $_GET['id'];
      $idDiag = $_GET['idDiag'];
$enlace = mysqli_connect("slh.chjrd0648elz.us-west-2.rds.amazonaws.com", "proteco", "proteco123", "clinicaslh");

if (!$enlace) {
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        exit;
}

$Temperatura = $_POST['Temperatura'];
$TA1  = $_POST['TA1'];
$TA2  = $_POST['TA2'];

$FC     = $_POST['FC'];
$FR    = $_POST['FR'];
$OX     = $_POST['OX'];

$Peso     = $_POST['Peso'];
$Talla    = $_POST['Talla'];

$Padecimiento      = $_POST['Padecimiento'];
$ExploFisica  = $_POST['ExploFisica'];
$Tratamiento  = $_POST['Tratamiento'];
$Plan  = $_POST['Plan'];



$sql = "INSERT INTO NOTA_MEDICA(Nombre,ApellidoPat,ApellidoMat,Direccion,Ciudad,Estado,CP,Telefono,EstadoCivil,Religion,LugarNacim,TipoSangre) VALUES ('$nombres','$apellidoPat','$apellidoMat','$direccion','$ciudad','$estado','$cp','$telefono','$EdoCivil','$religion','$lugarnacimiento','$sangre');";

$sql = "INSERT INTO NOTA_MEDICA(Nombre,ApellidoPat,ApellidoMat,Direccion,Ciudad,Estado,CP,Telefono,EstadoCivil,Religion,LugarNacim,TipoSangre) VALUES ('$nombres','$apellidoPat','$apellidoMat','$direccion','$ciudad','$estado','$cp','$telefono','$EdoCivil','$religion','$lugarnacimiento','$sangre');";

if(mysqli_query($enlace, $sql)){
	phpAlert("Paciente correctamente agregado");
	header("Location: ListaPaciente.php");
}else{
	phpAlert("Error al ingresar al paciente");
	header("Location: ListaPaciente.php");
}

    
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
?>
