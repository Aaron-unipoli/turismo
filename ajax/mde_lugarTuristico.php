<?php 

require_once "../modelos/modelo_lugarTuristico.php";

$articulo = new LugarTuristico();


$id_lugar=isset($_POST["id_lugar"])? limpiarCadena($_POST["id_lugar"]):"";
$nombre_lugar=isset($_POST["nombre_lugar"])? limpiarCadena($_POST["nombre_lugar"]):"";
$descripcion_lugar=isset($_POST["descripcion_lugar"])? limpiarCadena($_POST["descripcion_lugar"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$horarios=isset($_POST["horarios"])? limpiarCadena($_POST["horarios"]):"";
$costo_entrada=isset($_POST["costo_entrada"])? limpiarCadena($_POST["costo_entrada"]):"";

switch ($_GET["op"]){
	case 'listarLugares':
		$rspta=$articulo->listarLugares();
 		//Vamos a declarar un array
 		$data= Array();
 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"1"=>$reg->nombre_lugar,
 				"2"=>$reg->descripcion_lugar,
 				"3"=>$reg->direccion,
                "4"=>$reg->horarios,
                "5"=>$reg->costo_entrada,
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

}
//Fin de las validaciones de acceso

?>