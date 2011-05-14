
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
    <button type="submit" title="Buscar hoteles" name="search_pro" value="pro">Buscar</button>
  </div>

  <!--    <dt>Tipo de habitaciones</dt>
    <dd class="check-all">
      <input type="checkbox" name="person_all" id="person_all" checked="checked" value="all" />
      <label for="person_all">Todo</label>
      <span class="counter" id="person_all_count"></span>
    </dd>
    <dd><input type="checkbox" name="person_1" id="person_1" value="1" /><label
        for="person_1">Individuales</label> <span class="counter"
        id="person_1_count"></span></dd>
    <dd><input type="checkbox" name="person_2" id="person_2" value="2" /><label
        for="person_2">Dobles</label> <span class="counter"
        id="person_2_count"></span></dd>
    <dd><input type="checkbox" name="person_3" id="person_3" value="3" /><label
        for="person_3">Triples</label> <span class="counter"
        id="person_3_count"></span></dd>
    <dd><input type="checkbox" name="person_4" id="person_4" value="4" /><label
        for="person_4">Cuádruples</label> <span class="counter"
        id="person_4_count"></span></dd>
    <dd><input type="checkbox" name="person_5" id="person_5" value="5" /><label
        for="person_5">Grandes (5+)</label> <span class="counter"
        id="person_5_count"></span></dd>
  -->
  <dt>Número de estrellas</dt>

  <?php echo $search_form['star']->render(); ?>

  <dt>Facilidades</dt>

  <?php echo $search_form['facility']->render(); ?>
