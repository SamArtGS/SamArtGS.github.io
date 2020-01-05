<?php

$enlace = mysqli_connect("slh.chjrd0648elz.us-west-2.rds.amazonaws.com", "proteco", "proteco123", "clinicaslh");

if (!$enlace) {
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        exit;
}

$login      = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT Contrasena FROM MEDICO WHERE CedProf=$login";


$result = mysqli_query($enlace, $sql);
$row = mysqli_fetch_array($result);

    if($login=="418046193" && md5($contrasena)=="1e66897caf5832917bb8c5382eb3e849"){
        session_start();
        $_SESSION['admin'] = $login;
        header("Location: Administracion.php");
        die();
    }
       if (md5($contrasena) == $row[0]) {
                session_start();
                $_SESSION['medico'] = $login;
                header("Location: ListaPaciente.php");
                exit();
              }
              else {
                header("Location: IniciarSesion.php");
              }
    
?>
