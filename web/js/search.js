$(function(){
  var hostname = 'http://localhost/reservas/web/frontend_dev.php/'

  $('#star_all').click(function(){
    $('#star_1').removeAttr('checked');
    $('#star_2').removeAttr('checked');
    $('#star_3').removeAttr('checked');
    $('#star_4').removeAttr('checked');
    $('#star_5').removeAttr('checked');    
    if($(this).attr('checked') == true){
      window.location = hostname+'home/allstar?chk='+$(this).val();
    }else{        
      window.location = hostname+'home/allstar';
    }
  });
  $('#star_1').click(function(){
    var name = $(this).attr('name');
      $('#star_all').removeAttr('checked');
      if($(this).attr('checked') == true){
        
        window.location = hostname+'home/onestar?chk='+$(this).val()+'&cls='+name;
        
      }else{
       
        window.location = hostname+'home/onestar?cls='+name;

      }
  });
  $('#star_2').click(function(){
    var name = $(this).attr('name');
      $('#star_all').removeAttr('checked');
      if($(this).attr('checked') == true){
        window.location = hostname+'home/onestar?chk='+$(this).val()+'&cls='+name;
      }else{        
        window.location = hostname+'home/onestar?cls='+name;
      }
  });
  $('#star_3').click(function(){
    var name = $(this).attr('name');
      $('#star_all').removeAttr('checked');
      if($(this).attr('checked') == true){
        window.location = hostname+'home/onestar?chk='+$(this).val()+'&cls='+name;
      }else{        
        window.location = hostname+'home/onestar?cls='+name;
      }
  });
  $('#star_4').click(function(){
    var name = $(this).attr('name');
      $('#star_all').removeAttr('checked');
      if($(this).attr('checked') == true){
        window.location = hostname+'home/onestar?chk='+$(this).val()+'&cls='+name;
      }else{        
        window.location = hostname+'home/onestar?cls='+name;
      }
  });
  $('#star_5').click(function(){
    var name = $(this).attr('name');
      $('#star_all').removeAttr('checked');
      if($(this).attr('checked') == true){
        window.location = hostname+'home/onestar?chk='+$(this).val()+'&cls='+name;
      }else{        
        window.location = hostname+'home/onestar?cls='+name;
      }
  });
  
  
  $('#facil_all').click(function(){
    $('#facil_1').removeAttr('checked');
    $('#facil_2').removeAttr('checked');
    $('#facil_3').removeAttr('checked');
    $('#facil_4').removeAttr('checked');
    $('#facil_5').removeAttr('checked');    
    $('#facil_6').removeAttr('checked');    
    $('#facil_7').removeAttr('checked');    
    $('#facil_8').removeAttr('checked');    
            
    window.location = hostname+'home/allfacil';
  
  });
  $('#facil_1').click(function(){
      var name = $(this).attr('name');
      $('#facil_all').removeAttr('checked');
      if($(this).attr('checked') == true){
        window.location = hostname+'home/facil?chk='+$(this).val()+'&cls='+name;
      }else{        
        window.location = hostname+'home/facil?cls='+name;
      }
  });
  $('#facil_2').click(function(){
      var name = $(this).attr('name');
      $('#facil_all').removeAttr('checked');
      if($(this).attr('checked') == true){
        window.location = hostname+'home/facil?chk='+$(this).val()+'&cls='+name;
      }else{        
        window.location = hostname+'home/facil?cls='+name;
      }
  });
  $('#facil_3').click(function(){
      var name = $(this).attr('name');
      $('#facil_all').removeAttr('checked');
      if($(this).attr('checked') == true){
        window.location = hostname+'home/facil?chk='+$(this).val()+'&cls='+name;
      }else{        
        window.location = hostname+'home/facil?cls='+name;
      }
  });
  $('#facil_4').click(function(){
      var name = $(this).attr('name');
      $('#facil_all').removeAttr('checked');
      if($(this).attr('checked') == true){
        window.location = hostname+'home/facil?chk='+$(this).val()+'&cls='+name;
      }else{        
        window.location = hostname+'home/facil?cls='+name;
      }
  });
  $('#facil_5').click(function(){
      var name = $(this).attr('name');
      $('#facil_all').removeAttr('checked');
      if($(this).attr('checked') == true){
        window.location = hostname+'home/facil?chk='+$(this).val()+'&cls='+name;
      }else{        
        window.location = hostname+'home/facil?cls='+name;
      }
  });
  $('#facil_6').click(function(){
      var name = $(this).attr('name');
      $('#facil_all').removeAttr('checked');
      if($(this).attr('checked') == true){
        window.location = hostname+'home/facil?chk='+$(this).val()+'&cls='+name;
      }else{        
        window.location = hostname+'home/facil?cls='+name;
      }
  });
  $('#facil_7').click(function(){
      var name = $(this).attr('name');
      $('#facil_all').removeAttr('checked');
      if($(this).attr('checked') == true){
        window.location = hostname+'home/facil?chk='+$(this).val()+'&cls='+name;
      }else{        
        window.location = hostname+'home/facil?cls='+name;
      }
  });
  $('#facil_8').click(function(){
      var name = $(this).attr('name');
      $('#facil_all').removeAttr('checked');
      if($(this).attr('checked') == true){
        window.location = hostname+'home/facil?chk='+$(this).val()+'&cls='+name;
      }else{        
        window.location = hostname+'home/facil?cls='+name;
      }
  });
    
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



});
