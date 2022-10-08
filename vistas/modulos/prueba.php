
    <div class="content-wrapper">

    <?php
     
     echo '<script>
     swal({
         text: "Esto es una prueba de sweet alert ",
             icon: "success",
            buttons: true,
            dangerMode: false,
                
        }).then((result)=>{
            if(result){
                window.location = "prueba";
                     }
                      }) ;

         </script>';


    ?>

    </div>

     </div>