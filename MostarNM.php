<?php
    header('Content-Type: text/html; charset=UTF-8');
    session_start();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
    if (!isset($_SESSION['medico'])){
        header('Location: IniciarSesion.php');//Aqui lo redireccionas al lugar que quieras.
        die();
      }

      if(!isset($_GET['id'])||!isset($_GET['idDiag'])){
        header('Location: ListaPaciente.php');
        die();
      }
      $id = $_GET['id'];
      $idDiag = $_GET['idDiag'];
      $idNM = $_GET['idNM'];
    
      $enlace = mysqli_connect("slh.chjrd0648elz.us-west-2.rds.amazonaws.com", "proteco", "proteco123", "clinicaslh");

                        if (!$enlace) {
                               echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
                               echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
                               echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
                               exit;
                        }
                        
                        
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icons.png" />
    <link rel="icon" type="image/png" href="assets/img/favicons.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Clínica San Luis Huexotla</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="azul" data-image="bg2.JPG">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a class="simple-text">
                    <a class="simple-text">
                        <?php
                            

                            $query = "SELECT Nombre, ApellidoPat FROM PACIENTE WHERE idPACIENTE=$id";
                            $result = mysqli_query($enlace, $query);
                            $row = mysqli_fetch_array($result);
                            echo $row['Nombre'] . " " .$row['ApellidoPat'];
                            ?>
                    </a>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="dashboard.php?id=<?php echo $id; ?>">
                            <i class="material-icons">dashboard</i>
                            <p>Vista General</p>
                        </a>
                    </li>
                    <li>
                        <a href="DatosPaciente.php?id=<?php echo $id; ?>">
                            <i class="material-icons">person</i>
                            <p>Datos personales</p>
                        </a>
                    </li>
                    <li>
                        <a href="HistoriaClinica.php?id=<?php echo $id; ?>">
                            <i class="material-icons">fingerprint</i>
                            <p>Historia Clínica</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="Diagnosticos.php?id=<?php echo $id; ?>">
                            <i class="material-icons">accessibility_new</i>
                            <p>Diagnósticos</p>
                        </a>
                    </li>
                    <li>
                        <a href="Archivos.php?id=<?php echo $id; ?>">
                            <i class="material-icons">folder_shared</i>
                            <p>Archivos</p>
                        </a>
                    </li>
                    <li>
                        <a href="CitasPaciente.php?id=<?php echo $id; ?>">
                            <i class="material-icons text-gray">access_time</i>
                            <p>Citas programadas</p>
                        </a>
                    </li>
                   
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> ⚕︎ Clínica San Luis Huexotla</a>
                    </div>
                    <div class="collapse navbar-collapse" id="navigation-example-2">
                        <ul class="nav navbar-nav navbar-right">
                              <li>
                                  <a href="ListaPaciente.php">
                                    <i class="material-icons text-gray">table_chart</i>
                                      Tabla general
                                  </a>
                              </li>
                              <li>
                                  <a href="Calendario.php">
                                        <i class="material-icons text-gray">insert_invitation</i>
                                      Calendario
                                  </a>
                              </li>
                             
                              <li class="dropdown">
                                  <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="material-icons text-gray">face</i>
                                          Perfil
                                      
                                  </a>
                                  <ul class="dropdown-menu">
                                      <li class="dropdown-header">
                                          Médico
                                      </li>
                                      <li>
                                          <a href="#pablo">Datos médicos</a>
                                      </li>
                                      <li>
                                        
                                          <a href="#pablo">Configuración página</a>
                                          
                                      </li>
                                      <li class="divider"></li>
                                      <li>
                                        
                                        <a href="index.php">Cerrar Sesión</a></li>
                                  </ul>
                              </li>
                         </ul>
                         <form class="navbar-form navbar-right" role="search">
                            
                        </form>
                      </div><!-- /.navbar-collapse -->

                        
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="azul">
                                    <i class="material-icons pull-right" style="font-size: 54px;">emoji_people</i>
                                    <h4 class="title">Nota Médica</h4>
                                    
                                    <p class="category">Visualice los datos de la nota médica para tener mejores criterios</p>
                                </div>
                                <div class="card-content">
                                   
                                        <div class="row">
                                            <h5 align="center"> <b>Datos generales</b></h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class="control-label" style="font-size: 12px !important">Fecha</label>
                                                    <h6><?php
                                                        $query = "SELECT Fecha FROM NOTA_MEDICA WHERE idNOTA_MEDICA=$idNM;";
                                                        $result = mysqli_query($enlace, $query);
                                                        $row = mysqli_fetch_array($result);
                                                        echo $row['Fecha'];
                                                    ?>
                                            </h6>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label" style="font-size: 12px !important">Diagnóstico</label>
                                                    <h6>
                                                        <?php
                                                            $query = "SELECT Nombre FROM DIAGNOSTICO WHERE idDIAGNOSTICO=$idDiag;";
                                                            $result = mysqli_query($enlace, $query);
                                                            $row = mysqli_fetch_array($result);
                                                            echo $row['Nombre'];
                                                        ?>
</h6>
                                                
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label" style="font-size: 12px !important">Cédula Profesional Médico</label>
                                                    <h6><?php
                                                        $query = "SELECT NOTA_MEDICA.CONSULTAGENERAL_MEDICO_CedProf FROM NOTA_MEDICA WHERE idNOTA_MEDICA=$idNM;";
                                                        $result = mysqli_query($enlace, $query);
                                                        $row = mysqli_fetch_array($result);
                                                        echo $row['CONSULTAGENERAL_MEDICO_CedProf'];
                                                    ?></h6>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label" style="font-size: 12px !important">Médico</label>
                                                    <h6><?php
                                                        $query = "SELECT MEDICO.Nombre,MEDICO.ApellidoPat,MEDICO.ApellidoMat FROM MEDICO INNER JOIN NOTA_MEDICA ON NOTA_MEDICA.CONSULTAGENERAL_MEDICO_CedProf=MEDICO.CedProf WHERE idNOTA_MEDICA=$idNM;";
                                                        $result = mysqli_query($enlace, $query);
                                                        $row = mysqli_fetch_array($result);
                                                        echo $row['Nombre'] . " " . $row['ApellidoPat'] . " " . $row['ApellidoMat'];
                                                    ?></h6>
                                            </div>
                                        </div>          


                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="control-label" style="font-size: 12px !important">Nombre Paciente</label>
                                                    <h6>
                                                        <?php
                                                            $query = "SELECT Nombre FROM PACIENTE WHERE idPACIENTE=$id;";
                                                            $result = mysqli_query($enlace, $query);
                                                            $row = mysqli_fetch_array($result);
                                                            echo $row['Nombre'];
                                                        ?>
                                                    </h6>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label" style="font-size: 12px !important">Apellido Paterno</label>
                                                    <h6><?php
                                                            $query = "SELECT ApellidoPat FROM PACIENTE WHERE idPACIENTE=$id;";
                                                            $result = mysqli_query($enlace, $query);
                                                            $row = mysqli_fetch_array($result);
                                                            echo $row['ApellidoPat'];
                                                        ?></h6>
                                                
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label" style="font-size: 12px !important">Apellido Materno</label>
                                                    <h6><?php
                                                            $query = "SELECT ApellidoMat FROM PACIENTE WHERE idPACIENTE=$id;";
                                                            $result = mysqli_query($enlace, $query);
                                                            $row = mysqli_fetch_array($result);
                                                            echo $row['ApellidoMat'];
                                                        ?></h6>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="control-label" style="font-size: 12px !important">Edad</label>
                                                    <h6><?php
                                                            $query = "SELECT FechaNacimiento FROM PACIENTE WHERE idPACIENTE=$id";
                                                            $result = mysqli_query($enlace, $query);
                                                            if(!$result){
                                                                echo "NA";
                                                            }
                                                            $row = mysqli_fetch_array($result);
                                                            $_age = floor((time() - strtotime($row[0])) / 31556926);
                                                            echo $_age;
                                                        ?></h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h5 align="center"> <b>Signos vitales</b></h5>
                                        </div>
                                    <div class="row">
                                            <div>
                                            <div class="col-md-2">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Temp</label>
                                                    <h6><?php
                                                        $query = "SELECT Temperatura FROM NOTA_MEDICA WHERE idNOTA_MEDICA=$idNM;";
                                                        $result = mysqli_query($enlace, $query);
                                                        $row = mysqli_fetch_array($result);
                                                        echo $row['Temperatura']. " ºC";
                                                    ?></h6>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">TA</label>
                                                    <h6><?php
                                                        $query = "SELECT TA,TA2 FROM NOTA_MEDICA WHERE idNOTA_MEDICA=$idNM;";
                                                        $result = mysqli_query($enlace, $query);
                                                        $row = mysqli_fetch_array($result);
                                                        echo $row['TA']. "/" .$row['TA2'];
                                                    ?></h6>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">FC</label>
                                                    <h6><?php
                                                        $query = "SELECT FC FROM NOTA_MEDICA WHERE idNOTA_MEDICA=$idNM;";
                                                        $result = mysqli_query($enlace, $query);
                                                        $row = mysqli_fetch_array($result);
                                                        echo $row['FC'];
                                                    ?></h6>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">FR</label>
                                                    <h6><?php
                                                        $query = "SELECT FR FROM NOTA_MEDICA WHERE idNOTA_MEDICA=$idNM;";
                                                        $result = mysqli_query($enlace, $query);
                                                        $row = mysqli_fetch_array($result);
                                                        echo $row['FR'];
                                                    ?></h6>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Ox:</label>
                                                    <h6><?php
                                                        $query = "SELECT Oxiometria FROM NOTA_MEDICA WHERE idNOTA_MEDICA=$idNM;";
                                                        $result = mysqli_query($enlace, $query);
                                                        $row = mysqli_fetch_array($result);
                                                        echo $row['Oxiometria']. " %";
                                                    ?></h6>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Peso</label>
                                                    <h6><?php
                                                        $query = "SELECT Peso FROM NOTA_MEDICA WHERE idNOTA_MEDICA=$idNM;";
                                                        $result = mysqli_query($enlace, $query);
                                                        $row = mysqli_fetch_array($result);
                                                        echo $row['Peso'] . " KG";
                                                    ?></h6>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Talla</label>
                                                    <h6><?php
                                                        $query = "SELECT Talla FROM NOTA_MEDICA WHERE idNOTA_MEDICA=$idNM;";
                                                        $result = mysqli_query($enlace, $query);
                                                        $row = mysqli_fetch_array($result);
                                                        echo $row['Talla'] . " cm";
                                                    ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        
                                        <div class="row">
                                            <h5 align="center"> <b>Notas</b></h5>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    
                                                    <div class="form-group label-floating">
                                                        <label class="control-label"> Padecimiento</label>
                                                        <h6><?php
                                                        $query = "SELECT Padecimiento FROM NOTA_MEDICA WHERE idNOTA_MEDICA=$idNM;";
                                                        $result = mysqli_query($enlace, $query);
                                                        $row = mysqli_fetch_array($result);
                                                        echo $row['Padecimiento'];
                                                    ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    
                                                    <div class="form-group label-floating">
                                                        <label class="control-label"> Exploración Física</label>
                                                        <h6><?php
                                                        $query = "SELECT ExploFisica FROM NOTA_MEDICA WHERE idNOTA_MEDICA=$idNM;";
                                                        $result = mysqli_query($enlace, $query);
                                                        $row = mysqli_fetch_array($result);
                                                        echo $row['ExploFisica'];
                                                    ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    
                                                    <div class="form-group label-floating">
                                                        <label class="control-label"> Tratamiento</label>
                                                        <h6><?php
                                                        $query = "SELECT Tratamiento FROM NOTA_MEDICA WHERE idNOTA_MEDICA=$idNM;";
                                                        $result = mysqli_query($enlace, $query);
                                                        $row = mysqli_fetch_array($result);
                                                        echo $row['Tratamiento'];
                                                    ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    
                                                    <div class="form-group label-floating">
                                                        <label class="control-label"> Plan</label>
                                                        <h6><?php
                                                        $query = "SELECT Plan FROM NOTA_MEDICA WHERE idNOTA_MEDICA=$idNM;";
                                                        $result = mysqli_query($enlace, $query);
                                                        $row = mysqli_fetch_array($result);
                                                        echo $row['Plan'];
                                                    ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h5 align="center"> <b>Archivos adjuntos *</b></h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label"> Número de archivos adjuntos:</label>
                                                        <h6><?php
                                                        $query = "SELECT COUNT(*) FROM ESTUDIO WHERE NOTA_MEDICA_idNOTA_MEDICA=$idNM;";
                                                        $result = mysqli_query($enlace, $query);
                                                        $row = mysqli_fetch_array($result);
                                                        echo $row['COUNT(*)'];
                                                        $CantidadArchivos = $row['COUNT(*)'];
                                                    ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <?php

                            $query = "SELECT * FROM ESTUDIO WHERE NOTA_MEDICA_idNOTA_MEDICA=$idNM;";

                            $result = mysqli_query($enlace, $query);
                            

                            while($row = mysqli_fetch_array($result)){ ?>
                                            <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                <input type="text" readonly="" class="form-control" placeholder="<?php echo $row['NombreArchivo'];?>">
                                                    <span class="input-group-btn input-group-s">
                                                        <a target="_blank" type="button" class="btn btn-round btn-primary" href="view.php?file=<?php echo $row['idESTUDIO'];?>">
                                                                <i class="material-icons">attach_file</i>
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group label-floating">
                                                    <label class="control-label" style="font-size: 12px !important">Tipo</label>
                                                    <?php echo $row['Tipo'];?>
                                                </div>
                                            </div>
                              
                              <?php
                                }
                                ?>
                                            

                                            
                                        </div>
                                         <div class="row">
                                            <div class="col-md-6">
                                            <p>*Archivos tales como análisis de laboratorio, radiografías, cultivos, etc. <b>PDF</b></p>
                                            </div>
                                        </div>
                                        
                                        <div class="clearfix"></div>
                                
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Material Dashboard javascript methods -->
<script src="assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>

</html>
