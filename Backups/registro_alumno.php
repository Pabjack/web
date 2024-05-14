<?php
require_once("../forms/forselectcarreras.php");
$carreras = getcarreras();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceder Alumno</title>
</head>

<body>
<script>
        function getParameterByName(name, url)
        {
            //si url es nulo, quedarse en la ubicacion actual
            if(!url) url = window.location.href;
            //validacion de caracteres especiales con corchete
            name = name.replace(/[\[\]]/g, "\\$&")
            //busca el parametro precedido por el signo de ?
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)");
            //asigna a una variable retults el url depurado
            results = regex.exec(url);
            if(!results) return null;
            if(!results[2]) return '';

            return decodeURIComponent(results[2].replace(/\+/g, ""));
        }
        var message = getParameterByName('message')
        if(message){ alert(message);}

    </script>
    <h1>Registro Alumno</h1>
    <form action="../forms/queryalumno.php" method="post">
        <section>
            <h3>Crear una cuenta</h3>
        </section>
        <br>
        <section>
            <label for="nombre">Nombre Alumno</label>
            <br>
            <input type="text" required name="nombre" id="nombre" minlength="5" maxlength="100">
        </section>
        <br>
        <section>
            <label for="nocontrol">No Control</label>
            <br>
            <input type="text" required name="nocontrol" id="nocontrol">
        </section>
        <br>
        <br>
        <section>
            <label for="correo">Correo</label>
            <br>
            <input type="text" required name="correo" id="correo" >
        </section>
        <br>
        <br>
        <section>
            <label for="semestre">Semestre</label>
            <br>
            <input type="text" required name="semestre" id="semestre" >
        </section>
        <br>
        <br>
        <section>
            <label for="horaI">Hora Inicio</label>
            <br>
            <input type="time" required name="horaI" id="horaI" >
        </section>
        <br>
        <br>
        <section>
            <label for="horaF">Hora Finalizacion</label>
            <br>
            <input type="time" required name="horaF" id="horaF" >
        </section>
        <br>
        <br>
        <section>
            <label for="fechaI">Fecha Inicio</label>
            <br>
            <input type="date" required name="fechaI" id="fechaI" >
        </section>
        <br>
        <br>
        <section>
            <label for="fechaF">Fecha Finalizacion</label>
            <br>
            <input type="date" required name="fechaF" id="fechaF" >
        </section>
        <br>
        <br>
        <!--
        <section>
            <label for="carrera">Id Carrera</label>
            <br>
            <input type="text" required name="carrera" id="carrera" >
        </section>
        <br>
        -->
        <section>
        <label for="carrera">Carrera</label>
        <br>
            <select name="carreras">
                <?php 
                foreach ($carreras as $carrera): 
                ?>
        <option value="<?php echo $carrera['id_carrera']; ?>">
            <?php echo $carrera['nombre_carrera']; ?>
        </option>
        <?php endforeach; ?>
            </select>
        </section>
        <br>
        <br>
        <section>
            <label for="pass">Contraseña</label>
            <br>
            <input type="password" required name="pass" id="pass" minlength="0" maxlength="20">
        </section>
        <br>
        <section>
            <input type="submit" value="Enviar">
        </section>
    </form>
</body>
</html>