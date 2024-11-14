<?php
// Incluimos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

class Usuario
{
    // Implementamos el constructor
    public function __construct()
    {
    }

    // Método para registrar un nuevo usuario
    public function registrarUsuario($nombre_usuario, $email, $contrasena, $tipo_usuario = 'normal')
    {
        $sql = "INSERT INTO usuario (nombre_usuario, email, contrasena, tipo_usuario) 
                VALUES ('$nombre_usuario', '$email', '$contrasena', '$tipo_usuario')";
        return ejecutarConsulta($sql);
    }

    // Método para actualizar el último login de un usuario
    public function actualizarUltimoLogin($id_usuario)
    {
        $sql = "UPDATE usuario SET ultimo_login = NOW() WHERE id_usuario = $id_usuario";
        return ejecutarConsulta($sql);
    }

    // Método para verificar la autenticación de un usuario
    public function autenticarUsuario($email, $contrasena)
    {
        $sql = "SELECT * FROM usuario WHERE email = '$email' AND contrasena = '$contrasena' AND tipo_usuario = 'normal'";
        return ejecutarConsulta($sql);
    }

    // Método para listar todos los usuarios
    public function listarUsuarios()
    {
        $sql = "SELECT id_usuario, nombre_usuario, email, tipo_usuario, ultimo_login, fecha_registro FROM usuario";
        return ejecutarConsulta($sql);
    }

    // Método para obtener un usuario específico
    public function obtenerUsuarioPorId($id_usuario)
    {
        $sql = "SELECT id_usuario, nombre_usuario, email, tipo_usuario, ultimo_login, fecha_registro FROM usuario WHERE id_usuario = $id_usuario";
        return ejecutarConsultaSimpleFila($sql);
    }
}
?>
