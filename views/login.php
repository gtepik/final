<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'tienda');
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if (isset($_SESSION['usuario'])) {
    header("location:inicio");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $conn->real_escape_string($_POST['usuario']);
    $password = $_POST['password'];

    // Verificar correos especiales
    $correo_especial = "merceriayalgomas@gmail.com";

    if ($email === $correo_especial) {
        header("location:NEGRO1/views/crud.php"); 
        exit();
    }

    // Buscar el usuario en la base de datos
    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        // Verificar la contraseña cifrada
        if (password_verify($password, $usuario['password'])) {
            $_SESSION['usuario'] = $usuario['email'];
            header("location:inicio.php");
            exit();
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        // Validar correo y contraseña predeterminados
        if ($email == "merceriyalgomas@gmail.com" && $password == "12345") {
            $_SESSION['usuario'] = $email;
            header("location:inicio");
            exit();
        } else {
            $error = "Usuario o contraseña incorrectos.";
        }
    }
}

$conn->close();
?>

<div class="container1">
    <form id="frm_login" class="container mt-5" method="POST">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-4 text-primary">Login</h3>
                        <div class="text-center mb-4">
                            <img src="./public/img/logoMA1.jpg" class="rounded-circle" width="60%" alt="Login">
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="usuario" name="usuario" type="text" placeholder="Email" required>
                            <label for="usuario" class="text-muted">
                                <i class="fa-solid fa-envelope me-2"></i>e-mail
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
                            <label for="password" class="text-muted">
                                <i class="fa-solid fa-lock me-2"></i>Password
                            </label>
                        </div>
                        <button class="btn btn-primary w-100 mb-3" type="submit" id="btn_iniciar">
                            <i class="fa-solid fa-door-open me-2"></i>Iniciar sesión
                        </button>
                        <a href="registro" class="btn btn-danger w-100 mb-3">
                            <i class="fa-solid fa-chalkboard-user me-2"></i>Registro
                        </a>
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger mt-3" role="alert">
                                <?= $error; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="./public/js/login.js"></script>
</body>
</html>
