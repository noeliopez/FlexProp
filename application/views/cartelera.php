<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
        <style>
            body {
				background-color:#CCC;
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

        <script src="<?php echo base_url(); ?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script>
		function alta_ajax(){
			
			$.ajax({
				url:'cartelera/nuevo/',
				
				data: {
					'nombre':$('#nombre').val(),
					'mensaje':$('#mensaje').val()	
				},
				
				success: function(data){
					
					consulta_ajax();
			}
			});
		}
		
		function consulta_ajax(){
			$.ajax({
				url: "cartelera/consulta",
				success: function(data){
					$('#datos').html(data);
				}
			});
		}
		
		
		$(document).ready( function() {
		
			consulta_ajax();
			
		});
</script>
       
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

		<!--      Barra de Navegacion Principal   ##################################    -->

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#"><img src="<?php echo base_url(); ?>img/flexlogo.png" width="37" height="37" > FlexProp</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Buen día <?php echo $sesion['nombre']; ?> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url(); ?>soporte/guia">Guia de Usuario</a></li>
                                    <li><a href="<?php echo base_url(); ?>noticias">Noticias</a></li>
                                    <li><a href="<?php echo base_url(); ?>soporte/ayuda">Soporte Técnico</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Cuenta</li>
                                    <li><a href="<?php echo base_url(); ?>configuracion">Configuracion</a></li>
									<li><a href="<?php echo base_url(); ?>login/logout">Salir</a></li>
                                </ul>
                            </li>
                        </ul>

                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
<!-- FIN Barra de Navegacion Principal   ##################################    -->
		
<!-- Todo el contenido     -->
        <div class="container-fluid">

<!-- Columna contenedora principal 2/10 -->
            <div class="row-fluid">
				
<!-- MENU -->
            <div class="span2">
            	 
      <ul class="nav nav-tabs nav-stacked flex-container">
        <li  ><a href="<?php echo base_url(); ?>inicio"> <i class="icon-th-large"></i> Inicio</a></li>
        <li  ><a href="<?php echo base_url(); ?>propiedades"><i class="icon-home"></i> Propiedades</a></li>
        <li class="active"><a href="<?php echo base_url(); ?>cartelera"> <i class="icon-user"></i> Cartelera</a></li>
        <li ><a href="<?php echo base_url(); ?>calendario"><i class="icon-calendar"></i> Calendario</a></li>
        <li  ><a href="<?php echo base_url(); ?>herramientas" ><i class="icon-list-alt"></i> Herramientas</a></li>
        <li ><a href="<?php echo base_url(); ?>configuracion"><i class="icon-cog"></i> Configuracion</a></li>
      </ul>
      
      <br>
      <div class="flex-container" style="padding:15px;">
      <h4>Divisas <small><a href="http://www.dolarcito.com.ar/?ver=cotizacion_de_divisa&divisa=2">D</a></small></h4>
      <!-- COMIENZO codigo cotizacion personalizado -->
<style type="text/css">
/* color de la moneda */
.cotizacion_personalizada {color:#000; }
/* color de valor de la moneda */
.cotizacion_personalizada A {color:#666600; text-decoration:none}
</style>
<span id="cotizacion_personalizada" class="cotizacion_personalizada">
	<strong>Dolar</strong> U$D{dolar_c} - U$D{dolar_v}<br>
	<strong>Euro</strong> €{euro_c} - €{euro_v}<br>
	<strong>Real</strong> ${real_c} - ${real_v}<br>
</span>
<script src="http://www.dolarcito.com.ar/scripts/cotizacion_personalizada.js" language="javascript" type="text/javascript"></script>
<script language="javascript" type="text/javascript">show(s_cotizacion_personalizada)</script>
<!-- FIN codigo cotizacion personalizado --></div>
			</div>
            
<!-- Contenido de Panel -->
            <div class="span10">
				<div class="row-fluid">
					<div class="span12 flex-container">
                    
                    
                    
                    <div id="formulario" style="padding:15px;" class="form-inline">
		
        <h3>Agregar Nota</h3>
   	  Nombre <br/><input id="nombre" name="nombre" type="text" /><br/><br/>
   	  Mensaje <br/><input id="mensaje" name="mensaje" type="text" /><br/><br/>
   	                   
      <input type="button" class="btn btn-info" onclick="alta_ajax();" value="Enviar"/>

	</div>

  	<div id='datos' style="padding:15px;"></div>
                    
                    
                    
                    
                    
					</div>
</div><!--Fin RowFluid-->
            
                
            </div>
            </div>
            

            <hr>

            <footer>
                <p>&copy; Company 2012</p>
            </footer>

        </div> <!-- /container -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="<?php echo base_url(); ?>js/vendor/bootstrap.min.js"></script>

        <script src="<?php echo base_url(); ?>js/plugins.js"></script>
        <script src="<?php echo base_url(); ?>js/main.js"></script>

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
        <!-- Div de envio -->
        <div class="modal hide fade" id="Enviar">
          <div class="modal-header">
            <a class="close" data-dismiss="modal">×</a>
            <h3>Enviar propiedad</h3>
          </div>
          <div class="modal-body">
          
            <iframe frameborder="0" id="enviariframe" src="" width="98%" height="200px"></iframe>
          
          
          </div>
          
          <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Cerrar</a>
          </div>
          
        </div>
        <!-- Fin Div de envio -->
        
        <!-- Div de Ver -->
        <div class="modal hide fade" id="Ver">
          <div class="modal-header">
            <a class="close" data-dismiss="modal">×</a>
            <h3>Propiedad</h3>
          </div>
          <div class="modal-body"><iframe frameborder="0" id="Veriframe" src="" width="98%" height="1000px"></iframe>
          </div>
          
          <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Cerrar</a>
            
          </div>
          
          
          
        </div>
        <!-- Fin Div de Ver -->
        
    </body>
</html>