<HTML>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<FORM ACTION=Eliminacion.php METHOD=post>
    <nav class="navbar navbar-default-submenu">
    <ul class="navbar-nav mr-auto">
                <li class = "nav-item">
                    <button class="volver-nav-btn" type ="button" onclick="location.href = 'index.php'">Volver</button><br><br>
                </li>
            </ul>
    </nav>
    <div class="mx-auto-subtitle">
        <h2>Eliminar Alumno</h2>
    </div>
    <div class="mx-auto-lista1">
        <ul class = "lista2">
            <li>
            <label class = 'input-text-busqueda'>Dame Clave a Eliminar:</label><INPUT TYPE=text NAME=CLAVE required><BR>
            </li>
            <li>
                <INPUT class="input-btn-filtro" TYPE=submit NAME=OK VALUE="Eliminar"><BR>
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
        if ($OK == "Eliminar") {
            //Conexion al servidor de bases de datos
            $dbh = mysqli_connect("sql309.infinityfree.com", "if0_36634698", "PyS6rbRZJEse4BX") or die('problema conectando porque :' . mysqli_connect_error());

            //Seleccion de la base de datos "Alumnos"
            mysqli_select_db($dbh, "if0_36634698_alumnos");

            // preparando la instruccion sql
            $q = "delete from talumnos where clave=" . $CLAVE;

            // ejecutando el query
            $tabla1 = mysqli_query($dbh, $q) or die("problema con query");

            if(mysqli_affected_rows($dbh) > 0) {
                echo "<div class = 'texto-echo-borrado'>Registro Eliminado</div>";
            }else{
                echo "<div class = 'texto-echo-borrado'>Registro Inexistente</div>";
            }
        }
        ;
    }
?>