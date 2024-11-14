$(document).ready(function() {

    // Función para registrar una nueva actividad
    function registrarActividad(id_lugar, nombre_actividad, descripcion_actividad, duracion, costo) {
        $.ajax({
            url: "config/controlador_actividad.php",
            type: "POST",
            data: {
                accion: "registrarActividad",
                id_lugar: id_lugar,
                nombre_actividad: nombre_actividad,
                descripcion_actividad: descripcion_actividad,
                duracion: duracion,
                costo: costo
            },
            success: function(response) {
                alert("Actividad registrada correctamente.");
                listarActividades();
            },
            error: function(error) {
                alert("Error al registrar la actividad.");
            }
        });
    }

    // Función para actualizar una actividad
    function actualizarActividad(id_actividad, id_lugar, nombre_actividad, descripcion_actividad, duracion, costo) {
        $.ajax({
            url: "controllers/actividadController.php",
            type: "POST",
            data: {
                accion: "actualizarActividad",
                id_actividad: id_actividad,
                id_lugar: id_lugar,
                nombre_actividad: nombre_actividad,
                descripcion_actividad: descripcion_actividad,
                duracion: duracion,
                costo: costo
            },
            success: function(response) {
                alert("Actividad actualizada correctamente.");
                listarActividades();
            },
            error: function(error) {
                alert("Error al actualizar la actividad.");
            }
        });
    }

    // Función para eliminar una actividad
    function eliminarActividad(id_actividad) {
        $.ajax({
            url: "controllers/actividadController.php",
            type: "POST",
            data: {
                accion: "eliminarActividad",
                id_actividad: id_actividad
            },
            success: function(response) {
                alert("Actividad eliminada correctamente.");
                listarActividades();
            },
            error: function(error) {
                alert("Error al eliminar la actividad.");
            }
        });
    }

    // Función para listar todas las actividades
    function listarActividades() {
        $.ajax({
            url: "controllers/actividadController.php",
            type: "POST",
            data: {
                accion: "listarActividades"
            },
            success: function(response) {
                $("#listaActividades").html(response);
            },
            error: function(error) {
                alert("Error al listar las actividades.");
            }
        });
    }

    // Función para obtener los detalles de una actividad por ID
    function obtenerActividadPorId(id_actividad) {
        $.ajax({
            url: "controllers/actividadController.php",
            type: "POST",
            data: {
                accion: "obtenerActividadPorId",
                id_actividad: id_actividad
            },
            success: function(response) {
                let actividad = JSON.parse(response);
                // Rellena los campos del formulario con los datos de la actividad
                $("#id_actividad").val(actividad.id_actividad);
                $("#nombre_actividad").val(actividad.nombre_actividad);
                $("#descripcion_actividad").val(actividad.descripcion_actividad);
                $("#duracion").val(actividad.duracion);
                $("#costo").val(actividad.costo);
            },
            error: function(error) {
                alert("Error al obtener los detalles de la actividad.");
            }
        });
    }

    // Ejemplos de cómo utilizar las funciones
    $("#btnRegistrar").click(function() {
        let id_lugar = $("#id_lugar").val();
        let nombre_actividad = $("#nombre_actividad").val();
        let descripcion_actividad = $("#descripcion_actividad").val();
        let duracion = $("#duracion").val();
        let costo = $("#costo").val();
        registrarActividad(id_lugar, nombre_actividad, descripcion_actividad, duracion, costo);
    });

    // Llama a listarActividades() para mostrar todas las actividades al cargar la página
    listarActividades();
});
