
<?php
// Incluimos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

class HistorialResenas
{
    // Implementamos el constructor
    public function __construct()
    {
    }

    // Método para registrar una nueva reseña en el historial
    public function registrarHistorial($id_reseña, $comentario_anterior, $comentario_nuevo)
    {
        $sql = "INSERT INTO historial_reseñas (id_reseña, comentario_anterior, comentario_nuevo) 
                VALUES ('$id_reseña', '$comentario_anterior', '$comentario_nuevo')";
        return ejecutarConsulta($sql);
    }

    // Método para listar todas las entradas en el historial de reseñas
    public function listarHistorial()
    {
        $sql = "SELECT id_historial, id_reseña, comentario_anterior, comentario_nuevo, fecha_cambio 
                FROM historial_reseñas";
        return ejecutarConsulta($sql);
    }

    // Método para obtener los detalles de un historial específico
    public function obtenerHistorialPorId($id_historial)
    {
        $sql = "SELECT id_historial, id_reseña, comentario_anterior, comentario_nuevo, fecha_cambio 
                FROM historial_reseñas 
                WHERE id_historial = $id_historial";
        return ejecutarConsultaSimpleFila($sql);
    }

    // Método para eliminar una entrada del historial
    public function eliminarHistorial($id_historial)
    {
        $sql = "DELETE FROM historial_reseñas WHERE id_historial = $id_historial";
        return ejecutarConsulta($sql);
    }
}
?>
