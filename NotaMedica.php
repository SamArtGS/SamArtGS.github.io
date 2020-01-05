<?php
    header('Content-Type: text/html; charset=UTF-8');
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
                                          <?php echo $_SESSION['medico'];
                                          ?>
                                      </li>
                                      <li>
                                          <a href="PerfilMedico.php">Datos médicos</a>
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
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons pull-right" style="font-size: 54px;">emoji_people</i>
                                    <h4 class="title">Nueva Nota Médica - Consulta General</h4>
                                    
                                    <p class="category">Inserte los datos requeridos por favor</p>
                                </div>
                                <div class="card-content">
                                    <form action="GuardarNM.php?id=<?php echo $id; ?>&idDiag=<?php echo $idDiag;?>" method="post">


<div class="row">
    <div class="col-md-5">
        <div class="form-group label-floating">
            <label class="control-label" style="font-size: 12px !important">Descripción corta de la Consulta General</label>
            
                    <input type="text" name="descripcion" class="form-control"  required>
        </div>
    </div>
    
    
</div>


                                        <div class="row">
                                            <h5 align="center"> <b>Datos generales</b></h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class="control-label" style="font-size: 12px !important">Fecha</label>
                                                    <h6><?php
                                                        echo date("Y-m-d");
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
                                                        $query = "SELECT CedProf FROM MEDICO WHERE CedProf=$ced;";
                                                        $result = mysqli_query($enlace, $query);
                                                        $row = mysqli_fetch_array($result);
                                                        echo $row['CedProf'];
                                                    ?></h6>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label" style="font-size: 12px !important">Médico</label>
                                                    <h6><?php
                                                        $query = "SELECT Nombre,ApellidoPat,ApellidoMat FROM MEDICO WHERE CedProf=$ced;";
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
                                                <div class="form-group label-floating" required>
                                                    <label class="control-label">Temp (ºC)</label>
                                                    <input type="number" step="0.1" class="form-control" name="Temperatura" min="35" max="42" required> ºC
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">TA</label>
                                                    <input type="number" class="form-control" name="TA1" required min="100" max="300"> <h6 align="center">/</h3>
                                                    <input type="number" class="form-control" name="TA2" required min="100" max="350">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">FC</label>
                                                    <input type="number" class="form-control" name="FC" required min="0" max="250">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">FR</label>
                                                    <input type="number" class="form-control" name="FR" required min="0" max="50">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Ox:</label>
                                                    <input type="number" class="form-control" name="OX" required min="0" max="100"> %
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Peso </label>
                                                    <input type="number" step="0.001" class="form-control" min="0" max="160" name="Peso" required> KG
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Talla</label>
                                                    <input type="number" class="form-control" name="Talla" min="0" max="250" required>CM
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
                                                        <textarea class="form-control" rows="6" name="Padecimiento" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    
                                                    <div class="form-group label-floating">
                                                        <label class="control-label"> Exploración Física</label>
                                                        <textarea class="form-control" rows="6" name="ExploFisica" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    
                                                    <div class="form-group label-floating">
                                                        <label class="control-label"> Tratamiento</label>
                                                        <textarea class="form-control" rows="6" name="Tratamiento" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    
                                                    <div class="form-group label-floating">
                                                        <label class="control-label"> Plan</label>
                                                        <textarea class="form-control" rows="6" name="Plan" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-success pull-right">Guardar nota médica</button>
                                        <div class="clearfix"></div>
                                    </form>
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
