<HTML>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<FORM ACTION=Despliegue.php METHOD=post>
    <nav class="navbar navbar-default-submenu">
    <ul class="navbar-nav mr-auto">
            <li class = "nav-item">
                <button class="volver-nav-btn" type ="button" onclick="location.href = 'index.php'">Volver</button><br><br>
            </li>
        </ul>
    </nav>
    <div class="mx-auto-subtitle">
        <h2>Visualizar Alumnos</h2>
    </div>
    <div class="mx-auto-lista1">
        <ul class = "lista2">
            <li>
                <INPUT class="input-btn" TYPE=submit NAME=OK VALUE="Visualizar"><BR> <BR>
            </li>
        </ul>
    </div>
</FORM>
</HTML>




<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $OK = $_POST["OK"];
}
if (isset($OK)) {
    if ($OK == "Visualizar") {

        //Conexion al servidor de bases de datos
        $dbh = mysqli_connect("sql309.infinityfree.com", "if0_36634698", "PyS6rbRZJEse4BX") or die('problema conectando porque :' . mysqli_connect_error());

        //Seleccion de la base de datos "Alumnos"
        mysqli_select_db($dbh, "if0_36634698_alumnos");

        //Preparando la instruccion sql
        $q = 'select * from talumnos';

        //Ejecucion del query
        $tabla1 = mysqli_query($dbh, $q) or die("problema con query");

        //Empezando una tabla html
        echo 
        "<HTML>
        <link rel='stylesheet' type='text/css' href='style.css'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
        <div class = 'table-margin'>
        <TABLE class = 'table table-bordered table-dark table-striped table-sm'>
        <TR>";
        //Construyendo los encabezados de la tabla
        echo
        "<th bgcolor=#ffffff>Clave</th>
        <th bgcolor=#ffffff>Nombre</th>
        <th bgcolor=#ffffff>Edad</th>
        <th bgcolor=#ffffff>Calificación</th>
        </TR>";

        // ciclo de lectura del rowset($tabla1)
        while($renglon = mysqli_fetch_row($tabla1)){
           // desplegando en celda de tabla html
           echo"<tr>";
           echo "<td bgcolor=#ffffff>".$renglon[0]."</td>";
           echo "<td bgcolor=#ffffff>".$renglon[1]."</td>";
           echo "<td bgcolor=#ffffff>".$renglon[2]."</td>";
           echo "<td bgcolor=#ffffff>".$renglon[3]."</td>";
           echo"</tr>";
        };
        // cerrando tabla html
        echo "</table> </div>";
    }
    ;
}
?>