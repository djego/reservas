<?php slot('more_metas') ?>
<title>Par&iacute;s Hoteles - Ofertas de Hoteles en Par&iacute;s - Reservas de hotel</title>
<meta name="keywords" content="paris, hoteles, ofertas, hoteles paris, reservas hotel" />
<meta name="description" content="Disponemos de más de 1.100 hoteles en París con el mejor precio GARANTIZADO. Reserva tu hotel en Par&iacute;s y disfruta haciendo turismo en una de las ciudades m&aacute;s bellas de Europa. Ofertas de hoteles en Par&iacute;s, Francia." />
<?php end_slot(); ?>
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
          <form id="formulario" action="" class="fechas" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <?php if ($search_form->isCSRFProtected()) : ?>
                <?php echo $search_form['_csrf_token']->render(); ?>
              <?php endif; ?>
            <?php // echo $search_form->renderGlobalErrors() ?>
              <dt>Fecha de entrada:</dt>
              <dd>
                <?php echo $search_form['fecha-inicio']->render(array('onchange' => "checkDateOrder('formulario', 'search_fecha-inicio_day', 'search_fecha-inicio_month', 'search_fecha-final_day', 'search_fecha-final_month');"))?>
                <a id="b_checkinCalPos" class="b_requiresJsInline" href="javascript:showCalendar('b_checkinCalPos',%20'b_calendarPopup',%20'search_fecha-inicio',%20'formulario');" title="Fecha de llegada" rel="nofollow">
                    <img src="<?php echo sfConfig::get('app_s_img')?>calendario.png" alt="Fecha de llegada" />
                </a>
              </dd>
              <dt>Fecha de salida:</dt>
              <dd>
                <?php echo $search_form['fecha-final']->render()?>
                <a id="b_checkoutCalPos" class="" href="javascript:showCalendar('b_checkoutCalPos',%20'b_calendarPopup',%20'search_fecha-final',%20'formulario');" title="Fecha de salida" rel="nofollow">
                    <img src="<?php echo sfConfig::get('app_s_img')?>calendario.png" alt="Fecha de salida">
                </a>
              </dd>
            <dt>
              <input type="checkbox" name="un_date" id="un_date" value="1" /> <span>Aún no he decidido las fechas</span></dt>

            <div align="center"><button type="submit" title="Buscar hoteles">Buscar</button></div>
            <div id="b_calendarPopup" class="b_popup">
    <div id="b_calendarInner" class="b_popupInner"> </div>
</div>
            
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
              <?php foreach ($lst_tours as $tours):?>
              <li><a href="<?php echo url_for('tour_hotels',array('id' =>$tours['id'],'slug' => $tours['slug']));?>" title="<?php echo $tours['name']?>"><img src="<?php echo sfConfig::get('app_s_img').$tours['slug'].'.jpg'; ?>" alt="<?php echo $tours['name']; ?>"/><?php echo $tours['name']; ?></a><br/><?php echo $tours->getHotel(); ?> hoteles</li>
              <?php endforeach; ?>
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
          <a href="home/starHotel?star=1" title="Hoteles en Paris de 1 estrella"><img src="<?php echo sfConfig::get('app_s_img')?>1-hotel-estrellas.png" alt="1 estrella" width="66" height="12" />&nbsp; (<?php echo $ar_num_hotels[1] ?> hoteles)</a><br />
          <a href="home/starHotel?star=2" title="Hoteles en Paris de 2 estrellas"><img src="<?php echo sfConfig::get('app_s_img')?>2-hotel-estrellas.png" alt="2 estrellas" width="66" height="12" />&nbsp; (<?php echo $ar_num_hotels[2] ?> hoteles)</a><br />
          <a href="home/starHotel?star=3" title="Hoteles en Paris de 3 estrellas"><img src="<?php echo sfConfig::get('app_s_img')?>3-hotel-estrellas.png" alt="3 estrellas" width="66" height="12" />&nbsp; (<?php echo $ar_num_hotels[3] ?> hoteles)</a><br />
          <a href="home/starHotel?star=4" title="Hoteles en Paris de 4 estrellas"><img src="<?php echo sfConfig::get('app_s_img')?>4-hotel-estrellas.png" alt="4 estrellas" width="66" height="12" />&nbsp;  (<?php echo $ar_num_hotels[4] ?> hoteles)</a><br />
          <a href="home/starHotel?star=5" title="Hoteles en Paris de 5 estrellas"><img src="<?php echo sfConfig::get('app_s_img')?>5-hotel-estrellas.png" alt="5 estrella" width="66" height="12" />&nbsp;  (<?php echo $ar_num_hotels[5] ?> hoteles)</a><br />
        </div>
        <br clear="all" /><br clear="all" />
        <div class="otroslugares"><strong>Otros destinos de Par&iacute;s donde reservar tu hotel:</strong> <br />· 
          <?php foreach ($lst_others as $other): ?>
          <a href="<?php echo url_for('tour_hotels',array('id' =>$other['id'],'slug' => $other['slug']));?>" title="Hoteles cerca de "<?php echo $other['name'] ?>><?php echo $other['name'] ?></a> &nbsp; &nbsp; ·
          <?php endforeach; ?>
        </div>
        <p>&nbsp;</p><p>&nbsp;</p><br clear="all" />

      </div>

    </div>
    <div style="clear: both;"></div>
  </div>
</div>
<script type="text/javascript"><!--//--><![CDATA[//><!--
    calendar = new Object();
    tr = new Object();
    tr.nextMonth = "Mes siquiente";
    tr.prevMonth = "Mes anterior";
    tr.closeCalendar = "Cerrar el calendario";
    var months=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
    var days=['Lu','Ma','Mi','Ju','Vi','Sa','Do'];
    //--><!]]>
</script>   
 








