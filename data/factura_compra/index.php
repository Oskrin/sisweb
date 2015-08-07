<?php
session_start();
include '../../procesos/base.php';
include('../menu/app.php'); 
conectarse();
error_reporting(0);

$cont1 = 0;
$consulta = pg_query("select max(id_factura_compra) from factura_compra");
while ($row = pg_fetch_row($consulta)) {
    $cont1 = $row[0];
}
$cont1++;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>FACTURA COMPRA</title>
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
    <link href="../../plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
    <link href="../../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <link href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/alertify.core.css" rel="stylesheet" />
    <link href="../../dist/css/alertify.default.css" id="toggleCSS" rel="stylesheet" />
    <link href="../../dist/css/jquery-ui-1.10.4.custom.css" rel="stylesheet" type="text/css"/>            
    <link href="../../dist/css/ui.jqgrid.css" rel="stylesheet" type="text/css"/> 

    <style>
      .example-modal .modal {
        position: relative;
        top: auto;
        bottom: auto;
        right: auto;
        left: auto;
        display: block;
        z-index: 1;
      }
      .example-modal .modal {
        background: transparent!important;
      }
    </style>
  </head>

  <body class="skin-blue">
    <div class="wrapper">
      <?php banner_1(); ?>
      <?php menu_lateral_1(); ?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            FACTURA COMPRA
          </h1>
          <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Procesos</a></li>
            <li class="active">Factura Compra</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-body">
                  <div class="rows">
                    <div class="col-mx-12">
                      <form id="factura_compra_form" name="factura_compra_form" method="post">
                        <div class="row">
                          <div class="col-mx-12">
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>Fecha Actual:</label>
                                <div class="input-group">
                                  <input type="text" name="fecha_actual"  id="fecha_actual" readonly class="form-control"/>
                                  <input type="hidden" name="comprobante"  id="comprobante" readonly class="form-control" value="<?php echo $cont1 ?>"/>
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                </div><!-- /.input group -->
                              </div><!-- /.form group -->
                            </div>

                            <div class="col-md-3">
                              <div class="bootstrap-timepicker">
                                  <div class="form-group">
                                    <label>Hora Actual:</label>
                                    <div class="input-group">
                                      <input type="text" name="hora_actual"  id="hora_actual" readonly  class="form-control timepicker"/>
                                      <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                      </div>
                                    </div><!-- /.input group -->
                                  </div><!-- /.form group -->
                                </div>  
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Digitad@r:</label>
                                <input type="text" name="digitador"  id="digitador" readonly value="<?php echo $_SESSION['nombres'] ?>" class="form-control" />
                                <input type="hidden" name="comprobante2"  id="comprobante2" readonly class="form-control">
                              </div>  
                            </div>
                          </div>
                        </div>
                        <br />

                        <div class="row">
                          <div class="col-md-12">
                            <div class="col-md-5">
                              <div class="form-group">
                                <label class="col-md-4" >Nro. de serie: <font color="red">*</font></label>
                                <div class="form-group col-md-8 no-padding">                                
                                  <input type="text" name="serie"  id="serie" required class="form-control" data-inputmask='"mask": "999-999-999999999"' data-mask />
                                </div> 
                              </div>  
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="col-md-5" >Proveedor: <font color="red">*</font></label>
                                <div class="form-group col-md-7 no-padding">                                
                                  <select class="form-control" name="tipo_docu" id="tipo_docu">
                                    <option value="">......Seleccione......</option>
                                    <option value="Cedula">Cedula</option>
                                    <option value="Ruc">Ruc</option>
                                    <option value="Pasaporte">Pasaporte</option>
                                  </select>
                                  <input type="hidden" name="id_proveedor"  id="id_proveedor" required class="form-control" />
                                </div> 
                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="col-md-5" >Identificación: <font color="red">*</font></label>
                                <div class="form-group col-md-7 no-padding">                                
                                  <input type="text" name="ruc_ci"  id="ruc_ci" required placeholder="Buscar....." class="form-control" />
                                </div> 
                              </div>  
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                <div class="form-group ">                                
                                  <input type="text" name="empresa"  id="empresa" required class="form-control" />
                                </div>  
                              </div>  
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="col-md-5">Fecha registro:</label>
                                <div class="form-group col-md-7 no-padding">                                
                                  <input type="text" name="fecha_registro"  id="fecha_registro" required readonly class="form-control" />
                                </div> 
                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="col-md-5" >Fecha emisón:</label>
                                <div class="form-group col-md-7 no-padding">                                
                                  <input type="text" name="fecha_emision"  id="fecha_emision" required readonly class="form-control" />
                                </div> 
                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="col-md-5">Fecha caducidad:</label>
                                <div class="form-group col-md-7 no-padding">                                
                                  <input type="text" name="fecha_caducidad"  id="fecha_caducidad" required readonly class="form-control" />
                                </div> 
                              </div> 
                            </div>
                          </div>  
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="col-md-5" >Fecha Cancelación:</label>
                                <div class="form-group col-md-7 no-padding">                                
                                  <input type="text" name="cancelacion"  id="cancelacion" required readonly class="form-control" />
                                </div> 
                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="col-md-5" >Formas de Pago:</label>
                                <div class="form-group col-md-7 no-padding">                                
                                  <select class="form-control" name="formas" id="formas">
                                    <option value="Contado">Contado</option>
                                    <option value="Credito">Crédito</option>
                                  </select>
                                </div> 
                              </div> 
                            </div> 
                          </div> 
                        </div>

                        <hr />
                        <h3 class="box-title">Detalle Factura</h3>

                        <div class="row">
                         <div class="col-mx-12">
                            <div class="col-md-2">
                              <div class="form-group">
                                <label>CÓDIGO BARRAS</label>
                                <input type="text" name="codigo_barras"  id="codigo_barras" placeholder="Buscar..." class="form-control" />
                              </div>  
                            </div>

                            <div class="col-md-3">
                              <div class="form-group">
                                <label>CÓDIGO</label>
                                <input type="text" name="codigo"  id="codigo" placeholder="Buscar..." class="form-control" />
                              </div>  
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                <label>PRODUCTO</label>
                                <input type="text" name="producto"  id="producto" placeholder="Buscar..." class="form-control" />
                              </div>  
                            </div>

                            <div class="col-md-1">
                              <div class="form-group">
                                <label>CANTIDAD</label>
                                <input type="text" name="cantidad"  id="cantidad" class="form-control" />
                              </div>
                            </div>

                            <div class="col-md-1">
                              <div class="form-group">
                                <label>PRECIO</label>
                                <input type="text" name="precio"  id="precio" class="form-control" />
                              </div> 
                            </div>

                            <div class="col-md-1">
                              <div class="form-group">
                                <label>DESC.</label>
                                <input type="number" name="descuento"  id="descuento"  min="0" placeholder="%" class="form-control" />
                                <select id="iva_producto" name="iva_producto" style="display: none" class="form-control"  >
                                    <option value="Elija">Elija</option>
                                    <option value="Si">Si</option> 
                                    <option value="No">No</option> 
                                </select>
                                <input type="hidden" name="carga_series"  id="carga_series" readonly class="form-control" />
                                <input type="hidden" name="incluye"  id="incluye" readonly class="form-control" />
                                <input type="hidden" name="cod_producto"  id="cod_producto" readonly class="form-control" />
                                
                              </div>  
                            </div> 
                         </div>
                        </div>

                        <!-- <div class="row"> -->
                         <div class="col-mx-12">
                            <div id="grid_container">
                                <table id="list"></table>
                                <!--<div id="pager"></div>-->   
                            </div>
                         </div>   
                        <!-- </div> -->

                        <div class="row">
                         <div class="col-mx-12">
                            <div class="col-md-9">
                              
                            </div>
                            <!-- <div class="col-md-2"></div> -->
                            <div class="col-md-3">
                              <div class="form-group">
                                <label class="col-md-5" >Tarifa 0:</label>
                                <div class="form-group col-md-7 no-padding">
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="glyphicon glyphicon-usd"></i>
                                    </div>
                                    <input type="text" name="total_p" id="total_p" value="0.000" readonly class="form-control"/>
                                  </div>                                
                                </div> 
                              </div>

                              <div class="form-group">
                                <label class="col-md-5" >Tarifa 12:</label>
                                <div class="form-group col-md-7 no-padding">
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="glyphicon glyphicon-usd"></i>
                                    </div>
                                    <input type="text" name="total_p2" id="total_p2" value="0.000" readonly class="form-control"/>
                                  </div>                                
                                </div> 
                              </div>

                              <div class="form-group">
                                <label class="col-md-5" >12 %Iva:</label>
                                <div class="form-group col-md-7 no-padding">
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="glyphicon glyphicon-usd"></i>
                                    </div>
                                    <input type="text" name="iva" id="iva" value="0.000" readonly class="form-control"/>
                                  </div>                                
                                </div> 
                              </div>

                              <div class="form-group">
                                <label class="col-md-5" >Descuento:</label>
                                <div class="form-group col-md-7 no-padding">
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="glyphicon glyphicon-usd"></i>
                                    </div>
                                    <input type="text" name="desc" id="desc" value="0.000" readonly class="form-control"/>
                                  </div>                                
                                </div> 
                              </div> 

                              <div class="form-group">
                                <label class="col-md-5" >Total:</label>
                                <div class="form-group col-md-7 no-padding">
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="glyphicon glyphicon-usd"></i>
                                    </div>
                                    <input type="text" name="tot" id="tot" value="0.000" readonly class="form-control"/>
                                  </div>                                
                                </div> 
                              </div>
                            </div>
                         </div>   
                        </div>

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title">VALORES RETENCIÓN</h3>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-mx-12">
                                    <!-- <form id="retenciones_form" name="retenciones_form" method="post"> -->
                                      <ul class="nav nav-tabs">
                                          <li class="active"><a href="#tab1" data-toggle="tab">Comprobantes</a></li>
                                          <li><a href="#tab2" data-toggle="tab">Valores</a></li>
                                          <li><a href="#tab3" data-toggle="tab">Pago</a></li>
                                          <li><a href="#tab4" data-toggle="tab">Formas de Pago</a></li>
                                      </ul>

                                      <div class="tab-content" id="tabs">
                                        <div class="tab-pane active" id="tab1">
                                          <br>
                                          <div class="col-mx-12">
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <label>Sustento Tribuario:</label>
                                                <select class="form-control" name="sustento" id="sustento">
                                                  <option value="">........Seleccione........</option>                                
                                                </select>
                                                <input type="hidden" name="id_sustento"  id="id_sustento" required class="form-control" />
                                              </div>  
                                            </div>

                                            <div class="col-md-10">
                                              <div class="form-group">
                                                <label>Tipo Comprobante:</label>
                                                <select class="form-control" name="comprobante_combo" id="comprobante_combo">
                                                  <option value="">........Seleccione........</option>
                                                </select>
                                                <input type="hidden" name="id_comprobante_combo"  id="id_comprobante_combo" required class="form-control" />
                                              </div>  
                                            </div>  
                                          </div>

                                          <div class="col-mx-12">
                                            <div class="col-md-4">
                                              <div class="form-group">
                                                <label>Autorización: <font color="red">*</font></label>
                                                <div class="form-group">                                
                                                  <input type="text" name="autorizacion"  id="autorizacion" required class="form-control" />
                                                </div> 
                                              </div>
                                            </div>
                                          </div>

                                          <div class="col-md-12">
                                            <p><a class="btn btn-primary btnNext" >Siguiente</a></p>
                                          </div>
                                        </div>

                                        <div class="tab-pane" id="tab2">
                                          <br>
                                          <div class="col-md-12">
                                          <p>Detalle Bases Imponibles, Retenciones del Impuesto al Valor Agregado </p>
                                          </div>
                                          <div class="col-md-12">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="col-md-6">Base Imponible IVA 0%:</label>
                                                <div class="form-group col-md-6 no-padding">                                
                                                  <input type="text" name="base_iva0"  id="base_iva0" required readonly placeholder="0.00" class="form-control" />
                                                </div> 
                                              </div> 
                                            </div>

                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="col-md-6">Base Imponible IVA 12%:</label>
                                                <div class="form-group col-md-6 no-padding">                                
                                                  <input type="text" name="base_iva12"  id="base_iva12" required readonly placeholder="0.00" class="form-control" />
                                                </div> 
                                              </div> 
                                            </div>

                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="col-md-6">Base Imponible no Objeto IVA:</label>
                                                <div class="form-group col-md-6 no-padding">                                
                                                  <input type="text" name="nobase_iva"  id="nobase_iva" required readonly placeholder="0.00" class="form-control" />
                                                </div> 
                                              </div> 
                                            </div>

                                            <div class="col-md-6"></div>
                                          </div>
                                        
                                          <div class="col-md-12">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="col-md-6">Monto IVA:</label>
                                                <div class="form-group col-md-6 no-padding">                                
                                                  <input type="text" name="monto_iva12"  id="monto_iva12" required  readonly placeholder="0.00" class="form-control" />
                                                </div> 
                                              </div> 
                                            </div>

                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="col-md-6">Monto ICE:</label>
                                                <div class="form-group col-md-6 no-padding">                                
                                                  <input type="text" name="monto_ice"  id="monto_ice" required readonly placeholder="0.00" class="form-control" />
                                                </div> 
                                              </div> 
                                            </div>
                                          </div>
                                         
                                          <div class="col-md-12">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="col-md-6">Retención IVA Bienes:</label>
                                                <div class="form-group col-md-6 no-padding">                                
                                                  <input type="text" name="retencion_iva_bienes"  id="retencion_iva_bienes" required readonly placeholder="0.00" class="form-control" />
                                                </div> 
                                              </div> 
                                            </div> 

                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="col-md-6">Retención IVA Servicios:</label>
                                                <div class="form-group col-md-6 no-padding">                                
                                                  <input type="text" name="retencion_iva_servicios"  id="retencion_iva_servicios" required readonly placeholder="0.00" class="form-control" />
                                                </div> 
                                              </div> 
                                            </div>

                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="col-md-6">Retención IVA 100%:</label>
                                                <div class="form-group col-md-6 no-padding">                                
                                                  <input type="text" name="retencion_iva"  id="retencion_iva" required readonly placeholder="0.00" class="form-control" />
                                                  <input type="hidden" name="id_retor_retencion_fuente"  id="id_retor_retencion_fuente" required readonly class="form-control" />
                                                  <input type="hidden" name="retor_retencion_fuente"  id="retor_retencion_fuente" required readonly class="form-control" />
                                                  <input type="hidden" name="id_retor_retencion_iva"  id="id_retor_retencion_iva" required readonly class="form-control" />
                                                  <input type="hidden" name="cod_retor_retencion_iva"  id="cod_retor_retencion_iva" required readonly class="form-control" />
                                                  <input type="hidden" name="retor_retencion_iva"  id="retor_retencion_iva" required readonly class="form-control" />
                                                </div> 
                                              </div> 
                                            </div>
                                            <div class="col-md-6"></div>
                                          </div>

                                          <div class="col-md-12">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="col-md-6">Valor Retenido Fuente:</label>
                                                <div class="form-group col-md-6 no-padding">                                
                                                  <input type="text" name="valor_retenido"  id="valor_retenido" required readonly placeholder="0.00" class="form-control" />
                                                </div> 
                                              </div> 
                                            </div>
                                          </div>

                                          <div class="col-md-12">
                                            <p>
                                              <a class="btn btn-primary btnNext2" >Siguiente</a>
                                              <a class="btn btn-primary btnPrevious" >Atrás</a>
                                            </p>
                                          </div>
                                        </div>

                                        <div class="tab-pane" id="tab3">
                                          <br>
                                          <div class="col-md-12">
                                          <p>Comprobante de retención</p>
                                          </div>

                                          <div class="col-md-12">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="col-md-6">Establecimiento:</label>
                                                <div class="form-group col-md-6 no-padding">                                
                                                  <input type="text" name="establecimiento"  id="establecimiento" required readonly placeholder="" class="form-control" />
                                                </div> 
                                              </div> 
                                            </div>

                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="col-md-6">Punto Emisión:</label>
                                                <div class="form-group col-md-6 no-padding">                                
                                                  <input type="text" name="punto_emision"  id="punto_emision" required readonly placeholder="" class="form-control" />
                                                </div> 
                                              </div> 
                                            </div>

                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="col-md-6">N° Secuencial:</label>
                                                <div class="form-group col-md-6 no-padding">                                
                                                  <input type="text" name="secuencial"  id="secuencial" required class="form-control" />
                                                </div> 
                                              </div> 
                                            </div>

                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="col-md-6">N° Autorización Comprobante:</label>
                                                <div class="form-group col-md-6 no-padding">                                
                                                  <input type="text" name="auto_comprobante"  id="auto_comprobante" readonly required placeholder="" class="form-control" />
                                                </div> 
                                              </div> 
                                            </div>

                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="col-md-6">Fecha Emisión Comprobante:</label>
                                                <div class="form-group col-md-6 no-padding">                                
                                                  <input type="text" name="fecha_emision_retencion"  id="fecha_emision_retencion" required readonly placeholder="" class="form-control" />
                                                </div> 
                                              </div> 
                                            </div>
                                          </div>
                                          <div class="col-md-12">
                                            <a class="btn btn-primary btnNext3">Siguiente</a>
                                            <a class="btn btn-primary btnPrevious">Atrás</a>
                                            <a class="btn btn-primary btnFin">Finalizar</a>
                                          </div> 
                                        </div>

                                        <div class="tab-pane " id="tab4" class="disabled">
                                          <br>
                                          <div class="col-md-12">
                                          <p>Formas de pagos Utilizadas</p>
                                          </div>

                                          <div class="col-md-12">
                                            <div class="col-md-8">
                                              <label>Formas Pago:</label>
                                              <div class="input-group">
                                                <select class="form-control" name="formas_pago" id="formas_pago">
                                                  <option value="">........Seleccione........</option>                                
                                                </select>
                                                <span class="input-group-btn">
                                                <button class="btn bg-primary" type="button" id="btnFormas">Agregar</button>
                                              </span>
                                              </div>
                                            </div>
                                          
                                            <div class="col-md-12" style="margin-top: 10px">
                                              <!-- <table id="list4"><tr><td></td></tr></table> -->
                                              <div id="grid_container2">
                                                <table id="list4"></table>   
                                              </div>
                                            </div>
                                          </div>

                                          <div class="col-md-12" style="margin-top: 10px">
                                            <a class="btn btn-primary btnNext" >Siguiente</a>
                                            <a class="btn btn-primary btnPrevious" >Atrás</a>
                                          </div> 
                                        </div>
                                      </div>
                                    <!-- </form> -->
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn bg-olive margin" data-dismiss="modal">Cerrar</button>
                              </div>
                            </div><!-- /.modal-content -->
                          </div><!-- /.modal-dialog -->
                      </div>
                      </form>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <p>
                        <button class="btn bg-olive margin" id='btnGuardar'><i class="fa fa-save"></i> Guardar</button>
                        <button class="btn bg-olive margin" id='btnModificar'><i class="fa fa-edit"></i> Modificar</button>
                        <button class="btn bg-olive margin" id='btnBuscar'><i class="fa fa-search"></i> Buscar</button>
                        <button class="btn bg-olive margin" id='btnNuevo'><i class="fa fa-pencil"></i> Nuevo</button>
                        <button class="btn bg-olive margin" id='btnImprimir'><i class="fa fa-print"></i> Imprimir</button>
                        <button class="btn bg-olive margin" id='btnAtras'><i class="fa fa-backward"></i> Atras</button>
                        <button class="btn bg-olive margin" id='btnAdelante'>Adelante <i class="fa fa-forward"></i></button>
                        <button data-toggle="modal" type="button" id="btn_3" class="btn bg-olive margin">
                          <i class="ace-icon fa fa-search bigger-120 white"></i>
                          Retención
                        </button>
                      </p> 
                    </div>

                    <div id="buscar_facturas_compras" title="BUSCAR FACTURAS COMPRAS">
                        <table id="list3"><tr><td></td></tr></table>
                        <div id="pager3"></div>
                    </div>  

                    <div id="series" title="AGREGAR SERIES">
                        <table cellpadding="2" border="0" style="margin-left: 10px">
                            <tr>
                                <td><label>Series: <font color="red">*</font></label></td>
                                <td><input type="text" name="serie" id="serie" class="campo" /></td>
                                <td><button class="btn btn-primary" id='btnAgregar' style="margin-top: -10px"><i class="icon-list"></i> Agregar</button></td>
                            </tr>
                        </table>
                        <hr style="color: #0056b2;" /> 
                        <div align="center">
                            <table id="list2"><tr><td></td></tr></table>
                            <div class="form-actions">
                                <button class="btn btn-primary" id='btnGuardarSeries'><i class="icon-save"></i> Guardar</button>
                                <button class="btn btn-primary" id='btnCancelarSeries'><i class="icon-remove-sign"></i> Cancelar</button>
                            </div>
                        </div>
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
    <script src="../../dist/js/app.min.js" type="text/javascript"></script>
    <script src="../../dist/js/validCampoFranz.js" type="text/javascript" ></script>
    <script src="../../dist/js/alertify.min.js" type="text/javascript"></script>
    <script src="../../dist/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
    <script src="../../dist/js/jquery.jqGrid.src.js" type="text/javascript"></script>
    <script src="../../dist/js/grid.locale-es.js" type="text/javascript"></script>
    <script src="factura_compra.js" type="text/javascript"></script>
    <link href="../../dist/css/style.css" rel="stylesheet" type="text/css"/>     
    <script src="../../dist/js/ventana_reporte.js" type="text/javascript"></script>
  </body>
</html>