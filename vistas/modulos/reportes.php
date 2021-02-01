<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Reportes de movimientos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item active">Reportes de movimientos</li>
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

                <button type="button" class="btn btn-default" id="daterange-btn2">
                    <i class="far fa-calendar-alt"></i> Rango Fecha
                    <i class="fas fa-caret-down"></i>
                </button>

                <div class="box-tool float-right">
                    <?php

                    if(isset($_GET["fechaInicial"])){

                        echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte&fechaInicial='.$_GET["fechaInicial"].'&fechaFinal='.$_GET["fechaFinal"].'">';

                    }else{

                        echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte">';

                    }

                    ?>

                    <button class="btn btn-success" style="margin-top:5px">Descargar reporte en Excel</button>

                    </a>
               </div>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-12">

                        <?php

                        include "reportes/grafico-ventas.php";

                        ?>

                    </div>

                    <div class="col-md-6 col-xs-12">

                        <?php

                        include "reportes/productos-mas-vendidos.php";

                        ?>

                    </div>

                    <div class="col-md-6 col-xs-12">

                        <?php

                        include "reportes/vendedores.php";

                        ?>

                    </div>

                    <div class="col-md-6 col-xs-12">

                        <?php

                        include "reportes/compradores.php";

                        ?>

                    </div>

                </div>
            </div>

        </div>

    </section>

</div>