<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="vistas/img/plantilla/icono-negro.php">

  <title>Control Inventario</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.css">

  <!-- ========================
    PLUGINS CSS Y JAVASCRIPT
    ===========================0-->

  <!-- jQuery -->
  <script src="vistas/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="vistas/dist/js/demo.js"></script>
</head>
<body class="hold-transition sidebar-mini ">
<!-- Site wrapper -->


  <?php
  if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

      echo '<div class="wrapper">';

      include "modulos/cabezote.php";

        if(isset($_GET["ruta"])){

          if($_GET["ruta"] == "inicio" ||
              $_GET["ruta"] == "usuarios" ||
              $_GET["ruta"] == "categorias" ||
              $_GET["ruta"] == "productos" ||
              $_GET["ruta"] == "clientes" ||
              $_GET["ruta"] == "movimientos" ||
              $_GET["ruta"] == "crear-movimiento" ||
              $_GET["ruta"] == "reportes" ||
              $_GET["ruta"] == "salir"){

              include "modulos/".$_GET["ruta"].".php";

          }else{

              include "modulos/404.php";

          }

      }else{

          include "modulos/inicio.php";

      }

      include "modulos/menu.php";

      include "modulos/footer.php";

      echo '</div>';
  }else{

      include "modulos/login.php";

  }
  ?>

<!-- ./wrapper -->

<script src="vistas/js/plantilla.js"></script>

</body>
</html>
