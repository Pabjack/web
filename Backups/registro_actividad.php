<?php
include("conexionparalabase.php");

$no_control = $_POST ['no_control'];
$rfc = $_POST ['rfc'];
$descripcion = $_POST ['descripcion'];
$fecha = $_POST['fecha'];
$num_horas = $_POST ['num_horas'];


    $sql = "INSERT INTO actividades (no_control, rfc, descripcion, fecha, num_horas) VALUES ('$no_control', '$rfc', '$descripcion', '$fecha', '$num_horas')";
    if ($conn->query($sql) == TRUE) {
        echo "Se realizó el registro";


        exit();
    } else {
        echo "Error en la conexión: " . $conn->error;
    }


$conn->close();
?>