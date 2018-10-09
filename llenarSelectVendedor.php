<?php 
	include("../../vendedores/Vendedor.class.php");
	$Ovendedor = new Vendedor;
	$resultado=$Ovendedor->consultaGeneral(" WHERE estatus <> 'eliminado'");
	
	if (isset($_POST['seleccionado'])) {
		$idselect=$_POST['seleccionado'];
	}else{
		$idselect=1;
	}
	while ($filas=mysqli_fetch_array($resultado)) { ?>
		<option value="<?php echo $filas['idVendedor']; ?>"
        <?php
        	if($filas['idVendedor']==$idselect){
				echo 'selected="selected"';
			}
		?>
        ><?php echo $filas['nombre']; ?></option>
	<?php
    }
?>