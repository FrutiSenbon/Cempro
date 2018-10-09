<?php 
include_once("../../conexion/Conexion.class.php");

class Archivo{
 //constructor	
 	var $con;
 	function Archivo(){
 		$this->con=new Conexion;
	}
	function armarConsulta($condicion,$papelera){
		if ($condicion!=""){
			$consulta="WHERE ((archivos.idarchivo LIKE '%".$condicion."%') OR (archivos.nombre LIKE '%".$condicion."%') OR (archivos.archivo LIKE '%".$condicion."%'))AND archivos.idarchivo <>'0'";
		}else{
			$consulta="WHERE archivos.idarchivo <>'0'";
		}
		return $consulta;
	}function comprobarCampo($campo, $valor, $tipoGuardado){
		if($this->con->conectar()==true){
			//print_r($listaCampos);
			$resultado=mysqli_query($this->con->conect,"SELECT COUNT( * ) AS contador from archivos WHERE $campo = '$valor'");
			if ($resultado){
				$extractor = mysqli_fetch_array($resultado);
				$numero_filas=$extractor["contador"];
				if ($tipoGuardado=='nuevo'){
					if ($numero_filas=="0"){
						return false;
					}else{
						return true;
					}
				}
				if ($tipoGuardado=='modificar'){
					if ($numero_filas=="1" or $numero_filas=="0"){
						return false;
					}else{
						return true;
					}
				}
			}else{
				return false;
			}
		}
	}

	function guardar($nombre,$archivo,$fechamodificacion,$idregistro){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['archivos']['guardar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		$idarchivo=$this->con->generarClave(2); /*Sincronizacion 1 */
		
		if($this->con->conectar()==true){
			if($this->comprobarCampo("nombre",$nombre, "nuevo")){
				return "nombreExiste";
			}else{
				if(mysqli_query($this->con->conect,"INSERT INTO archivos (idarchivo, nombre, archivo, fechamodificacion, idregistro) VALUES ('$idarchivo','$nombre','$archivo','$fechamodificacion','$idregistro')")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="agreg&oacute; un nuevo registro en la tabla archivos ";
						$this->registrarBitacora("guardar",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			}
		}
	}
	
	function actualizar($nombre,$archivo,$fechamodificacion,$idregistro,$idarchivo){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['archivos']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			if($this->comprobarCampo("nombre",$nombre, "modificar")){
				return "nombreExiste";
			}else{
				if(mysqli_query($this->con->conect,"UPDATE archivos SET nombre='$nombre', archivo='$archivo', fechamodificacion='$fechamodificacion', idregistro='$idregistro' WHERE idarchivo='$idarchivo'")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="modific&oacute; el registro ID: $idarchivo, de la tabla archivos ";
						$this->registrarBitacora("modificar",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			}
		}
	}
	
	function bloquear($idarchivo){
		
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['archivos']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			//REQUIERE CAMPO 'estatus' EN LA TABLA
			return mysqli_query($this->con->conect,"UPDATE archivos SET estatus ='bloqueado' WHERE idarchivo = '$idarchivo'");
		}
	}
	
	function cambiarEstatus($idarchivo,$estatus){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['archivos']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			//REQUIERE CAMPO 'estatus' EN LA TABLA
			if(mysqli_query($this->con->conect,"UPDATE archivos SET estatus ='$estatus' WHERE idarchivo = '$idarchivo'")){
				//BITACORA
				if ($_SESSION['bitacora']=="si"){
					$descripcionB="alter&oacute; el estatus del registro a: $estatus, de la tabla archivos ";
					$this->registrarBitacora("modificar",$descripcionB);
				}
				return "exito";
			}else{
				return "fracaso";
			}
		}
	}
	
	function mostrarIndividual($idarchivo){
		if($this->con->conectar()==true){
			return mysqli_query($this->con->conect,"SELECT * FROM archivos WHERE idarchivo='$idarchivo'");
		}
	}
	
	function contar($condicion, $papelera){
		$condicion= trim($condicion);
		$where=$this->armarConsulta($condicion,$papelera);
		
		if($this->con->conectar()==true){
			$resultado=mysqli_query($this->con->conect,"SELECT 
					archivos.idarchivo,
					archivos.nombre,
					archivos.archivo,
					archivos.fechamodificacion,
					archivos.idregistro
					FROM archivos 
					$where");
					
			//$extractor = mysqli_fetch_array($resultado);
			$numero_filas=mysqli_num_rows($resultado);
			return $numero_filas;
		}
	}
	
	function mostrar($campoOrden, $orden, $inicial, $cantidadamostrar, $condicion, $papelera){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['archivos']['consultar'])){
			return "denegado";
			exit;
		}
		
		$condicion= trim($condicion);
		$where=$this->armarConsulta($condicion,$papelera);
		
		$consulta = "SELECT 
					archivos.idarchivo,
					archivos.nombre,
					archivos.archivo,
					archivos.fechamodificacion,
					archivos.idregistro
					FROM archivos 
					$where
					ORDER BY $campoOrden $orden
					LIMIT $inicial, $cantidadamostrar
					";
		if($this->con->conectar()==true){
			return $resultado=mysqli_query($this->con->conect,$consulta);
		}
	}
	function consultaGeneral($condicion){
		if($this->con->conectar()==true){
			return mysqli_query($this->con->conect,"SELECT * FROM archivos $condicion");
		}
	}
	
	function consultaLibre($condicion){
		if($this->con->conectar()==true){
			return mysqli_query($this->con->conect,$condicion);
		}
	}
	
	function obtenerConfiguracion($campo){
		if($this->con->conectar()==true){
			$resultado=mysqli_query($this->con->conect,"SELECT $campo FROM configuracion WHERE concepto='$campo' ");
			if ($resultado){
				$extractor = mysqli_fetch_array($resultado);
				$valorCampo=$extractor["valor"];
				return $valorCampo;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	function registrarBitacora($accion,$descripcion,$idcontrol="",$tablacontrol="",$clasificacion="",$extra=""){
		$idusuario=$_SESSION['idusuario'];
		$usuario=$_SESSION['usuario'];
		$descripcion="El usuario $usuario ".$descripcion;
		$hora=date('H:i');
		$fecha=date('Y-m-d');
		$modulo="archivos";
		mysqli_query($this->con->conect,"INSERT INTO bitacora (hora,fecha,idusuario,modulo,accion,descripcion,idcontrol,tablacontrol,clasificacion,extra) VALUES ('$hora','$fecha','$idusuario','$modulo','$accion','$descripcion')");
	}
	
	function eliminar($ids, $tipoEliminacion){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['archivos']['eliminar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			if ($tipoEliminacion=='falsa'){
				//REQUIERE CAMPO 'estatus' EN LA TABLA
				if (mysqli_query($this->con->conect,"UPDATE archivos SET estatus ='eliminado' WHERE idarchivo IN ($ids)")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="elimin&oacute; falsamente los registros: $ids, de la tabla archivos ";
						$this->registrarBitacora("eliminarFalsa",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			}
			if ($tipoEliminacion=='real'){
				if(mysqli_query($this->con->conect,"DELETE FROM archivos WHERE idarchivo IN ($ids)")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="elimin&oacute; los registros: $ids, de la tabla archivos ";
						$this->registrarBitacora("eliminar",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			}
		}
	}
}
?>