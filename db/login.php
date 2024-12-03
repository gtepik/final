<?php
session_start(); // Iniciar la sesión

require 'tienda'; // Incluir la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["usuario"];
    $password = $_POST["password"];

    // Preparar la consulta para sverificar el correo electrónico y la contraseña
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener los resultados de la base de datos

    // Verificar si el usuario existe y si la contraseña es correcta
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id']; // Guardar la sesión del usuario

        // Redirigir a la página principal o una página protegida
        header("Location: pagina-protegida.php");
        exit();
    } else {
        // Si las credenciales son incorrectas
        echo "Correo o contraseña incorrectos.";
    }
}
?>

<!-- login.html -->
<form action="login.php" method="POST">
    <div class="form-floating mb-3">
        <input class="form-control" id="usuario" name="usuario" type="email" placeholder="Correo electrónico" required>
        <label for="usuario">Correo electrónico</label>
    </div>
    <div class="form-floating mb-3">
        <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña" required>
        <label for="password">Contraseña</label>
    </div>
    <button type="submit" class="btn btn-primary w-100 mb-3">Iniciar sesión</button>
    <a href="registro.php" class="btn btn-danger w-100">Registro</a>
</form>
