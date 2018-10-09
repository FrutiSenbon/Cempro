<?php 
include ("../../seguridad/comprobar_login.php");
include ("../../../librerias/php/validaciones.php");
/*CARGA DE ARCHIVOS*/
include_once('../../../librerias/php/thumb.php');
require('../Archivo.class.php');
$Oarchivo=new Archivo;
$mensaje="";
$validacion=true;

if (isset($_POST['nombre'])){
	$nombre=htmlentities(trim($_POST['nombre']));
	//$nombre=mysql_real_escape_string($nombre);
	
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo nombre no es correcto</p>";
}
/*CARGAR ARCHIVO*/
if (isset($_FILES['archivo']['name'])){
	$archivonombre=$_FILES['archivo']['name'];
	$archivotemporal=$_FILES['archivo']['tmp_name'];
	$extencionarchivo=pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION);
	$archivo=basename($_FILES['archivo']['name'],".".$extencionarchivo)."_".generarClave(5).".".$extencionarchivo;
	
	if($archivotemporal==""){
		$archivo="";
		$validacion=false;
		$mensaje=$mensaje."<p>El campo archivo es obligatorio</p>";
	}
	
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo archivo no es correcto</p>";
}

if (isset($_POST['fechamodificacion'])){
	$fechamodificacion=htmlentities(trim($_POST['fechamodificacion']));
	//$fechamodificacion=mysql_real_escape_string($fechamodificacion);
	
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo fechamodificacion no es correcto</p>";
}

if (isset($_POST['idregistro'])){
	$idregistro=htmlentities(trim($_POST['idregistro']));
	//$idregistro=mysql_real_escape_string($idregistro);
	
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo idregistro no es correcto</p>";
}
if($validacion){
	$resultado=$Oarchivo->guardar($nombre,$archivo,$fechamodificacion,$idregistro);
	if($resultado=="exito"){
		/*CARGAR ARCHIVOS*/
		$mensajeArchivo="";
		
		if($archivotemporal!=""){
			
			$estadoArchivo=cargarArchivo($archivonombre,$extencionarchivo, $archivotemporal, $archivo,"jpg,doc,docx,xls,xlsx,csv,pdf,rar,zip,txt","archivos",0,0,"archivo","center");
			if ($estadoArchivo=="exito"){
				$mensajeArchivo="";
			}else if ($estadoArchivo=="extencionInvalida"){
				$mensajeArchivo=$mensajeArchivo."| La extenci&oacute;n: ".$extencionarchivo. " del archivo, no es v&aacute;lida. ";
			}else{
				$mensajeArchivo=$mensajeArchivo."| No se pudo guardar el archivo (".$extencionfoto."). ";
			}
		}
		$mensaje="exito@Operaci&oacute;n exitosa@El registro ha sido guardado";
		$mensaje=$mensaje.$mensajeArchivo;
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