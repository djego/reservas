$(function(){

    $("#id_fecha_entrada").datepicker({
        dateFormat: 'dd/mm/yyyy',
        minDate: 0,
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa']
    });
    $("#id_fecha_salida").datepicker({
        dateFormat: 'dd/mm/yyyy',
		
        minDate: 0,
        defaultDate: +1,
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa']
    });   

});
