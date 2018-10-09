<?php
require("../Revolvedora.class.php");
$idRevolvedora=1;
if (isset($_POST['id'])){
	$id=htmlentities(trim($_POST['id']));
	$Orevolvedora= new Revolvedora;
	$resultado=$Orevolvedora->mostrarIndividual($id);
	$extractor = mysqli_fetch_array($resultado);
	$numeroEconomico=$extractor["numeroEconomico"];
	$estatus=$extractor["estatus"];
}else{
	header("Location: ../nuevo/nuevo.php");
}
?>