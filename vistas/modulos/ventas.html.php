 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <h1>Administrar Clientes
     

           </h1>
         
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-tachometer-alt"></i>Inicio</a></li>
              <li class="breadcrumb-item active">Administrar categorias</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">

          <!-- <h3 class="card-title">Title</h3> -->
          <a href="nueva-venta">
          <button class="btn btn-primary" >
            Agregar venta
          </button>
          
          </a>
   


        <!-- -->
        <div class="card-body">
         
             <table class="table table-bordered table-striped display nowrap tablas " style="width:100%">    <!-- plugin data tables -->
              <thead>
                <tr>
                  <th style="width:10px">#</th>
                  <th>Número Factura</th>
                  <th>Cliente</th>
                  <th>Vendedor</th>
                  <th>Forma de pago</th>
                  <th>Neto</th>
                  <th>Total</th>
                  <th>Acciones</th>



                </tr>
                </thead>
                <tbody>
                    <tr>

                        <td>1</td>
                        <td>1000123</td>
                        <td>Juancito</td>
                        <td>Julio xxx</td>
                        <td>TC-12412425346</td>
                        <td>$ 1,000.000</td>
                        <td>2020-09-15 14:04:36</td>
                        
                        <td>
                      <div class="btn-group">
        
                            <button class="btn btn-info "><i class="fas fa-print" ></i></button>
                            <button class="btn btn-danger" ><i class="fas fa-times"></i></button>

       
                       </div>
                        </td>



                    </tr>

                </tbody>

            

             </table>

        </div>
       

        <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
         </aside>
 
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

  </div>












  <!-- Modal EDITAR categoria -->

  <div class="modal" id="modalEditarCategoria">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="post">


      <!-- Modal Header -->
      <div class="modal-header" >
        <h4 class="modal-title">Editar categoria</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="card-body">
          <!-- categoria -->
            <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                      <input type="text" class="form-control input-lg" name="CategEditar"  
                      id="CategEditar" required>

                   <!-- crea input oculto id categoria para modificar por jquery  -->
                      <input type="hidden"  name="CatId" 
                      id="CatId" required>
                </div>
            </div>
         
         </div>
      


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default float-left"  data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
      </div>

      <?php

              $Editar = new CatControlador();
              $Editar -> EditarCategoriaControlador();



          ?>
      
  

      </form>

    </div>
  </div>
</div>
<?php
    $Eliminar = new CatControlador();
    $Eliminar -> EliminarCategoriaControlador();

?>