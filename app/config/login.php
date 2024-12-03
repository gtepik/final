<?php
session_start(); // Iniciar la sesión

require 'tienda'; // Incluir la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["usuario"];
    $password = $_POST["password"];

    // Preparar la consulta para verificar el correo electrónico y la contraseña
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener los resultados de la base de datos

    // Verificar si el usuario existe y si la contraseña es correcta
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id']; // Guardar la sesión del usuario

        // Redirigir a la página específica
        header("Location: pagina-especifica.php"); // Cambia la URL según lo necesites
        exit();
    } else {
        // Si las credenciales son incorrectas
        echo "Correo o contraseña incorrectos.";
    }
}
?>
