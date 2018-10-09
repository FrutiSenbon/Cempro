<?php
require("../Aditivo.class.php");
$idAditivos=1;
if (isset($_POST['id'])){
	$id=htmlentities(trim($_POST['id']));
	$Oaditivo= new Aditivo;
	$resultado=$Oaditivo->mostrarIndividual($id);
	$extractor = mysqli_fetch_array($resultado);
	$nombre=$extractor["nombre"];
	$estatus=$extractor["estatus"];
}else{
	header("Location: ../nuevo/nuevo.php");
}
?>