<?php
$host = 'localhost';
$dbname = 'cafedata';
$port = "3306";
$username = 'root';
$password = 'salah123';

try {
    $connexion = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die('impossible de se connecter ' . $e->getMessage());
}
?>