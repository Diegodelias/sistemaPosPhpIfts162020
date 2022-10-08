 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <h1>Administrar Productos
     

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

            <?php 

                  if ($_SESSION["perfil"]=="Administrador"){
                        echo '
                        
                        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#AgregarProductoModal">
                              Agregar producto
                        </button>

                        ';
                  }else{
                        echo '
                        
                        <button class="btn btn-outline-primary btnAdvertenciaNoAdministrador">
                              Agregar producto
                        </button>

                        ';
                  }

            ?>

        <!-- -->
        <div class="card-body">
              
   

              <!-- <table class="table table-bordered table-striped display nowrap tablas " style="width:100%">  -->
              <table class="table table-bordered  dt-responsive display nowrap example" id="example" style="width:100%"> 
              <!-- plugin data tables -->
                    <thead>
                <tr>
              
                  <th style="width:10px">#</th>
                  <th>Foto</th>
                  <th>Codigo producto</th>
                  <th>Descripción</th>
                  <th>Categoría</th>
                  <th>Stock</th>
                  <th>Precio Compra</th>
                  <th>Precio Venta</th>
                  <th>Agregado</th>
                  <th>Acciones</th>

                  



                </tr>
                </thead>
                <!-- <tbody>
                <?php
                // $nomColumna = null;
                // $val = null;


                // $prod = ProductosControlador::VerProductosControlador($nomColumna,$val);

                // var_dump($productos);
                foreach ($prod as $key => $value){
                    echo '
                    <tr>

                    <td>'.($key+1).'</td>
                    <td><img src="vistas/imagenes/productos/default.png" class="img-thumbnail" width="40px"></td>
                    <td>'.($value["codigo"]).'</td>
                    <td>'.($value["descripcion"]).'</td>';

                    $nomColumna = "id";
                    $val = $value['id_categoria'];
    
                    $catResp = CatControlador::VerCategoriasControlador($nomColumna,$val);

                   echo ' <td>'.$catResp["categoria"].'</td>
                    <td>'.$value["stock"].'</td>
                    <td>'.$value["precio_compra"].'</td>
                    <td>'.$value["precio_venta"].'</td>
                    <td>'.$value["fecha"].'</td>
                  
                    <td>
                  <div class="btn-group">
    
                          <button class="btn btn-outline-secondary "><i class="fas fa-pencil-alt" ></i></button>
                          <button class="btn btn-outline-secondary" ><i class="fas fa-trash"></i></button>

   
                   </div>
                    </td>



                </tr>

                    ';

                }

                ?> 
                 
               
                </tbody> -->

            

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













  <!-- Modal EDITAR categoria prducto-->


 <!-- Modal -->
<div>
 <div class="modal" id="ProductoEditarModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">


      <!-- Modal Header -->
      <div class="modal-header" >
        <h4 class="modal-title">Editar Producto</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="card-body">
          <!-- codigo -->

          <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-clipboard-list"></i></span>
                    <select class="form-control input-lg" name="CategoriaEditar"  readonly required>
                          <option id="CategoriaEditar" value=""></option>

                 
                       

                    </select>
                </div>
            </div>
        
            <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-code"></i></span>
                      <input type="text" class="form-control input-lg" name="CodigoEditar" id="CodigoEditar"  readonly required>
                </div>
            </div>

       <!-- descripcion -->
            <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="	far fa-file-alt"></i></span>
                      <input type="text" class="form-control input-lg" id="EditarDescripcion" name="EditarDescripcion"  required>
                </div>
            </div>
         

            <!-- <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-clipboard-list"></i></span>
                    <select class="form-control input-lg" name="CategoriaNueva" id="">
                          <option value="">Seleccionar Categoria</option>
                          <option value="Taladros">Taladros</option>
                          <option value="Andamios">Andamios</option>
                          <option value="Equipos para constucción">Equipos para construccion </option>

                    </select>
                </div>
            </div> -->
            <div class="form-group">

            

             <!-- STOCK -->

            <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class=" fa fa-check"></i></span>
                      <input type="number" class="form-control input-lg" id="StockEditar" name="StockEditar"  min="0"  required>
                </div>


              </div>




             <!-- preico compra -->
            <div class="form-group row">
            <div class="col-sm-6">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-arrow-up"></i></span>
                      <input type="number" class="form-control input-lg" name="PrecioCompraEditar"
                      id="PrecioCompraEditar"
                      min="0"  required>

                  
                </div>

            </div>
            
                <div class="col-sm-6">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-arrow-down"></i></span>
                      <input type="number" class="form-control input-lg" id="VentaPrecioEditar" name="VentaPrecioEditar" min="0" readonly required >
                </div>
             
                </div>

                </div>
                <br>


                <!-- CHECKBOX PARA PORCENTAJE -->
                <div class="form-group row">
                      <div class="col-sm-6 ">
                              <div class="form-group">
                              <div class="icheck-primary d-inline ">

                              


                              </div>
                                  <label >
                                  <input type="checkbox" class="minimal porcentaje"  id="checkboxPrimary2" onclick="CheckNocheck(this)" checked>
                                        Usar porcentaje


                                  </label>
                              
                            
                            </div>
                        </div>
                

<!-- 
              eNTRAD PORCENTAJE -->
                  
                  <div class="col-sm-6">
                
                        <div class="input-group">

                        <input type="number" class="form-control input-lg PorcentajeNuevo"   min="0" value="40" required>
                        <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-percent"></i></span>
                        </div>

                        </div>


                  </div>


          
         

              
                 <!-- Precio de venta -->


            <div class="form-group">
                <div class="panel">

                      SUBIR FOTO PRODUCTO
                </div>
                <input type="file" class="nuevaFotoProducto" name="FotoProductoEditar">
                <p class="help-block">Peso máximo de la foto 2 MB</p>
                <img src="vistas/imagenes/productos/default.png" class="img-thumbnail previsualizacion" width="100px" alt="">

                <input type="hidden" name="imagenSinEditar" id="imagenSinEditar">
            </div>
         
         
         </div>
      


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default float-left"  data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
      </div>
  

      </form>

      <?php
          $ProductoEditar =  new  ProductosControlador();
          $ProductoEditar-> ProductosEditarContr();


        ?>
    

    </div>
  </div>
</div>

</div>

<div>
<div class="modal" id="AgregarProductoModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">


      <!-- Modal Header -->
      <div class="modal-header" >
        <h4 class="modal-title">Nuevo producto</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="card-body">
          <!-- codigo -->

          <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-clipboard-list"></i></span>
                    <select class="form-control input-lg" name="CategoriaNueva" id="CategoriaNueva" required>
                          <option value="">Seleccionar Categoria</option>

                          <?php
                          $nomColumna = null;
                                $val = null;
    
                                $catResp = CatControlador::VerCategoriasControlador($nomColumna,$val);
                                foreach($catResp as $key =>$valor){
                                    echo ' <option value="'.$valor["id"].'">'.$valor["categoria"].'</option>';

                                }
                          ?>
<!-- 
                          <option value="Taladros">Taladros</option>
                          <option value="Andamios">Andamios</option>
                          <option value="Equipos para constucción">Equipos para construccion </option> -->

                    </select>
                </div>
            </div>
        
            <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-code"></i></span>
                      <input type="text" class="form-control input-lg" name="CodigoNuevo" id="CodigoNuevo" placeholder="Ingresar código" readonly required>
                </div>
            </div>

       <!-- descripcion -->
            <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="	far fa-file-alt"></i></span>
                      <input type="text" class="form-control input-lg" name="DescripcionNueva" min="0" placeholder="Escribir descripción" required>
                </div>
            </div>
         

      
            <div class="form-group">

            

             <!-- STOCK -->

            <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class=" fa fa-check"></i></span>
                      <input type="number" class="form-control input-lg" name="StockNuevo"  min="0" placeholder="Stock" required>
                </div>


              </div>




             <!-- preico compra -->
            <div class="form-group row">
            <div class="col-sm-6">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-arrow-up"></i></span>
                      <input type="number" class="form-control input-lg" name="PrecioCompraNuevo"
                      id="PrecioCompraNuevo"
                      min="0" step="any" placeholder="Precio Compra" required>

                  
                </div>

            </div>
            
                <div class="col-sm-6">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-arrow-down"></i></span>
                      <input type="number" class="form-control input-lg" id="VentaPrecioNuevo" name="VentaPrecioNuevo" min="0" step="any" placeholder="Precio de venta" >
                </div>
             
                </div>

                </div>
                <br>


                <!-- CHECKBOX PARA PORCENTAJE -->
                <div class="form-group row">
                      <div class="col-sm-6 ">
                              <div class="form-group">
                              <div class="icheck-primary d-inline ">

                              


                              </div>
                                  <label >
                                  <input type="checkbox" class="minimal porcentaje" id="checkboxPrimary1"  onclick="CheckNocheck(this)" checked>
                                        Usar porcentaje


                                  </label>
                              
                            
                            </div>
                        </div>
                

<!-- 
              eNTRAD PORCENTAJE -->
                  
                  <div class="col-sm-6">
                
                        <div class="input-group">

                        <input type="number" class="form-control input-lg PorcentajeNuevo"   min="0" value="40" required>
                        <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-percent"></i></span>
                        </div>

                        </div>


                  </div>


          
         

              
                 <!-- Precio de venta -->


            <div class="form-group">
                <div class="panel">

                      SUBIR FOTO PRODUCTO
                </div>
                <input type="file" class="nuevaFotoProducto" name="nuevaFotoProducto">
                <p class="help-block">Peso máximo de la foto 2 MB</p>
                <img src="vistas/imagenes/productos/default.png" class="img-thumbnail previsualizacion" width="100px" alt="">
            </div>
         
         
         </div>
      


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default float-left"  data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar producto</button>
      </div>
  

      </form>

      <?php
          $nuevoProducto = new  ProductosControlador();
          $nuevoProducto -> NuevoProductoControlador();

        ?>

    </div>
  </div>
</div>

</div>

<?php

$BorrarProducto =  new  ProductosControlador();
$BorrarProducto-> EliminarProductoControlador();

          ?>