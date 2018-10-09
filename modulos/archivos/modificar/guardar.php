<?php 
include ("../../seguridad/comprobar_login.php");
include ("../../../librerias/php/validaciones.php");
/*CARGA DE ARCHIVOS*/
include_once('../../../librerias/php/thumb.php');
require('../Archivo.class.php');
$Oarchivo=new Archivo;
$mensaje="";
$validacion=true;

if (isset($_POST['idarchivo'])){
	$idarchivo=htmlentities(trim($_POST['idarchivo']));
	//$idarchivo=mysql_real_escape_string($idarchivo);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo idarchivo no es correcto</p>";
}

if (isset($_POST['nombre'])){
	$nombre=htmlentities(trim($_POST['nombre']));
	//$nombre=mysql_real_escape_string($nombre);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo nombre no es correcto</p>";
}
if (isset($_POST['archivo'])){
	$archivo=htmlentities(trim($_POST['archivo']));
	$archivoEliminacion=trim($_POST['archivoEliminacion']);
}else{
	$validacion=false;
	$mensaje=$mensaje."<p>El campo archivo no es correcto</p>";
}	
	/*CARGAR ARCHIVO*/
if (isset($_FILES['archivoI']['name'])){
	$archivotemporal=$_FILES['archivoI']['tmp_name'];
	$archivonombre=$_FILES['archivoI']['name'];
	$extencionarchivo=pathinfo($_FILES['archivoI']['name'], PATHINFO_EXTENSION);
	if($archivotemporal==""){
		$archivo=$archivo;
	}else{
		$archivo=basename($_FILES['archivoI']['name'],".".$extencionarchivo)."_".generarClave(5).".".$extencionarchivo;
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
	$resultado=$Oarchivo->actualizar($nombre,$archivo,$fechamodificacion,$idregistro, $idarchivo);
	if($resultado=="exito"){
		/*CARGAR ARCHIVOS*/
		$mensajeArchivo="";
		
		if($archivotemporal!=""){
			//Elimina la imagen antigua para actualizarla y que no ocupe espacio
			unlink("../archivosSubidos/archivos/".$archivoEliminacion);
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