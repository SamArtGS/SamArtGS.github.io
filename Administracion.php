<?php
    header('Content-Type: text/html; charset=UTF-8');
    session_start();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
    if (!isset($_SESSION['admin'])){
        header('Location: IniciarSesion.php');//Aqui lo redireccionas al lugar que quieras.
        die();
      }
      $ced = $_SESSION['admin'];
      $enlace = mysqli_connect("slh.chjrd0648elz.us-west-2.rds.amazonaws.com", "proteco", "proteco123", "clinicaslh");

                        if (!$enlace) {
                               echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
                               echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
                               echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
                               exit;
                        }
?>


<!DOCTYPE html>
<html lang="en">

    <head>
  <meta charset="utf-8" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icons.png" />
    <link rel="icon" type="image/png" href="assets/img/favicons.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Clínica San Luis Huexotla</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

  <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css" rel="stylesheet"/>

  
</head>

<body class="section-white">


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
                              
                             
                              <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="material-icons text-gray">face</i>
                                          Perfil
                                      
                                  </a>
                                  <ul class="dropdown-menu">
                                      <li class="dropdown-header">
                                          Administración
                                      </li>
                                      
                                      
                                      <li class="divider"></li>
                                      <li>
                                        
                                        <a href="cerrarSesion.php">Cerrar Sesión</a></li>
                                  </ul>
                              </li>
                         </ul>
                         <form class="navbar-form navbar-right" role="search">
                            
                        </form>
                      </div><!-- /.navbar-collapse -->

                        
                </div>
            </nav>
  


      


<div class="content">
<div class="container-fluid" >

          <h2 class="title text-center" style="padding-top: 70px">Administración de la clínica</h2>
<div class="row" align="center">


    <button class="btn btn-warning pull-center" align="center" onclick="window.location.href='ReportesAd.php'"> <i class="material-icons">bar_chart</i>  Reportes</button>

    <button class="btn btn-info pull-center" align="center" onclick="window.location.href='IngresarMedico.php'"> <i class="material-icons">person_add</i>Nuevo médico</button>

    <button class="btn btn-success pull-center" align="center"> <i class="material-icons">search</i>  Documentacion</button>
</div>
<div class="card">
  <div class="card-content table-responsive">

<h3 class="title text-center" style="padding-top: 70px">Lista de pacientes</h3>
      <table class="table table-hover">
                    <thead class="text-danger">
                      <th>ID</th>
                      <th>Nombres</th>
                      <th>Apellido Paterno</th>
                      <th>Apellido Materno</th>
                      <th>Teléfono</th>
                    </thead>
                    <tbody >
                      
                        <?php
                            
                            
                            $query = "SELECT idPACIENTE, Nombre, ApellidoPat, ApellidoMat, Telefono FROM PACIENTE;";
 
                            $result = mysqli_query($enlace, $query);
                             
                            
                            
                            while($row = mysqli_fetch_array($result)){ ?>
                              
                              <tr >
                                
                                <td><?php echo $row['idPACIENTE']; ?></td>
                                <td><?php echo $row['Nombre']; ?></td>
                                <td><?php echo $row['ApellidoPat']; ?></td>
                                <td><?php echo $row['ApellidoMat']; ?></td>
                                <td><?php echo $row['Telefono']; ?></td>
    
                              </tr>
                              <?php
                                }?>
                              
                    </tbody>
                  </table>


<h3 class="title text-center" style="padding-top: 70px">Lista de médicos</h3>
<table class="table table-hover">
                   <thead class="text-danger">
                     <th>Cédula Profesional</th>
                     <th>Nombres</th>
                     <th>Apellido Paterno</th>
                     <th>Apellido Materno</th>
                     
                   </thead>
                   <tbody >
                     
                       <?php
                           
                           
                           $query = "SELECT * FROM MEDICO;";

                           $result = mysqli_query($enlace, $query);
                            
                           
                           
                           while($row = mysqli_fetch_array($result)){ ?>
                             
                             <tr >
                               
                               <td><?php echo $row['CedProf']; ?></td>
                               <td><?php echo $row['Nombre']; ?></td>
                               <td><?php echo $row['ApellidoPat']; ?></td>
                               <td><?php echo $row['ApellidoMat']; ?></td>
   
                             </tr>
                             <?php
                               }?>
                             
                   </tbody>
                 </table>

</div>
</div>
</div>
</div>
            
</body>
<script type="text/javascript">
  var tableCells = document.querySelectorAll("td[celda]");
  window.onclick
</script>
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/material.min.js"></script>

  <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
  <script src="assets/js/moment.min.js"></script>

  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/nouislider.min.js" type="text/javascript"></script>

  <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="assets/js/bootstrap-datetimepicker.js" type="text/javascript"></script>

  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="assets/js/bootstrap-selectpicker.js" type="text/javascript"></script>

  <!--  Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
  <script src="assets/js/bootstrap-tagsinput.js"></script>

  <!--  Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="assets/js/jasny-bootstrap.min.js"></script>

  <!-- Plugin For Google Maps -->
  <script  type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBn4Uga7u3Ae37I8Ll9u3sVbEsnjZYKtQQ"></script>



  <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
  <script src="assets/js/material-kit.js" type="text/javascript"></script>

  

  <script type="text/javascript">

    $(document).ready(function(){
      var slider = document.getElementById('sliderRegular');

          noUiSlider.create(slider, {
              start: 40,
              connect: [true,true],
              range: {
                  min: 0,
                  max: 100
              }
          });

          var slider2 = document.getElementById('sliderDouble');

          noUiSlider.create(slider2, {
              start: [ 20, 60 ],
              connect: true,
              range: {
                  min:  0,
                  max:  100
              }
          });



      materialKit.initFormExtendedDatetimepickers();

    });
  </script>
  <script type="text/javascript">
    function ClearFields() {

     document.getElementById("busqueda").value = "";
     document.getElementById("categoria").value = "";
}
  </script>
  <script type="text/javascript">
    $().ready(function(){

      materialKitDemo.initContactUs2Map();
    });
  </script>
  <script src="assets/js/buscar.js"></script>
</html>
