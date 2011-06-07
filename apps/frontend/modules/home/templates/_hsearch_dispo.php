<form id="formularioHotel"  action="" method="get">
  <?php if ($form_dis->isCSRFProtected()) : ?>
    <?php echo $form_dis['_csrf_token']->render(); ?>
  <?php endif; ?>
  <table cellspacing="4" cellpadding="0" border="0">
    <tr>
      <td colspan="3">
        <span>Fecha de entrada:</span>
      </td>
      <td colspan="3">
        <span>Fecha de salida:</span>
      </td>
    </tr>
    <tr>
      <td valign="top">
        <?php echo $form_dis['fecha-inicio']->render(array('onchange' => "checkDateOrder('formularioHotel', 'dispo_fecha-inicio_day', 'dispo_fecha-inicio_month', 'dispo_fecha-final_day', 'dispo_fecha-final_month');"))?>
      </td>
      <td style="padding-left: 2px;">
        <a id="b_checkinCalPos2" class="b_requiresJsInline" href="javascript:showCalendar('b_checkinCalPos2',%20'b_calendarPopup',%20'dispo_fecha-inicio',%20'formularioHotel');" title="Fecha de llegada" rel="nofollow">
          <img src="<?php echo sfConfig::get('app_s_img') ?>calendar.png" alt="Fecha de llegada" />
        </a>  
        
      </td>
      <td>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; </td>
      <td valign="top">
        <?php echo $form_dis['fecha-final']->render() ?>
      </td>
      <td style="padding-left: 2px;">
        <a id="b_checkoutCalPos2" class="" href="javascript:showCalendar('b_checkoutCalPos2',%20'b_calendarPopup',%20'dispo_fecha-final',%20'formularioHotel');" title="Fecha de salida" rel="nofollow">
          <img src="<?php echo sfConfig::get('app_s_img') ?>calendar.png" alt="Fecha de salida">
        </a>
      </td>
      <td>
        &nbsp; &nbsp; <button type="submit" title="Buscar">Buscar</button>
      </td>
    </tr>

  </table>

</form>
