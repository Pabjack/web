<?php   
$servername ="127.0.0.1";
$username  ="root";
$password  ="";
$dbname = "servicio_social";

$pdo = new PDO("mysql:host=$servername; dbname=$dbname", $username,$password);

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $nocontrol = $_POST["nocontrol"];
    $dia = $_POST["dia"];
    $hora = $_POST["hora"];
}

        $stmtinsert = $pdo ->prepare("INSERT INTO horario_alumnos(no_control,dias,hora) 
        VALUES(:no_control,:dia, :hora)");
        $stmtinsert ->bindParam(':no_control',$nocontrol);
        $stmtinsert ->bindParam(':dia',$dia);
        $stmtinsert ->bindParam(':hora',$hora);

   $successinsert = $stmtinsert -> execute();


