<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear Movimiento</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Crear Movimiento</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-lg-5 col-xs-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Cabecera Del Movimiento</h3>
                    </div>

                    <form role="form" method="post" class="formularioVenta">

                        <div class="card-body">

                            <?php

                            $item = "id";
                            $valor = $_GET["idVenta"];

                            $venta = ControladorVentas::ctrMostrarVentas($item, $valor);

                            $itemUsuario = "id";
                            $valorUsuario = $venta["id_vendedor"];

                            $vendedor = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                            $itemCliente = "id";
                            $valorCliente = $venta["id_cliente"];

                            $cliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                            $porcentajeImpuesto = $venta["impuesto"] * 100 / $venta["neto"];


                            ?>

                            <!--=====================================
                            ENTRADA DEL VENDEDOR
                            ======================================-->

                            <div class="form-group">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $vendedor["nombre"]; ?>" readonly>
                                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">
                                </div>

                            </div>

                            <!--=====================================
                            ENTRADA DEL CODIGO
                            ======================================-->

                            <div class="form-group">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>

                                    <input type="text" class="form-control" id="nuevaVenta" name="editarVenta" value="<?php echo $venta["codigo"]; ?>" readonly>

                                </div>

                            </div>

                            <!--=====================================
                            ENTRADA DEL CLIENTE
                            ======================================-->

                            <div class="form-group">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-users"></i></span>
                                    </div>

                                    <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>

                                        <option value="<?php echo $cliente["id"]; ?>"><?php echo $cliente["nombre"]; ?></option>

                                        <?php

                                        $item = null;
                                        $valor = null;

                                        $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                                        foreach ($categorias as $key => $value) {

                                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                                        }

                                        ?>

                                    </select>

                                    <span class="input-group-append">
                                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar!</button>
                                    </span>
                                </div>

                            </div>

                            <!--=====================================
                            ENTRADA PARA AGREGAR PRODUCTO
                            ============        ==========================-->

                            <div class="form-group row nuevoProducto">

                                <?php

                                $listaProducto = json_decode($venta["productos"], true);

                                foreach ($listaProducto as $key => $value) {

                                    $item = "id";
                                    $valor = $value["id"];

                                    $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

                                    $stockAntiguo = $respuesta["stock"] + $value["cantidad"];

                                    echo '<div class="row" style="padding:5px 15px">
            
                        <div class="col-7" style="padding-right:0px">
            
                          <div class="input-group">
                            
                            <div class="input-group-prepend">
                            
                                <button type="button" class="btn btn-danger quitarProducto" idProducto="'.$value["id"].'">X</button>
                            
                            </div>
                            
                            <input type="text" class="form-control nuevaDescripcionProducto" idProducto="'.$value["id"].'" name="agregarProducto" value="'.$value["descripcion"].'" required readonly>
                          
                          </div>

                        </div>

                        <div class="col-2">
              
                          <input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="'.$value["cantidad"].'" stock="'.$stockAntiguo.'" nuevoStock="'.$value["stock"].'" required>

                        </div>

                        <div class="col-3 ingresoPrecio" style="padding-left:0px">

                          <div class="input-group">
                   
                            <input type="text" class="form-control nuevoPrecioProducto" precioReal="'.$respuesta["precio_venta"].'" name="nuevoPrecioProducto" value="'.$value["total"].'" readonly required>
   
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
                            </div>
                          </div>
               
                        </div>

                      </div>';
                                }


                                ?>

                            </div>

                            <input type="hidden" id="listaProductos" name="listaProductos">

                            <!--=====================================
                            BOTÓN PARA AGREGAR PRODUCTO
                            ======================================-->

                            <!-- <button type="button" class="btn btn-default hidden-lg btnAgregarProducto">Agregar producto</button>
                            -->
                            <hr>

                            <div class="row">

                                <!--=====================================
                                ENTRADA IMPUESTOS Y TOTAL
                                ======================================-->
                                <div class="col-4"></div>
                                <div class="col-8 pull-right">

                                    <table class="table">

                                        <thead>

                                        <tr>
                                            <th>Impuesto</th>
                                            <th>Total</th>
                                        </tr>

                                        </thead>

                                        <tbody>

                                        <tr>

                                            <td style="width: 50%">

                                                <div class="input-group">

                                                    <input type="number" class="form-control input-lg" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" value="<?php echo $porcentajeImpuesto; ?>" required>
                                                    <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" value="<?php echo $venta["impuesto"]; ?>" required>
                                                    <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" value="<?php echo $venta["neto"]; ?>" required>
                                                    <div class="input-group-append">
                                                        <div class="input-group-text"><i class="fas fa-percentage"></i></div>
                                                    </div>

                                                </div>

                                            </td>

                                            <td style="width: 50%">

                                                <div class="input-group">

                                                    <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                                                    <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="<?php echo $venta["neto"]; ?>" value="<?php echo $venta["total"]; ?>" readonly required>

                                                    <input type="hidden" name="totalVenta" value="<?php echo $venta["total"]; ?>" id="totalVenta">

                                                </div>

                                            </td>

                                        </tr>

                                        </tbody>

                                    </table>

                                </div>
                            </div>

                            <!--=====================================
                            ENTRADA MÉTODO DE PAGO
                             ======================================-->

                            <div class="form-group row">
                                <div class="col-6" style="padding-right:0px">

                                    <div class="input-group">

                                        <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago">
                                            <option value="Efectivo">Efectivo</option>
                                            <option value="TC">Tarjeta Crédito</option>
                                            <option value="TD">Tarjeta Débito</option>

                                        </select>

                                    </div>
                                </div>

                                <div class="cajasMetodoPago"></div>

                                <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">

                            </div>

                            <br>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary pull-right">Guardar movimiento</button>
                        </div>
                    </form>

                    <?php

                    $editarVenta = new ControladorVentas();
                    $editarVenta -> ctrEditarVenta();

                    ?>

                </div>
            </div>

            <!--=====================================
            LA TABLA DE PRODUCTOS
            ======================================-->

            <div class="col-lg-7 col-xs-12">

                <div class="card card-warning">

                    <div class="card-header">
                        Lista Productos
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered table-striped tablaVentas">

                            <thead>

                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Código</th>
                                <th>Descripcion</th>
                                <th>Categoria</th>
                                <th>Stock</th>
                                <th>Acciones</th>
                            </tr>

                            </thead>

                        </table>
                    </div>
                </div>

            </div>



        </div>


    </section>
    <!-- /.content -->
</div>


<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

<div class="modal fade" id="modalAgregarCliente">
    <div class="modal-dialog">
        <form role="form" method="post">
            <div class="modal-content bg-primary">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Clientes</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nuevoCliente" placeholder="Ingresar cliente" required>
                            </div>

                        </div>
                        <!-- ENTRADA PARA EL DOCUMENTO -->

                        <div class="form-group">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                </div>
                                <input type="number" min="0" class="form-control" name="nuevoDocumentoId"
                                       placeholder="Ingresar documento" required>
                            </div>

                        </div>
                        <!-- ENTRADA PARA EL EMAIL -->

                        <div class="form-group">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" name="nuevoEmail" placeholder="Ingresar email"
                                       required>
                            </div>

                        </div>

                        <!-- ENTRADA PARA EL TELEFONO -->

                        <div class="form-group">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone-square-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nuevoTelefono" placeholder="Ingresar telefono"
                                       data-inputmask='"mask": "(9) 999-9999"' data-mask required>
                            </div>

                        </div>

                        <!-- ENTRADA PARA EL DIRECCION -->

                        <div class="form-group">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nuevaDireccion" placeholder="Ingresar direccion"
                                       required>
                            </div>

                        </div>

                        <!-- ENTRADA PARA EL FECHA DE NACIMIENTO -->

                        <div class="form-group">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento"
                                       data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask required>
                            </div>

                        </div>

                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-light">Guardar Cliente</button>
                </div>


            </div>
            <!-- /.modal-content -->
        </form>
        <?php

        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearCliente();

        ?>
    </div>
    <!-- /.modal-dialog -->
</div>