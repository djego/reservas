<?php
$title = 'Todos los hoteles - Destinos de Andorra - Ofertas de Hoteles en Andorra ';
$desc = 'Lista de todos los hoteles de Andorra';
$keyword = 'Todos, hoteles, hotel, andorra, reservar hotel, hoteles en, viajes, viaje, viajar, reservas, ofertas, barato, esqui, ordino, tarter, escaldes';
$sf_response->addMeta('title', $title);
$sf_response->addMeta('description', $desc);
$sf_response->addMeta('keywords', $keyword);

?>
<div class="main-container">
  <div class="main-content">

    <div class="home-under">

      <div class="home-content2">
        <div class="navegacion">
          <a href="<?php echo url_for('homepage'); ?>" title="Hoteles en Andorra">Andorra Hoteles</a> > Todos los hoteles</div>

        <div class="listados-izq">
          <dl class="refine">
            <form action="<?php echo url_for('search_city')?>" method="post">
              <?php include_partial('search_pro', array('search_form' => $search_form,'star_sesion' => $star_sesion, 'facil_session' => $facil_session))?>
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
          <h1 class="titulo-listados">Todos los hoteles de Andorra</h1>
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
                     onclick="window.open('http://www.booking.com/reviewlist.es.html?tmpl=reviewlistpopup;pagename=<?php echo Utils::nameurl($hotel['url']) ?>;hrwt=1;cc1=ad;target_aid=<?php echo $aid ?>;aid=<?php echo $aid ?>','popup1','width=600,height=700,scrollbars=yes');">ver
                    &uacute;ltimas</a><br />
                  <br />
                  <a title="<?php echo $hotel['name']; ?>"
                     href="<?php echo url_for('hotel_details',array('id' => $hotel['id'],'slug'=>$slug_city, 'slugh' => $hotel['slug'])) ?>"><img
                      src="<?php echo sfConfig::get('app_s_img') ?>precios-hotel.png"
                      alt="Precios de Hotel Mena Andorra" border="0" /></a></div>
                <div class="listados-hoteles-titulo">
                  <a title="<?php echo $hotel['name']; ?>" href="<?php echo url_for('hotel_details',array('id' => $hotel['id'],'slug'=>$slug_city, 'slugh' => $hotel['slug'])) ?>"><?php echo $hotel['name'] ?></a>
                  <img src="<?php echo sfConfig::get('app_s_img') . $hotel['class_and'] ?>-hotel-estrellas.png" alt="<?php echo $hotel['class_and'] ?> estrellas" /> <br />
                  <em><?php echo $hotel['address']; ?>, <?php echo $hotel['city']; ?></em>
                  - <span>
                    <a title="ver mapa" href="" onclick="window.open('<?php echo url_for('mapa') ?>?la=<?php echo $la ?>&lo=<?php echo $lo ?>&ciudad=<?php echo $city ?>&hotel=<?php echo $name ?>','d_mapa','width=700,height=600,scrollbars=yes')">ver mapa</a>
                  </span>
                </div>
                <div class="listados-hoteles-descripcion"><?php $desc = substr($hotel['description'], 0, 200);
                    echo substr($hotel['description'], 0, strripos($desc, ' ')) ?>...
                  <a href="<?php echo url_for('hotel_details',array('id' => $hotel['id'],'slug'=>$slug_city, 'slugh' => $hotel['slug'])) ?>">M&aacute;s informaci&oacute;n</a>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <!---fin anuncio hotel-->
          <div align="center"><br />
            <div class="paginacion">              
              <?php if ($pager->haveToPaginate()): ?>
                <?php if (!$pager->isFirstPage()):?>
                <a href="<?php echo url_for('all_hotel') ?>?p=<?php echo $pager->getPreviousPage() ?>" title="P&aacute;gina anterior">
                  &lt; Anterior
                </a>
                <?php endif; ?>
                <?php foreach ($pager->getLinks() as $page): ?>
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

          <p>&nbsp;</p><br clear="all" />
        </div>
      </div>
      <div style="clear: both;"></div>
    </div>

  </div>
</div>
