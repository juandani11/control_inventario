<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Categorias o Sub Grupos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item active">Administrar Categorias o Sub Grupos</li>
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">

                    Agregar categorias o sub grupo

                </button>
            </div>
            <div class="card-body">
                <table id="tablas" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width:10px">#</th>
                        <th>Categorias</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>1</td>

                        <td>EQUIPOS</td>
                        <td>

                            <div class="btn-group">

                                <button class="btn btn-warning"><i class="fas fa-edit"></i></button>

                                <button class="btn btn-danger"><i class="fa fa-times"></i></button>

                            </div>

                        </td>

                    </tr>

                    <tr>
                        <td>1</td>
                        <td>EQUIPOS</td>
                        <td>

                            <div class="btn-group">

                                <button class="btn btn-warning"><i class="fas fa-edit"></i></button>

                                <button class="btn btn-danger"><i class="fa fa-times"></i></button>

                            </div>

                        </td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>EQUIPOS</td>
                        <td>

                            <div class="btn-group">

                                <button class="btn btn-warning"><i class="fas fa-edit"></i></button>

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

<div class="modal fade" id="modalAgregarCategoria">
    <div class="modal-dialog">
        <form role="form" method="post">
            <div class="modal-content bg-primary">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Categoria o Sub Grupo</h4>
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
                                    <span class="input-group-text"><i class="fas fa-th-list"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nuevaCategoria" placeholder="Ingresar categorias o sub grupo" required>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-light">Guardar Categoria o Sub Grupo</button>
                </div>


            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <!-- /.modal-dialog -->
</div>
