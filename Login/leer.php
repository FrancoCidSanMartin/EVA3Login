<?php
require_once 'conexion.php';
header('Content-Type: application/json');

$sql = "SELECT id, email FROM users";
$result = $conn->query($sql);

$usuarios = [];

while ($row = $result->fetch_assoc()) {
    $usuarios[] = $row;
}

echo json_encode($usuarios);
$conn->close();
?>