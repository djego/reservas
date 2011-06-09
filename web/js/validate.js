$(function(){
  

  $('#formulario').submit(function() {
  
    var mon_yearx = $('#search_fecha-inicio_month').val();
    var mon_yeary = $('#search_fecha-final_month').val();
    
    
    var yMes=mon_yearx.substring(5, 7);
    var yDia=$('#search_fecha-inicio_day').val();
    var yAnio=mon_yearx.substring(0,4);
    var xMes=mon_yeary.substring(5, 7);
    var xDia=$('#search_fecha-final_day').val();
    var xAnio=mon_yeary.substring(0,4);
    
    if (xAnio > yAnio){
      return true;
    }else{
      if (xAnio == yAnio){
        if (xMes > yMes){
          return true ;
        }
        if (xMes == yMes){
          if (xDia > yDia){
            return true;
          }else{
            $( "#dialog:ui-dialog" ).dialog( "destroy" );
	
            $( "#dialog-modal" ).dialog({
              height: 140,
              modal: true
            });
            
            return false;
          }
        }else{
          $( "#dialog:ui-dialog" ).dialog( "destroy" );
	
          $( "#dialog-modal" ).dialog({
            height: 140,
            modal: true
          });
          return false;
        }
      }else{
        $( "#dialog:ui-dialog" ).dialog( "destroy" );
	
        $( "#dialog-modal" ).dialog({
          height: 140,
          modal: true
        });
        return false;
      }
    }
    
   
  });
  
  $('#formularioHotel').submit(function() {
  
    var mon_yearx = $('#dispo_fecha-inicio_month').val();
    var mon_yeary = $('#dispo_fecha-final_month').val();
    
    
    var yMes=mon_yearx.substring(5, 7);
    var yDia=$('#dispo_fecha-inicio_day').val();
    var yAnio=mon_yearx.substring(0,4);
    var xMes=mon_yeary.substring(5, 7);
    var xDia=$('#dispo_fecha-final_day').val();
    var xAnio=mon_yeary.substring(0,4);
    
    if (xAnio > yAnio){
      return true;
    }else{
      if (xAnio == yAnio){
        if (xMes > yMes){
          return true ;
        }
        if (xMes == yMes){
          if (xDia > yDia){
            return true;
          }else{
            $( "#dialog:ui-dialog" ).dialog( "destroy" );
	
            $( "#dialog-modal" ).dialog({
              height: 140,
              modal: true
            });
            
            return false;
          }
        }else{
          $( "#dialog:ui-dialog" ).dialog( "destroy" );
	
          $( "#dialog-modal" ).dialog({
            height: 140,
            modal: true
          });
          return false;
        }
      }else{
        $( "#dialog:ui-dialog" ).dialog( "destroy" );
	
        $( "#dialog-modal" ).dialog({
          height: 140,
          modal: true
        });
        return false;
      }
    }
    
   
  });




});
