<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Usuarios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item active">Administrar Usuarios</li>
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">

                    Agregar usuario

                </button>
            </div>
            <div class="card-body">
                <table id="tablas" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width:10px">#</th>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Foto</th>
                        <th>Perfil</th>
                        <th>Estado</th>
                        <th>Último login</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>1</td>
                        <td>Usuario Administrador</td>
                        <td>admin</td>
                        <td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                        <td>Administrador</td>
                        <td><button class="btn btn-success btn-xs">Activado</button></td>
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
                        <td>Usuario Administrador</td>
                        <td>admin</td>
                        <td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                        <td>Administrador</td>
                        <td><button class="btn btn-success btn-xs">Activado</button></td>
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
                        <td>Usuario Administrador</td>
                        <td>admin</td>
                        <td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                        <td>Administrador</td>
                        <td><button class="btn btn-danger btn-xs">Desactivado</button></td>
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

<div class="modal fade" id="modalAgregarUsuario">
    <div class="modal-dialog">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-content bg-primary">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Usuario</h4>
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
                                <input type="text" class="form-control" name="nuevoNombre" placeholder="Ingresar nombre" required>
                            </div>

                        </div>

                        <!-- ENTRADA PARA EL USUARIO -->

                        <div class="form-group">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nuevoUsuario" placeholder="Ingresar usuario" required>
                            </div>

                        </div>

                        <!-- ENTRADA PARA LA CONTRASEÑA -->

                        <div class="form-group">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nuevoPassword" placeholder="Ingresar contraseña" required>
                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

                        <div class="form-group">

                            <div class="input-group mb-3">

                                <span class="input-group-text"><i class="fas fa-users"></i></span>

                                <select class="form-control input-lg" name="nuevoPerfil">

                                    <option value="">Selecionar perfil</option>

                                    <option value="Administrador">Administrador</option>

                                    <option value="Especial">Especial</option>

                                    <option value="Vendedor">Vendedor</option>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SUBIR FOTO -->

                        <div class="form-group">
                            <label for="exampleInputFile">Subir Foto</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="nuevaFoto" name="nuevaFoto">
                                    <label class="custom-file-label" for="nuevaFoto">Seleccionar Foto</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Max 2 MB</span>
                                </div>
                            </div>
                            <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="100px">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-light">Guardar Usuario</button>
                </div>


            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <!-- /.modal-dialog -->
</div>
