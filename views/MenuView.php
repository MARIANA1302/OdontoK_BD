<?php

class MenuView
{

    function showMenu($user, $num_register)
    {

?>
        <!DOCTYPE html>
        <html lang="es">

        <head>

            <title>Odonto K</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- Favicon -->
            <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
            <!-- Google Font: Source Sans Pro -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
            <!-- Toastr -->
            <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="dist/css/adminlte.min.css">
            <script src="https://kit.fontawesome.com/d2ec2ed15a.js" crossorigin="anonymous"></script>

            <link rel="stylesheet" href="assets/css/EstiloDashboar.css">
            
        
        </head>

        <body class="hold-transition sidebar-mini">
            <div class="wrapper">
                <!------------------------------------------- Barra de navegacion ----------------------------------------->
                <nav class="main-header navbar navbar-expand navar-superior">
                   
                    <!-- Botones izquierdos -->
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a onclick="Menu.menu('MenuController/validateHome')" class="nav-link">Home</a>
                        </li>
                    </ul>


                    <!--  Botones de la derecha -->
                    <ul class="navbar-nav ml-auto">


                        <!-- COLOCAR LA PANTALLA GRANDE -->
                        <li class="nav-item">
                            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                                <i class="fas fa-expand-arrows-alt"></i>
                            </a>
                        </li>

                        <!-- Boton para cerrar sesion -->
                        <li class="nav-item">
                            <a class="nav-link" href="#" role="button" onclick="Menu.closeSession()">
                                <i class="fas fa-power-off"></i>
                            </a>
                        </li>

                        
                    </ul>
                </nav>
                <!-- /.navbar -->

                <!------------------------------------------- contenedor MENU  ----------------------------------------->
                <aside class="main-sidebar elevation-4 contenedor-botones">
                    <!-- Brand Logo -->
                    <div class="contenedorLogo">
                        <img src="img/logoOdontoK.png" class="logo" alt="">
                    </div>

                    <!-- Perfil -->
                    <div class="sidebar">
                        <!-- Sidebar user panel (optional) -->

                        <div class="user-panel mt-5 pb-3 mb-3 d-flex align-items-center justify-content-center">
                           
                            <div class="info text-center ">
                                <h2 class="bienvenido">¡Bienvenid@! </h2>
                                <a href="#" class="d-block text-center saludo_usuario"><br><?php echo $user[0]->username; ?></a>
                            </div>
                        </div>

                        <!-- Opciones  Menu -->
                        
                        <nav class="mt-5">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                
                                <li class="nav-item">
                                 <!--onclick="Menu.menu('UserController/paginateUsers')"-->
                                    <a href="#" class="nav-link boton">
                                        <i class="fa-solid fa-users-gear"></i>
                                        <p class="ml-2">Administrar Usuarios</p>
                                    </a>
                                </li>

                            </ul>
                        </nav>
                        <!-- /.sidebar-menu -->
                    </div>
                    <!-- /.sidebar -->
                </aside>

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container-fluid">

                            <div class="row mb-2">
                                <div class="col-sm-6">
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content-header -->

                    <!-- Main content -->
                    <div class="content">
                        <div class="container-fluid">

                            <!-- Aqui se carga el contenido que es requerido -->
                            <div id="content">

                                <div class="col-lg-3 col-6">

                                   
                                </div>

                            </div>

                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->

                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                    <!-- Control sidebar content goes here -->
                    <div class="p-3">
                        <h5>Title</h5>
                        <p>Sidebar content</p>
                    </div>
                </aside>
                <!-- /.control-sidebar -->

                <!-- MODAL DONDE SE CARGARA TODO EL CONTENIDO --> 
                <div id="my_modal" class="modal" tabindex="-1">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal_title"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div id="modal_content" class="modal-body">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- ./wrapper -->

            <!-- REQUIRED SCRIPTS -->

            <!-- jQuery -->
            <script src="plugins/jquery/jquery.min.js"></script>
            <!-- Bootstrap 4 -->
            <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- Toastr -->
            <script src="plugins/toastr/toastr.min.js"></script>
            <!-- AdminLTE App -->
            <script src="dist/js/adminlte.min.js"></script>
            <!-- Sweet alert -->
            

            <script src="js/Menu.js"></script>
            <script src="js/UserJ.js"></script>
            <script src="js/Religion.js"></script>
            <script src="js/Person.js"></script>

            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        </body>

        </html>

    <?php
    }

    function showStartePage($num_register)
    {
    ?>
        <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?php echo $num_register ?></h3>
                    <p>Numero de usuarios registrados</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" onclick="Menu.menu('UserController/paginateUsers')" class="small-box-footer"> Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
<?php
    }
}
?>