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
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-5 col-xs-12">
          <div class="card card-outline card-primary">
                <div class="card-header with-border"></div>
                <form method="post" class="ventaFormulario">
                <div class="card-body">
               
                    <div class="card">
                      <!-- entrada vendedod -->



                      <div class="form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" ><i class="fa fa-user"></i></span>
                          <input type="text" class="form-control" id="nuevoVendedor"  value="<?php echo $_SESSION["nombre"];?>">

                          <!-- input oculto para almacenar id que tra de BD -->
                          <input type="hidden" name="VendedorId" value="<?php echo $_SESSION["id"];?>">
                        
                        


                        </div>

                      </div>

                        <!-- Entrada vendedor -->
                      <div class="form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" ><i class="fa fa-key"></i></span>
                          <?php
                          $val= null;
                          $nomColumna = null;

                          $ventas = VentasControlador::verVentasControl($nomColumna,$val);

                          if(!$ventas){
                            //si no hay ventas mustra numero ventas por default en 10001
                              echo '  <input type="text" class="form-control" id="VentaNum" name="VentaNum" value="10001">';


                          } else {
                              foreach($ventas as $key => $valor) {



                              }
                              $codigo =  $valor["codigo"] +1 ;

                              echo '  <input type="text" class="form-control" id="VentaNum" name="VentaNum" value="'.$codigo.'">';




                          }


                          ?>

                        

                        </div>

                      </div>

                      <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <label class="input-group-text" ><i class="fa fa-users"></i></label>

                          </div>
                          <select class="custom-select Cliente" name="Cliente" value="Usuario Administrador" required>
                            <option value="">Seleccionar cliente</option>

                            <?php

                            $nomcolumna = null;
                            $val = null;
                            
                            $categorias =  ClientesControlador::ClientesVerContr($nomcolumna,$val);

                            
                            foreach  ($categorias as $key =>  $val){

                              echo '<option value="'.$val["id"].'">'.$val["nombre"].'</option>';

      
                            }









                          ?>

                         
                          </select>


                          <div class="input-group-append">
                          <button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#modalAgregarVenta" data-dismiss="modal">Agregar cliente</button>
                          </div>
                      


                        

                      </div>

                        </div>

                      <!-- Entrada cliente -->
                      <div class="ProductoNuevo">

                     

                      </div>
                          <!--  -->

                      <input type="hidden" id="listaProductos" name="listaProductos">
                     

                      </div>


                    </div>



                    <button type="button" class="btn btn-default  d-lg-none  btnProductoAgregar">Agregar producto</button>
                      <!-- este cacho comentado se genera desde javascript -->
                      <div class="row justify-content-end">
                           
                                <div class="form-group col-md-10 ">
                                      <table class="table">
                                        <thead>
                                            <tr>
                                              <th>Subtotal</th>
                                              <th>Impuesto</th>
                                              <th>Total</th>

                                            </tr>

                                        </thead>
                                        <tbody>
                                          <tr>

                                            <td style="width: 33%">
                                              <div class="input-group">
                                                <span class="input-group-text" ><i class="ion ion-social-usd"></i></span>
                                                <input type="text" class="form-control input-lg" min="1" id="nuevoTotalVenta" name="nuevoTotalVenta" placeholder="00000" readonly required>
                                              </div>
                                            </td>


                                            <td style="width: 33%">
                                              <div class="input-group">
                                                <input type="text" class="form-control nuevoImpuestoVenta"  name="nuevoImpuestoVenta" placeholder="0" readonly required>
                                                <!-- imputs ocultos para envio a la base de datos -->
                                                <input type="hidden" id="nuevoImpuestoPrecio" name="nuevoImpuestoPrecio" required>
                                                <input type="hidden" id="nuevoPrecioNeto" name="nuevoPrecioNeto" required>
                                                <span class="input-group-text" ><i class="fa fa-percent"></i></span>


                                              </div>
                                            </td>


                                            <td style="width: 33%">

                                              <div class="input-group">
                                                  
                                                  <input type="text" class="form-control" id="TotalVentaNuevo" name="TotalVentaNuevo" total="" placeholder="00000" readonly required>
                                                  <span class="input-group-text" ><i class="ion ion-social-usd"></i></span>
                                                  <input type="hidden" name="totalVenta" id="totalVenta">

                                              </div>

                                            </td>

                                            
                                          </tr>


                                        </tbody>


                                      </table>

                                </div>
                                </div>


                                <hr>
                     

                            <div class="d-flex flex-row justify-content-between">
                                    <div class="form-group col-md-6">
   
                                    <div class="form-group">
<!--
                                              <select class="form-control TipoDePago" name="TipoDePago" >
                                              <option value="">Seleccione método de pago</option>
                                              <option value="Efectivo">Efectivo</option>
                                              <option value="TC">Tarjeta Crédito</option>
                                              <option value="TD">Tarjeta Débito</option>                  
                                              </select>    
-->



                                    </div>
                                    

                                    
                                  </div>

                                  <div class=" tipoPagoBox">


                                  </div>

                                  <input type="hidden" id="listaMetodoPago"    name="listaMetodoPago">

                                  <!-- <div class="form-group col-md-6">

                                      


                                              <div class="input-group-append ">
                                                   <input type="text" class="form-control" id="nuevoCodigoTransaccion" name="nuevoCodigoTransaccion" min="1" placeholder="0" required>
                                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>



                                              </div>

                                                    



                            </div> -->



                            
                           


                 


               


                </div>
                

                <div class="card-footer  d-flex justify-content-end" >
                
                  <button type="submit" class="btn btn-primary">Guardar cambios</button>


                </div>

                </form>

                <?php
                      
                      $crearVenta = new VentasControlador();
                      $crearVenta -> NuevaVentaControlador();
                    

                ?>
          
          </div>
       
        </div>

        <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
          <div  class="card card-outline card-primary">
             
             <div class="card-body">
               <table class="table table-bordered table-striped dt-responsive tablaVentas">
                      <thead>     
                      <tr>
                                  <th style="width: 10px">#</th>
                                  <th>Imagen</th> 
                                  <th>Código</th>
                                  <th>Descripcion</th>
                                  <th>Stock</>
                                  <th>Acciones</th>
                                 
                      </tr>
                        </thead>  
                        <!-- <tbody>
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

                        </tbody> -->


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







