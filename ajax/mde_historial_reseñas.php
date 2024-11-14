
<?php 

require_once "../modelos/modelo_hitorialReseñas.php";

$historial = new HistorialResenas();

$id_historial=isset($_POST["id_historial"])? limpiarCadena($_POST["id_historial"]):"";
$id_reseña=isset($_POST["id_reseña"])? limpiarCadena($_POST["id_reseña"]):"";
$comentario_anterior=isset($_POST["comentario_anterior"])? limpiarCadena($_POST["comentario_anterior"]):"";
$comentario_nuevo=isset($_POST["comentario_nuevo"])? limpiarCadena($_POST["comentario_nuevo"]):"";
$fecha_cambio=isset($_POST["fecha_cambio"])? limpiarCadena($_POST["fecha_cambio"]):"";

switch ($_GET["op"]){
    case 'listarHistorial':
        $rspta=$historial->listarHistorial();
        // Declaración del array para los datos
        $data = array();
        while ($reg = $rspta->fetch_object()){
            $data[] = array(
                "1" => $reg->id_reseña,
                "2" => $reg->id_historial,
                "3" => $reg->comentario_anterior,
                "4" => $reg->comentario_nuevo,
				"5" => $reg->fecha_cambio,
            );
        }
        $results = array(
            "sEcho" => 1, // Información para el datatables
            "iTotalRecords" => count($data), // Total registros
            "iTotalDisplayRecords" => count($data), // Total registros a visualizar
            "aaData" => $data
        );
        echo json_encode($results);
        break;
}
// Fin de las validaciones de acceso
?>
