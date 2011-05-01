var controller=1;//variable que controlará si nos pinchan en alguna foto 
var controller_ant=1;
var x;
x=$(document);
x.ready(inicializar);

function inicializar(){
	//galeria
    $(".imagenes").css('display','none');
    $("#1").css('display','block');
	$("#marcador1").addClass('current');
	
	var x=1;
	var y=1;
	var kk=6000;
	var num_fotos=totalFotos();
	if(num_fotos>1){
		while(x<100){
			tiempo=kk*x;
			y=y+1
			var t=setTimeout("transicionImagen("+controller+")",tiempo);
			if(y==num_fotos) y=0;
			x=x+1;
		}
	}
	$(".marcadores").click(irImagen);
	
	//solicitar sala
	$("#submitReservaSala").click(comprobarEnviarSala);
	
	//solicitar apartamento
	$("#submitReservaApartamento").click(comprobarEnviarApartamento);
	
	//contacto
	$("#submitContacto").click(comprobarContacto);

	//Regala
	$("#submitRegala").click(comprobarRegala);
	$("#regala_1").change(muestra_ocultaFechasRegala1);
	$("#regala_2").change(muestra_ocultaFechasRegala2);
						  
	
	//reserva
	$("#boton_provisional").click(mensajePrimeroEntrada);
	var botonReservas=$("#submitReservas");
	botonReservas.click(actualizaFechas);
	
	//reserva con HJ
	var botonReservasHJ=$("#submitReservasHJ");
	botonReservasHJ.click(compruebaReserva1);
	

	//links reciprocos
	var botonReciproco=$("#submitReciproco");
	botonReciproco.click(enviarReciproco);
	
	$('#menu ul li').mouseover(muestraSubmenus);
	$('#contenedor').click(ocultaSubmenus);
	
	function muestraSubmenus(){
		$('#menu ul li ul').hide();
		$('#menu ul li div').hide();
		$(this).children('div').show();
		$(this).find('ul').show();
	}
	
	function ocultaSubmenus(){
		$('#menu ul li ul').hide();
		$('#menu ul li div').hide();
	}
}

//reservas//
function actualizaFechaSalida(){
	cambioFecha=$("#cambioFecha").attr('value');
	if(cambioFecha==0){ //solo actualizamos la fecha de Salida si es la primera vez que cambiamos la fecha de entrada
		$val_llegada=$("#date1").attr("value");
		$fecha_dia_sig=sumaDia($val_llegada);
		$("#date2").attr("value",$fecha_dia_sig);
		$("#cambioFecha").attr("value",'1');
		$('.date-pick2').datePicker({startDate:'01/01/1996'});
		$("#boton_provisional").hide();
	}
}

function sumaDia(sFec0){
	var aFinMes = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
	var nDia = parseInt(sFec0.substr(0, 2), 10);
	var nMes = parseInt(sFec0.substr(3, 2), 10);
	var nAno = parseInt(sFec0.substr(6, 4), 10);
	nDia += 1;
	diasMes=aFinMes[nMes-1];
	if (nDia > diasMes){
		nDia = 1;
		nMes += 1;
		if (nMes == 13){
			nMes = 1;
			nAno += 1;
		}
	}
	if (nDia<10) nDia='0'+nDia;
	nDia=nDia.toString();
	if (nMes<10) nMes='0'+nMes;
	nMes=nMes.toString();
	nAno=nAno.toString();
	var fecha=nDia+'/'+nMes+'/'+nAno;
	return fecha;
} 

function actualizaFechas(){
	var fecha1=$("#date1").attr('value');
	var fecha2=$("#date2").attr('value');
	fecha1_dia=fecha1.substring(0,2);
	fecha1_mes=fecha1.substring(3,5);
	fecha1_ano=fecha1.substring(8,10);
	fecha1=fecha1_dia+'/'+fecha1_mes+'/'+fecha1_ano;
	fecha2_dia=fecha2.substring(0,2);
	fecha2_mes=fecha2.substring(3,5);
	fecha2_ano=fecha2.substring(8,10);
	fecha2=fecha2_dia+'/'+fecha2_mes+'/'+fecha2_ano;
	$("#date1").attr('value',fecha1);
	$("#date2").attr('value',fecha2);
	document.forms[0].submit();
}

function mensajePrimeroEntrada(){
	alert("Debe introducir primero una fecha de entrada");
	return false;
}
///////////////

//galeria//
function transicionImagen(num){
	var num_fotos=totalFotos();
	controller=controller+1;
	num=controller;
	if(controller==num_fotos)
		controller=0;
	var i=1;	
	num_fotos=num_fotos+1;
	while(i<num_fotos){
		$("#"+i).hide();
		i=i+1;
	}
	//var src=$("#"+num).children('img').attr('src');				//ponemos el fondo del div con la imagen, 
	//$("#mygalone").css('background-image','url(../'+src+')');	//para q el cambio sea menos brusco
	$("#"+num).fadeTo(1000, 1);
	
	//cambio de marcador
	$(".marcadores").removeClass('current');
	$("#marcador"+num).addClass('current');
}

function irImagen(){
	var id_marcador=$(this).attr('id');
	$(".marcadores").removeClass('current');
	$("#"+id_marcador).addClass('current');
	var longitud=id_marcador.length;
	var id_foto=id_marcador.substring(8,longitud) ;
	controller=parseFloat(id_foto)-1;
	transicionImagen(id_foto);
	return false;
}

function totalFotos(){
	var x=1;
	var fin=0;
	while(fin==0){
		clase=$("#"+x).attr('class');
		if(clase=='imagenes'){
			x=x+1;
		}else{
			fin=1;
		}
	}
	var total=x-1;
	return total;
}
///////////

//Comprobacion Formularios//
function comprobarEnviarSala(){
	var error=0;
	
	var Jnombre=$("#Jnombre");
	var er_cp = /(^)$/	//que no sea cadena vacía
	if(er_cp.test(Jnombre.attr('value'))) { 
		error=1;
		Jnombre.addClass('error_campo');
	}else{
		Jnombre.removeClass('error_campo');
	}

	var Japellidos=$("#Japellidos");
	var er_cp = /(^)$/	//que no sea cadena vacía
	if(er_cp.test(Japellidos.attr('value'))) { 
		error=1;
		Japellidos.addClass('error_campo');
	}else{
		Japellidos.removeClass('error_campo');
	}

	var Jemail=$("#Jemail");
	var er_cp=/(^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+))+$/
	if(!er_cp.test(Jemail.attr('value'))) { 
		error=1;
		Jemail.addClass('error_campo');
	}else{
		Jemail.removeClass('error_campo');
	}

	var Jnumero_asistentes=$("#Jnumero_asistentes");
	var er_cp = /(^)$/	//que no sea cadena vacía
	if(er_cp.test(Jnumero_asistentes.attr('value'))) { 
		error=1;
		Jnumero_asistentes.addClass('error_campo');
	}else{
		Jnumero_asistentes.removeClass('error_campo');
	}

	if(error==0)
		document.forms['form_solicitar_sala'].submit();
	else
		alert("Hay campos obligatorios incompletos");
}

function comprobarEnviarApartamento(){
	var error=0;
	
	var Jnombre=$("#Jnombre");
	var er_cp = /(^)$/	//que no sea cadena vacía
	if(er_cp.test(Jnombre.attr('value'))) { 
		error=1;
		Jnombre.addClass('error_campo');
	}else{
		Jnombre.removeClass('error_campo');
	}

	var Japellidos=$("#Japellidos");
	var er_cp = /(^)$/	//que no sea cadena vacía
	if(er_cp.test(Japellidos.attr('value'))) { 
		error=1;
		Japellidos.addClass('error_campo');
	}else{
		Japellidos.removeClass('error_campo');
	}

	var Jemail=$("#Jemail");
	var er_cp=/(^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+))+$/
	if(!er_cp.test(Jemail.attr('value'))) { 
		error=1;
		Jemail.addClass('error_campo');
	}else{
		Jemail.removeClass('error_campo');
	}
	
	var Jtelefono=$("#Jtelefono");
	var er_cp = /(^([0-9]{9,15}))$/		//9-15 numeros
	if(!er_cp.test(Jtelefono.attr('value'))) { 
		error=1;
		Jtelefono.addClass('error_campo');
	}else{
		Jtelefono.removeClass('error_campo');
	}

	var Jnumero_asistentes=$("#Jnumero_asistentes");
	var er_cp = /(^)$/	//que no sea cadena vacía
	if(er_cp.test(Jnumero_asistentes.attr('value'))) { 
		error=1;
		Jnumero_asistentes.addClass('error_campo');
	}else{
		Jnumero_asistentes.removeClass('error_campo');
	}

	if(error==0)
		document.forms['form_solicitar_sala'].submit();
	else
		alert("Hay campos obligatorios incompletos");
}

function comprobarContacto(){
	var error=0;
	
	var Jnombre=$("#Jnombre");
	var er_cp = /(^)$/	//que no sea cadena vacía
	if(er_cp.test(Jnombre.attr('value'))) { 
		error=1;
		Jnombre.addClass('error_campo');
	}else{
		Jnombre.removeClass('error_campo');
	}

	var Japellidos=$("#Japellidos");
	var er_cp = /(^)$/	//que no sea cadena vacía
	if(er_cp.test(Japellidos.attr('value'))) { 
		error=1;
		Japellidos.addClass('error_campo');
	}else{
		Japellidos.removeClass('error_campo');
	}

	var Jdireccion=$("#Jdireccion");
	var er_cp = /(^)$/	//que no sea cadena vacía
	if(er_cp.test(Jdireccion.attr('value'))) { 
		error=1;
		Jdireccion.addClass('error_campo');
	}else{
		Jdireccion.removeClass('error_campo');
	}

	var Jpais=$("#Jpais");
	var er_cp = /(^)$/	//que no sea cadena vacía
	if(er_cp.test(Jpais.attr('value'))) { 
		error=1;
		Jpais.addClass('error_campo');
	}else{
		Jpais.removeClass('error_campo');
	}

	var Jcp=$("#Jcp");
	var er_cp = /(^)$/	//que no sea cadena vacía
	if(er_cp.test(Jcp.attr('value'))) { 
		error=1;
		Jcp.addClass('error_campo');
	}else{
		Jcp.removeClass('error_campo');
	}

	var Jciudad=$("#Jciudad");
	var er_cp = /(^)$/	//que no sea cadena vacía
	if(er_cp.test(Jciudad.attr('value'))) { 
		error=1;
		Jciudad.addClass('error_campo');
	}else{
		Jciudad.removeClass('error_campo');
	}

	var Jemail=$("#Jemail");
	var er_cp=/(^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+))+$/
	if(!er_cp.test(Jemail.attr('value'))) { 
		error=1;
		Jemail.addClass('error_campo');
	}else{
		Jemail.removeClass('error_campo');
	}

	var Jtelefono=$("#Jtelefono");
	var er_cp = /(^([0-9]{9,15}))$/		//9-15 numeros
	if(!er_cp.test(Jtelefono.attr('value'))) { 
		error=1;
		Jtelefono.addClass('error_campo');
	}else{
		Jtelefono.removeClass('error_campo');
	}

	var Jcomentarios=$("#Jcomentarios");
	var er_cp = /(^)$/	//que no sea cadena vacía
	if(er_cp.test(Jcomentarios.attr('value'))) { 
		error=1;
		Jcomentarios.addClass('error_campo');
	}else{
		Jcomentarios.removeClass('error_campo');
	}

	if(error==0)
		document.forms['form_contacto'].submit();
	else
		alert("Hay campos obligatorios incompletos");
}

function enviarReciproco(){
	var J_url_amiga=$("#Jurl_amiga").attr('value');
	primeros_caracteres=J_url_amiga.substring(0,7);
	if(primeros_caracteres=="http://" || primeros_caracteres=="https://"){
		document.forms['reciproco'].submit();
	}else{
		$("#Jurl_amiga").css('border','1px solid #900000');
		alert("Tu sitio web debe de empezar con http://");
	}
}
////////////////

//motor juicebooker//
function compruebaReserva1(){
	/***************************/
	var data=$("#date1").attr('value');
	var data_=$("#date2").attr('value');
	
	if(data=='' || data_==''){
		alert("Debes introducir una fecha");
	}else{
		fecha_intro_dia=data.substring(0,2) ;
		fecha_intro_mes=data.substring(3,5) ;
		fecha_intro_ano=data.substring(6,10) ;
		fecha_intro=fecha_intro_ano+fecha_intro_mes+fecha_intro_dia;
		fecha_envio=fecha_intro_ano+fecha_intro_mes+fecha_intro_dia;//fecha que pide el motor
		var fecha=new Date();
		var ano=fecha.getFullYear();
		var mes=fecha.getMonth() +1 ;
		if (mes<10) mes='0'+mes;
		var dia=fecha.getDate();
		if(dia<10) dia='0'+dia;
		fecha_actual=''+ano+mes+dia;
		if(fecha_intro<fecha_actual){
			alert("La fecha de llegada introducida corresponde al pasado");
		}else{
			fecha_intro_dia=data_.substring(0,2) ;
			fecha_intro_mes=data_.substring(3,5) ;
			fecha_intro_ano=data_.substring(6,10) ;
			fecha_intro_=fecha_intro_ano+fecha_intro_mes+fecha_intro_dia;
			fecha_envio_=fecha_intro_ano+fecha_intro_mes+fecha_intro_dia;//fecha que pide el motor
			if(fecha_intro_<=fecha_intro){
				alert("La fecha de salida introducida debe ser posterior a la de entrada");
			}else{
				//var nom_hotel=$("#nombre_hotel").attr("value");
				var num_adultos=$("#num_adultos").attr("value");	
				var idioma_oculto=$("#idiomaOculto").attr("value");
				
				var pagina_reservas="https://reservations.juicebooker.com/Client/index.php?customerId=5&inidate="+fecha_envio+"&enddate="+fecha_envio_+"&pax="+num_adultos+"&lang="+idioma_oculto;
				
				pageTracker._link(pagina_reservas);
			}
		}
	}
	return true;
}

//Regala
function comprobarRegala(){
	var error=0;
	
	var Jnombre=$("#JnombreRegala");
	var er_cp = /(^)$/	//que no sea cadena vacía
	if(er_cp.test(Jnombre.attr('value'))) { 
		error=1;
		Jnombre.addClass('error_campo');
	}else{
		Jnombre.removeClass('error_campo');
	}

	var Japellidos=$("#JapellidosRegala");
	var er_cp = /(^)$/	//que no sea cadena vacía
	if(er_cp.test(Japellidos.attr('value'))) { 
		error=1;
		Japellidos.addClass('error_campo');
	}else{
		Japellidos.removeClass('error_campo');
	}

	var Jdireccion=$("#JdireccionRegala");
	var er_cp = /(^)$/	//que no sea cadena vacía
	if(er_cp.test(Jdireccion.attr('value'))) { 
		error=1;
		Jdireccion.addClass('error_campo');
	}else{
		Jdireccion.removeClass('error_campo');
	}

	var Jpais=$("#JpaisRegala");
	var er_cp = /(^)$/	//que no sea cadena vacía
	if(er_cp.test(Jpais.attr('value'))) { 
		error=1;
		Jpais.addClass('error_campo');
	}else{
		Jpais.removeClass('error_campo');
	}

	var Jcp=$("#JcpRegala");
	var er_cp = /(^)$/	//que no sea cadena vacía
	if(er_cp.test(Jcp.attr('value'))) { 
		error=1;
		Jcp.addClass('error_campo');
	}else{
		Jcp.removeClass('error_campo');
	}

	var Jciudad=$("#JciudadRegala");
	var er_cp = /(^)$/	//que no sea cadena vacía
	if(er_cp.test(Jciudad.attr('value'))) { 
		error=1;
		Jciudad.addClass('error_campo');
	}else{
		Jciudad.removeClass('error_campo');
	}

	var Jemail=$("#JemailRegala");
	var er_cp=/(^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+))+$/
	if(!er_cp.test(Jemail.attr('value'))) { 
		error=1;
		Jemail.addClass('error_campo');
	}else{
		Jemail.removeClass('error_campo');
	}

	var Jtelefono=$("#JtelefonoRegala");
	var er_cp = /(^([0-9]{9,15}))$/		//9-15 numeros
	if(!er_cp.test(Jtelefono.attr('value'))) { 
		error=1;
		Jtelefono.addClass('error_campo');
	}else{
		Jtelefono.removeClass('error_campo');
	}

	if(error==0)
		document.forms['form_regala'].submit();
	else
		alert("Hay campos obligatorios incompletos");
}

function muestra_ocultaFechasRegala1(){
	if($(this).is(':checked')){
		$("#caja_regala_dos_dias").fadeIn();
	}else{
		$("#caja_regala_dos_dias").fadeOut();
	}
}

function muestra_ocultaFechasRegala2(){
	if($(this).is(':checked')){
		$("#caja_regala_fin_semana").fadeIn();
	}else{
		$("#caja_regala_fin_semana").fadeOut();
	}
}