<?php 
include_once("../../conexion/Conexion.class.php");

class Revolvedora{
 //constructor	
 	var $con;
 	function Revolvedora(){
 		$this->con=new Conexion;
	}
	function armarConsulta($condicion,$papelera){
		if ($condicion!=""){
			if($papelera){
				$consulta="WHERE ((revolvedora.numeroEconomico LIKE '%".$condicion."%')) AND revolvedora.estatus ='eliminado'";
			}else{
				$consulta="WHERE ((revolvedora.numeroEconomico LIKE '%".$condicion."%')) AND revolvedora.estatus <>'eliminado'";
			}
		}else{
			if($papelera){
				$consulta="WHERE revolvedora.estatus ='eliminado'";
			}else{
				$consulta="WHERE revolvedora.estatus <>'eliminado'";
			}
		}
		return $consulta;
	}
	function comprobarCampo($campo, $valor, $tipoGuardado){
		if($this->con->conectar()==true){
			//print_r($listaCampos);
			$resultado=mysqli_query($this->con->conect,"SELECT COUNT( * ) AS contador from revolvedora WHERE $campo = '$valor'");
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

	function guardar($numeroEconomico,$estatus){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['revolvedora']['guardar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		$idRevolvedora=$this->con->generarClave(2); /*Sincronizacion 1 */
		
		if($this->con->conectar()==true){
			if($this->comprobarCampo("numeroEconomico",$numeroEconomico, "nuevo")){
				return "numeroEconomicoExiste";
			}else{
				if(mysqli_query($this->con->conect,"INSERT INTO revolvedora (idRevolvedora, numeroEconomico, estatus) VALUES ('$idRevolvedora','$numeroEconomico','$estatus')")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="agreg&oacute; un nuevo registro en la tabla revolvedora ";
						$this->registrarBitacora("guardar",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			}
		}
	}
	
	function actualizar($numeroEconomico,$estatus,$idRevolvedora){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['revolvedora']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			if($this->comprobarCampo("numeroEconomico",$numeroEconomico, "modificar")){
				return "numeroEconomicoExiste";
			}else{
				if(mysqli_query($this->con->conect,"UPDATE revolvedora SET numeroEconomico='$numeroEconomico', estatus='$estatus' WHERE idRevolvedora='$idRevolvedora'")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="modific&oacute; el registro ID: $idRevolvedora, de la tabla revolvedora ";
						$this->registrarBitacora("modificar",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			}
		}
	}
	
	function bloquear($idRevolvedora){
		
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['revolvedora']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			//REQUIERE CAMPO 'estatus' EN LA TABLA
			return mysqli_query($this->con->conect,"UPDATE revolvedora SET estatus ='bloqueado' WHERE idRevolvedora = '$idRevolvedora'");
		}
	}
	
	function cambiarEstatus($idRevolvedora,$estatus){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['revolvedora']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			//REQUIERE CAMPO 'estatus' EN LA TABLA
			if(mysqli_query($this->con->conect,"UPDATE revolvedora SET estatus ='$estatus' WHERE idRevolvedora = '$idRevolvedora'")){
				//BITACORA
				if ($_SESSION['bitacora']=="si"){
					$descripcionB="alter&oacute; el estatus del registro a: $estatus, de la tabla revolvedora ";
					$this->registrarBitacora("modificar",$descripcionB);
				}
				return "exito";
			}else{
				return "fracaso";
			}
		}
	}
	
	function mostrarIndividual($idRevolvedora){
		if($this->con->conectar()==true){
			return mysqli_query($this->con->conect,"SELECT * FROM revolvedora WHERE idRevolvedora='$idRevolvedora'");
		}
	}
	
	function contar($condicion, $papelera){
		$condicion= trim($condicion);
		$where=$this->armarConsulta($condicion,$papelera);
		
		if($this->con->conectar()==true){
			$resultado=mysqli_query($this->con->conect,"SELECT 
					revolvedora.idRevolvedora,
					revolvedora.numeroEconomico,
					revolvedora.estatus
					FROM revolvedora 
					$where");
					
			//$extractor = mysqli_fetch_array($resultado);
			$numero_filas=mysqli_num_rows($resultado);
			return $numero_filas;
		}
	}
	
	function mostrar($campoOrden, $orden, $inicial, $cantidadamostrar, $condicion, $papelera){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['revolvedora']['consultar'])){
			return "denegado";
			exit;
		}
		
		$condicion= trim($condicion);
		$where=$this->armarConsulta($condicion,$papelera);
		
		$consulta = "SELECT 
					revolvedora.idRevolvedora,
					revolvedora.numeroEconomico,
					revolvedora.estatus
					FROM revolvedora 
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
			return mysqli_query($this->con->conect,"SELECT * FROM revolvedora $condicion");
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
		$modulo="revolvedora";
		mysqli_query($this->con->conect,"INSERT INTO bitacora (hora,fecha,idusuario,modulo,accion,descripcion,idcontrol,tablacontrol,clasificacion,extra) VALUES ('$hora','$fecha','$idusuario','$modulo','$accion','$descripcion')");
	}
	
	function eliminar($ids, $tipoEliminacion){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['revolvedora']['eliminar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			if ($tipoEliminacion=='falsa'){
				//REQUIERE CAMPO 'estatus' EN LA TABLA
				if (mysqli_query($this->con->conect,"UPDATE revolvedora SET estatus ='eliminado' WHERE idRevolvedora IN ($ids)")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="elimin&oacute; falsamente los registros: $ids, de la tabla revolvedora ";
						$this->registrarBitacora("eliminarFalsa",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			}
			if ($tipoEliminacion=='real'){
				if(mysqli_query($this->con->conect,"DELETE FROM revolvedora WHERE idRevolvedora IN ($ids)")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="elimin&oacute; los registros: $ids, de la tabla revolvedora ";
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