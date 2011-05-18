<div class="main-container">
  <div class="main-content">

    <div class="home-under">

      <div class="home-content3">
        <div class="navegacion"><a href="<?php echo url_for('homepage'); ?>" title="Hoteles en Andorra">Andorra Hoteles</a> > Excursiones y actividades en Andorra</div>

        <div class="listados-izq">


          <b>Buscar hoteles:</b><br /><br />
           <dl class="refine">

            <form action="<?php echo url_for('search_city') ?>" method="post">
              <?php if ($search_form->isCSRFProtected()) : ?>
                <?php echo $search_form['_csrf_token']->render(); ?>
              <?php endif; ?>
              <dt>Destino</dt>
              <dd><?php echo $search_form['destino']->render() ?></dd>

              <dt>Fecha de entrada:</dt>
              <dd><?php echo $search_form['fecha_entrada']->render() ?></dd>
              <dt>Fecha de salida:</dt>
              <dd><?php echo $search_form['fecha_salida']->render() ?></dd>


              <div align="center">
                <button type="submit" title="Buscar hoteles">Buscar</button>
              </div>
            </form>

          </dl>

            <br clear="all" />

            <div align="center"> <script type="text/javascript">
              var uri = 'http://impes.tradedoubler.com/imp?type(js)g(18056778)a(1085412)' + new String (Math.random()).substring (2, 11);
              document.write('<sc'+'ript type="text/javascript" src="'+uri+'" charset=""></sc'+'ript>');
              </script>  </div>
            <br clear="all" /><br clear="all" />
        </div>


        <div class="listados-drcha">
          <h1 class="titulo-listados">Excursiones y actividades en Andorra</h1>
          <p align="justify">Andorra es mucho más que nieve y esquí ya que cuenta con una <strong>gran variedad de actividades</strong>, de programas y de excursiones que se pueden realizar, desde senderismo, patinaje sobre hielo, motos de nieve, escalada, rutas en 4x4, pesca, caza... hasta disfrutar y relajarte en un balneario (el Balneario de Caldea es un importante centro termal de Andorra).</p>
          <p align="justify">&nbsp;</p>
          <p align="center"><script type="text/javascript">
            var uri = 'http://impes.tradedoubler.com/imp?type(js)g(17095270)a(1085412)' + new String (Math.random()).substring (2, 11);
            document.write('<sc'+'ript type="text/javascript" src="'+uri+'" charset=""></sc'+'ript>');
            </script></p>

        </div>


        <p>&nbsp;</p><br clear="all" />

      </div>

    </div>
    <div style="clear: both;"></div>
  </div>
</div>