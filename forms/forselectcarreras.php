<?php 
$servername ="127.0.0.1";
$username  ="root";
$password  ="";
$dbname = "servicio_social";

$pdo = new PDO("mysql:host=$servername; dbname=$dbname", $username,$password);

function getcarreras(){
    try{
        global   $pdo;
    }catch(PDOException $e){
        die("Connection failed: ". $e->getMessage());
    }
    try{
        $stmt = $pdo ->prepare("SELECT * FROM carreras");
        $stmt ->execute();
        return  $stmt ->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        echo "Error: ". $e->getMessage();
    }
}

