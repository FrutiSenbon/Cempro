<?php
require("../Vendedor.class.php");
$idVendedor=1;
if (isset($_POST['id'])){
	$id=htmlentities(trim($_POST['id']));
	$Ovendedor= new Vendedor;
	$resultado=$Ovendedor->mostrarIndividual($id);
	$extractor = mysqli_fetch_array($resultado);
	$nombre=$extractor["nombre"];
	$estatus=$extractor["estatus"];
}else{
	header("Location: ../nuevo/nuevo.php");
}
?>