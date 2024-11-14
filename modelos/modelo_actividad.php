<?php
// Incluimos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

class Actividad
{
    // Implementamos el constructor
    public function __construct()
    {
    }

    // Método para registrar una nueva actividad
    public function registrarActividad($id_lugar, $nombre_actividad, $descripcion_actividad, $duracion, $costo)
    {
        $sql = "INSERT INTO actividad (id_lugar, nombre_actividad, descripcion_actividad, duracion, costo)
                VALUES ('$id_lugar', '$nombre_actividad', '$descripcion_actividad', '$duracion', '$costo')";
        return ejecutarConsulta($sql);
    }

    // Método para actualizar una actividad existente
    public function actualizarActividad($id_actividad, $id_lugar, $nombre_actividad, $descripcion_actividad, $duracion, $costo)
    {
        $sql = "UPDATE actividad
                SET id_lugar = '$id_lugar', nombre_actividad = '$nombre_actividad', descripcion_actividad = '$descripcion_actividad', duracion = '$duracion', costo = '$costo'
                WHERE id_actividad = '$id_actividad'";
        return ejecutarConsulta($sql);
    }

    // Método para eliminar una actividad
    public function eliminarActividad($id_actividad)
    {
        $sql = "DELETE FROM actividad WHERE id_actividad = '$id_actividad'";
        return ejecutarConsulta($sql);
    }

    // Método para listar todas las actividades
    public function listarActividades()
    {
        $sql = "SELECT a.id_actividad, a.nombre_actividad, a.descripcion_actividad, a.duracion, a.costo,
                       l.nombre_lugar
                FROM actividad a
                INNER JOIN lugar_turistico l ON a.id_lugar = l.id_lugar";
        return ejecutarConsulta($sql);
    }

    // Método para obtener una actividad específica por su ID
    public function obtenerActividadPorId($id_actividad)
    {
        $sql = "SELECT a.id_actividad, a.nombre_actividad, a.descripcion_actividad, a.duracion, a.costo,
                       l.nombre_lugar
                FROM actividad a
                INNER JOIN lugar_turistico l ON a.id_lugar = l.id_lugar
                WHERE a.id_actividad = '$id_actividad'";
        return ejecutarConsultaSimpleFila($sql);
    }

    // Método para obtener las actividades de un lugar específico
    public function listarActividadesPorLugar($id_lugar)
    {
        $sql = "SELECT id_actividad, nombre_actividad, descripcion_actividad, duracion, costo
                FROM actividad
                WHERE id_lugar = '$id_lugar'";
        return ejecutarConsulta($sql);
    }

    // Método para calcular el costo promedio de las actividades en un lugar
    public function obtenerCostoPromedioActividades($id_lugar)
    {
        $sql = "SELECT AVG(costo) as costo_promedio
                FROM actividad
                WHERE id_lugar = '$id_lugar'";
        return ejecutarConsultaSimpleFila($sql);
    }
}
?>

