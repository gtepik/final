<?php
require_once '../config/conexion.php';

class Registro extends Conexion {
    public function iniciar_registro() {
        // Verificar que todos los campos están definidos y no están vacíos
        if (isset($_POST['nombre'], $_POST['apellido'], $_POST['usuario'], $_POST['password']) &&
            !empty($_POST['nombre']) && !empty($_POST['apellido']) && 
            !empty($_POST['usuario']) && !empty($_POST['password'])) {
                
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];

            $consulta = $this->obtener_conexion()->prepare("SELECT * FROM t_usuario WHERE usuario = :usuario");
            $consulta->bindParam(":usuario", $usuario);
            $consulta->execute();
            $datos = $consulta->fetch(PDO::FETCH_ASSOC);

            if (!$datos) {
                $insercion = $this->obtener_conexion()->prepare("INSERT INTO t_usuario (nombre,apellido,usuario,password) VALUES(:nombre,:apellido,:usuario,:password)");
                $insercion->bindParam(":nombre", $nombre);
                $insercion->bindParam(":apellido", $apellido);
                $insercion->bindParam(":usuario", $usuario);
                $pass = password_hash($password, PASSWORD_BCRYPT);
                $insercion->bindParam(":password", $pass);

                if ($insercion->execute()) {
                    echo json_encode([1, "Usuario registrado con éxito!"]);
                } else {
                    echo json_encode([0, "Error en el registro de usuario!"]);
                }
            } else {
                echo json_encode([0, "Error: Usuario ya registrado!"]);
            }
        } else {
            echo json_encode([0, "Error: Todos los campos son obligatorios!"]);
        }
    }
}

$consulta = new Registro();
$metodo = $_POST['metodo'];
$consulta->$metodo();
?>