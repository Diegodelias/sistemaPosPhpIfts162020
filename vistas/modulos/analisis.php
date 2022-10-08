<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Análisis de Datos</h1>
        </div>
      </div>
    </div>
  </section>
  
  <section class="content">
    <div class="row">

        <?php
            $nomColumna = null;
            $val= null;

            $ventas = VentasControlador::sumarTotalVentas();
            $resultadoCategoria = CatControlador::VerCategoriasControlador($nomColumna,$val);
            $categorias = count($resultadoCategoria);
            $resultadoCliente = ClientesControlador::ClientesVerContr($nomColumna,$val);
            $clientes = count($resultadoCliente);
            $resultadoProductos = ProductosControlador::VerProductosControlador($nomColumna,$val);
            $productos = count($resultadoProductos);
        ?>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-outline-secondary">
              <div class="inner">
                <h3> <?php echo number_format($ventas["total"],2); ?> </h3>

                <p>Ventas</p>
              </div>
              <div class="icon">
                <i class="ion ion-social-usd"></i>
              </div>
              <a href="ventas" class="small-box-footer" style="color: black" >Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-outline-secondary">
              <div class="inner">
                <h3><?php echo number_format($categorias); ?> </h3>

                <p>Categorias</p>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
              <a href="categorias" class="small-box-footer" style="color: black" >Más información  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-outline-secondary">
              <div class="inner">
                <h3><?php echo number_format($clientes); ?></h3>

                <p>Clientes</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="ClientesVista" class="small-box-footer" style="color: black">Más información  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-outline-secondary">
              <div class="inner">
                <h3><?php echo number_format($productos); ?> </h3>

                <p>Productos</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-cart"></i>
              </div>

              <?php

                if ($_SESSION["perfil"]=="Administrador"){
                  
                  echo '
                  <a href="ProductosVista" class="small-box-footer" style="color: black" >Más información  <i class="fas fa-arrow-circle-right"></i></a>
                  ';

                }

              ?>

              
            </div>
        </div>

    
    </div>


    <?php

        $nomColumna = "ventas";
        $orden = "DESC";

        $resultadoProductosOrdenados = ProductosControlador::VerProductosControladorOrdenados($nomColumna,$orden);
        $colores = array("red","green","yellow","gray","purple","blue","cyan","black","orange","pink");
        $cantidadTotalVentas = ProductosControlador::sumarCantidadVentas();
        
    ?>

    <div class="row">
      <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Más vendidos</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-7">
                        <div class="chart-responsive">
                            <canvas id="pieChart" height="150"></canvas>
                        </div>
                        <!-- ./chart-responsive -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-5">
                        <ul class="chart-legend clearfix">

                         
                        <?php
                                for($i=0; $i < 10; $i++){
                                    
                                    echo '<li><i class="far fa-circle text-'.$colores[$i].'"></i> '.$resultadoProductosOrdenados[$i]["descripcion"].'</li>';


                                }
                            ?>




                            
                        </ul>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer bg-white p-0">
                    <ul class="nav nav-pills flex-column">
                        
                        <?php
                            for($i=0; $i < 5; $i++){
                                echo '
                                    <li class="nav-item">
                                        <a href="ProductosVista" class="nav-link">
                                        '.$resultadoProductosOrdenados[$i]["descripcion"].'
                                            <span class="float-right text-'.$colores[$i].'"><i class="fas fa-arrow-down text-sm"></i>
                                            '. ceil(($resultadoProductosOrdenados[$i]["ventas"]*100)/ $cantidadTotalVentas["total"])   .' %
                                            </span>
                                        </a>
                                    </li>
                                
                                ';
                            }
                        
                        ?>
                        
                    </ul>
                </div>
                <!-- /.footer -->
            </div>

            <script>
            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
                var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
                var pieData        = {
                
                    labels: [

                        <?php
                            for($i=0; $i < 10; $i++){
                                
                                echo "'".$resultadoProductosOrdenados[$i]["descripcion"]."',";

                            }
                        ?>
                    ],

                    datasets: [
                        {
                        
                            data: [

                                <?php
                                    for($i=0; $i < 10; $i++){
                                
                                        echo "'".ceil(($resultadoProductosOrdenados[$i]["ventas"]*100)/ $cantidadTotalVentas["total"])."',";

                                    }
                                ?>
                            ],
                            
                            
                            backgroundColor : [
                                
                                <?php
                                    for($i=0; $i < 10; $i++){
                                
                                        echo "'".$colores[$i]."',";

                                    }
                                ?>
                            ],
                        }
                    ]
                }



                var pieOptions     = {
                legend: {
                    display: false
                }
                }
                //Create pie or douhnut chart
                // You can switch between pie and douhnut using the method below.
                var pieChart = new Chart(pieChartCanvas, {
                type: 'doughnut',
                data: pieData,
                options: pieOptions      
                })

            //-----------------
            //- END PIE CHART -
            //-----------------
            </script>
        </div>
      <div class="col-lg-2"></div>  
    </div>
    

  </section>
</div>