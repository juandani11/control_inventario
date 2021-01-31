<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ventas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item active">Ventas</li>
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
                <a href="crear-venta">
                    <button class="btn btn-primary" >

                        Agregar Movimiento

                    </button>
                </a>

            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped tablas">
                    <thead>

                    <tr>

                        <th style="width:10px">#</th>
                        <th>Código factura</th>
                        <th>Cliente</th>
                        <th>Vendedor</th>
                        <th>Forma de pago</th>
                        <th>Neto</th>
                        <th>Total</th>
                        <th>Fecha</th>
                        <th>Acciones</th>

                    </tr>

                    </thead>

                    <tbody>

                    <?php

                    $item = null;
                    $valor = null;

                    $respuesta = ControladorVentas::ctrMostrarVentas($item, $valor);

                    foreach ($respuesta as $key => $value) {


                        echo '<tr>

                  <td>'.($key+1).'</td>

                  <td>'.$value["codigo"].'</td>';

                        $itemCliente = "id";
                        $valorCliente = $value["id_cliente"];

                        $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                        echo '<td>'.$respuestaCliente["nombre"].'</td>';

                        $itemUsuario = "id";
                        $valorUsuario = $value["id_vendedor"];

                        $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                        echo '<td>'.$respuestaUsuario["nombre"].'</td>

                  <td>'.$value["metodo_pago"].'</td>

                  <td>$ '.number_format($value["neto"],2).'</td>

                  <td>$ '.number_format($value["total"],2).'</td>

                  <td>'.$value["fecha"].'</td>

                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-info"><i class="fas fa-print"></i></button>

                      <button class="btn btn-warning btnEditarVenta" idVenta="'.$value["id"].'"><i class="fas fa-edit"></i></button>

                      <button class="btn btn-danger btnEliminarVenta" idVenta="'.$value["id"].'"><i class="fas fa-trash"></i></button>

                    </div>  

                  </td>

                </tr>';
                    }

                    ?>

                    </tbody>

                </table>

                <?php

                $eliminarVenta = new ControladorVentas();
                $eliminarVenta -> ctrEliminarVenta();

                ?>

            </div>
            <!-- /.card-body -->

            <!-- /.card -->

    </section>

</div>


