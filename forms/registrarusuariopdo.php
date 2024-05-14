<?php
$pdo = new PDO("mysql:host=127.0.0.1; dbname=servicio_social","root","");
$rfc = $_POST['rfc'];
$nombredeusuario = $_POST['nombre'];
$pass=$_POST["password"];

$stmntselect = $pdo -> prepare("SELECT * FROM administradores where rfc = :rfc OR nombre = :nombredeusuario");
$stmntselect -> bindParam(':nombredeusuario', $nombredeusuario);
$stmntselect -> bindParam(':rfc', $rfc); 

$success = $stmntselect -> execute();
if ($success) {
    $horarioregistrado = $stmntselect ->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($horarioregistrado)){
        $message = "Ya existe el rfc o el usuario";
        $redirect_url = "../views/registro_admin.html?message=".urlencode($message);
        header("Location: ". $redirect_url);
        exit();} else {
            $stmtinsert = $pdo -> prepare("insert into administradores (rfc, nombre, password) values (:rfc, :nombredeusuario, :pass)");
            $successinsert = $stmtinsert -> execute(['rfc'=> $rfc, 'nombredeusuario'=>$nombredeusuario, 'pass'=> $pass]);
            if ($successinsert) {
                $redirect_url = "../views/iniciosesion.html";
                header("Location: ". $redirect_url);
                exit();
            }
        }


    }

