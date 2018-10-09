<?php
require("../Programacion.class.php");
$idProgramacion=1;
if (isset($_POST['id'])){
	$id=htmlentities(trim($_POST['id']));
	$Oprogramacion= new Programacion;
	$resultado=$Oprogramacion->mostrarIndividual($id);
	$extractor = mysqli_fetch_array($resultado);
	$vendedor=$extractor["vendedor"];
	$cliente=$extractor["cliente"];
	$telCliente=$extractor["telCliente"];
	$correoCliente=$extractor["correoCliente"];
	$tipoVialidad=$extractor["tipoVialidad"];
	$calle=$extractor["calle"];
	$numero=$extractor["numero"];
	$colonia=$extractor["colonia"];
	$resistencia=$extractor["resistencia"];
	$aditivo=$extractor["aditivo"];
	$valorAditivo=$extractor["valorAditivo"];
	$mCubTotales=$extractor["mCubTotales"];
	$revenimiento=$extractor["revenimiento"];
	$vertimiento=$extractor["vertimiento"];
	$fecha=$extractor["fecha"];
	$estatus=$extractor["estatus"];
}else{
	header("Location: ../nuevo/nuevo.php");
}
?>