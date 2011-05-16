$(function(){
  var aFinMes = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

  function finMes(nMes, nAno){
   return aFinMes[nMes - 1] + (((nMes == 2) && (nAno % 4) == 0)? 1: 0);
  }

   function padNmb(nStr, nLen, sChr){
    var sRes = String(nStr);
    for (var i = 0; i < nLen - String(nStr).length; i++)
     sRes = sChr + sRes;
    return sRes;
   }

   function makeDateFormat(nDay, nMonth, nYear){
    var sRes;
    sRes = padNmb(nDay, 2, "0") + "/" + padNmb(nMonth, 2, "0") + "/" + padNmb(nYear, 4, "0");
    return sRes;
   }

  function incDate(sFec0){
   var nDia = parseInt(sFec0.substr(0, 2), 10);
   var nMes = parseInt(sFec0.substr(3, 2), 10);
   var nAno = parseInt(sFec0.substr(6, 4), 10);
   nDia += 1;
   if (nDia > finMes(nMes, nAno)){
    nDia = 1;
    nMes += 1;
    if (nMes == 13){
     nMes = 1;
     nAno += 1;
    }
   }
   return makeDateFormat(nDia, nMes, nAno);
  }

  function decDate(sFec0){
   var nDia = Number(sFec0.substr(0, 2));
   var nMes = Number(sFec0.substr(3, 2));
   var nAno = Number(sFec0.substr(6, 4));
   nDia -= 1;
   if (nDia == 0){
    nMes -= 1;
    if (nMes == 0){
     nMes = 12;
     nAno -= 1;
    }
    nDia = finMes(nMes, nAno);
   }
   return makeDateFormat(nDia, nMes, nAno);
  }

  function addToDate(sFec0, sInc){
   var nInc = Math.abs(parseInt(sInc));
   var sRes = sFec0;
   if (parseInt(sInc) >= 0)
    for (var i = 0; i < nInc; i++) sRes = incDate(sRes);
   else
    for (var i = 0; i < nInc; i++) sRes = decDate(sRes);
   return sRes;
  }

  function recalcF1(){
   with (document.formulario){
    fecha1.value = addToDate(fecha0.value, increm.value);
   }
  }
    $("#search_new_fecha_entrada").datepicker({
        dateFormat: 'dd/mm/yy',
        minDate: 0,
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                firstDay: 1,
                onSelect: function(dateText, inst) {
                   var tomorow = addToDate(dateText, '1');
                  $("#search_new_fecha_salida").val(tomorow)
                }
    });

    $("#search_new_fecha_salida").datepicker({
        dateFormat: 'dd/mm/yy',


        minDate: 0,
        defaultDate: +1,
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                firstDay: 1
    });   


});
