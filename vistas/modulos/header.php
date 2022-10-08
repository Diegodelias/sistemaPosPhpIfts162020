


    <!-- barra de navegacio  -->

 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-light text-sm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="inicio" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="contacto" class="nav-link">Contacto</a>
      </li>
    </ul>

   




    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
  
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <div class="d-flex flex-row align-items-center " data-toggle="dropdown" href="#">
        
        <?php 
          if($_SESSION["foto"] != ""){

            echo '<img src="'.$_SESSION["foto"].'" class="rounded-circle" style="width:70px" alt="User Image">';
            echo '<span class="hidden-xs">'.$_SESSION["nombre"].'</span>';

          } else {

            echo '<img src="vistas/imagenes/usuarios/default/avatar.jpg" class="img-circle w-25" alt="User Image">';
            echo '<span class="hidden-xs">INGRESAR</span>';
          }

        
        ?>
          
      </div>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"></span>
          <div class="dropdown-divider"></div>
          
          <?php
            if(isset($_SESSION["iniciarSesion"])  && $_SESSION["iniciarSesion"] == "ok"){
              echo '<a href="salir" class="dropdown-item">
                      <i class="fas fa-user mr-2"></i> Salir
                   
                    </a>';
            } else {
              echo '<a href="login" class="dropdown-item">
                      <i class="fas fa-user mr-2"></i> Ingresar
              
                    </a>';
            }
          ?>



          <div class="dropdown-divider"></div>
          
           <!-- 
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>

          -->
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer"></a>
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li> -->
      
    </ul>
  
  </nav>



