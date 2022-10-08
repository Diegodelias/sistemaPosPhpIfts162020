var cantidadTempSuma=0;
var cantidadTempResta=0;




//     $("#testid").keypress(function (evt) {
//         evt.preventDefault();
//     });
    
//     $(document).keydown(function(e) {
//             var elid = $(document.activeElement).hasClass('textInput');
//            console.log(e.keyCode + ' && ' + elid);
//             if (e.keyCode === 8 || e.keyCode === 49 || e.keyCode === 50 || e.keyCode === 51 || e.keyCode === 52 || e.keyCode === 53 || e.keyCode === 54 || e.keyCode === 55 || e.keyCode === 56 || e.keyCode === 57 || e.keyCode === 58 || e.keyCode === 48  || e.keyCode === 97 || e.keyCode === 98 || e.keyCode === 99 || e.keyCode === 100 || e.keyCode === 101|| e.keyCode === 102 || e.keyCode === 103 || e.keyCode === 104 || e.keyCode === 105    && !elid) {

//                 swal({
//                     title: "No puede ingresarse cantidad directamente en el input",
//                     text: "utilizar flechas para aumentar o disminuir cantidad",
//                     icon: "warning",
//                     buttons: true,
//                     dangerMode: true,
//                   })
//                 return false;
//             };
//         });

    $(".btnEliminarVenta").click(function(){
    
        var idVenta = $(this).attr("idVenta");
        swal({
            title: '¿Esta seguro de borrar la venta?',
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
            /**si se selecciono boton eliminar redirecciona con variable get con id de usuario */
            if(result){
                    
                window.location = "index.php?ruta=ventas&idVenta="+idVenta;
            }
    
    
    })
    
    })
 
 
//botón editar venta
$(".EditarVentaBoton").click(function(){
    
    var idVenta = $(this).attr("idVenta");
    window.location = "index.php?ruta=VentaEditar&idVenta="+idVenta;
    


})

$.ajax({

    url: "ajax/ajaxDataTableVentas.php",
    success: function(respuesta) {

      
    }


})



$(document).ready(function() {
    $('.tablaVentas').DataTable({
        //configurando caracteristicas del Plugin datatable
        "ajax": "ajax/ajaxDataTableVentas.php",  //trae toda la inforación de ajaxDataTableVentas.php y la carga en la tabla
        "deferRender": true,
        "retrive": true,
        "processing": true,

        "language": {
            "decimal": "",
            "emptyTable": "No data available in table",
            "info": "Mostrando _START_ de _END_ hasta _TOTAL_ entradas",
            "infoEmpty": "Showing 0 to 0 of 0 entries",
            "infoFiltered": "(filtered from _MAX_ total entries)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "No se encontraron resultados",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        }



    });





});


//al hacer click en el boron agregar producto de la tabla
$(".tablaVentas").on("click", ".ProductoAgregar", function() {
   



    var ProductoId = $(this).attr("idProducto"); //trabaja sobre ajaxDataTableVentas botonera


    //desactivar boton agrgar producto cambio color del boton evita agregar el mismo producto

    $(this).removeClass("btn-primary ProductoAgregar");
    $(this).addClass("btn-default");

    var data = new FormData();
    data.append("productoId", ProductoId); //mandando id producto archivo ajax
    //realiza petición al servidor
    $.ajax({
        url: "ajax/ajaxProductos.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(resp) {

            var descripcion = resp["descripcion"];
            var cantidad = Number(resp["stock"]);
            
            var precio = resp["precio_venta"];
           
            //no permitir agregar producto a la venta si cantidad esta en cero
            if (cantidad == 0) {
                swal("No hay cantidad", "No hay cantidad disponible del producto seleccionado", "error");
                $("button[idProducto='" + ProductoId + "']").removeClass("btn-default");
                $("button[idProducto='" + ProductoId + "']").addClass("btn-primary ProductoAgregar");
                return;

            }

            //inserta html  con los datos traidos en la vista acaaaaaaaaa
            $(".ProductoNuevo").append(
                '<div class="form-row">' +
                    '<div class = "form-group col-md-6">' +
                        '<div class = "input-group-prepend">' +
                            '<span class = "input-group-text" ><button type = "button" class = "btn btn-danger btn-xs  quitarProducto" idProductoB = "' + ProductoId + '"> <i i class = "fa fa-trash"></i></button ></span >' +
                            '<input type ="text" class = "form-control agregarProducto" ProductoId =" ' + ProductoId + '  " name = "agregarProducto" value = "' + descripcion + '"  required>' +
                        '</div>' +
                    '</div>' +
                    '<div class = "form-group col-md-2">' +
                        '<input type = "number" class = "form-control nuevoCantidadProducto testInput " id="testid" cantAtrib = "' + cantidad + '" name = "nuevoCantidadProducto" min = "1"  value="1"  nuevoStock ="'+ (cantidad-1) +'" StockInicial ="'+ cantidad  +'"   required >' +
                    '</div>' +
                    '<div class = "form-group col-md-3">' +
                        '<div class = "input-group-append ">' +
                            '<input type ="text" class = "form-control nuevoPrecioProducto"  precioInicial="' + precio + '" name = "nuevoPrecioProducto" min = "1" placeholder = "0" readonly required value = "' + precio + '" >' +
                            '<span class = "input-group-text" ><i class = "ion ion-social-usd" ></i><span>' + 
                        '</div >' +
                    '</div >' +
                '</div>'


            )

            TotalSumaPrecios();
           
            impuestoAgregar();

            //agrupar productos en json
            productosListar();

            //formatoo precio productos
            $(".nuevoPrecioProducto").number(true,2);
            
                $("#TotalVentaNuevo").number(true,2);
                $(".nuevoImpuestoVenta").number(true,2);
        $("#nuevoTotalVenta").number(true,2);



        }


    })


});

// al carga la tabla   draw.dt funcion de jquery data table   para hacer una tarea cuando estesmo  usando la tabla
//n cada actualización o uso de la tabla

$(".tablaVentas").on('draw.dt', function() {
    if (localStorage.getItem("eliminarProd") != null) {
        //json.parse convierte Strng a json
        var listadoIdProd = JSON.parse(localStorage.getItem("eliminarProd"));

        //recorre el json 

        for (var i = 0; i < listadoIdProd.length; i++) {
            //si existe algún elemento con clase reactivarProducto con un atributo idpRODUCTO igual alguno existente en el array cambia color boton agregar producto 
            $(".reactivarBoton[idProducto='" + listadoIdProd[i]["ProductoId"] + "']").removeClass('btn-default');//elima clase boton grisd
            $(".reactivarBoton[idProducto='" + listadoIdProd[i]["ProductoId"] + "']").addClass('btn-primary');//recipera botn azul

        }


    }

})



//BORRAR PROPDUCTO Y VOLVER A HABILITAR EL BOTMN
//al hacer clic sobre cada cruz de producto agregado


var idProductoBorrar = [];
localStorage.removeItem("eliminarProd"); //borrar item que guarda registro d elos botones agregar presionados al recargar la pagina


$(".ventaFormulario").on("click", "button.quitarProducto", function() {
    //elimian a padre que contiene al boton y por lo tanto todo lo demás
    var ProductoId = $(this).attr("idProductoB"); //captura id del producto




    $(this).parent().parent().parent().parent().remove();

  

    //almacenar en localStorage id del producto a eliminar
   

    if (localStorage.getItem("eliminarProd") == null) {
        idProductoBorrar = [];

    } else {

        idProductoBorrar.concat(localStorage.getItem("eliminarProd"));



    }

    idProductoBorrar.push({ "ProductoId": ProductoId });
    localStorage.setItem("eliminarProd", JSON.stringify(idProductoBorrar));


    $(".reactivarBoton[idProducto='" + ProductoId + "']").removeClass('btn-default'); //escribe  id del producto como atributo  del botón
    $(".reactivarBoton[idProducto='" + ProductoId + "']").addClass('btn-primary ProductoAgregar'); //pone al botón del color normal

    if($(".nuevoPrecioProducto").length == 0){
        //ver función TotalSumaPrecios() si no hay elelemnto en el array que se va generando al agregar items a la lista
        $("#TotalVentaNuevo").val(0);
        $("#totalVenta").val(0);
        $("#TotalVentaNuevo").attr("total",0); //poner en 0 cero atributo total suma

        $("#nuevoTotalVenta").val(0);
        $(".nuevoImpuestoVenta").val(0);
      
        

    }else{

        TotalSumaPrecios();
        impuestoAgregar();

       
        $("#TotalVentaNuevo").number(true,2);
        $(".nuevoImpuestoVenta").number(true,2);
        $("#nuevoTotalVenta").number(true,2);

        productosListar();
      


    }
   



})



//Suma todos los precios
 function TotalSumaPrecios(){
     //esta funcion se ejecutara al cargar prodcutos desde la tabla, al modificar cantidad
        var precioProd = $(".nuevoPrecioProducto"); 
        var arrayPrecioSuma = [];
        for(var i = 0; i < precioProd.length; i++ ) {
            arrayPrecioSuma.push(Number($(precioProd[i]).val()));
            




        }

 

        function sumarPreciosArray(total,numero){
            //total funciona como acumulador numero es el elemento

            return total + numero;
        
        
        
         }
        
        
         var totalSumPrecio = arrayPrecioSuma.reduce(sumarPreciosArray); //reduce va reducir los valores del array a un solo valor y para obtener el valor de salida va ejecutando  la función que se le pasa como argumento. "total" represente el acumulador y numero el valor actual 

         
         
         
         $("#nuevoTotalVenta").val(totalSumPrecio);
         $("#TotalVentaNuevo").val(totalSumPrecio);
         $("#totalVenta").val(totalSumPrecio);
         $("#TotalVentaNuevo").number(true,2);
         $(".nuevoImpuestoVenta").number(true,2);
        $("#nuevoTotalVenta").number(true,2);
         $("#TotalVentaNuevo").attr("total",totalSumPrecio); //agregar como atributo el total de la suma al elemento

         
    
 }









// modificar cantidad


document.querySelector(".ventaFormulario").addEventListener("change", function (e){
   
    
    if (e.target.classList.contains('TipoDePago')){
       
        var metodo = e.target.value;

        if(metodo === "Efectivo"){
           
            this.children[4].children[0].classList.remove('col-md-6');
            this.children[4].children[0].classList.add('col-md-4');
            this.children[4].children[1].innerHTML = 

                '<div class="row d-flex justify-content-end ">'+



                '<div class="form-group col-md-4">' +

               

               '<div class="input-group-append w-100 ">'+
                '<input type="number" class="form-control nuevoValorEfectivo"name="nuevoValorEfectivo" min="1" placeholder="0" required>'+
                 '<span class="input-group-text"><i class="ion ion-social-usd"></i></span>'+
             '</div>'+
            
             '</div>'+

             '<div class="form-group col-md-4">' +

               

             '<div class="input-group-append ">'+
              '<input type="number" class="form-control nuevoCambioEfectivo "  name="nuevoCambioEfectivo" min="1" placeholder="0" required>'+
               '<span class="input-group-text"><i class="ion ion-social-usd"></i></span>'+
           '</div>'+
          
           '</div>'
             
                
                
                
                
                ;

             
                MetodosListar()

               //formato de precio
            //    $(".nuevoValorEfectivo").number(true,2);
            
            //    $(".nuevoCambioEfectivo").number(true,2); 
        } else {

            this.children[4].children[0].classList.remove('col-md-6');
            this.children[4].children[0].classList.add('col-md-4');
            this.children[4].children[1].innerHTML = 
               '<div class="form-group col-md-12">'+
                                '<div class="input-group-append ">'+
            '<input type="text" class="form-control nuevoCodigoTransaccion" name="nuevoCodigoTransaccion" min="1" placeholder="0" required>'+
            ' <span class="input-group-text"><i class="fa fa-lock"></i></span>'+
            
            '</div>'+

            '</div>'







        }
       
        
        

      



    }
      
    else if (e.target.classList.contains('nuevoValorEfectivo') || e.target.classList.contains('nuevoCambioEfectivo') ){
               // formato de precio
         $(".nuevoValorEfectivo").number(true,2);
            
         $(".nuevoCambioEfectivo").number(true,2);

    
         
         var efectivo = e.target.value;

         var cambio = Number(efectivo) - Number($('#TotalVentaNuevo').val());
         e.target.parentElement.parentElement.parentElement.children[1].children[0].children[0].value = cambio;
        
        


        //  var  nuevoCambioEfectivo =

       
    
    }
    else if (e.target.classList.contains('nuevoCodigoTransaccion')){

        MetodosListar()




    }

    else if (e.target.classList.contains('Cliente')){



    }

    
  
//modifcar cantidad
   else if (!e.target.classList.contains('nuevoImpuestoVenta')  ){



       
      

    var cantidad = e.target.parentElement.parentElement.children[1].children[0].value;

    

 
    
    var precioUnidad =  e.target.parentElement.parentElement.children[2].children[0].children[0].getAttribute('precioInicial');


    var Enstock = e.target.parentElement.parentElement.children[1].children[0].getAttribute("cantAtrib");

    var StockIncial = e.target.parentElement.parentElement.children[1].children[0].getAttribute("StockInicial");
 

    var precioFinal = cantidad * precioUnidad;
    
    
    e.target.parentElement.parentElement.children[2].children[0].children[0].value = precioFinal;
    
    $(".nuevoPrecioProducto").number(true,2);
    

  
    
    
   

    

   
    

    var nuevoStock = parseInt(Enstock) - parseInt(cantidad); 
//     restoSuma= 0;
// }
//     else if(cantidadTempResta > parseInt(cantidad) - restoResta ){
//         cantidadTempResta = parseInt(cantidad);

    

//         var nuevoStock = parseInt(Enstock) + restoResta;
//         resto= 0;


//     }



    
    console.log("este es el nuevo stock", nuevoStock);
    e.target.parentElement.parentElement.children[1].children[0].setAttribute("nuevostock", nuevoStock); 
  
        if ( parseInt(nuevoStock) < 0){
        
        precioUnTemp = precioUnidad;

        swal({
            title: "Sin Stock",
            text: "El valor ingresado supera a lo disponible en Stock",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })

          e.target.parentElement.parentElement.children[1].children[0].value = 1;
          e.target.parentElement.parentElement.children[2].children[0].children[0].value = precioUnTemp ;
          e.target.parentElement.parentElement.children[1].children[0].setAttribute("cantAtrib", StockIncial);
          e.target.parentElement.parentElement.children[1].children[0].setAttribute("StockInicial",StockIncial)
          cantidadTemp = 0;

    }

   
    TotalSumaPrecios();

    impuestoAgregar();
    productosListar();
  


}
});






function 
impuestoAgregar(){
  var impuesto =  21;
  var TotalPrecio = $("#TotalVentaNuevo").attr("total");

  var ImpuestoPrecio = Number(TotalPrecio * impuesto / 100);

  var totalConImpuesto =  Number(ImpuestoPrecio) + Number(TotalPrecio);

  $("#TotalVentaNuevo").val(totalConImpuesto);
  $("#totalVenta").val(totalConImpuesto);
  $(".nuevoImpuestoVenta").val(ImpuestoPrecio);

  $("#nuevoImpuestoPrecio").val(ImpuestoPrecio);

 
  $("#nuevoPrecioNeto").val(TotalPrecio);
}

//al cambiar valor entrada impueto se ejecuta funcion





//seleccionar metodo de pago


$(".ventaFormulario").on("change", "input.nuevoValorEfectivo",function(){

  

})


// listar ttodo los productos
//se ejecuta al sumar, al calclar impuesto,etc

function productosListar(){
    var productosLista = [];
    var descripcion =$(".agregarProducto");//alamaceba todos  los input con esta clase
    var cantidad = $(".nuevoCantidadProducto");
   


    var precio = $(".nuevoPrecioProducto");

    for (var i=0 ; i < descripcion.length; i++){
        console.log(descripcion)
        productosLista.push({"id":$(descripcion[i]).attr("ProductoId"),
                            "descripcion":$(descripcion[i]).val(),
                            "cantidad" : $(cantidad[i]).val(),
                            "stock":$(cantidad[i]).attr("nuevostock"),
                            "precio": $(precio[i]).attr("precioInicial"),
                            "total": $(precio[i]).val(),
                            "metodo_pago": $(".TipoDePago").val()
    

                        
                        
                        });
                        
    }

    console.log(JSON.stringify(productosLista));
    

  //campo hidden en la vista ventas
   
    $("#listaProductos").val(JSON.stringify(productosLista));
  


}


//LISTAR METODO PAGO

function MetodosListar(){
    var listaMetodos  = "";


    
    if($(".TipoDePago").val() == "Efectivo"){

        $("#listaMetodoPago").val("Efectivo");
        productosListar();
    }else{
        $("#listaMetodoPago").val($(".TipoDePago").val()+"-"+$(".nuevoCodigoTransaccion").val() );
        productosListar();
    }

}


                              


$("#TotalVentaNuevo").number(true,2);
$(".nuevoImpuestoVenta").number(true,2);
        $("#nuevoTotalVenta").number(true,2);