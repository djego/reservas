<?php slot('more_metas') ?>
<title>Audioguías de París - Guías para poder hacer turismo en París</title> 
<meta name="keywords" content="audioguias, paris, turismo, monumentos, guias, museos, torre eiffel, louvre, arco triunfo" />
<meta name="description" content="Con nuestras audiogu&iacute;as en Mp3 podr&aacute;s visitar Par&iacute;s por tu cuenta y a tu ritmo. Visita los monumentos y museos de Par&iacute;s con tu audiogu&iacute;a." />
<?php end_slot(); ?>
<?php slot('mensaje') ?>
<div class="mensaje">
  Gu&iacute;a tur&iacute;stica de Par&iacute;s - Audigu&iacute;a en Mp3
  <br />
  <a href="http://www.parishoteles.net/audioguias-de-paris/" title="Audioguias de Paris"><embed width="468" height="60" src="images/paris-468x60.swf?clickTAG=http://www.parishoteles.net/audioguias-de-paris/"></embed></a>
</div>
<?php end_slot(); ?>
<div class="main-container">
  <div class="main-content">
    <div class="navegacion"><div style="float:left;"><a href="<?php echo url_for('homepage'); ?>" title="Hoteles en París">Par&iacute;s Hoteles</a> > Gu&iacute;a de hoteles de Par&iacute;s</div>
      <form action="<?php echo url_for('change_currency'); ?>" method="post">
        <div style="float:right;">
          Ver precios en&nbsp;
          <?php if ($form_currency->isCSRFProtected()) : ?>
            <?php echo $form_currency['_csrf_token']->render(); ?>
          <?php endif; ?>
          <?php echo $form_currency['moneda']->render(array('onchange' => 'submit()')); ?>
        </div> 
      </form>
    </div>
    <div class="home-under">
      <div class="home-content">

        <div class="listados-izq">
          <dl class="refine2">
            <h3>Buscar hoteles en Par&iacute;s</h3>
          </dl>
          <dl class="refine">
            <form id="formulario" action="<?php echo url_for('hotels_result') ?>" class="" method="get" accept-charset="utf-8" enctype="multipart/form-data">
            <?php include_partial('search_dispo',array('search_form' => $search_form)) ?>
            </form>
            
            <br clear="all" />
            <?php include_partial('search_pro', array('search_form' => $search_form, 'star_sesion' => $star_sesion, 'facil_session' => $facil_session, 'num_hotels' => $num_hotels)) ?>
          </dl>
          <br clear="all" />

          <?php include_partial('destinos', array('lst_destiny' => $lst_destiny)); ?>

          <?php include_partial('hotel_history_list', array('histo_hotel' => $sf_user->getHotelHistory())) ?>

          <br clear="all" />
          <div class="ventajas">Tus reservas en ParisHoteles.net</div>
          <div class="ventajas2">
            <ul>
              <li>Sin cargos por gesti&oacute;n.</li>
              <li>Los mejores precios de hotel.</li>
              <li>M&aacute;s de 1.100 hoteles en Par&iacute;s.</li>
              <li>Disponibilidad en tiempo real.</li>
              <li>El pago se realiza en el hotel.</li>
            </ul>
          </div>

          <br clear="all" /><br clear="all" />
        </div>


        <div class="listados-drcha">
          <h1 class="titulo-listados">Audiogu&iacute;as en Mp3 de Par&iacute;s</h1>

          <p>Con nuestras audiogu&iacute;as en Mp3 podr&aacute;s visitar Par&iacute;s por tu cuenta y a tu ritmo. Visita los monumentos y museos de Par&iacute;s con tu audiogu&iacute;a.</p>
          <p>&nbsp;</p>
          <iframe src ="http://cityhoteles.playandtour.com/default.aspx?ciudad=10" width="700" height="1800px" frameborder="0" framespacing="0" scrolling="auto" border="0" style="width:700; height:1800;"></iframe>

          <p>&nbsp;</p>
          <p align="justify">Descubre, sin necesidad de contratar guías, todos los detalles de los monumentos y museos de Par&iacute;s, así como también de las curiosidades de las calles, plazas y otros lugares de interés que puedes encontrarte en Par&iacute;s. Con tu móvil, un reproductor de mp3, mp4, iPod®, pda, móvil, iPhone® y otros dispositivos podrás conocer de primera mano la información turística de Par&iacute;s.</p><p>&nbsp;</p>

        </div>


        <p>&nbsp;</p><br clear="all" />

      </div>

    </div>
    <div style="clear: both;"></div>
  </div>
</div>