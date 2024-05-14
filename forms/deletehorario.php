<?php

try{
$numcontrol = $_POST['nocontrol'];
$horariodelete = $_POST['selected_date'];

if (!empty($horariodelete)){
foreach($horariodelete as $horarioreg){
    $stmntdelete = $pdo->prepare("DELETE FROM horario_alumnos WHERE id_horarioreg = :id_horarioreg");
    $stmntdelete->bindParam(':id_horarioreg', $horarioreg);
    $successdelete = $stmntdelete->execute();
    if($successdelete){
        $sumeliminado = $sumeliminado +1 ;
        $message = "Horarios eliminados: ".$sumeliminado;
        $redirect_url = "../views/horariosregistroalumnos.php?nocontrol=".urlencode($numcontrol). "&message=".urlencode($message);
        header("Location: ". $redirect_url);
        exit();
    }
}

}

}

?>