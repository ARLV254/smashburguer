function Incluir() {
    let header = document.querySelector(".modal-header");
    let title = document.querySelector("#modalTitle");
    let btnAction = document.querySelector("#btnActionForm");
    let btnText = document.querySelector("#btnText");

    if (title) title.innerHTML = "Nuevo Juguete";
    if (header) {
        header.classList.remove("headerUpdate");
        header.classList.add("headerRegister");
    }
    if (btnAction) {
        btnAction.classList.remove("btn-info");
        btnAction.classList.add("btn-primary");
    }
    if (btnText) btnText.innerHTML = "Guardar";

    // Limpiar campos
    document.querySelector("#nombre").value = "";
    document.querySelector("#edad_estimada").value = "";
    document.querySelector("#precio").value = "";
    document.querySelector("#marca").value = "";
    document.querySelector("#status").value = "1";
    
    document.querySelector("#idJuguete").value = ""; 
    document.querySelector("#imagenVieja").value = "";
    
    $("#containerNombreImagen").hide(); 
    $("#nombreImagenActual").text("");

    // Evento submit
    $("#formJuguete").off("submit").on("submit", function (event) {
        event.preventDefault();
        if ($(this).valid()) {
            let formData = new FormData();
            formData.append("nombre", $("#nombre").val());
            formData.append("edad_estimada", $("#edad_estimada").val());
            formData.append("precio", $("#precio").val());
            formData.append("marca", $("#marca").val());
            formData.append("status", $("#status").val());
            
            let archivo = document.querySelector('input[name="imagen"]').files[0];
            if (archivo != null) {
                formData.append("imagen", archivo);
            }
            
            $.ajax({
                url: "jugueteModelo.php?option=incluir",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {
                    if (respuesta.error == 2) {
                        swal("Error", "Debe completar correctamente los datos.", "error");
                    }
                    if (respuesta.exito == 1) {
                        swal("Éxito", "Juguete registrado correctamente.", "success").then(() => {
                            window.location.href = "index.php";
                        });
                    }
                },
            });
        }
    });
}

function Modificar(id) {
    let header = document.querySelector(".modal-header");
    let title = document.querySelector("#modalTitle");

    if (title) title.innerHTML = "Modificar Juguete";
    if (header) {
        header.classList.remove("headerRegister");
        header.classList.add("headerUpdate");
    }

    $.ajax({
        url: "jugueteModelo.php?option=modificarConsultar&id=" + id,
        type: "GET",
        dataType: "json",
        success: function (respuesta) {
            if (respuesta.exito == 1) {
                $("#idJuguete").val(respuesta.id);
                $("#nombre").val(respuesta.nombre);
                $("#edad_estimada").val(respuesta.edad_estimada);
                $("#precio").val(respuesta.precio);
                $("#marca").val(respuesta.marca);
                $("#status").val(respuesta.status);
                $("#imagenVieja").val(respuesta.imagen);

                if (respuesta.imagen && respuesta.imagen != "") {
                    $("#nombreImagenActual").text(respuesta.imagen);
                    $("#containerNombreImagen").show();
                } else {
                    $("#containerNombreImagen").hide();
                }
                $("#inputGroupFile02").val("");
                $("#modalJuguete").modal("show");
            } else {
                swal("Error", "No se encontró el juguete.", "error");
            }
        }
    });

    $("#formJuguete").off("submit").on("submit", function (event) {
        event.preventDefault();
        if ($(this).valid()) {
            let formData = new FormData();
            formData.append("id", $("#idJuguete").val());
            formData.append("nombre", $("#nombre").val());
            formData.append("edad_estimada", $("#edad_estimada").val());
            formData.append("precio", $("#precio").val());
            formData.append("marca", $("#marca").val());
            formData.append("status", $("#status").val());
            formData.append("imagenVieja", $("#imagenVieja").val());

            let inputImagen = document.querySelector('input[name="imagen"]');
            let archivo = (inputImagen && inputImagen.files.length > 0) ? inputImagen.files[0] : null;
            if (archivo != null) {
                formData.append("imagen", archivo);
            }
            
            $.ajax({
                url: "jugueteModelo.php?option=modificar",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {
                    if (respuesta.error == 3) {
                        swal("Error", "Debe completar correctamente los datos.", "error");
                    }
                    if (respuesta.exito == 1) {
                        swal("Éxito", "Juguete modificado correctamente.", "success").then(() => {
                            window.location.href = "index.php";
                        });
                    }
                }
            });
        }
    });
}

function agregarAlCarrito(id, nombre, precio) {
    $.ajax({
        type: "POST",
        url: "tiendaModelo.php?option=agregar",
        data: { 
            id: id,
            nombre: nombre,
            precio: precio
        },
        success: function(res) {
            // Si el modelo responde con éxito, actualizamos el número del navbar
            ActualizarContadorCarrito();
            swal("¡Agregado!", nombre + " se añadió al carrito.", "success");
        },
        error: function() {
            swal("Error", "No se pudo agregar el producto.", "error");
        }
    });
}

function ActualizarContadorCarrito() {
    $.ajax({
        url: "tiendaModelo.php?option=contarCarrito",
        type: "GET",
        success: function(cantidad) {
            // Esto busca el ID 'cantidadCarrito' en tu navbar y le pone el número
            $('#cantidadCarrito').text(cantidad);
        }
    });
}