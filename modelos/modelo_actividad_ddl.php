<?php
// Incluimos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

class ActividadDDL
{
    // Implementamos el constructor
    public function __construct()
    {
    }

    // Método para registrar un evento de auditoría en actividad_ddl
    public function registrarEvento($operacion, $id_usuario, $detalles)
    {
        $sql = "INSERT INTO actividad_ddl (operacion, id_usuario, detalles, fecha_operacion)
                VALUES ('$operacion', '$id_usuario', '$detalles', NOW())";
        return ejecutarConsulta($sql);
    }

    // Método para listar todos los eventos de auditoría
    public function listarEventos()
    {
        $sql = "SELECT id_evento, operacion, id_usuario, detalles, fecha_operacion
                FROM actividad_ddl
                ORDER BY fecha_operacion DESC";
        return ejecutarConsulta($sql);
    }

    // Método para obtener un evento específico por su ID
    public function obtenerEventoPorId($id_evento)
    {
        $sql = "SELECT id_evento, operacion, id_usuario, detalles, fecha_operacion
                FROM actividad_ddl
                WHERE id_evento = '$id_evento'";
        return ejecutarConsultaSimpleFila($sql);
    }
}
?>

