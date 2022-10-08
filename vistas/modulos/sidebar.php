<aside class="main-sidebar elevation-4 sidebar-light-lightblue">
  <!-- Brand Logo -->
  <a href="inicio" class="brand-link">
     <img src="vistas/imagenes/template/logo.jpg" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> 
    <span class="brand-text font-weight-light">Vento</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <?php

          if($_SESSION["iniciarSesion"] != "ok"){
            
            echo '

            <li class="nav-item">
              <a href="inicio" class="nav-link">
                <i class="nav-icon fa fa-user"></i>
                <p>Inicio</p>
              </a>
            </li>
            ';
          }

        ?>

        

        <?php
        

        if($_SESSION["iniciarSesion"] == "ok"){
          
          echo '

          <li class="nav-item">
            <a href="usuarios" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>Usuarios</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="categorias" class=" nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>Categorías</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="analisis" class=" nav-link">
              <i class="nav-icon ion ion-pie-graph"></i>
              <p>Análisis</p>
            </a>
          </li>';


          if($_SESSION["perfil"]=="Administrador"){

            echo '
              <li class="nav-item">
                <a href="ProductosVista" class=" nav-link">
                  <i class=" nav-icon fab fa-product-hunt"></i>
                  <p>Productos</p>
                </a>
              </li>
          ';

          }
            
          
        
          echo '
          
           <li class="nav-item ">
            <a href="ClientesVista" class=" nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>Clientes</p>
            </a>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-list-ul"></i>
                <p>
                  Ventas
                  <i class="fas fa-angle-left right"></i>
                </p>
            </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="ventas" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Administrar ventas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="nueva-venta" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Crear venta</p>
                  </a>
                </li>

              </ul>
          </li>

          <li class="nav-item">
            <a href="inicio" class="nav-link">
              <i class="nav-icon fa fa-database"></i>
              <p>Repositorios</p>
            </a>
          </li>

        ';
        }

        ?>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-question-circle"></i>
              <p>
                Manual de Usuario
                <i class="fas fa-angle-left right"></i>
              </p>
          </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inicio</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categorias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Clientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ventas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contactos</p>
                </a>
              </li>
          
            </ul>
        </li>

        <li class="nav-item ">
          <a href="contacto" class=" nav-link">
            <i class="nav-icon fa fa-envelope"></i>
            <p>Contacto</p>
          </a>
        </li>









        <!-- <ul data-widget="treeview">
        <li>
          <a href="" class=" nav-link">
              <i class="nav-icon fa fa-list-ul"></i>
              <p>Ventas</p>
              <p class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              
              </p>
          </a>

          <ul data-widget="treeview">
              <li>
              <a href="">
                <i class="fa fa-circle-o"></i>
                <p>Admisnitrar Ventas</p>
              </a>
              </li>
          
          </ul>
        </li>
  
        </ul> -->

        <!-- hasta aca -->

        <!-- <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li>  -->

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
 
</aside>