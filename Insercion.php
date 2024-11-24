<HTML>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<FORM ACTION = Insercion.php METHOD=post>
  <nav class="navbar navbar-default-submenu">
  <ul class="navbar-nav mr-auto">
            <li class = "nav-item">
                <button class="volver-nav-btn" type ="button" onclick="location.href = 'index.php'">Volver</button><br><br>
            </li>
        </ul>
  </nav>
  <div class="mx-auto-subtitle">
        <h2>Insertar Alumno</h2>
  </div>
  <div class="mx-auto-lista1">
      <table class="mx-auto">
      <tr>
        <td class = "input-text"> 
        Nombre: 
        </td> 
        <td>
        <INPUT class="input-tb" TYPE=text NAME=NOMBRE required><BR>
        </td>
      </tr>
      <tr>
        <td class = "input-text">   
        Edad:
        </td> 
        <td>
        <INPUT class="input-tb" TYPE=text NAME=EDAD required><BR>
        </td>
      </tr>
      <tr>
        <td class = "input-text">
          Calificación:
        </td>
        <td>
        <INPUT class="input-tb" TYPE=text NAME=CALIFICACION required><BR>
        </tr>
      <tr>
      </table>
      <INPUT class="input-btn-insert" TYPE=submit NAME=OK VALUE="Insertar"><BR> 
    </div>


  </FORM>
</HTML>

<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $OK = $_POST["OK"];
    $NOMBRE = $_POST["NOMBRE"];
    $EDAD = $_POST["EDAD"];
    $CALIFICACION = $_POST["CALIFICACION"];
  }

  if (isset($OK)) {
    if ($OK == "Insertar") {

      //Conexion al servidor de bases de datos
      $dbh = mysqli_connect("sql309.infinityfree.com", "if0_36634698", "PyS6rbRZJEse4BX") or die('problema conectando porque :' . mysqli_connect_error());

      //Seleccion de la base de datos "Alumnos"
      mysqli_select_db($dbh, "if0_36634698_alumnos");

      //Insert siendo construido
      $q = "INSERT INTO talumnos (nombre,edad,calificacion) VALUES ('" . $NOMBRE . "'," . $EDAD . "," . $CALIFICACION . ") ;";

      //Validacion de Aprobacion
      if($CALIFICACION < 70){
        $q = "INSERT INTO talumnos (nombre,edad,calificacion) VALUES ('" . $NOMBRE . "'," . $EDAD . "," . 0 . ") ;";
      }

      //Validacion de Calificacion
      if($CALIFICACION > 100 || $CALIFICACION < 0){
        echo "<div class = 'texto-echo'> Calificacion Invalida </div>";
      }else{
        $talumnos = mysqli_query($dbh, $q) or die("problema con query");
        echo '<div class="texto-echo">Registro Insertado</div> <br>';
      }

    }
    ;
  }
?>
