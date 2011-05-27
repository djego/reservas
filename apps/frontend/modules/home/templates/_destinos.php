<h3 class="puntosdeinteres">Buscar hoteles cerca de</h3>
<div class="puntosinteres">
  <ul>
    <?php foreach ($lst_destiny as $key => $destiny): ?>
    <li class="puntointeres"><?php echo $key ?></li>
    <?php foreach ($destiny as $des):?>
    <?php if(isset($des['distancia'])):?>
    <?php if($des['distancia']):?>
    <li><a href="<?php echo url_for('tour_hotels',array('id' =>$des['id'],'slug' => $des['slug']));?>"><?php echo $des['name'];?></a> <?php echo '('.$des['distancia'].' Km)' ?></li>
    <?php else:?>
    <li><?php echo $des['name'];?></li>
    <?php endif;?>
    <?php else: ?>
    <li><a href="<?php echo url_for('tour_hotels',array('id' =>$des['id'],'slug' => $des['slug']));?>"><?php echo $des['name'];?></a></li>

    <?php endif;?>
    <?php endforeach; ?>
    <?php endforeach; ?>
    
  </ul>
</div>