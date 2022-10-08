// activacion data table

// $(".tablas").DataTable();

$(document).ready(function() {
    $('.tablas').DataTable({

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


       
        ,responsive: true

     
    });


    // input mask

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()


    $(".btnAdvertenciaNoAdministrador").on('click', function(){
        
        swal({
            title: "Usted no posee permisos para realizar la acción",
            text: "Por favor contáctese con el administrador del sistema",
            type:"error",
            confirmButtonText:"¡Cerrar!"

        })

    })


} );

