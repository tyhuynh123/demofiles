<?php
$server = 'localhost';
$username = 'newuser';
$password = 'demosite';
$database = 'demo';

try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}
