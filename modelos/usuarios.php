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
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-tachometer-alt"></i>Inicio</a></li>
              <li class="breadcrumb-item active">Administrar usuarios</li>
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
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
            Agregar usuario
          </button>

   


        <!-- -->
        <div class="card-body">
       
             <table class="table table-bordered table-striped display nowrap tablas " style="width:100%">    <!-- plugin data tables -->
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
                  <tr>
                    <td>1</td>
                    <td>Usuario Administrador</td>
                    <td>admin</td>
                    <td><img src="vistas/imagenes/usuarios/user1.jpg" class="img-thumbnail" width="40px" alt=""></td>
                    <td>Administrador</td>
                    <td><button class="btn btn-success btn-xs ">Activado</button></td>
                    <td>2017-12-11 12:05:32</td>

                    <td>
                    <div class="btn-group">

                        <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger"><i class="fas fa-times"></i></button>


                    </div>

                    </td>
                  </tr>

                  <tr>
                    <td>1</td>
                    <td>Usuario Administrador</td>
                    <td>admin</td>
                    <td><img src="vistas/imagenes/usuarios/user1.jpg" class="img-thumbnail" width="40px" alt=""></td>
                    <td>Administrador</td>
                    <td><button class="btn btn-success btn-xs ">Activado</button></td>
                    <td>2017-12-11 12:05:32</td>

                    <td>
                    <div class="btn-group">

                        <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>


                        <!-- eliminar usuario -->
                        <button class="btn btn-danger btnEliminarUsuario"><i class="fas fa-times"></i></button>


                    </div>

                    </td>
                  </tr>

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
                      <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario"  
                        id="nuevoUsuario" required>
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
                <input type="file" id="nuevaFoto" name="nuevaFoto">
                <p class="help-block">Peso máximo de la foto 200 MB</p>
                <img src="vistas/imagenes/usuarios/default/anonimo.png" class="img-thumbnail" width="100px" alt="">
            </div>
         </div>
      


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default float-left"  data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary" id="btn_GuarU">Guardar usuario</button>
      </div>
        <?php
        
          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();
          


        ?>


      </form>

    </div>
  </div>
</div>