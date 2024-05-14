<?php   
$servername ="127.0.0.1";
$username  ="root";
$password  ="";
$dbname = "servicio_social";

$pdo = new PDO("mysql:host=$servername; dbname=$dbname", $username,$password);

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $nocontrol = $_POST["nocontrol"];
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $pass = $_POST["pass"];
    $semestre = $_POST["semestre"];
    $fechaI = $_POST["fechaI"];
    $fechaF = $_POST["fechaF"];
    $carrera = $_POST["carreras"];
}


$stmntselect = $pdo ->prepare("SELECT * FROM alumnos WHERE no_control = :no_control");
$stmntselect -> bindParam(':no_control',$nocontrol);
$success = $stmntselect ->execute();
if($success){
    $horarioregistrado = $stmntselect->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($horarioregistrado)){
        $message = "el numero de control ya existe";
    $redirect_url = "../views/registro_alumno.php?message=" .urlencode($message);

    header("Location: ". $redirect_url);
    exit();
    }
    else{
        $stmtinsert = $pdo ->prepare("INSERT INTO alumnos(no_control,nombre,correo,password,semestre,fecha_ini,fecha_fin,id_carrera) 
        VALUES(:no_control,:nombre,:email,:pass,:semestre,:fechaI,:fechaF,:carrera)");
        $stmtinsert ->bindParam(':no_control',$nocontrol);
        $stmtinsert ->bindParam(':nombre',$nombre);
        $stmtinsert ->bindParam(':email',$correo);
        $stmtinsert ->bindParam(':pass',$pass);
        $stmtinsert ->bindParam(':semestre',$semestre);
        $stmtinsert ->bindParam(':fechaI',$fechaI);
        $stmtinsert ->bindParam(':fechaF',$fechaF);
        $stmtinsert ->bindParam(':carrera',$carrera);
        $successinsert = $stmtinsert ->execute();
        if ($successinsert){
            $redirect_url = "../views/registrohorarios.php?no_control=" . urlencode($nocontrol) . "&nombre=" . urlencode($nombre);
            header("Location: ". $redirect_url);
            exit();
    }
    else {
        echo "Error en la conexión con la base de datos" . $sql . "<br>" .$conn -> error;
    }
}

}
