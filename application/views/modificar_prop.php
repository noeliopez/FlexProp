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
       	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCFqZKKj3fPBszInVnAFI-gLsZqP7emrcs&sensor=true"></script>
		<script>//GOOGLE MAPS API
		//Declaramos las variables que vamos a user
			var lat = null;
			var lng = null;
			var map = null;
			var geocoder = null;
			var marker = null;
					 
			jQuery(document).ready(function(){
				 //obtenemos los valores en caso de tenerlos en un formulario ya guardado en la base de datos
				 lat = jQuery('#lat').val();
				 lng = jQuery('#long').val();
				 //Asignamos al evento click del boton la funcion codeAddress
				 jQuery('#consultar').click(function(){
					codeAddress();
					return false;
				 });
				 //Inicializamos la función de google maps una vez el DOM este cargado
				initialize();
			});
     
    function initialize() {
     
      geocoder = new google.maps.Geocoder();
        
       //Si hay valores creamos un objeto Latlng
       if(lat !='' && lng != '')
      {
         var latLng = new google.maps.LatLng(lat,lng);
      }
      else
      {
        //Si no creamos el objeto con una latitud cualquiera como la de Mar del Plata, Argentina por ej
         var latLng = new google.maps.LatLng(-34.6020766,-58.52887399999997);
      }
      //Definimos algunas opciones del mapa a crear
       var myOptions = {
          center: latLng,//centro del mapa
          zoom: 15,//zoom del mapa
          mapTypeId: google.maps.MapTypeId.ROADMAP //tipo de mapa, carretera, híbrido,etc
        };
        //creamos el mapa con las opciones anteriores y le pasamos el elemento div
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
         
        //creamos el marcador en el mapa
        marker = new google.maps.Marker({
            map: map,//el mapa creado en el paso anterior
            position: latLng,//objeto con latitud y longitud
            draggable: true //que el marcador se pueda arrastrar
        });
        
       //función que actualiza los input del formulario con las nuevas latitudes
       //Estos campos suelen ser hidden
        updatePosition(latLng);
         
         
    }
     
    //funcion que traduce la direccion en coordenadas
    function codeAddress() {
         
        //obtengo la direccion del formulario
        var address = document.getElementById("direccion").value + ", " + document.getElementById("localidad").value + ", " + document.getElementById("provincia").value + ", " + document.getElementById("pais").value ;
        //hago la llamada al geodecoder
        geocoder.geocode( { 'address': address}, function(results, status) {
         
        //si el estado de la llamado es OK
        if (status == google.maps.GeocoderStatus.OK) {
            //centro el mapa en las coordenadas obtenidas
            map.setCenter(results[0].geometry.location);
            //coloco el marcador en dichas coordenadas
            marker.setPosition(results[0].geometry.location);
            //actualizo el formulario      
            updatePosition(results[0].geometry.location);
             
            //Añado un listener para cuando el markador se termine de arrastrar
            //actualize el formulario con las nuevas coordenadas
            google.maps.event.addListener(marker, 'dragend', function(){
                updatePosition(marker.getPosition());
				/*$("#mensaje").css({
					"display" : "block"
					
				});*/
            });
      } else {
          //si no es OK devuelvo error
          alert("No podemos encontrar la direccion. Asegurese de haber escrito bien todos los campos.");
      }
    });
  }
   
  //funcion que simplemente actualiza los campos del formulario
  function updatePosition(latLng)
  {
       
       jQuery('#lat').val(latLng.lat());
       jQuery('#long').val(latLng.lng());
   
  }

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
        <li class="active" ><a href="<?php echo base_url(); ?>propiedades"><i class="icon-home"></i> Propiedades</a></li>
        <li ><a href="<?php echo base_url(); ?>cartelera"> <i class="icon-user"></i> Cartelera</a></li>
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
					<div class="span12">
					<div class="navbar">
  <div class="navbar-inner navbar navbar-fixed">
    <div class="container">
      <h3>Modificar Propiedad</h3>
    </div>
  </div>
</div>
					
					</div>
				</div>
				
				
            
            <div class="row-fluid">
          <div class="span12 flex-container" style="padding:15px;">
          <?php if(isset($error)){
			  echo $error; } elseif(isset($msj)){ echo $msj; }else{ ?>
              <div class="span8">
          <h4>Informacion Principal</h4><br>
          <form name="agregacion" id="agregacion" method="post" enctype="multipart/form-data">
          	<label>Tipo de inmueble</label>
            <select name="tipo">
              <option value="Casa" <?php if($prop['tipo']=="Casa"){ echo 'selected="selected"';} ?>>Casa</option>
              <option value="Departamento"<?php if($prop['tipo']=="Departamento"){ echo 'selected="selected"';} ?>>Departamento</option>
              <option value="DepartamentoTipoCasa"<?php if($prop['tipo']=="DepartamentoTipoCasa"){ echo 'selected="selected"';} ?>>Departamento tipo casa</option>
              <option value="Quinta"<?php if($prop['tipo']=="Quinta"){ echo 'selected="selected"';} ?>>Quinta</option>
              <option value="Local"<?php if($prop['tipo']=="Local"){ echo 'selected="selected"';} ?>>Local</option>
            </select><br>
            
            <label>Operaci&oacute;n</label>
            <select name="operacion">
              <option value="Venta"<?php if($prop['operacion']=="Venta"){ echo 'selected="selected"';} ?>>Venta</option>
              <option value="Alquiler" <?php if($prop['operacion']=="Alquiler"){ echo 'selected="selected"';} ?> >Alquiler</option>
            </select><br>
            
            <label>Ubicaci&oacute;n</label>
            <div class="form-inline">
            <input type="text" class="span2" value="<?php echo $prop['direccion']; ?>" required id="direccion" name="direccion" placeholder="Direccion">
            <input type="text" class="span2" value="<?php echo $prop['localidad']; ?>" required id="localidad" name="localidad" placeholder="Localidad">
            <input type="text" class="span2" value="<?php echo $prop['provincia']; ?>" required id="provincia" name="provincia" placeholder="Provincia">
            <input type="text" class="span2" value="<?php echo $prop['pais']; ?>" required id="pais" name="pais" placeholder="Pais">
            <button id="consultar" class="btn btn-info">Consultar</button>
            </div><br>
            
            <label>Precio</label>
            <div class="form-inline">
            <select name="moneda" class="input-mini">
            	<option value="U$D">U$D</option>
              	<option value="$">$</option>
                <option value="€">€</option>
            </select>
            <input type="number" class="span2" name="precio" required placeholder="Precio" value="<?php echo $prop['precio']; ?>">
            </div><br>
            <label>Hambientes</label>
            <input type="number" class="span2" required name="hambientes" value="<?php echo $prop['hambientes']; ?>" >
            <br>
            
            <label class="checkbox">
    		<input name="activo" type="checkbox" <?php if($prop['activo']=="1"){ echo 'checked="CHECKED"';} ?> > Activo
  			</label>
            <label class="checkbox">
    		<input type="checkbox" name="favorito" <?php if($prop['favorito']=="1"){ echo 'checked="CHECKED"';} ?> > Favorito
  			</label>
            <br>
            <label> Seleccione Imagen </label>
     		<input type="file" size="60" required name="userfile">
            <br>
            <div class="img-polaroid" style="width:260px">
            <label> Imagen Anterior</label>
            <img src="<?php echo base_url()."img/".$prop['imgurl']; ?>" width="260px" height="180px">
            </div>
            

                    
          
          
          </div>
          <div class="span4">
       
 
<label><h4>Ubicacion</h4></label>
 
<!-- div donde se dibuja el mapa-->
<div id="map_canvas" style="width:100%;height:300px;"></div>
 
<!--campos ocultos donde guardamos los datos-->
<input type="hidden" name="lat" id="lat" value="<?php echo $prop['latitud']; ?>"/>
<input type="hidden" name="lng" id="long" value="<?php echo $prop['longitud']; ?>" />
<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
<br>
<div class="alert alert-success" id="mensaje" style=" display:none;">
  <a class="close" data-dismiss="alert">×</a>
  <strong>Encontrado!</strong> Solo te fantan unos pasos y completas el formulario.
</div>
<br>
<br>
<button type="submit" id="agregar_btn" class="btn btn-success btn-large">Guardar Canbios</button>
</form>
          </div>
          <?php } ?>
           
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
    </body>
</html>