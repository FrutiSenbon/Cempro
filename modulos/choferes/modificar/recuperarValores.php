<?php
require("../Chofere.class.php");
$idChoferes=1;
if (isset($_POST['id'])){
	$id=htmlentities(trim($_POST['id']));
	$Ochofere= new Chofere;
	$resultado=$Ochofere->mostrarIndividual($id);
	$extractor = mysqli_fetch_array($resultado);
	$nombre=$extractor["nombre"];
	$estatus=$extractor["estatus"];
}else{
	header("Location: ../nuevo/nuevo.php");
}
?>