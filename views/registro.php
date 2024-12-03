<?php
// Iniciar el almacenamiento en búfer de salida
ob_start();

// Verificar si una sesión ya está activa antes de iniciar una nueva
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario ya está logueado
if (isset($_SESSION['usuario'])) {
    header("location:inicio");
    exit();
}

// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'tienda');
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Procesar el formulario al enviar
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $apellido = $conn->real_escape_string($_POST['apellido']);
    $email = $conn->real_escape_string($_POST['usuario']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Cifrar la contraseña

    // Verificar si el correo ya está registrado
    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $error = "El correo ya está registrado.";
    } else {
        // Insertar el usuario en la base de datos
        $query = "INSERT INTO usuarios (nombre, apellido, email, password) VALUES ('$nombre', '$apellido', '$email', '$password')";

        if ($conn->query($query)) {
            $success = "Registro exitoso. Redirigiendo al inicio de sesión...";
            echo "<script>setTimeout(() => { window.location.href = 'login.php'; }, 2000);</script>";
        } else {
            $error = "Error al registrar: " . $conn->error;
        }
    }
}

$conn->close();
?>

<body>
    <div class="container1">
        <div class="card p-4">
            <form action="" method="POST">
                <div class="text-center mb-4">
                    <img src="./public/img/logoMA1.jpg" alt="Logo" class="img-fluid" style="max-width: 150px;">
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control mb-3" name="nombre" id="nombre" type="text" placeholder="Nombre" required>
                    <label class="text-muted" for="nombre"><i class="fa-solid fa-user me-2"></i>Nombre</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="apellido" id="apellido" type="text" class="form-control" placeholder="Apellido" required>
                    <label class="text-muted" for="apellido"><i class="fa-regular fa-address-book me-2"></i>Apellido</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="usuario" id="usuario" type="email" placeholder="Correo electrónico" required>
                    <label class="text-muted" for="usuario"><i class="fa-solid fa-envelope me-2"></i>Correo electrónico</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="password" id="password" type="password" class="form-control" placeholder="Contraseña" required>
                    <label class="text-muted" for="password"><i class="fa-solid fa-lock me-2"></i>Contraseña</label>
                </div>
                <button type="submit" class="btn btn-primary w-100 mb-3">Registrar</button>
                <!-- Mostrar mensajes de error o éxito -->
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        <?= $error; ?>
                    </div>
                <?php elseif (isset($success)): ?>
                    <div class="alert alert-success mt-3" role="alert">
                        <?= $success; ?>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./public/js/registro.js"></script>
</body>

<?php
// Liberar el búfer de salida
ob_end_flush();
?>
