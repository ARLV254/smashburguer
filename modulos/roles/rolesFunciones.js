function Incluir() {
    let header = document.querySelector(".modal-header");
    let title = document.querySelector("#modalTitle");
    let btnAction = document.querySelector("#btnActionForm");
    let btnText = document.querySelector("#btnText");

    if (title) title.innerHTML = "Nuevo Rol";
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
    document.querySelector("#descripcion").value = "";
    let hoy = new Date().toISOString().split('T')[0];
    document.querySelector("#fecha").value = hoy;
    document.querySelector("#idRol").value = ""; 
    document.querySelector("#status").value = "1";
    
    // Desmarcar todos los checkboxes de accesos
    $(".check-acceso").prop("checked", false);

    // Evento submit
    $("#formRoles").off("submit").on("submit", function (event) {
        event.preventDefault();
        
        // Juntar los valores de los checkboxes seleccionados
        let seleccionados = [];
        $(".check-acceso:checked").each(function() {
            seleccionados.push($(this).val());
        });
        let accesosString = seleccionados.join(", ");

        let formData = new FormData();
        formData.append("nombre", $("#nombre").val());
        formData.append("descripcion", $("#descripcion").val());
        formData.append("status", $("#status").val());
        formData.append("accesos", accesosString); // Enviamos el texto de accesos

        $.ajax({
            url: "rolesModelo.php?option=incluir",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                if (respuesta.error == 1) {
                    swal("Error", "El rol ya existe.", "error");
                }
                if (respuesta.error == 3) {
                    swal("Error", "Debe completar correctamente los datos.", "error");
                }
                if (respuesta.exito == 1) {
                    swal("Éxito", "Rol registrado correctamente.", "success").then(() => {
                        window.location.href = "index.php";
                    });
                }
            },
        });
    });
}

function Modificar(id) {
    let header = document.querySelector(".modal-header");
    let title = document.querySelector("#modalTitle");
    let btnAction = document.querySelector("#btnActionForm");
    let btnText = document.querySelector("#btnText");

    if (title) title.innerHTML = "Modificar Rol";
    if (header) {
        header.classList.remove("headerRegister");
        header.classList.add("headerUpdate");
    }

    // Consultar datos actuales del Rol
    $.ajax({
        url: "rolesModelo.php?option=modificarConsultar&id=" + id,
        type: "GET",
        dataType: "json",
        success: function (respuesta) {
            if (respuesta.exito == 1) {
                $("#idRol").val(respuesta.id);
                $("#nombre").val(respuesta.nombre);
                $("#descripcion").val(respuesta.descripcion);
                $("#status").val(respuesta.status);

                // Marcar los checkboxes según lo que hay en la BD
                $(".check-acceso").prop("checked", false); // reset
                if (respuesta.accesos) {
                    let acc = respuesta.accesos.split(", ");
                    acc.forEach(permiso => {
                        $(".check-acceso[value='" + permiso + "']").prop("checked", true);
                    });
                }
            } else {
                swal("Error", "No se encontró el rol.", "error");
            }
        }
    });

    $("#formRoles").off("submit").on("submit", function (event) {
        event.preventDefault();

        let seleccionados = [];
        $(".check-acceso:checked").each(function() {
            seleccionados.push($(this).val());
        });
        let accesosString = seleccionados.join(", ");

        let formData = new FormData();
        formData.append("id", $("#idRol").val());
        formData.append("nombre", $("#nombre").val());
        formData.append("descripcion", $("#descripcion").val());
        formData.append("status", $("#status").val());
        formData.append("accesos", accesosString);

        $.ajax({
            url: "rolesModelo.php?option=modificar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                if (respuesta.error == 2) {
                    swal("Error", "El rol no existe.", "error");
                }
                if (respuesta.exito == 1) {
                    swal("Éxito", "Rol modificado correctamente.", "success").then(() => {
                        window.location.href = "index.php";
                    });
                }
            }
        });
    });
}

function Eliminar(id){
    swal({
        title: "¿Está seguro de eliminar este registro?",
        text: "Una vez confirmado, ¡el status sera inactivo!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) { 
        $.ajax({
            type: "POST",
            url: "rolesModelo.php?option=eliminar&id="+ id, // Tu archivo de roles
            dataType: "json",
            success: function(respuesta) {
                if (respuesta.error == 1) {
                swal("Houston, tenemos un problema", "Este rol no fue encontrado!", "error");
                }
                if (respuesta.exito == 1) {
                window.location.href='index.php';
                }
            }
            });
        }
    });
}