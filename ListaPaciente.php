<?php
    header('Content-Type: text/html; charset=UTF-8');
    session_start();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
    if (!isset($_SESSION['medico'])){
        header('Location: IniciarSesion.php');//Aqui lo redireccionas al lugar que quieras.
        die();
      }
?>


<!DOCTYPE html>
<html lang="en">

    <head>
  <meta charset="utf-8" />
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
                              <li>
                                  <a href="ListaPaciente.php">
                                    <i class="material-icons text-gray">table_chart</i>
                                      Tabla general
                                  </a>
                              </li>
                              <li>
                                  <a href="Calendario.html">
                                        <i class="material-icons text-gray">insert_invitation</i>
                                      Calendario
                                  </a>
                              </li>
                             
                              <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="material-icons text-gray">face</i>
                                          Perfil
                                      
                                  </a>
                                  <ul class="dropdown-menu">
                                      <li class="dropdown-header">
                                          <?php echo $_SESSION['medico'];
                                          ?>
                                      </li>
                                      <li>
                                          <a href="#pablo">Datos médicos</a>
                                      </li>
                                      <li>
                                        
                                          <a href="#pablo">Configuración página</a>
                                          
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
          <h2 class="title text-center" style="padding-top: 70px">Lista de pacientes</h2>

<div class="row" align="center">


                <div class="col-lg-3 col-sm-4" align="center">
                      <div class="form-group">
                        <input type="text" value="" placeholder="Insertar campo" class="form-control" />
                      </div>
                    </div>

  <div class="col-lg-3 col-sm-4 " style="padding-top: 20px"  align="center">
                  <select class="selectpicker" data-style="select-with-transition" multiple title="Elegir Campo" data-size="7">
                    <option value="1"> Nombre Completo</option>
                    <option value="2">Número Telefónico</option>
                    <option value="3">Tipo de Sangre</option>
                    <option value="4">Apellido Paterno</option>
                    <option value="5">Apellido Materno</option>
                    <option value="6">Sexo</option>
                    <option value="7">Dirección</option>
                    <option value="8">ID </option>
                  </select>
                </div>
  

  <button class="btn btn-danger" align="center" onclick=""> <i class="material-icons">delete</i> Limpiar</button>
  
  <button class="btn btn-warning" align="center"> <i class="material-icons">bar_chart</i>  Reportes</button>
  <button class="btn btn-info" align="center" onclick="window.location.href='IngresarUsuario.php'"> <i class="material-icons">person_add</i>Nuevo</button>
  <button class="btn btn-success" align="center"> <i class="material-icons">search</i>  Buscar</button>

</div>
      <div class="card">
                <div class="card-body table-responsive">
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
                            $enlace = mysqli_connect("slh.chjrd0648elz.us-west-2.rds.amazonaws.com", "proteco", "proteco123", "clinicaslh");

                            if (!$enlace) {
                                    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
                                    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
                                    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
                                    exit;
                            }
                            
                            $query = "SELECT idPACIENTE, Nombre, ApellidoPat, ApellidoMat, Telefono FROM PACIENTE;";
 
                            $result = mysqli_query($enlace, $query);
                             
                            
                            

                            while($row = mysqli_fetch_array($result)){ ?>
                              
                              <tr class='clickable-row' data-href='dashboard.php?id=<?php echo $row['idPACIENTE'];?>'>
                                
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
  jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>

  <script type="text/javascript">
    $().ready(function(){

      materialKitDemo.initContactUs2Map();
    });
  </script>
</html>
