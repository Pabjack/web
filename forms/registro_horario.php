<?php


$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "servicio_social";

$pdo= new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $control = $_POST['control'];
    $dias = $_POST['dias'];
    $horas = $_POST['horas'];
}
$timesyareg = array();

session_start();
if(isset($_POST["horas"]) && isset($_POST["dias"])){
    

foreach($dias as $dia){
    foreach($horas as $hora){

    $stmntselect = $pdo->prepare("SELECT * FROM horario_alumnos WHERE nocontrol = :nocontrol and dias = :dias AND hora = :horas");
    $stmntselect->bindParam(':nocontrol', $control);
    $stmntselect->bindParam(':dias', $dia);
    $stmntselect->bindParam(':horas', $hora);
    $success = $stmntselect->execute();

    if($success){
        $horarioregistrado = $stmntselect->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($horarioregistrado)){

            array_push($timesyareg, $horarioregistrado);
            
            $message = "El horario ya existe";
            header("Location: ../views/registro_horarios.php?message=$message".urlencode($message)."&nocontrol=".urlencode($control));
        }else{

            $stmtinsert = $pdo->prepare("INSERT INTO horario_alumnos (nocontrol, dias, hora) VALUES (:control, :dias, :hora)");

                    $stmtinsert->bindParam(':control', $control);
                    $stmtinsert->bindParam(':dias', $dia);
                    $stmtinsert->bindParam(':hora', $hora);
                    $successinsert = $stmtinsert->execute();

                    if($successinsert){
                        $message = "Horario registrado exitosamente";
                        header("Location: ../views/registro_horarios.php?message=".urlencode($message)."&nocontrol=".urlencode($control));
                    } else {
                        $message = "Error al registrar el horario";
                        $_SESSION['datesya']=$timesyareg;
                        header("Location: ../views/registro_horarios.php?message=".urlencode($message)."&nocontrol=".urlencode($control));

                    }
                    }
            }
        }
}
} else {
    $message = "No hay horas o dias seleccionados";
    header("Location: ../views/registro_horarios.php?message=".urlencode($message)."&nocontrol=".urlencode($control));
    session_unset();
    session_destroy();
    
}
