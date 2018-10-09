<?php
require("../Archivo.class.php");
$idarchivo=1;
if (isset($_POST['id'])){
	$id=htmlentities(trim($_POST['id']));
	$Oarchivo= new Archivo;
	$resultado=$Oarchivo->mostrarIndividual($id);
	$extractor = mysqli_fetch_array($resultado);
	$nombre=$extractor["nombre"];
	$archivo=$extractor["archivo"];
	$fechamodificacion=$extractor["fechamodificacion"];
	$idregistro=$extractor["idregistro"];
}else{
	header("Location: ../nuevo/nuevo.php");
}
?>