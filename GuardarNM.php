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

date_default_timezone_set('America/Mexico_City');
$time = time();

$fechaHora = date("Y-m-d H:i:s", $time);

$Descripcion = $_POST['descripcion'];
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
$fecha = date("Y-m-d");


if(!empty($fechaHora)){
  $sqlCG = "INSERT INTO CONSULTAGENERAL(DIAGNOSTICO_idDIAGNOSTICO,MEDICO_CedProf,Descripcion,FechaHora) VALUES ($idDiag,$ced,'$Descripcion','$fechaHora')";

  if(mysqli_query($enlace, $sqlCG)){
    $lastid = mysqli_insert_id($enlace);

    $sqlazo = "INSERT INTO NOTA_MEDICA(Temperatura,TA,TA2,FC,FR,Oxiometria,Peso,Talla,Padecimiento,ExploFisica,Tratamiento,Plan,Fecha,CONSULTAGENERAL_idCONSULTAGENERAL,CONSULTAGENERAL_DIAGNOSTICO_idDIAGNOSTICO,CONSULTAGENERAL_MEDICO_CedProf) VALUES ($Temperatura,$TA1,$TA2,$FC,$FR,$OX,$Peso,$Talla,'$Padecimiento','$ExploFisica','$Tratamiento','$Plan','$fecha',$lastid,$idDiag,$ced);";

        if(mysqli_query($enlace, $sqlazo)){
          


          header("Location: TablasCGyC.php?id=$id&idDiag=$idDiag");
        }else{
          phpAlert("Error al ingresar nueva nota médica");
        }

  }else{
    phpAlert("Error al insertar consulta general");
  }

}else{
  phpAlert("Error al ingresar al paciente");
}















    
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
?>
