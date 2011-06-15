<?php slot('more_metas') ?>
<title>Hoteles cerca <?php echo $tours->name; ?> - Reserva tu hotel en París</title>
<meta name="keywords" content="<?php echo $tours->name; ?>, paris, hoteles, reservas, hotel, ofertas" />
<meta name="description" content="Selección de hoteles de París cercanos a <?php echo $tours->name; ?>. Reserva online tu hotel de París con pago directo en el hotel y sin comisiones." />

<?php end_slot(); ?>



<?php slot('mensaje') ?>
<div class="mensaje">
  Hoteles cercanos a <strong><?php echo $tours->name; ?></strong>
  <br />
  <a href="http://www.parishoteles.net/audioguias-de-paris/" title="Audioguias de Paris">
    <embed width="468" height="60" src="<?php echo sfConfig::get('app_s_img') ?>paris-468x60.swf?clickTAG=http://www.parishoteles.net/audioguias-de-paris/"></embed>
  </a>
</div>
<?php end_slot(); ?>

<div class="main-container">
  <div class="main-content">
    <div class="navegacion"><div style="float:left;"><a href="<?php echo url_for('homepage'); ?>" title="Hoteles en París">Par&iacute;s Hoteles</a> > Hoteles Cercanos a <?php echo $tours->name ?></div>
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
            <form id="formulario" action="<?php echo url_for('hotels_result') ?>" class="" method="get" accept-charset="utf-8" enctype="multipart/form-data">
            <?php include_partial('search_dispo',array('search_form' => $search_form)) ?>
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

          <br clear="all" /><br clear="all" />
        </div>


        <div class="listados-drcha">
          <h1 class="titulo-listados">Hoteles en París </h1>
          <span style="float: left;"><b> Hoteles cerca de <?php echo $tours->name; ?>  <?php echo $pager->getNbResults() ?> </b>
            <?php if ($pager->haveToPaginate()): ?>  Mostrando <?php echo $pager->getFirstIndice() ?> - <?php echo $pager->getLastIndice() ?>  <?php endif; ?> |
            Ordenar resultados por:&nbsp;</span>
          <form action="" method="post">
            <?php if ($filter->isCSRFProtected()) : ?>
              <?php echo $filter['_csrf_token']->render(); ?>
            <?php endif; ?>
            <?php echo $filter['order']->render(array('onchange' => 'submit()')); ?>
            <br />
            <br />
          </form>
          <!---anuncio hotel-->
          <?php foreach ($lst_hotel as $hotel): ?>
            <?php
            $la = $hotel['latitude'];
            $lo = $hotel['longitude'];
            $name = $hotel['name'];
            $city = $hotel['city'];
            $slug_city = 'paris';
            $aid = sfConfig::get('app_aid');
            $distancia = Utils::getDistance($la, $lo, $tours->latitude, $tours->longitude, 2)
            ?>
            <div class="listados-hoteles">
              <div class="listados-hoteles-foto">
                <a title="<?php echo $hotel['name']; ?>" href="<?php echo url_for('hotel_details', array('id' => $hotel['id'], 'slug' => $slug_city, 'slugh' => $hotel['slug'])) ?>">
                  <img src="<?php echo $hotel['medium_photo']; ?>" width="140" height="105"/> </a>
              </div>
              <div class="listados-hoteles-info">
                <div class="listados-hoteles-superior">
                  <div class="listados-hoteles-precio"><b>valoraci&oacute;n</b> <span><?php echo $hotel['ranking']; ?></span><br />
                    <?php echo $hotel['review_nr']; ?> opiniones<br />
                    <a title="opiniones hotel" href="javascript:void(0)"
                       onclick="window.open('http://www.booking.com/reviewlist.es.html?tmpl=reviewlistpopup;pagename=<?php echo Utils::nameurl($hotel['url']) ?>;hrwt=1;cc1=<?php echo sfConfig::get('app_city_un')?>;target_aid=<?php echo $aid ?>;aid=<?php echo $aid ?>','popup1','left=100,top=100,width=600,height=700,scrollbars=yes');">ver
                      &uacute;ltimas</a><br />
                    <br />
                    <a title="<?php echo $hotel['name']; ?>"
                       href="<?php echo url_for('hotel_details', array('id' => $hotel['id'], 'slug' => $slug_city, 'slugh' => $hotel['slug'])) ?>"><img
                        src="<?php echo sfConfig::get('app_s_img') ?>precios-hotel.png"
                        alt="Precios de Hotel Mena Andorra" border="0" />
                    </a>
                  </div>
                  <div class="listados-hoteles-titulo">
                    <a title="<?php echo $hotel['name']; ?>" href="<?php echo url_for('hotel_details', array('id' => $hotel['id'], 'slug' => $slug_city, 'slugh' => $hotel['slug'])) ?>"><?php echo $hotel['name'] ?></a>
                    <?php if ($hotel['class_and']): ?><img src="<?php echo sfConfig::get('app_s_img') . $hotel['class_and'] ?>-hotel-estrellas.png" alt="<?php echo $hotel['class_and'] ?> estrellas" /><?php endif; ?>  (<?php echo ($distancia * 1000) . ' m'; ?>)<br />
                    <em><?php echo $hotel['address']; ?>, <?php echo $hotel['city']; ?></em>
                    - <span>
                      <a title="ver mapa" href="javascript:void(0)" onclick="window.open('<?php echo url_for('mapa') ?>?la=<?php echo $la ?>&lo=<?php echo $lo ?>&ciudad=<?php echo $city ?>&hotel=<?php echo $name ?>','d_mapa','width=700,height=600,scrollbars=yes')">ver mapa</a>
                    </span>
                  </div>
                  <?php if ($hotel['description']): ?>
                    <div class="listados-hoteles-descripcion"><?php $desc = substr($hotel['description'], 0, 200);
                echo substr($hotel['description'], 0, strripos($desc, ' ')) ?>...
                      <a href="<?php echo url_for('hotel_details', array('id' => $hotel['id'], 'slug' => $slug_city, 'slugh' => $hotel['slug'])) ?>">M&aacute;s informaci&oacute;n</a>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          <!---fin anuncio hotel-->
          <!-- Paginacion -->
          <div align="center"><br />
            <div class="paginacion">
              <?php if ($pager->haveToPaginate()): ?>
                <?php if (!$pager->isFirstPage()): ?>
                  <a href="<?php echo url_for('tour_hotels', array('id' => $tours['id'], 'slug' => $tours['slug'])); ?>?p=<?php echo $pager->getPreviousPage() ?>" title="P&aacute;gina anterior">
                    &lt; Anterior
                  </a>
                <?php endif; ?>
                <?php foreach ($pager->getLinks(10) as $page): ?>
                  <?php if ($page == $pager->getPage()): ?>
                    <span class="current"><strong><?php echo $page ?></strong></span>
                  <?php else: ?>
                    <a href="<?php echo url_for('tour_hotels', array('id' => $tours['id'], 'slug' => $tours['slug'])); ?>?p=<?php echo $page ?>" title="Pagina <?php echo $page ?> de hoteles" ><?php echo $page ?></a>
                  <?php endif; ?>
                <?php endforeach; ?>
                <?php if (!$pager->isLastPage()): ?>
                  <a href="<?php echo url_for('tour_hotels', array('id' => $tours['id'], 'slug' => $tours['slug'])); ?>?p=<?php echo $pager->getNextPage() ?>" title="P&aacute;gina siguiente">Siguiente &gt;</a>
                <?php endif; ?>
              <?php endif; ?>
            </div>
          </div>
          <!-- fin de paginacion -->

          <p>&nbsp;</p><br clear="all" />

        </div>

      </div>
      <div style="clear: both;"></div>
    </div>
  </div>
</div>