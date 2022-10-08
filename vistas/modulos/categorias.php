 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <h1>Administrar Categorias
     

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

          if ($_SESSION["perfil"] == "Administrador"){

            echo '
            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
              Agregar categoria
            </button>
            ';

          }else{

            echo '
            <button class="btn btn-outline-primary btnAdvertenciaNoAdministrador">
              Agregar categoria
            </button>
            ';

          }

          ?>


        <!-- -->
        <div class="card-body">
         
             <table class="table table-bordered table-striped display nowrap tablas " style="width:100%">    <!-- plugin data tables -->
              <thead>
                <tr>
                  <th style="width:10px">#</th>
                  <th>Categoria</th>
                  <th>Acciones</th>

                </tr>
                </thead>
                <tbody>
                  <?php
                    $nomColumna = null;
                    $val= null;
                    $catResp = CatControlador::VerCategoriasControlador($nomColumna,$val);
                    // var_dump($categorias);

                    foreach ($catResp as $key => $value){
                            echo '<tr>
                            <td>'.($key+1).'</td>
                            <td class="text-uppercase">'.$value["categoria"].'</td>
                            <td>
                            <div class="btn-group">';

                              if ($_SESSION["perfil"] == "Administrador"){

                                echo '
        
                                <button class="btn btn-outline-secondary CategoriaEditarBtn"
                                CatId="'.$value["id"].'"
                                data-toggle="modal" data-target="#modalEditarCategoria"><i class="fas fa-pencil-alt" CatId="'.$value["id"].'"></i></button>
                                <button class="btn btn-outline-secondary  CategoriaEliminarBtn" CatId="'.$value["id"].'"><i class="fas fa-trash"></i></button>
                                ';
                              }else{
                                
                                echo '
        
                                <button class="btn btn-outline-secondary btnAdvertenciaNoAdministrador"><i class="fas fa-pencil-alt"></i></button>
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

  <div class="modal" id="modalAgregarCategoria">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="post">


      <!-- Modal Header -->
      <div class="modal-header" >
        <h4 class="modal-title">Agregar categoria</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="card-body">
          <!-- categoria -->
            <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                      <input type="text" class="form-control input-lg" name="CategoriaNueva" placeholder="Ingresar categoría" required>
                </div>
            </div>
         
         </div>
      


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default float-left"  data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar categoría</button>
      </div>
      <?php

        $CrearCateg = new CatControlador();
        $CrearCateg -> NuevaCatControlador();

      ?>

      </form>

    </div>
  </div>
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