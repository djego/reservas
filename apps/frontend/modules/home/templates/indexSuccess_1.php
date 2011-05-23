<script>
  $(function(){
    $('#check_sinfecha').click(function(){
      if ($(this).is(':checked')) {
        $('#search_new_fecha_entrada').attr("disabled", true);
        $('#search_new_fecha_salida').attr("disabled", true);
      }
      else {
        $('#search_new_fecha_entrada').removeAttr("disabled");
        $('#search_new_fecha_salida').removeAttr("disabled");
      }
	    
    });

  });
</script>

<div class="main-buscador" style="height: 280px;">
  <div class="main-content">

    <div class="home">

      <div class="motor-form-standard">
        <div class="titulo">Hoteles en Andorra</div>
        <div class="slogan">al mejor precio online garantizado</div>
        <form action="<?php echo url_for('search_city') ?>" method="post">
          <?php if ($search_form->isCSRFProtected()) : ?>
            <?php echo $search_form['_csrf_token']->render(); ?>
          <?php endif; ?>
          <ul>
            <li>
              <label for="id_hotel"><strong>Destino de Andorra</strong></label> 
              <?php echo $search_form['destino']->render() ?>
            </li>
            <li><label for="search_new_fecha_entrada">Fecha de entrada:</label><?php echo $search_form['fecha_entrada']->render() ?> </li>
            <li><label for="search_new_fecha_salida">Fecha de salida:</label> <?php echo $search_form['fecha_salida']->render() ?></li>

            <li class="tienes_codigo"><input id="check_sinfecha"type="checkbox" name="sinFechas" value="1" /> Aún no he decidido las fechas</li>

          </ul>
          <div align="center"><button type="submit" title="Buscar hoteles">Buscar</button></div>
        </form>
      </div>
      <div class="hd_imagenes">
        <div id="mygalone" class="svw">
          <div class="imagenes" id="1" style="width: 690px; display: block; opacity: 1;"><img alt="Andorra" src="<?php echo sfConfig::get('app_s_img') ?>andorra1.jpg" title=""></div>
          <div class="imagenes" id="2" style="width: 690px; display: none; opacity: 1;"><img alt="Andorra" src="<?php echo sfConfig::get('app_s_img') ?>andorra2.jpg" title=""></div>
          <div class="imagenes" id="3" style="width: 690px; display: none; opacity: 1;"><img alt="Andorra" src="<?php echo sfConfig::get('app_s_img') ?>andorra3.jpg" title=""></div>
          <div class="imagenes" id="4" style="width: 690px; display: none; opacity: 1;"><img alt="Andorra" src="<?php echo sfConfig::get('app_s_img') ?>andorra4.jpg" title=""></div>
          <div class="imagenes" id="5" style="width: 690px; display: none; opacity: 1;"><img alt="Andorra" src="<?php echo sfConfig::get('app_s_img') ?>andorra5.jpg" title=""></div>
        </div>
        <div id="stripTransmitter0" class="stripTransmitter" style="width: 690px;">
          <ul>
            <li><a id="marcador1" class="marcadores current" href="#">1</a></li>
            <li><a id="marcador2" class="marcadores" href="#">2</a></li>
            <li><a id="marcador3" class="marcadores" href="#">3</a></li>
            <li><a id="marcador4" class="marcadores" href="#">4</a></li>
            <li><a id="marcador5" class="marcadores" href="#">5</a></li>
          </ul>
        </div>
      </div>
      <div style="clear: both;"></div>
    </div>

  </div>
</div>
<div class="main-container">
  <div class="main-content">

    <div class="home-under">

      <div class="home-content">

        <div class="contenido-izq">
          <h1 class="titulo-home">HOTELES EN ANDORRA</h1>

          <!---anuncio hotel-->
          <?php foreach ($lst_hotel as $hotel): ?> 
            <div class="hotel-listado">
              <div class="hotel-listado-foto">
                <a title="<?php echo $hotel['name']; ?>" href="<?php echo url_for('hotel_details', array('id' => $hotel['id'], 'slug' => $ar_slug_city[$hotel['city_id']], 'slugh' => $hotel['slug'])) ?>">
                  <img src="<?php echo $hotel['sphoto']; ?>" width="100" height="75" />
                </a>
              </div>
              <div class="hotel-listado-info">
                <div class="hotel-listado-superior">
                  <div class="hotel-precio">desde <span><?php echo round($hotel['minrate']); ?> &#8364;</span><br />
                    <a title="<?php echo $hotel['name']; ?>" href="<?php echo url_for('hotel_details', array('id' => $hotel['id'], 'slug' => $ar_slug_city[$hotel['city_id']], 'slugh' => $hotel['slug'])) ?>"><img src="images/precios-hotel.png" alt="Precios de Hotel <?php echo $hotel['name']; ?>" border="0" /></a></div>				
                  <div class="hotel-titulo"><a title="<?php echo $hotel['name']; ?>" href="<?php echo url_for('hotel_details', array('id' => $hotel['id'], 'slug' => $ar_slug_city[$hotel['city_id']], 'slugh' => $hotel['slug'])) ?>"><?php echo $hotel['name']; ?></a> <img src="images/<?php echo $hotel['start']; ?>-hotel-estrellas.png" alt="<?php echo $hotel['start']; ?> estrellas" />
                    <br />
                    <em><?php echo $hotel['address']; ?>, <?php echo $hotel['city']; ?> </em></div>
                </div>																							
                <div class="hotel-listado-descripcion">
                  <?php $desc = substr($hotel['description'], 0, 260);
                  echo substr($hotel['description'], 0, strripos($desc, ' ')) ?>...</div>
              </div>																																				
            </div>
          <?php endforeach; ?>

          <!---fin anuncio hotel-->

          <div align="center"><br /><br />
            <a class="mashoteles" href="<?php echo url_for('all_hotel') ?>" title="M&aacute;s hoteles de Andorra">M&aacute;s hoteles de Andorra</a> </div>
          <p>&nbsp;</p><br clear="all" />

        </div>

        <div class="contenido-drcha">
          <div class="titulo">Destinos de Andorra</div>
          <div class="destinos">
            <?php foreach ($lst_city as $city): ?>
              <a href="<?php echo url_for('city_hotels', array('id' => $city['id'], 'slug' => $city['slug'])) ?>" title="<?php echo $city['name']; ?>">
                <img align="left" src="<?php echo sfConfig::get('app_s_img') . 'city/' . $city['slug']; ?>.jpg" alt="<?php echo $city['name']; ?>" border="0" />
              </a> 
              <a href="<?php echo url_for('city_hotels', array('id' => $city['id'], 'slug' => $city['slug'])) ?>" title="<?php echo $city['name']; ?>"><?php echo $city['name']; ?></a>
              <br /><?php echo $city['nr_hotels']; ?> hoteles
              <br clear="all" /><br />
            <?php endforeach; ?>	
            <div  class="masdestinos" align="center"><a href="<?php echo url_for('city'); ?>">Más destinos de Andorra</a></div>
          </div>

          <br clear="all" />
          <div class="ventajas">Ventajas de reservar en AndorraHoteles</div>
          <div class="ventajas2">
            <ul>
              <li>Los mejores precios.</li>
              <li>M&aacute;s de 200 hoteles en Andorra.</li>
              <li>Disponibilidad en tiempo real.</li>	
              <li>Sin cargos por gesti&oacute;n en tus reservas.</li>
              <li>El pago se realiza en el hotel.</li>
            </ul>
          </div>
        </div>
      </div>
      <div style="clear: both;"></div>
    </div>
  </div>
</div>
</div>	
