<?php
$pdo = new PDO("mysql:host=127.0.0.1; dbname=servicio_social","root","");
$nombredeusuario = $_POST['nombre'];
$pass=$_POST["password"];

$stmntselect = $pdo -> prepare("SELECT * FROM administradores where 'password' = :pass AND 'nombre' = :nombredeusuario");
$stmntselect -> bindParam(':nombredeusuario', $nombredeusuario);
$stmntselect -> bindParam(':pass', $pass); 

$success = $stmntselect -> execute();
if ($success) {
    $redirect_url = "../views/registro_alumno.html";
    header("Location: ". $redirect_url);
    exit();
    }
