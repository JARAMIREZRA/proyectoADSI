<?php
session_start(); require_once 'class.user.php';
$user_home = new USER();
if(!$user_home->is_logged_in())
{
    $user_home->redirect('opcioninstru.php');
}
$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html class="no-js">
<head>
  <title><?php echo $row['userEmail']; ?></title>
  <link rel="stylesheet" type="text/css" href="../css/home.css">
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <script language="javascript" src="js/jquery-3.3.1.min.js"></script>
</head>
<body>
  <div class="margin" id="margin">
    <P>Sistema de Verificacion de Ambientes</P>
  </div>
  <div class="margin1" id="margin1">
    <form action="home.php" method="post">
    <label for="txtNombres">Nombres</label><input type="text" id="margin1" name="txtNombres" placeholder="&#128272;Nombres" required="">
    <label for="txtApellidos">Apellidos</label><input type="text" id="margin1" name="txtApellidos" placeholder="&#128272;Apellidos" required="">
    <label for="txtCedula">Cedula</label><input type="text" id="margin1" name="txtCedula" placeholder="&#128272;Cedula" required="">
    <label for="txtCargo">Cargo</label><input type="text" id="margin1" name="txtCargo" placeholder="&#128272;Cargo" required="">
    <label for="txtCodigo">Codigo</label><input type="text" id="margin1" name="txtCodigo" placeholder="&#128272;Codigo" required="">
    <label for="txtCorreo">Correo</label><input type="email" id="margin1" name="txtCorreo" placeholder="&#128272;Correo" required=""><br><br>
  </div>
  
    
  <div class="margin3" id="margin3"><br>
    ✻ La distribucion de maquinaria, equipos, muebles etc. En el ambiente corresponde a las necesidades de las <select name="cbopreg1" id="preg" required>
      <option value="SI">SI</option>
      <option value="NO">NO</option>
    </select>actividades de aprendizaje.
    <br><br>

    ✻ La maquinaria y equipos son suficientes y se encuentran en buen estado para desarrollar la actividad de aprendizaje.
    <select name="cbopreg2" id="preg" required>
      <option value="SI">SI</option>
      <option value="NO">NO</option>
    </select>
    <br><br>

    ✻ El ambiente se encuentra en buenas condiciones de orden y aseo.
    <select name="cbopreg3" id="preg" required>
      <option value="SI">SI</option>
      <option value="NO">NO</option>
    </select>
    <br><br>

    ✻ Se cuenta con el procedimiento para el almacenamiento, tratamiento y disposicion de residuos.
    <select name="cbopreg4" id="preg" required>
      <option value="SI">SI</option>
      <option value="NO">NO</option>
    </select>
    <br><br>

    ✻ Los materiales e insumos son los requeridos para desarrollar la acftividad de aprendizaje (cantidad y calidad).
    <select name="cbopreg5" id="preg" required>
      <option value="SI">SI</option>
      <option value="NO">NO</option>
    </select>
    <br><br>

    ✻ El inventario existente en el ambiente esta completo y en buenas condiciones.
    <select name="cbopreg6" id="preg" required>
      <option value="SI">SI</option>
      <option value="NO">NO</option>
    </select>
    <br><br>

    ✻ Se cuenta con la bibliografia basica (fisica  y/o digital), según lo establecido en el diseño del programa de formacion <select name="cbopreg7" id="preg" required>
      <option value="SI">SI</option>
      <option value="NO">NO</option>
    </select> y las guias de aprendizaje.<br><br>
  </div>
  <input type="submit" name="btnGuardar" value="Guardar" id="boton">
  <?php
  mysql_connect('localhost','root','');
  mysql_select_db('dbtest') or die(mysql_error());
  if (@$_POST['btnGuardar'])
  {
   mysql_query("INSERT INTO formularioinstructor (nombres, apellidos, cedula, cargo, codigo, correo, pregunta1, pregunta2, pregunta3, pregunta4, pregunta5, pregunta6, pregunta7, departamento, ciudades, centros, sede, ambiente, ficha, jornada) VALUES('$_POST[txtNombres]','$_POST[txtApellidos]','$_POST[txtCedula]','$_POST[txtCargo]','$_POST[txtCodigo]','$_POST[txtCorreo]','$_POST[cbopreg1]','$_POST[cbopreg2]','$_POST[cbopreg3]','$_POST[cbopreg4]','$_POST[cbopreg5]','$_POST[cbopreg6]','$_POST[cbopreg7]','$_POST[txtDepartamento]','$_POST[txtCiudades]','$_POST[txtCentros]','$_POST[txtSede]','$_POST[txtAmbiente]','$_POST[txtFicha]','$_POST[txtJornada]')");
 }
 ?>
 <div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="#">S.V.A  Instructor </a>
          <div class="nav-collapse collapse">
            <ul class="nav pull-right">
              <li class="dropdown">
                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="icon-user"></i>
                  <?php
                  echo $row['userEmail'];
                  ?>
                  <i class="caret"></i>
                </a>
                <ul class="dropdown-menu">
                  <li>
                   <a tabindex="-1" href="opcioninstru.php">Atras</a>
                 </li>
               </ul>
             </li>
           </ul>
         </div>
       </div>
     </div> 
   </div>
   <footer>
        <div class="pull-right hidden-xs">
            S.V.A&nbsp;&nbsp;SENA&nbsp;&nbsp;
        </div>
        <strong>&nbsp;A.D.S.I &copy; 2016&nbsp;-&nbsp;2018<a href="#"></a>.</strong>
    </footer>
    <script src="../bootstrap/js/jquery-1.9.1.min.js"></script> 
    <script src="../bootstrap/js/bootstrap.min.js"></script> 
    <script src="../assets/scripts.js"></script> 
</body> 
</html> 

<?php
require('conexion.php');
$query = "SELECT departamentos FROM departamentos ORDER BY departamentos ASC";
$resultado = $mysqli->query($query);
?>

<form id="combo" name="combo" action="Guardar" method="POST">
      <div class="margin2" id="margin2">
    <div>Selecciona Departamento:<br> <select id="txtDepartamento" name="txtDepartamento">
      <option value="0">&#128272;Seleccionar Departamento</option>
      <?php while ($row = $resultado->fetch_assoc()) { ?>
      <option value="<?php echo $row['departamentos'];?>"><?php echo $row['departamentos'];?></option>
      <?php } ?>
    </select></div>

    <?php
require('conexion.php');
$query = "SELECT ciudades FROM ciudades ORDER BY ciudades ASC";
$resultado = $mysqli->query($query);
?>

    <div>Selecciona Ciudades:<br> <select id="txtCiudades" name="txtCiudades">
      <option value="0" id="txtCiudades">&#128272;Seleccionar Ciudad</option>
      <?php while ($row = $resultado->fetch_assoc()){?>
      <option id="txtCiudades" value="<?php echo $row['ciudades'];?>"><?php echo $row['ciudades'];?></option>
      <?php } ?>
    </select></div>

    <?php
require('conexion.php');
$query = "SELECT CentroNom FROM centro ORDER BY CentroNom ASC";
$resultado = $mysqli->query($query);
?>

    <div>Selecciona Centros:<br> <select id="txtCentros" name="txtCentros">
      <option value="0">&#128272;Seleccionar Centro</option>;
      <?php while($row = $resultado->fetch_assoc()){?>
      <option value="<?php echo $row['CentroNom'];?>"><?php echo $row['CentroNom'];?></option>
      <?php } ?>
    </select></div>

    <?php
require('conexion.php');
$query = "SELECT SedesNom FROM sedes ORDER BY SedesNom ASC";
$resultado = $mysqli->query($query);
?>

    <div>Selecciona Sedes:<br> <select id="txtSede" name="txtSede">
      <option value="0">&#128272;Seleccionar Sede</option>
      <?php while($row = $resultado->fetch_assoc()){?>
      <option value="<?php echo $row['SedesNom'];?>"><?php echo $row['SedesNom'];?></option>
      <?php } ?>
    </select></div>

    <?php
require('conexion.php');
$query = "SELECT AmbientesNom FROM ambientes ORDER BY AmbientesNom ASC";
$resultado = $mysqli->query($query);
?>

    <div>Selecciona Ambientes:<br> <select id="txtAmbiente" name="txtAmbiente">
      <option value="0">&#128272;Seleccionar Ambiente</option>
      <?php while($row = $resultado->fetch_assoc()){?>
      <option value="<?php echo $row['ambientes'];?>"><?php echo $row['AmbientesNom'];?></option>
      <?php } ?>
    </select></div>

    <?php
require('conexion.php');
$query = "SELECT fichasNom FROM fichas ORDER BY fichasNom ASC";
$resultado = $mysqli->query($query);
?>

    <div>Selecciona Fichas:<br> <select id="txtFicha" name="txtFicha">
      <option value="0">&#128272;Seleccionar Ficha</option>
      <?php while($row = $resultado->fetch_assoc()){?>
      <option value="<?php echo $row['fichas'];?>"><?php echo $row['fichasNom'];?></option>
      <?php } ?>
    </select></div>

    <?php
require('conexion.php');
$query = "SELECT jornadas FROM jornadas ORDER BY jornadas ASC";
$resultado = $mysqli->query($query);
?>

    <div>Selecciona Jornadas:<br> <select id="txtJornada" name="txtJornada">
      <option value="0">&#128272;Seleccionar Jornada</option>
      <?php while($row = $resultado->fetch_assoc()){?>
      <option value="<?php echo $row['jornadas'];?>"><?php echo $row['jornadas'];?></option>
      <?php } ?>
    </select></div>

  </form>
