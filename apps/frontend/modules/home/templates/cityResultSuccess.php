<!-- start header alternate -->
<div class="header-alt">
  <div class="slide slide-roundabout bg1">
    <div class="containit ornament-right">
      <div class="roundaboutshadow">
        <h1 class="mb4">El mejor precio garantizado.</h1>
        <p class="mb20">Haz tu reserva con AndorraHotels.com y disfruta de los mejores precios.</p>
        <!-- roundabout images targets, prettyphoto opens on click of the middle item -->
        <script type="text/javascript" charset="utf-8">
          function roundaboutimage1(){  $.prettyPhoto.open('<?php echo sfConfig::get('app_s_img'); ?>showcase/showcase1.jpg', 'title', 'Some Brilliant Project'); }
          function roundaboutimage2(){  $.prettyPhoto.open('<?php echo sfConfig::get('app_s_img'); ?>showcase/showcase2.jpg', 'title', 'Another One'); }
          function roundaboutimage3(){  $.prettyPhoto.open('<?php echo sfConfig::get('app_s_img'); ?>showcase/showcase3.jpg', 'title', 'This is Insane'); }
          function roundaboutimage4(){  $.prettyPhoto.open('<?php echo sfConfig::get('app_s_img'); ?>showcase/showcase4.jpg', 'title', 'Another Comment'); }
          function roundaboutimage5(){  $.prettyPhoto.open('<?php echo sfConfig::get('app_s_img'); ?>showcase/showcase5.jpg', 'title', 'This roundabout Rules'); }
          function roundaboutimage6(){  $.prettyPhoto.open('<?php echo sfConfig::get('app_s_img'); ?>showcase/showcase6.jpg', 'title', 'Awsome Commment'); }
          function roundaboutimage7(){  $.prettyPhoto.open('<?php echo sfConfig::get('app_s_img'); ?>showcase/showcase7.jpg', 'title', 'And Another One'); }
        </script>
        <!-- the actual roundabout -->
        <ul id="roundabout">
          <li id="roundaboutimage1"><a href="#"><img src="<?php echo sfConfig::get('app_s_up'); ?>timthumb5eb4.jpg?w=348&amp;h=228&amp;zc=1" alt="" /></a></li>
          <li id="roundaboutimage2"><a href="#"><img src="<?php echo sfConfig::get('app_s_up'); ?>timthumb4195.jpg?w=348&amp;h=228&amp;zc=1" alt="" /></a></li>
          <li id="roundaboutimage3"><a href="#"><img src="<?php echo sfConfig::get('app_s_up'); ?>timthumb76ca.jpg?w=348&amp;h=228&amp;zc=1" alt="" /></a></li>
          <li id="roundaboutimage4"><a href="#"><img src="<?php echo sfConfig::get('app_s_up'); ?>timthumb4854.jpg?w=348&amp;h=228&amp;zc=1" alt="" /></a></li>
        </ul>
        <div id="filler"><!--  --></div>
      </div>
      <!-- start the roundabout with descriptions -->
      <script type="text/javascript">
        //<![CDATA[
        var descs = {
          roundaboutimage1: 'Hotel en Xixerella',
          roundaboutimage2: 'Hotel Sispony.',
          roundaboutimage3: 'Hotel Ransol',
          roundaboutimage4: 'Hotel en Pal.'

        };
        // settings for first button, for each roundabout image one setting
        var linkone = {
          roundaboutimage1: '',
          roundaboutimage2: '',
          roundaboutimage3: '',
          roundaboutimage4: ''
        };
        // settings for second button, for each roundabout image one setting
        var linktwo = {
          roundaboutimage1: '<a class="btn-medium" href="<?php echo sfConfig::get('app_host_name') ?>/-1397214/xixerella.html"><span>Reservar Hoteles</span></a>',
          roundaboutimage2: '<a class="btn-medium" href="<?php echo sfConfig::get('app_host_name') ?>/-1396951/syspony.html"><span>Reservar Hoteles</span></a>',
          roundaboutimage3: '<a class="btn-medium" href="<?php echo sfConfig::get('app_host_name') ?>/-1396705/ransol.html"><span>Reservar Hoteles</span></a>',
          roundaboutimage4: '<a class="btn-medium" href="<?php echo sfConfig::get('app_host_name') ?>/-1396388/pal.html"><span>Reservar Hoteles</span></a>'
          //          roundaboutimage5: '<a class="btn-medium" href="http://themeforest.net/user/bogdanspn/portfolio?ref=bogdanspn"><span>Reservar Hoteles</span></a>',
          //          roundaboutimage6: '<a class="btn-medium" href="http://themeforest.net/user/bogdanspn/portfolio?ref=bogdanspn"><span>Purchase This Now</span></a>',
          //          roundaboutimage7: '<a class="btn-medium" href="http://themeforest.net/user/bogdanspn/portfolio?ref=bogdanspn"><span>Cufon Buttons are Sexy</span></a>'
        };
        // what happens on focus and on blur
        $('#roundabout li').focus(function() {
          var useLinkone = (typeof linkone[$(this).attr('id')] != 'undefined') ? linkone[$(this).attr('id')] : '';
          $('#roundaboutlinkone').html(useLinkone).fadeIn(200);
          var useLinktwo = (typeof linktwo[$(this).attr('id')] != 'undefined') ? linktwo[$(this).attr('id')] : '';
          $('#roundaboutlinktwo').html(useLinktwo).fadeIn(200);
          var useText = (typeof descs[$(this).attr('id')] != 'undefined') ? descs[$(this).attr('id')] : '';
          $('#roundaboutdescription').html(useText).fadeIn(200);
          Cufon.replace('#roundaboutdescription, #roundaboutlinkone,  #roundaboutlinktwo', { hover: true, textShadow: '1px 1px 0 #ffffff', fontFamily: 'Museo' });
        }).blur(function() {
          $('#roundaboutlinkone').fadeOut(200);
          $('#roundaboutlinktwo').fadeOut(200);
          $('#roundaboutdescription').fadeOut(200);
        });

        $(document).ready(function() {
          var interval;
          $('#roundabout')
          .roundabout({
            shape: 'lazySusan',
            easing: 'swing',
            minOpacity: 1, // 1 fully visible, 0 invisible
            minScale: 0.5, // tiny!
            duration: 400,
            btnNext: '#roundaboutnext',
            btnPrev: '#roundaboutprevious',
            clickToFocus: true
          });
        });
        function startAutoPlay() {
          return setInterval(function() {
            $('#roundabout').roundabout_animateToNextChild();
          }, 3000);
        }
        //]]>
      </script>
    </div>
  </div>

</div>
<!-- end header alternate-->

<!-- start main content -->
<div class="main-content pt-alt">
  <div class="containit">

    <!-- start display roundabout description and links -->
    <div class="boxed-harder clearfix roundaboutdescription roundabout-desclinkbox">
      <div class="fl roundabout-arrows">
        <img src="<?php echo sfConfig::get('app_s_img'); ?>arrow-next-smaller.png" alt="" />
      </div>
      <div class="fl roundabout-desc"><h1 id="roundaboutdescription"></h1></div>
      <div class="fr roundabout-link clearfix"><div id="roundaboutlinkone" class="fl"></div><div id="roundaboutlinktwo" class="fl"></div></div>
    </div>
    <!-- end display roundabout description and links -->

    <div class="full-width clearfix">
      <div class="one-third pt10 border-vert-right-alt">
        <div class="padright">
          <div class="icon-to-left"></div>
        </div>
      </div>
      <div class="one-third-last pt10">
        <div class="padright"> </div>
      </div>
    </div>
    <div class="wide-horz-divider"><!--  --></div>
    <form style="float: left" method="post" action="<?php echo url_for('search') ?>">

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

    <div class="wide-horz-divider"><!--  --></div>
    <div style="float: left;margin-top: 15px;">
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
                        <?php $ar_type_room = $data->fetchRcp('bookings.getRoomTypes', 'languagecodes=es&roomtype_ids='.$room["roomtype_id"]); ?>
                         <tr class="separacion">
                          <td class="hotelTipo">Habitación <?php echo ($ar_type_room[0]['name']); ?></td>
                          <td class="hotelPersonas"><?php echo $room['max_persons']; ?></td>
                          <td class="hotelDisponibilidad">Disponibles</td>
                          <td class="hotelPrecio"><span class="precioTarifa"><?php echo $room['max_price']; ?>€</span> <span class="precioOferta"><?php echo $room['max_price']; ?>€</span></td>
                        </tr>
                      <?php endforeach; ?>
                        </table>
                    </li>
                  </ul></div>
            <?php
              }
            }
            ?>
    </div>


    <div class="full-width">
      <div class="two-third"></div>
      <div class="clear"></div>
    </div>

  </div>
</div>
<!-- end main content -->

