function Incluir() {
  let header = document.querySelector(".modal-header");
  let title = document.querySelector("#modalTitle");
  let btnAction = document.querySelector("#btnActionForm");
  let btnText = document.querySelector("#btnText");
  if (title) title.innerHTML = "Nueva Categoría";
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
  document.querySelector("#fecha").value = "";
  document.querySelector("#status").value = "1";
  document.querySelector("#inputGroupFile02").value = "";
  document.querySelector("#idCategoria").value = ""; // Limpia el ID oculto
  document.querySelector("#imagenVieja").value = ""; // Limpia la referencia vieja
  $("#containerNombreImagen").hide(); // Oculta el texto de la imagen anterior
  $("#nombreImagenActual").text(""); // Borra el texto
  // Evento submit
  $("#formCategoria")
    .off("submit")
    .on("submit", function (event) {
      event.preventDefault();
      if ($(this).valid()) {
        // Crear objeto FormData
        let formData = new FormData();
        formData.append("nombre", $("#nombre").val());
        formData.append("descripcion", $("#descripcion").val());
        formData.append("fecha", $("#fecha").val());
        formData.append("status", $("#status").val());
        // Agregar imagen
        let archivo = document.querySelector("#inputGroupFile02").files[0];
        if (archivo != null) {
          formData.append("imagen", archivo);
        }
        $.ajax({
          url: "categoriaModelo.php?option=incluir",
          type: "POST",
          data: formData,
          contentType: false, // necesario para archivos
          processData: false, // necesario para archivos
          dataType: "json",
          success: function (respuesta) {
            if (respuesta.error == 1) {
              swal("Error", "La categoría ya existe.", "error");
            }
            if (respuesta.error == 3) {
              swal("Error", "Debe completar correctamente los datos.", "error");
            }
            if (respuesta.exito == 1) {
              swal(
                "Éxito",
                "Categoría registrada correctamente.",
                "success",
              ).then(() => {
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
  let btnAction = document.querySelector("#btnActionForm");
  let btnText = document.querySelector("#btnText");

  // Cambiar apariencia del modal
  if (title) title.innerHTML = "Modificar Categoría";

  if (header) {
    header.classList.remove("headerRegister");
    header.classList.add("headerUpdate");
  }

  // Consultar datos
  $.ajax({
    url: "categoriaModelo.php?option=modificarConsultar&id=" + id,
    type: "GET",
    dataType: "json",
    success: function (respuesta) {
      if (respuesta.exito == 1) {
        $("#idCategoria").val(respuesta.id);
        $("#nombre").val(respuesta.nombre);
        $("#descripcion").val(respuesta.descripcion);
        $("#fecha").val(respuesta.fecha);
        $("#status").val(respuesta.status);
        $("#imagenVieja").val(respuesta.imagen);
        $("#idCategoria").val(respuesta.id);
        $("#imagenVieja").val(respuesta.imagen);

        // Lógica para mostrar el nombre visualmente
        if (respuesta.imagen && respuesta.imagen != "") {
          $("#nombreImagenActual").text(respuesta.imagen);
          $("#containerNombreImagen").show(); // Esto hace que se vea el nombre
        } else {
          $("#containerNombreImagen").hide(); // Si no hay imagen, se oculta
        }

        $("#inputGroupFile02").val("");
      } else {
        swal("Error", "No se encontró la categoría.", "error");
      }
    },
  });

  // Cambiar evento submit
  $("#formCategoria")
    .off("submit")
    .on("submit", function (event) {
      event.preventDefault();

      if ($(this).valid()) {
        let formData = new FormData();
        formData.append("id", $("#idCategoria").val());
        formData.append("nombre", $("#nombre").val());
        formData.append("descripcion", $("#descripcion").val());
        formData.append("status", $("#status").val());
        formData.append("imagenVieja", $("#imagenVieja").val());

        let archivo = document.querySelector("#inputGroupFile02").files[0];

        if (archivo != null) {
          formData.append("imagen", archivo);
        }
        console.log(archivo);
        $.ajax({
          url: "categoriaModelo.php?option=modificar",
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function (respuesta) {
            if (respuesta.error == 2) {
              swal("Error", "La categoría no existe.", "error");
            }

            if (respuesta.error == 3) {
              swal("Error", "Debe completar correctamente los datos.", "error");
            }

            if (respuesta.exito == 1) {
              swal(
                "Éxito",
                "Categoría modificada correctamente.",
                "success",
              ).then(() => {
                window.location.href = "index.php";
              });
            }
          },
        });
      }
    });
}

function Eliminar(id) {
  swal({
    title: "¿Está seguro de eliminar este registro?",
    text: "Una vez confirmado, ¡el status sera inactivo!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      $.ajax({
        type: "POST",

        url: "categoriaModelo.php?option=eliminar",
        data: { id: id },
        dataType: "json",
        success: function (respuesta) {
          if (respuesta.error == 1) {
            swal(
              "Houston, tenemos un problema",
              "Esta categoría no fue encontrada!",
              "error",
            );
          }
          if (respuesta.exito == 1) {
            window.location.href = "index.php";
          }
        },
        error: function () {
          swal("Error", "No se pudo conectar con el servidor", "error");
        },
      });
    }
  });
}
