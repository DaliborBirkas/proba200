<?php
session_start();
require_once "db_config.php";
$idUUU = $_SESSION['userUid'];
echo $idUUU;
$sql='SELECT * FROM rezervacija where idU=:ID';
$stmt=$connection->prepare($sql);
$stmt->bindParam(':ID', $idUUU, PDO::PARAM_INT);
$stmt->execute();
$rows=$stmt->fetchAll();
$arr[]=json_encode($rows);
foreach($arr as $key=>$value){
    echo $key . "=>" . $value . "<br>";
}
echo "<hr>";/*
// Decode JSON data to PHP object
$obj = json_decode($json);

// Loop through the object
foreach($obj as $key=>$value){
    echo $key . "=>" . $value . "<br>";
}
*/
