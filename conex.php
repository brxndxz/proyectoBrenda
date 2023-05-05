<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "proyectoppy";

//Crear conexión
$conn = new mysqli($server,$username,$password,$database);

if ($conn->connect_error){
    die("Error al conectar con la base de datos:" .$conn->connect_error);
}