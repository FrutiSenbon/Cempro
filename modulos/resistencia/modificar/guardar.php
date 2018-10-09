<?php 
include ("../../seguridad/comprobar_login.php");
include ("../../../librerias/php/validaciones.php");
require('../Resistencia.class.php');
$Oresistencia=new Resistencia;
$mensaje="";
$validacion=true;

if (isset($_POST['idResistencia'])){
	$idResistencia=htmlentities(trim($_POST['idResistencia']));
	//$idResistencia=mysql_real_escape_string($idResistencia);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo idResistencia no es correcto</p>";
}

if (isset($_POST['nombre'])){
	$nombre=htmlentities(trim($_POST['nombre']));
	//$nombre=mysql_real_escape_string($nombre);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo nombre no es correcto</p>";
}

if (isset($_POST['cantCemBom'])){
	$cantCemBom=htmlentities(trim($_POST['cantCemBom']));
	//$cantCemBom=mysql_real_escape_string($cantCemBom);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo cantCemBom no es correcto</p>";
}

if (isset($_POST['cantCemDir'])){
	$cantCemDir=htmlentities(trim($_POST['cantCemDir']));
	//$cantCemDir=mysql_real_escape_string($cantCemDir);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo cantCemDir no es correcto</p>";
}

if (isset($_POST['estatus'])){
	$estatus=htmlentities(trim($_POST['estatus']));
	//$estatus=mysql_real_escape_string($estatus);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo estatus no es correcto</p>";
}
if($validacion){
	$resultado=$Oresistencia->actualizar($nombre,$cantCemBom,$cantCemDir,$estatus, $idResistencia);
	if($resultado=="exito"){
		
		$mensaje="exito@Operaci&oacute;n exitosa@El registro ha sido guardado";
	}
	if($resultado=="nombreExiste"){
		$mensaje="fracaso@Operaci&oacute;n fallida@El campo nombre ya existe en la base de datos";
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