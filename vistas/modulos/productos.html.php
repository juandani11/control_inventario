<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Productos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item active">Administrar Productos</li>
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">

                    Agregar producto

                </button>
            </div>
            <div class="card-body">
                <table id="tablas" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width:10px">#</th>
                        <th>Imagen</th>
                        <th>Codigo</th>
                        <th>Descripcion</th>
                        <th>Categoria</th>
                        <th>Stock</th>
                        <th>Precio de Compra</th>
                        <th>Precio de Venta</th>
                        <th>Agregado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>1</td>
                        <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                        <td>0001</td>
                        <td>Lorem ipsum dolor sit amet</td>
                        <td>Lorem Ipsum</td>
                        <td>20</td>
                        <td>$ 5.00</td>
                        <td>$ 10.00</td>
                        <td>2017-12-11 12:05:32</td>
                        <td>

                            <div class="btn-group">

                                <button class="btn btn-warning"><i class="fas fa-edit"></i></button>

                                <button class="btn btn-danger"><i class="fa fa-times"></i></button>

                            </div>

                        </td>

                    </tr>

                    <tr>
                        <td>1</td>
                        <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                        <td>0001</td>
                        <td>Lorem ipsum dolor sit amet</td>
                        <td>Lorem Ipsum</td>
                        <td>20</td>
                        <td>$ 5.00</td>
                        <td>$ 10.00</td>
                        <td>2017-12-11 12:05:32</td>
                        <td>

                            <div class="btn-group">

                                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                                <button class="btn btn-danger"><i class="fa fa-times"></i></button>

                            </div>

                        </td>

                    </tr>

                    <tr>
                        <td>1</td>
                        <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                        <td>0001</td>
                        <td>Lorem ipsum dolor sit amet</td>
                        <td>Lorem Ipsum</td>
                        <td>20</td>
                        <td>$ 5.00</td>
                        <td>$ 10.00</td>
                        <td>2017-12-11 12:05:32</td>
                        <td>

                            <div class="btn-group">

                                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

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
MODAL AGREGAR USUARIO
======================================-->

<div class="modal fade" id="modalAgregarProducto">
    <div class="modal-dialog">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-content bg-primary">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <!-- ENTRADA PARA EL CODIGO -->

                        <div class="form-group">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fab fa-codepen"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nuevoCodigo" placeholder="Ingresar codigo" required>
                            </div>

                        </div>

                        <!-- ENTRADA PARA LA DESCRIPCION -->

                        <div class="form-group">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nuevaDescripcion" placeholder="Ingresar descripcion" required>
                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR CATEGORIA -->

                        <div class="form-group">

                            <div class="input-group mb-3">

                                <span class="input-group-text"><i class="fas fa-list"></i></span>

                                <select class="form-control input-lg" name="nuevoCategoria">

                                    <option value="">Selecionar categoria</option>

                                    <option value="Barra">Barra</option>

                                    <option value="Bajante">Bajante</option>

                                    <option value="Calibradores">Calibradores</option>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA STOCK -->

                        <div class="form-group">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-cubes"></i></span>
                                </div>
                                <input type="number" class="form-control" name="nuevoStock" min="0" placeholder="Stock" required>
                            </div>

                        </div>



                        <div class="form-group row">
                            <!-- ENTRADA PARA PRECIO COMPRA -->
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                    </div>
                                    <input type="number" class="form-control" name="nuevoPrecioCompra" min="0" placeholder="Precio de Compra" required>
                                </div>
                            </div>

                           <!-- ENTRADA PARA PRECIO VENTA -->

                            <div class="col-6">
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                </div>
                                <input type="number" class="form-control" name="nuevoPrecioVenta" min="0" placeholder="Precio de Venta" required>
                              </div>

                            </div>
                            <div class="row">
                                <div class="col-1"></div>
                                <!-- CHECKBOX PARA PORCENTAJE -->

                                <div class="col-5">

                                    <div class="form-group">

                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input porcentaje" type="checkbox" id="customCheckbox1" value="option1">
                                            <label for="customCheckbox1" class="custom-control-label">Utilizar procentaje</label>
                                        </div>

                                    </div>

                                </div>

                                <!-- ENTRADA PARA PORCENTAJE -->

                                <div class="col-4" >
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control nuevoPorcentaje" min="0" value="40" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ENTRADA PARA SUBIR FOTO -->

                        <div class="form-group">
                            <label for="exampleInputFile">Subir IMAGEN</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="nuevaImagen" name="nuevaImagen">
                                    <label class="custom-file-label" for="nuevaImagen">Seleccionar Imagen</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Max 2 MB</span>
                                </div>
                            </div>
                            <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="100px">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-light">Guardar Producto</button>
                </div>


            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <!-- /.modal-dialog -->
</div>
