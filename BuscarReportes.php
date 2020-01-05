<?php
    header('Content-Type: text/html; charset=UTF-8');
    session_start();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
    
    $tmp = "";
    $enlace = mysqli_connect("slh.chjrd0648elz.us-west-2.rds.amazonaws.com", "proteco", "proteco123", "clinicaslh");
    if (!$enlace) {
      echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
      echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
      echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
      exit;
    }

date_default_timezone_set('America/Mexico_City');
$time = time();
$fechaHora = date("Y-m-d", $time);
  $tmp = "<table class='table table-hover'>
    <thead class='text-danger'>
      <th>ID</th>
      <th>Nombres</th>
      <th>Apellido Paterno</th>
      <th>Apellido Materno</th>
      <th>Teléfono</th>
    </thead>
    <tbody>";
    $periodo = "";
    if($_POST['categoria'] == "1"){
      $periodo.="Total de Pacientes Atendidos Hoy";
      $query = "SELECT PACIENTE.idPACIENTE, PACIENTE.Nombre, PACIENTE.ApellidoPat, PACIENTE.ApellidoMat, PACIENTE.Telefono FROM PACIENTE
      INNER JOIN DIAGNOSTICO ON PACIENTE.idPACIENTE = DIAGNOSTICO.PACIENTE_idPACIENTE
      INNER JOIN CONSULTAGENERAL C ON C.DIAGNOSTICO_idDIAGNOSTICO = DIAGNOSTICO.idDIAGNOSTICO
      WHERE Month(C.FechaHora) = MONTH('".$fechaHora."') AND DAY(C.FechaHora) = DAY('".$fechaHora."') AND YEAR(C.FechaHora) = YEAR('".$fechaHora."')"
      ;
    }
    else if($_POST['categoria'] == "2"){
      $periodo.="Total de Pacientes Atendidos en la Semana";
      $query = "SELECT PACIENTE.idPACIENTE, PACIENTE.Nombre, PACIENTE.ApellidoPat, PACIENTE.ApellidoMat, PACIENTE.Telefono FROM PACIENTE
      INNER JOIN DIAGNOSTICO ON PACIENTE.idPACIENTE = DIAGNOSTICO.PACIENTE_idPACIENTE
      INNER JOIN CONSULTAGENERAL C ON C.DIAGNOSTICO_idDIAGNOSTICO = DIAGNOSTICO.idDIAGNOSTICO
      WHERE WEEKOFYEAR(C.FechaHora) = WEEKOFYEAR('".$fechaHora."')"
      ;
    }
    else if($_POST['categoria'] == "3"){
      $periodo.="Total de Pacientes Atendidos en el Mes";
      $query = "SELECT PACIENTE.idPACIENTE, PACIENTE.Nombre, PACIENTE.ApellidoPat, PACIENTE.ApellidoMat, PACIENTE.Telefono FROM PACIENTE
      INNER JOIN DIAGNOSTICO ON PACIENTE.idPACIENTE = DIAGNOSTICO.PACIENTE_idPACIENTE
      INNER JOIN CONSULTAGENERAL C ON C.DIAGNOSTICO_idDIAGNOSTICO = DIAGNOSTICO.idDIAGNOSTICO
      WHERE Month(C.FechaHora) = MONTH('".$fechaHora."') AND YEAR(C.FechaHora) = YEAR('".$fechaHora."')"
      ;
    }
    
    $result = mysqli_query($enlace, $query);
    $total = 0;         
    while($row = mysqli_fetch_array($result)){ 
      $total++;
      $tmp.="<tr class='clickable-row'  data-href='dashboard.php?id=".$row['idPACIENTE']."'>
      <td>".$row['idPACIENTE']."</td>
      <td>".$row['Nombre']."</td>
      <td>".$row['ApellidoPat']."</td>
      <td>".$row['ApellidoMat']."</td>
      <td>".$row['Telefono']."</td>
    </tr>";                     
  }
$tmp.="</table>";
echo $tmp;
$printTotal = "<div class='container-fluid' >
<h3 class='h3 text-center' style='padding-top: 70px'>".$periodo." : ".$total." </h3></div>";

echo $printTotal;



$script = "<script type='text/javascript'>
jQuery(document).ready(function($) {
  $('.clickable-row').click(function() {
      window.location = $(this).data('href');
  });
});
</script>";
echo $script;            
?>
