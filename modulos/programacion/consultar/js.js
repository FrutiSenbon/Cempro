// JavaScript Document
var orden, campoOrden, cantidadamostrar, paginacion;
orden="DESC";
campoOrden="idProgramacion";
iniciar="0";
cantidadamostrar="20";
paginacion=0;
function seleccionarTodo(){
	if ($("#seleccionarTodo").prop("checked")==true){
		$(".checkEliminar").prop("checked", "checked");
	}else{
		$(".checkEliminar").prop("checked", "");
	}   
}
function eliminarIndividual(id) {
	var encoded = "¿Desea borrar el registro?";
	var decoded = $("<div/>").html(encoded).text();
    var pregunta = confirm(decoded);
	if (pregunta){
		eliminar_individual(id);
	}
}
function restaurarIndividual(id) {
	var encoded = "¿Desea restaurar el registro?";
	var decoded = $("<div/>").html(encoded).text();
    var pregunta = confirm(decoded);
	if (pregunta){
		restaurar_individual(id);
	}
}
function comprobarReglas(){
	$(".checksEliminar").hide();
	//Identificar el campo de ordenamiento
	if(recuperarCookie("campoOrdenProgramacion")!=null){
		campoOrden=recuperarCookie("campoOrdenProgramacion");
		 $("#campoOrden option[value="+campoOrden+"]").attr("selected",true);
	}else{
		campoOrden="idProgramacion";
		$("#campoOrden option[value="+campoOrden+"]").attr("selected",true);
	}
	
	//Identificar el numero de elementos para mostrar
	if(recuperarCookie("cantidadamostrarProgramacion")!=null){
		cantidadamostrar=recuperarCookie("cantidadamostrarProgramacion");
		 $("#cantidadamostrar option[value="+cantidadamostrar+"]").attr("selected",true);
	}else{
		cantidadamostrar="20";
		$("#cantidadamostrar option[value="+cantidadamostrar+"]").attr("selected",true);
		
	}
	
	//Identificar el tipo de orden
	if(recuperarCookie("ordenProgramacion")=="asc"){
		orden="ASC"
		$('#asc').attr('checked', true);
		$('#desc').attr('checked', false);
	}else if(recuperarCookie("ordenProgramacion")=="desc"){
		orden="DESC"
		$('#asc').attr('checked', false);
		$('#desc').attr('checked', true);
	}else{
		orden="DESC"
		$('#asc').attr('checked', false);
		$('#desc').attr('checked', true);
	}
	//Mostrar u Ocultar IdProgramacion
	if(recuperarCookie("mostrarIdProgramacionProgramacion")=="si"){
		$('.CidProgramacion').show();
		$('#CheckIdProgramacion').attr('checked', true);
	}else if(recuperarCookie("mostrarIdProgramacionProgramacion")=="no"){
		$('.CidProgramacion').hide();
		$('#CheckIdProgramacion').attr('checked', false);
	}
	//Mostrar u Ocultar Vendedor
	if(recuperarCookie("mostrarVendedorProgramacion")=="si"){
		$('.Cvendedor').show();
		$('#CheckVendedor').attr('checked', true);
	}else if(recuperarCookie("mostrarVendedorProgramacion")=="no"){
		$('.Cvendedor').hide();
		$('#CheckVendedor').attr('checked', false);
	}
	//Mostrar u Ocultar Cliente
	if(recuperarCookie("mostrarClienteProgramacion")=="si"){
		$('.Ccliente').show();
		$('#CheckCliente').attr('checked', true);
	}else if(recuperarCookie("mostrarClienteProgramacion")=="no"){
		$('.Ccliente').hide();
		$('#CheckCliente').attr('checked', false);
	}
	//Mostrar u Ocultar TelCliente
	if(recuperarCookie("mostrarTelClienteProgramacion")=="si"){
		$('.CtelCliente').show();
		$('#CheckTelCliente').attr('checked', true);
	}else if(recuperarCookie("mostrarTelClienteProgramacion")=="no"){
		$('.CtelCliente').hide();
		$('#CheckTelCliente').attr('checked', false);
	}
	//Mostrar u Ocultar CorreoCliente
	if(recuperarCookie("mostrarCorreoClienteProgramacion")=="si"){
		$('.CcorreoCliente').show();
		$('#CheckCorreoCliente').attr('checked', true);
	}else if(recuperarCookie("mostrarCorreoClienteProgramacion")=="no"){
		$('.CcorreoCliente').hide();
		$('#CheckCorreoCliente').attr('checked', false);
	}
	//Mostrar u Ocultar TipoVialidad
	if(recuperarCookie("mostrarTipoVialidadProgramacion")=="si"){
		$('.CtipoVialidad').show();
		$('#CheckTipoVialidad').attr('checked', true);
	}else if(recuperarCookie("mostrarTipoVialidadProgramacion")=="no"){
		$('.CtipoVialidad').hide();
		$('#CheckTipoVialidad').attr('checked', false);
	}
	//Mostrar u Ocultar Calle
	if(recuperarCookie("mostrarCalleProgramacion")=="si"){
		$('.Ccalle').show();
		$('#CheckCalle').attr('checked', true);
	}else if(recuperarCookie("mostrarCalleProgramacion")=="no"){
		$('.Ccalle').hide();
		$('#CheckCalle').attr('checked', false);
	}
	//Mostrar u Ocultar Numero
	if(recuperarCookie("mostrarNumeroProgramacion")=="si"){
		$('.Cnumero').show();
		$('#CheckNumero').attr('checked', true);
	}else if(recuperarCookie("mostrarNumeroProgramacion")=="no"){
		$('.Cnumero').hide();
		$('#CheckNumero').attr('checked', false);
	}
	//Mostrar u Ocultar Colonia
	if(recuperarCookie("mostrarColoniaProgramacion")=="si"){
		$('.Ccolonia').show();
		$('#CheckColonia').attr('checked', true);
	}else if(recuperarCookie("mostrarColoniaProgramacion")=="no"){
		$('.Ccolonia').hide();
		$('#CheckColonia').attr('checked', false);
	}
	//Mostrar u Ocultar Resistencia
	if(recuperarCookie("mostrarResistenciaProgramacion")=="si"){
		$('.Cresistencia').show();
		$('#CheckResistencia').attr('checked', true);
	}else if(recuperarCookie("mostrarResistenciaProgramacion")=="no"){
		$('.Cresistencia').hide();
		$('#CheckResistencia').attr('checked', false);
	}
	//Mostrar u Ocultar Aditivo
	if(recuperarCookie("mostrarAditivoProgramacion")=="si"){
		$('.Caditivo').show();
		$('#CheckAditivo').attr('checked', true);
	}else if(recuperarCookie("mostrarAditivoProgramacion")=="no"){
		$('.Caditivo').hide();
		$('#CheckAditivo').attr('checked', false);
	}
	//Mostrar u Ocultar ValorAditivo
	if(recuperarCookie("mostrarValorAditivoProgramacion")=="si"){
		$('.CvalorAditivo').show();
		$('#CheckValorAditivo').attr('checked', true);
	}else if(recuperarCookie("mostrarValorAditivoProgramacion")=="no"){
		$('.CvalorAditivo').hide();
		$('#CheckValorAditivo').attr('checked', false);
	}
	//Mostrar u Ocultar MCubTotales
	if(recuperarCookie("mostrarMCubTotalesProgramacion")=="si"){
		$('.CmCubTotales').show();
		$('#CheckMCubTotales').attr('checked', true);
	}else if(recuperarCookie("mostrarMCubTotalesProgramacion")=="no"){
		$('.CmCubTotales').hide();
		$('#CheckMCubTotales').attr('checked', false);
	}
	//Mostrar u Ocultar Revenimiento
	if(recuperarCookie("mostrarRevenimientoProgramacion")=="si"){
		$('.Crevenimiento').show();
		$('#CheckRevenimiento').attr('checked', true);
	}else if(recuperarCookie("mostrarRevenimientoProgramacion")=="no"){
		$('.Crevenimiento').hide();
		$('#CheckRevenimiento').attr('checked', false);
	}
	//Mostrar u Ocultar Vertimiento
	if(recuperarCookie("mostrarVertimientoProgramacion")=="si"){
		$('.Cvertimiento').show();
		$('#CheckVertimiento').attr('checked', true);
	}else if(recuperarCookie("mostrarVertimientoProgramacion")=="no"){
		$('.Cvertimiento').hide();
		$('#CheckVertimiento').attr('checked', false);
	}
	//Mostrar u Ocultar Fecha
	if(recuperarCookie("mostrarFechaProgramacion")=="si"){
		$('.Cfecha').show();
		$('#CheckFecha').attr('checked', true);
	}else if(recuperarCookie("mostrarFechaProgramacion")=="no"){
		$('.Cfecha').hide();
		$('#CheckFecha').attr('checked', false);
	}
	//Mostrar u Ocultar Composicion
	if(recuperarCookie("mostrarComposicionProgramacion")=="si"){
		$('.Ccomposicion').show();
		$('#CheckComposicion').attr('checked', true);
	}
	if(recuperarCookie("mostrarComposicionProgramacion")=="no"){
		$('.Ccomposicion').hide();
		$('#CheckComposicion').attr('checked', false);
	}
	
	//Elegir el tipo de vista
	if(recuperarCookie("tipoVistaProgramacion")=="tabla"){
		$('.tipoLista').show();
		$('.tipoTabla').hide();
		tipoVista="tabla";
	}else{
		$('.tipoLista').hide();
		$('.tipoTabla').show();
		tipoVista="lista";
	}
	$( ".tipoTabla" ).click(function() {
    	crearCookie("tipoVistaProgramacion", "tabla");
		tipoVista="tabla";
		$(".tipoLista").show();
		$(".tipoTabla").hide();
		load_tablas(campoOrden,orden,cantidadamostrar,paginacion,"",tipoVista);
	});
	$( ".tipoLista" ).click(function() {
    	crearCookie("tipoVistaProgramacion", "lista");
		tipoVista="lista";
		$(".tipoLista").hide();
		$(".tipoTabla").show();
		load_tablas(campoOrden,orden,cantidadamostrar,paginacion,"",tipoVista);
	});

}

	
$(document).ready(function() {
	$("#cajaBuscar").focus();
	comprobarReglas();
	load_tablas(campoOrden,orden,cantidadamostrar,paginacion,busqueda,tipoVista);
	
	$(".botonEliminar").click(function() {
		$("#barraPaginacion").hide();
		$(".cajaBorrar").show();
		$(".herramientasIndividuales").hide();
		$(".checksEliminar").show();
	});
	
	$(".botonCancelarBorrar").click(function() {
		$(".herramientasIndividuales").show();
		$("#barraPaginacion").show();
		$(".cajaBorrar").hide();
		$(".checksEliminar").hide();
	});
	
	$(".botonBorrar").click(function() {
		var pregunta = confirm("¿Desea borrar esta información?")
		if (pregunta){
			$(".herramientasIndividuales").show("slow");
			$("#barraPaginacion").show("slow");
			$(".cajaBorrar").hide();
			$(".checksEliminar").hide("slow");
			var valores = [];
			var todos = document.getElementsByName("registroEliminar[]");
			for(var i = 0; i < todos.length; i++){
				if (todos[i].checked){
					valores.push(todos[i].value);
				}
			}
			eliminar_registros(valores);
		}else{
			$(".herramientasIndividuales").show("slow");
			$("#barraPaginacion").show("slow");
			$(".cajaBorrar").hide();
			$(".checksEliminar").hide("slow");
		}
	});
	
	$("#campoOrden").change(function(){
		campoOrden = this.value;
		crearCookie("campoOrdenProgramacion", campoOrden);
		load_tablas(campoOrden,orden,cantidadamostrar,paginacion,"",tipoVista);
	});
	$("#cantidadamostrar").change(function(){
		cantidadamostrar = this.value;
		crearCookie("cantidadamostrarProgramacion", cantidadamostrar);
		load_tablas(campoOrden,orden,cantidadamostrar,paginacion,"",tipoVista);
	});
	$( "#asc" ).click(function() {
    	if ($( "#asc" ).is(':checked')){
			crearCookie("ordenProgramacion", "asc");
			orden="ASC"
			load_tablas(campoOrden,orden,cantidadamostrar,paginacion,"",tipoVista);
		}
	});
	$( "#desc" ).click(function() {
    	if ($( "#desc" ).is(':checked')){
			crearCookie("ordenProgramacion", "desc");
			orden="DESC"
			load_tablas(campoOrden,orden,cantidadamostrar,paginacion,"",tipoVista);
		}
	});
	$( "#CheckIdProgramacion" ).click(function() {
    	if ($( "#CheckIdProgramacion" ).is(':checked')){
			crearCookie("mostrarIdProgramacionProgramacion", "si");
			$('.CidProgramacion').show();
		}else{
			crearCookie("mostrarIdProgramacionProgramacion", "no");
			$('.CidProgramacion').hide();
		}	
	});
	$( "#CheckVendedor" ).click(function() {
    	if ($( "#CheckVendedor" ).is(':checked')){
			crearCookie("mostrarVendedorProgramacion", "si");
			$('.Cvendedor').show();
		}else{
			crearCookie("mostrarVendedorProgramacion", "no");
			$('.Cvendedor').hide();
		}	
	});
	$( "#CheckCliente" ).click(function() {
    	if ($( "#CheckCliente" ).is(':checked')){
			crearCookie("mostrarClienteProgramacion", "si");
			$('.Ccliente').show();
		}else{
			crearCookie("mostrarClienteProgramacion", "no");
			$('.Ccliente').hide();
		}	
	});
	$( "#CheckTelCliente" ).click(function() {
    	if ($( "#CheckTelCliente" ).is(':checked')){
			crearCookie("mostrarTelClienteProgramacion", "si");
			$('.CtelCliente').show();
		}else{
			crearCookie("mostrarTelClienteProgramacion", "no");
			$('.CtelCliente').hide();
		}	
	});
	$( "#CheckCorreoCliente" ).click(function() {
    	if ($( "#CheckCorreoCliente" ).is(':checked')){
			crearCookie("mostrarCorreoClienteProgramacion", "si");
			$('.CcorreoCliente').show();
		}else{
			crearCookie("mostrarCorreoClienteProgramacion", "no");
			$('.CcorreoCliente').hide();
		}	
	});
	$( "#CheckTipoVialidad" ).click(function() {
    	if ($( "#CheckTipoVialidad" ).is(':checked')){
			crearCookie("mostrarTipoVialidadProgramacion", "si");
			$('.CtipoVialidad').show();
		}else{
			crearCookie("mostrarTipoVialidadProgramacion", "no");
			$('.CtipoVialidad').hide();
		}	
	});
	$( "#CheckCalle" ).click(function() {
    	if ($( "#CheckCalle" ).is(':checked')){
			crearCookie("mostrarCalleProgramacion", "si");
			$('.Ccalle').show();
		}else{
			crearCookie("mostrarCalleProgramacion", "no");
			$('.Ccalle').hide();
		}	
	});
	$( "#CheckNumero" ).click(function() {
    	if ($( "#CheckNumero" ).is(':checked')){
			crearCookie("mostrarNumeroProgramacion", "si");
			$('.Cnumero').show();
		}else{
			crearCookie("mostrarNumeroProgramacion", "no");
			$('.Cnumero').hide();
		}	
	});
	$( "#CheckColonia" ).click(function() {
    	if ($( "#CheckColonia" ).is(':checked')){
			crearCookie("mostrarColoniaProgramacion", "si");
			$('.Ccolonia').show();
		}else{
			crearCookie("mostrarColoniaProgramacion", "no");
			$('.Ccolonia').hide();
		}	
	});
	$( "#CheckResistencia" ).click(function() {
    	if ($( "#CheckResistencia" ).is(':checked')){
			crearCookie("mostrarResistenciaProgramacion", "si");
			$('.Cresistencia').show();
		}else{
			crearCookie("mostrarResistenciaProgramacion", "no");
			$('.Cresistencia').hide();
		}	
	});
	$( "#CheckAditivo" ).click(function() {
    	if ($( "#CheckAditivo" ).is(':checked')){
			crearCookie("mostrarAditivoProgramacion", "si");
			$('.Caditivo').show();
		}else{
			crearCookie("mostrarAditivoProgramacion", "no");
			$('.Caditivo').hide();
		}	
	});
	$( "#CheckValorAditivo" ).click(function() {
    	if ($( "#CheckValorAditivo" ).is(':checked')){
			crearCookie("mostrarValorAditivoProgramacion", "si");
			$('.CvalorAditivo').show();
		}else{
			crearCookie("mostrarValorAditivoProgramacion", "no");
			$('.CvalorAditivo').hide();
		}	
	});
	$( "#CheckMCubTotales" ).click(function() {
    	if ($( "#CheckMCubTotales" ).is(':checked')){
			crearCookie("mostrarMCubTotalesProgramacion", "si");
			$('.CmCubTotales').show();
		}else{
			crearCookie("mostrarMCubTotalesProgramacion", "no");
			$('.CmCubTotales').hide();
		}	
	});
	$( "#CheckRevenimiento" ).click(function() {
    	if ($( "#CheckRevenimiento" ).is(':checked')){
			crearCookie("mostrarRevenimientoProgramacion", "si");
			$('.Crevenimiento').show();
		}else{
			crearCookie("mostrarRevenimientoProgramacion", "no");
			$('.Crevenimiento').hide();
		}	
	});
	$( "#CheckVertimiento" ).click(function() {
    	if ($( "#CheckVertimiento" ).is(':checked')){
			crearCookie("mostrarVertimientoProgramacion", "si");
			$('.Cvertimiento').show();
		}else{
			crearCookie("mostrarVertimientoProgramacion", "no");
			$('.Cvertimiento').hide();
		}	
	});
	$( "#CheckFecha" ).click(function() {
    	if ($( "#CheckFecha" ).is(':checked')){
			crearCookie("mostrarFechaProgramacion", "si");
			$('.Cfecha').show();
		}else{
			crearCookie("mostrarFechaProgramacion", "no");
			$('.Cfecha').hide();
		}	
	});
	$( "#CheckComposicion" ).click(function() {
    	if ($( "#CheckComposicion" ).is(':checked')){
			crearCookie("mostrarComposicionProgramacion", "si");
			$('.Ccomposicion').show();
		}else{
			crearCookie("mostrarComposicionProgramacion", "no");
			$('.Ccomposicion').hide();
		}
	});
	
	$(".botonBuscar").click(function() {
		var busqueda=$.trim( $("#cajaBuscar").val());
		load_tablas(campoOrden,orden,cantidadamostrar,paginacion,busqueda,tipoVista);
	});
	
	 $("#cajaBuscar").keypress(function(event){  
      	var keycode = (event.keyCode ? event.keyCode : event.which); 
      	if(keycode == '13'){  
      		var busqueda=$.trim( $("#cajaBuscar").val());
      		load_tablas(campoOrden,orden,cantidadamostrar,paginacion,busqueda,tipoVista);
			$("#cajaBuscar").val("");
			$("#cajaBuscar").focus();
      	}     
 	}); 
	
	$(".botonNormal").click(function(){ 
		$("#panel_alertas").stop(false, true);
 	});
	
	/*Importante*/
	$('.dropdown-menu').on('click', function(e){
        if($(this).hasClass('dropdown-menu-form')){
            e.stopPropagation();
        }
	});
	
	$(".close").click(function(){ 
		$("#panel_alertas").stop(false, true);
		$("#panel_alertas").hide();
 	});
	/*Fin de Importante*/
	
});

//***********************AJAX*********************

// Autor: Armando Viera Rodríguez
// Onixbm 2014
function load_tablas (campoOrden, orden, cantidadamostrar, paginacion, busqueda, tipoVista){
	//alert (orden);
	//alert (campoOrden);
	//alert (limit);
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("muestra_contenido_ajax").innerHTML=xmlhttp.responseText;
			comprobarReglas();
			$("#loading").hide();
		}
		else{
			$("#loading").show();
		}
	}
	
	xmlhttp.open("POST","consultar.php?campoOrden="+campoOrden+"&orden="+orden+"&cantidadamostrar="+cantidadamostrar+"&paginacion="+paginacion+"&busqueda="+busqueda+"&tipoVista="+tipoVista+"&papelera="+papelera, true);
	xmlhttp.send();
}

function eliminar_registros(ids){
		
		$.ajax({
			url: '../eliminar/eliminar.php',
			type: "POST",
			data: {ids:ids}, //Pasamos los datos en forma de array
			success: function(mensaje){
				mostrarMensaje(mensaje,ids,"eliminar");
			}
		});
		return false;
}

function eliminar_individual(id){
		$.ajax({
			url: '../eliminar/eliminar.php',
			type: "POST",
			data: "submit=&ids="+id, //Pasamos los datos en forma de array
			success: function(mensaje){
				mostrarMensaje(mensaje,id,"eliminar");
			}
		});
		return false;
}

function restaurar_individual(id){
		$.ajax({
			url: '../eliminar/restaurar.php',
			type: "POST",
			data: "submit=&ids="+id, //Pasamos los datos en forma de array
			success: function(mensaje){
				mostrarMensaje(mensaje,id,"eliminar");
			}
		});
		return false;
}

function mostrarMensaje(mensaje,ids, accion){
	var cadena= $.trim(mensaje); //Limpia la cadena regresada desde php
	var res=cadena.split("@"); //Separa la cadena en cada @ y convierte las partes en un array
	if (res[0]=="exito"){ //Si la primer frase contiene la palabra "exito"
		$("#panel_alertas").removeClass().addClass("alert alert-success alert-dismissable");
		$("#notificacionTitulo").html("<i class='icon fa fa-check'></i>"+res[1]);
		$("#notificacionContenido").html(res[2]);
		if(accion=="eliminar"){
			ocultar_registros_eliminados(ids);
		}
		$(".checkEliminar").attr('checked', false);
	}else if (res[0]=="fracaso"){
		$("#panel_alertas").removeClass().addClass("alert alert-error alert-dismissable");
		$("#notificacionTitulo").html("<i class='icon fa fa-ban'></i>"+res[1]);
		$("#notificacionContenido").html(res[2]);
	}else if (res[0]=="aviso"){
		$("#panel_alertas").removeClass().addClass("alert alert-warning alert-dismissable");
		$("#notificacionTitulo").html("<i class='icon fa fa-warning'></i>"+res[1]);
		$("#notificacionContenido").html(res[2]);
	}else{
		$("#panel_alertas").removeClass().addClass("alert alert-error alert-dismissable");
		$("#notificacionTitulo").html("Operaci&oacute;n fallida");
		$("#notificacionContenido").html("<i class='icon fa fa-ban'></i>No se han resivido datos de respuesta desde el servidor [003]");
	}
	$("#panel_alertas").stop(false, true);
	$("#panel_alertas").fadeIn("slow");
	$("#panel_alertas").delay(5000).fadeOut("slow");
}
function ocultar_registros_eliminados(ids){
	if (ids.length){
		for(var i = 0; i < ids.length; i++){
			$("#iregistro"+ids[i]).hide("slow");
		}
	}
	else{
		$("#iregistro"+ids).hide("slow");
	}
}