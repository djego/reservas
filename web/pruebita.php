        <div class="modulo6001">
          <h2 class="tituloSeccion">Servicios del hotel</h2>
          <?php foreach ($services as $service_dad):?>
          <?php if(isset($service_dad['name'])):?>
          <h3><?php echo $service_dad['name'] ?></h3>
              <?php $cad ='';
              foreach ($service_dad['child'] as $item) {
                $cad.=$item.', ';
                }
              ?>
          <p style="text-align: left "><?php echo substr($cad, 0, -2) ?> </p>
          <?php endif ?>
          <?php endforeach;?>
        </div>