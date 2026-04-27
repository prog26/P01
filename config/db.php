<?php
$host = 'localhost';
$db  = 'prompt_repository';
$user = 'root';
$pass = '';

try{
    $pdo =new PDO ("mysql:host=$host;dbname=$db;charset=utf8mb4",$user, $pass,
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        
  //echo "hello";

}catch(PDOException $e){
    echo("Erreur de connexion : " . $e->getMessage());

}



?>