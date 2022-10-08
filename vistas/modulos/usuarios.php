 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <h1>Administrar Usuarios
     

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
            
            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
              Agregar usuario
            </button>
            ';

            }else{
              echo '
            
              <button class="btn btn-outline-primary btnAdvertenciaNoAdministrador">
                Agregar usuario
              </button>
              ';
            }
          ?>


        <!-- -->
        <div class="card-body">
       
             <table class="table table-bordered table-striped display nowrap tablas " cellspacing="0"  id="tablax" style="width:100%">    <!-- plugin data tables -->
              <thead>
                <tr>
                  <th style="width:10px">#</th>
                  <th>Nombre Usuario</th>
                  <th>Usuario</th>
                  <th>Foto</th>
                  <th>Perfil</th>
                  <th>Estado</th>
                  <th>Último login</th>
                  <th>Acciones</th>

                </tr>
                <tbody>

                <?php

                  $item = null;
                  $valor = null;
                  $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item,$valor);/**devuelve todo el array de usuarios de la base de datos */

                  foreach ($usuarios as $key => $value){
                    echo ' 
                          <tr>
                          <td>1</td>
                          <td>'.$value["nombre"].'</td>
                          <td>'.$value["usuario"].'</td>';

                          if($value["foto"] !=""){
                              echo ' <td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px" alt=""></td>';

                          }else{
                              echo ' <td><img src="vistas/imagenes/usuarios/user1.jpg" class="img-thumbnail" width="40px" alt=""></td>';
                                  
                            

                          }

                         


                          echo '<td>'.$value["perfil"].'</td>';

                          if ($_SESSION["perfil"] == "Administrador"){

                            if($value["estado"] != 0){
                              echo '<td><button class="btn btn-primary btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';
                            } else { /**atributo id usuario igual id devuelto base datos*/
                              echo '<td><button class="btn btn-outline-secondary btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';
                            }
                          }else{
                            if($value["estado"] != 0){
                              echo '<td><button class="btn btn-primary btn-xs disabled" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';
                            } else { /**atributo id usuario igual id devuelto base datos*/
                              echo '<td><button class="btn btn-outline-secondary btn-xs disabled" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';
                            }


                          }

                            echo '<td>'.$value["ultimo_login"].'</td>';

                            if ($_SESSION["perfil"] == "Administrador"){

                              echo '
                              <td>
                                <div class="btn-group">
                                      
                                    <button class="btn btn-outline-secondary btnEditarUsuario" idUsuario="'.$value["id"].'"  data-toggle="modal" data-target="#modalEditarUsuario"><i class="fas fa-pencil-alt"></i></button>

                                    <button class="btn btn-outline-secondary btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fas fa-trash"></i></button>

                                </div>

                              </td>';
                            }else{
                              echo '
                              <td>
                                <div class="btn-group">
                                      
                                    <button class="btn-outline-secondary  btnAdvertenciaNoAdministrador"><i class="fas fa-pencil-alt"></i></button>

                                    <button class="btn-outline-secondary  btnAdvertenciaNoAdministrador"><i class="fas fa-trash"></i></button>

                                </div>

                              </td>';

                            }

                        echo '</tr>';


                  }
                
                
                ?>
               

                </tbody>

              </thead>

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

  <div class="modal" id="modalAgregarUsuario">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">


      <!-- Modal Header -->
      <div class="modal-header" >
        <h4 class="modal-title">Agregar usuario</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="card-body">
          <!-- nombre -->
            <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                      <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>
                </div>
            </div>
            <!-- entrada usuario -->
            <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock"></i></span>
                      <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock"></i></span>
                      <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>
                </div>
            </div>

            <!-- entrada perfil -->

          
            <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-friends"></i></span>
                    <select class="form-control input-lg" name="nuevoPerfil" id="">
                          <option value="">Seleccionar Perfil</option>
                          <option value="Administrador">Administrador</option>
                          <option value="Especial">Especial</option>
                          <option value="Vendedor">Vendedor</option>

                    </select>
                </div>
            </div>


            <!-- SUBIR FOTO -->
            
            <div class="form-group">
                <div class="panel">

                      SUBIR FOTO
                </div>
                <input type="file" class="nuevaFoto" name="nuevaFoto">
                <p class="help-block">Peso máximo de la foto 2 MB</p>
                <img src="vistas/imagenes/usuarios/default/anonimo.png" class="img-thumbnail previsualizar" width="100px" alt="">
            </div>
         </div>
      


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default float-left"  data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar usuario</button>
      </div>
        <?php
        
          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();
          


        ?>


      </form>

    </div>
  </div>
</div>



<!-- mODAL EDITAR usuario -->




<div class="modal" id="modalEditarUsuario">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">


      <!-- Modal Header -->
      <div class="modal-header" >
        <h4 class="modal-title">Editar usuario</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="card-body">
          <!-- nombre -->
            <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                      <input type="text" class="form-control input-lg" name="editarNombre" id="editarNombre" value=""  required>
                </div>
            </div>
            <!-- entrada usuario -->
            <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock"></i></span>
                      <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock"></i></span>
                      <input type="text" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña" >
                      <!-- CAMPO PARA IMPRIMIR CONTRASEÑA QUE VIENE DE LA BASE DE DATOS -->
                      <input type="hidden" id="passwordActual" name="passwordActual"></input> 
                </div>
            </div>

            <!-- entrada perfil -->

          
            <div class="form-group">
                <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-friends"></i></span>
                    <select class="form-control input-lg" name="editarPerfil" id="">
                          <option value="" id="editarPerfil">Seleccionar Perfil</option>
                          <option value="Administrador">Administrador</option>
                          <option value="Especial">Especial</option>
                          <option value="Vendedor">Vendedor</option>

                    </select>
                </div>
            </div>


            <!-- SUBIR FOTO -->
            
            <div class="form-group">
                <div class="panel">

                      SUBIR FOTO
                </div>
                <input type="file" class="nuevaFoto" name="editarFoto">
                <p class="help-block">Peso máximo de la foto 2 MB</p>
                <img src="vistas/imagenes/usuarios/default/anonimo.png" class="img-thumbnail previsualizar" width="100px" alt="">
                  <!-- CAMPO oculto PARA IMPRIMIR foto QUE VIENE DE LA BASE DE DATOS en caso de edición -->
                <input type="hidden" name="fotoActual" id="fotoActual">
            </div>
         </div>
      


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default float-left"  data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Modificar usuario</button>
      </div>
     
     
          <?php
        
          $editarUsuario = new ControladorUsuarios();
          $editarUsuario -> ctrEditarUsuario();
          


        ?>


      </form>

    </div>
  </div>
</div>


<?php
  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario(); 


?>