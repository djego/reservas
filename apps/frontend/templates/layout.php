<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head profile="http://gmpg.org/xfn/11">
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>    
  </head>
  <body>
  <div class="cabecera">
	<div class="cabecera-logo">
		<div class="logo">
			<a href="<?php echo url_for('homepage');?>" title="Hoteles en Andorra"><img src="<?php echo sfConfig::get('app_s_img');?>/logo.png" alt="Hoteles en Andorra" title="Hoteles en Andorra" border="0"></a>
		</div>
		<div class="mensaje">
			Las mejores <strong>ofertas de hoteles en Andorra</strong>.
		</div>
	</div>
</div>
		
<div class="menu-superior">
	<div class="menu">
		<ul>
			<li class="inicio"><a href="<?php echo url_for('homepage');?>" title="Andorra Hoteles">INICIO</a></li>
			<li class="destino"><a href="<?php echo url_for('city'); ?>" title="Destinos de Andorra">DESTINOS DE ANDORRA</a></li>
			<li class="actividades"><a href="excursiones-actividades" title="Excursiones y Actividades en Andorra">EXCURSIONES Y ACTIVIDADES</a></li>
			<li class="paquetes"><a href="paquetes-turisticos" title="Paquetes tur&iacute;sticos">PAQUETES TURISTICOS</a></li>
			<li class="turismo"><a href="turismo-andorra" title="Turismo en Andorra">TURISMO EN ANDORRA</a></li>
			<li class="esqui"><a href="esqui-andorra" title="Esqu&iacute; en Andorra">ESQUI</a></li>
		</ul>
	</div>
</div>

    <?php echo $sf_content ?>

<div class="pie">
	<div class="footer">
		<div class="izq">
			© <a href="http://www.andorrahoteles.com/"><strong>Andorra Hoteles</strong></a> - Guía de hoteles de Andorra para que reserves al mejor precio.</div>
		<div class="drcha">
			<a href="http://www.booking.com/general.es.html?aid=334634;tmpl=docs/customer_service" title="Atenci&oacute;n al cliente" rel="nofollow">Atenci&oacute;n al cliente</a> | 
	<a href="http://www.booking.com/general.es.html?aid=334634;tmpl=docs/privacy-policy" title="Pol&iacute;tica de privacidad" rel="nofollow">Política de privacidad</a> | 
	<a href="http://www.booking.com/general.es.html?aid=334634;tmpl=docs/terms-and-conditions" title="T&eacute;rminos y condiciones" rel="nofollow">T&eacute;rminos y condiciones</a>
		</div>
	</div>
</div>	

  </body>

</html>