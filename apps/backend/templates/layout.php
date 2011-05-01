<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
	<div style="float: right;"><a href="<?php echo sfConfig::get('app_host_name')?>">Pagina</a> | Usuario: <?php if($sf_user->isAuthenticated()):?><b><?php echo $sf_user->getUsername(); ?></b><?php endif;?> | <a href="guard/logout">Cerrar</a></div>

	</ul>
    <?php echo $sf_content ?>
  </body>
</html>
