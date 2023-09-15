<?php

$host = 'database';
$user = 'root';
$password = 'my-secret-pw';
$database = 'mydb';

$connection = new mysqli($host, $user, $password, $database);

if($connectin->connect_error){
    die("Connection failed: " . $connection->connect_error);
}