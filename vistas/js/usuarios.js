$(".nuevaFoto").change(function(){ /** cuando cambie el input*/
   
    var imagen = this.files[0];

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" ) /* si no es un archivo jpg*/ 
    {
        $(".nuevaFoto").val(""); /**limpiar input */;

        swal({
            title: "Error al subir la imagen",
            text: "La imagen debe estar en formato JPG O PNG!",
            type:"error",
            confirmButtonText:"¡Cerrar!"

        })

    } else if(imagen["size"] > 2000000){
        
        swal({
            title: "Error al subir la imagen",
            text: "La imagen no debe pesar mas de 2MB!",
            type:"error",
            confirmButtonText:"¡Cerrar!"

        })

    } else {

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);
        $(datosImagen).on("load",function(event){
            var rutaImagen = event.target.result;

            $(".previsualizar").attr("src",rutaImagen);

        })


    }
})


// editar usuario boton lapizito en cada una de las filas de la tabla




$("#tablax").on('click', '.btnEditarUsuario', function(){


    var idUsuario = $(this).attr("idUsuario");
    var datos = new FormData();
    
    datos.append("idUsuario", idUsuario);

    $.ajax({
        url:"ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){


            console.log(respuesta);
           
            // selecciono input en ventana modal editar con id editarNombre
            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarUsuario").val(respuesta["usuario"]);
            $("#editarPerfil").html(respuesta["perfil"]); /**como es un option imprimr hay que imprimir  en el html */
            $("#editarPerfil").val(respuesta["perfil"]);/**mantner perfil que viene en la base de datos en caso que no se vaya a a modificar */
            $("#fotoActual").val(respuesta["foto"]);/**mostrar foto traida de la base de datos */
            $("#passwordActual").val(respuesta["password"]); /**mostrar en input de password oculto la contraseña traida de la base de datos */

            if(respuesta["foto"] != ""){
                $(".previsualizar").attr("src",respuesta["foto"]);
              


            }
        }
    }) ;







})

// $(".btnActivar").click(function(){
/**boton activar usuario */

$("#tablax").on('click', '.btnActivar', function(){
     var idUsuario = $(this).attr("idUsuario"); /**alamacena el id del usuario atributo del boton activar*/
     var estadoUsuario = $(this).attr("estadoUsuario"); /**alamacena el estado del usuario atributo del boton activar*/

     var datos = new FormData();
            datos.append("activarId", idUsuario);
            datos.append("activarUsuario", estadoUsuario);

    $.ajax({

        url:"ajax/usuarios.ajax.php",
        method: "POST", 
        data: datos,
        cache:false,
        contentType: false,
        processData: false,
        success: function(respuesta){
         }
            })
         
            if(estadoUsuario == 0){
                // si está en estado desactivado cambia el color verde del boton a rojo
                $(this).removeClass('btn-primary');
                $(this).addClass('btn-outline-secondary');
                $(this).html('Desactivado');/**escribir desactivo en ael html  */
                $(this).attr('estadoUsuario',1);/**cambiar el atributo  de 0 a 1*/
            } else {
                    /**si está activado hacemos al reves */
                $(this).addClass('btn-primary');
                $(this).removeClass('btn-outline-secondary');
                $(this).html('Activado');/**escribir desactivo en ael html  */
                $(this).attr('estadoUsuario',0);/**cambiar el atributo  de 0 a 1*/

            }
})
// Revisar usuario repetido o que no se repita el usuarioo


$("#nuevoUsuario").change(function(){

    $(".alert").remove();/**que cuando haya un cambio en input
    conid nuevousuario se remuevan los mensajes de laerta */

    var usuario = $(this).val();/**capturar nomre de usuario */
    var datos = new FormData();
    datos.append("validarUsuario",usuario);

    $.ajax({
        url:"ajax/usuarios.ajax.php",
        method: "POST", 
        data: datos,
        cache:false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){

            if(respuesta ){

               
                $("#nuevoUsuario").parent().after('<div class=" alert alert-warning">Este usuario ya existe en la base de datos</div>');
                $("#nuevoUsuario").val("");
            
            }
         }




    })



})  

// Eliminar usuario
// al hacer click sobre boton  se abre alerta sweet alert
// $(".btnEliminarUsuario").click(function(){


 $("#tablax").on('click', '.btnEliminarUsuario', function(){
   var IdUsuario = $(this).attr("idUsuario"); /**igual a  lo que traiga el boron eleminar en su atributo id usuario */
   var fotoUsuario = $(this).attr("fotoUsuario");
   var usuario = $(this).attr("usuario");
    swal({
            title: 'Esta seguro de borrar el usuario',
            text: "¡Si no lo está puede cancelar la acción",
            icon: 'warning',
            // showCancelButton: true,
            buttons:true,
            dangerMode:true,
            buttons: ["Cancelar", "Borrar"],
            // confirmButtonColor: '#3085d',
            // cancelButtonColor: "#d33",
            cancelButtonText: 'Cnacelar',
            // confirmButtonText: 'Si, borrar usuario!'

    }).then((result)=>{
            /**si se selecciono boton eliminar redirecciona con variable get con id de usuario */
            if(result){
                    window.location = "index.php?ruta=usuarios&idUsuario="+IdUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;

            }

    })





})