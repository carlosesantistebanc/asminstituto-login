<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'login_database';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

//aqui cambié los datos de server, username, password y db ya que subí el proyecto al hosting de infinity free pero si
//se quiere correr en localhost, normal solo se cambia por localhost y el nombre de la bd en phpmyadmin
?>
