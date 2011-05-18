<div class="main-container">
  <div class="main-content">

    <div class="home-under">

      <div class="home-content3">
        <div class="navegacion"><a href="http://www.andorrahoteles.com" title="Hoteles en Andorra">Andorra Hoteles</a> > Turismo  en Andorra</div>

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
          <h1 class="titulo-listados">Turismo en Andorra</h1>
          <p align="justify">Andorra cuenta con una gran variedad de enclaves turísticos que te encantarán visitar. Porque Andorra es mucho más que nieve y esquí. Sumergete en los circuitos culturales de Andorra.</p>
          <p align="justify"><strong><u>Descubre el arte románico de Andorra</u></strong></p>
          <p align="justify"><img align="right" src="<?php echo sfConfig::get('app_s_img') ?>bus-turistico-andorra.jpg" alt="Bus Turístico de Andorra" width="268" height="135" />Andorra cuenta con más de 40 iglesias románicas. Todas ellas con una decoración u ornamentación austera, pero a la vez muestran todo su encanto y su belleza.</p>
          <p align="justify">Algunas de estas iglesias y capillas románicas son: Sant Joan de Caselles, Sant Romà de les Bons, San Martí de la Cortinada,   Sant Climent de Pal, Santa Coloma, Sant Cerni de Nagol o Sant Miquel   d'Engolasters...</p>
          <p align="justify">Existe un<strong> Bus Turístico</strong> en Andorra con el que podrás descubrir, de un forma original, el arte románico de Andorra.</p>
          <p align="justify">&nbsp;</p>
          <p align="justify"><strong><u>Museos de Andorra</u></strong></p>
          <p align="justify">Andorra también cuenta con una gran variedad de museos, como son Museo de la Electricidad, Museo del Tabaco, Museo Areny Plandolit, Museo Postal, Museo Nacional del Automovil, Casa Rull, Casa de la Vall ...</p>
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