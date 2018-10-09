<?php 
include ("../../seguridad/comprobar_login.php");
include ("../../../librerias/php/validaciones.php");
require('../Revolvedora.class.php');
$Orevolvedora=new Revolvedora;
$mensaje="";
$validacion=true;

if (isset($_POST['idRevolvedora'])){
	$idRevolvedora=htmlentities(trim($_POST['idRevolvedora']));
	//$idRevolvedora=mysql_real_escape_string($idRevolvedora);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo idRevolvedora no es correcto</p>";
}

if (isset($_POST['numeroEconomico'])){
	$numeroEconomico=htmlentities(trim($_POST['numeroEconomico']));
	//$numeroEconomico=mysql_real_escape_string($numeroEconomico);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo numeroEconomico no es correcto</p>";
}

if (isset($_POST['estatus'])){
	$estatus=htmlentities(trim($_POST['estatus']));
	//$estatus=mysql_real_escape_string($estatus);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo estatus no es correcto</p>";
}
if($validacion){
	$resultado=$Orevolvedora->actualizar($numeroEconomico,$estatus, $idRevolvedora);
	if($resultado=="exito"){
		
		$mensaje="exito@Operaci&oacute;n exitosa@El registro ha sido guardado";
	}
	if($resultado=="numeroEconomicoExiste"){
		$mensaje="fracaso@Operaci&oacute;n fallida@El campo numeroEconomico ya existe en la base de datos";
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