<!DOCTYPE html>
<html>
    <head>
        <base href="<?php echo base_url(); ?>">
        <meta charset="UTF-8">
        <title>Registro de Actividades en Comunidad - "Prepa Sí"</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="resources/bootstrap-3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="resources/ionicons-1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="resources/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <link href="resources/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
              
        <script src="resources/js/jquery-2.1.1.min.js"></script>
		<script src="resources/js/ligth/js/lightbox-2.6.min.js"></script>
		<link rel="stylesheet" href="resources/js/ligth/css/lightbox.css" media="screen"/>
		
        <script src="resources/bootstrap-3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="resources/bootstrap-3.2.0/js/button.js" type="text/javascript"></script>
        
        <script type="text/javascript" src="resources/scripts/jquery.blockUI.js"></script>


        <!-- AdminLTE App -->
        <script src="resources/js/AdminLTE/app.js" type="text/javascript"></script>
        
		<link href="resources/css/jquery-ui.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="resources/scripts/jquery-ui-1.11.2.js"></script>
       
        <script src="resources/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="resources/js/plugins/datatables/dataTables.responsive.js" type="text/javascript"></script>
        <script src="resources/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>


       

        <!-- <script src="resources/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <link href="resources/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />  -->

        <script src="resources/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="resources/js/plugins/datepicker/locales/bootstrap-datepicker.es.js" type="text/javascript"></script>
        <link href="resources/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />


      
        <script type="text/javascript" src="resources/scripts/jquery.validate.js"></script>
        
        <script src="resources/scripts/alfanumerico.js" type="text/javascript"></script>
        
        <link rel="stylesheet" href="resources/sweetalert/sweetalert.css">                            
        <script type="text/javascript" src="resources/sweetalert/sweetalert.min.js"></script>      
        
        <script type="text/javascript" src="resources/scripts/plugins/jquery.timepicker.js"></script>
  		<link rel="stylesheet" type="text/css" href="resources/css/jquery.timepicker.css" />


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="resources/images/favicon.ico">
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?php echo base_url(); ?>director/agenda" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <img src="resources/images/logo_interno.png" style="padding-top:7px; vertical-align:sub;"/>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                
                <div class="navbar-right">
                    <ul class="nav navbar-nav">

                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $this->session->userdata('nombre'); ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <p>
                                        <?php echo $this->session->userdata('nombre_completo'); ?>
                                        <small><?php echo $this->session->userdata('perfil'); ?></small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="<?php echo base_url(); ?>main/salir" class="btn btn-default btn-flat">Salir</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    
                    <!-- search form 
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Buscar..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>-->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">

                       
                      
                        <li class="treeview active">
                            <a href="<?php echo base_url(); ?>director/index">
                                <i class="fa fa-calendar"></i>
                                <span style="font-weight:bold;">Agenda</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li <?php if ($this->uri->segment(2) === 'agenda' || $this->uri->segment(2) ==='detalleEvento') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>director/agenda"><i class="fa fa-angle-double-right"></i> Eventos registrados</a></li>                                                               
                                <li <?php if ($this->uri->segment(2) === 'registro_evento') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>director/registro_evento"><i class="fa fa-angle-double-right"></i> Nuevo evento</a></li>                                                                                          
                            </ul>
                        </li>
                        
                         <li class="treeview active">
                            <a href="<?php echo base_url(); ?>director/index">
                                <i class="fa fa-file-text-o"></i>
                                <span style="font-weight:bold;">Reportes</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li <?php if ($this->uri->segment(2) === 'generaSemanal') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>reportes/generaSemanal"><i class="fa fa-angle-double-right"></i> Semanal</a></li>                                                               
                                <li <?php if ($this->uri->segment(2) === 'generaMensual') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>reportes/generaMensual"><i class="fa fa-angle-double-right"></i> Mensual</a></li>
                                <li <?php if ($this->uri->segment(2) === 'generaTrimestral') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>reportes/generaTrimestral"><i class="fa fa-angle-double-right"></i> Trimestral</a></li>                                                                                                                                               
                            </ul>
                        </li>    
                        
                        
                        <?php $catalogos = array('cat_eje','cat_museo','cat_logistica','cat_coordinacion','cat_escAdultos','cat_espacio_publico');?>
                         <li class="treeview <?php if(in_array($this->uri->segment(2), $catalogos)){echo "active";} ?>">
                            <a href="<?php echo base_url(); ?>director/index">
                                <i class="fa fa-list"></i>
                                <span style="font-weight:bold;">Catálogos</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                              <!--    <li <?php if ($this->uri->segment(2) === 'cat_eje') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>director/cat_eje"><i class="fa fa-angle-double-right"></i> Ejes</a></li>-->                                                               
                                <li <?php if ($this->uri->segment(2) === 'cat_museo') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>director/cat_museo"><i class="fa fa-angle-double-right"></i>Museo</a></li> 
                                <li <?php if ($this->uri->segment(2) === 'cat_logistica') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>director/cat_logistica"><i class="fa fa-angle-double-right"></i> Logística</a></li>
                                <li <?php if ($this->uri->segment(2) === 'cat_coordinacion') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>director/cat_coordinacion"><i class="fa fa-angle-double-right"></i> Coordinaciones</a></li>
                                <li <?php if ($this->uri->segment(2) === 'cat_escAdultos') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>director/cat_escAdultos"><i class="fa fa-angle-double-right"></i> Escuela Adultos</a></li>
                                <li <?php if ($this->uri->segment(2) === 'cat_espacio_publico') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>director/cat_espacio_publico"><i class="fa fa-angle-double-right"></i> Espacio Publico</a></li>                                                              
                                                                                             
                                                                                                                                                                                   
                            </ul>
                        </li>  

                    </ul>
                </section>
                <!-- /.sidebar -->
                
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <?php echo $content; ?><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

    </body>
</html>