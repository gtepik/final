<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barra de Navegación</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .navbar {
      background: linear-gradient(45deg, #ff69b4, #87ceeb);
      border-radius: 4px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.9);
      padding: 0.75rem 1.5rem;
    }

    .navbar-brand {
      font-size: 1.5rem;
      font-weight: bold;
      color: white;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
      display: flex;
      align-items: center;
    }

    .navbar-brand img {
      height: 40px;
      margin-right: 10px;
    }

    .navbar-brand:hover {
      color: #ffd166;
      text-decoration: none;
    }

    .nav-link {
      color: white;
      font-size: 1.1rem;
      margin: 0 0.5rem;
      transition: color 0.3s ease;
    }

    .nav-link:hover {
      color: #ffdc97;
    }

    .btn-outline-success {
      border-color: white;
      color: white;
      transition: all 0.3s ease;
    }

    .btn-outline-success:hover {
      background-color: white;
      color: #ff6b6b;
    }

    .form-control {
      border-radius: 90px;
      border: 2px solid white;
    }

    .form-control:focus {
      box-shadow: 0 0 5px rgba(255, 255, 255, 0.8);
      border-color: #ffd166;
    }

    .navbar-toggler-icon {
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255, 255, 255, 1%29' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
      <!-- Logo e inicio -->
      <a class="navbar-brand" href="inicio">
        <img src="./public/img/logoMA1.jpg" alt="Logo"> Inicio
      </a>

      <!-- Botón de colapso para móvil -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Contenido colapsable -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="login">Iniciar sesión</a>
          </li>
        </ul>

        <!-- Botones Registro y Cerrar Sesión -->
        <div class="row justify-content-end">
          <div class="col-auto">
            <button type="button" class="btn btn-secondary" id="btn_registro" onclick="location.href='registro';">
              Registro
            </button>
          </div>
          <div class="col-auto">
            <button type="button" class="btn btn-danger" id="btn_cerrar">Cerrar sesión</button>
          </div>
        </div>
      </div>
    </div>
  </nav>
</body>

</html>
