<!-- Paginador -->
<script type="text/javascript">
  $(function() {
    $("#paginado").html("");
    $("#listNews li").quickpaginate({
      perpage: 14,
      pager : $("#paginado") ,
      showcounter : true
    });
  });
</script>

<!-- End Paginador -->

<!-- start header inner -->
<div class="header-inner">
  <div class="background bg1 clearfix">
    <div class="containit">
      <h1>Ciudades</h1>
      <div class="subtitle">
        <h3>Listado de hoteles en Andorra</h3></div>
    </div>
  </div>
  <div class="bottom-shadow"><!--  --></div>
</div>
<!-- end header inner -->

<div class="main-content">
  <div class="containit">
    <div class="full-width clearfix pt0">
      <div class="breadcrumbs">
        <ul class="clearfix">
          <li class="first"><a href="<?php echo url_for('homepage'); ?>">Home</a></li>
          <li>Hoteles en <?php echo $city_name; ?></li>
        </ul>
      </div>
      <div class="blinks">
        <ul>
          <li><img src="<?php echo sfConfig::get('app_s_img')?>icons/icon-favorite.png" width="16" height="16" alt="" class="vm"/> <a href="#">Bookmark This Page</a></li>
          <li><img src="<?php echo sfConfig::get('app_s_img')?>icons/icon-share.png" width="16" height="16" alt="" class="vm"/>
            <!-- AddThis Button BEGIN -->
            <a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;username=xa-4c9218561886c99b">Add This</a>
            <script type="text/javascript" src="../../../../s7.addthis.com/js/250/addthis_widget.js#username=xa-4c9218561886c99b"></script>
            <!-- AddThis Button END -->
          </li>
        </ul>
      </div>
    </div>

    <div class="wide-horz-divider"><!--  --></div>
    <div id="paginado" style="width:205px; top:45px; left:787px; z-index:30;"></div>
    <div class="full-width clearfix pt0">


      <div class="two-third border-vert-right">
         <h3>Hoteles en <?php echo $city_name; ?></h3>
      <?php
      $hotel = "";
      $deshotel = "";
      $i = 0;
      foreach ($lst_hoteles as $val) {
        $i++;
        $ciu = $val["city"];
        if ($i == 0) {
          ?>
      <div class="padright"><h1 class="mt15">Ciudad de <a href="#"><?php echo $val["city"] ?></a></h1></div>

          <?php
        }
        if ($hotel != $val["name"]) {
          $hotel = $val["name"];
          ?>
      <div class="modulo6001">
        <ul id="hoteles">
              <?php
              foreach ($lst_photo as $foto) {
                if ($val["hotel_id"] == $foto["hotel_id"]) {
                  $v_hotel = $foto["hotel_id"];
                  $detmap = explode(".", $val["url"]);
                  $mapa = $detmap[0] . "." . $detmap[1] . "." . $detmap[2] . "/" . $val["hotel_id"] . "/map";
                  $la = $val["location"][0]["latitude"];
                  $lo = $val["location"][0]["longitude"];
                  $slug_h = Utils::slugify($hotel);
                  ?>
          <li>
            <div class="fotoHotel">
              <a class="preview" title="<?php echo $hotel; ?>" href="<?php echo url_for('hotel_details', array('id' => $v_hotel, 'slug' => $slug_c, 'slugh' => $slug_h)) ?>">
                <img height="100" width="150" alt="<?php echo $hotel; ?>" src="<?php echo $foto["url_max300"] ?>">
              </a>
            </div>
            <div class="hotelText">
              <div class="tituloHotel">
                <a class="preview" title="<?php echo $hotel; ?>" href="<?php echo url_for('hotel_details', array('id' => $v_hotel, 'slug' => $slug_c, 'slugh' => $slug_h)) ?>"><?php echo $hotel ?></a>
                <img alt="<?php echo $val["class"] ?>estrellas" src="<?php echo sfConfig::get('app_s_img') . trim($val["class"]) ?>estrellas.png">
              </div>
              <div class="direccion"><?php echo $val["address"] ?>&nbsp;<a class="preview"  onclick=" window.open('<?php echo url_for('mapa') ?>?la=<?php echo $la ?>&lo=<?php echo $lo ?>&ciudad=<?php echo $ciu ?>&hotel=<?php echo $hotel ?>','d_mapa','width=700,height=600,scrollbars=yes')" rel="nofollow"><b>Ver Mapa</b></a></div>
                      <?php
                    }
                  }
                  foreach ($lst_desc as $tex_desc) {
                    if ($deshotel != $tex_desc["hotel_id"]) {
                      $deshotel = $tex_desc["hotel_id"];
                      if ($val["hotel_id"] == $deshotel) {
                        ?>
              <div class="descripcion"><?php echo substr($tex_desc["description"], 0, 260) ?>...<a class="preview"	href="<?php echo url_for('hotel_details_result', array('id' => $v_hotel, 'slug' => $slug_c, 'slugh' => $slug_h)) ?>"  title="Ampliar detalle de Hotel <?php echo $hotel ?>">Ampliar</a></div>
                        <?php
                      }
                    }
                  } ?>
            </div>
          </li>
          <li>
            <table class="tablaHoteles">
              <tr class="separacion">
                <th class="hotelTipo">Tipo de habitación</th>
                <th class="hotelPersonas">Personas máximas</th>
                <th class="hotelDisponibilidad">Disponibilidad</th>
                <th class="hotelPrecio">Total 1 noche</th>
              </tr>
                  <?php
                  $hotel_rooms = $data->fetchRcp('bookings.getRooms', 'countrycodes=ad&hotel_ids='.$val["hotel_id"]);
                  $ar_type_room = array();
                  foreach ($hotel_rooms as $room):?>
                    <?php if($room['max_price'] &&  $room['min_price']) {
                      $ar_type_room = $data->fetchRcp('bookings.getRoomTypes', 'languagecodes=es&roomtype_ids='.$room["roomtype_id"]);
                      ?>
              <tr class="separacion">
                <td class="hotelTipo">Habitación <?php echo ($ar_type_room[0]['name']); ?></td>
                <td class="hotelPersonas"><?php echo $room['max_persons']; ?></td>
                <td class="hotelDisponibilidad">Disponibles</td>
                <td class="hotelPrecio"><span class="precioTarifa"><?php echo $room['max_price']; ?>€</span> <span class="precioOferta"><?php echo $room['min_price']; ?>€</span></td>
              </tr>
                      <?php } endforeach; ?>
            </table>
          </li>
        </ul></div>
          <?php
        }
      }
?>
      </div>

      <div id="paginado" style="width:205px; top:45px; left:787px; z-index:30;"></div>
      <div class="one-third-last pt20">
        <div class="padright">

          <div class="blog-search">
            <form class="form_search" method="post" action="<?php echo url_for('search') ?>">

              <h3>Buscar hoteles</h3>
              <?php if ($form->isCSRFProtected()) : ?>
                <?php echo $form['_csrf_token']->render(); ?>
              <?php endif; ?>
              <div style="float: left;">
                <label style="float: left;width: 100px">Ciudad:</label>&nbsp;
                <?php echo $form['ciudad']->render(array('style' => 'float:left')) ?>
              </div>
              <div style="float:left;clear: left">
                <label style="float: left;width: 100px">Fecha de llegada:</label>&nbsp;
                <?php echo $form['fecha-inicio']->render(array('style' => 'float:left')) ?>
              </div>
              <div style="float:left;clear: left">
                <label style="float: left;width: 100px">Fecha de salida:</label>&nbsp;
                <?php echo $form['fecha-final']->render(array('style' => 'float:left')) ?>
              </div>
              <div style="float:left;clear: left">
                <input type="submit" value="Buscar" />
              </div>
            </form>
          </div>

          <h2>Por que reservar</h2>
          <ul class="menu-list">
            <li><a href="#">Los mejores precios</a></li>

            <li><a href="#">Máxima variedad</a></li>
            <li><a href="#">Clientes satisfechos</a></li>
            <li><a href="#">Consejos imparciales</a></li>
            <li><a href="#">Hablamos tu idioma</a></li>
          </ul>

          <h2>Sobre Andorra</h2>
          <p>El Principado de Andorra (en catalán, Principat d'Andorra) es un pequeño país del sur de Europa con una extensión de 468 km2, situado en los Pirineos entre España y Francia.</p>

          <div class="half-this">
            <div class="padright">
              <h4>Ciudades</h4>
              <ul class="menu-list">
                <li><a href="#">La Massana</a></li>
                <li><a href="#">Soldeu</a></li>
                <li><a href="#">Ransol</a></li>
                <li><a href="#">Ordino</a></li>
                <li><a href="#">Meritxell</a></li>
              </ul>
            </div>
          </div>
          <div class="half-this">
            <h4>Ciudades</h4>
            <ul class="menu-list">
              <li><a href="#">Aldosa de Canillo</a></li>
              <li><a href="#">Escaldes-Engordany</a></li>
              <li><a href="#">Ansalonga</a></li>
              <li><a href="#">Bixessarri</a></li>
              <li></li>
            </ul>
          </div>
          <div class="clear"></div>



        </div>
      </div>                     <div class="clear"></div>

      <div class="wide-horz-divider"><!--  --></div>
      <div class="mt20"><!--  --></div>
      <div class="fr clearfix"></div>
      <div class="clear"></div>
      <br/>
    </div>



  </div>
</div>


<div style="float: left;margin-top: 15px;">
     
    </div>
