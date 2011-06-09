
<?php if ($search_form->isCSRFProtected()) : ?>
  <?php echo $search_form['_csrf_token']->render(); ?>
<?php endif; ?>
<dt>Fecha de entrada:</dt>
<dd>
  <?php echo $search_form['fecha-inicio']->render(array('onchange' => "checkDateOrder('formulario', 'search_fecha-inicio_day', 'search_fecha-inicio_month', 'search_fecha-final_day', 'search_fecha-final_month');")) ?>
  <a id="b_checkinCalPos" class="b_requiresJsInline" href="javascript:showCalendar('b_checkinCalPos',%20'b_calendarPopup',%20'search_fecha-inicio',%20'formulario');" title="Fecha de llegada" rel="nofollow">
    <img src="<?php echo sfConfig::get('app_s_img') ?>calendar.png" alt="Fecha de llegada" />
  </a>
</dd>
<dt>Fecha de salida:</dt>
<dd>
  <?php echo $search_form['fecha-final']->render() ?>
  <a id="b_checkoutCalPos" class="" href="javascript:showCalendar('b_checkoutCalPos',%20'b_calendarPopup',%20'search_fecha-final',%20'formulario');" title="Fecha de salida" rel="nofollow">
    <img src="<?php echo sfConfig::get('app_s_img') ?>calendar.png" alt="Fecha de salida">
  </a>
</dd>

<div align="center"><button type="submit" title="Buscar hoteles">Buscar</button></div>
<div id="b_calendarPopup" class="b_popup">
  <div id="b_calendarInner" class="b_popupInner"> </div>
</div>

<script type="text/javascript"><!--//--><![CDATA[//><!--
  calendar = new Object();
  tr = new Object();
  tr.nextMonth = "Mes siquiente";
  tr.prevMonth = "Mes anterior";
  tr.closeCalendar = "Cerrar el calendario";
  var months=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
  var days=['Lu','Ma','Mi','Ju','Vi','Sa','Do'];
  //--><!]]>
</script>