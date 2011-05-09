<div class="main-container">
  <div class="main-content">

    <div class="home-under">

      <div class="home-content2">
        <div class="navegacion"><a href="http://www.andorrahoteles.com" title="Hoteles en Andorra">Andorra Hoteles</a> > <a href="http://www.andorrahoteles.com" title="Hoteles en Andorra">Hoteles en Andorra La Vella</a> > Hotel Mena Andorra</div>

        <div class="listados-izq">



          <form id="frm-refine" action="" class="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <b>B&uacute;squeda de disponibilidad</b>
            <br />&nbsp;

            <dl class="refine">


              <form action="/es/bookcore_engine/availability/" method="post">

                <dt>Fecha de entrada:</dt><dd><input class="hasDatepicker" name="fecha_entrada" value="08/04/2011" id="id_fecha_entrada" type="text"></dd>
                <dt>Fecha de salida:</dt><dd> <input class="hasDatepicker" name="fecha_salida" value="09/04/2011" id="id_fecha_salida" type="text"></dd>


                <div align="center"><button type="submit" title="Buscar hoteles">Buscar</button></div>
              </form>               

            </dl>

            <br clear="all" />

            <b>Ubicaci&oacute;n del hotel</b>

            <img src="images/mapa.gif" alt="Ubicacion del hotel" width="200" />

            <br clear="all" /><br /><p>&nbsp;</p>

            <b>Distancia a puntos de interés</b>
            <div class="puntosinteres">
              <ul>
                <li class="puntointeres">Aeropuerto</li>				
                <li><a href="/madrid/cerca-de/aeropuerto-de-barajas-(mad)/24">Aeropuerto de Barajas (MAD)</a> (12.3 km)</li>

                <li class="puntointeres">Estación de trenes</li>				
                <li><a href="/madrid/cerca-de/estacion-de-atocha/26">Estación de Atocha</a> (984 m)</li>
                <li><a href="/madrid/cerca-de/estacion-de-chamartin/25">Estación de Chamartín</a> (6.5 km)</li>

                <li class="puntointeres">Centro de convenciones</li>				
                <li><a href="/madrid/cerca-de/ifema/27">IFEMA</a> (8.9 km)</li>
                <li><a href="/madrid/cerca-de/palacio-de-congresos/28">Palacio de Congresos</a> (4.3 km)</li>

                <li class="puntointeres">Punto de referencia</li>				
                <li><a href="/madrid/cerca-de/el-retiro/38">El Retiro</a> (1.2 km)</li>
                <li><a href="/madrid/cerca-de/palacio-real-de-madrid/35">Palacio Real de Madrid</a> (1.3 km)</li>
                <li><a href="/madrid/cerca-de/plaza-mayor/36">Plaza Mayor</a> (757 m)</li>
                <li><a href="/madrid/cerca-de/puerta-del-sol/33">Puerta del Sol</a> (506 m)</li>
                <li><a href="/madrid/cerca-de/puerta-de-alcala/37">Puerta de Alcalá</a> (999 m)</li>

                <li class="puntointeres">Museo</li>				
                <li><a href="/madrid/cerca-de/museo-thyssen-bornemisza/34">Museo Thyssen-Bornemisza</a> (330 m)</li>
                <li><a href="/madrid/cerca-de/museo-reina-sofia/32">Museo Reina Sofía</a> (737 m)</li>
                <li><a href="/madrid/cerca-de/museo-del-prado/29">Museo del Prado</a> (538 m)</li>

                <li class="puntointeres">Teatro</li>				
                <li><a href="/madrid/cerca-de/teatro-real/43">Teatro Real</a> (1.1 km)</li>

                <li class="puntointeres">Estadio</li>				
                <li><a href="/madrid/cerca-de/estadio-santiago-bernabeu/30">Estadio Santiago Bernabéu</a> (4.3 km)</li>
                <li><a href="/madrid/cerca-de/estadio-vicente-calderon/31">Estadio Vicente Calderón</a> (2.4 km)</li>

                <li class="puntointeres">Parque temático / Zoo</li>				
                <li><a href="/madrid/cerca-de/zoo-aquarium/42">Zoo Aquarium</a> (5.5 km)</li>
                <li><a href="/madrid/cerca-de/parque-warner/39">Parque Warner</a> (22.2 km)</li>
                <li><a href="/madrid/cerca-de/faunia/40">Faunia</a> (7.6 km)</li>
                <li><a href="/madrid/cerca-de/parque-de-atracciones/41">Parque de atracciones</a> (4.4 km)</li>
              </ul>
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
        ?>
        <div class="listados-drcha">
          <div class="fichaHotelizq"><h1><?php echo $hotel['name']; ?> <img src="<?php echo sfConfig::get('app_s_img') . $hotel['class_and'] ?>-hotel-estrellas.png" alt="<?php echo $hotel['class_and'] ?> estrellas" /></h1>
            <em><?php echo $hotel['address']; ?>, <?php echo $hotel['city']; ?></em> - <span><a title="ver mapa" href="" onclick="window.open('<?php echo url_for('mapa') ?>?la=<?php echo $la ?>&lo=<?php echo $lo ?>&ciudad=<?php echo $city ?>&hotel=<?php echo $name ?>','d_mapa','width=700,height=600,scrollbars=yes')">ver mapa</a></span></div>

          <div class="fichaHoteldrcha"><b>valoraci&oacute;n</b> <span><?php echo $hotel['ranking']; ?></span>
            <br /><a title="opiniones hotel" href="" onclick="window.open('http://www.booking.com/reviewlist.es.html?tmpl=reviewlistpopup;pagename=<?php echo Utils::nameurl($hotel['url']) ?>;hrwt=1;cc1=ad;target_aid=323497;aid=323497','popup1','width=600,height=700,scrollbars=yes');">puntuaci&oacute;n sobre <?php echo $hotel['review_nr']; ?> opiniones</a>
          </div>
          <br clear="all" /><br />
          <div class="fichaHotelfotos">
            <img alt="<?php echo $hotel['name']; ?>" src="<?php echo $hotel['medium_photo']; ?>" class="foto" width="215" height="188"/>
          </div>	
          <div class="panel">
            <ul id="fichaHotelfotosMini">
              <?php foreach ($hotel->RoomPhotos as $room_photo): ?>
                <li>
                  <a href="<?php echo $room_photo->big_photo; ?>" class="preview" title="<?php echo $hotel->name ?>">
                    <img src="<?php echo $room_photo->small_photo; ?>" alt="<?php echo $hotel->name ?>" width="60" height="60"/>
                  </a>
                </li>
              <?php endforeach; ?>

            </ul>
          </div>
          <br clear="all" />

          <div class="listados-hoteles-descripcion">
            <?php foreach ($hotel->HotelDescs as $desc): ?>
              <p><?php echo $desc->description; ?></p>
            <?php endforeach; ?>

            <p><strong>N&uacute;mero de habitaciones:</strong> <?php echo $hotel->nr_rooms; ?></p></div>

          <br clear="all" /><br />		
          <h2 class="seccionHotel">Disponibilidad del hotel</h2>
          <?php if ($sf_request->isMethod('post')): ?>
            <?php
            $ini = Utils::getFormattedDate($lst_rooms['arrival_date'], '%d/%m/%Y');
            $fin = Utils::getFormattedDate($lst_rooms['departure_date'], '%d/%m/%Y');
            $interval = $fin - $ini;
            ?>  
            <div class="disponibilidadHotel">Habitaciones disponibles del <span><?php echo $ini ?></span> al <span><?php echo $fin ?></span>.(<a style='cursor: pointer;' onclick="muestra_oculta('modificar-fechas')">modificar fechas</a>)</div>
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
                    <td colspan="3">
                      <span>Fecha de salida:</span>

                    </td>
                    <td></td>
                  </tr>
                  <tr><td valign="top">
                      <?php echo $form_dis['fecha-inicio']->render() ?>
                    </td>

                    <td>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</td>     
                    <td valign="top">
                      <?php echo $form_dis['fecha-final']->render(array('style' => 'float:left')) ?>
                    </td>   
                    <td>
                      &nbsp; &nbsp; <button type="submit" title="Buscar">Buscar</button>
                    </td>
                  </tr>
                </table>
              </form>
            </div>
            <div>
              <table summary="Disponibilidad" class="tabDispoHot">
                <tbody>
                  <tr class="separHab">
                    <th class="hTipo">Tipo de habitaci&oacute;n</th>
                    <th class="colPerson">M&aacute;x. personas</th>
                    <th class="colDispo">Disponibilidad</th>
                    <th class="hPrecio">Precio final</th>
                    <th class="hotelHabitaciones">Número de habitaciones</th>
                  </tr>

                  <tr class="separHab">
                    <td class="hTipo">
                      <span>Habitación Doble - 1 o 2 camas - Single Use</span><br />
                      <a style='cursor: pointer;' onclick="muestra_oculta('habitacion24248403_80523382_0')">Ver detalles</a>
                    </td>
                    <td class="colPerson">

                      <img height="10" width="60" alt="" src="images/persons_1L.png">
                    </td>
                    <td class="colDispo">
                      <a title="Disponible" href="index.php?lang=sp&frombusca=ok&textinput=Madrid&datein=04-17-2011&dateout=04-18-2011&okupa=1;1|1;1|1;1&radio=&botonBuscar_x=19&botonBuscar_y=25&h=44755&block=9186101_80410768_0" class="dispohab">Disponible</a>
                    </td>
                    <td class="hPrecio">
                      <span class="precioTarifa">289.44 &nbsp;€</span>

                      <span class="colOferta">205.20 &nbsp;€</span>
                    </td>
                    <td class="hotelHabitaciones"><select id="nr_rooms_24248404_80523382_0" class="comboPrecio" name="nr_rooms_24248404_80523382_0"><option value="0">0</option><option value="1">1 (211 €)</option></select></td>
                  </tr>
                  <tr class="separacion">
                    <td colspan="5" style="width:100%">
                      <div id="habitacion24248403_80523382_0" class="detallesHabitaciones" style="display:none">
                        <div class="detallesimagenes"><ul><li><a href="http://aff.bstatic.com/1/images/hotel/max500/349/3493177.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/1/images/hotel/square60/349/3493177.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/0/images/hotel/max500/349/3493184.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/0/images/hotel/square60/349/3493184.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/1/images/hotel/max500/349/3493201.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/1/images/hotel/square60/349/3493201.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/2/images/hotel/max500/349/3493794.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/2/images/hotel/square60/349/3493794.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/3/images/hotel/max500/356/3561631.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/3/images/hotel/square60/356/3561631.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/0/images/hotel/max500/356/3561632.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/0/images/hotel/square60/356/3561632.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/1/images/hotel/max500/356/3561633.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/1/images/hotel/square60/356/3561633.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/2/images/hotel/max500/356/3561634.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/2/images/hotel/square60/356/3561634.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/3/images/hotel/max500/356/3561635.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/3/images/hotel/square60/356/3561635.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/0/images/hotel/max500/356/3561636.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/0/images/hotel/square60/356/3561636.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/2/images/hotel/max500/356/3561638.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/2/images/hotel/square60/356/3561638.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/3/images/hotel/max500/381/3810503.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/3/images/hotel/square60/381/3810503.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/0/images/hotel/max500/381/3810504.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/0/images/hotel/square60/381/3810504.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/1/images/hotel/max500/381/3810505.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/1/images/hotel/square60/381/3810505.gif" width="60" height="60"/></a></li></ul></div>
                        <p>Esta amplia habitación cuenta con una plancha de pantalones y un set de bienvenida exclusivo. Algunas habitaciones tienen balcón.</p>
                        <h3>Equipamiento de las habitaciones</h3><p>Ducha, Teléfono, Aire acondicionado, Secador de pelo, Plancha para ropa, Balcón, Frigorífico, Equipo de planchado, Zona de estar, WC, Microondas, Lavavajillas, Lavadora, Cuarto de baño, Calefacción, Cocina, TV de pantalla plana / LCD / plasma , Entrada privada, Sofá, Suelos de baldosa / mármol, Hervidor de agua eléctrico</p><h3>Incluido en el precio</h3><p>IVA</p>        
                      </div></td></tr>

                  <tr class="separHab">
                    <td class="hTipo">
                      <span>Habitación Doble - 1 o 2 camas</span><br /><a style='cursor: pointer;' onclick="muestra_oculta('habitacion24248403_80523382_1')">Ver detalles</a>
                    </td>

                    <td class="colPerson">
                      <img height="10" width="60" alt="" src="images/persons_2L.png">
                    </td>
                    <td class="colDispo">
                      <a title="S&oacute;lo quedan 2 habitaciones" href="index.php?lang=sp&frombusca=ok&textinput=Madrid&datein=04-17-2011&dateout=04-18-2011&okupa=1;1|1;1|1;1&radio=&botonBuscar_x=19&botonBuscar_y=25&h=44813&block=9360401_80605787_0" class="PocasHab">S&oacute;lo quedan 2 habitaciones</a>
                    </td>
                    <td class="hPrecio">
                      <span class="precioTarifa">289.44 &nbsp;€</span>

                      <span class="colOferta">259.20 &nbsp;€</span>
                    </td>
                    <td class="hotelHabitaciones"><select id="nr_rooms_24248404_80523382_0" class="comboPrecio" name="nr_rooms_24248404_80523382_0"><option value="0">0</option><option value="1">1 (211 €)</option>
                        <option value="2">2 (422 €)</option></select></td>        
                  </tr>
                  <tr class="separacion">
                    <td colspan="5" style="width:100%">
                      <div id="habitacion24248403_80523382_1" class="detallesHabitaciones" style="display:none">
                        <div class="detallesimagenes"><ul><li><a href="http://aff.bstatic.com/1/images/hotel/max500/349/3493177.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/1/images/hotel/square60/349/3493177.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/0/images/hotel/max500/349/3493184.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/0/images/hotel/square60/349/3493184.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/1/images/hotel/max500/349/3493201.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/1/images/hotel/square60/349/3493201.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/2/images/hotel/max500/349/3493794.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/2/images/hotel/square60/349/3493794.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/3/images/hotel/max500/356/3561631.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/3/images/hotel/square60/356/3561631.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/0/images/hotel/max500/356/3561632.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/0/images/hotel/square60/356/3561632.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/1/images/hotel/max500/356/3561633.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/1/images/hotel/square60/356/3561633.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/2/images/hotel/max500/356/3561634.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/2/images/hotel/square60/356/3561634.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/3/images/hotel/max500/356/3561635.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/3/images/hotel/square60/356/3561635.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/0/images/hotel/max500/356/3561636.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/0/images/hotel/square60/356/3561636.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/2/images/hotel/max500/356/3561638.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/2/images/hotel/square60/356/3561638.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/3/images/hotel/max500/381/3810503.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/3/images/hotel/square60/381/3810503.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/0/images/hotel/max500/381/3810504.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/0/images/hotel/square60/381/3810504.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/1/images/hotel/max500/381/3810505.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/1/images/hotel/square60/381/3810505.gif" width="60" height="60"/></a></li></ul></div>
                        <p>Esta amplia habitación cuenta con una plancha de pantalones y un set de bienvenida exclusivo. Algunas habitaciones tienen balcón.</p>
                        <h3>Equipamiento de las habitaciones</h3><p>Ducha, Teléfono, Aire acondicionado, Secador de pelo, Plancha para ropa, Balcón, Frigorífico, Equipo de planchado, Zona de estar, WC, Microondas, Lavavajillas, Lavadora, Cuarto de baño, Calefacción, Cocina, TV de pantalla plana / LCD / plasma , Entrada privada, Sofá, Suelos de baldosa / mármol, Hervidor de agua eléctrico</p><h3>Incluido en el precio</h3><p>IVA</p>        
                      </div></td></tr>
                  <tr class="separHab">
                    <td class="hTipo">
                      <span>Habitación Doble - 1 o 2 camas - Desayuno incluido - Single Use</span><br /><a style='cursor: pointer;' onclick="muestra_oculta('habitacion24248403_80523382_2')">Ver detalles</a>
                    </td>

                    <td class="colPerson">
                      <img height="10" width="60" alt="" src="images/persons_1L.png">
                    </td>
                    <td class="colDispo">
                      <a title="S&oacute;lo quedan 2 habitaciones" href="index.php?lang=sp&frombusca=ok&textinput=Madrid&datein=04-17-2011&dateout=04-18-2011&okupa=1;1|1;1|1;1&radio=&botonBuscar_x=19&botonBuscar_y=25&h=44813&block=9360401_234568_1" class="PocasHab">S&oacute;lo quedan 2 habitaciones</a>
                    </td>
                    <td class="hPrecio">
                      <span class="precioTarifa">289.44 &nbsp;€</span>

                      <span class="colOferta">220.32 &nbsp;€</span>
                    </td>
                    <td class="hotelHabitaciones"><select id="nr_rooms_24248404_80523382_0" class="comboPrecio" name="nr_rooms_24248404_80523382_0"><option value="0">0</option><option value="1">1 (211 €)</option>
                        <option value="2">2 (422 €)</option></select></td>
                  </tr>
                  <tr class="separacion">
                    <td colspan="5" style="width:100%">
                      <div id="habitacion24248403_80523382_2" class="detallesHabitaciones" style="display:none">
                        <div class="detallesimagenes"><ul><li><a href="http://aff.bstatic.com/1/images/hotel/max500/349/3493177.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/1/images/hotel/square60/349/3493177.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/0/images/hotel/max500/349/3493184.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/0/images/hotel/square60/349/3493184.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/1/images/hotel/max500/349/3493201.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/1/images/hotel/square60/349/3493201.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/2/images/hotel/max500/349/3493794.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/2/images/hotel/square60/349/3493794.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/3/images/hotel/max500/356/3561631.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/3/images/hotel/square60/356/3561631.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/0/images/hotel/max500/356/3561632.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/0/images/hotel/square60/356/3561632.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/1/images/hotel/max500/356/3561633.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/1/images/hotel/square60/356/3561633.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/2/images/hotel/max500/356/3561634.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/2/images/hotel/square60/356/3561634.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/3/images/hotel/max500/356/3561635.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/3/images/hotel/square60/356/3561635.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/0/images/hotel/max500/356/3561636.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/0/images/hotel/square60/356/3561636.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/2/images/hotel/max500/356/3561638.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/2/images/hotel/square60/356/3561638.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/3/images/hotel/max500/381/3810503.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/3/images/hotel/square60/381/3810503.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/0/images/hotel/max500/381/3810504.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/0/images/hotel/square60/381/3810504.gif" width="60" height="60"/></a></li><li><a href="http://aff.bstatic.com/1/images/hotel/max500/381/3810505.jpg" title="Madrid Central Suites" class="preview"><img alt="Madrid Central Suites" src="http://aff.bstatic.com/1/images/hotel/square60/381/3810505.gif" width="60" height="60"/></a></li></ul></div>
                        <p>Esta amplia habitación cuenta con una plancha de pantalones y un set de bienvenida exclusivo. Algunas habitaciones tienen balcón.</p>
                        <h3>Equipamiento de las habitaciones</h3><p>Ducha, Teléfono, Aire acondicionado, Secador de pelo, Plancha para ropa, Balcón, Frigorífico, Equipo de planchado, Zona de estar, WC, Microondas, Lavavajillas, Lavadora, Cuarto de baño, Calefacción, Cocina, TV de pantalla plana / LCD / plasma , Entrada privada, Sofá, Suelos de baldosa / mármol, Hervidor de agua eléctrico</p><h3>Incluido en el precio</h3><p>IVA</p>        
                      </div></td></tr>
                </tbody>
              </table>
              <div align="right"><button type="submit" title="Reservar hotel">Reservar ahora</button></div>
            </div>
          <?php else: ?>
            <div class="disponibilidadHotel">¿Cuándo quieres alojarte en el Hotel Mena Andorra?</div>

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
                    <td colspan="3">
                      <span>Fecha de salida:</span>

                    </td>
                    <td></td>
                  </tr>
                  <tr><td valign="top">
                      <?php echo $form_dis['fecha-inicio']->render() ?>
                    </td>

                    <td>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</td>     
                    <td valign="top">
                      <?php echo $form_dis['fecha-final']->render(array('style' => 'float:left')) ?>
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

          <div class="servicios"><h2 class="seccionHotel">Servicios Hotel Mena Andorra</h2>
            <h4>Servicios generales</h4>
            <p>Calefacción, Habitaciones familiares, Aire acondicionado, Ascensor, Habitaciones para no fumadores, Prohibido fumar en todo el recinto del hotel, Registro de entrada y salida exprés.</p>

            <h4>Otros servicios</h4>
            <p>Centro de negocios, Registro de entrada / salida privado, Información turística, Servicio de lavandería, Servicio de consejería.</p>					

            <h4>Internet</h4>
            <p>Internet WIFI en todo el hotel. GRATIS</p>

            <h4>Aparcamiento</h4>
            <p>No hay parking.</p>

          </div>
          <br clear="all" /><br />
          <div class="servicios"><h2 class="seccionHotel">Condiciones del hotel</h2>
            <h5>Condiciones de cancelaci&oacute;n</h5>
            <p>Si cancelas o modificas hasta 3 día(s) antes de la fecha de llegada: GRATIS, el hotel no efectuará ningún cargo. Si cancelas o modificas fuera de plazo o si no te presentas: el hotel cargará la primera noche.</p>

            <h5>Condiciones sobre niños y camas supletorias</h5>
            <p>Se admiten niños de todas las edades. Los menores de 12 años GRATIS utilizando las camas existentes.<br />
              Los menores de 2 años pagan 20 EUR por persona y noche en cuna.<br />
              Número máximo de camas supletorias en la habitación: 0<br />
              Número máximo de cunas en habitación doble 2.</p>					

            <h5>Impuestos y cargos especiales</h5>
            <p>8.00 % IVA incluido(s). Suplemento por servicio no aplicable.
              No hay ningún impuesto municipal ni tasa turística .</p>

            <h5>Mascotas y animales de compa&ntilde;&iacute;a</h5>
            <p>No se admiten.</p>

            <h5>Tarjetas de crédito aceptadas</h5>
            <p>American Express, Visa, Euro/Mastercard.<br />
              El hotel se reserva el derecho de comprobar la validez de las tarjetas de crédito antes de la fecha de llegada. </p>


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
