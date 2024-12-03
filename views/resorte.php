<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background: linear-gradient(45deg, #ff69b4, #87ceeb);
            background-size: 300% 300%;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .banner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 90%;
            max-width: 1200px;
        }

        .image-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-container img {
            max-width: 80%;
            height: auto;
            object-fit: cover;
        }

        .content {
            flex: 2;
            padding: 20px;
            text-align: left;
        }

        .content h1 {
            font-size: 3em;
            color: #25283B;
            margin-bottom: 20px;
        }

        .content h2 {
            font-size: 1.5em;
            margin-bottom: 15px;
        }

        .content p {
            font-size: 1.2em;
            color: #555;
        }

        .back-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #25283B;
            color: #fff;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: #1a1e2d;
        }
    </style>
</head>

<body>
    <div class="banner">
        <!-- Imagen centrada en el lado izquierdo -->
        <div class="image-container">
            <img src="../public/img/resorte.jpg" alt="Hilo">
        </div>
        <!-- Contenido descriptivo -->
        <div class="content">
            <h1>Resorte</h1>
            <h2> Es un textil grueso y resistente muy utilizado para </h2>
            <p><b>el diseño y confección de manualidades como muñecos, decoración infantil y de bebes, halloween, navidad, etc.</b></p>
            <button class="back-button" onclick="window.history.back()">Regresar</button>
        </div>
    </div>
</body>

</html>












