<?php 
	include("../../aditivos/Aditivo.class.php");
	$Oaditivo = new Aditivo;
	$resultado=$Oaditivo->consultaGeneral(" WHERE estatus <> 'eliminado'");
	
	if (isset($_POST['seleccionado'])) {
		$idselect=$_POST['seleccionado'];
	}else{
		$idselect=1;
	}
	while ($filas=mysqli_fetch_array($resultado)) { ?>
		<option value="<?php echo $filas['idAditivos']; ?>"
        <?php
        	if($filas['idAditivos']==$idselect){
				echo 'selected="selected"';
			}
		?>
        ><?php echo $filas['nombre']; ?></option>
	<?php
    }
?>