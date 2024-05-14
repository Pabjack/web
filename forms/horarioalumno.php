<?php
include("db_connection.php");
$numcontrol = $_GET['nocontrol'];
$stmtselect = $pdo->prepare("SELECT * FROM horario_alumnos 
                            WHERE nocontrol=:nocontrol 
                            ORDER BY field(dias, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes')");
$stmtselect->bindParam(":nocontrol", $numcontrol);
$stmtselect->execute();

$horarioalumno = $stmtselect->fetchAll(PDO::FETCH_ASSOC);

if(isset($horarioalumno) && !empty($horarioalumno)){
    echo"<h1>El horario del alumno es:</h1>";
    echo"<table>";
    echo"<tr><th>No_control</th><th>dia</th><th>hora</th></tr>";
        foreach ($horarioalumno as $horario):
            echo"<tr>";
                echo"<td>" .$horario['nocontrol']."</td>";
                echo"<td>" .$horario['dia']."<td>";
                echo"<td>" .$horario['hora']."</td>";
            echo"</tr>";
        endforeach;
        exit();
}else{echo"<h1>No hay registro de horario</h1>";}
#En la interfaz de registro de horarios se va a llamar el script