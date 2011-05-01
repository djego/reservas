<h2> Importar XML a BD</h2>
<form action="" method="post">
<table>
<tr>
<th>Importar</th>
<td><button type="submit" onclick="if(window.confirm('Esta seguro de quere iniciar la importanción'));">Iniciar</button></td>
<?php if($sf_user->getFlash('notice')):?>
<td>
<b style="color: #55A802"> <?php echo $sf_user->getFlash('notice'); ?></b>
</td>
<?php endif;?>

</tr>
</table>
</form>