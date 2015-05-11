 <ul class="nav nav-tabs nav-stacked flex-container">
        <li  ><a href="<?php echo base_url(); ?>inicio"> <i class="icon-th-large"></i> Inicio</a></li>
        <li class="active" ><a href="<?php echo base_url(); ?>propiedades"><i class="icon-home"></i> Propiedades</a></li>
        <li ><a href="<?php echo base_url(); ?>contactos"> <i class="icon-user"></i> Contactos</a></li>
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
