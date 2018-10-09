<?php 
	include("../../resistencias/Resistencia.class.php");
	$Oresistencia = new Resistencia;
	$resultado=$Oresistencia->consultaGeneral("");
	
	if (isset($_POST['seleccionado'])) {
		$idselect=$_POST['seleccionado'];
	}else{
		$idselect=1;
	}
	while ($filas=mysqli_fetch_array($resultado)) { ?>
		<option value="<?php echo $filas['idResistencia']; ?>"
        <?php
        	if($filas['idResistencia']==$idselect){
				echo 'selected="selected"';
			}
		?>
        ><?php echo $filas['nombre']; ?></option>
	<?php
    }
?>