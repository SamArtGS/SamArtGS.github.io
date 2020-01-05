<?php
    header('Content-Type: text/html; charset=UTF-8');
    session_start();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
    if (!isset($_SESSION['medico'])){
        header('Location: IniciarSesion.php');//Aqui lo redireccionas al lugar que quieras.
        die();
      }
    $tmp = "";
    $enlace = mysqli_connect("slh.chjrd0648elz.us-west-2.rds.amazonaws.com", "proteco", "proteco123", "clinicaslh");
    if (!$enlace) {
      echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
      echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
      echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
      exit;
    }
  $tmp = "<table class='table table-hover'>
    <thead class='text-danger'>
      <th>ID</th>
      <th>Nombres</th>
      <th>Apellido Paterno</th>
      <th>Apellido Materno</th>
      <th>Teléfono</th>
    </thead>
    <tbody>";
    
    $query = "SELECT idPACIENTE, Nombre, ApellidoPat, ApellidoMat, Telefono FROM PACIENTE ORDER BY idPaciente";
    if(isset($_POST['texto'])){
      if($_POST['categoria'] == "1"){
        $query = "SELECT idPACIENTE, Nombre, ApellidoPat, ApellidoMat, Telefono FROM PACIENTE WHERE Nombre LIKE '".$_POST["texto"]."%' OR ApellidoPat LIKE '".$_POST["texto"]."%' OR ApellidoMat LIKE '".$_POST["texto"]."%' ";
      }
      else if($_POST['categoria'] == "2"){
        $query = "SELECT idPACIENTE, Nombre, ApellidoPat, ApellidoMat, Telefono FROM PACIENTE WHERE Telefono LIKE '".$_POST["texto"]."%'";
      }
      else if($_POST['categoria'] == "3"){
        $query = "SELECT idPACIENTE, Nombre, ApellidoPat, ApellidoMat, Telefono FROM PACIENTE WHERE idPACIENTE LIKE '".$_POST["texto"]."%'";
    }
  }
    $result = mysqli_query($enlace, $query);
                            
    while($row = mysqli_fetch_array($result)){ 
    
      

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

$script = "<script type='text/javascript'>
jQuery(document).ready(function($) {
  $('.clickable-row').click(function() {
      window.location = $(this).data('href');
  });
});
</script>";
echo $script;            
?>