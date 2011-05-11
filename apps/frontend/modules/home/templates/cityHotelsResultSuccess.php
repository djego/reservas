<div class="main-container">
  <div class="main-content">

    <div class="home-under">

      <div class="home-content2">
        <div class="navegacion">
          <a href="<?php echo url_for('homepage'); ?>" title="Hoteles en Andorra">Andorra Hoteles</a> > <?php echo $rs_city['name']; ?></div>

        <div class="listados-izq">
          <dl class="refine">
          <form action="" method="post">
            <?php include_partial('search_pro', array('search_form' => $search_form))?>
          </form>
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
              <a title="<?php echo $hotel['name']; ?>" href="<?php echo url_for('hotel_details_result', array('id' => $hotel['id'], 'slug' => $rs_city['slug'], 'slugh' => $hotel['slug'])) ?>">
                <img src="<?php echo $hotel['medium_photo']; ?>" width="140" height="105"> </a>
            </div>
            <div class="listados-hoteles-info">
              <div class="listados-hoteles-superior">
                <div class="listados-hoteles-precio"><b>valoraci&oacute;n</b> <span><?php echo $hotel['ranking']; ?></span><br />
                    <?php echo $hotel['review_nr']; ?> opiniones<br />
                  <a title="opiniones hotel" href="#"
                     onclick="window.open('http://www.booking.com/reviewlist.es.html?tmpl=reviewlistpopup;pagename=<?php echo Utils::nameurl($hotel['url']) ?>;hrwt=1;cc1=ad;target_aid=323497;aid=323497','popup1','width=600,height=700,scrollbars=yes');">ver
                    &uacute;ltimas</a><br />
                  <br />
                </div>
                <div class="listados-hoteles-titulo">
                  <a title="<?php echo $hotel['name']; ?>" href="<?php echo url_for('hotel_details_result', array('id' => $hotel['id'], 'slug' => $rs_city['slug'], 'slugh' => $hotel['slug'])) ?>"><?php echo $hotel['name'] ?></a>
                  <img src="<?php echo sfConfig::get('app_s_img') . $hotel['class_and'] ?>-hotel-estrellas.png" alt="<?php echo $hotel['class_and'] ?> estrellas" /> <br />
                  <em><?php echo $hotel['address']; ?>, <?php echo $hotel['city']; ?></em>
                  - <span>
                    <a title="ver mapa" href="" onclick="window.open('<?php echo url_for('mapa') ?>?la=<?php echo $la ?>&lo=<?php echo $lo ?>&ciudad=<?php echo $city ?>&hotel=<?php echo $name ?>','d_mapa','width=700,height=600,scrollbars=yes')">ver mapa</a>
                  </span>
                </div>
                <div class="listados-hoteles-descripcion"><?php $desc = substr($hotel['description'], 0, 200);
                    echo substr($hotel['description'], 0, strripos($desc, ' ')) ?>...
                  <a href="<?php echo url_for('hotel_details_result', array('id' => $hotel['id'], 'slug' => $rs_city['slug'], 'slugh' => $hotel['slug'])) ?>">M&aacute;s informaci&oacute;n</a>
                </div>
              </div>
            </div>
            <div>
              <table class="tabDispoHot" summary="Disponibilidad">
                <tbody>
                  <tr class="separHab">
                    <th class="hTipo">Tipo de habitación
                    </th>
                    <th class="colPerson">Personas</th>
                    <th class="colDispo">Disponibilidad

                    </th>
                    <th class="hPrecio">Precio final&nbsp;
                    </th>
                  </tr>
                    <?php
                    $ar_rooms = $data->fetchRcp('bookings.getBlockAvailability', "languagecode=es&arrival_date=" . $fecha_entrada . "&departure_date=" . $fecha_salida . "&hotel_ids=" . $hotel['id']);
                    foreach ($ar_rooms[0]['block'] as $room):
                      ?>
                  <tr class="separHab">
                    <td class="hTipo">
                      <a href="#" title="<?php echo $room['name'] ?>"><?php echo $room['name'] ?></a>
                    </td>
                    <td class="colPerson">

                      <img width="60" height="10" src="<?php echo sfConfig::get('app_s_img') ?>persons_<?php echo $room['max_occupancy'] ?>L.png" alt="<?php echo $room['max_occupancy'] ?> personas">
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
                      <a class="<?php echo $class ?>" href="" title="<?php echo $text ?>"><?php echo $text ?></a>
                    </td>
                    <td class="hPrecio">
                          <?php if ($room['min_price'][0]['price'] < $room['rack_rate'][0]['price']): ?>
                      <span class="precioTarifa"><?php echo $room['rack_rate'][0]['price']; ?> &nbsp;€</span><br/>
                          <?php endif; ?>
                      <span class="colOferta"><?php echo $room['min_price'][0]['price']; ?> &nbsp;€</span>
                    </td>
                  </tr>
                    <?php endforeach; ?>


                </tbody>
              </table><br clear="all"><br>

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
