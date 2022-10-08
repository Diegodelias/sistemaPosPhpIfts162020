// editar cliente
$("#tablax").on('click', '.EditarClienteBtn', function(){


  var ClienteId = $(this).attr("ClienteId");
  var datos = new FormData();
  datos.append("ClienteId" , ClienteId);

  $.ajax({
      url:"ajax/ajaxClientes.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(resp){
      
        $("#ClientId").val(resp["id"]);//se le  pasa a campo input hidden de la vista
        console.log("cliente id:" + resp["id"])
        $("#ClienteEditar").val(resp["nombre"]);
        // $("#ClienteEditar").val(resp["id"]);
        $("#DniEditar").val(resp["documento"]);
        $("#EmailEditar").val(resp["email"]);
        $("#TelEditar").val(resp["telefono"]);
        $("#DireEditar").val(resp["direccion"]);
        $("#FechaNacimientoEditar").val(resp["fecha_nacimiento"]);
        

      }


  })








})






// $(".EditarClienteBtn").click(function(){
//   // $("#ClienteEditar").val($(this).attr("ClienteId"));

//     var ClienteId = $(this).attr("ClienteId");
//     var datos = new FormData();
//     datos.append("ClienteId",ClienteId);

//     $.ajax({
//         url:"ajax/ajaxClientes.php",
//         method: "POST",
//         data: datos,
//         cache: false,
//         contentType: false,
//         processData: false,
//         dataType: "json",
//         success: function(resp){
        
//           $("#ClientId").val(resp["id"]);//se le  pasa a campo input hidden de la vista
//           console.log("cliente id:" + resp["id"])
//           $("#ClienteEditar").val(resp["nombre"]);
//           // $("#ClienteEditar").val(resp["id"]);
//           $("#DniEditar").val(resp["documento"]);
//           $("#EmailEditar").val(resp["email"]);
//           $("#TelEditar").val(resp["telefono"]);
//           $("#DireEditar").val(resp["direccion"]);
//           $("#FechaNacimientoEditar").val(resp["fecha_nacimiento"]);
          

//         }


//     })





// })

//



// $(".EliminarBtn").click(function(){
  
//   var ClientId = $(this).attr("ClienteId");
//   console.log("ClienteId", ClientId);

//   swal({
//     title: 'Esta seguro de elmininar este cliente',
//     text: "¡Si no lo está puede cancelar la acción",
//     icon: 'warning',
//     // showCancelButton: true,
//     buttons:true,
//     dangerMode:true,
//     buttons: ["Cancelar", "Borrar"],
//     // confirmButtonColor: '#3085d',
//     // cancelButtonColor: "#d33",
//     cancelButtonText: 'Cancelar',
//     // confirmButtonText: 'Si, borrar usuario!'

// }).then((result)=>{
//     /**si se selecciono boton eliminar redirecciona con variable get con id categoria */
//     if(result){
//             window.location = "index.php?ruta=ClientesVista&ClienteId="+ClientId;

//     }



// })



// })



$("#tablax").on('click', '.EliminarBtn', function(){



  var ClientId = $(this).attr("ClienteId");
  console.log("ClienteId", ClientId);

  swal({
    title: 'Esta seguro de elmininar este cliente',
    text: "¡Si no lo está puede cancelar la acción",
    icon: 'warning',
    // showCancelButton: true,
    buttons:true,
    dangerMode:true,
    buttons: ["Cancelar", "Borrar"],
    // confirmButtonColor: '#3085d',
    // cancelButtonColor: "#d33",
    cancelButtonText: 'Cancelar',
    // confirmButtonText: 'Si, borrar usuario!'

}).then((result)=>{
    /**si se selecciono boton eliminar redirecciona con variable get con id categoria */
    if(result){
            window.location = "index.php?ruta=ClientesVista&ClienteId="+ClientId;

    }



})








})