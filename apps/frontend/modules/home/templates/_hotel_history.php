<br clear="all" />
<?php if(count($histo_hotel) > 1): ?>
<div class="ventajas">&Uacute;ltimos hoteles visitados</div>
<?php endif; ?>
<?php if(isset($hs)):?>
<div class="seccion_hoteles_cercanos">
  <?php foreach ($histo_hotel as $hotel):?>
  <?php if($hotel['id'] != $hs['id']):?>
  <div class="hotel-cercano">
    <div class="hotel-cercano-foto">
      <a href="<?php echo url_for('hotel_details',array('id' => $hotel['id'],'slug'=>'paris', 'slugh' => $hotel['slug'])) ?>">
        <img width="60" height="60" src="<?php echo $hotel['small_photo']; ?>">
      </a>
    </div>
    <a href="<?php echo url_for('hotel_details',array('id' => $hotel['id'],'slug'=>'paris', 'slugh' => $hotel['slug'])) ?>" title="<?php echo $hotel['name']; ?>"><?php echo $hotel['name']; ?></a>
    <img src="<?php echo sfConfig::get('app_s_img') . $hotel['class_and'] ?>-hotel-estrellas.png" alt="<?php echo $hotel['class_and'] ?> estrellas" />
    <br>
    <em><?php echo $hotel['address']; ?></em>
  </div>
  <?php endif; ?>
  <?php endforeach;?>

</div>
<?php else: ?>
<div class="seccion_hoteles_cercanos">
  <?php foreach ($histo_hotel as $hotel):?>
  <div class="hotel-cercano">
    <div class="hotel-cercano-foto">
      <a href="<?php echo url_for('hotel_details',array('id' => $hotel['id'],'slug'=>'paris', 'slugh' => $hotel['slug'])) ?>">
        <img width="60" height="60" src="<?php echo $hotel['small_photo']; ?>">
      </a>
    </div>
    <a href="<?php echo url_for('hotel_details',array('id' => $hotel['id'],'slug'=>'paris', 'slugh' => $hotel['slug'])) ?>" title="<?php echo $hotel['name']; ?>"><?php echo $hotel['name']; ?></a>
    <img src="<?php echo sfConfig::get('app_s_img') . $hotel['class_and'] ?>-hotel-estrellas.png" alt="<?php echo $hotel['class_and'] ?> estrellas" />
    <br>
    <em><?php echo $hotel['address']; ?></em>
  </div>
  <?php endforeach;?>

</div>
<?php endif;  ?>