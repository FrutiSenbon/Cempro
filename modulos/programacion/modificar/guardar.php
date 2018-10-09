<?php 
include ("../../seguridad/comprobar_login.php");
include ("../../../librerias/php/validaciones.php");
require('../Programacion.class.php');
$Oprogramacion=new Programacion;
$mensaje="";
$validacion=true;

if (isset($_POST['idProgramacion'])){
	$idProgramacion=htmlentities(trim($_POST['idProgramacion']));
	//$idProgramacion=mysql_real_escape_string($idProgramacion);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo idProgramacion no es correcto</p>";
}

if (isset($_POST['vendedor'])){
	$vendedor=htmlentities(trim($_POST['vendedor']));
	//$vendedor=mysql_real_escape_string($vendedor);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo vendedor no es correcto</p>";
}

if (isset($_POST['cliente'])){
	$cliente=htmlentities(trim($_POST['cliente']));
	//$cliente=mysql_real_escape_string($cliente);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo cliente no es correcto</p>";
}

if (isset($_POST['telCliente'])){
	$telCliente=htmlentities(trim($_POST['telCliente']));
	//$telCliente=mysql_real_escape_string($telCliente);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo telCliente no es correcto</p>";
}

if (isset($_POST['correoCliente'])){
	$correoCliente=htmlentities(trim($_POST['correoCliente']));
	//$correoCliente=mysql_real_escape_string($correoCliente);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo correoCliente no es correcto</p>";
}

if (isset($_POST['tipoVialidad'])){
	$tipoVialidad=htmlentities(trim($_POST['tipoVialidad']));
	//$tipoVialidad=mysql_real_escape_string($tipoVialidad);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo tipoVialidad no es correcto</p>";
}

if (isset($_POST['calle'])){
	$calle=htmlentities(trim($_POST['calle']));
	//$calle=mysql_real_escape_string($calle);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo calle no es correcto</p>";
}

if (isset($_POST['numero'])){
	$numero=htmlentities(trim($_POST['numero']));
	//$numero=mysql_real_escape_string($numero);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo numero no es correcto</p>";
}

if (isset($_POST['colonia'])){
	$colonia=htmlentities(trim($_POST['colonia']));
	//$colonia=mysql_real_escape_string($colonia);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo colonia no es correcto</p>";
}

if (isset($_POST['resistencia'])){
	$resistencia=htmlentities(trim($_POST['resistencia']));
	//$resistencia=mysql_real_escape_string($resistencia);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo resistencia no es correcto</p>";
}

if (isset($_POST['aditivo'])){
	$aditivo=htmlentities(trim($_POST['aditivo']));
	//$aditivo=mysql_real_escape_string($aditivo);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo aditivo no es correcto</p>";
}

if (isset($_POST['valorAditivo'])){
	$valorAditivo=htmlentities(trim($_POST['valorAditivo']));
	//$valorAditivo=mysql_real_escape_string($valorAditivo);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo valorAditivo no es correcto</p>";
}

if (isset($_POST['mCubTotales'])){
	$mCubTotales=htmlentities(trim($_POST['mCubTotales']));
	//$mCubTotales=mysql_real_escape_string($mCubTotales);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo mCubTotales no es correcto</p>";
}

if (isset($_POST['revenimiento'])){
	$revenimiento=htmlentities(trim($_POST['revenimiento']));
	//$revenimiento=mysql_real_escape_string($revenimiento);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo revenimiento no es correcto</p>";
}

if (isset($_POST['vertimiento'])){
	$vertimiento=htmlentities(trim($_POST['vertimiento']));
	//$vertimiento=mysql_real_escape_string($vertimiento);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo vertimiento no es correcto</p>";
}

if (isset($_POST['fecha'])){
	$fecha=htmlentities(trim($_POST['fecha']));
	//$fecha=mysql_real_escape_string($fecha);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo fecha no es correcto</p>";
}

if (isset($_POST['estatus'])){
	$estatus=htmlentities(trim($_POST['estatus']));
	//$estatus=mysql_real_escape_string($estatus);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo estatus no es correcto</p>";
}
if($validacion){
	$resultado=$Oprogramacion->actualizar($vendedor,$cliente,$telCliente,$correoCliente,$tipoVialidad,$calle,$numero,$colonia,$resistencia,$aditivo,$valorAditivo,$mCubTotales,$revenimiento,$vertimiento,$fecha,$estatus, $idProgramacion);
	if($resultado=="exito"){
		
		$mensaje="exito@Operaci&oacute;n exitosa@El registro ha sido guardado";
	}
	if($resultado=="fracaso"){
		$mensaje="fracaso@Operaci&oacute;n fallida@Ha ocurrido un problema en la base de datos [001]";
	}
	if($resultado=="denegado"){
		$mensaje="aviso@Acceso denegado@Su cuenta no cuenta con los privilegios para poder realizar esta tarea";
	}
}else{
	$mensaje="fracaso@Operaci&oacute;n fallida@ $mensaje";
}

echo utf8_encode($mensaje);

?>