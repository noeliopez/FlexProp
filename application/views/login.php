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

        <script src="<?php echo base_url(); ?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        
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
                            <li class="active"><a  href="#">Log In</a></li>
                      
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
            <div class="span4">
          
            	 </div>
                <div class="span4 flex-container" style=" padding:15px;">
                <?php if(isset($Error)){?>
<div id="ErrorMsj"><?php echo $Error."<br> <a href='login'>Volver</a>";?></div>
<?php } else{?>
                    <h3>Inmobiliaria<small> Comienze a escribir y luego seleccione de la lista.</small></h3>
                    <form class="form-vertical" action="login" method="post">
                    <input name="databasei" autocomplete="off" type="text" class="span12" style="margin: 0 auto;" data-provide="typeahead" data-items="4" data-source='["Demo", "NJColonna", "CastellaniPiccoli"]' >
                    <!--data-source='[<?php //while ($fila = mysql_fetch_array($rs_articulos)){ echo '"'. $fila['inmobiliaria'].'",';}  ?>"Demo"]'-->
<br>
                    <hr>
                    <div class="input-prepend">
                <span class="add-on"><i class="icon-envelope"></i></span><input name="username" class="input-medium" id="prependedInput"  type="text">
              </div>
             
              <div class="input-prepend">
                <span class="add-on"><i class="icon-lock"></i></span><input name="password" class="input-medium" id="prependedInput"  type="text">
              </div><hr>
              
                    <input class="btn btn-info btn-large" type="submit" value="Entrar">
                    </form>
               <?php } ?>
                </div>
                <hr class="visible-phone">
                
                <div class="span4">
                </div>
            <hr>

            

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