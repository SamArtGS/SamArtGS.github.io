<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "mydb", 3306);

if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL";
}

$login      = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT Contrasena FROM medico WHERE CedProf=$login";


$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_array($result);


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
