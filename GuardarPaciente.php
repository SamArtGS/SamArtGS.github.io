<?php

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



$fechaNac  = $_POST['fechanacimiento'];

    
if(isset($_POST['tiposangre']) ){
    $sangre=$_POST['tiposangre'];
}
if(isset($_POST['sexo']) ){
    $sangre=$_POST['sexo'];
    
}

$direccion    = $_POST['direccion'];
$ciudad       = $_POST['ciudad'];
$estado       = $_POST['estado'];
$cp           = $_POST['cp'];
$EdoCivil     = $_POST['EstadoCivil'];
$religion      = $_POST['religion'];
$lugarnacimiento  = $_POST['lugarnacimiento'];

    $sql = "INSERT INTO PACIENTE(Nombre,ApellidoPat,ApellidoMat,Direccion,Ciudad,Estado,CP,Telefono,EstadoCivil,Religion,LugarNacim,TipoSangre,FechaNacimiento) VALUES ('$nombres','$apellidoPat','$apellidoMat','$direccion','$ciudad','$estado','$cp',$telefono,'$EdoCivil','$religion','$lugarnacimiento','$sangre','$fechaNac');";
    
if(mysqli_query($enlace, $sql)){
	
	header("Location: ListaPaciente.php");
}else{
	
	header("Location: ListaPaciente.php");
}

    

?>
