<?php 

require_once "../modelos/modelo_usuarios.php";

$articulo = new Usuario();

$id_usuario = isset($_POST["id_usuario"]) ? limpiarCadena($_POST["id_usuario"]) : "";
$nombre_usuario = isset($_POST["nombre_usuario"]) ? limpiarCadena($_POST["nombre_usuario"]) : "";
$email = isset($_POST["email"]) ? limpiarCadena($_POST["email"]) : "";
$tipo_usuario = isset($_POST["tipo_usuario"]) ? limpiarCadena($_POST["tipo_usuario"]) : "";
$ultimo_login = isset($_POST["ultimo_login"]) ? limpiarCadena($_POST["ultimo_login"]) : "";
$fecha_registro = isset($_POST["fecha_registro"]) ? limpiarCadena($_POST["fecha_registro"]) : "";

switch ($_GET["op"]) {
    case 'listarUsuarios':
        $rspta = $articulo->listarUsuarios();
        $data = array();
        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "1" => $reg->tipo_usuario,
                "2" => $reg->email,
                "3" => $reg->ultimo_login,
            );
        }
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);
        break;

    case 'guardaryeditar':
        // Manejo de imagen
        if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
            $imagen = $_POST["imagenactual"];
        } else {
            $ext = explode(".", $_FILES["imagen"]["name"]);
            if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png") {
                $imagen = round(microtime(true)) . '.' . end($ext);
                move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/articulos/" . $imagen);
            }
        }

        // Insertar o actualizar el registro en la base de datos
        if (empty($id_usuario)) {
            // Ajustar los parámetros según las columnas de tu tabla de usuarios
            $rspta = $articulo->insertar($nombre_usuario, $email, $tipo_usuario, $ultimo_login, $fecha_registro, $imagen);
            echo $rspta ? "Usuario registrado" : "Usuario no se pudo registrar";
        } else {
            $rspta = $articulo->editar($id_usuario, $nombre_usuario, $email, $tipo_usuario, $ultimo_login, $fecha_registro, $imagen);
            echo $rspta ? "Usuario actualizado" : "Usuario no se pudo actualizar";
        }
        break;
}
// Fin de las validaciones de acceso

?>
