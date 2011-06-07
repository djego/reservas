<?php slot('more_metas') ?>
<title><?php echo $hotel['name'] ?> - Reserva tu hotel en París</title>
<meta name="keywords" content="<?php echo $hotel['name'] ?>, paris, hoteles, reservas, hotel, ofertas" />
<meta name="description" content="<?php echo $hotel['name'] ?>. Reserva online tu hotel de París con pago directo en el hotel y sin comisiones." />

<?php end_slot(); ?>

<?php slot('mensaje') ?>
<div class="mensaje">
  <strong><?php echo $hotel['name'] ?></strong> (París)
  <br />
  <a href="http://www.parishoteles.net/audioguias-de-paris/" title="Audioguias de Paris">
    <embed width="468" height="60" src="<?php echo sfConfig::get('app_s_img') ?>paris-468x60.swf?clickTAG=http://www.parishoteles.net/audioguias-de-paris/"></embed>
  </a>

</div>
<?php end_slot(); ?>
<div class="main-container">
  <div class="main-content">
    <div class="navegacion">
      <div style="float:left;"><a href="<?php echo url_for('homepage'); ?>" title="Hoteles en París">Par&iacute;s Hoteles</a> > <?php echo $hotel['name'] ?></div>
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
            <h3>Buscar disponibilidad en <?php echo $hotel['name'] ?></h3>
          </dl>
          <dl class="refine">
            <?php include_partial('search_dispo', array('search_form' => $search_form)) ?>
          </dl>
          <br clear="all" />
          <h3 class="puntosdeinteres">Ubicaci&oacute;n del hotel</h3>
          <img title="<?php echo $hotel['name'] ?>, Situación del hotel" alt="<?php echo $hotel['name'] ?>, Situación del hotel"
               src="http://maps.google.com/staticmap?center=<?php echo $hotel['latitude'] ?>,<?php echo $hotel['longitude'] ?>&amp;zoom=14&amp;format=png8&amp;maptype=roadmap&amp;size=200x150&amp;markers=<?php echo $hotel['latitude'] ?>,<?php echo $hotel['longitude'] ?>,blue&amp;key=<?php echo sfConfig::get('app_key_map'); ?>" class="miniMapa">

          <br clear="all" /><br /><p>&nbsp;</p>

          <?php include_partial('destinos', array('lst_destiny' => $lst_destiny)); ?>

          <div class="ventajas">Hoteles más cercanos</div>

          <div class="seccion_hoteles_cercanos">
            <?php foreach ($hotels_nearby as $hnearby): ?>
              <div class="hotel-cercano">
                <div class="hotel-cercano-foto">
                  <a href="<?php echo url_for('hotel_details', array('id' => $hnearby['id'], 'slug' => $ar_slug_city[$hnearby['city_id']], 'slugh' => $hnearby['slug'])) ?>" title="<?php echo $hnearby['name']; ?>">
                    <img width="60" height="60" src="<?php echo $hnearby['small_photo']; ?>">
                  </a>

                </div>
                <a href="<?php echo url_for('hotel_details', array('id' => $hnearby['id'], 'slug' => $ar_slug_city[$hnearby['city_id']], 'slugh' => $hnearby['slug'])) ?>" title="<?php echo $hnearby['name']; ?>"><?php echo $hnearby['name']; ?></a> <img alt="<?php echo $hnearby['class_and']; ?> estrellas" src="<?php echo sfConfig::get('app_s_img') . $hnearby['class_and'] ?>-hotel-estrellas.png">
                <br>
                <em><?php echo $hnearby['address']; ?> </em>
              </div>
            <?php endforeach; ?>
          </div>

          <?php include_partial('hotel_history', array('histo_hotel' => $sf_user->getHotelHistory(), 'hs' => $hotel)) ?>

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
        <?php
        $la = $hotel['latitude'];
        $lo = $hotel['longitude'];
        $name = $hotel['name'];
        $city = $hotel['city'];
        $aid = sfConfig::get('app_aid');
        ?>
        <div class="listados-drcha">
          <div class="fichaHotelizq"><h1><?php echo $hotel['name']; ?> <?php if ($hotel['class_and']): ?><img src="<?php echo sfConfig::get('app_s_img') . $hotel['class_and'] ?>-hotel-estrellas.png" alt="<?php echo $hotel['class_and'] ?> estrellas" /><?php endif; ?></h1>
            <em><?php echo $hotel['address']; ?>, <?php echo $hotel['city']; ?></em> - <span><a title="ver mapa" href="" onclick="window.open('<?php echo url_for('mapa') ?>?la=<?php echo $la ?>&lo=<?php echo $lo ?>&ciudad=<?php echo $city ?>&hotel=<?php echo $name ?>','d_mapa','width=700,height=600,scrollbars=yes')">ver mapa</a></span></div>

          <div class="fichaHoteldrcha"><b>valoraci&oacute;n</b> <span><?php echo $hotel['ranking']; ?></span>
            <br /><a title="opiniones hotel" href="" onclick="window.open('http://www.booking.com/reviewlist.es.html?tmpl=reviewlistpopup;pagename=<?php echo Utils::nameurl($hotel['url']) ?>;hrwt=1;cc1=fr;target_aid=<?php echo $aid ?>;aid=<?php echo $aid ?>','popup1','width=600,height=700,scrollbars=yes');">puntuaci&oacute;n sobre <?php echo $hotel['review_nr']; ?> opiniones</a>
          </div>
          <br clear="all" /><br />
          <div class="fichaHotelfotos">
            <img alt="<?php echo $hotel['name']; ?>" src="<?php echo $hotel['medium_photo']; ?>" class="foto" width="215" height="188"/>
          </div>	
          <div class="panel">
            <ul id="fichaHotelfotosMini">
              <?php $ar = array();
              foreach ($hotel->RoomPhotos as $room_photo): ?>
                <?php $ar[$room_photo->photo_id] = array('big' => $room_photo->big_photo, 'sma' => $room_photo->small_photo); ?>
              <?php endforeach; ?>
              <?php foreach ($ar as $room_photo): ?>
                <li>
                  <a href="<?php echo $room_photo['big']; ?>" class="preview" title="<?php echo $hotel->name ?>">
                    <img src="<?php echo $room_photo['sma']; ?>" alt="<?php echo $hotel->name ?>" width="60" height="60"/>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <br clear="all" />

          <div class="listados-hoteles-descripcion">
            <?php foreach ($hotel->HotelDescs->toArray() as $desc): ?>
              <?php ?> <p><?php echo $desc['description']; ?></p>
            <?php endforeach; ?>

            <p><strong>N&uacute;mero de habitaciones:</strong> <?php echo $hotel->nr_rooms; ?></p></div>

          <br clear="all" /><br />		
          <h2 class="seccionHotel">Disponibilidad del hotel</h2>
          <?php if ($sf_request->getParameter('dispo') || $sf_request->getParameter('search')): ?>
            <?php
            if ($lst_rooms) {
              $ini = Utils::getFormattedDate($lst_rooms['arrival_date'], '%d/%m/%Y');
              $fin = Utils::getFormattedDate($lst_rooms['departure_date'], '%d/%m/%Y');
              $interval = $fin - $ini;
              ?>
              <div class="disponibilidadHotel">Habitaciones disponibles del <span><?php echo $ini ?></span> al <span><?php echo $fin ?></span>.(<a style='cursor: pointer;' onclick="muestra_oculta('modificar-fechas')">modificar fechas</a>)</div>
            <?php } else { ?>
              <div style="color: #FF1325;font-size: 14px;margin-top: 10px; padding: 10px;">No existe disponibilidad para estas  (<a style='cursor: pointer;' onclick="muestra_oculta('modificar-fechas')">modificar fechas</a>)</div>

            <?php } ?>
            <div id="modificar-fechas" class="modificarfechas" style="display:none">
              <p>Selecciona las fechas para comprabar la disponibilidad: </p>
              <?php include_partial('hsearch_dispo', array('form_dis' => $form_dis)); ?>
            </div>
            <?php if ($lst_rooms): ?>
              <div>
                <form action="https://secure.booking.com/book.html" method="get">
                  <table summary="Disponibilidad" class="tabDispoHot">
                    <tbody>
                      <tr class="separHab">
                        <th class="hTipo">Tipo de habitaci&oacute;n</th>
                        <th class="colPerson">M&aacute;x. personas</th>
                        <th class="colDispo">Disponibilidad</th>
                        <th class="hPrecio">Precio final</th>
                        <th class="hotelHabitaciones">Número de habitaciones</th>
                      </tr>
                      <?php
                      $cu = $sf_user->getAttribute('currency');
                      if ($cu['moneda'] == 'EUR') {
                        $simbol = "€";
                      } elseif ($cu['moneda'] == 'GBP') {
                        $simbol = "£";
                      } elseif ($cu['moneda'] == 'USD') {
                        $simbol = 'US$';
                      } else {
                        $simbol = $cu['moneda'];
                      }
                      ?>
                      <?php foreach ($lst_rooms['block'] as $room): ?>
                        <tr class="separHab">
                          <td class="hTipo">
                            <span><?php echo $room['name']; ?></span><br />
                            <a style='cursor: pointer;' onclick="muestra_oculta('habitacion<?php echo $room['block_id']; ?>')">Ver detalles</a>
                          </td>
                          <td class="colPerson">

                            <img height="10" width="60" alt="" src="<?php echo sfConfig::get('app_s_img'); ?>persons_<?php echo $room['max_occupancy']; ?>L.png">
                          </td>
                          <?php
                          if (count($room['incremental_price']) >= 6) {
                            $text = 'Disponible';
                            $class = 'dispohab';
                          } else {
                            $text = 'Sólo quedan ' . count($room['incremental_price']) . ' habitaciones';
                            $class = 'PocasHab';
                          }
                          ?>

                          <td class="colDispo">
                            <a title="Disponible" href="" class="<?php echo $class ?>"><?php echo $text ?></a>
                          </td>
                          <td class="hPrecio">
      <?php if ($room['min_price'][0]['price'] < $room['rack_rate'][0]['price']): ?><span class="precioTarifa"><?php echo $room['rack_rate'][0]['price']; ?> &nbsp;<?php echo $simbol ?></span><?php endif; ?>

                            <span class="colOferta"><?php echo $room['min_price'][0]['price']; ?> &nbsp;<?php echo $simbol ?></span>
                          </td>
                          <td class="hotelHabitaciones">
                            <select name="nr_rooms_<?php echo $room['block_id']; ?>" class="comboPrecio" id="nr_rooms_<?php echo $room['block_id']; ?>">
                              <option value="0">0</option>
      <?php foreach ($room['incremental_price'] as $key => $val): ?>
                                <option value="<?php echo ($key + 1) ?>"><?php echo ($key + 1) . '(' . $val['price'] . ')' ?><?php echo $simbol ?></option>
                        <?php endforeach; ?>
                            </select>
                          </td>
                        </tr>
                        <?php
                        $blk = substr($room['block_text'] . '', 13);
                        $blk2 = str_replace(']]>', '', html_entity_decode($blk));
                        $block_text = str_replace('div', 'p', $blk2);
                        ?>
                        <tr class="separacion">
                          <td colspan="5" style="width:100%">
                            <div id="habitacion<?php echo $room['block_id']; ?>" class="detallesHabitaciones" style="display:none">
                              <div class="detallesimagenes">
                                <ul>
      <?php foreach ($room['photos'] as $foto): ?>
                                    <li><a href="<?php echo $foto['url_original'] ?>" title="<?php echo $hotel['name'] ?>" class="preview"><img alt="<?php echo $hotel['name'] ?>" src="<?php echo $foto['url_square60'] ?>" width="60" height="60"/></a></li>
                              <?php endforeach; ?>
                                </ul>
                              </div>
                              <h3>Equipamiento de las habitaciones</h3>
                              <?php if ($room['block_text']): ?>
                                <p><?php echo $block_text; ?></p>
      <?php else: ?>
                                <p> No hay informacion </p>
                        <?php endif; ?>                          
                            </div>
                          </td>
                        </tr>
    <?php endforeach; ?>
                    </tbody>
                  </table>
                  <input type="hidden" name="aid" value="<?php echo $aid ?>" />
                  <input type="hidden" name="hotel_id" value="<?php echo $hotel['id']; ?>" />
                  <input type="hidden" name="checkin" value="<?php echo $lst_rooms['arrival_date']; ?>" />
                  <input type="hidden" name="interval" value="<?php echo $interval; ?>" />
                  <input type="hidden" name="selected_currency" value="<?php echo $cu['moneda']; ?>" />
                  <input type="hidden" value="es" name="lang"/>
                  <input type="hidden" value="1" name="stage"/>
                  <input type="hidden" value="ParisHoteles-net" name="label"/>
                  <input type="hidden" value="booking.com" name="hostname"/>
                  <div align="right"><button type="submit" title="Reservar hotel">Reservar ahora</button></div>
                </form>
              </div>
  <?php endif; ?>
            <?php else: ?>
            <div class="disponibilidadHotel">¿Cuándo quieres alojarte en <?php echo $hotel['name'] ?>?</div>

            <div id="modificar-fechas" class="modificarfechas">
              <p>Selecciona las fechas para comprabar la disponibilidad: </p>
  <?php include_partial('hsearch_dispo', array('form_dis' => $form_dis)); ?>

            </div>
            <?php endif; ?>
          <br clear="all" /><br />

          <div class="servicios"><h2 class="seccionHotel">Servicios <?php $hotel->name ?></h2>
<?php foreach ($lst_service as $service): ?>
              <h4><?php echo $service['type'] ?></h4>
              <p><?php echo $service['service'] ? substr($service['service'], 0, -2) : 'No hay informacion' ?>.</p>
<?php endforeach; ?>
            <!--            <h4>Otros servicios</h4>
                        <p>Centro de negocios, Registro de entrada / salida privado, Información turística, Servicio de lavandería, Servicio de consejería.</p>					

                        <h4>Internet</h4>
                        <p>Internet WIFI en todo el hotel. GRATIS</p>

                        <h4>Aparcamiento</h4>
                        <p>No hay parking.</p>-->

          </div>
          <br clear="all" /><br />
          <div class="servicios"><h2 class="seccionHotel">Condiciones del hotel</h2>
            <?php foreach ($aditional_info as $ainfo): ?>
              <h5><?php echo $ainfo->DescType->name ?></h5>
              <p><?php echo $ainfo->description ?></p>

<?php endforeach; ?>
            <h5>Otros datos </h5>
            <p><b>Hora de entrada:</b> Desde las <?php echo ($hotel->chkin_to) ? $hotel->chkin_from . ' hasta las ' . $hotel->chkin_to : $hotel->chkin_from ?> horas. </p>
            <p><b>Hora de salida:</b> <?php echo ($hotel->chkout_from) ? 'Desde las ' . $hotel->chkout_from . ' hasta las ' . $hotel->chkout_to : 'Hasta las ' . $hotel->chkout_to ?> horas. </p>
          </div>
          <br clear="all" /><br />

          <!---fin anuncio hotel-->

        </div>


        <p>&nbsp;</p><br clear="all" />

      </div>

    </div>
    <div style="clear: both;"></div>
  </div>
</div>

<script type="text/javascript">
  function muestra_oculta(id){
    if (document.getElementById){
      var el = document.getElementById(id);
      el.style.display = (el.style.display == 'none') ? 'block' : 'none';
    }
  }
  window.onload = function(){
  }
  function popup(url,w,h,l,t)
  {
    newwindow=window.open(url,'popup1','width=' + w + ',height=' + h + ',left=' + l + ',top=' + t + ',menubar=no,resizable=yes,scrollbars=yes,status=yes,toolbar=no');
    if (window.focus) {
      newwindow.focus()
    }
  }
</script>	
