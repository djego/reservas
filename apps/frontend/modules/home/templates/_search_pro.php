
<dt>Filtrar por estrellas</dt>
<dd>
  <input <?php echo  $star_sesion['star_1']?'checked="checked"':''; ?>  id="star_1" type="checkbox" name="star_1" value="1" />
  <label for="star_1"><span><img src="<?php echo sfConfig::get('app_s_img'); ?>1-hotel-estrellas.png" alt="1 estrella" width="66" height="12" /> (<?php echo $num_hotels[1]?> hoteles)</span></label>
</dd>
<dd>
  <input <?php echo  $star_sesion['star_2']?'checked="checked"':''; ?>  id="star_2" type="checkbox" name="star_2" value="2" />
  <label for="star_2"><span><img src="<?php echo sfConfig::get('app_s_img'); ?>2-hotel-estrellas.png" alt="1 estrella" width="66" height="12" /> (<?php echo $num_hotels[2]?> hoteles)</span></label>
</dd>
<dd>
  <input <?php echo  $star_sesion['star_3']?'checked="checked"':''; ?>  id="star_3" type="checkbox" name="star_3" value="3" />
  <label for="star_3"><span><img src="<?php echo sfConfig::get('app_s_img'); ?>3-hotel-estrellas.png" alt="1 estrella" width="66" height="12" /> (<?php echo $num_hotels[3]?> hoteles)</span></label>
</dd>
<dd>
  <input <?php echo  $star_sesion['star_4']?'checked="checked"':''; ?>  id="star_4" type="checkbox" name="star_4" value="4" />
  <label for="star_4"><span><img src="<?php echo sfConfig::get('app_s_img'); ?>4-hotel-estrellas.png" alt="1 estrella" width="66" height="12" /> (<?php echo $num_hotels[4]?> hoteles)</span></label>
</dd>
<dd>
  <input <?php echo  $star_sesion['star_5']?'checked="checked"':''; ?>  id="star_5" type="checkbox" name="star_5" value="5" />
  <label for="star_5"><span><img src="<?php echo sfConfig::get('app_s_img'); ?>5-hotel-estrellas.png" alt="1 estrella" width="66" height="12" /> (<?php echo $num_hotels[5]?> hoteles)</span></label>
</dd>


<br clear="all" />
<dt>Filtrar por facilidades</dt>
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