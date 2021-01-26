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

                    <?php

                    $item = null;
                    $valor = null;

                    $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                    foreach ($usuarios as $key => $value){

                        echo '<tr>
                                <td>1</td>
                                <td>'.$value["nombre"].'</td>
                                <td>'.$value["usuario"].'</td>';

                                if($value["foto"] != ""){

                                    echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                                }else{

                                    echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                                }

                                echo '<td>'.$value["perfil"].'</td>';

                        if($value["estado"] != 0){

                            echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

                        }else{

                            echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

                        }

                        echo '<td>'.$value["ultimo_login"].'</td>
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fas fa-edit"></i></button>

                      <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fas fa-trash"></i></i></button>

                    </div>  

                  </td>

                </tr>';
                    }


                    ?>

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
                            <label for="nuevaFoto">Subir Foto</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input nuevaFoto" id="customFile" name="nuevaFoto">
                                    <label class="custom-file-label" for="nuevaFoto">Seleccionar Foto</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Max 2 MB</span>
                                </div>
                            </div>
                            <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-light">Guardar Usuario</button>
                </div>
            </div>

            <?php
            $crearUsuario = new ControladorUsuarios();
            $crearUsuario -> ctrCrearUsuario();
            ?>

        </form>
    </div>
    <!-- /.modal-dialog -->
</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div class="modal fade" id="modalEditarUsuario">
    <div class="modal-dialog">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-content bg-secundary">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Usuario</h4>
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
                                <input type="text" class="form-control" id="editarNombre" name="editarNombre" value="" required>
                            </div>

                        </div>

                        <!-- ENTRADA PARA EL USUARIO -->

                        <div class="form-group">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="text" class="form-control" id="editarUsuario" name="editarUsuario" value="" readonly>
                            </div>

                        </div>

                        <!-- ENTRADA PARA LA CONTRASEÑA -->

                        <div class="form-group">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" class="form-control" name="editarPassword" placeholder="Ingresar nueva contraseña">
                                <input type="hidden" id="passwordActual" name="passwordActual">
                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

                        <div class="form-group">

                            <div class="input-group mb-3">

                                <span class="input-group-text"><i class="fas fa-users"></i></span>

                                <select class="form-control input-lg" name="editarPerfil">

                                    <option value="" id="editarPerfil"></option>

                                    <option value="Administrador">Administrador</option>

                                    <option value="Especial">Especial</option>

                                    <option value="Vendedor">Vendedor</option>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SUBIR FOTO -->

                        <div class="form-group">
                            <label for="nuevaFoto">Subir Foto</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input nuevaFoto" id="customFileEdit" name="editarFoto">
                                    <label class="custom-file-label" for="nuevaFoto">Seleccionar Foto</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Max 2 MB</span>
                                </div>
                            </div>
                            <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                            <input type="hidden" name="fotoActual" id="fotoActual">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-light">Modificar Usuario</button>
                </div>
            </div>

            <?php
            $editarUsuario = new ControladorUsuarios();
            $editarUsuario -> ctrEditarUsuario();
            ?>


        </form>
    </div>
    <!-- /.modal-dialog -->
</div>
