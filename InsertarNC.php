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
                    

$fecha = $_POST['fecha'];

$hora = $_POST['hora'];

$tipo = $_POST['tipo'];
$descripcion = $_POST['descripcion'];

if(isset($_POST['medicoSeleccionado']) ){
    $ced=$_POST['medicoSeleccionado'];
}

$chequeo = "SELECT COUNT(*) FROM CITA WHERE FechaHora='$fecha $hora:00' AND MEDICO_CedProf=$ced;";
$sql = "INSERT INTO CITA(FechaHora,Tipo,PACIENTE_idPACIENTE,MEDICO_CedProf,Descripcion) VALUES ('$fecha $hora:00','$tipo',$id,$ced,'$descripcion');";
    
if(mysqli_query($enlace, $chequeo)){
        $result = mysqli_query($enlace, $chequeo);
        $row = mysqli_fetch_array($result);
        if(empty($row['0'])) {
            if(mysqli_query($enlace, $sql)){
                header("Location: CitasPaciente.php?id=$id");
                die();
            }
        }else{
            echo "<script type='text/javascript'>alert('Hay traslape de horarios');</script>";
            header("Location: CitasPaciente.php?id=$id");
            die();
        }
    
    }else{
        die();
    }

?>

