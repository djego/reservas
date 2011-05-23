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
          <a href="<?php echo url_for('homepage'); ?>" title="Hoteles en París">
            <img src="<?php echo sfConfig::get('app_s_img')?>logo.png" alt="Hoteles en París" title="Hoteles en París" border="0" /></a>
          <h2>Ofertas de hoteles en Par&iacute;s - Reserva tu hotel</h2>
        </div>
        <?php include_slot('mensaje') ?>
                                
      </div>
    </div>

    <?php echo $sf_content ?>

    <div class="pie">
      <div class="footer">
        <div class="izq">
			© <a href="http://www.parishoteles.net/"><strong>Par&iacute;s Hoteles</strong></a> - Ofertas y reservas de hoteles en Par&iacute;s.</div>
        <div class="drcha">
          <a href="http://www.booking.com/general.es.html?aid=334634;tmpl=docs/customer_service" title="Atenci&oacute;n al cliente" rel="nofollow">Atenci&oacute;n al cliente</a> |
          <a href="http://www.booking.com/general.es.html?aid=334634;tmpl=docs/privacy-policy" title="Pol&iacute;tica de privacidad" rel="nofollow">Política de privacidad</a> |
          <a href="http://www.booking.com/general.es.html?aid=334634;tmpl=docs/terms-and-conditions" title="T&eacute;rminos y condiciones" rel="nofollow">T&eacute;rminos y condiciones</a> |
          <a href="http://www.parishoteles.net/enlaces/" title="Enlaces de interés">Enlaces</a>
        </div>
      </div>
    </div>

  </body>

</html>