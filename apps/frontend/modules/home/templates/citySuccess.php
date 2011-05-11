<div class="main-container">
  <div class="main-content">

    <div class="home-under">

      <div class="home-content3">
        <div class="navegacion"><a href="<?php echo url_for('homepage')?>"
                                   title="Hoteles en Andorra">Andorra Hoteles</a> > Destinos en Andorra</div>

        <div class="listados-izq"><b>Buscar hoteles:</b><br />
          <br />

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
          <h1 class="titulo-listados">Destinos de Andorra</h1>
          <p align="justify">Andorra es uno de los emplazamientos turísticos
            m&aacute;s bellos para disfrutar de la naturaleza y de la
            monta&ntilde;a, tanto en la temporada de esqu&iacute; y de nieve, como
            en el verano, donde la nieve deja paso a una flora y vistas
            espectaculares.<br />
            <br />
            Los <b>destinos de Andorra m&aacute;s tur&iacute;sticos</b> son:</p>
          <div class="destinosAndorra">
            <ul>
              <?php foreach($lst_cities as $city):?>
              <li>
                <h3><a href="<?php echo url_for('city_hotels',array('id' =>$city['id'],'slug' => $city['slug'] ));?>"><?php echo $city['name'];?></a></h3>
                  <?php echo $city['nr_hotels'];?> hoteles
              </li>
              <?php endforeach;?>

            </ul>
          </div>
        </div>


        <p>&nbsp;</p>
        <br clear="all" />

      </div>

    </div>
    <div style="clear: both;"></div>
  </div>
</div>
