<form class="form_search" method="post" action="<?php echo url_for('search') ?>">

  <h3>Buscar hoteles</h3>
  <?php if ($form->isCSRFProtected()) : ?>
    <?php echo $form['_csrf_token']->render(); ?>
  <?php endif; ?>
  <div style="float: left;">
    <label style="float: left;width: 100px">Ciudad:</label>&nbsp;
    <?php echo $form['ciudad']->render(array('style' => 'float:left')) ?>
  </div>
  <div style="float:left;clear: left">
    <label style="float: left;width: 100px">Fecha de llegada:</label>&nbsp;
    <?php echo $form['fecha-inicio']->render(array('style' => 'float:left')) ?>
  </div>
  <div style="float:left;clear: left">
    <label style="float: left;width: 100px">Fecha de salida:</label>&nbsp;
    <?php echo $form['fecha-final']->render(array('style' => 'float:left')) ?>
  </div>
  <div style="float:left;clear: left">
    <input type="submit" value="Buscar" />
  </div>
</form>
