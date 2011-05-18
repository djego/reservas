
<div class="main-container">
  <div class="main-content">

    <div class="home-under">

      <div class="home-content3">
        <div class="navegacion"><a href="http://www.andorrahoteles.com" title="Hoteles en Andorra">Andorra Hoteles</a> > Esquí en Andorra</div>

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
          <h1 class="titulo-listados">Esquí en Andorra</h1>
          <p align="justify">Andorra, dada su privilegiada situación, cuenta con el unas condiciones magnificas para la temporada de esquí, con <strong>nieve de calidad</strong> y muchos días de sol. Y, como no, unos <strong>300 kilómetros de pistas para poder esquiar</strong>.</p>
          <p align="justify">Además dispone del mayor dominio esquiable de los Pirineos, en Grandvalira con 193 kilómetros de pistas de esquí.</p>
          <p align="justify">Las <u>estaciones de esquí de Andorra</u> son: <strong>Grandvalira</strong> (<a href="http://www.andorrahoteles.com/-1396418/pas-de-la-casa.html">Pas de la Casa</a> - <a href="http://www.andorrahoteles.com/900039622/grau-roig.html">Grau Roig</a> y <a href="http://www.andorrahoteles.com/-1397029/soldeu.html">Soldeu</a> <a href="http://www.andorrahoteles.com/-1395312/el-tarter.html">el Tarter</a>), <strong>Vallnord</strong> (<a href="http://www.andorrahoteles.com/-1396388/pal.html">Pal</a> <a href="http://www.andorrahoteles.com/-1394484/arinsal.html">Arinsal</a> y <a href="http://www.andorrahoteles.com/-1396343/ordino.html">Ordino</a>-Arcalís), y <strong>La Rabassa Naturlandia</strong>, un parque temático dedicado a la nieve.</p>
          <p align="justify">Las estaciones cuentan con <em>Forfait de manos libres</em>, tan demandadas por los esquiadores, ya que permiten una mayor agilidad en los accesos y se evitan, en gran medida, las colas de espera.</p>
          <div align="center"><script type="text/javascript">
            var uri = 'http://impes.tradedoubler.com/imp?type(img)g(16609072)a(1085412)' + new String (Math.random()).substring (2, 11);
            document.write('<a href="http://clk.tradedoubler.com/click?p=23989&a=1085412&g=16609072" target="_BLANK"><img src="'+uri+'" border=0></a>');
            </script></div>
        </div>


        <p>&nbsp;</p><br clear="all" />

      </div>

    </div>
    <div style="clear: both;"></div>
  </div>
</div>