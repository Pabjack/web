<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horarios</title>
</head>
<body>
    <script src = "js/script.js"></script>
    <form action="../forms/registro_horario.php" method="post">
    <section>
        <label for="control"></label>
        <input type="text" id = "control" name = "control" value = '<?= $_GET['nocontrol']?>' >
        <input type="hidden" id = "nombre" name = "nombre"  value = '<?= $_GET['nombre']?>' >
    </section>
    <h2>Horarios</h2>
    <section>
        <h4>Dias</h4>

        <input id="dias[]" name="dias[]" value="Lunes" type="checkbox">
        <label for="dias[]"> Lunes </label>
        <br>

        <input id="dias[]" name="dias[]" value="Martes" type="checkbox">
        <label for="dias[]"> Martes</label>
        <br>

        <input id="dias[]" name="dias[]" value="Miercoles" type="checkbox">
        <label for="dias[]"> Miercoles </label>
        <br>

        <input id="dias[]" name="dias[]" value="Jueves" type="checkbox">
        <label for="dias[]"> Jueves </label>
        <br>

        <input id="dias[]" name="dias[]" value="Viernes" type="checkbox">
        <label for="dias[]"> Viernes </label>
        <br>


    </section>
        <h4>Hora</h4>
    <section>
        <input id = "78" name="horas[]" value="7-8" type="checkbox">
        <label for = "78">7-8</label>
        <br>
        <input id = "89" name="horas[]" value="8-9" type="checkbox">
        <label for = "89">8-9</label>
        <br>
        <input id = "910" name="horas[]" value="9-10" type="checkbox">
        <label for = "910">9-10</label>
        <br>
        <input id = "1011" name="horas[]" value="10-11" type="checkbox">
        <label for = "1011">10-11</label>
        <br>
        <input id = "1112" name="horas[]" value="11-12" type="checkbox">
        <label for = "1112">11-12</label>
        <br>
        <input id = "1213" name="horas[]" value="12-13" type="checkbox">
        <label for = "1213">12-13</label>
        <br>
        <input id = "1314" name="horas[]" value="13-14" type="checkbox">
        <label for = "1314">13-14</label>
        <br>
        <input id = "1415" name="horas[]" value="14-15" type="checkbox">
        <label for = "1415">14-15</label>
        <br>
        <input id = "1516" name="horas[]" value="15-16" type="checkbox">
        <label for = "1516">15-16</label>
        <br>
        <input id = "1617" name="horas[]" value="16-17" type="checkbox">
        <label for = "1617">16-17</label>
        <br>
        <input id = "1718" name="horas[]" value="17-18" type="checkbox">
        <label for = "1718">17-18</label>
        <br>
        <input id = "1819" name="horas[]" value="18-19" type="checkbox">
        <label for = "1819">18-19</label>

        <br>
        <br>
        <input type="submit" value="Enviar">

    </section>
    <?php
include("../forms/conexionparalabase.php");
$numcontrol = $_GET['nocontrol'];
$stmtselect = $pdo->prepare("SELECT * FROM horario_alumnos 
                            WHERE nocontrol=:nocontrol 
                            ORDER BY field(dias, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes')");
$stmtselect->bindParam(":nocontrol", $numcontrol);
$stmtselect->execute();

$horarioalumno = $stmtselect->fetchAll(PDO::FETCH_ASSOC);

if(isset($horarioalumno) && !empty($horarioalumno)){
    echo "<form action='../forms/deletehorario.php' method = 'post'>";
    echo"<h1>El horario del alumno es:</h1>";
    echo"<table border = '1'>";
    echo"<tr><th>No_control</th><th>dia</th><th></th><th>hora</th></tr>";
        foreach ($horarioalumno as $horario):
            echo"<tr>";
                echo "<td>" .$horario['nocontrol']."</td>";
                echo"<td>" .$horario['dias']."<td>";
                echo"<td>" .$horario['hora']."</td>";
                echo "<td> <input type='checkbox' name='selected_date[]' value=".$horario['id_horarioreg']. "'></td>" ;
            echo"</tr>";
        endforeach;
        echo"</table>";
        echo "<button type='submit' value='borrar horario'> Borrar horario</button>";
        exit();
}else{echo"<h1>No hay registro de horario</h1>";}
#En la interfaz de registro de horarios se va a llamar el script
?>
</body>
</html>