<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head profile="http://gmpg.org/xfn/11">
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <meta http-equiv="content-language" content="es" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="revisir-after" content="30" />
    <meta name="robots" content="all" />
    <meta name="distribution" content="global" />
    <meta name="resource-type" content="document" />    
    <link rel="shortcut icon" href="favicon.html" type="image/x-icon" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>

    <link rel="shortcut icon" href="favicon.html" type="image/x-icon" />

    <!-- Load Jquery Easing -->
    <script src="<?php echo sfConfig::get('app_s_js'); ?>jquery.easing.js" type="text/javascript"></script>
    <script src="<?php echo sfConfig::get('app_s_js'); ?>jquery.css-transform.js" type="text/javascript"></script>
    <script src="<?php echo sfConfig::get('app_s_js'); ?>jquery.css-rotate-scale.js" type="text/javascript"></script>
    <!-- End Load -->

    <!-- Load Jquery Cycle and adiacent CSS File -->
    <script src="<?php echo sfConfig::get('app_s_js'); ?>jquery.cycle.js" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php echo sfConfig::get('app_s_css'); ?>jquery.cycle.css" type="text/css" media="screen" />
    <!-- End Load -->

    <!-- Load Cufon and Adiacent Font Files, and apply Cufon on used Styles -->
    <script src="<?php echo sfConfig::get('app_s_js'); ?>cufon.js" type="text/javascript"></script>
    <script src="<?php echo sfConfig::get('app_s_js'); ?>Museo_400-Museo_italic_400.font.js" type="text/javascript"></script>
    <!-- End Load -->

    <!-- Load Pretty Photo -->
    <link rel="stylesheet" href="<?php echo sfConfig::get('app_s_css'); ?>prettyPhoto.css" type="text/css" media="screen" />
    <script src="<?php echo sfConfig::get('app_s_js'); ?>jquery.prettyPhoto.js" type="text/javascript"></script>
    <script type="text/javascript">
      /* pretty photo responds on rel='prettyPhoto' */
      jQuery(document).ready(function() { $("a[rel^='prettyPhoto']").prettyPhoto();   });
    </script>
    <!-- End Load -->

    <!-- Load Superfish Drowpdown Menu, and run it -->

    <script src="<?php echo sfConfig::get('app_s_js'); ?>superfish.js" type="text/javascript" charset="utf-8"></script>
    <!-- End Load -->

    <!-- Load Jquery Roundabout, and adiacent JS & CSS file -->
    <script src="<?php echo sfConfig::get('app_s_js'); ?>jquery.roundabout.js" type="text/javascript"></script>
    <script src="<?php echo sfConfig::get('app_s_js'); ?>jquery.roundabout-shapes-1.1.js" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php echo sfConfig::get('app_s_css'); ?>jquery.roundabout.css" type="text/css" media="screen" />
    <!-- End Load -->

    <!-- Load SWFObject, used for video embedding -->
    <script src="<?php echo sfConfig::get('app_s_js'); ?>swfobject.js" type="text/javascript" charset="utf-8"></script>
    <!-- End Load -->

    <!-- Load Quicksand -->
    <script src="<?php echo sfConfig::get('app_s_js'); ?>jquery.quicksand.js" type="text/javascript" charset="utf-8"></script>
    <!-- End Load -->

    <!-- Load some small custom scripts -->
    <script src="<?php echo sfConfig::get('app_s_js'); ?>custom.js" type="text/javascript"></script>
    <!-- End Load -->

    <!-- Load Main Stylesheet -->
    <link rel="stylesheet" href="<?php echo sfConfig::get('app_s_css'); ?>style.css" type="text/css" media="screen" />
    <!-- End Load -->

    <!-- Load Main Enhancements Stylesheet border radius, transparency and such things -->
    <link rel="stylesheet" href="<?php echo sfConfig::get('app_s_css'); ?>style-enhance.css" type="text/css" media="screen" />
    <!-- End Load -->

    <!-- Load IE Stylesheet -->
    <!--[if IE]>
    <link rel="stylesheet" href="<?php echo sfConfig::get('app_s_css'); ?>ie.css" type="text/css" media="screen" />
    <![endif]-->
    <!-- End Load -->

    <!-- Load IE6 Stylesheet -->
    <!--[if IE 6]>
    <link rel="stylesheet" href="<?php echo sfConfig::get('app_s_css'); ?>ie6.css" type="text/css" media="screen" />
    <![endif]-->
    <!-- End Load -->

    <!-- Load PNG Fix older IE Versions -->
    <!--[if lt IE 7]>
        <script type="text/javascript" src="<?php echo sfConfig::get('app_s_js'); ?>pngfix.js"></script>
        <script type="text/javascript">DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <!-- End Load -->

  </head>
  <body>

    <!-- start top and main menu -->
    <div class="main-menu">
      <div class="ornament">
        <div class="containit">
          <div class="logo"><a href="<?php echo url_for('@homepage'); ?>"><img src="<?php echo sfConfig::get('app_s_img'); ?>logo.png" alt="Andorra Hotels" /></a></div>
          <div class="menu">
            <!-- navigation start -->
            <div id="navigation">

              <ul class="sf-menu">
                <li><a href="<?php echo url_for('homepage'); ?>" class="applyfont">Home</a> </li>
                <li><a href="<?php echo url_for('nosotros'); ?>" class="applyfont">Nosotros</a>

                </li>

                <li><a href="<?php echo url_for('faq'); ?>" class="applyfont">FAQ</a></li>

                <li><a href="<?php echo url_for('condiciones'); ?>" class="applyfont">Condiciones</a></li>
                <li class="last"><a href="<?php echo url_for('contactos'); ?>" class="applyfont">Contacto</a> </li>
              </ul>

            </div>
            <!-- navigation end -->
          </div>
          <div class="clear"></div>
        </div>
      </div>
    </div>
    <!-- end top and main menu -->
    <?php echo $sf_content ?>
    <!-- start big footer -->
    <div class="big-footer">
      <div class="top-shadow-footer"><!--  --></div>
      <div class="containit">
        <div class="full-width clearfix">
          <div class="one-fourth panel">
            <div class="nopad">
              <h4>Link</h4>
              <ul>
                <li><a href="<?php echo url_for('homepage'); ?>">Home</a></li>
                <li><a href="<?php echo url_for('nosotros'); ?>">Nosotros</a></li>
                <li><a href="<?php echo url_for('faq'); ?>">FAQ</a></li>
                <li><a href="<?php echo url_for('condiciones'); ?>">Condiciones</a></li>
                <li class="last"><a href="<?php echo url_for('contactos'); ?>">Contacto</a></li>
              </ul>
            </div>
          </div>
          <div class="one-fourth panel border-vert-left">
            <div class="padleft">
              <h4>Otros Destinos</h4>
              <ul>
                <li><a href="#">El Tarter</a></li>
                <li><a href="#">Canillo</a></li>
                <li><a href="#">Encamp</a></li>
                <li><a href="#">La Massana</a></li>

              </ul>
            </div>
          </div>
          <div class="one-fourth panel border-vert-left">
            <div class="padleft">
              <h4>Contacto</h4>
              <p>Para mas información</p>

              <b class="big">T: 12345678</b><br/>
              <b class="big">F: 123456789</b><br/>
              <a href="#">info@andorrahotels.com</a><br/>
            </div>
          </div>
          <div class="one-fourth-last panel border-vert-left newsletter">
            <div class="padleft">
              <h4>Busqueda<br/>
                Rapida</h4>
              <p>Para buscar algun hotel usa el formulario de abajo.</p>
              <table cellpadding="0" cellspacing="0">
                <tr>
                  <td><input name="" class="field"/></td>
                  <td><input type="image" name="go" src="<?php echo sfConfig::get('app_s_img'); ?>newsletter-input-button.png" alt="Go" class="form-imagebutton"/></td>
                </tr>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- end big footer -->

    <!-- start small footer -->
    <div class="small-footer">
      <div class="containit">

        <div class="copy">Copyright &copy; 2011</div>
        <div class="social">
          <ul>
            <li><a href="#"><img src="<?php echo sfConfig::get('app_s_img'); ?>icons/icon-twitter.png" width="26" height="27" alt="" class="vm"/>Twitter</a></li>
            <li><a href="#"><img src="<?php echo sfConfig::get('app_s_img'); ?>icons/icon-facebook.png" width="26" height="25" alt=""  class="vm"/>Facebook</a></li>
          </ul>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <!-- end start small footer -->
    <script type="text/javascript"> Cufon.now(); </script>


  </body>

</html>