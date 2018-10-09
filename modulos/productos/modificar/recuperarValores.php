<?php
require("../Producto.class.php");
$idCatalogo=1;
if (isset($_POST['id'])){
	$id=htmlentities(trim($_POST['id']));
	$Oproducto= new Producto;
	$resultado=$Oproducto->mostrarIndividual($id);
	$extractor = mysqli_fetch_array($resultado);
	$nombre=$extractor["nombre"];
	$uniMedEnt=$extractor["uniMedEnt"];
	$uniMedSal=$extractor["uniMedSal"];
	$equivalencia=$extractor["equivalencia"];
	$estatus=$extractor["estatus"];
}else{
	header("Location: ../nuevo/nuevo.php");
}
?>