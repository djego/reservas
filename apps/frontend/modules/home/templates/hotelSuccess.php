<?php
foreach ($hotel->HotelDescs->toArray() as $desc){
   if($desc['descriptiontype_id'] == 6) $description  = $desc['description'];
}

    $title = $hotel['name'].' - '.$hotel['city'].' - Destinos de Andorra - Ofertas de Hoteles en Andorra ';
    $desc = $description;
    $keyword = $hotel['name'].', '.$hotel['city'].', destinos, hoteles, hotel, andorra, reservar hotel, hoteles en, viajes, viaje, viajar, reservas, ofertas, barato, esqui, ordino, tarter, escaldes';
    $sf_response->addMeta('title', $title);
    $sf_response->addMeta('description', $desc);
    $sf_response->addMeta('keywords', $keyword);

?>
<div class="main-container">
  <div class="main-content">

    <div class="home-under">

      <div class="home-content2">
        <div class="navegacion">
          <a href="<?php echo url_for('homepage');  ?>" title="Hoteles en Andorra">Andorra Hoteles</a>
          > <a href="<?php echo url_for('city_hotels', array('id' => $hotel['city_id'], 'slug' => $ar_slug_city[$hotel['city_id']])) ?>" title="Hoteles en <?php echo $hotel['city'] ?>">Hoteles en <?php echo $hotel['city'] ?></a> > <?php echo $hotel['name'] ?></div>

        <div class="listados-izq">

          <b>B&uacute;squeda de disponibilidad</b>
          <br />&nbsp;

          <dl class="refine">

            <form action="<?php echo url_for('hotel_details_result', array('id' => $hotel['id'], 'slug' => $ar_slug_city[$hotel['city_id']],  'slugh' =>$hotel['slug'] ))?>" method="post">
              <?php if ($search_form->isCSRFProtected()) : ?>
                <?php echo $search_form['_csrf_token']->render(); ?>
              <?php endif; ?>
              <dt>Fecha de entrada:</dt>
              <dd><?php echo $search_form['fecha_entrada']->render() ?></dd>
              <dt>Fecha de salida:</dt>
              <dd><?php echo $search_form['fecha_salida']->render() ?></dd>

              <div align="center"><button type="submit" title="Buscar hoteles">Buscar</button></div>
            </form>
            
            

          </dl>

          <br clear="all" />

          <b>Ubicaci&oacute;n del hotel</b>
          <img title="<?php echo $hotel['name']?>, Situación del hotel" alt="<?php echo $hotel['name']?>, Situación del hotel"
               src="http://maps.google.com/staticmap?center=<?php echo $hotel['latitude'] ?>,<?php echo $hotel['longitude'] ?>&amp;zoom=14&amp;format=png8&amp;maptype=roadmap&amp;size=200x200&amp;markers=<?php echo $hotel['latitude'] ?>,<?php echo $hotel['longitude'] ?>,blue&amp;key=<?php echo sfConfig::get('app_key_map');?>" class="miniMapa">

          <br clear="all" /><br /><p>&nbsp;</p>

          <b>Hoteles Cercanos a <?php echo $range ?> Km</b>
          <div class="seccion_hoteles_cercanos">
            <?php foreach ($hotels_nearby as $hnearby): ?>
            <div class="hotel-cercano">
              <div class="hotel-cercano-foto">
                <a href="<?php echo url_for('hotel_details', array('id' =>$hnearby['id'], 'slug' => $ar_slug_city[$hnearby['city_id']], 'slugh' => $hnearby['slug'])) ?>" title="<?php echo $hnearby['name'];?>">
                  <img width="60" height="60" src="<?php echo $hnearby['small_photo'];?>">
                </a>

              </div>
              <a href="<?php echo url_for('hotel_details', array('id' =>$hnearby['id'], 'slug' => $ar_slug_city[$hnearby['city_id']], 'slugh' => $hnearby['slug'])) ?>" title="<?php echo $hnearby['name'];?>"><?php echo $hnearby['name'];?></a> <img alt="<?php echo $hnearby['class_and']; ?> estrellas" src="<?php echo sfConfig::get('app_s_img').$hnearby['class_and'] ?>-hotel-estrellas.png">
              <br>
              <em><?php echo $hnearby['address'];?> </em>
            </div>
            <?php endforeach; ?>
          </div>


          <div class="ventajas">Reserve en AndorraHoteles</div>
          <div class="ventajas2">
            <ul>
              <li>Los mejores precios.</li>
              <li>M&aacute;s de 200 hoteles en Andorra.</li>
              <li>Disponibilidad en tiempo real.</li>
              <li>Sin cargos por gesti&oacute;n en tus reservas.</li>
              <li>El pago se realiza en el hotel.</li>
            </ul>
          </div>
          <br clear="all" /><p>&nbsp;</p><p>&nbsp;</p>

        </div>
        <?php
        $la = $hotel['latitude'];
        $lo = $hotel['longitude'];
        $name = $hotel['name'];
        $city = $hotel['city'];
        $aid = sfConfig::get('app_aid');
        ?>
        <div class="listados-drcha">
          <div class="fichaHotelizq"><h1><?php echo $hotel['name']; ?> <img src="<?php echo sfConfig::get('app_s_img') . $hotel['class_and'] ?>-hotel-estrellas.png" alt="<?php echo $hotel['class_and'] ?> estrellas" /></h1>
            <em><?php echo $hotel['address']; ?>, <?php echo $hotel['city']; ?></em> - <span><a title="ver mapa" href="" onclick="window.open('<?php echo url_for('mapa') ?>?la=<?php echo $la ?>&lo=<?php echo $lo ?>&ciudad=<?php echo $city ?>&hotel=<?php echo $name ?>','d_mapa','width=700,height=600,scrollbars=yes')">ver mapa</a></span></div>

          <div class="fichaHoteldrcha"><b>valoraci&oacute;n</b> <span><?php echo $hotel['ranking']; ?></span>
            <br /><a title="opiniones hotel" href="" onclick="window.open('http://www.booking.com/reviewlist.es.html?tmpl=reviewlistpopup;pagename=<?php echo Utils::nameurl($hotel['url']) ?>;hrwt=1;cc1=ad;target_aid=<?php echo $aid ?>;aid=<?php echo $aid ?>','popup1','width=600,height=700,scrollbars=yes');">puntuaci&oacute;n sobre <?php echo $hotel['review_nr']; ?> opiniones</a>
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
              <?php  ?> <p><?php echo $desc['description']; ?></p>
<?php endforeach; ?>

            <p><strong>N&uacute;mero de habitaciones:</strong> <?php echo $hotel->nr_rooms; ?></p></div>

          <br clear="all" /><br />		
          <h2 class="seccionHotel">Disponibilidad del hotel</h2>
          <?php if ($sf_request->isMethod('post')): ?>
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
            <p>Selecciona las fechas para comprabar la disponibilidad: </p> <br />
            <form action="" method="post">
                <?php if ($form_dis->isCSRFProtected()) : ?>
                  <?php echo $form_dis['_csrf_token']->render(); ?>
                <?php endif; ?>
              <table border="0" cellpadding="0" cellspacing="4">
                <tr>
                  <td colspan="2">
                    <span>Fecha de entrada:</span>
                  </td>
                  <td valign="top">
  <?php echo $form_dis['fecha_entrada']->render(array('size' => '11')) ?>
                  </td>
                  <td colspan="3">
                    <span>Fecha de salida:</span>
                  </td>
                  <td valign="top">
  <?php echo $form_dis['fecha_salida']->render(array('size' => '11')) ?>
                  </td>
                  <td>
                    &nbsp; &nbsp; <button type="submit" title="Buscar">Buscar</button>
                  </td>
                </tr>

              </table>
            </form>
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
    <?php foreach ($lst_rooms['block'] as $room):?>
                  <tr class="separHab">
                    <td class="hTipo">
                      <span><?php echo $room['name']; ?></span><br />
                      <a style='cursor: pointer;' onclick="muestra_oculta('habitacion<?php echo $room['block_id']; ?>')">Ver detalles</a>
                    </td>
                    <td class="colPerson">

                      <img height="10" width="60" alt="" src="<?php echo sfConfig::get('app_s_img');?>persons_<?php echo $room['max_occupancy']; ?>L.png">
                    </td>
                          <?php if(count($room['incremental_price']) >= 6 ) {
                            $text = 'Disponible';
                            $class = 'dispohab';
                          }else {
                            $text = 'Sólo quedan '.count($room['incremental_price']).' habitaciones';
                            $class = 'PocasHab';
      } ?>

                    <td class="colDispo">
                      <a title="Disponible" href="" class="<?php echo $class ?>"><?php echo $text ?></a>
                    </td>
                    <td class="hPrecio">
      <?php if($room['min_price'][0]['price'] < $room['rack_rate'][0]['price']   ): ?><span class="precioTarifa"><?php echo $room['rack_rate'][0]['price']; ?> &nbsp;€</span><?php endif; ?>

                      <span class="colOferta"><?php echo $room['min_price'][0]['price']; ?> &nbsp;€</span>
                    </td>
                    <td class="hotelHabitaciones">
                      <select name="nr_rooms_<?php echo $room['block_id']; ?>" class="comboPrecio" id="nr_rooms_<?php echo $room['block_id']; ?>">
                        <option value="0">0</option>
                       <?php foreach ($room['incremental_price'] as $key => $val):?>
                        <option value="<?php echo ($key+1) ?>"><?php echo ($key+1).'('.$val['price'].')' ?>€</option>
                        <?php endforeach; ?>
                      </select>
                    </td>
                  </tr>
                  <tr class="separacion">
                    <td colspan="5" style="width:100%">
                      <div id="habitacion<?php echo $room['block_id']; ?>" class="detallesHabitaciones" style="display:none">
                        <div class="detallesimagenes">
                          <ul>
                            <?php foreach($room['photos'] as $foto):?>
                            <li><a href="<?php echo  $foto['url_original'] ?>" title="<?php echo  $hotel['name'] ?>" class="preview"><img alt="<?php echo  $hotel['name'] ?>" src="<?php echo  $foto['url_square60'] ?>" width="60" height="60"/></a></li>
                            <?php endforeach; ?>
                            </ul>
                        </div>                         
                        <h3>Equipamiento de las habitaciones</h3>
                        <p><?php 
                         $blk =  (string) $room['block_text'];
                         $blk2 =  str_replace(']]>', '', html_entity_decode($blk));
                                  echo str_replace('div','p',$blk2);
                          ?>
                        </p>
                        
                      </div></td>
                  </tr>
    <?php endforeach; ?>
                </tbody>
              </table>
              <input type="hidden" name="aid" value="<?php echo $aid ?>" />
              <input type="hidden" name="hotel_id" value="<?php echo $hotel['id']; ?>" />
              <input type="hidden" name="checkin" value="<?php echo $lst_rooms['arrival_date']; ?>" />
              <input type="hidden" name="interval" value="<?php echo $interval; ?>" />
              <input type="hidden" value="es" name="lang"/>
              <input type="hidden" value="1" name="stage"/>
              <input type="hidden" value="Andorra-Hoteles" name="label"/>
              <input type="hidden" value="booking.com" name="hostname"/>
              <div align="right"><button type="submit" title="Reservar hotel">Reservar ahora</button></div>
            </form>
          </div>
            <?php endif; ?>
<?php else: ?>
          <div class="disponibilidadHotel">¿Cuándo quieres alojarte en el Hotel <?php echo $hotel['name'] ?>?</div>

          <div id="modificar-fechas" class="modificarfechas">
            <p>Selecciona las fechas para comprabar la disponibilidad: </p> <br />
            <form action="" method="post">
                <?php if ($form_dis->isCSRFProtected()) : ?>
                  <?php echo $form_dis['_csrf_token']->render(); ?>
  <?php endif; ?>
              <table border="0" cellpadding="0" cellspacing="4">
                <tr>
                  <td colspan="2">
                    <span>Fecha de entrada:</span>
                  </td>
                  <td valign="top">
  <?php echo $form_dis['fecha_entrada']->render(array('size' => '11')) ?>
                  </td>
                  <td colspan="3">
                    <span>Fecha de salida:</span>
                  </td>
                  <td valign="top">
  <?php echo $form_dis['fecha_salida']->render(array('size' => '11')) ?>
                  </td>
                  <td>
                    &nbsp; &nbsp; <button type="submit" title="Buscar">Buscar</button>
                  </td>
                </tr>

              </table>
            </form>

          </div>
<?php endif; ?>
          <br clear="all" /><br />

          <div class="servicios"><h2 class="seccionHotel">Servicios <?php $hotel->name ?></h2>
<?php foreach ($lst_service as $service): ?>
            <h4><?php echo $service['type'] ?></h4>
            <p><?php echo $service['service']?substr($service['service'],0,-2):'No hay informacion' ?>.</p>
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

<?php endforeach;?>
            <h5>Otros datos </h5>
            <p><b>Hora de entrada:</b> Desde las <?php echo ($hotel->chkin_to)?$hotel->chkin_from.' hasta las '.$hotel->chkin_to:$hotel->chkin_from ?> horas. </p>
            <p><b>Hora de salida:</b> <?php echo ($hotel->chkout_from)?'Desde las '.$hotel->chkout_from.' hasta las '.$hotel->chkout_to:'Hasta las '.$hotel->chkout_to ?> horas. </p>
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
