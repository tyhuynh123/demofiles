<?php
$server = 'localhost';
$username = 'newuser';
$password = 'R$gina1!';
$database = 'demo';

try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}
