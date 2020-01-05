<?php
    header('Content-Type: text/html; charset=UTF-8');
    session_start();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
    if (!isset($_SESSION['medico'])){
        header('Location: IniciarSesion.php');//Aqui lo redireccionas al lugar que quieras.
        die();
      }

      
      $enlace = mysqli_connect("slh.chjrd0648elz.us-west-2.rds.amazonaws.com", "proteco", "proteco123", "clinicaslh");

                        if (!$enlace) {
                               echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
                               echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
                               echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
                               exit;
                        }
                        
                        
?>


<!DOCTYPE html>
<html>
<head>
    <title>Clínica San Luis Huexotla</title>
<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icons.png" />
    <link rel="icon" type="image/png" href="assets/img/favicons.png" />
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />


<link href='assets/css/fullcalendar.css' rel='stylesheet' />

<link href="assets/css/bootstrap.min.css" rel="stylesheet" />

<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

<link href="assets/css/material-kit.css" rel="stylesheet"/>

<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />




</head>

<body class="section-white" align="center">
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

<div class="content" align="center" style="align-items: center;">
                <div class="container-fluid" align="center" >
                    <div class="row" align="center" style="align-content: center;">
                        <div class="col-md-8" align="center" style="align-content: center;">
                            
                            <div class="card" align="center" style="align-content: center;">
                                
                                <div class="card-content" align="center">
                                     
  
                                        <div class="row" align="center">
                                            <div class="col-md-12 col-sm-4" align="center">

                                              <div id='calendar' align="center" style="padding-top: 70px"></div>
                                              </div>
                                              </div>
                                              </div>
                                              </div>
                                            </div>
                                          </div>
                     <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="azul">
                                    <h4 class="title">Citas programadas</h4>
                                 
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-info">
                                            <th>FechaHora</th>
                                            <th>Paciente</th>
                                            <th>Tipo</th>
                                            <th>Descripción</th>
                                            <th>Teléfono</th>
                                            <th>Médico</th>
                                        </thead>
                                        <tbody>
                                           <?php
                               $enlace = mysqli_connect("slh.chjrd0648elz.us-west-2.rds.amazonaws.com", "proteco", "proteco123", "clinicaslh");

                               if (!$enlace) {
                                       echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
                                       echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
                                       echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
                                       exit;
                               }
                               
                            $query = "SELECT CITA.FechaHora, CITA.Tipo, CITA.Descripcion, PACIENTE.Nombre AS Pac_Nombre,PACIENTE.ApellidoPat AS Pac_ApP, PACIENTE.ApellidoMat AS Pac_ApM, PACIENTE.Telefono, MEDICO.Nombre AS Med_Nombre, MEDICO.ApellidoPat AS Med_ApP,MEDICO.ApellidoMat AS Med_ApM FROM CITA INNER JOIN PACIENTE ON PACIENTE.idPACIENTE = CITA.PACIENTE_idPACIENTE INNER JOIN MEDICO ON MEDICO.CedProf = CITA.MEDICO_CedProf;";
    
                               $result = mysqli_query($enlace, $query);
                                
                               while($row = mysqli_fetch_array($result)){ ?>
                                 
                                 <tr>
                                   <td><?php echo $row['FechaHora']; ?></td>
                                    <td><?php echo $row['Pac_Nombre'] . " " . $row['Pac_ApP'] . " " . $row['Pac_ApM']; ?></td>
                                   <td><?php echo $row['Tipo']; ?></td>
                                   <td><?php echo $row['Descripcion']; ?></td>
                                   
                                   <td><?php echo $row['Telefono']; ?></td>
                                   <td><?php echo $row['Med_Nombre'] . " " . $row['Med_ApP'] . " " . $row['Med_ApM']; ?></td>
                                 </tr>
                                 <?php
                                   }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
            </div>
 </div>
 </div>


</body>

<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/material-kit.js" type="text/javascript"></script>
<script src='assets/js/fullcalendar.js' type="text/javascript"></script>




<script>

    $(document).ready(function() {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        /*
        className: default(transparent), important(red), chill(pink), success(green), info(blue)
        */

        /* initialize the external events
        -----------------------------------------------------------------*/

        $('#external-events div.external-event').each(function() {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });


        /* initialize the calendar
        -----------------------------------------------------------------*/

        var calendar =  $('#calendar').fullCalendar({
            header: {
                left: 'title',
                center: 'agendaDay,agendaWeek,month',
                right: 'prev,next today'
            },
            editable: true,
            firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
            selectable: true,
            defaultView: 'month',

            axisFormat: 'h:mm',
            columnFormat: {
                month: 'ddd',    // Mon
                week: 'ddd d', // Mon 7
                day: 'dddd M/d',  // Monday 9/7
                agendaDay: 'dddd d'
            },
            titleFormat: {
                month: 'MMMM yyyy', // September 2009
                week: "MMMM yyyy", // September 2009
                day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
            },
            allDaySlot: false,
            selectHelper: true,
            select: function(start, end, allDay) {
                var title = prompt('Event Title:');
                if (title) {
                    calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                        true // make the event "stick"
                    );
                }
                calendar.fullCalendar('unselect');
            },
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function(date, allDay) { // this function is called when something is dropped

                // retrieve the dropped element's stored Event Object
                var originalEventObject = $(this).data('eventObject');

                // we need to copy it, so that multiple events don't have a reference to the same object
                var copiedEventObject = $.extend({}, originalEventObject);

                // assign it the date that was reported
                copiedEventObject.start = date;
                copiedEventObject.allDay = allDay;

                // render the event on the calendar
               
                $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }

            },

            events: [
                                                    
              <?php
               $enlace = mysqli_connect("slh.chjrd0648elz.us-west-2.rds.amazonaws.com", "proteco", "proteco123", "clinicaslh");

               if (!$enlace) {
                       echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
                       echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
                       echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
                       exit;
               }
            $query = "SELECT YEAR(CITA.FechaHora) AS anio,MONTH(CITA.FechaHora) AS mes, DAY(CITA.FechaHora) AS dia,HOUR(CITA.FechaHora) AS hora,MINUTE(CITA.FechaHora) AS minuto,PACIENTE.Nombre AS Pac_Nombre,PACIENTE.ApellidoPat AS Pac_ApP FROM CITA INNER JOIN PACIENTE ON PACIENTE.idPACIENTE = CITA.PACIENTE_idPACIENTE;";

               $result = mysqli_query($enlace, $query);
                
               while($row = mysqli_fetch_array($result)){ ?>
                {
                    title: '<?php echo $row['Pac_Nombre']?>', 
                    start: new Date(<?php echo $row['anio']?>, <?php echo $row['mes']-1;?>, <?php echo $row['dia']?>, <?php echo $row['hora']?>, <?php echo $row['minuto']?>),
                    allDay: false,
                    className: 'important'
                },
                                                    <?php }?>
            ],
        });


    });

</script>
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


</html>
