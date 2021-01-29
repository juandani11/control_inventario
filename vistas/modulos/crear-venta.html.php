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
                    <form role="form" method="post">
                        <div class="card-body">

                            <!--=====================================
                            ENTRADA DEL VENDEDOR
                            ======================================-->

                            <div class="form-group">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="nuevoVendedor" name="nuevoVendedor" value="Usuario Administrador" readonly>
                                </div>

                            </div>

                            <!--=====================================
                            ENTRADA DEL VENDEDOR
                            ======================================-->

                            <div class="form-group">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="number" class="form-control" id="nuevaVenta" name="nuevaVenta" value="10002343" readonly>
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

                                    <select type="text" class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>

                                        <option value="">Seleccionar cliente</option>

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

                                <!-- Descripción del producto -->

                                <div class="col-8" style="padding-right:0px">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-danger">Action</button>
                                        </div>
                                        <!-- /btn-group -->
                                        <input type="text" class="form-control" id="agregarProducto" name="agregarProducto"
                                               placeholder="Descripción del producto" required>
                                    </div>

                                </div>

                                <!-- Cantidad del producto -->

                                <div class="col-2">

                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" placeholder="0" required>

                                    </div>

                                </div>

                                <!-- Precio del producto -->

                                <div class="col-2" style="padding-left:0px">

                                    <div class="input-group">

                                        <input type="text" class="form-control" id="nuevoPrecioProducto" name="nuevoPrecioProducto" placeholder="000000" readonly required>
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!--=====================================
                            BOTÓN PARA AGREGAR PRODUCTO
                            ======================================-->

                            <button type="button" class="btn btn-default hidden-lg">Agregar producto</button>

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

                                                    <input type="text" class="form-control" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0" required>
                                                    <div class="input-group-append">
                                                        <div class="input-group-text"><i class="fas fa-percentage"></i></div>
                                                    </div>

                                                </div>

                                            </td>

                                            <td style="width: 50%">

                                                <div class="input-group">

                                                    <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                                                    <input type="number" min="1" class="form-control" id="nuevoTotalVenta" name="nuevoTotalVenta" placeholder="00000" readonly required>


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

                                        <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                                            <option value="">Seleccione método de pago</option>
                                            <option value="efectivo">Efectivo</option>
                                            <option value="tarjetaCredito">Tarjeta Crédito</option>
                                            <option value="tarjetaDebito">Tarjeta Débito</option>

                                        </select>

                                    </div>
                                </div>
                                <div class="col-6" style="padding-left:0px">

                                    <div class="input-group">

                                        <input type="text" class="form-control" id="nuevoCodigoTransaccion" name="nuevoCodigoTransaccion"placeholder="Código transacción" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <br>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary pull-right">Guardar venta</button>
                        </div>
                    </form>
                    <!-- /.card-body -->
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

                        <table id="tablas" class="table table-bordered table-striped">

                            <thead>

                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Imagen</th>
                                <th>Código</th>
                                <th>Descripcion</th>
                                <th>Stock</th>
                                <th>Acciones</th>
                            </tr>

                            </thead>

                            <tbody>

                            <tr>
                                <td>1.</td>
                                <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                                <td>00123</td>
                                <td>Lorem ipsum dolor sit amet</td>
                                <td>20</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary">Agregar</button>
                                    </div>
                                </td>
                            </tr>

                            </tbody>

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