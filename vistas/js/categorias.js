$(".CategoriaEditarBtn").click(function(){

    var CatId = $(this).attr("CatId");
     /**guardar el id de la fila de la tabla  traido de la base de datos */
  
    var data = new FormData();
    data.append("CatId", CatId);
    
    $.ajax({
        url:"ajax/ajaxCategorias.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(resp){

            $("#CategEditar").val(resp["categoria"]);
            $("#CatId").val(resp["id"]);/**carga id de categoria en input oculto en la vista */


          
          
        }

    })




})


/**Eliminar */

$(".CategoriaEliminarBtn").click(function(){

    var  CatId = $(this).attr("CatId");

    swal({
        title: 'Esta seguro de borrar la categoria',
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
                window.location = "index.php?ruta=categorias&CatId="+CatId;

        }

})


})