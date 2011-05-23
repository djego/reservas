
<?php slot('mensaje') ?>
<div id="dvnavicontainer">
          <img src="<?php echo sfConfig::get('app_s_img')?>navi_left.jpg" alt="" />
          <div id="tabs1" >
            <ul>
              <li id="current"><span>M&aacute;s de 1.100 Hoteles en Par&iacute;s al mejor precio GARANTIZADO!</span></li>
            </ul>
          </div>
          <img src="<?php echo sfConfig::get('app_s_img')?>navi_right.jpg" alt="Hoteles Par&iacute;s" />
        </div>
<?php end_slot(); ?>

<div class="main-container">
  <div class="main-content">

    <div class="buscador">
      <div style="float:left; width:300px; margin-left:20px;">

        <h1>Buscar hoteles en Par&iacute;s</h1>
        <dl class="refineHome">
          <form id="frm-refine" action="" class="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <?php if ($search_form->isCSRFProtected()) : ?>
                <?php echo $search_form['_csrf_token']->render(); ?>
              <?php endif; ?>
              <dt>Fecha de entrada:</dt>
              <dd>
                <?php echo $search_form['fecha-inicio']->render()?>
                <img src="<?php echo sfConfig::get('app_s_img')?>calendario.png" alt="Calendario" />
              </dd>

              <dt>Fecha de salida:</dt>
              <dd>
                <?php echo $search_form['fecha-final']->render()?>
                <img src="<?php echo sfConfig::get('app_s_img')?>calendario.png" alt="Calendario" />
              </dd>            
            <dt>
              <input type="checkbox" name="sinFechas" value="1" /> <span>Aún no he decidido las fechas</span></dt>

            <div align="center"><button type="submit" title="Buscar hoteles">Buscar</button></div>
          </form>
        </dl></div>
      <div style="float:right;">
        <img src="<?php echo sfConfig::get('app_s_img')?>hotel-paris.jpg"  alt="Hotel en Par&iacute;s" border="0" title="Hoteles en Par&iacute;s"/></div>
    </div>
    <br clear="all" />

    <div class="home-under">
      <div class="home-content">

        <div class="hoteles-cercanos">
          <h2>Hoteles de Par&iacute;s cerca de sitios tur&iacute;sticos</h2>
          <div id="hotelesCercanos">
            <ul>
              <li><a href="<?php echo url_for('all_hotel');?>" title="Hoteles cerca de la Torre Eiffel"><img src="<?php echo sfConfig::get('app_s_img')?>torre-eiffel.jpg" alt="Torre Eiffel"/>Torre Eiffel</a><br/>217 hoteles</li>
              <li><a href="<?php echo url_for('all_hotel');?>" title="Hoteles cerca del Arco del Triunfo"><img src="<?php echo sfConfig::get('app_s_img')?>arco-del-triunfo.jpg" alt="Arco del Triunfo"/>Arco del Triunfo</a><br/>772 hoteles</li>
              <li><a href="<?php echo url_for('all_hotel');?>" title="Hoteles cerca del Museo del Louvre"><img src="<?php echo sfConfig::get('app_s_img')?>museo-louvre.jpg" alt="Museo del Louvre"/>Museo del<br /> Louvre</a><br/>327 hoteles</li>
              <li><a href="<?php echo url_for('all_hotel');?>" title="Hoteles cerca de Notre Dame"><img src="<?php echo sfConfig::get('app_s_img')?>catedral-notre-dame.jpg" alt="Catedral de Notre Dame"/>Catedral de<br /> Notre Dame</a><br/>491 hoteles</li>
              <li><a href="<?php echo url_for('all_hotel');?>" title="Hoteles cerca de la Opera de París"><img src="<?php echo sfConfig::get('app_s_img')?>opera-paris.jpg" alt="Opera de París"/>&Oacute;pera Garnier</a><br/>71 hoteles</li>
              <li><a href="<?php echo url_for('all_hotel');?>" title="Hoteles cerca del Panteón"><img src="<?php echo sfConfig::get('app_s_img')?>panteon-paris.jpg" alt="Panteón"/>Pante&oacute;n</a><br/>113 hoteles</li>
              <li><a href="<?php echo url_for('all_hotel');?>" title="Hoteles cerca de la Basílica del Sacré-Coeur"><img src="<?php echo sfConfig::get('app_s_img')?>basilica-sagrado-corazon.jpg" alt="Basilica Sagrado Corazón"/>Basílica del<br /> Sacré-Coeur</a><br/>181 hoteles</li>
              <li><a href="<?php echo url_for('all_hotel');?>" title="Hoteles cerca de Los Inválidos"><img src="<?php echo sfConfig::get('app_s_img')?>los-invalidos.jpg" alt="Los Inválidos"/>Los Inválidos</a><br/>153 hoteles</li>
              <li><a href="<?php echo url_for('all_hotel');?>" title="Hoteles cerca de los Campos Elíseos‎"><img src="<?php echo sfConfig::get('app_s_img')?>campos-elisios.jpg" alt="Campos Elíseos‎"/>Campos Elíseos‎</a><br/>42 hoteles</li>
            </ul>
          </div>

        </div>
        <div class="lateralHome">
          <h2>Reserva tu hotel al <span>Precio Mínimo Garantizado</span></h2>
          <div class="ofertas">
            <div class="ventajas2">
              <ul>
                <li>Sin cargos por gesti&oacute;n en tus reservas.</li>
                <li>Descuentos de hasta el 70%.</li>
                <li>Buscador con <b>m&aacute;s de 1.100 hoteles en Par&iacute;s</b>.</li>
                <li>Disponibilidad en tiempo real.</li>
                <li>El pago se realiza en el hotel.</li>
              </ul>
            </div>
          </div>
          <br clear="all" />
          <h2>Hoteles en Par&iacute;s para todos los bolsillos</h2>
          <a href="<?php echo url_for('all_hotel');?>" title="Hoteles en Paris de 1 estrella"><img src="<?php echo sfConfig::get('app_s_img')?>1-hotel-estrellas.png" alt="1 estrella" width="66" height="12" />&nbsp; (2 hoteles)</a><br />
          <a href="<?php echo url_for('all_hotel');?>" title="Hoteles en Paris de 2 estrellas"><img src="<?php echo sfConfig::get('app_s_img')?>2-hotel-estrellas.png" alt="2 estrellas" width="66" height="12" />&nbsp; (5 hoteles)</a><br />
          <a href="<?php echo url_for('all_hotel');?>" title="Hoteles en Paris de 3 estrellas"><img src="<?php echo sfConfig::get('app_s_img')?>3-hotel-estrellas.png" alt="3 estrellas" width="66" height="12" />&nbsp; (180 hoteles)</a><br />
          <a href="<?php echo url_for('all_hotel');?>" title="Hoteles en Paris de 4 estrellas"><img src="<?php echo sfConfig::get('app_s_img')?>4-hotel-estrellas.png" alt="4 estrellas" width="66" height="12" />&nbsp;  (1174 hoteles)</a><br />
          <a href="<?php echo url_for('all_hotel');?>" title="Hoteles en Paris de 5 estrellas"><img src="<?php echo sfConfig::get('app_s_img')?>5-hotel-estrellas.png" alt="5 estrella" width="66" height="12" />&nbsp;  (32 hoteles)</a><br />
        </div>
        <br clear="all" /><br clear="all" />
        <div class="otroslugares"><strong>Otros destinos de Par&iacute;s donde reservar tu hotel:</strong> <br />· 
          <a href="<?php echo url_for('all_hotel');?>" title="Hoteles cerca del Centro Pompidou">Centro Pompidou</a> &nbsp; &nbsp; ·
          <a href="<?php echo url_for('all_hotel');?>" title="Hoteles cerca de Museo de Orsay">Museo de Orsay</a> &nbsp; &nbsp; ·
          <a href="<?php echo url_for('all_hotel');?>" title="Hoteles cerca de Stade de France (Saint Denis)">Stade de France (Saint Denis)</a> &nbsp; &nbsp; ·
          <a href="<?php echo url_for('all_hotel');?>" title="Hoteles cerca de Parque de los Príncipes">Parque de los Príncipes</a> &nbsp; &nbsp; ·
          <a href="<?php echo url_for('all_hotel');?>" title="Hoteles cerca de Galerías Lafayette">Galerías Lafayette</a> &nbsp; &nbsp; ·
          <a href="<?php echo url_for('all_hotel');?>" title="Hoteles cerca de París Norte (Gare du Nord)">París Norte (Gare du Nord)</a>
        </div>
        <p>&nbsp;</p><p>&nbsp;</p><br clear="all" />

      </div>

    </div>
    <div style="clear: both;"></div>
  </div>
</div>