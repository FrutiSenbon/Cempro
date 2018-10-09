<?php 
include_once("../../conexion/Conexion.class.php");

class Sucursal{
 //constructor	
 	var $con;
 	function Sucursal(){
 		$this->con=new Conexion;
	}
	function armarConsulta($condicion,$papelera){
		if ($condicion!=""){
			if($papelera){
				$consulta="WHERE ((sucursales.idsucursal LIKE '%".$condicion."%') OR (sucursales.nombre LIKE '%".$condicion."%') OR (sucursales.calle LIKE '%".$condicion."%') OR (sucursales.ciudad LIKE '%".$condicion."%') OR (sucursales.estado LIKE '%".$condicion."%'))AND sucursales.estatus ='eliminado'";
			}else{
				$consulta="WHERE ((sucursales.idsucursal LIKE '%".$condicion."%') OR (sucursales.nombre LIKE '%".$condicion."%') OR (sucursales.calle LIKE '%".$condicion."%') OR (sucursales.ciudad LIKE '%".$condicion."%') OR (sucursales.estado LIKE '%".$condicion."%'))AND sucursales.estatus <>'eliminado'";
			}
		}else{
			if($papelera){
				$consulta="WHERE sucursales.estatus ='eliminado'";
			}else{
				$consulta="WHERE sucursales.estatus <>'eliminado'";
			}
		}
		return $consulta;
	}
	function comprobarCampo($campo, $valor, $tipoGuardado){
		if($this->con->conectar()==true){
			//print_r($listaCampos);
			$resultado=mysqli_query($this->con->conect,"SELECT COUNT( * ) AS contador from sucursales WHERE $campo = '$valor' ");
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

	function guardar($nombre,$calle,$numero,$colonia,$cp,$ciudad,$estado,$telefonocontacto,$licenciassa,$serie,$folio,$idcuentacorreo,$archivofirma,$estatus){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['sucursales']['guardar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		$idsucursal=$this->con->generarClave(2); /*Sincronizacion 1 */
		
		if($this->con->conectar()==true){
			if($this->comprobarCampo("nombre",$nombre, "nuevo")){
				return "nombreExiste";
			}else{
				if(mysqli_query($this->con->conect,"INSERT INTO sucursales (idsucursal, nombre, calle, numero, colonia, cp, ciudad, estado, telefonocontacto, licenciassa, serie, folio, idcuentacorreo, archivofirma, estatus) VALUES ('$idsucursal','$nombre','$calle','$numero','$colonia','$cp','$ciudad','$estado','$telefonocontacto','$licenciassa','$serie','$folio','$idcuentacorreo','$archivofirma','$estatus')")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="agreg&oacute; un nuevo registro en la tabla sucursales ";
						$this->registrarBitacora("guardar",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			}
		}
	}
	
	function actualizar($nombre,$calle,$numero,$colonia,$cp,$ciudad,$estado,$telefonocontacto,$licenciassa,$serie,$folio,$idcuentacorreo,$archivofirma,$estatus,$idsucursal){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['sucursales']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			if($this->comprobarCampo("nombre",$nombre, "modificar")){
				return "nombreExiste";
			}else{
				if(mysqli_query($this->con->conect,"UPDATE sucursales SET nombre='$nombre', calle='$calle', numero='$numero', colonia='$colonia', cp='$cp', ciudad='$ciudad', estado='$estado', telefonocontacto='$telefonocontacto', licenciassa='$licenciassa', serie='$serie', folio='$folio', idcuentacorreo='$idcuentacorreo', archivofirma='$archivofirma', estatus='$estatus' WHERE idsucursal='$idsucursal'")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="modific&oacute; el registro ID: $idsucursal, de la tabla sucursales ";
						$this->registrarBitacora("modificar",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			}
		}
	}
	
	function bloquear($idsucursal){
		
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['sucursales']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			//REQUIERE CAMPO 'estatus' EN LA TABLA
			return mysqli_query($this->con->conect,"UPDATE sucursales SET estatus ='bloqueado' WHERE idsucursal = '$idsucursal'");
		}
	}
	
	function cambiarEstatus($idsucursal,$estatus){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['sucursales']['modificar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			//REQUIERE CAMPO 'estatus' EN LA TABLA
			if(mysqli_query($this->con->conect,"UPDATE sucursales SET estatus ='$estatus' WHERE idsucursal = '$idsucursal'")){
				//BITACORA
				if ($_SESSION['bitacora']=="si"){
					$descripcionB="alter&oacute; el estatus del registro a: $estatus, de la tabla sucursales ";
					$this->registrarBitacora("modificar",$descripcionB);
				}
				return "exito";
			}else{
				return "fracaso";
			}
		}
	}
	
	function mostrarIndividual($idsucursal){
		if($this->con->conectar()==true){
			return mysqli_query($this->con->conect,"SELECT * FROM sucursales WHERE idsucursal='$idsucursal'");
		}
	}
	
	function contar($condicion, $papelera){
		$condicion= trim($condicion);
		$where=$this->armarConsulta($condicion,$papelera);
		
		if($this->con->conectar()==true){
			$resultado=mysqli_query($this->con->conect,"SELECT 
					sucursales.idsucursal,
					sucursales.nombre,
					sucursales.calle,
					sucursales.numero,
					sucursales.colonia,
					sucursales.cp,
					sucursales.ciudad,
					sucursales.estado,
					sucursales.telefonocontacto,
					sucursales.licenciassa,
					sucursales.serie,
					sucursales.folio,
					sucursales.idcuentacorreo,
					sucursales.archivofirma,
					sucursales.estatus,
					cuentascorreo.usuario AS usuariocuentascorreo
					FROM sucursales 
					INNER JOIN cuentascorreo ON sucursales.idcuentacorreo=cuentascorreo.idcuentacorreo
					$where");
					
			//$extractor = mysqli_fetch_array($resultado);
			$numero_filas=mysqli_num_rows($resultado);
			return $numero_filas;
		}
	}
	
	function mostrar($campoOrden, $orden, $inicial, $cantidadamostrar, $condicion, $papelera){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['sucursales']['consultar'])){
			return "denegado";
			exit;
		}
		
		$condicion= trim($condicion);
		$where=$this->armarConsulta($condicion,$papelera);
		
		$consulta = "SELECT 
					sucursales.idsucursal,
					sucursales.nombre,
					sucursales.calle,
					sucursales.numero,
					sucursales.colonia,
					sucursales.cp,
					sucursales.ciudad,
					sucursales.estado,
					sucursales.telefonocontacto,
					sucursales.licenciassa,
					sucursales.serie,
					sucursales.folio,
					sucursales.idcuentacorreo,
					sucursales.archivofirma,
					sucursales.estatus,
					cuentascorreo.usuario AS usuariocuentascorreo
					FROM sucursales 
					INNER JOIN cuentascorreo ON sucursales.idcuentacorreo=cuentascorreo.idcuentacorreo
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
			return mysqli_query($this->con->conect,"SELECT * FROM sucursales $condicion");
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
		$modulo="sucursales";
		mysqli_query($this->con->conect,"INSERT INTO bitacora (hora,fecha,idusuario,modulo,accion,descripcion,idcontrol,tablacontrol,clasificacion,extra) VALUES ('$hora','$fecha','$idusuario','$modulo','$accion','$descripcion')");
	}
	
	function eliminar($ids, $tipoEliminacion){
		/////PERMISOS////////////////
		if (!isset($_SESSION['permisos']['sucursales']['eliminar'])){
			return "denegado";
			exit;
		}
		/////FIN  DE PERMISOS////////
		
		if($this->con->conectar()==true){
			if ($tipoEliminacion=='falsa'){
				//REQUIERE CAMPO 'estatus' EN LA TABLA
				if (mysqli_query($this->con->conect,"UPDATE sucursales SET estatus ='eliminado' WHERE idsucursal IN ($ids)")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="elimin&oacute; falsamente los registros: $ids, de la tabla sucursales ";
						$this->registrarBitacora("eliminarFalsa",$descripcionB);
					}
					return "exito";
				}else{
					return "fracaso";
				}
			}
			if ($tipoEliminacion=='real'){
				if(mysqli_query($this->con->conect,"DELETE FROM sucursales WHERE idsucursal IN ($ids)")){
					//BITACORA
					if ($_SESSION['bitacora']=="si"){
						$descripcionB="elimin&oacute; los registros: $ids, de la tabla sucursales ";
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