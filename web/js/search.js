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
    




});
