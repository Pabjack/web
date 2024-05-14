<?php
include("conexionparalabase.php");

$rfc = $_POST['rfc'];
$nombre = $_POST['nombre'];
$pass = $_POST['password'];

$sql = "SELECT * FROM administradores WHERE nombre = '$nombre' OR rfc = '$rfc'";
$horarioregistrado = $conn->query($sql);

if ($horarioregistrado->num_rows > 0) {

    $message = "Datos ya existentes";
    $redirect_url = "entrada_pablo.html?message=" .urlencode($message);

    header("Location: ". $redirect_url);
    exit();
} else {
    $sql = "INSERT INTO administradores (rfc, nombre, password) VALUES ('$rfc', '$nombre', '$pass')";
    if ($conn->query($sql) === TRUE) {
        $message= "Se realizó el registro";
        $redirect_url = "../views/entrada_pablo.html?message=  " .urlencode($message);

        header("Location: ". $redirect_url);
        exit();
    } else {
        echo "Error en la conexión: " . $conn->error;
    }
}

$conn->close();
