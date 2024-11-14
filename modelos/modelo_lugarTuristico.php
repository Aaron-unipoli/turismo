<?php
// Incluimos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

class LugarTuristico
{
    // Implementamos el constructor
    public function __construct()
    {
    }

    // Método para registrar un nuevo lugar turístico
    public function registrarLugar($id_municipio, $nombre_lugar, $descripcion_lugar, $direccion, $horarios, $costo_entrada)
    {
        $sql = "INSERT INTO lugar_turistico (id_municipio, nombre_lugar, descripcion_lugar, direccion, horarios, costo_entrada) 
                VALUES ('$id_municipio', '$nombre_lugar', '$descripcion_lugar', '$direccion', '$horarios', '$costo_entrada')";
        return ejecutarConsulta($sql);
    }

    // Método para actualizar los detalles de un lugar turístico
    public function actualizarLugar($id_lugar, $id_municipio, $nombre_lugar, $descripcion_lugar, $direccion, $horarios, $costo_entrada)
    {
        $sql = "UPDATE lugar_turistico SET 
                id_municipio = '$id_municipio', 
                nombre_lugar = '$nombre_lugar', 
                descripcion_lugar = '$descripcion_lugar', 
                direccion = '$direccion', 
                horarios = '$horarios', 
                costo_entrada = '$costo_entrada' 
                WHERE id_lugar = $id_lugar";
        return ejecutarConsulta($sql);
    }

    // Método para listar todos los lugares turísticos
    public function listarLugares()
    {
        $sql = "SELECT l.id_lugar, l.nombre_lugar, l.descripcion_lugar, l.direccion, l.horarios, l.costo_entrada
                        AS municipio 
                FROM lugar_turistico l
                LEFT JOIN municipio m ON l.id_municipio = m.id_municipio";
        return ejecutarConsulta($sql);
    }

    // Método para obtener los detalles de un lugar turístico específico
    public function obtenerLugarPorId($id_lugar)
    {
        $sql = "SELECT id_lugar, id_municipio, nombre_lugar, descripcion_lugar, direccion, horarios, costo_entrada 
                FROM lugar_turistico 
                WHERE id_lugar = $id_lugar";
        return ejecutarConsultaSimpleFila($sql);
    }

    // Método para eliminar un lugar turístico
    public function eliminarLugar($id_lugar)
    {
        $sql = "DELETE FROM lugar_turistico WHERE id_lugar = $id_lugar";
        return ejecutarConsulta($sql);
    }
}
?>
