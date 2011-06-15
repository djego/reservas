<?php slot('more_metas') ?>
<title>Reserva de hoteles de Par&iacute;s - Hoteles en Par&iacute;s</title>
<meta name="keywords" content="reservas, paris, hoteles, ofertas, hoteles paris, hotel, precios" />
<meta name="description" content="Reserva tu hotel en París con el mejor precio, gracias a nuestras ofertas y descuentos. Reservas sin comisiones y con pago directo en el hotel." />
<?php end_slot(); ?>

<?php slot('mensaje') ?>
<div class="mensaje">
  Más de 1.100 <strong>Hoteles en París al mejor precio GARANTIZADO!</strong>
  <br />
  <a href="http://www.parishoteles.net/audioguias-de-paris/" title="Audioguias de Paris">
    <a href="http://www.parishoteles.net/audioguias-de-paris/" title="Audioguias de Paris"><embed width="468" height="60" src="<?php echo sfConfig::get('app_s_img') ?>paris-468x60.swf?clickTAG=http://www.parishoteles.net/audioguias-de-paris/"></embed></a>
  </a>

</div>
<?php end_slot(); ?>

<div class="main-container">
  <div class="main-content">
    <div class="navegacion"><div style="float:left;"><a href="<?php echo url_for('homepage'); ?>" title="Hoteles en París">Par&iacute;s Hoteles</a> > Gu&iacute;a de hoteles de Par&iacute;s</div>
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
            <h3>Buscar hoteles en Par&iacute;s</h3>
          </dl>
          <dl class="refine">
            <form id="formulario" action="" class="" method="get" accept-charset="utf-8" enctype="multipart/form-data">
              <?php include_partial('search_dispo', array('search_form' => $search_form)) ?>
            </form>
            <br clear="all" />
            <?php include_partial('search_pro', array('search_form' => $search_form, 'star_sesion' => $star_sesion, 'facil_session' => $facil_session, 'num_hotels' => $num_hotels)) ?>
          </dl>
          <br clear="all" />

          <?php include_partial('destinos', array('lst_destiny' => $lst_destiny)); ?>
          <?php include_partial('hotel_history_list', array('histo_hotel' => $sf_user->getHotelHistory())) ?>
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

        </div>
        <div class="listados-drcha">
          <h1 class="titulo-listados">Hoteles disponibles en Paris</h1>
          <span style="float: left;"><b><?php echo $pager->getNbResults() ?> hoteles
              disponibles en Paris</b>
            <?php if ($pager->haveToPaginate()): ?> - Mostrando <?php echo $pager->getFirstIndice() ?> - <?php echo $pager->getLastIndice() ?>  <?php endif; ?> |
            Ordenar resultados por:&nbsp;</span>
          <form action="" method="post">
            <?php if ($filter->isCSRFProtected()) : ?>
              <?php echo $filter['_csrf_token']->render(); ?>
            <?php endif; ?>
            <?php echo $filter['order']->render(array('onchange' => 'submit()')); ?>
            <br />
            <br />
          </form>
          <?php
          $ar_url_search = $sf_request->getParameter('search');
          $ini_day = $ar_url_search['fecha-inicio']['day'];
          $ini_month = $ar_url_search['fecha-inicio']['month'];
          $fin_day = $ar_url_search['fecha-final']['day'];
          $fin_month = $ar_url_search['fecha-final']['month'];
          $csrf_token = $ar_url_search['_csrf_token'];
          $url_search = '?search[_csrf_token]=' . $csrf_token . '&search[fecha-inicio][day]=' . $ini_day . '&search[fecha-inicio][month]=' . $ini_month .
                  '&search[fecha-final][day]=' . $fin_day . '&search[fecha-final][month]=' . $fin_month;
          ?> 

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

          <!---anuncio hotel--> 
          <?php foreach ($lst_hotel as $hotel): ?>
          <?php
            $la = $hotel['latitude'];
            $lo = $hotel['longitude'];
            $name = $hotel['name'];
            $city = $hotel['city'];
            $aid = sfConfig::get('app_aid');

          //            print_r($sf_request->getParameter('search'));
            ?>
            <div class="listados-hoteles">
              <div class="listados-hoteles-foto">
                <a title="<?php echo $hotel['name']; ?>" href="<?php echo url_for('hotel_details_result', array('id' => $hotel['id'], 'slug' => 'paris', 'slugh' => $hotel['slug'])) ?><?php echo $url_search ?>">
                  <img src="<?php echo $hotel['medium_photo']; ?>" width="140" height="105"> </a>
              </div>
              <div class="listados-hoteles-info">
                <div class="listados-hoteles-superior">
                  <div class="listados-hoteles-precio"><b>valoraci&oacute;n</b> <span><?php echo $hotel['ranking']; ?></span><br />
  <?php echo $hotel['review_nr']; ?> opiniones<br />
                    <a title="opiniones hotel" href="javascript:void(0)"
                       onclick="window.open('http://www.booking.com/reviewlist.es.html?tmpl=reviewlistpopup;pagename=<?php echo Utils::nameurl($hotel['url']) ?>;hrwt=1;cc1=<?php echo sfConfig::get('app_city_un')?>;target_aid=<?php echo $aid ?>;aid=<?php echo $aid ?>','popup1','width=600,height=700,scrollbars=yes');">ver
                      &uacute;ltimas</a><br />
                    <br />
                  </div>
                  <div class="listados-hoteles-titulo">
                    <a title="<?php echo $hotel['name']; ?>" href="<?php echo url_for('hotel_details_result', array('id' => $hotel['id'], 'slug' => 'paris', 'slugh' => $hotel['slug'])) ?><?php echo $url_search ?>"><?php echo $hotel['name'] ?></a>
  <?php if ($hotel['class_and']): ?><img src="<?php echo sfConfig::get('app_s_img') . $hotel['class_and'] ?>-hotel-estrellas.png" alt="<?php echo $hotel['class_and'] ?> estrellas" /><?php endif; ?> <br />
                    <em><?php echo $hotel['address']; ?>, <?php echo $hotel['city']; ?></em>
                    - <span>
                      <a title="ver mapa" href="javascript:void(0)" onclick="window.open('<?php echo url_for('mapa') ?>?la=<?php echo $la ?>&lo=<?php echo $lo ?>&ciudad=<?php echo $city ?>&hotel=<?php echo $name ?>','d_mapa','width=700,height=600,scrollbars=yes')">ver mapa</a>
                    </span>
                  </div>
                  <div class="listados-hoteles-descripcion"><?php $desc = substr($hotel['description'], 0, 200);
                  echo substr($hotel['description'], 0, strripos($desc, ' ')) ?>...
                    <a href="<?php echo url_for('hotel_details_result', array('id' => $hotel['id'], 'slug' => 'paris', 'slugh' => $hotel['slug'])) ?><?php echo $url_search ?>">M&aacute;s informaci&oacute;n</a>
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
  //                    print_r($ar_rooms[0]['block']);die();


  foreach ($hotel['detail_rooms']['block'] as $key => $room):
    ?>

                      <?php if ($key < 4): ?>
                        <tr class="separHab">
                          <td class="hTipo">
                            <a href="<?php echo url_for('hotel_details_result', array('id' => $hotel['id'], 'slug' => 'paris', 'slugh' => $hotel['slug'])) ?><?php echo $url_search ?>" title="<?php echo $room['name'] ?>"><?php echo $room['name'] ?></a>
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
                              <span class="precioTarifa"><?php echo $room['rack_rate'][0]['price']; ?> &nbsp;<?php echo $simbol ?></span><br/>
                            <?php endif; ?>
                            <span class="colOferta"><?php echo $room['min_price'][0]['price']; ?> &nbsp;<?php echo $simbol ?></span>
                          </td>
                        </tr>
    <?php endif; ?>
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
  <?php if (!$pager->isFirstPage()): ?>
                  <a href="<?php echo url_for('hotels_result') ?><?php echo $url_search ?>&p=<?php echo $pager->getPreviousPage() ?>" title="P&aacute;gina anterior">
                    &lt; Anterior
                  </a>
  <?php endif; ?>
  <?php foreach ($pager->getLinks() as $page): ?>
                  <?php if ($page == $pager->getPage()): ?>
                    <span class="current"><strong><?php echo $page ?></strong></span>
                  <?php else: ?>
                    <a href="<?php echo url_for('hotels_result') ?><?php echo $url_search ?>&p=<?php echo $page ?>" title="Pagina <?php echo $page ?> de hoteles" ><?php echo $page ?></a>
                  <?php endif; ?>
                <?php endforeach; ?>
                <?php if (!$pager->isLastPage()): ?>
                  <a href="<?php echo url_for('hotels_result') ?><?php echo $url_search ?>&p=<?php echo $pager->getNextPage() ?>" title="P&aacute;gina siguiente">Siguiente &gt;</a>
                <?php endif; ?>
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
