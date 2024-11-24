<HTML>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<FORM ACTION=Edicion.php METHOD=post>
    <nav class="navbar navbar-default-submenu">
            <ul class="navbar-nav mr-auto">
                <li class = "nav-item">
                    <button class="volver-nav-btn" type ="button" onclick="location.href = 'index.php'">Volver</button><br><br>
                </li>
            </ul>
    </nav>
    <div class="mx-auto-subtitle">
        <h2>Modificación de Alumno</h2>
    </div>
    <div class="mx-auto-lista1">
        <ul class = "lista2">
            <li>
            <label class = 'input-text-busqueda'>Dame Clave a Editar:</label><INPUT INPUT class= "input-tb-busqueda" TYPE=text NAME=CLAVE required><BR>
            </li>   
            <li>
                <INPUT class="input-btn-editbusqueda" TYPE=submit NAME=OK VALUE="Buscar"><BR>
            </li>
        </ul>
    </div>
</FORM>

</HTML>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $OK = $_POST["OK"];
        $CLAVE = $_POST["CLAVE"];
    }

    if (isset($OK)) {
        if ($OK == "Buscar") {
            //Conexion al servidor de bases de datos
            $dbh = mysqli_connect("sql309.infinityfree.com", "if0_36634698", "PyS6rbRZJEse4BX") or die('problema conectando porque :' . mysqli_connect_error());

            //Seleccion de la base de datos "Alumnos"
            mysqli_select_db($dbh, "if0_36634698_alumnos");

            // preparando la instruccion sql
            $q = "select * from talumnos where clave= " . $CLAVE;

            // ejecutando el query select regresa un rowset
            $tabla1 = mysqli_query($dbh, $q) or die("problema con query");

            // regresando renglon con registro
            $reg = mysqli_fetch_row($tabla1) or die("<div class='texto-echo-busqueda'>Registro Inexistente</div>");

            // construyendo forma dinamica
            echo "<HTML>
            <link rel='stylesheet' type='text/css' href='style.css'>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
            echo <FORM ACTION=Edicion.php METHOD=post>;";
            

            // recordar que strings se encadenan con .
            echo"<div class='mx-auto-lista1'>";
            echo "<label class = 'input-text-editnom'>Nombre:</label><INPUT class='input-tb-nom' TYPE=text NAME=NOMBRE value= \"" . $reg[1] . "\" required><BR>";
            echo "<label class = 'input-text-editedad'>Edad:</label><INPUT class='input-tb-edad' TYPE=text NAME=EDAD value=$reg[2] required><BR>";
            echo "<label class = 'input-text-editcalif'>Calificación:</label><INPUT class='input-tb-calif' TYPE=text NAME=CALIFICACION value=$reg[3] required><BR>";
            echo "<input type=hidden name=CLAVE value=$reg[0]>";
            echo "<INPUT class='input-btn-insert' TYPE=submit NAME=OK VALUE=Editar><BR>";
            echo "</div>";
            echo "</FORM>";
        }
        ;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            error_reporting(0);
            $OK = $_POST["OK"];
            $NOMBRE = $_POST["NOMBRE"];
            $EDAD = $_POST["EDAD"];
            $CALIFICACION = $_POST["CALIFICACION"];

        }

        if (isset($OK)) {

            if ($OK == "Editar") {
                //Conexion al servidor de bases de datos
                $dbh = mysqli_connect("sql309.infinityfree.com", "if0_36634698", "PyS6rbRZJEse4BX") or die('problema conectando porque :' . mysqli_connect_error());

                //Seleccion de la base de datos "Alumnos"
                mysqli_select_db($dbh, "if0_36634698_alumnos");

                // preparando la instruccion sql
                $q = "UPDATE talumnos set nombre='" . $NOMBRE . "', edad=" . $EDAD . ", calificacion=" . $CALIFICACION . " where clave=" . $CLAVE;

                if($CALIFICACION < 70){
                    $q = "UPDATE talumnos set nombre='" . $NOMBRE . "', edad=" . $EDAD . ", calificacion=" . 0 . " where clave=" . $CLAVE;
                }

                //Validacion de Calificacion
                if($CALIFICACION > 100 || $CALIFICACION < 0){
                  echo "<div class = 'texto-echo-califinv'> Calificacion Invalida </div>";
                }else{
                  $talumnos = mysqli_query($dbh, $q) or die("problema con query");
                  echo '<div class="texto-echo-edicion">Registro Modificado</div> <br>';
                }
            }
            ;
        }
    }
?>