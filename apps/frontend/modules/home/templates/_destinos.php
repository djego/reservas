<h3 class="puntosdeinteres">Buscar hoteles cerca de</h3>
<div class="puntosinteres">
  <ul>
    <?php foreach ($lst_destiny as $key => $destiny): ?>
    <li class="puntointeres"><?php echo $key ?></li>
    <?php foreach ($destiny as $des):?>
    <li><a href="<?php echo url_for('tour_hotels',array('id' =>$des['id'],'slug' => $des['slug']));?>"><?php echo $des['name'];?></a></li>
    <?php endforeach; ?>
    <?php endforeach; ?>
    
  </ul>
</div>