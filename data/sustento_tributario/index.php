<?php 
session_start();
include('../menu/app.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>TIPOS COMPROBANTES..</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <link href="../../font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />        
    <link href="../../plugins/icon/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <link href="../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link href="../../plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <link href="../../plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="../../plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="../../plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="../../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <link href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/alertify.core.css" rel="stylesheet" />
    <link href="../../dist/css/alertify.default.css" id="toggleCSS" rel="stylesheet" />
    <link href="../../dist/css/jquery-ui-1.10.4.custom.css" rel="stylesheet" type="text/css"/>            
    <link href="../../dist/css/ui.jqgrid.css" rel="stylesheet" type="text/css"/> 
  </head>
  
  <body class="skin-blue">
    <div class="wrapper">
      <?php banner_1(); ?>
      <?php menu_lateral_1(); ?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Sustentos Tributarios
          </h1>
          <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Ingresos</a></li>
            <li class="active">Sustentos Tributarios</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-body">
                  <div class="row">
                      <form id="sustento_form" name="sustento_form" method="post">
                        <div class="col-mx-12">                    
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Código Sustento Tirubutario: <font color="red">*</font></label>
                              <input type="text" name="codigo_sustento"  id="codigo_sustento" class="form-control" />
                            </div>                            
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Descripción<font color="red">*</font></label>
                              <input type="text" name="nombre_sustento"  id="nombre_sustento" class="form-control" />
                              <input type="hidden" name="id_sustento"  id="id_sustento" class="form-control" />
                            </div>
                          </div>
                        </div>
                      </form>
                  </div>

                  <div class="row">
                    <div class="col-mx-12">
                      <p>
                        <button class="btn bg-olive margin" id='btnGuardar'><i class="fa fa-save"></i> Guardar</button>
                        <button class="btn bg-olive margin" id='btnModificar'><i class="fa fa-edit"></i> Modificar</button>
                        <button class="btn bg-olive margin" id='btnBuscar'><i class="fa fa-search"></i> Buscar</button>
                        <button class="btn bg-olive margin" id='btnNuevo'><i class="fa fa-pencil"></i> Nuevo</button>
                      </p> 
                    </div> 

                    <div id="sustentos" title="Búsqueda Sustentos Tributarios" class="">
                      <table id="list"><tr><td></td></tr></table>
                      <div id="pager"></div>
                    </div>
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php footer(); ?>
    </div>

    <script src="../../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
    <script src="../../plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="../../plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
    <script src="../../plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="../../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script src='../../plugins/fastclick/fastclick.min.js'></script>
    <script src="sustento.js" type="text/javascript"></script>
    <script src="../../dist/js/app.min.js" type="text/javascript"></script>
    <script src="../../dist/js/validCampoFranz.js" type="text/javascript" ></script>
    <script src="../../dist/js/alertify.min.js" type="text/javascript"></script>
    <script src="../../dist/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
    <script src="../../dist/js/jquery.jqGrid.src.js" type="text/javascript"></script>
    <script src="../../dist/js/grid.locale-es.js" type="text/javascript"></script>
    <link href="../../dist/css/style.css" rel="stylesheet" type="text/css"/>     
    <script src="../../dist/js/ventana_reporte.js" type="text/javascript"></script>
  </body>
</html>