<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema gestión ventas</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- jQuery -->

<script src="vistas/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Sweet Alert -->
<script src="vistas/dist/sweetAlert/sweetalert.min.js"></script>

<!-- icheck -->
<link rel="stylesheet" href="vistas/dist/plugins/icheck/icheck.js">

<!-- number-->
<link rel="stylesheet" href="https://opensource.teamdf.com/number/jquery.number.js">



 <!-- DataTables -->


 
 <link rel="stylesheet" href="vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.min.js"></script>




<!-- AdminLTE for demo purposes -->
<script src="vistas/dist/js/demo.js"></script>
<script src="vistas/plugins/chart.js/Chart.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/js/pages/dashboard3.js"></script>
</head>

<!-- <body class="hold-transition sidebar-mini layout-fixed login-page "> -->
<!-- Site wrapper -->


<?php


  if(isset($_SESSION["iniciarSesion"])  && $_SESSION["iniciarSesion"] == "ok"){
    
    echo '<body class="sidebar-mini layout-fixed sidebar-collapse  ">';
    echo '<div class="wrapper">';
    include "modulos/header.php";
    include "modulos/sidebar.php";
    
    if(isset($_GET["ruta"])){

      if($_GET["ruta"]=="inicio" || $_GET["ruta"]=="usuarios" || $_GET["ruta"]=="categorias" || $_GET["ruta"]=="ProductosVista" || $_GET["ruta"]=="ClientesVista" || $_GET["ruta"]=="ventas" || $_GET["ruta"]=="nueva-venta" || $_GET["ruta"]=="reportes" || $_GET["ruta"]=="salir" || $_GET["ruta"] == "contacto" || $_GET["ruta"] == "VentaEditar" || $_GET["ruta"] == "analisis"){ //ruta httacces
        include "modulos/".$_GET["ruta"].".php";
      } else{
        include "modulos/404.php"; //modulo de error
      }
    }

    include "modulos/footer.php";
    echo '<div>';

  } else {

    if($_GET["ruta"]=="login"){
      echo '<body class="hold-transition sidebar-mini layout-fixed login-page ">';
      include "modulos/login.php";
      echo '<div>';
    }else{
      
      if($_GET["ruta"]!=""){

        echo '<body class="sidebar-mini layout-fixed sidebar-collapse ">';
        echo '<div class="wrapper">';
        include "modulos/header.php";
        include "modulos/sidebar.php";

        if($_GET["ruta"]=="inicio" || $_GET["ruta"]=="contacto"){ //ruta httacces
          include "modulos/".$_GET["ruta"].".php";
        } else{
          include "modulos/sinLogear.php"; //modulo de error
        }

      }else{
        echo '<body class="sidebar-mini layout-fixed sidebar-collapse  ">';
        echo '<div class="wrapper">';
        include "modulos/header.php";
        include "modulos/sidebar.php";
        include "modulos/inicio.php";
      }

      include "modulos/footer.php";
      echo '<div>';
    }
  }


?>

  
 

<script src="vistas/js/template.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/categorias.js"></script>
<script src="vistas/js/clientes.js"></script>
<script src="vistas/js/productos.js"></script>
<script src="vistas/js/ventas.js"></script>

<!-- javascript jtables -->

<script src="vistas/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


<!-- InputMask -->
<script src="vistas/plugins/moment/moment.min.js"></script>
<script src="vistas/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>


<!-- jqueryNumber -->
<script src="vistas/plugins/jqueryNumber/jqueryNumber.min.js"></script>

</body>
</html>
