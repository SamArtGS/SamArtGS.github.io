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
    
<link href="assets/css/material-dashboard.css" rel="stylesheet"/>
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
                                          <a href="#pablo">Datos médicos</a>
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
        <div class="row" style="padding-top: 100px" >
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="azul">
                                    <i class="material-icons pull-right" style="font-size: 54px;">emoji_people</i>
                                    <h4 class="title">Nuevo paciente</h4>
                                    
                                    <p class="category" style="color: #FFF;">Para registrar un paciente es requerido por lo menos su <b>nombre completo, su número telefónico y de preferencia la fecha de nacimiento</b></p>

                                </div>
                                <div class="card-content">
                                    <form method="post" name="TablaUser"onsubmit="return validateForm()" action="GuardarPaciente.php">

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nombres</label>
                                                    <input type="text" class="form-control" name="nombres" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Apellido Paterno</label>
                                                    <input type="text" class="form-control" name="apellidopat" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Apellido Materno</label>
                                                    <input type="text" class="form-control" name="apellidomat" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Teléfono</label>
                                                    <input type="number" class="form-control" name="telefono" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                          
                                            <div class="col-md-2">
                                                <div class="form-group">
                                              <label class="label-control">Fecha de nacimiento</label>
                                              <input type="text" class="form-control datepicker" value="1978-04-12" name="fechanacimiento"/>
                                            </div>
                                            </div>
                                              <div class="col-lg-2 col-sm-4 " style="padding-top: 50px"  align="center">
                                              <select class="selectpicker form-control" data-style="select-with-transition"  title="Tipo de sangre" data-size="8" name="tiposangre">
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                              </select>
                                              </div>
                                            
                                                <div class="col-lg-2 col-sm-4 " style="padding-top: 50px"  align="center">
                                              <select class="selectpicker form-control" data-style="select-with-transition"  title="Sexo" data-size="3" name="sexo">
                                                <option value="Hombre">Hombre</option>
                                                <option value="Mujer">Mujer</option>
                                                
                                              </select>
                                              </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Dirección</label>
                                                    <input type="text" class="form-control" name="direccion">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Ciudad</label>
                                                    <input type="text" class="form-control" name="ciudad">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Estado</label>
                                                    <input type="text" class="form-control" name="estado">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Código Postal</label>
                                                    <input type="number" class="form-control" name="cp">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Estado Civil</label>
                                                    <input type="text" class="form-control" name="EstadoCivil">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Religión</label>
                                                    <input type="text" class="form-control" name="religion">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Lugar de Nacimiento</label>
                                                    <input type="text" class="form-control" name="lugarnacimiento">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-success pull-right">Guardar datos</button>
                                    </form>
                                    <button class="btn btn-danger pull-right" onclick="window.location.href='ListaPaciente.php'">Descartar datos</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
</body>

<script type="text/javascript">
  function validateForm() {
    var a = document.forms["TablaUser"]["nombres"].value;
    var b = document.forms["TablaUser"]["apellidopat"].value;
    var c = document.forms["TablaUser"]["apellidomat"].value;
    var d = document.forms["TablaUser"]["telefono"].value;
    if (a == null || a == "", b == null || b == "", c == null || c == "", d == null || d == "") {
      alert("No has insertado los datos básicos: nombre, apellidos y teléfono");
      return false;
    }
  }
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
    $().ready(function(){

      materialKitDemo.initContactUs2Map();
    });
  </script>
</html>
