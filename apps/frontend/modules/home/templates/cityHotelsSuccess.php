<div class="main-container">
  <div class="main-content">

    <div class="home-under">

      <div class="home-content2">
        <div class="navegacion">
          <a href="<?php echo url_for('homepage'); ?>" title="Hoteles en Andorra">Andorra Hoteles</a> > <?php echo $rs_city['name']; ?></div>

        <div class="listados-izq">

          <form id="frm-refine" action="" class="" method="post"
                accept-charset="utf-8" enctype="multipart/form-data">
            <dl class="refine">


              <form action="/es/bookcore_engine/availability/" method="post">
                <dt>Destino</dt>
                <dd><input type="text" name="destino" id="b_destination" value=""
                           size="25" /></dd>

                <dt>Fecha de entrada:</dt>
                <dd><input class="hasDatepicker" name="fecha_entrada"
                           value="08/04/2011" id="id_fecha_entrada" type="text"></dd>
                <dt>Fecha de salida:</dt>
                <dd><input class="hasDatepicker" name="fecha_salida" value="09/04/2011"
                           id="id_fecha_salida" type="text"></dd>


                <div align="center">
                  <button type="submit" title="Buscar hoteles">Buscar</button>
                </div>
              </form>

              <dt>Tipo de habitaciones</dt>
              <dd class="check-all">
                <input type="checkbox" name="person_all" id="person_all" checked="checked" value="all" />
                <label for="person_all">Todo</label> 
                <span class="counter" id="person_all_count"></span>
              </dd>
              <dd><input type="checkbox" name="person_1" id="person_1" value="1" /><label
                  for="person_1">Individuales</label> <span class="counter"
                  id="person_1_count"></span></dd>
              <dd><input type="checkbox" name="person_2" id="person_2" value="2" /><label
                  for="person_2">Dobles</label> <span class="counter"
                  id="person_2_count"></span></dd>
              <dd><input type="checkbox" name="person_3" id="person_3" value="3" /><label
                  for="person_3">Triples</label> <span class="counter"
                  id="person_3_count"></span></dd>
              <dd><input type="checkbox" name="person_4" id="person_4" value="4" /><label
                  for="person_4">Cuádruples</label> <span class="counter"
                  id="person_4_count"></span></dd>
              <dd><input type="checkbox" name="person_5" id="person_5" value="5" /><label
                  for="person_5">Grandes (5+)</label> <span class="counter"
                  id="person_5_count"></span></dd>

              <dt>Número de estrellas</dt>
              <dd class="check-all"><input type="checkbox" name="star_all"
                                           id="star_all" checked="checked" value="all" /><label for="star_all">Todo</label>
                <span class="counter" id="star_all_count"></span></dd>
              <dd><input type="checkbox" name="star_1" id="star_1" value="1" /> <label
                  for="star_1">1 estrella</label> <span class="counter"
                  id="star_1_count"></span></dd>
              <dd><input type="checkbox" name="star_2" id="star_2" value="2" /> <label
                  for="star_2">2 estrellas</label> <span class="counter"
                  id="star_2_count"></span></dd>
              <dd><input type="checkbox" name="star_3" id="star_3" value="3" /> <label
                  for="star_3">3 estrellas</label> <span class="counter"
                  id="star_3_count"></span></dd>
              <dd><input type="checkbox" name="star_4" id="star_4" value="4" /> <label
                  for="star_4">4 estrellas</label> <span class="counter"
                  id="star_4_count"></span></dd>
              <dd><input type="checkbox" name="star_5" id="star_5" value="5" /> <label
                  for="star_5">5 estrellas</label> <span class="counter"
                  id="star_5_count"></span></dd>


              <dt>Facilidades</dt>
              <dd class="check-all"><input type="checkbox" name="facilitie_all"
                                           id="facilitie_all" checked="checked" value="all" /><label
                                           for="facilitie_all">Sin preferencias</label> <span class="counter"
                                           id="facilitie_all_count"></span></dd>
              <dd><input type="checkbox" name="facilitie_1" id="facilitie_1"
                         value="1" /><label for="facilitie_1">Adaptado a discapacitados</label>
                <span class="counter" id="facilitie_5_count"></span></dd>
              <dd><input type="checkbox" name="facilitie_5" id="facilitie_5"
                         value="5" /><label for="facilitie_5">Conexión WiFi a Internet</label>
                <span class="counter" id="facilitie_5_count"></span></dd>
              <dd><input type="checkbox" name="facilitie_7" id="facilitie_7"
                         value="7" /><label for="facilitie_7">Gimnasio</label> <span
                         class="counter" id="facilitie_7_count"></span></dd>
              <dd><input type="checkbox" name="facilitie_8" id="facilitie_8"
                         value="8" /><label for="facilitie_8">Spa / Balneario</label> <span
                         class="counter" id="facilitie_7_count"></span></dd>
              <dd><input type="checkbox" name="facilitie_12" id="facilitie_12"
                         value="12" /><label for="facilitie_12">Piscina cubierta</label> <span
                         class="counter" id="facilitie_12_count"></span></dd>
              <dd><input type="checkbox" name="facilitie_13" id="facilitie_13"
                         value="13" /><label for="facilitie_13">Piscina exterior</label> <span
                         class="counter" id="facilitie_13_count"></span></dd>
              <dd><input type="checkbox" name="facilitie_17" id="facilitie_17"
                         value="17" /><label for="facilitie_17">Se admiten animales</label> <span
                         class="counter" id="facilitie_17_count"></span></dd>
              <dd><input type="checkbox" name="facilitie_18" id="facilitie_18"
                         value="18" /><label for="facilitie_18">Aparcamiento</label> <span
                         class="counter" id="facilitie_18_count"></span></dd>
              <dd><input type="checkbox" name="facilitie_2" id="facilitie_2"
                         value="2" /><label for="facilitie_2">Restaurante</label> <span
                         class="counter" id="facilitie_2_count"></span></dd>
              </dd>


            </dl>

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


        <div class="listados-drcha">
          <h1 class="titulo-listados">Hoteles en <?php echo $rs_city['name']; ?></h1>
          <span style="float: left;"><b><?php echo $rs_city['nr_hotels'] ?> hoteles
              en <?php echo $rs_city['name']; ?></b> - Mostrando 1-<?php echo sfConfig::get('app_max_hotels'); ?>, ordenar
            resultados por:&nbsp;</span> 
          <select class="comboAvanzadas" onchange="window.location.replace(this.value)" name="orden">
            <option
            <?php echo ($sf_request->getParameter('orden') == 'pop') ? 'selected="selected"' : '' ?>
              value="<?php echo $sf_request->getParameter('slug') . '.html?orden=pop' ?>">Popularidad</option>
            <option
            <?php echo ($sf_request->getParameter('orden') == 'opi') ? 'selected="selected"' : '' ?>
              value="<?php echo $sf_request->getParameter('slug') . '.html?orden=opi' ?>">Opinión
	clientes</option>
            <option
            <?php echo ($sf_request->getParameter('orden') == 'est') ? 'selected="selected"' : '' ?>
              value="<?php echo $sf_request->getParameter('slug') . '.html?orden=est' ?>">Estrellas</option>
            <option
            <?php echo ($sf_request->getParameter('orden') == 'pre') ? 'selected="selected"' : '' ?>
              value="<?php echo $sf_request->getParameter('slug') . '.html?orden=pre' ?>">Precio</option>
          </select> <br />
          <br />

          <!---anuncio hotel--> 
          <?php foreach ($lst_hotel as $hotel): ?>
            <?php
            $la = $hotel['latitude'];
            $lo = $hotel['longitude'];
            $name = $hotel['name'];
            $city = $hotel['city'];
            ?>
            <div class="listados-hoteles">
              <div class="listados-hoteles-foto">
                <a title="<?php echo $hotel['name']; ?>" href="<?php echo url_for('hotel_details',array('id' => $hotel['id'],'slug'=>$rs_city['slug'], 'slugh' => $hotel['slug'])) ?>"> 
                  <img src="<?php echo $hotel['medium_photo']; ?>" width="140" height="105"> </a>
              </div>
              <div class="listados-hoteles-info">
                <div class="listados-hoteles-superior">
                  <div class="listados-hoteles-precio"><b>valoraci&oacute;n</b> <span><?php echo  $hotel['ranking']; ?></span><br />
                    <?php echo  $hotel['review_nr']; ?> opiniones<br />
                    <a title="opiniones hotel" href="#"
                       onclick="window.open('http://www.booking.com/reviewlist.es.html?tmpl=reviewlistpopup;pagename=<?php echo Utils::nameurl($hotel['url']) ?>;hrwt=1;cc1=ad;target_aid=323497;aid=323497','popup1','width=600,height=700,scrollbars=yes');">ver
                      &uacute;ltimas</a><br />
                    <br />
                    <a title="<?php echo $hotel['name']; ?>"
                       href="<?php echo url_for('hotel_details',array('id' => $hotel['id'],'slug'=>$rs_city['slug'], 'slugh' => $hotel['slug'])) ?>"><img
                        src="<?php echo sfConfig::get('app_s_img') ?>precios-hotel.png"
                        alt="Precios de Hotel Mena Andorra" border="0" /></a></div>
                  <div class="listados-hoteles-titulo">
                    <a title="<?php echo $hotel['name']; ?>" href="<?php echo url_for('hotel_details',array('id' => $hotel['id'],'slug'=>$rs_city['slug'], 'slugh' => $hotel['slug'])) ?>"><?php echo $hotel['name'] ?></a> 
                    <img src="<?php echo sfConfig::get('app_s_img') . $hotel['class_and'] ?>-hotel-estrellas.png" alt="<?php echo $hotel['class_and'] ?> estrellas" /> <br />
                    <em><?php echo $hotel['address']; ?>, <?php echo $hotel['city']; ?></em>
                    - <span> 
                      <a title="ver mapa" href="" onclick="window.open('<?php echo url_for('mapa') ?>?la=<?php echo $la ?>&lo=<?php echo $lo ?>&ciudad=<?php echo $city ?>&hotel=<?php echo $name ?>','d_mapa','width=700,height=600,scrollbars=yes')">ver mapa</a>
                    </span>
                  </div>
                  <div class="listados-hoteles-descripcion"><?php $desc = substr($hotel['description'], 0, 200);
                      echo substr($hotel['description'], 0, strripos($desc, ' ')) ?>... 
                      <a href="<?php echo url_for('hotel_details',array('id' => $hotel['id'],'slug'=>$rs_city['slug'], 'slugh' => $hotel['slug'])) ?>">M&aacute;s informaci&oacute;n</a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          <!---fin anuncio hotel-->
          <div align="center"><br />
            <div class="paginacion">
              <?php if ($pager->haveToPaginate()): ?>
                <?php foreach ($pager->getLinks() as $page): ?>
                  <?php if ($page == $pager->getPage()): ?> 
                    <span class="current"><strong><?php echo $page ?></strong></span>
                  <?php else: ?>
                    <a href="<?php echo url_for('city_hotels', array('id' => $rs_city['id'], 'slug' => $rs_city['slug'])) ?>?p=<?php echo $page ?>" title="Pagina <?php echo $page ?> de hoteles" ><?php echo $page ?></a>
                  <?php endif; ?> 
                <?php endforeach; ?> 
                <a href="<?php echo url_for('city_hotels', array('id' => $rs_city['id'], 'slug' => $rs_city['slug'])) ?>?p=<?php echo $pager->getNextPage() ?>" title="P&aacute;gina siguiente">Siguiente &gt;</a> 
              <?php endif; ?>
            </div>
          </div>
          <p>&nbsp;</p>
          <br clear="all" />
        </div>
      </div>
      <div style="clear: both;"></div>
    </div>
  </div>
</div>
</div>
