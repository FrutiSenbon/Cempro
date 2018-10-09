<?php
require("../Cliente.class.php");
$idCliente=1;
if (isset($_POST['id'])){
	$id=htmlentities(trim($_POST['id']));
	$Ocliente= new Cliente;
	$resultado=$Ocliente->mostrarIndividual($id);
	$extractor = mysqli_fetch_array($resultado);
	$nombre=$extractor["nombre"];
	$telefono=$extractor["telefono"];
	$correo=$extractor["correo"];
	$estatus=$extractor["estatus"];
}else{
	header("Location: ../nuevo/nuevo.php");
}
?>