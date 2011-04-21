<script src="http://reservaria.es/js/imagepreview.js" type="text/javascript"></script> 
<!-- start header inner -->
<div class="header-inner">
  <div class="background bg1 clearfix">
    <div class="containit">
      <h1>Hoteles</h1>
      <div class="subtitle">
        <h3>Detalle de Hoteles</h3></div>
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
          <li><a title="Hoteles en  <?php  echo $city_name ?>" href="<?php echo url_for('city_hotels',array('id' =>$city_id,'slug'=>$slug_c))?>"> Hoteles en  <?php  echo $city_name ?></a></li>
          <li><?php echo $hotel_name ?></li>
        </ul>
      </div>
      <div class="blinks">
        <ul>
          <li><img src="<?php echo sfConfig::get('app_s_img'); ?>icons/icon-favorite.png" width="16" height="16" alt="" class="vm"/> <a href="#">Bookmark This Page</a></li>
          <li><img src="<?php echo sfConfig::get('app_s_img'); ?>icons/icon-share.png" width="16" height="16" alt="" class="vm"/>
            <!-- AddThis Button BEGIN -->
            <a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;username=xa-4c9218561886c99b">Add This</a>
            <script type="text/javascript" src="../../../../s7.addthis.com/js/250/addthis_widget.js#username=xa-4c9218561886c99b"></script>
            <!-- AddThis Button END -->
          </li>
        </ul>
      </div>
    </div>

    <div class="wide-horz-divider"><!--  --></div>

    <div class="full-width clearfix pt0">
      <div class="two-third border-vert-right">
        <?php
        //$arrNameTypeService = $this->getNameTypeService();
        $room="";
        $room_first="";
        $resumen="";
        $photo60="";
        echo "<div class=\"modulo6001\">";
        foreach ($rs_hotel as $detalle) {
          $nameurl=appFrontend::nameurl($detalle["url"]);
          $valoracion=$detalle["review_score"];
          echo"<div class=\"tituloPagina\"><div class=\"floatLeft\"><h1 class=\"preview\">".$detalle["name"]."<img alt=\"".$detalle["class"]." estrellas\" src=\"".sfConfig::get('app_s_img').$detalle["class"]."estrellas.png\"></h1><div class=\"direccion\">".$detalle["address"]."</div></div>";
          echo "<div class=\"floatRight valoracion\"><b>Valoración</b> <span class=\"numeroNota\">".appFrontend::redondeado($detalle["review_score"],"1")."</span><img src=\"".sfConfig::get('app_s_img')."barraValoracion.png\" class=\"imagenValoracion\" width=\"85\" height=\"7\" style=\"background-position: ".round(($detalle["review_score"]*10)-10)."px 0pt;\" alt=\"Valoración\"/><br />".$detalle["review_nr"]." opiniones - <a  class=\"preview\" onclick=\"window.open('http://www.booking.com/reviewlist.es.html?tmpl=reviewlistpopup;pagename=$nameurl;hrwt=1;cc1=ad;target_aid=".$detalle["hotel_id"].";aid=".$detalle["hotel_id"]."','popup1','width=600,height=700,scrollbars=yes')\"; return false;\"><b>Ver últimas</b></a></div></div><br>";
          echo"<div class=\"imagenHotel\">";
          foreach ($rs_photo as $detalle_foto) {
            if($room_first!=$detalle_foto["photo_id"]) {
              $room_first=$detalle_foto["photo_id"];
              echo"<img class=\"foto\" height=\"188\" width=\"215\"  alt=\"".$detalle["name"]."\" src=\"".$detalle_foto["url_max300"]."\">";
            }
          }
          echo"</div>";
          echo "<div class=\"panel\"><ul id=\"imagenesHotelMicro\">";

          foreach ($lst_photos_room as $cuarto_fotos) {
            if($room!=$cuarto_fotos["photo_id"]) {
              $room=$cuarto_fotos["photo_id"];
              if ($photo60!=$cuarto_fotos["url_square60"]) {
                $photo60=$cuarto_fotos["url_square60"];
                $sizeoriginal=$cuarto_fotos["url_original"];
                //echo "<li><a title=\"".$detalle["name"]."\" class=\"preview\" href=\"".$cuarto_fotos["url_original"]."\"><img height=\"44\" width=\"44\" alt=\"".$detalle["name"]."\" src=\"$photo60\"  onmouseover=sendEvent('../../hoteles/caseDetalleHotel/eve.php','d_foto','evento=verfoto&src=$sizeoriginal') onmouseout=sendEvent('../../hoteles/caseDetalleHotel/eve.php','d_foto','evento=verfoto&sr=X')></a></li>";
                echo "<li><a title=\"".$detalle["name"]."\" class=\"preview\" href=\"".$cuarto_fotos["url_original"]."\"><img width=\"44\" height=\"44\" alt=\"".$detalle["name"]."\" src=\"$photo60\"></a></li>";
              }
            }
          }
          echo"</ul></div></div><div id=\"d_foto\"></div>     ";//</div><div id=\"d_foto\"></div>
          echo "<div class=\"modulo6001\"><div class=\"descripcionHotel\">";
          foreach ($lst_hotel_desc as $descripcion) {
            if($resumen!=$descripcion["descriptiontype_id"]) {
              $resumen=$descripcion["descriptiontype_id"];
              echo"<p>".$descripcion["description"]."</p>";
            }
          }
          echo" <p>Número de habitaciones : ".$detalle["nr_rooms"]."</p></div></div>";
          /*echo "<input    type=\"button\"  style=\"cursor:pointer\" value=\"Reservar Ahora\"  class=\"btn-medium\" onclick=\"window.open('http://www.booking.com/hotel/ad/$nameurl.html?aid=".$detalle["hotel_id"]."#availability_target','popup2','width=1020,height=1000,scrollbars=yes')\">";*/

          ?>
        <div class="modulo6001">
          <h3>Disponibilidad y precios</h3>
          <form action="" method="post">
            <?php if ($form_dis->isCSRFProtected()) : ?>
            <?php echo $form_dis['_csrf_token']->render(); ?>
            <?php endif; ?>
            <div style="float:left;">
              <label style="float: left;width: 120px">Fecha de llegada:</label>&nbsp;
                <?php echo $form_dis['fecha-inicio']->render(array('style' => 'float:left')) ?>
            </div>
            <div style="float:left;">
              <label style="float: left;width: 120px">Fecha de salida:</label>&nbsp;
                <?php echo $form_dis['fecha-final']->render(array('style' => 'float:left')) ?>
            </div>
            <div style="float:left; margin-bottom: 5px">
              <input type="submit" value="Ver disponibilidad y precios" />
            </div>
          </form>
                  
          <?php if($sf_request->isMethod('post')):?>
          <?php
                $ini = Utils::getFormattedDate($lst_rooms['arrival_date'],'%d %F %Y');
                $fin = Utils::getFormattedDate($lst_rooms['departure_date'],'%d %F %Y');
          		$interval = $fin - $ini;
		  ?>  
          <div style="float: left;background-color: #EEF5FA">
          <p>Habitaciones disponibles del <span style="font-weight: bold"><?php echo $ini ?></span> al <span style="font-weight: bold"><?php echo $fin ?></span></p>
          <p>Selecciona el número de habitaciones y pulsa reservar</p>
          </div>
          <form action="https://secure.booking.com/book.html" method="get">
          <div style="float: left;clear: left">
              <?php if($sf_user->getFlash('notice')): ?>
            <h4><?php echo $sf_user->getFlash('notice')?> </h4>
              <?php endif;?>
            <table class="tablaHoteles">
            <tr class="separacion">
              <th class="hotelTipo">Tipo de habitación</th>
              <th class="hotelPersonas">Personas máximas</th>
              <th class="hotelDisponibilidad">Disponibilidad</th>
              <th class="hotelPrecio">Total  <?php echo $interval>1?$interval.' noches':$interval.' noche'?> </th>
              <th class="hotelHabitaciones">Número de habitaciones</th>
            </tr>
            
            <?php foreach ($lst_rooms['block'] as $room):?>
              <tr class="separacion">
                <td class="hotelTipo"><?php echo $room['name']; ?></td>
                <td class="hotelPersonas"><?php echo $room['max_occupancy']; ?></td>
                <td class="hotelDisponibilidad">
                	<?php if(count($room['incremental_price']) >= 7 ):?>
                	Disponible
                	<?php elseif(count($room['incremental_price']) >=4 && count($room['incremental_price'])<=6 ): ?>
                	Quedan <?php echo count($room['incremental_price']) ?> habitaciones
                	<?php else: ?>
                	Sólo quedan <?php echo count($room['incremental_price']) ?> habitaciones
                	<?php endif; ?>                	
                </td>
                <td class="hotelPrecio"><span class="precioTarifa"><?php echo $room['rack_rate'][0]['price']; ?>€</span> <span class="precioOferta"><?php echo $room['min_price'][0]['price']; ?>€</span></td>
                <td class="hotelHabitaciones">

                  <select name="nr_rooms_<?php echo $room['block_id']; ?>" class="comboPrecio" id="nr_rooms_<?php echo $room['block_id']; ?>">
                    <option value="0">0</option>
                    <?php foreach ($room['incremental_price'] as $key => $val):?>
                    <option value="<?php echo ($key+1) ?>"><?php echo ($key+1).'('.$val['price'].')' ?>€</option>
                    <?php endforeach; ?>
                  </select>

                </td>
              </tr>
            <?php endforeach; ?>
          </table>
          </div>
          <?php endif; ?>
		<input type="hidden" name="aid" value="323497" />
		<input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>" />
        <input type="hidden" name="checkin" value="<?php echo $lst_rooms['arrival_date']; ?>" />
        <input type="hidden" name="interval" value="<?php echo $interval; ?>" />
        <input type="hidden" value="es" name="lang">
        <input type="hidden" value="1" name="stage">
        <input type="hidden" value="Andorra-Hoteles" name="label">
        <input type="hidden" value="booking.com" name="hostname">
        <div class="fl clearfix">
			<button type="submit" class="btn-medium">Reservar Ahora </button>
        </div>
        	
        </form>


        </div>
        <div class="modulo6001">
          <h2 class="tituloSeccion">Servicios del hotel</h2>
          <?php foreach ($lst_services as $service):?>
          <?php if($service['items']):?>
          <h3><?php echo $service['type'] ?></h3>
          <p style="text-align: left "><?php echo substr($service['items'], 0, -2) ?> </p>
          <?php endif; ?>
          <?php endforeach;?>
        </div>
        <br>
       
        
          <?php
        }

        ?>


      </div>

      <div class="one-third-last pt20">
        <div class="padright">

          <div class="blog-search">
            <?php include_partial('form_search',array('form' =>$form)) ?>
          </div>

          <div class="one-third-last pt20">
            <div class="padright">
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
          </div>
          <h2>&nbsp;</h2></div></div><div class="clear"></div>

      <div class="wide-horz-divider"><!--  --></div>
      <div class="mt20"><!--  --></div>

      <div class="fr clearfix"></div>
      <div class="clear"></div>
      <br/>
    </div>



  </div>
</div>
