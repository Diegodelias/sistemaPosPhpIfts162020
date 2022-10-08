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
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">

          <!-- <h3 class="card-title">Title</h3> -->
          <button class="btn btn-outline-primary" data-toggle="modal" data-target="#AgregarClienteModal">
            Agregar cliente
          </button>
          <br>
          <br>
   


        <!-- -->
        <!-- <div class="card-body"> -->
        <div class="table-responsive">
             <table class="table table-bordered table-striped display nowrap tablas" cellspacing="0"  id="tablax" style="width:100%">    <!-- plugin data tables -->
              <thead>
                <tr>
                  <th style="width:10px">#</th>
                  <th>Nombre</th>
                  <th>DNI</th>
                  <th>Email</th>
                  <th>Telefono</th>
                  <th>Dirección</th>
               
                  <th>Compras Totales</th>
                  <th>última compra</th>
                  <th>Fecha alta del cliente</th>
                  <th>Acciones</th>



                </tr>
                </thead>
                <tbody>
                            
                          <?php
                                $nomColumna = null;
                                $val= null;

                                $clientesObj = ClientesControlador::ClientesVerContr($nomColumna,$val);

                            
                            foreach ($clientesObj  as $key => $value) {
                                echo ' 

                                <tr>
            
                                    <td>'.($key+1).'</td>
                                    <td>'.$value['nombre'].'</td>
                                    <td>'.$value['documento'].'</td>
                                    <td>'.$value["email"].'</td>
                                    <td>'.$value["telefono"].'</td>
                                    <td>'.$value["direccion"].'</td>
                                   
                                    <td>'.$value["compras"].'</td>
                                    <td>'.$value["ultima_compra"].'</td>
                                    <td>'.$value["fecha"].'</td>
                                    <td>
                                  <div class="btn-group">
                    
                                    <button class="btn btn-outline-secondary EditarClienteBtn " data-toggle="modal" data-target="#EditarClienteModal"  ClienteId="'.$value["id"].'"><i class="fas fa-pencil-alt" ></i></button>';

                                    if($_SESSION["perfil"] == "Administrador"){

                                      echo '
                                 
                                      <button class="btn btn-outline-secondary EliminarBtn"  ClienteId="'.$value["id"].'" ><i class="fas fa-trash"></i></button>
                                      
                                      ';
                                    }else{
                                      echo '
                                 
                                      <button class="btn btn-outline-secondary btnAdvertenciaNoAdministrador"><i class="fas fa-trash"></i></button>
                                      
                                      ';
                                    }
                   
                                   '</div>
                                    </td>
            
            
            
                                </tr>';

                            }


                          ?>


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


  <!-- Modal -->

  <div class="modal" id="AgregarClienteModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="post">


      <!-- Modal Header -->
      <div class="modal-header" >
        <h4 class="modal-title">Nuevo cliente</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="card-body">
          <!-- cliente -->
            <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                      <input type="text" class="form-control input-lg" name="ClienteNuevo" placeholder="Ingresar nombre cliente" required>
                </div>
            </div>

       <!-- dni -->
            <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                      <input type="number" class="form-control input-lg" name="DniNuevo" min="0" placeholder="Ingresar DNI" required>
                </div>
            </div>
         



             <!-- eMAIL -->
            <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                      <input type="email" class="form-control input-lg" name="EmailNuevo"  placeholder="Ingresar correo electrónico" required>
                </div>
            </div>


                 <!-- telefono -->
                 <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                      <input type="text" class="form-control input-lg" name="TelNuevo"  placeholder="Ingresar teléfono" data-inputmask='"mask": "(99) 9999-9999"' data-mask>

                  
                </div>
            </div>

              
                 <!-- DIRECCION -->

            <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker"></i></span>
                      <input type="text" class="form-control input-lg" name="DireNueva"  placeholder="Ingresar dirección"  required>
                </div>
            </div>

        <!-- fecha de nacimiento -->
            <!-- <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar"></i></span>
                      <input type="text" class="form-control input-lg" name="FechaNacimiento"  placeholder="Ingresar fecha nacimiento" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                </div>
            </div>
          -->
         
         
         </div>
      


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default float-left"  data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar Cliente</button>
      </div>
  
      <?php

       $nuevoCliente = new ClientesControlador();
        $nuevoCliente -> nuevoClienteContr();
     



      ?>


      </form>

 

    </div>
  </div>
</div>











  <!-- Modal EDITAR cliente -->

  <div class="modal" id="EditarClienteModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="post">


      <!-- Modal Header -->
      <div class="modal-header" >
        <h4 class="modal-title">Editar datos Cliente</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="card-body">
                            <!-- cliente -->
            <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                      <input type="text" class="form-control " name="ClienteEditar" 
                      id ="ClienteEditar" required>
                      <input type="hidden"  id="ClientId"  name="ClientId"  name="ClientId" 
                      >
                </div>
            </div>

       <!-- dni -->
            <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                      <input type="number" class="form-control " name="DniEditar"  id="DniEditar" min="0"  required>
                </div>
            </div>
         



             <!-- eMAIL -->
            <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                      <input type="email" class="form-control " name="EmailEditar"
                      id= "EmailEditar"  required>
                </div>
            </div>


                 <!-- telefono -->
                 <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                      <input type="text" class="form-control " name="TelEditar"  id="TelEditar" data-inputmask='"mask": "(99) 9999-9999"' data-mask>

                  
                </div>
            </div>

              
                 <!-- DIRECCION -->

            <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker"></i></span>
                      <input type="text" class="form-control " name="DireEditar" id="DireEditar"   required>
                </div>
            </div>

        <!-- fecha de nacimiento -->
            <!-- <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar"></i></span>
                      <input type="text" class="form-control input-lg" name="FechaNacimientoEditar"  id="FechaNacimientoEditar" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                </div>
            </div>
          -->
         
         </div>
      


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default float-left"  data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
      </div>

     
      
  

      </form>
        <?php
        $ClienteEditar = new ClientesControlador();
        $ClienteEditar -> ClientesEditarContr();



        ?>
 



    </div>
  </div>
</div>
<?php
    $ClienteEliminar = new ClientesControlador();
    $ClienteEliminar -> EliminarClienteControlador();


?>

