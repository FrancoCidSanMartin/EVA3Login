<?php
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id'] ?? 0);
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($id > 0 && !empty($email)) {
        if (!empty($password)) {
            // En producción: $password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE users SET email = ?, password = ? WHERE id = ?");
            $stmt->bind_param("ssi", $email, $password, $id);
        } else {
            $stmt = $conn->prepare("UPDATE users SET email = ? WHERE id = ?");
            $stmt->bind_param("si", $email, $id);
        }

        $stmt->execute();
        $stmt->close();
    }
}

$conn->close();
?>