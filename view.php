<?php
    header('Content-Type: text/html; charset=UTF-8');
    session_start();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
    if (!isset($_SESSION['medico'])){
        header('Location: IniciarSesion.php');//Aqui lo redireccionas al lugar que quieras.
        die();
      }

      if(!isset($_GET['file'])){
        header('Location: ListaPaciente.php');
        die();
      }
      $file = $_GET['file'];
    
      $enlace = mysqli_connect("slh.chjrd0648elz.us-west-2.rds.amazonaws.com", "proteco", "proteco123", "clinicaslh");

                        if (!$enlace) {
                               echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
                               echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
                               echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
                               exit;
                        }
                        
                     $query = "SELECT * FROM ESTUDIO WHERE idESTUDIO=$file;";

                    $result = $enlace->query($query);
                    $row = $result->fetch_array();
                    header("Content-type:application/pdf");
                    echo $row['Archivo'];
                    $result->free();
?>