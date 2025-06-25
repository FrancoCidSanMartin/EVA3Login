<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "logindb"; // cambiá por el nombre real

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>