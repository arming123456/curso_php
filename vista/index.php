<?php
session_start();
if(!isset($_SESSION['S_IDUSUARIO'])){
  header('Location:../vista/index.php');
}
?>

<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Curso PHP</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href="../Plantilla/bower_components/bootstrap/dist/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="../Plantilla/bower_components/font-awesome/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="../Plantilla/bower_components/Ionicons/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="../Plantilla/dist/css/AdminLTE.min.css">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
          folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="../Plantilla/dist/css/skins/_all-skins.min.css">
      <!-- Morris chart -->
      <link rel="stylesheet" href="../Plantilla/bower_components/morris.js/morris.css">
      <!-- jvectormap -->
      <link rel="stylesheet" href="../Plantilla/bower_components/jvectormap/jquery-jvectormap.css">
      <!-- Date Picker -->
      <link rel="stylesheet" href="../Plantilla/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="../Plantilla/bower_components/bootstrap-daterangepicker/daterangepicker.css">
      <!-- bootstrap wysihtml5 - text editor -->
      <link rel="stylesheet" href="../Plantilla/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
      <!-- lin de Data Table -->
      <link rel="stylesheet" href="../Plantilla/plugins/DataTables/datatables.min.css">
      <!-- este link es para los selectores  -->
      <link rel="stylesheet" href="../Plantilla/plugins/select2/select2.min.css">

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

      <!-- Google Font -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <!-- Modificanto el tamaño de los alerts -->
    <style>
    .swal2-popup{
      font-size:1.6rem !important;
    }
    </style>

    <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">

        <header class="main-header">
          <!-- Logo -->
          <a href="index.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>C</b>M</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>CENTRO</b> MEDICO LP</span>
          </a>
          <!-- Header Navbar: style can be found in header.less -->
          <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
              <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img id="img_nav" class="user-image" alt="User Image">
                    <span class="hidden-xs"><?php echo $_SESSION['S_USER']; ?></span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <img id="img_subnav" class="img-circle" alt="User Image">

                      <p>
                        <?php echo $_SESSION['S_USER']; ?> 
                      </p>
                    </li>
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="#" onclick="AbrirModalEditarContra()" class="btn btn-default btn-flat" style="color: #ffffff; background-color: #ffc107;  border-radius: 15px;border: 3px double #6c757d;">Cambiar Contraseña</a>
                      </div>
                      <div class="pull-right">
                        <a href="../controlador/usuario/controlador_cerrar_sesion.php" class="btn btn-default btn-flat" style="color: #ffffff; background-color: #dc3545;  border-radius: 10px; border: 3px double #6c757d;">Salir</a>
                      </div>
                    </li>
                  </ul>
                </li>
                
              </ul>
            </div>
          </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img id="img_lateral" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['S_USER']; ?></p>
              <p><?php echo $_SESSION['S_ROL']; ?></p>
            
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">PANEL ADMINISTRATIVO</li>
            <li class="active treeview">
            <?php
              if($_SESSION['S_ROL']=='ADMINISTRADOR'){
            ?>
              <a onclick="cargar_contenido('contenido_principal','usuario/vista_usuario_listar.php')">
                <i class="fa fa-users"></i> <span>Usuarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
            <?php 
              }  
            ?>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
          <!-- esto se agrego para cambiar imagen de perfil -->
          <input type="text" id="txtidprincipal" value="<?php echo $_SESSION['S_IDUSUARIO'] ?>" hidden>
          <input type="text" id="usuarioprincipal" value="<?php echo $_SESSION['S_USER'] ?>" hidden>
          <!-- hasta aca es lo de la imagen -->
          <div class="row" id="contenido_principal">
          <div class="col-md-12">
            <div class="box box-warning box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">BIENVENIDO AL CONTENIDO PRINCIPAL</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
                <!-- /.box-tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                CONTENIDO PRINCIPAL
              </div>
              <!-- /.box-body -->
            </div>
              <!-- /.box -->
            </div>
        </div>

        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Desarrollado por:<a href="https://www.facebook.com/arming.quispemorales"> Arming&Company CODE-BO.</a></strong>
      </footer>

    </div>
  <!-- ./wrapper -->
    <div class="modal fade" id="modal_editar_contra" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modificar Contraseña</h4>
          </div>
          <div class="modal-body">
            <div class="col-lg-12">
            <input type="text" id="txtcontra_bd" hidden>
              <label for="">Contraseña Actual</label>
              <input type="password" class="form-control" id="txtcontraactual_editar" placeholder="Contraseña Actual"><br>
            </div>

            <div class="col-lg-12">
              <label for="">Contraseña Nueva</label>
              <input type="password" class="form-control" id="txtcontranu_editar" placeholder="Contraseña Nueva"><br>
            </div>

            <div class="col-lg-12">
              <label for="">Confirmar Contraseña Nueva</label>
              <input type="password" class="form-control" id="txtcontrare_editar" placeholder="Confirmar Contraseña"><br>
            </div>
          
          </div>    
          <div class="modal-footer">
            <button class="btn btn-primary" onclick="Editar_Contra()"><i class="fa fa-check"><b>&nbsp;Modificar</b></i></button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery 3 -->
    <script src="../Plantilla/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../Plantilla/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      var idioma_espanol = {
          select: {
          rows: "%d fila seleccionada"
          },
          "sProcessing":     "Procesando...",
          "sLengthMenu":     "Mostrar _MENU_ registros",
          "sZeroRecords":    "NO SE ENCONTRARON RESULTADOS EN LA BASE DE DATOS",
          "sEmptyTable":     "NINGUN DATO DISPONIBLE EN LA TABLA",
          "sInfo":           "Registros del (_START_ al _END_) total de _TOTAL_ registros",
          "sInfoEmpty":      "Registros del (0 al 0) total de 0 registros",
          "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix":    "",
          "sSearch":         "Buscar:",
          "sUrl":            "",
          "sInfoThousands":  ",",
          "sLoadingRecords": "<b>No se encontraron datos</b>",
          "oPaginate": {
              "sFirst":    "Primero",
              "sLast":     "Último",
              "sNext":     "Siguiente",
              "sPrevious": "Anterior"
          },
          "oAria": {
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      }
      
      function cargar_contenido(contenedor, contenido){  // eso es para gargar el contenido ojo ARMING
        $("#"+contenedor).load(contenido);
      }
      $.widget.bridge('uibutton', $.ui.button);
      // INICIO DE FUN CIONES DE VALIDACION
      function soloNumeros(e){
          tecla = (document.all) ? e.keyCode : e.which;
          if (tecla==8){
              return true;
          }
          // Patron de entrada, en este caso solo acepta numeros
          patron =/[0-9]/;
          tecla_final = String.fromCharCode(tecla);
          return patron.test(tecla_final);
      }
      function soloLetras(e){
          key = e.keyCode || e.which;
          tecla = String.fromCharCode(key).toLowerCase();
          letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
          especiales = "8-37-39-46";
          tecla_especial = false
          for(var i in especiales){
              if(key == especiales[i]){
                  tecla_especial = true;
                  break;
              }
          }
          if(letras.indexOf(tecla)==-1 && !tecla_especial){
              return false;
          }
      }
      //FIN DE FUNCIONES DE VALIDACION
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../Plantilla/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="../Plantilla/bower_components/raphael/raphael.min.js"></script>

    <!-- Sparkline -->
    <script src="../Plantilla/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../Plantilla/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../Plantilla/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../Plantilla/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../Plantilla/bower_components/moment/min/moment.min.js"></script>
    <script src="../Plantilla/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../Plantilla/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../Plantilla/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="../Plantilla/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../Plantilla/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../Plantilla/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

    <!-- AdminLTE for demo purposes -->
    <script src="../Plantilla/dist/js/demo.js"></script>
    <script src="../Plantilla/plugins/DataTables/datatables.min.js"></script>
    <script src="../Plantilla/plugins/select2/select2.min.js"></script>
    <script src="../Plantilla/plugins/sweetalert2/sweetalert2.js"></script>
    <script src="../js/usuario.js"></script>
    <script>
      TraerDatosUsuario();
    </script>
  </body>
</html>
