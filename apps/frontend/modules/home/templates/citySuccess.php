<div class="main-container">
<div class="main-content">

<div class="home-under">

<div class="home-content3">
<div class="navegacion"><a href="<?php echo url_for('homepage')?>"
	title="Hoteles en Andorra">Andorra Hoteles</a> > Destinos en Andorra</div>

<div class="listados-izq"><b>Buscar hoteles:</b><br />
<br />
<form id="frm-refine" action="" class="" method="post"
	accept-charset="utf-8" enctype="multipart/form-data">
<dl class="refine">

	<form action="/es/bookcore_engine/availability/" method="post">
	<dt>Destino</dt>
	<dd><input type="text" name="destino" id="b_destination" value=""
		size="25" /></dd>

	<dt>Fecha de entrada:</dt>
	<dd><input class="" name="fecha_entrada"
		value="<?php echo date("d/m/Y") ?>" id="id_fecha_entrada" type="text"></dd>
	<dt>Fecha de salida:</dt>
	<dd><input class="" name="fecha_salida"
		value="<?php echo Utils::sumaDia(date("d/m/Y"),1); ?>"
		id="id_fecha_salida" type="text"></dd>


	<div align="center">
	<button type="submit" title="Buscar hoteles">Buscar</button>
	</div>
	</form>

</dl>

<br clear="all" />
<div class="ventajas">Ventajas de reservar en AndorraHoteles</div>
<div class="ventajas2">
<ul>
	<li>Los mejores precios.</li>
	<li>M&aacute;s de 200 hoteles en Andorra.</li>
	<li>Disponibilidad en tiempo real.</li>
	<li>Sin cargos por gesti&oacute;n en tus reservas.</li>
	<li>El pago se realiza en el hotel.</li>
</ul>
</div>

</div>


<div class="listados-drcha">
<h1 class="titulo-listados">Destinos de Andorra</h1>
<p align="justify">Andorra es uno de los emplazamientos turísticos
m&aacute;s bellos para disfrutar de la naturaleza y de la
monta&ntilde;a, tanto en la temporada de esqu&iacute; y de nieve, como
en el verano, donde la nieve deja paso a una flora y vistas
espectaculares.<br />
<br />
Los <b>destinos de Andorra m&aacute;s tur&iacute;sticos</b> son:</p>
<div class="destinosAndorra">
<ul>
<?php foreach($lst_cities as $city):?>
	<li>
	<h3><a href="<?php echo url_for('city_hotels',array('id' =>$city['id'],'slug' => $city['slug'] ));?>"><?php echo $city['name'];?></a></h3>
		<?php echo $city['nr_hotels'];?> hoteles
	</li>
<?php endforeach;?>

</ul>
</div>
</div>


<p>&nbsp;</p>
<br clear="all" />

</div>

</div>
<div style="clear: both;"></div>
</div>
</div>
