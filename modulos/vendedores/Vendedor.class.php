<?php 
include_once("../../conexion/Conexion.class.php");

class Vendedor{
 //constructor	
 	var $con;
 	function Vendedor(){
 		$this->con=new Conexion;
	}
	function armarConsulta($condicion,$papelera){
		if ($condicion!=""){
			if($papelera){
				$consulta="WHERE ((vendedores.nombre LIKE '%".$condicion."%')) AND vendedores.estatus ='eliminado'";
			}else{
				$consulta="WHERE ((vendedores.nombre LIKE '%".$condicion."%')) AND vendedores.estatus <>'eliminado'";
			}
		}else{
			if($papelera){
				$consulta="WHERE vendedores.estatus ='eliminado'";
			}else{
				$consulta="WHERE vendedores.estatus <>'eliminado'";
			}
		}
		return $consulta;
	}
	function comprobarCampo($campo, $valor, $tipoGuardado){
		if($this->con->conectar()==true){
			//print_r($listaCampos);
			$resultado=mysqli_query($this->con->conect,"SELECT COUNT( * ) AS contador from vendedores WHERE $campo = '$valor'");
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

	function guardar($nombre,$estatus){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['vendedores']['guardar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		$idVendedor=$this->con->generarClave(2); /*Sincronizacion 1 */
		
		if($this->con->conectar()==true){
			if($this->comprobarCampo("nombre",$nombre, "nuevo")){
				return "nombreExiste";
			}else{
				if(mysqli_query($this->con->conect,"INSERT INTO vendedores (idVendedor, nombre, estatus) VALUES ('$idVendedor','$nombre','$estatus')")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="agreg&oacute; un nuevo registro en la tabla vendedores ";
						$this->registrarBitacora("guardar",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			}
		}
	}
	
	function actualizar($nombre,$estatus,$idVendedor){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['vendedores']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			if($this->comprobarCampo("nombre",$nombre, "modificar")){
				return "nombreExiste";
			}else{
				if(mysqli_query($this->con->conect,"UPDATE vendedores SET nombre='$nombre', estatus='$estatus' WHERE idVendedor='$idVendedor'")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="modific&oacute; el registro ID: $idVendedor, de la tabla vendedores ";
						$this->registrarBitacora("modificar",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			}
		}
	}
	
	function bloquear($idVendedor){
		
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['vendedores']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			//REQUIERE CAMPO 'estatus' EN LA TABLA
			return mysqli_query($this->con->conect,"UPDATE vendedores SET estatus ='bloqueado' WHERE idVendedor = '$idVendedor'");
		}
	}
	
	function cambiarEstatus($idVendedor,$estatus){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['vendedores']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			//REQUIERE CAMPO 'estatus' EN LA TABLA
			if(mysqli_query($this->con->conect,"UPDATE vendedores SET estatus ='$estatus' WHERE idVendedor = '$idVendedor'")){
				//BITACORA
				if ($_SESSION['bitacora']=="si"){
					$descripcionB="alter&oacute; el estatus del registro a: $estatus, de la tabla vendedores ";
					$this->registrarBitacora("modificar",$descripcionB);
				}
				return "exito";
			}else{
				return "fracaso";
			}
		}
	}
	
	function mostrarIndividual($idVendedor){
		if($this->con->conectar()==true){
			return mysqli_query($this->con->conect,"SELECT * FROM vendedores WHERE idVendedor='$idVendedor'");
		}
	}
	
	function contar($condicion, $papelera){
		$condicion= trim($condicion);
		$where=$this->armarConsulta($condicion,$papelera);
		
		if($this->con->conectar()==true){
			$resultado=mysqli_query($this->con->conect,"SELECT 
					vendedores.idVendedor,
					vendedores.nombre,
					vendedores.estatus
					FROM vendedores 
					$where");
					
			//$extractor = mysqli_fetch_array($resultado);
			$numero_filas=mysqli_num_rows($resultado);
			return $numero_filas;
		}
	}
	
	function mostrar($campoOrden, $orden, $inicial, $cantidadamostrar, $condicion, $papelera){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['vendedores']['consultar'])){
			return "denegado";
			exit;
		}
		
		$condicion= trim($condicion);
		$where=$this->armarConsulta($condicion,$papelera);
		
		$consulta = "SELECT 
					vendedores.idVendedor,
					vendedores.nombre,
					vendedores.estatus
					FROM vendedores 
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
			return mysqli_query($this->con->conect,"SELECT * FROM vendedores $condicion");
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
		$modulo="vendedores";
		mysqli_query($this->con->conect,"INSERT INTO bitacora (hora,fecha,idusuario,modulo,accion,descripcion,idcontrol,tablacontrol,clasificacion,extra) VALUES ('$hora','$fecha','$idusuario','$modulo','$accion','$descripcion')");
	}
	
	function eliminar($ids, $tipoEliminacion){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['vendedores']['eliminar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			if ($tipoEliminacion=='falsa'){
				//REQUIERE CAMPO 'estatus' EN LA TABLA
				if (mysqli_query($this->con->conect,"UPDATE vendedores SET estatus ='eliminado' WHERE idVendedor IN ($ids)")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="elimin&oacute; falsamente los registros: $ids, de la tabla vendedores ";
						$this->registrarBitacora("eliminarFalsa",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			}
			if ($tipoEliminacion=='real'){
				if(mysqli_query($this->con->conect,"DELETE FROM vendedores WHERE idVendedor IN ($ids)")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="elimin&oacute; los registros: $ids, de la tabla vendedores ";
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