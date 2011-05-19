
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
    <dd class="check-all">
      <input <?php echo  $star_sesion['all']?'checked="checked"':''; ?> type="checkbox" name="star_all" id="star_all"  value="all" />
      <label for="star_all">Todo</label>
    </dd>
    <dd>
      <input <?php echo  $star_sesion['star_1']?'checked="checked"':''; ?>  id="star_1" type="checkbox" name="star_1" value="1" />
      <label for="star_1">1 estrella</label> 
    </dd>
    <dd>
      <input <?php echo  $star_sesion['star_2']?'checked="checked"':''; ?>  id="star_2" type="checkbox" name="star_2" value="2" />
      <label for="star_2">2 estrellas</label> 
    </dd>
    <dd>
      <input <?php echo  $star_sesion['star_3']?'checked="checked"':''; ?>  id="star_3" type="checkbox" name="star_3" value="3" />
      <label for="star_3">3 estrella</label> 
    </dd>
    <dd>
      <input <?php echo  $star_sesion['star_4']?'checked="checked"':''; ?>  id="star_4" type="checkbox" name="star_4" value="4" />
      <label for="star_4">4 estrellas</label> 
    </dd>
    <dd>
      <input <?php echo  $star_sesion['star_5']?'checked="checked"':''; ?>  id="star_5" type="checkbox" name="star_5" value="5" />
      <label for="star_5">5 estrella</label> 
    </dd>

  <?php // echo $search_form['star']->render(); ?>

  <dt>Facilidades</dt>
    <dd class="check-all">
      <input <?php echo  $facil_session['all']?'checked="checked"':''; ?> type="checkbox" name="facil_all" id="facil_all"  value="all" />
      <label for="facil_all">Sin preferencias</label>
    </dd>
    <dd>
      <input <?php echo  $facil_session['facil_1']?'checked="checked"':''; ?>  id="facil_1" type="checkbox" name="facil_1" value="Conexión inalámbrica" />
      <label for="facil_1">Conexión WIFI Internet</label> 
    </dd>
    <dd>
      <input <?php echo  $facil_session['facil_2']?'checked="checked"':''; ?>  id="facil_2" type="checkbox" name="facil_2" value="Gimnasio" />
      <label for="facil_2">Gimnasio</label> 
    </dd>    
    <dd>
      <input <?php echo  $facil_session['facil_3']?'checked="checked"':''; ?>  id="facil_3" type="checkbox" name="facil_3" value="Spa" />
      <label for="facil_3">Spa</label> 
    </dd>  
    <dd>
      <input <?php echo  $facil_session['facil_4']?'checked="checked"':''; ?>  id="facil_4" type="checkbox" name="facil_4" value="Piscina cubierta" />
      <label for="facil_4">Piscina cubierta</label> 
    </dd> 
    <dd>
      <input <?php echo  $facil_session['facil_5']?'checked="checked"':''; ?>  id="facil_5" type="checkbox" name="facil_5" value="Piscina al aire libre" />
      <label for="facil_5">Piscina al aire libre</label> 
    </dd>
    <dd>
      <input <?php echo  $facil_session['facil_6']?'checked="checked"':''; ?>  id="facil_6" type="checkbox" name="facil_6" value="Se admiten animales" />
      <label for="facil_6">Se admiten animales</label> 
    </dd>      
    <dd>
      <input <?php echo  $facil_session['facil_7']?'checked="checked"':''; ?>  id="facil_7" type="checkbox" name="facil_7" value="Aparcamiento" />
      <label for="facil_7">Aparcamiento</label> 
    </dd>    
    <dd>
      <input <?php echo  $facil_session['facil_8']?'checked="checked"':''; ?>  id="facil_8" type="checkbox" name="facil_8" value="Restaurante" />
      <label for="facil_8">Restaurante</label> 
    </dd>    
    
  <?php // echo $search_form['facility']->render(); ?>
