<form id="frm-refine" action="" class="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
  <?php if ($search_form->isCSRFProtected()) : ?>
    <?php echo $search_form['_csrf_token']->render(); ?>
  <?php endif; ?>
  <dt>Fecha de entrada:</dt>
  <dd>
    <?php echo $search_form['fecha-inicio']->render()?>
    <img src="<?php echo sfConfig::get('app_s_img')?>calendar.png" alt="Calendario" />
  </dd>

  <dt>Fecha de salida:</dt>
  <dd>
    <?php echo $search_form['fecha-final']->render()?>
    <img src="<?php echo sfConfig::get('app_s_img')?>calendar.png" alt="Calendario" />
  </dd>

  <div align="center"><button type="submit" title="Buscar hoteles" name="search_button" value="list">Buscar</button></div>

</form>