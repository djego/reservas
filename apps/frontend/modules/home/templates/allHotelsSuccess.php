<?php
//$title = 'Todos los hoteles - Destinos de Andorra - Ofertas de Hoteles en Andorra ';
//$desc = 'Lista de todos los hoteles de Andorra';
//$keyword = 'Todos, hoteles, hotel, andorra, reservar hotel, hoteles en, viajes, viaje, viajar, reservas, ofertas, barato, esqui, ordino, tarter, escaldes';
//$sf_response->addMeta('title', $title);
//$sf_response->addMeta('description', $desc);
//$sf_response->addMeta('keywords', $keyword);

?>
<?php slot('mensaje') ?>
<div class="mensaje">
  Más de 1.100 <strong>Hoteles en París al mejor precio GARANTIZADO!</strong>
  <br />
  <a href="http://www.parishoteles.net/audioguias-de-paris/" title="Audioguias de Paris">
   <embed width="468" height="60" src="<?php echo sfConfig::get('app_s_img')?>paris-468x60.swf?clickTAG=http://www.parishoteles.net/audioguias-de-paris/"></embed>
  </a>
</div>
<?php end_slot(); ?>

<div class="main-container">
  <div class="main-content">
    <div class="navegacion"><div style="float:left;"><a href="<?php echo url_for('homepage'); ?>" title="Hoteles en París">Par&iacute;s Hoteles</a> > Gu&iacute;a de hoteles de Par&iacute;s</div>
      <div style="float:right;">
        Ver precios en&nbsp;
        <select class="comboDivisa" onchange="window.location.replace(this.value)" name="divisas">
          <option value="/include/currency.php?moneda=CZK">Corona checa (CZK)</option><option value="/include/currency.php?moneda=DKK">Corona danesa (DKK)</option><option value="/include/currency.php?moneda=NOK">Corona noruega (NOK)</option><option value="/include/currency.php?moneda=SEK">Corona sueca (SEK)</option><option value="/include/currency.php?moneda=AUD">Dólar australiano (AUD)</option><option value="/include/currency.php?moneda=CAD">Dólar canadiense (CAD)</option><option value="/include/currency.php?moneda=SGD">Dólar de Singapur (SGD)</option><option value="/include/currency.php?moneda=USD">Dólar EEUU (US$)</option><option selected="selected" value="EUR">Euro (€)</option><option value="/include/currency.php?moneda=HUF">Florín húngaro (HUF)</option><option value="/include/currency.php?moneda=CHF">Franco suizo (CHF)</option><option value="/include/currency.php?moneda=GBP">Libra esterlina (£)</option><option value="/include/currency.php?moneda=MXN">Peso mexicano (MXN)</option><option value="/include/currency.php?moneda=BRL">Real brasileño (R$)</option><option value="/include/currency.php?moneda=RUB">Rublo ruso (RUB)</option><option value="/include/currency.php?moneda=INR">Rupia india (INR)</option><option value="/include/currency.php?moneda=JPY">Yen japonés (¥)</option><option value="/include/currency.php?moneda=PLN">Zlotych polaco (PLN)</option></select>
      </div>
    </div>
    <div class="home-under">
      <div class="home-content">

        <div class="listados-izq">
          <dl class="refine2">
            <h3>Buscar hoteles en Par&iacute;s</h3>
          </dl>
          <dl class="refine">
            <?php include_partial('search_dispo',array('search_form' => $search_form)) ?>
            <br clear="all" />
            <?php include_partial('search_pro', array('search_form' => $search_form,'star_sesion' => $star_sesion, 'facil_session' => $facil_session, 'num_hotels' => $num_hotels))?>
          </dl>
          <br clear="all" />

          <?php include_partial('destinos',array('lst_destiny' => $lst_destiny)); ?>

          <?php include_partial('hotel_history',array('histo_hotel' => $sf_user->getHotelHistory()))?>

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
          <span style="float: left;"><b> Todos los hoteles <?php echo $pager->getNbResults() ?> </b>
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
            $slug_city = $ar_slug_city[$hotel['city_id']];
            $aid = sfConfig::get('app_aid');
            ?>
          <div class="listados-hoteles">
            <div class="listados-hoteles-foto">
              <a title="<?php echo $hotel['name']; ?>" href="<?php echo url_for('hotel_details',array('id' => $hotel['id'],'slug'=>$slug_city, 'slugh' => $hotel['slug'])) ?>">
                <img src="<?php echo $hotel['medium_photo']; ?>" width="140" height="105"> </a>
            </div>
            <div class="listados-hoteles-info">
              <div class="listados-hoteles-superior">
                <div class="listados-hoteles-precio"><b>valoraci&oacute;n</b> <span><?php echo  $hotel['ranking']; ?></span><br />
                    <?php echo  $hotel['review_nr']; ?> opiniones<br />
                  <a title="opiniones hotel" href="#"
                     onclick="window.open('http://www.booking.com/reviewlist.es.html?tmpl=reviewlistpopup;pagename=<?php echo Utils::nameurl($hotel['url']) ?>;hrwt=1;cc1=fr;target_aid=<?php echo $aid ?>;aid=<?php echo $aid ?>','popup1','width=600,height=700,scrollbars=yes');">ver
                    &uacute;ltimas</a><br />
                  <br />
                  <a title="<?php echo $hotel['name']; ?>"
                     href="<?php echo url_for('hotel_details',array('id' => $hotel['id'],'slug'=>$slug_city, 'slugh' => $hotel['slug'])) ?>"><img
                      src="<?php echo sfConfig::get('app_s_img') ?>precios-hotel.png"
                      alt="Precios de Hotel Mena Andorra" border="0" /></a></div>
                <div class="listados-hoteles-titulo">
                  <a title="<?php echo $hotel['name']; ?>" href="<?php echo url_for('hotel_details',array('id' => $hotel['id'],'slug'=>$slug_city, 'slugh' => $hotel['slug'])) ?>"><?php echo $hotel['name'] ?></a>
                  <?php if($hotel['class_and']): ?><img src="<?php echo sfConfig::get('app_s_img') . $hotel['class_and'] ?>-hotel-estrellas.png" alt="<?php echo $hotel['class_and'] ?> estrellas" /><?php endif; ?> <br />
                  <em><?php echo $hotel['address']; ?>, <?php echo $hotel['city']; ?></em>
                  - <span>
                    <a title="ver mapa" href="" onclick="window.open('<?php echo url_for('mapa') ?>?la=<?php echo $la ?>&lo=<?php echo $lo ?>&ciudad=<?php echo $city ?>&hotel=<?php echo $name ?>','d_mapa','width=700,height=600,scrollbars=yes')">ver mapa</a>
                  </span>
                </div>
                  <?php if($hotel['description']):?>
                <div class="listados-hoteles-descripcion"><?php $desc = substr($hotel['description'], 0, 200);
                      echo substr($hotel['description'], 0, strripos($desc, ' ')) ?>...
                  <a href="<?php echo url_for('hotel_details',array('id' => $hotel['id'],'slug'=>$slug_city, 'slugh' => $hotel['slug'])) ?>">M&aacute;s informaci&oacute;n</a>
                </div>
                  <?php endif;?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <!---fin anuncio hotel-->
          <!-- Paginacion -->
          <div align="center"><br />
            <div class="paginacion">
              <?php if ($pager->haveToPaginate()): ?>
                <?php if (!$pager->isFirstPage()):?>
              <a href="<?php echo url_for('all_hotel') ?>?p=<?php echo $pager->getPreviousPage() ?>" title="P&aacute;gina anterior">
                &lt; Anterior
              </a>
                <?php endif; ?>
                <?php foreach ($pager->getLinks(10) as $page): ?>
                  <?php if ($page == $pager->getPage()): ?>
              <span class="current"><strong><?php echo $page ?></strong></span>
                  <?php else: ?>
              <a href="<?php echo url_for('all_hotel') ?>?p=<?php echo $page ?>" title="Pagina <?php echo $page ?> de hoteles" ><?php echo $page ?></a>
                  <?php endif; ?>
                <?php endforeach; ?>
                <?php if (!$pager->isLastPage()):?>
              <a href="<?php echo url_for('all_hotel') ?>?p=<?php echo $pager->getNextPage() ?>" title="P&aacute;gina siguiente">Siguiente &gt;</a>
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