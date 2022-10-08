 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <h1>Crear venta
     

           </h1>
         
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-tachometer-alt"></i>Inicio</a></li>
              <li class="breadcrumb-item active">Administrar ventas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-5 col-xs-12">
          <div class="card card-outline card-success">
                <div class="card-header with-border"></div>
                <form method="post">
                <div class="card-body">
               
                    <div class="card">
                      <!-- entrada vendedod -->



                      <div class="form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" ><i class="fa fa-user"></i></span>
                          <input type="text" class="form-control" id="nuevoVendedor" name="nuevoVendedor" value="Usuario Administrador">


                        </div>

                      </div>

                        <!-- Entrada del cliente -->
                      <div class="form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" ><i class="fa fa-key"></i></span>
                          <input type="text" class="form-control" id="nuevoVendedor" name="nuevoVendedor" value="122323">
                        

                        </div>

                      </div>

                      <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <label class="input-group-text" ><i class="fa fa-users"></i></label>

                          </div>
                          <select class="custom-select" id="nuevoVendedor" name="nuevoVendedor" value="Usuario Administrador">
                            <option value="">Seleccionar cliente</option>
                         
                          </select>


                          <div class="input-group-append">
                          <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalAgregarVenta" data-dismiss="modal">Agregar cliente</button>
                          </div>
                      


                        

                      </div>

                        </div>

                      <!-- Entrada cliente -->


                      <div class="form-row">
                            <div class="form-group col-md-6">
                            
                              <div class="input-group-prepend">
                              <span class="input-group-text" > <button type="button" class="btn btn-danger btn-xs"> <i class="fa fa-times"></i></button>
                               </span>

                               <input type="text" class="form-control" id="nuevoVendedor" name="nuevoVendedor" value="Descripcion de producto">

                             </div>
                       </div>
                           
                       
                       <div class="form-group col-md-3">
                            
                                <input type="number" class="form-control" id="nuevoCantidadProducto" name="nuevoCantidadProducto" min="1" placeholder="0" required>
                       </div>
                            <div class="form-group col-md-3">
                            
                                  <div class="input-group-append ">
                                    <input type="number" class="form-control" id="nuevoCantidadProducto" name="nuevoCantidadProducto" min="1" placeholder="0" required>
                                    <span class="input-group-text"><i class="ion ion-social-usd"></i></span>



                              </div>
 


                            </div>
                          </div>


                      </div>


                    </div>



                    <button type="button" class="btn btn-default  d-lg-none ">Agregar producto</button>

                      <div class="row justify-content-end">
                           
                                <div class="form-group col-md-6 ">
                                      <table class="table">
                                        <thead>
                                            <tr>
                                              <th>Impuesto</th>
                                              <th>Total</th>

                                            </tr>

                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td style="width: 50%">

                                            <div class="input-group">
                                                
                                                <input type="number" class="form-control" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0" required>
                                                <span class="input-group-text" ><i class="fa fa-percent"></i></span>


                                              </div>
                                            
                                            </td>







                                            <td style="width: 50%">

                                                  <div class="input-group">
                                                      
                                                      <input type="number" class="form-control" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="00000" required>
                                                     
                                                      <span class="input-group-text" ><i class="ion ion-social-usd"></i></span>


                                                    </div>

                                                  </td>

                                            
                                          </tr>


                                        </tbody>


                                      </table>

                                </div>
                                </div>


                                <hr>
                              <!-- metodo de pago -->
                              <!-- <div class="form-row">
                            <div class="form-group col-md-6"> -->

                            <div class="form-row">
                                    <div class="form-group col-md-6">

                                    <div class="form-group">

                                              <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                                              <option value="">Seleccione método de pago</option>
                                              <option value="Efectivo">Efectivo</option>
                                              <option value="TC">Tarjeta Crédito</option>
                                              <option value="TD">Tarjeta Débito</option>                  
                                              </select>    




                                    </div>
                                    

                                    
                                  </div>

                                  <div class="form-group col-md-6">

                                      


                                              <div class="input-group-append ">
                                                   <input type="text" class="form-control" id="nuevoCodigoTransaccion" name="nuevoCodigoTransaccion" min="1" placeholder="0" required>
                                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>



                                              </div>

                                                    



                            </div>



                            
                           


                 


               


                </div>
                

                <div class="card-footer  d-flex justify-content-end" >
                
                  <button type="submit" class="btn btn-primary">Guardar cambios</button>


                </div>

                </form>
          
          </div>
       
        </div>

        <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
          <div  class="card card-outline card-warning">
             
             <div class="card-body">
               <table class="table table-bordered table-striped dt-responsive tablas">
                      <thead>     
                      <tr>
                                  <th style="width: 10px">#</th>
                                  <th>Imagen</th> 
                                  <th>Código</th>
                                  <th>Descripcion</th>
                                  <th>Descripcion</th>
                                  
                                  <th>Stock</th>
                                  <th>Acciones</th>
                      </tr>
                        </thead>  
                        <tbody>
                              <tr>
                                  <td>1.</td>
                                  <td><img src="vistas/imagenes/productos/default.png" class="img-thumnail" width="40px"></td>
                                  <td>00123</td>
                                  <td>Lorem ipsum dolor sit amet </td>
                                  <td>Lorem Ipsum</td>
                                  <td>20</td>
                                  <td>
                                      <div class="btn-group">
                                          <button type="button" class="btn btn-primary">Agregar</button>

                                      </div>
                                  </td>



                              </tr>

                        </tbody>

               </table>




             </div>

          </div>



        </div>


      </div>



    </section>
    <!-- /.content -->

  </div>


  
  <div class="modal" id="modalAgregarVenta">
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







