function Incluir() {
  let header = document.querySelector(".modal-header");
  let title = document.querySelector("#modalTitle");
  let btnAction = document.querySelector("#btnActionForm");
  let btnText = document.querySelector("#btnText");

  if (title) title.innerHTML = "Nuevo Usuario";
  if (header) {
    header.classList.remove("headerUpdate");
    header.classList.add("headerRegister");
  }
  if (btnAction) {
    btnAction.classList.remove("btn-info");
    btnAction.classList.add("btn-primary");
  }
  if (btnText) btnText.innerHTML = "Guardar";

  $("#idUsuario").val("");
  $("#nombre").val("");
  $("#direccion").val("");
  $("#email").val("");
  $("#password").val("");
  $("#rolid").val("");
  $("#status").val("1");

  $("#formUsuarios").off("submit").on("submit", function (event) {
    event.preventDefault();

    // Usamos el .valid() de la maestra para asegurar que no rompa su lógica
    if (this.checkValidity()) {
      let formData = new FormData(this); // Esto captura todo automáticamente

      $.ajax({
        url: "usuariosModelo.php?option=incluir",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
    if (respuesta.error == 1) {
        swal("Error", "El email ya está registrado o hubo un fallo en la base de datos.", "error");
    } else if (respuesta.error == 2) {
        swal("Atención", "Todos los campos son obligatorios.", "warning");
    } else if (respuesta.error == 3) {
        swal("Error", "El nombre contiene caracteres no válidos o el email es incorrecto.", "error");
    } else if (respuesta.exito == 1) {
        swal("Éxito", "Usuario registrado correctamente.", "success").then(() => {
            window.location.href = "index.php";
        });
    }
}
      });
    }
  });
}






// ===============================
// FUNCION MODIFICAR USUARIO
// ===============================
function Modificar(id) {

  let header = document.querySelector(".modal-header");
  let title = document.querySelector("#modalTitle");

  if (title) title.innerHTML = "Modificar Usuario";

  if (header) {
    header.classList.remove("headerRegister");
    header.classList.add("headerUpdate");
  }

  // consultar usuario
  $.ajax({

    url: "usuariosModelo.php?option=modificarConsultar&id=" + id,
    type: "GET",
    dataType: "json",

    success: function (respuesta) {

      if (respuesta.exito == 1) {

        $("#idUsuario").val(respuesta.id);
        $("#nombre").val(respuesta.nombre);
        $("#direccion").val(respuesta.direccion);
        $("#email").val(respuesta.email);
        $("#rolid").val(respuesta.rolid);
        $("#fecha").val(respuesta.fecha);
        $("#status").val(respuesta.status);

      } else {

        swal("Error", "El usuario no fue encontrado.", "error");

      }

    }

  });


  // evento submit
  $("#formUsuarios")
    .off("submit")
    .on("submit", function (event) {

      event.preventDefault();

      if ($(this).valid()) {

        let formData = new FormData();

        formData.append("id", $("#idUsuario").val());
        formData.append("nombre", $("#nombre").val());
        formData.append("direccion", $("#direccion").val());
        formData.append("email", $("#email").val());
        formData.append("password", $("#password").val());
        formData.append("rolid", $("#rolid").val());
        formData.append("status", $("#status").val());

        $.ajax({

          url: "usuariosModelo.php?option=modificar",
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          dataType: "json",

          success: function (respuesta) {

            if (respuesta.error == 2) {
              swal("Error", "El usuario no existe.", "error");
            }

            if (respuesta.error == 3) {
              swal("Error", "Debe completar correctamente los datos.", "error");
            }

            if (respuesta.exito == 1) {

              swal("Éxito", "Usuario modificado correctamente.", "success")
              .then(() => {

                window.location.href = "index.php";

              });

            }

          }

        });

      }

    });

}





// ===============================
// FUNCION ELIMINAR USUARIO
// ===============================
window.Eliminar = function(id) {
  swal({
      title: "¿Está seguro de eliminar este registro?",
      text: "Una vez confirmado, ¡el usuario quedará inactivo!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
  .then((willDelete) => {
      if (willDelete) {
        $.ajax({
            type: "POST",
            url: "usuariosModelo.php?option=eliminar&id="+ id,
            dataType: "json",
            success: function(respuesta) {
              if (respuesta.error == 1) {
                swal("Error", "El usuario no fue encontrado.", "error");
              }
              if (respuesta.exito == 1) {
                window.location.href='index.php';
              }
            }
        });
      }
  });
};