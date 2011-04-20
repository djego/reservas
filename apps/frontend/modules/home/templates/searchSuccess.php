<!-- start header inner -->
<div class="header-inner">
  <div class="background bg1 clearfix">
    <div class="containit">
      <h1>Ciudades</h1>
      <div class="subtitle">
        <h3>Listado de hoteles en Andorra</h3></div>
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
          <li>Busqueda</li>
        </ul>
      </div>
      <div class="blinks">
        <ul>
          <li><img src="<?php echo sfConfig::get('app_s_img')?>icons/icon-favorite.png" width="16" height="16" alt="" class="vm"/> <a href="#">Bookmark This Page</a></li>
          <li><img src="<?php echo sfConfig::get('app_s_img')?>icons/icon-share.png" width="16" height="16" alt="" class="vm"/>
            <!-- AddThis Button BEGIN -->
            <a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;username=xa-4c9218561886c99b">Add This</a>
            <script type="text/javascript" src="../../../../s7.addthis.com/js/250/addthis_widget.js#username=xa-4c9218561886c99b"></script>
            <!-- AddThis Button END -->
          </li>
        </ul>
      </div>
    </div>

    <div class="wide-horz-divider"><!--  --></div>
    <div id="paginado" style="width:205px; top:45px; left:787px; z-index:30;"></div>
    <div class="full-width clearfix pt0">


      <div class="two-third border-vert-right">
        <h1>Resultado de ciudades</h1>
      <?php if(count($lst_ciudad)>0):?>
      <?php
        $ciudad = "";$i=0;
        foreach ($lst_ciudad as $val) { $i++;
          if ($ciudad != $val["city_id"]) {
            $ciudad = $val["city_id"];
            $name = $val["name"];
            $slug_city = Utils::slugify($val["name"]); ?>
            <div class="one-fourth pt20">
              <h3>Hoteles en <?php echo $name ?></h3>
              <div class="text-button"> <?php echo $val["nr_hotels"] ?> hoteles <a href="<?php echo url_for('city_hotels_result',array('id' => $ciudad,'slug' => $slug_city)) ?>">Ver más</a> <img src="<?php echo sfConfig::get('app_s_img'); ?>arrow.jpg" width="6" height="7" alt="" class="vm"/></div>
            </div>
      <?php
          }
        }
      ?>
      <?php else:?>
        	<div class="one-fourth pt20">
                  <h3>No hay resultados</h3>
                </div>
        <?php endif;?>
      </div>

      <div id="paginado" style="width:205px; top:45px; left:787px; z-index:30;"></div>
      <div class="one-third-last pt20">
        <div class="padright">

          <div class="blog-search">
            <?php include_partial('form_search',array('form' =>$form)) ?>
          </div>

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
      </div>                     <div class="clear"></div>

      <div class="wide-horz-divider"><!--  --></div>
      <div class="mt20"><!--  --></div>
      <div class="fr clearfix"></div>
      <div class="clear"></div>
      <br/>
    </div>



  </div>
</div>