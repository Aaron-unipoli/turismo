$(document).ready(function() {

    // Función para registrar un nuevo evento de auditoría
    function registrarEvento(operacion, id_usuario, detalles) {
        $.ajax({
            url: "config/controlador_actividad_ddl.php",
            type: "POST",
            data: {
                accion: "registrarEvento",
                operacion: operacion,
                id_usuario: id_usuario,
                detalles: detalles
            },
            success: function(response) {
                alert("Evento de auditoría registrado correctamente.");
                listarEventos();
            },
            error: function(error) {
                alert("Error al registrar el evento de auditoría.");
            }
        });
    }

    // Función para listar todos los eventos de auditoría
    function listarEventos() {
        $.ajax({
            url: "controllers/actividadDDLController.php",
            type: "POST",
            data: {
                accion: "listarEventos"
            },
            success: function(response) {
                $("#listaEventos").html(response);
            },
            error: function(error) {
                alert("Error al listar los eventos de auditoría.");
            }
        });
    }

    // Función para obtener los detalles de un evento por su ID
    function obtenerEventoPorId(id_evento) {
        $.ajax({
            url: "controllers/actividad_ddl.php",
            type: "POST",
            data: {
                accion: "obtenerEventoPorId",
                id_evento: id_evento
            },
            success: function(response) {
                let evento = JSON.parse(response);
                // Rellena los campos del formulario con los datos del evento
                $("#id_evento").val(evento.id_evento);
                $("#operacion").val(evento.operacion);
                $("#id_usuario").val(evento.id_usuario);
                $("#detalles").val(evento.detalles);
                $("#fecha_operacion").val(evento.fecha_operacion);
            },
            error: function(error) {
                alert("Error al obtener los detalles del evento.");
            }
        });
    }

    // Ejemplo de cómo utilizar las funciones
    $("#btnRegistrarEvento").click(function() {
        let operacion = $("#operacion").val();
        let id_usuario = $("#id_usuario").val();
        let detalles = $("#detalles").val();
        registrarEvento(operacion, id_usuario, detalles);
    });

    // Llama a listarEventos() para mostrar todos los eventos al cargar la página
    listarEventos();
});

