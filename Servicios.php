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
    <link href="assets/css/material-kit.css?v=1.2.1" rel="stylesheet"/>

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/assets-for-demo/vertical-nav.css" rel="stylesheet" />
  <link href="assets/assets-for-demo/demo.css" rel="stylesheet" />

</head>

<body class="section-white">


    <nav class="navbar navbar-default navbar-transparent navbar-fixed-top navbar-color-on-scroll" color-on-scroll=" " id="sectionsNav">
      <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"> ⚕︎ Clínica San Luis Huexotla </a>
          </div>



          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">

            <li>
            <a href="Somos.php">
              <i class="material-icons">supervised_user_circle</i> ¿Quiénes somos?
            </a>
            </li>



            <li>
            <a href="Servicios.php">
              <i class="material-icons">grade</i> Servicios
            </a>
            </li>







          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <i class="material-icons">accessibility</i> Citas
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-with-icons">




              




              <li>
                <a href="Ubicacion.php">
                  <i class="material-icons">map</i> Ubicación
                </a>
              </li>




              <li>
                <a href="Contacto.php">
                  <i class="material-icons">contact_phone</i> Contacto
                </a>
              </li>



            </ul>
          </li>

          <li>
            <a href="IniciarSesion.php">
              <i class="material-icons">https</i> Iniciar Sesión
            </a>
            </li>


            </ul>
          </div>
      </div>
    </nav>
  


      



  <div class="page-header header-filter " data-parallax="true" style="background-image: url('bg2.JPG');height: 100vh; background-size: cover; ">
    <div class="container">
       <div class="row">
          <div class="col-md-8 col-md-offset-2 text-center">
            <h1 class="title">Clínica San Luis Huexotla</h1>
                      <h4>Institución de sanitaria la servicio de tu salud</h4>
          </div>
          <div class="col-md-10 col-md-offset-1" align="center">
            <h3 class="title">Servicios que ofrecemos </h3>
            <h5 > <b>Medicina general </b></h5>
            <h5 > <b>Medicina interna</b></h5>
            <h5 > <b>Ginecología y obstetricia</b></h5>
            <h5 > <b> Cirugía general</b></h5>
            <h5 ><b> Pediatría </b></h5>
          </div>
                </div>


        


        </div>
  </div>












             
            
</body>
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
  <script src="assets/js/material-kit.js?v=1.2.1" type="text/javascript"></script>

  <!-- Fixed Sidebar Nav - JS For Demo Purpose, Don't Include it in your project -->
  <script src="assets/assets-for-demo/modernizr.js" type="text/javascript"></script>
  <script src="assets/assets-for-demo/vertical-nav.js" type="text/javascript"></script>

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
