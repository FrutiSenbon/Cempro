<?php 
include_once("../../conexion/Conexion.class.php");

class Programacion{
 //constructor	
 	var $con;
 	function Programacion(){
 		$this->con=new Conexion;
	}
	function armarConsulta($condicion,$papelera){
		if ($condicion!=""){
			if($papelera){
				$consulta="WHERE ((programacion.vendedor LIKE '%".$condicion."%') OR (programacion.cliente LIKE '%".$condicion."%') OR (programacion.telCliente LIKE '%".$condicion."%') OR (programacion.correoCliente LIKE '%".$condicion."%') OR (programacion.calle LIKE '%".$condicion."%') OR (programacion.colonia LIKE '%".$condicion."%') OR (programacion.resistencia LIKE '%".$condicion."%') OR (programacion.aditivo LIKE '%".$condicion."%') OR (programacion.valorAditivo LIKE '%".$condicion."%') OR (programacion.mCubTotales LIKE '%".$condicion."%') OR (programacion.revenimiento LIKE '%".$condicion."%') OR (programacion.vertimiento LIKE '%".$condicion."%') OR (programacion.fecha LIKE '%".$condicion."%'))AND programacion.estatus ='eliminado'";
			}else{
				$consulta="WHERE ((programacion.vendedor LIKE '%".$condicion."%') OR (programacion.cliente LIKE '%".$condicion."%') OR (programacion.telCliente LIKE '%".$condicion."%') OR (programacion.correoCliente LIKE '%".$condicion."%') OR (programacion.calle LIKE '%".$condicion."%') OR (programacion.colonia LIKE '%".$condicion."%') OR (programacion.resistencia LIKE '%".$condicion."%') OR (programacion.aditivo LIKE '%".$condicion."%') OR (programacion.valorAditivo LIKE '%".$condicion."%') OR (programacion.mCubTotales LIKE '%".$condicion."%') OR (programacion.revenimiento LIKE '%".$condicion."%') OR (programacion.vertimiento LIKE '%".$condicion."%') OR (programacion.fecha LIKE '%".$condicion."%'))AND programacion.estatus <>'eliminado'";
			}
		}else{
			if($papelera){
				$consulta="WHERE programacion.estatus ='eliminado'";
			}else{
				$consulta="WHERE programacion.estatus <>'eliminado'";
			}
		}
		return $consulta;
	}
	function comprobarCampo($campo, $valor, $tipoGuardado){
		if($this->con->conectar()==true){
			//print_r($listaCampos);
			$resultado=mysqli_query($this->con->conect,"SELECT COUNT( * ) AS contador from programacion WHERE $campo = '$valor'");
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

	function guardar($vendedor,$cliente,$telCliente,$correoCliente,$tipoVialidad,$calle,$numero,$colonia,$resistencia,$aditivo,$valorAditivo,$mCubTotales,$revenimiento,$vertimiento,$fecha,$estatus){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['programacion']['guardar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		$idProgramacion=$this->con->generarClave(2); /*Sincronizacion 1 */
		
		if($this->con->conectar()==true){
			
				if(mysqli_query($this->con->conect,"INSERT INTO programacion (idProgramacion, vendedor, cliente, telCliente, correoCliente, tipoVialidad, calle, numero, colonia, resistencia, aditivo, valorAditivo, mCubTotales, revenimiento, vertimiento, fecha, estatus) VALUES ('$idProgramacion','$vendedor','$cliente','$telCliente','$correoCliente','$tipoVialidad','$calle','$numero','$colonia','$resistencia','$aditivo','$valorAditivo','$mCubTotales','$revenimiento','$vertimiento','$fecha','$estatus')")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="agreg&oacute; un nuevo registro en la tabla programacion ";
						$this->registrarBitacora("guardar",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			
		}
	}
	
	function actualizar($vendedor,$cliente,$telCliente,$correoCliente,$tipoVialidad,$calle,$numero,$colonia,$resistencia,$aditivo,$valorAditivo,$mCubTotales,$revenimiento,$vertimiento,$fecha,$estatus,$idProgramacion){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['programacion']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			
				if(mysqli_query($this->con->conect,"UPDATE programacion SET vendedor='$vendedor', cliente='$cliente', telCliente='$telCliente', correoCliente='$correoCliente', tipoVialidad='$tipoVialidad', calle='$calle', numero='$numero', colonia='$colonia', resistencia='$resistencia', aditivo='$aditivo', valorAditivo='$valorAditivo', mCubTotales='$mCubTotales', revenimiento='$revenimiento', vertimiento='$vertimiento', fecha='$fecha', estatus='$estatus' WHERE idProgramacion='$idProgramacion'")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="modific&oacute; el registro ID: $idProgramacion, de la tabla programacion ";
						$this->registrarBitacora("modificar",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			
		}
	}
	
	function bloquear($idProgramacion){
		
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['programacion']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			//REQUIERE CAMPO 'estatus' EN LA TABLA
			return mysqli_query($this->con->conect,"UPDATE programacion SET estatus ='bloqueado' WHERE idProgramacion = '$idProgramacion'");
		}
	}
	
	function cambiarEstatus($idProgramacion,$estatus){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['programacion']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			//REQUIERE CAMPO 'estatus' EN LA TABLA
			if(mysqli_query($this->con->conect,"UPDATE programacion SET estatus ='$estatus' WHERE idProgramacion = '$idProgramacion'")){
				//BITACORA
				if ($_SESSION['bitacora']=="si"){
					$descripcionB="alter&oacute; el estatus del registro a: $estatus, de la tabla programacion ";
					$this->registrarBitacora("modificar",$descripcionB);
				}
				return "exito";
			}else{
				return "fracaso";
			}
		}
	}
	
	function mostrarIndividual($idProgramacion){
		if($this->con->conectar()==true){
			return mysqli_query($this->con->conect,"SELECT * FROM programacion WHERE idProgramacion='$idProgramacion'");
		}
	}
	
	function contar($condicion, $papelera){
		$condicion= trim($condicion);
		$where=$this->armarConsulta($condicion,$papelera);
		
		if($this->con->conectar()==true){
			$resultado=mysqli_query($this->con->conect,"SELECT 
					programacion.idProgramacion,
					programacion.vendedor,
					programacion.cliente,
					programacion.telCliente,
					programacion.correoCliente,
					programacion.tipoVialidad,
					programacion.calle,
					programacion.numero,
					programacion.colonia,
					programacion.resistencia,
					programacion.aditivo,
					programacion.valorAditivo,
					programacion.mCubTotales,
					programacion.revenimiento,
					programacion.vertimiento,
					programacion.fecha,
					programacion.estatus
					FROM programacion 
					$where");
					
			//$extractor = mysqli_fetch_array($resultado);
			$numero_filas=mysqli_num_rows($resultado);
			return $numero_filas;
		}
	}
	
	function mostrar($campoOrden, $orden, $inicial, $cantidadamostrar, $condicion, $papelera){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['programacion']['consultar'])){
			return "denegado";
			exit;
		}
		
		$condicion= trim($condicion);
		$where=$this->armarConsulta($condicion,$papelera);
		
		$consulta = "SELECT 
					programacion.idProgramacion,
					programacion.vendedor,
					programacion.cliente,
					programacion.telCliente,
					programacion.correoCliente,
					programacion.tipoVialidad,
					programacion.calle,
					programacion.numero,
					programacion.colonia,
					programacion.resistencia,
					programacion.aditivo,
					programacion.valorAditivo,
					programacion.mCubTotales,
					programacion.revenimiento,
					programacion.vertimiento,
					programacion.fecha,
					programacion.estatus
					FROM programacion 
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
			return mysqli_query($this->con->conect,"SELECT * FROM programacion $condicion");
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
		$modulo="programacion";
		mysqli_query($this->con->conect,"INSERT INTO bitacora (hora,fecha,idusuario,modulo,accion,descripcion,idcontrol,tablacontrol,clasificacion,extra) VALUES ('$hora','$fecha','$idusuario','$modulo','$accion','$descripcion')");
	}
	
	function eliminar($ids, $tipoEliminacion){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['programacion']['eliminar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			if ($tipoEliminacion=='falsa'){
				//REQUIERE CAMPO 'estatus' EN LA TABLA
				if (mysqli_query($this->con->conect,"UPDATE programacion SET estatus ='eliminado' WHERE idProgramacion IN ($ids)")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="elimin&oacute; falsamente los registros: $ids, de la tabla programacion ";
						$this->registrarBitacora("eliminarFalsa",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			}
			if ($tipoEliminacion=='real'){
				if(mysqli_query($this->con->conect,"DELETE FROM programacion WHERE idProgramacion IN ($ids)")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="elimin&oacute; los registros: $ids, de la tabla programacion ";
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