<?php



$servidor = "localhost";

$user = "root";

$password = "";

$database = "logindb";

$conexion = new mysqli($servidor, $user, $password, $database);

if ($conexion->connect_error) {

    die("Conexión fallida: " . $conexion->connect_error);

}





if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];

    $password = $_POST['password'];





    $sql = "SELECT * FROM users WHERE email='$email'";

    $result = $conexion->query($sql);

    while ($row = mysqli_fetch_array($result)){

        $correo = $row['email'];

        $pass = $row['password'];

    }



    if($email == $correo && $password == $pass){

            echo "Login exitoso. ¡Bienvenido!";

        } else {

            echo "Correo o contraseña incorrectos.";

        }

    } else {

        echo "Correo o contraseña incorrectos.";

    }

$conexion->close();

?>