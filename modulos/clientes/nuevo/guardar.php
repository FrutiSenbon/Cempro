<?php 
include ("../../seguridad/comprobar_login.php");
include ("../../../librerias/php/validaciones.php");
require('../Cliente.class.php');
$Ocliente=new Cliente;
$mensaje="";
$validacion=true;

if (isset($_POST['nombre'])){
	$nombre=htmlentities(trim($_POST['nombre']));
	//$nombre=mysql_real_escape_string($nombre);
	
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo nombre no es correcto</p>";
}

if (isset($_POST['telefono'])){
	$telefono=htmlentities(trim($_POST['telefono']));
	//$telefono=mysql_real_escape_string($telefono);
	
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo telefono no es correcto</p>";
}

if (isset($_POST['correo'])){
	$correo=htmlentities(trim($_POST['correo']));
	//$correo=mysql_real_escape_string($correo);
	
		if(!validarEmail($correo)){
			$validacion=false;
			$mensaje=$mensaje."<p>Verifique que el campo correo sea un email v&aacute;lido</p>";
		}
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo correo no es correcto</p>";
}

if (isset($_POST['estatus'])){
	$estatus=htmlentities(trim($_POST['estatus']));
	//$estatus=mysql_real_escape_string($estatus);
	
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo estatus no es correcto</p>";
}
if($validacion){
	$resultado=$Ocliente->guardar($nombre,$telefono,$correo,$estatus);
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