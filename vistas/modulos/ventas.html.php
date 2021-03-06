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

                        Agregar Venta

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

                    <tr>

                        <td>1</td>

                        <td>1000123</td>

                        <td>Juan Villegas</td>

                        <td>Julio Gómez</td>

                        <td>TC-12412425346</td>

                        <td>$ 1,000.00</td>

                        <td>$ 1,190.00</td>

                        <td>2017-12-11 12:05:32</td>

                        <td>

                            <div class="btn-group">

                                <button class="btn btn-info"><i class="fa fa-print"></i></button>

                                <button class="btn btn-danger"><i class="fa fa-times"></i></button>

                            </div>

                        </td>

                    </tr>

                    </tbody>

                </table>
            </div>
            <!-- /.card-body -->

            <!-- /.card -->

    </section>

</div>

<!--=====================================
MODAL AGREGAR CATEGORIA
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
                                <input type="text" class="form-control" name="nuevaCliente" placeholder="Ingresar cliente" required>
                            </div>

                        </div>
                        <!-- ENTRADA PARA EL DOCUMENTO -->

                        <div class="form-group">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                </div>
                                <input type="number" min="0" class="form-control" name="nuevaDocumentoId"
                                       placeholder="Ingresar documento" required>
                            </div>

                        </div>
                        <!-- ENTRADA PARA EL EMAIL -->

                        <div class="form-group">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" name="nuevaEmail" placeholder="Ingresar email"
                                       required>
                            </div>

                        </div>

                        <!-- ENTRADA PARA EL TELEFONO -->

                        <div class="form-group">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone-square-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nuevaTelefono" placeholder="Ingresar telefono"
                                       data-inputmask='"mask": "(9) 999-99999"' data-mask required>
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
                                       data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask required>
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
    </div>
    <!-- /.modal-dialog -->
</div>
