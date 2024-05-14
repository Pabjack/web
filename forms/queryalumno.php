<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "servicio_social";

$pdo= new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nocontrol = $_POST['nocontrol'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    $semestre = $_POST['semestre'];
    $fechai = $_POST['fechai'];
    $fechaf = $_POST['fechaf'];
    $carrera = $_POST['carreras']; // Corregido: 'id_carrera' en lugar de 'id_carreras'


    $stmntselect = $pdo->prepare("SELECT * FROM alumnos WHERE nocontrol = :nocontrol");
    $stmntselect->bindParam(':nocontrol', $nocontrol);
    $success = $stmntselect->execute();

    if($success){
        $horarioregistrado = $stmntselect->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($horarioregistrado)){
         array_push($timesyareg, $horarioregistrado);
        }else{
            
            $stmtinsert = $pdo->prepare("INSERT INTO alumnos (nocontrol, nombre, correo, password, semestre, fecha_ini, fecha_fin, id_carrera)
            VALUES (:nocontrol, :nombre, :correo, :password, :semestre, :fechai, :fechaf, :carrera)");

            $stmtinsert->bindParam(':nocontrol', $nocontrol);
            $stmtinsert->bindParam(':nombre', $nombre);
            $stmtinsert->bindParam(':correo', $correo);
            $stmtinsert->bindParam(':password', $pass);
            $stmtinsert->bindParam(':semestre', $semestre);
            $stmtinsert->bindParam(':fechai', $fechai);
            $stmtinsert->bindParam(':fechaf', $fechaf);
            $stmtinsert->bindParam(':carrera', $carrera);

            $successinsert = $stmtinsert->execute();

            if($successinsert){
                echo "Alumno registrado";
                $message = "El alumno registrado correctamente";
                header("Location: ../views/registro_horarios.php?nocontrol=".urlencode($nocontrol). "&message=".urlencode($nombre));
                exit();
            }
        }
}
}

