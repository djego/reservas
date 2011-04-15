<!-- start header alternate -->
<div class="header-alt">
  <div class="slide slide-roundabout bg1">
    <div class="containit ornament-right">
      <div class="roundaboutshadow">
        <h1 class="mb4">El mejor precio garantizado.</h1>
        <p class="mb20">Haz tu reserva con AndorraHotels.com y disfruta de los mejores precios.</p>
        <!-- roundabout images targets, prettyphoto opens on click of the middle item -->
        <script type="text/javascript" charset="utf-8">
          function roundaboutimage1(){  $.prettyPhoto.open('<?php echo sfConfig::get('app_s_img'); ?>showcase/showcase1.jpg', 'title', 'Some Brilliant Project'); }
          function roundaboutimage2(){  $.prettyPhoto.open('<?php echo sfConfig::get('app_s_img'); ?>showcase/showcase2.jpg', 'title', 'Another One'); }
          function roundaboutimage3(){  $.prettyPhoto.open('<?php echo sfConfig::get('app_s_img'); ?>showcase/showcase3.jpg', 'title', 'This is Insane'); }
          function roundaboutimage4(){  $.prettyPhoto.open('<?php echo sfConfig::get('app_s_img'); ?>showcase/showcase4.jpg', 'title', 'Another Comment'); }
          function roundaboutimage5(){  $.prettyPhoto.open('<?php echo sfConfig::get('app_s_img'); ?>showcase/showcase5.jpg', 'title', 'This roundabout Rules'); }
          function roundaboutimage6(){  $.prettyPhoto.open('<?php echo sfConfig::get('app_s_img'); ?>showcase/showcase6.jpg', 'title', 'Awsome Commment'); }
          function roundaboutimage7(){  $.prettyPhoto.open('<?php echo sfConfig::get('app_s_img'); ?>showcase/showcase7.jpg', 'title', 'And Another One'); }
        </script>
        <!-- the actual roundabout -->
        <ul id="roundabout">
          <li id="roundaboutimage1"><a href="#"><img src="<?php echo sfConfig::get('app_s_up'); ?>timthumb5eb4.jpg?w=348&amp;h=228&amp;zc=1" alt="" /></a></li>
          <li id="roundaboutimage2"><a href="#"><img src="<?php echo sfConfig::get('app_s_up'); ?>timthumb4195.jpg?w=348&amp;h=228&amp;zc=1" alt="" /></a></li>
          <li id="roundaboutimage3"><a href="#"><img src="<?php echo sfConfig::get('app_s_up'); ?>timthumb76ca.jpg?w=348&amp;h=228&amp;zc=1" alt="" /></a></li>
          <li id="roundaboutimage4"><a href="#"><img src="<?php echo sfConfig::get('app_s_up'); ?>timthumb4854.jpg?w=348&amp;h=228&amp;zc=1" alt="" /></a></li>
        </ul>
        <div id="filler"><!--  --></div>
      </div>
      <!-- start the roundabout with descriptions -->
      <script type="text/javascript">
        //<![CDATA[
        var descs = {
          roundaboutimage1: 'Hotel en Xixerella',
          roundaboutimage2: 'Hotel Sispony.',
          roundaboutimage3: 'Hotel Ransol',
          roundaboutimage4: 'Hotel en Pal.'

        };
        // settings for first button, for each roundabout image one setting
        var linkone = {
          roundaboutimage1: '',
          roundaboutimage2: '',
          roundaboutimage3: '',
          roundaboutimage4: ''
        };
        // settings for second button, for each roundabout image one setting
        var linktwo = {
            roundaboutimage1: '<a class="btn-medium" href="<?php echo sfConfig::get('app_host_name') ?>/-1397214/xixerella.html"><span>Reservar Hoteles</span></a>',
          roundaboutimage2: '<a class="btn-medium" href="<?php echo sfConfig::get('app_host_name') ?>/-1396951/syspony.html"><span>Reservar Hoteles</span></a>',
          roundaboutimage3: '<a class="btn-medium" href="<?php echo sfConfig::get('app_host_name') ?>/-1396705/ransol.html"><span>Reservar Hoteles</span></a>',
          roundaboutimage4: '<a class="btn-medium" href="<?php echo sfConfig::get('app_host_name') ?>/-1396388/pal.html"><span>Reservar Hoteles</span></a>'
//          roundaboutimage5: '<a class="btn-medium" href="http://themeforest.net/user/bogdanspn/portfolio?ref=bogdanspn"><span>Reservar Hoteles</span></a>',
//          roundaboutimage6: '<a class="btn-medium" href="http://themeforest.net/user/bogdanspn/portfolio?ref=bogdanspn"><span>Purchase This Now</span></a>',
//          roundaboutimage7: '<a class="btn-medium" href="http://themeforest.net/user/bogdanspn/portfolio?ref=bogdanspn"><span>Cufon Buttons are Sexy</span></a>'
        };
        // what happens on focus and on blur
        $('#roundabout li').focus(function() {
          var useLinkone = (typeof linkone[$(this).attr('id')] != 'undefined') ? linkone[$(this).attr('id')] : '';
          $('#roundaboutlinkone').html(useLinkone).fadeIn(200);
          var useLinktwo = (typeof linktwo[$(this).attr('id')] != 'undefined') ? linktwo[$(this).attr('id')] : '';
          $('#roundaboutlinktwo').html(useLinktwo).fadeIn(200);
          var useText = (typeof descs[$(this).attr('id')] != 'undefined') ? descs[$(this).attr('id')] : '';
          $('#roundaboutdescription').html(useText).fadeIn(200);
          Cufon.replace('#roundaboutdescription, #roundaboutlinkone,  #roundaboutlinktwo', { hover: true, textShadow: '1px 1px 0 #ffffff', fontFamily: 'Museo' });
        }).blur(function() {
          $('#roundaboutlinkone').fadeOut(200);
          $('#roundaboutlinktwo').fadeOut(200);
          $('#roundaboutdescription').fadeOut(200);
        });

        $(document).ready(function() {
          var interval;
          $('#roundabout')
          .roundabout({
            shape: 'lazySusan',
            easing: 'swing',
            minOpacity: 1, // 1 fully visible, 0 invisible
            minScale: 0.5, // tiny!
            duration: 400,
            btnNext: '#roundaboutnext',
            btnPrev: '#roundaboutprevious',
            clickToFocus: true
          });
        });
        function startAutoPlay() {
          return setInterval(function() {
            $('#roundabout').roundabout_animateToNextChild();
          }, 3000);
        }
        //]]>
      </script>
    </div>
  </div>

</div>
<!-- end header alternate-->

<!-- start main content -->
<div class="main-content pt-alt">
  <div class="containit">

    <!-- start display roundabout description and links -->
    <div class="boxed-harder clearfix roundaboutdescription roundabout-desclinkbox">
      <div class="fl roundabout-arrows">
        <img src="<?php echo sfConfig::get('app_s_img'); ?>arrow-next-smaller.png" alt="" />
      </div>
      <div class="fl roundabout-desc"><h1 id="roundaboutdescription"></h1></div>
      <div class="fr roundabout-link clearfix"><div id="roundaboutlinkone" class="fl"></div><div id="roundaboutlinktwo" class="fl"></div></div>
    </div>
    <!-- end display roundabout description and links -->

    <div class="full-width clearfix">
      <div class="one-third pt10 border-vert-right-alt">
        <div class="padright">
          <div class="icon-to-left"></div>
        </div>
      </div>
      <div class="one-third-last pt10">
        <div class="padright"> </div>
      </div>
    </div>
    <div class="wide-horz-divider"><!--  --></div>
    <form style="float: left" method="post" action="<?php echo url_for('search') ?>">
    
    <h3>Buscar hoteles</h3>    
    <?php if ($form->isCSRFProtected()) : ?>
            <?php   echo $form['_csrf_token']->render(); ?>
            <?php endif; ?>
    	<div style="float: left;">
	    	<label style="float: left;width: 100px">Ciudad:</label>&nbsp;
	    	<?php echo $form['ciudad']->render(array('style' => 'float:left'))?>
    	</div>
    	<div style="float:left;clear: left">
    		<label style="float: left;width: 100px">Fecha de llegada:</label>&nbsp;
    		<?php echo $form['fecha-inicio']->render(array('style' =>'float:left'))?>    		
    	</div>
    	<div style="float:left;clear: left">
    		<label style="float: left;width: 100px">Fecha de salida:</label>&nbsp;
    		<?php echo $form['fecha-final']->render(array('style' =>'float:left'))?>    		
    	</div>
    	<div style="float:left;clear: left">   		
    		<input type="submit" value="Buscar" />
    	</div>
    </form>  

    <div class="wide-horz-divider"><!--  --></div>
    <div class="full-width clearfix pt0">
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
              <div class="text-button"> <?php echo $val["nr_hotels"] ?> hoteles <a href="<?php echo url_for('city_hotels',array('id' => $ciudad,'slug' => $slug_city)) ?>">Ver más</a> <img src="<?php echo sfConfig::get('app_s_img'); ?>arrow.jpg" width="6" height="7" alt="" class="vm"/></div>
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


    <div class="full-width">
      <div class="two-third"></div>
      <div class="clear"></div>
    </div>

  </div>
</div>
<!-- end main content -->

