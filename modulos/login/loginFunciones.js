function MostrarRecuperar() {
  $('#recuperar').show();
  $('#login').hide();
}

function MostrarLogin() {
  $('#recuperar').hide();
  $('#login').show();
}

function BuscarAdmin(){

$("body").on("submit","#formDefault",function(e){

e.preventDefault();

$.ajax({

type:"POST",
url:"loginModelo.php?option=buscar",
dataType:"json",
data:$(this).serialize(),

success:function(respuesta){

if(respuesta.error==1){
swal("Error","Usuario o contraseña incorrectos","error");
}

if(respuesta.error==2){
swal("Error","Debe completar los datos","error");
}

if(respuesta.exito==1){

swal("Bienvenido",respuesta.nombre,"success")
.then(()=>{

/* Redirección única al dashboard */
window.location.href="../home/";

});

}

},

error:function(){
swal("Error","Ocurrió un problema al iniciar sesión","error");
}

});

});

}

function Recuperar() {

$("body").on('submit','#formRecuperar',function (event) {

event.preventDefault()

if ($('#formRecuperar').valid()) {

$.ajax({

type:"POST",
url:"recuperarModelo.php",
dataType:"json",
data:$(this).serialize(),

success:function (respuesta) {

if (respuesta.error == 1) {
swal("Houston, tenemos un problema","Este usuario no existe","error");
}

if (respuesta.exito == 1) {
swal("Mensaje enviado satisfactoriamente","Todo bien","success");
}

},

error:function(){
swal("Error","No se pudo procesar la solicitud","error");
}

})

}

})

}

function MostrarRegistro() {
    $('#loginSection').hide(); // Esconde específicamente el cuadro de login
    $('#registroSection').css('display', 'flex'); // Muestra el registro centrado
}

function VolverAlLogin() {
    $('#registroSection').hide(); // Esconde el registro
    $('#loginSection').show(); // Muestra el login
}

// 2. Función para procesar el registro (Agregué manejo de error por si falla el servidor)
function RegistrarUsuario() {
    $("body").off("submit", "#formRegistro").on("submit", "#formRegistro", function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "loginModelo.php?option=registrar",
            dataType: "json",
            data: $(this).serialize(),
            success: function(res) {
                if(res.exito == 1) {
                    swal("¡Bienvenido!", "Tu cuenta ha sido creada", "success")
                    .then(() => { VolverAlLogin(); });
                } else {
                    swal("Error", res.mensaje || "No se pudo crear la cuenta", "error");
                }
            },
            error: function() {
                swal("Error", "No se pudo conectar con el servidor", "error");
            }
        });
    });
}

// 3. Inicializar eventos al cargar la página
$(document).ready(function () {
    RegistrarUsuario();
    BuscarAdmin();
});