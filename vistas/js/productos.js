// $.ajax({

// url:"ajax/ajaxDataTableProductos.php",
// success:function(respuesta){

//     console.log("respuesta",respuesta);
// }


// })



$(document).ready(function() {
   
$('.example').DataTable( {
    //configurando caracteristicas del Plugin datatable
   
    "ajax": "ajax/ajaxDataTableProductos.php",
    // trae la informacion desde el archivo ajaxDataTableProductod al cargar la tabla recibe echo de   $JsonData d ajaxDataTableProductos
    "deferRender": true,
    "retrive":true,
    "processing":true,

    "language": {
        "decimal":        "",
        "emptyTable":     "No data available in table",
        "info":           "Mostrando _START_ de _END_ hasta _TOTAL_ entradas",
        "infoEmpty":      "Showing 0 to 0 of 0 entries",
        "infoFiltered":   "(filtered from _MAX_ total entries)",
        "infoPostFix":    "",
        "thousands":      ",",
        "lengthMenu":     "Mostrar _MENU_ entradas",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search":         "Buscar:",
        "zeroRecords":    "No se encontraron resultados",
        "paginate": {
            "first":      "Primero",
            "last":       "Último",
            "next":       "Siguiente",
            "previous":   "Anterior"
        },
        "aria": {
            "sortAscending":  ": activate to sort column ascending",
            "sortDescending": ": activate to sort column descending"
        }
    }


    
} );

/////////






} );


$("#CategoriaNueva").change(function(){
    var CategoriaId = $(this).val();
   console.log("hola",CategoriaId);
    var datos = new FormData();
    datos.append("CategoriaId", CategoriaId );

    $.ajax({

        url:"ajax/ajaxProductos.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(resp){

            if(!resp){

                var CodigoNuevo = CategoriaId+"01";
                $("#CodigoNuevo").val(CodigoNuevo);

            }else{

                var CodigoNuevo = Number(resp["codigo"]) + 1;
               
                $("#CodigoNuevo").val(CodigoNuevo);
            }
           
          
        
            

        }
    })

})



//precio de ventaAgregar

$("#PrecioCompraNuevo , #PrecioCompraEditar").change(function(){

        if($(".porcentaje").prop("checked")) {
            var porcentajeVal = $(".PorcentajeNuevo").val();
          
          
          var porcentual = Number(($("#PrecioCompraNuevo").val()*porcentajeVal/100)+ 
         Number ($("#PrecioCompraNuevo").val()));

         var porcentualEditado = Number(($("#PrecioCompraEditar").val()*porcentajeVal/100)+ 
         Number ($("#PrecioCompraEditar").val()));

          console.log("Valor porcentake", porcentual);
          
            $("#VentaPrecioNuevo").val(porcentual);
            $("#VentaPrecioNuevo").prop("readonly",true);


            $("#VentaPrecioEditar").val(porcentualEditado);
            $("#VentaPrecioEditar").prop("readonly",true);


        }  //si tiene tilde check de porcentaje
     


})

///cambiar porcentaje

$(".PorcentajeNuevo").change(function(){

    if($(".porcentaje").prop("checked")) {

    var porcentajeVal = $(this).val();
     
      
      var porcentual = Number(($("#PrecioCompraNuevo").val()*porcentajeVal/100)+ 
      Number($("#PrecioCompraNuevo").val()));

      var porcentualEditado = Number(($("#PrecioCompraEditar").val()*porcentajeVal/100)+ 
      Number ($("#PrecioCompraEditar").val()));

      console.log("Valor editado", porcentualEditado);
      
        $("#VentaPrecioNuevo").val(porcentual);
        $("#VentaPrecioNuevo").prop("readonly",true);

        $("#VentaPrecioEditar").val(porcentualEditado);
        $("#VentaPrecioEditar").prop("readonly",true);


    }  //si tiene tilde check de porcentaje
 



})




function CheckNocheck(checkbox){
    if(checkbox.checked){
        $("#VentaPrecioNuevo").prop("readonly",true);
        $(".PorcentajeNuevo").prop("readonly",false);
        $(".PorcentajeNuevo").val (40);


        $("#VentaPrecioEditar").prop("readonly",true);
        $(".PorcentajeNuevoEditar").prop("readonly",false);
        $(".PorcentajeNuevoEditar").val (40);
        

    }else{
        $("#VentaPrecioNuevo").prop("readonly",false);
        $("#VentaPrecioNuevo").val("");
        $(".PorcentajeNuevo").val ("0");
        $(".PorcentajeNuevo").prop("readonly",true);

        $("#VentaPrecioEditar").prop("readonly",false);
        $("#VentaPrecioEditar").val("");
        $(".PorcentajeNuevoEditar").val ("0");
        $(".PorcentajeNuevoEditar").prop("readonly",true);


        

        


    }


}


//subir foto producto


$(".nuevaFotoProducto").change(function(){ /** cuando cambie el input*/
   
    var foto = this.files[0]; //captura del archivo que se está subiendo 

    if(foto["type"] != "image/jpeg" && foto["type"] != "image/png" ) /* si no es un archivo jpg*/ 
    {
        $(".nuevaFotoProducto").val(""); /**limpiar input */;

        swal({
            title: "Error al subir la foto",
            text: "La foto debe estar en formato JPG O PNG!",
            type:"error",
            confirmButtonText:"¡Cerrar!"

        })

    } else if(foto["size"] > 2000000){
        
        swal({
            title: "Error al subir la foto",
            text: "La foto no debe pesar mas de 2MB!",
            type:"error",
            confirmButtonText:"¡Cerrar!"

        })

    } else {

        var dataFoto = new FileReader;
        dataFoto.readAsDataURL(foto);
        $(dataFoto).on("load",function(event){
            var rutafoto = event.target.result; //obtene la ruta de la foto

            $(".previsualizacion").attr("src",rutafoto); 
        })


    }
})


//Edición valor producto
//cuando se jaya cargado la tabla y se haha click en el boton editar
$(".example ").on("click", ".btnProductoEditar", function(){

    var productoId = $(this).attr("productoId");
    console.log("Porducto Id", productoId );

    var Editardata = new FormData();
    Editardata.append("productoId", productoId)

    $.ajax({
        
        url:"ajax/ajaxProductos.php",
        method:"POST",
        data: Editardata,
        cache: false,
        contentType:false,
        processData: false,
        dataType: "json",
        success:function(resp){
        //hace solicutd ajax  pasando por post id_categoria que trajo la respuesta
           var dataCategoria = new FormData();
           dataCategoria.append("CatId", resp["id_categoria"]);

           $.ajax({
            url:"ajax/ajaxCategorias.php",
            method:"POST",
            data: dataCategoria,
            cache: false,
            contentType: false,
            processData: false,
            dataType:"json",
            success:function(resp2){

                $("#CategoriaEditar").val(resp2["id"]); //carga valu del option que corresponde a id de categoria
                $("#CategoriaEditar").html(resp2["categoria"]);

            }




           })
           
           $("#CodigoEditar").val(resp["codigo"]);
           $("#EditarDescripcion").val(resp["descripcion"]);
           $("#StockEditar").val(resp["stock"]);
           $("#PrecioCompraEditar").val(resp["precio_compra"]);
           $("#VentaPrecioEditar").val(resp["precio_venta"]);
           
           if(resp["imagen"] != ""){
                $("#imagenSinEditar").val(resp["imagen"]);
                $(".previsualizacion").attr("src", resp["imagen"]);
                



           }






        }


    })



})



//cuando se jaya cargado la tabla y se haha click en el boton editar
$(".example ").on("click", ".EliminarBtnProducto", function(){

    var productoId = $(this).attr("productoId");
    var codigo = $(this).attr("codigo");
    var foto = $(this).attr("foto");
    console.log("ProductoId", productoId );

    swal({
        title: 'Esta seguro de borrar el producto',
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
                window.location = "index.php?ruta=ProductosVista&ProdId="+productoId+"&foto="+foto+"&codigo="+codigo;

        }

})


})